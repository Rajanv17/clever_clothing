<?php
include ('session.php');
require_once 'config.php';

$newConnection = new databaseConnect();
$pdoDbConnect = $newConnection->connect();


/*
*******************************************************************************
*
*
**
***
****
***
**
*
*/

if (isset($_POST['getData']) && ($_POST['getData']) == "getCategory") {
	$returnData = array();
	$data = array();
	// $e_id = getId($userId);
	$query = "SELECT `c_id`, `c_name` FROM `categories` WHERE `active` = :yes ORDER BY `c_name`";
	try {
		$stmt = $pdoDbConnect->prepare($query);
		$stmt->execute(["yes" => $yes]);
		$rows = $stmt->rowCount();
		if ($rows > 0) {
			$result = $stmt->fetchAll();
			foreach ($result as $value) {
				$sub_array['id'] = $value['c_id'];
				$sub_array['name'] = $value['c_name'];
				$data[] = $sub_array;
			}
			$returnData['code'] = 200;
			$returnData['data'] = $data;
		} else {
			$returnData['code'] = 100;
			$returnData['msg'] = "No Category data found";
		}
	} catch (PDOException $e) {
		$returnData['code'] = 100;
		$returnData['msg'] = "$query=> " . $e->getMessage();
	}
	echo json_encode($returnData);
}
/*
*******************************************************************************
*
*
**
***
****
***
**
*
*/
?>