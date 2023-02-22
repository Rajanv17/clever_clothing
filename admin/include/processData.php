<?php
include ('session.php');
require_once 'config.php';

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
if (isset($_POST['process']) && ($_POST['process'] == 'addCategoryData' || $_POST['process'] == 'updateCatData')) {
	empty_validation($_POST['categoryName'], "Please enter category name") == false ? exit() : $categoryName = changeText($_POST['categoryName']);
	if ($_POST['process'] == "addCategoryData") {
		$proceed = false;
		$query = "SELECT `c_name` FROM `categories` WHERE `c_name` = :name";
		$query2 = "INSERT INTO `categories`(`c_name`, `u_id`, `active`, `deleted`, `createdDate`) VALUES (:name, :uId, :yes, :no, :cTime)";
		try {
			$insData = $pdoDbConnect->prepare($query);
			$insResult = $insData->execute(['name' => $categoryName]);
			if ($insData->rowCount() > 0) {
				$response['code'] = 100;
				$response['msg'] = "$categoryName already exist";
			} else {
				$proceed = true;
			}
		} catch (PDOException $e) {
			$response['code'] = 100;
			$response['msg'] = "$query => " . $e->getMessage();
		}
		if ($proceed) {
			try {
				$insData = $pdoDbConnect->prepare($query2);
				$insResult = $insData->execute(['name' => $categoryName, 'uId' => $userId, 'yes' => $yes, 'no' => $no, 'cTime' => $currentTime]);
				if ($insResult) {
					$response['code'] = 200;
					$response['msg'] = "$categoryName added successfully";
				}
			} catch (PDOException $e) {
				$response['code'] = 100;
				$response['msg'] = "$query2 => " . $e->getMessage();
			}
			$DatabaseFile = null;
		}
	}
	if ($_POST['process'] == "updateCatData") {
		empty_validation($_POST['hCatId'], 'Something went wrong while selecting id') == false ? exit() : $hCatId = $_POST['hCatId'];
		$proceed = false;
		$query2 = "UPDATE `categories` SET `c_name` = :name, `u_id` = :uId, `updatedDate` = :cTime WHERE `c_id` = :cId";
		try {
			$insData = $pdoDbConnect->prepare($query2);
			$insResult = $insData->execute(['name' => $categoryName, 'uId' => $userId, 'cTime' => $currentTime, 'cId' => $hCatId]);
			if ($insResult) {
				$response['code'] = 200;
				$response['msg'] = "$categoryName updated successfully";
			}
		} catch (PDOException $e) {
			$response['code'] = 100;
			$response['msg'] = "$query2 => " . $e->getMessage();
		}
		$DatabaseFile = null;
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
if (isset($_POST['process']) && ($_POST['process'] == 'addProductData' || $_POST['process'] == 'updateProductData')) {
	empty_validation($_POST['selCat'], "Please Select Category") == false ? exit() : $selCat = changeText($_POST['selCat']);
	empty_validation($_POST['productName'], "Please Enter Product Name") == false ? exit() : $productName = changeText($_POST['productName']);
	empty_validation($_POST['productDesc'], "Please Enter Product Description") == false ? exit() : $productDesc = changeText($_POST['productDesc']);
	empty_validation($_POST['productPrice'], "Please Enter Product Price") == false ? exit() : $productPrice = changeText($_POST['productPrice']);
		if($_POST['process'] == 'addProductData'){
	$img = null;
	if (!fileCheck($_FILES['proImg']['error'], $_FILES['proImg']['size'])) {
		if (!fileUpload($_FILES['proImg']['name'], $_FILES['proImg']['error'], $_FILES['proImg']['size'], $_FILES['proImg']['tmp_name'], "IMG-".$productName, "../uploads/product", 1000000, 1, 'img')) {
			exit();
		}
	}
	$proceed = false;
	$query = "SELECT `pro_name` FROM `product` WHERE `pro_name` = :name";
	$query2 = "INSERT INTO `product`(`c_id`, `pro_name`, `pro_desc`, `pro_img`, `pro_price`, `u_id`, `active`, `deleted`, `createdDate`) VALUES (:cat, :name, :descr, :img, :price, :uId, :yes, :no, :cTime)";
	try {
		$insData = $pdoDbConnect->prepare($query);
		$insResult = $insData->execute(['name' => $productName]);
		if ($insData->rowCount() > 0) {
			$response['code'] = 100;
			$response['msg'] = "$productName already exist";
		} else {
			$proceed = true;
		}
	} catch (PDOException $e) {
		$response['code'] = 100;
		$response['msg'] = "$query => " . $e->getMessage();
	}
	if ($proceed) {
		try {
			$insData = $pdoDbConnect->prepare($query2);
			$insResult = $insData->execute(['cat' => $selCat, 'name' => $productName, 'descr' => $productDesc, 'img' => $img, 'price' => $productPrice, 'uId' => $userId, 'yes' => $yes, 'no' => $no, 'cTime' => $currentTime]);
			if ($insResult) {
				$response['code'] = 200;
				$response['msg'] = "$productName added successfully";
			}
		} catch (PDOException $e) {
			$response['code'] = 100;
			$response['msg'] = "$query2 => " . $e->getMessage();
		}
		$DatabaseFile = null;
	}
}
if($_POST['process'] == 'updateProductData'){
	empty_validation($_POST['proId'], 'Something went wrong while selecting id') == false ? exit() : $proId = $_POST['proId'];
	$img = null;
	if (!fileCheck($_FILES['proImg']['error'], $_FILES['proImg']['size'])) {
		if (!fileUpload($_FILES['proImg']['name'], $_FILES['proImg']['error'], $_FILES['proImg']['size'], $_FILES['proImg']['tmp_name'], "IMG-".$productName, "../uploads/products", 30000, 1, 'img')) {
			exit();
		}else{
			unset($_POST['hproImg']);
		}
	}else{
		$img = $_POST['hproImg'];
	}
	$proceed = false;
	$query2 = "UPDATE `product` SET `c_id` = :cat, `pro_name` = :name, `pro_desc` = :descr, `pro_img` = :img, `pro_price` = :price, `u_id` = :uId, `active` = :yes, `deleted` = :no, `updatedDate` = :cTime WHERE `pro_id` = :pro_id";
		try {
			$insData = $pdoDbConnect->prepare($query2);
			$insResult = $insData->execute(['cat' => $selCat, 'name' => $productName, 'descr' => $productDesc, 'img' => $img, 'price' => $productPrice, 'uId' => $userId, 'yes' => $yes, 'no' => $no, 'cTime' => $currentTime, 'pro_id' => $proId]);
			if ($insResult) {
				$response['code'] = 200;
				$response['msg'] = "$productName added successfully";
			}
		} catch (PDOException $e) {
			$response['code'] = 100;
			$response['msg'] = "$query2 => " . $e->getMessage();
		}
		$DatabaseFile = null;
	}
	echo json_encode($response);
}

/******************************************************************************/

/******************************************************************************/
?>