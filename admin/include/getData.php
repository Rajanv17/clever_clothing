<?php
include ('session.php');
require_once 'config.php';

$newConnection = new databaseConnect();
$pdoDbConnect = $newConnection->connect();

/*
*******************************************************************************

*
**
***
****
***
**
*


**************************************************************************************
*/
if (isset($_POST['getData']) && ($_POST['getData']) == "getCatData") {
	$returnData = array();
	$sub_array = array();
	$id = $_POST['id'];
	$query = "SELECT `c_name` FROM `categories`  WHERE `c_id` = :id" ;
	try{
		$stmt = $pdoDbConnect -> prepare($query);
		$stmt -> execute(["id" => $id]);
		$rows = $stmt -> rowCount();
		if ($rows > 0) {
			$result = $stmt -> fetchAll();
			foreach ($result as $value) {
				$sub_array['name'] = $value['c_name'];
			}
			$returnData['code'] = 200;
			$returnData['data'] = $sub_array;
		}
		else{
			$returnData['code'] = 100;
			$returnData['msg'] = "No data found";
		}
	}
	catch(PDOException $e){
		$returnData['code'] = 100;
		$returnData['msg'] = "Error user => ".$e -> getMessage();
	}
	echo json_encode($returnData);
}
/*
*******************************************************************************
*/

/*
*******************************************************************************

*
**
***
****
***
**
*


**************************************************************************************
*/
if (isset($_POST['getData']) && ($_POST['getData']) == "getProductData") {
	$returnData = array();
	$sub_array = array();
	$id = $_POST['id'];
	$query = "SELECT `c_id`, `pro_name`, `pro_desc`, `pro_img`, `pro_price` FROM `product`  WHERE `pro_id` = :id" ;
	try{
		$stmt = $pdoDbConnect -> prepare($query);
		$stmt -> execute(["id" => $id]);
		$rows = $stmt -> rowCount();
		if ($rows > 0) {
			$result = $stmt -> fetchAll();
			foreach ($result as $value) {
				$sub_array['cId'] = $value['c_id'];
				$sub_array['name'] = $value['pro_name'];
				$sub_array['desc'] = $value['pro_desc'];
				$sub_array['price'] = $value['pro_price'];
				$sub_array['img'] = $value['pro_img'];
			}
			$returnData['code'] = 200;
			$returnData['data'] = $sub_array;
		}
		else{
			$returnData['code'] = 100;
			$returnData['msg'] = "No data found";
		}
	}
	catch(PDOException $e){
		$returnData['code'] = 100;
		$returnData['msg'] = "Error user => ".$e -> getMessage();
	}
	echo json_encode($returnData);
}
/*
*******************************************************************************
*/

?>