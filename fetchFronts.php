<?php 
require_once 'admin/include/config.php';

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
if (isset($_POST['getData']) && ($_POST['getData']) == "getProduct") {
	$returnData = array();
	$data = array();
	$query = "SELECT `pro_id`, `pro_name`, `pro_desc`, `pro_img`, `pro_price` FROM `product` WHERE `active` = :yes";
	try {
		$stmt = $pdoDbConnect->prepare($query);
		$stmt->execute(["yes" => $yes]);
		$rows = $stmt->rowCount();
		if ($rows > 0) {
			$result = $stmt->fetchAll();
			foreach ($result as $value) {
				$sub_array['id'] = $value['pro_id'];
				$sub_array['name'] = $value['pro_name'];
				$sub_array['desc'] = $value['pro_desc'];
				$sub_array['img'] = $link.$value['pro_img'];
				$sub_array['price'] = $value['pro_price'];
				$data[] = $sub_array;
			}
			$returnData['code'] = 200;
			$returnData['data'] = $data;
		} else {
			$returnData['code'] = 100;
			$returnData['msg'] = "No Product data available";
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
if (isset($_POST['getData']) && ($_POST['getData']) == "getProductCat") {
	$returnData = array();
	$data = array();
	$id = $_POST['id'];
	$query = "SELECT `pro_id`, `pro_name`, `pro_desc`, `pro_img`, `pro_price` FROM `product` WHERE `active` = :yes AND `c_id` = :id";
	try {
		$stmt = $pdoDbConnect->prepare($query);
		$stmt->execute(["yes" => $yes, "id" => $id]);
		$rows = $stmt->rowCount();
		if ($rows > 0) {
			$result = $stmt->fetchAll();
			foreach ($result as $value) {
				$sub_array['id'] = $value['pro_id'];
				$sub_array['name'] = $value['pro_name'];
				$sub_array['desc'] = $value['pro_desc'];
				$sub_array['img'] = $link.$value['pro_img'];
				$sub_array['price'] = $value['pro_price'];
				$data[] = $sub_array;
			}
			$returnData['code'] = 200;
			$returnData['data'] = $data;
		} else {
			$returnData['code'] = 100;
			$returnData['msg'] = "No Product data available";
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
if (isset($_POST['getData']) && ($_POST['getData']) == "getSingleProduct") {
	$returnData = array();
	$data = array();
	$id = $_POST['id'];
	$query = "SELECT `pro_id`, `pro_name`, `pro_desc`, `pro_img`, `pro_price` FROM `product` WHERE `active` = :yes AND `pro_id` = :id";
	try {
		$stmt = $pdoDbConnect->prepare($query);
		$stmt->execute(["yes" => $yes, "id" => $id]);
		$rows = $stmt->rowCount();
		if ($rows > 0) {
			$result = $stmt->fetchAll();
			foreach ($result as $value) {
				$sub_array['id'] = $value['pro_id'];
				$sub_array['name'] = $value['pro_name'];
				$sub_array['desc'] = $value['pro_desc'];
				$sub_array['img'] = $link.$value['pro_img'];
				$sub_array['price'] = "Rs. " .$value['pro_price'];
				$data[] = $sub_array;
			}
			$returnData['code'] = 200;
			$returnData['data'] = $data;
		} else {
			$returnData['code'] = 100;
			$returnData['msg'] = "No Product data available";
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
if (isset($_POST['getData']) && ($_POST['getData']) == "getRelProduct") {
	$returnData = array();
	$data = array();
	$id = $_POST['id'];
	$query = "SELECT `pro_id`, `pro_name`, `pro_desc`, `pro_img`, `pro_price` FROM `product` WHERE `active` = :yes AND `c_id` = (SELECT `c_id` FROM `product` WHERE `pro_id` = :id) ORDER BY RAND() LIMIT 4";
	try {
		$stmt = $pdoDbConnect->prepare($query);
		$stmt->execute(["yes" => $yes, "id" => $id]);
		$rows = $stmt->rowCount();
		if ($rows > 0) {
			$result = $stmt->fetchAll();
			foreach ($result as $value) {
				$sub_array['id'] = $value['pro_id'];
				$sub_array['name'] = $value['pro_name'];
				$sub_array['desc'] = $value['pro_desc'];
				$sub_array['img'] = $link.$value['pro_img'];
				$sub_array['price'] = $value['pro_price'];
				$data[] = $sub_array;
			}
			$returnData['code'] = 200;
			$returnData['data'] = $data;
		} else {
			$returnData['code'] = 100;
			$returnData['msg'] = "No Product data available";
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
if (isset($_POST['getData']) && ($_POST['getData']) == "getBestProduct") {
	$returnData = array();
	$data = array();
	$query = "SELECT `pro_id`, `pro_name`, `pro_desc`, `pro_img`, `pro_price` FROM `product` WHERE `active` = :yes  ORDER BY RAND() LIMIT 4 ";
	try {
		$stmt = $pdoDbConnect->prepare($query);
		$stmt->execute(["yes" => $yes]);
		$rows = $stmt->rowCount();
		if ($rows > 0) {
			$result = $stmt->fetchAll();
			foreach ($result as $value) {
				$sub_array['id'] = $value['pro_id'];
				$sub_array['name'] = $value['pro_name'];
				$sub_array['desc'] = $value['pro_desc'];
				$sub_array['img'] = $link.$value['pro_img'];
				$sub_array['price'] = $value['pro_price'];
				$data[] = $sub_array;
			}
			$returnData['code'] = 200;
			$returnData['data'] = $data;
		} else {
			$returnData['code'] = 100;
			$returnData['msg'] = "No Product data available";
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
if (isset($_POST['getData']) && ($_POST['getData']) == "getCart") {
	$returnData = array();
	$data = array();
	$query = "SELECT `cart`.`crt_id`, `product`.`pro_id`, `product`.`pro_name`, `product`.`pro_img`, `product`.`pro_price` FROM `cart` LEFT JOIN `product` ON `product`.`pro_id` = `cart`.`pro_id` WHERE `cart`.`active` = :yes AND `cart`.`ordered` = 'N'";
	try {
		$stmt = $pdoDbConnect->prepare($query);
		$stmt->execute(["yes" => $yes]);
		$rows = $stmt->rowCount();
		if ($rows > 0) {
			$result = $stmt->fetchAll();
			foreach ($result as $value) {
				$sub_array['id'] = $value['crt_id'];
				$sub_array['proId'] = $value['pro_id'];
				$sub_array['name'] = $value['pro_name'];
				$sub_array['img'] = $link.$value['pro_img'];
				$sub_array['price'] = $value['pro_price'];
				$data[] = $sub_array;
			}
			$returnData['code'] = 200;
			$returnData['data'] = $data;
		} else {
			$returnData['code'] = 100;
			$returnData['msg'] = "No Product data available";
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
if (isset($_POST['getData']) && ($_POST['getData']) == "getCartTot") {
	$returnData = array();
	$data = array();
	$query = "SELECT SUM(`total`) AS 'total' FROM `cart` WHERE `active` = :yes AND `ordered` = 'N'";
	try {
		$stmt = $pdoDbConnect->prepare($query);
		$stmt->execute(["yes" => $yes]);
		$rows = $stmt->rowCount();
		if ($rows > 0) {
			$result = $stmt->fetchAll();
			foreach ($result as $value) {
				$sub_array['total'] = "Rs. ".$value['total'];
				$data[] = $sub_array;
			}
			$returnData['code'] = 200;
			$returnData['data'] = $data;
		} else {
			$returnData['code'] = 100;
			$returnData['msg'] = "No Product data available";
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
if (isset($_POST['getData']) && ($_POST['getData']) == "getHeadCats") {
	$returnData = array();
	$data = array();
	$query = "SELECT `c_id`, `c_name` FROM `categories` WHERE `active` = :yes";
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
			$returnData['msg'] = "No Categories available";
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