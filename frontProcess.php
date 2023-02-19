<?php
if (session_status() == PHP_SESSION_NONE){
	if (!session_id()) {
		session_start();
	}
	include 'admin/include/config.php';
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
				$_SESSION['ccprefix'] = $data['cc_prefix'];
				$_SESSION['ccsuffix'] = $data['cc_suffix'];
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
			$contactCheck = "SELECT `cus_mob` FROM `customer` WHERE `cus_mob` = :contact";
			$pdoDbConnect = $newConnection->connect();
			$contactdata = $pdoDbConnect -> prepare($contactCheck);

			try{

				$contactdata -> execute(['contact' => $mobile]);
				$result = $contactdata ->rowCount();
				if ($result > 0) {
					$pdoDbConnect = $newConnection->connect();
					$sql2 = "SELECT `cus_id` FROM `customer` WHERE `cus_mob` = :contact AND `active` = :active";
					$activeCheck = $pdoDbConnect -> prepare($sql2);
					try{
						$activeCheck -> execute(['contact' => $mobile, 'active' => $yes]);
						$result2 = $activeCheck ->rowCount();
						if ($result2 > 0) {
							$sql3 = "SELECT `cus_id`, `cus_name`, `cus_mob` FROM `customer` WHERE `cus_mob` = :contact AND `cus_password` = :password";
							$pdoDbConnect = $newConnection->connect();
							$userLogin = $pdoDbConnect -> prepare($sql3);
							try{
								$userLogin -> execute(['contact' => $mobile, 'password' => $hashPassword]);
								$result3 = $userLogin ->rowCount();
								$finalData = $userLogin -> fetch();
								if($result3 > 0){
									$response['code'] = 200;
									$_SESSION['ccuser'] = $finalData['cus_name'];
									$_SESSION['ccuserId'] = $finalData['cus_id'];
									$_SESSION['ccuserContact'] = $finalData['cus_mob'];
									$_SESSION['ccloginTimeStamp'] = time();
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