<?php
require_once 'admin/include/config.php';

$newConnection = new databaseConnect();
$pdoDbConnect = $newConnection->connect();



/*
**************************************************************************************
*/

/*
*
**
***
****
***
**
*
*/
if (isset($_POST['process']) && ($_POST['process'] == 'signup')) {
	empty_validation($_POST['name'], "Please enter category name") == false ? exit() : $name = $_POST['name'];
	empty_validation($_POST['email'], "Please enter category email") == false ? exit() : $email = $_POST['email'];
	empty_validation($_POST['mob'], "Please enter category mob") == false ? exit() : $mob = $_POST['mob'];
	empty_validation($_POST['state'], "Please enter category country") == false ? exit() : $state = $_POST['state'];
	empty_validation($_POST['city'], "Please enter category city") == false ? exit() : $city = $_POST['city'];
	empty_validation($_POST['add'], "Please enter category add") == false ? exit() : $add = $_POST['add'];
	empty_validation($_POST['pass'], "Please enter category pass") == false ? exit() : $pass = $_POST['pass'];
	$mobCheck = 'SELECT `cus_id` FROM `customer` WHERE `cus_mob` = :contact';
	$dataCheck = $pdoDbConnect->prepare($mobCheck);
	try {
		$dataCheck->execute(['contact' => $mob]);
		if ($dataCheck->rowCount() > 0) {
			$response['code'] = 100;
			$response['msg'] = $mob . " already exists";
			echo json_encode($response);
			return false;
			exit();
		} else {
			if ($dataCheck) {
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
					$Salted = $prefix . $pass . $suffix; // Salted  for extra security
					$hashPassword = hash('SHA512', $Salted); // Encryption of password
					$insuser = "INSERT INTO `customer`(`cus_name`,`cus_mob`, `cus_email`, `cus_city`, `cus_state`, `cus_password`, `active`, `deleted`,`createdDate`) VALUES (:cusName, :contact, :email, :city, :state, :password, :active, :deleted, :cTime)";
					$insUserData = $pdoDbConnect->prepare($insuser);
					try {
						$result = $insUserData->execute(['cusName' => $name , 'contact' => $mob , 'email' => $email , 'city' => $city , 'state' => $state , 'password' => $hashPassword, 'active' => $yes, 'deleted' => $no, 'cTime' => $currentTime]);
						if ($result) {
							$response['code'] = 200;
							$response['msg'] = ucwords($name) . ' added succesfully';
							echo json_encode($response);
							exit();
						}
					} catch (PDOException $e) {
						$response['code'] = 100;
						$response['msg'] = 'Error: user enter' . $e->getMessage();
						echo json_encode($response);
						return false;
						exit();
					}
				}
			}
		} catch (PDOException $e) {
			$response['code'] = 100;
			$response['msg'] = 'Error: number check' . $e->getMessage();
			echo json_encode($response);
			return false;
			exit();
		}
		echo json_encode($response);
	}

	include ('frontSession.php');
	/******************************************************************************/
/*
*
**
***
****
***
**
*
*/
include ('frontSession.php');
if (isset($_POST['process']) && ($_POST['process'] == 'addCart')) {
	$id = $_POST['id'];
	$insuser = "INSERT INTO `cart`(`cus_id`,`pro_id`, `qty`, `total`, `active`, `deleted`) VALUES (:cus, :pro, :qty, (SELECT `pro_price` FROM `product` WHERE `pro_id` = :total), :active, :deleted)";
	$insUserData = $pdoDbConnect->prepare($insuser);
	try {
		$result = $insUserData->execute(['cus' => $cusId , 'pro' => $id , 'qty' => '1' , 'total' => $id , 'active' => $yes, 'deleted' => $no]);
		if ($result) {
			$response['code'] = 200;
			$response['msg'] = 'Product added succesfully';
			echo json_encode($response);
			exit();
		}
	} catch (PDOException $e) {
		$response['code'] = 100;
		$response['msg'] = 'Error: user enter' . $e->getMessage();
		echo json_encode($response);
		return false;
		exit();
	}
	echo json_encode($response);
}

/******************************************************************************/
/*
*
**
***
****
***
**
*
*/
if (isset($_POST['process']) && ($_POST['process'] == 'addOrder')) {
	$insuser = "UPDATE `cart` SET `ordered` = 'Y'";
	$insUserData = $pdoDbConnect->prepare($insuser);
	try {
		$result = $insUserData->execute();
		if ($result) {
			$response['code'] = 200;
			$response['msg'] = 'Order Placed';
			echo json_encode($response);
			exit();
		}
	} catch (PDOException $e) {
		$response['code'] = 100;
		$response['msg'] = 'Error: user enter' . $e->getMessage();
		echo json_encode($response);
		return false;
		exit();
	}
	echo json_encode($response);
}

/******************************************************************************/
?>