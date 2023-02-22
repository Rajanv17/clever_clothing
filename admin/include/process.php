<?php
if (session_status() == PHP_SESSION_NONE){
	if (!session_id()) {
		session_start();
	}
	include 'config.php';
	$response = array();
	$newConnection = new databaseConnect();
	$pdoDbConnect = $newConnection->connect();
	$prefix = $suffix = null;
	if (isset($_POST['lgn']) && $_POST['lgn'] == "loginProcess") {
		$mobile = $_POST['mobile'];
		$password = $_POST['password'];
		if (empty($mobile) || empty($password)) {
			if (empty($mobile)) {
				$response['code'] = 100;
				$response['msg'] = "Please enter the mobile number";
				echo json_encode($response);
				return false;
				die();
			}else{
				$response['code'] = 100;
				$response['msg'] = "Please enter the Password";
				echo json_encode($response);
				return false;
				die();
			}
		}else{
			$saltedQuery = "SELECT `cc_prefix`, `cc_suffix` FROM `ccsaltedpassword` WHERE `cc_id` = :id";
			$id = 1;
			$SaltedData = $pdoDbConnect -> prepare($saltedQuery);

			try{

				$SaltedData -> execute(['id' => $id]);
				$data = $SaltedData -> fetch();
				$prefix = $data['cc_prefix'];
				$suffix = $data['cc_suffix'];
			}
			catch(PDOException $e) {
				$response['code'] = 100;
				$response['message'] = 'Error: '. $e->getMessage();
				echo json_encode($response);
				return false;
				die();
				ob_flush();
			}
			$Salted = $prefix.$password.$suffix; // Salted  for extra security

			$hashPassword = hash('SHA512', $Salted); // Encryption of password
			$contactCheck = "SELECT `u_number` FROM `user` WHERE `u_number` = :contact";
			$pdoDbConnect = $newConnection->connect();
			$contactdata = $pdoDbConnect -> prepare($contactCheck);

			try{

				$contactdata -> execute(['contact' => $mobile]);
				$result = $contactdata ->rowCount();
				if ($result > 0) {
					$pdoDbConnect = $newConnection->connect();
					$sql2 = "SELECT `u_id` FROM `user` WHERE `u_number` = :contact AND `active` = :active";
					$activeCheck = $pdoDbConnect -> prepare($sql2);
					try{
						$activeCheck -> execute(['contact' => $mobile, 'active' => $yes]);
						$result2 = $activeCheck ->rowCount();
						if ($result2 > 0) {
							function getPages(){
								$returnPages = array();
								$query = "SELECT `pg_id`, `pg_name`, `pg_icon`, `pg_link`, `pg_listing` FROM `pages` WHERE `active` = :pgAct AND `deleted` = :pgDel ORDER BY `pg_order`";
								try{
									$pageRights = $GLOBALS['pdoDbConnect'] -> prepare($query);
									$datas = $pageRights -> execute(["pgAct" => $GLOBALS['yes'], "pgDel" => $GLOBALS['no']]);
									if ($pageRights -> rowCount() > 0) {
										$ans = $pageRights -> fetchAll();
										foreach ($ans as $value) {
											$result['id'] = $value['pg_id'];
											$result['name'] = $value['pg_name'];
											$result['icon'] = $value['pg_icon'];
											$result['link'] = $value['pg_link'];
											$result['listing'] = $value['pg_listing'];
											$returnPages[] = $result;
										}
										return $returnPages;
									}
									else{
										return $returnPages[] = 0;
									}
								}
								catch(PDOException $e) {
									$response['code'] = 100;
									$response['msg'] = 'Error: pageRights '. $e->getMessage();
									echo json_encode($response);
									return false;
									die();
								}
							}
							$sql3 = "SELECT `u_id`, `u_name`, `u_number` FROM `user` WHERE `u_number` = :contact AND `u_password` = :password";
							$pdoDbConnect = $newConnection->connect();
							$userLogin = $pdoDbConnect -> prepare($sql3);
							try{
								$userLogin -> execute(['contact' => $mobile, 'password' => $hashPassword]);
								$result3 = $userLogin ->rowCount();
								$finalData = $userLogin -> fetch();
								if($result3 > 0){
									$response['code'] = 200;
									$_SESSION['ccuser'] = $finalData['u_name'];
									$_SESSION['ccuserId'] = $finalData['u_id'];
									$_SESSION['ccuserContact'] = $finalData['u_number'];
									$_SESSION['ccpageRights'] = getPages();
									$response['ridirect_page'] = $_SESSION['ccpageRights'][0]['link'];
									echo json_encode($response);
									return false;
									die();
								}
								else{
									$response['code'] = 100;
									$response['msg'] = "Wrong Password";
									echo json_encode($response);
									return false;
									die();
								}

							}
							catch(PDOException $e) {
								$response['code'] = 100;
								$response['msg'] = 'Error: '. $e->getMessage();
								echo json_encode($response);
								return false;
								die();
							}
						}
						else{
							$response['code'] = 100;
							$response['msg'] = "User account is disabled";
							echo json_encode($response);
							return false;
							die();
						}
					}
					catch(PDOException $e) {
						$response['code'] = 100;
						$response['msg'] = 'Error: '. $e->getMessage();
						echo json_encode($response);
						return false;
						die();
					}
				}
				else{
					$response['code'] = 100;
					$response['msg'] = "User account not exists";
					echo json_encode($response);
					return false;
					die();

				}
			}
			catch(PDOException $e) {
				$response['code'] = 100;
				$response['msg'] = 'Error: '. $e->getMessage();
				echo json_encode($response);
				return false;
				die();
			}
		}
	}
}
else{
	session_status() == PHP_SESSION_NONE;
}
?>