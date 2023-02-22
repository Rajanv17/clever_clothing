<?php
include ('session.php');
require_once 'config.php';

$newConnection = new databaseConnect();
$pdoDbConnect = $newConnection->connect();


/*
*****************************************************************************************
*
* *
**
***
*****
******
*****
****
***
**
*/
if (isset($_POST['fetchType']) && ($_POST['fetchType']) == "fetch_categories") {

	// $bankId = $_POST['bnk_id'];

	function getButton($btnId, $status, $deleted)
	{
		$val = '';
		if ($status == 'Y') {
			$val .= '<button class="btn btn-block btn-outline-danger btn-sm deactive" id=' . $btnId . '>Deactive</button>
			<button class="btn btn-block btn-outline-info btn-sm edit" id=' . $btnId . '>Edit</button>';
		} else {
			$val .= '<button class="btn btn-block btn-outline-success btn-sm actived" id=' . $btnId . '>Active</button>';
		}
		return $val;
	}

	function get_total_records()
	{
		$tQuery = "SELECT `c_id` FROM `categories`";
		$stmt = $GLOBALS['pdoDbConnect']->prepare($tQuery);
		$stmt->execute();
		return $stmt->rowCount();
	}

	$query = "";

	$columns = array('c_name', 'c_sequence', 'c_meta_title', 'c_meta_desc');

	$query .= "SELECT `c_id`, `c_name`, `active`, `deleted` FROM `categories`";

	$dbE = false;

	if (isset($_POST["search"]["value"]) && !empty($_POST["search"]["value"])) {
		$query .= 'WHERE `c_name` LIKE :a1 ';
		$dbE = true;
	}

	if (isset($_POST["order"])) {
		$query .= 'ORDER BY ' . $columns[$_POST["order"]["0"]['column']] . ' ' . $_POST["order"]["0"]['dir'] . ' ';
	} else {
		$query .= 'ORDER BY `c_name` ASC ';
	}

	if ($_POST["length"] != -1) {
		$query .= 'LIMIT ' . $_POST["start"] . ', ' . $_POST["length"];
	}

	$statement = $pdoDbConnect->prepare($query);

	if ($dbE) {
		$statement->execute(["a1" => "%" . $_POST["search"]["value"] . "%"]);
	} else {
		$statement->execute();
	}

	$filtered_rows = $statement->rowCount();
	$result = $statement->fetchAll();
	$data = array();

	foreach ($result as $value) {
		$sub_array = array();
		$sub_array[] = $value['c_name'];
		$sub_array[] = getButton($value['c_id'], $value['active'], $value['deleted']);
		$data[] = $sub_array;
	}
	$output = array(
		"draw"              => intval($_POST['draw']),
		"recordsFiltered"   => get_total_records(),
		"recordsTotal"      => $filtered_rows,
		"data"              => $data
	);
	$pdoDbConnect = null;
	echo json_encode($output);
}
/*
*****************************************************************************************
*
* *
**
***
*****
******
*****
****
***
**
*/

/*
*****************************************************************************************
*
* *
**
***
*****
******
*****
****
***
**
*/
if (isset($_POST['fetchType']) && ($_POST['fetchType']) == "fetch_products") {

	// $bankId = $_POST['bnk_id'];

	function getButton($btnId, $status, $deleted)
	{
		$val = '';
		if ($status == 'Y') {
			$val .= '<button class="btn btn-block btn-outline-danger btn-sm deactive" id=' . $btnId . '>Deactive</button>
			<button class="btn btn-block btn-outline- btn-sm edit" id=' . $btnId . '>Edit</button>';
		} else {
			$val .= '<button class="btn btn-block btn-outline-success btn-sm actived" id=' . $btnId . '>Active</button>';
		}
		return $val;
	}

	function get_total_records()
	{
		$tQuery = "SELECT `c_id` FROM `categories`";
		$stmt = $GLOBALS['pdoDbConnect']->prepare($tQuery);
		$stmt->execute();
		return $stmt->rowCount();
	}

	$query = "";

	$columns = array('pro_name', 'c_name', 'pro_desc', 'pro_img', 'pro_price');

	$query .= "SELECT `product`.`pro_id`, `categories`.`c_name`, `product`.`pro_name`, `product`.`pro_desc`, `product`.`pro_img`, `product`.`pro_price`, `product`.`active`, `product`.`deleted` FROM `product` LEFT JOIN `categories` ON `categories`.`c_id` = `product`.`c_id` ";

	$dbE = false;

	if (isset($_POST["search"]["value"]) && !empty($_POST["search"]["value"])) {
		$query .= 'WHERE `pro_name` LIKE :a1 ';
		$query .= 'WHERE `c_name` LIKE :a2 ';
		$query .= 'WHERE `pro_desc` LIKE :a3 ';
		$query .= 'WHERE `pro_price` LIKE :a4 ';
		$dbE = true;
	}

	if (isset($_POST["order"])) {
		$query .= 'ORDER BY ' . $columns[$_POST["order"]["0"]['column']] . ' ' . $_POST["order"]["0"]['dir'] . ' ';
	} else {
		$query .= 'ORDER BY `pro_name` ASC ';
	}

	if ($_POST["length"] != -1) {
		$query .= 'LIMIT ' . $_POST["start"] . ', ' . $_POST["length"];
	}

	$statement = $pdoDbConnect->prepare($query);

	if ($dbE) {
		$statement->execute(["a1" => "%" . $_POST["search"]["value"] . "%", "a2" => "%" . $_POST["search"]["value"] . "%", "a3" => "%" . $_POST["search"]["value"] . "%", "a4" => "%" . $_POST["search"]["value"] . "%"]);
	} else {
		$statement->execute();
	}

	$filtered_rows = $statement->rowCount();
	$result = $statement->fetchAll();
	$data = array();

	foreach ($result as $value) {
		$sub_array = array();
		$sub_array[] = $value['c_name'];
		$sub_array[] = $value['pro_name'];
		$sub_array[] = $value['pro_desc'];
		$sub_array[] = $value['pro_price'];
		$sub_array[] = "<img src='".$value['pro_img']."' width='300' height='300' class='img-fluid'>";
		$sub_array[] = getButton($value['pro_id'], $value['active'], $value['deleted']);
		$data[] = $sub_array;
	}
	$output = array(
		"draw"              => intval($_POST['draw']),
		"recordsFiltered"   => get_total_records(),
		"recordsTotal"      => $filtered_rows,
		"data"              => $data
	);
	$pdoDbConnect = null;
	echo json_encode($output);
}
/*
*****************************************************************************************
*
* *
**
***
*****
******
*****
****
***
**
*/

/*
*****************************************************************************************
*
* *
**
***
*****
******
*****
****
***
**
*/
if (isset($_POST['fetchType']) && ($_POST['fetchType']) == "fetch_orders") {
	function get_total_records()
	{
		$tQuery = "SELECT `crt_id` FROM `cart`";
		$stmt = $GLOBALS['pdoDbConnect']->prepare($tQuery);
		$stmt->execute();
		return $stmt->rowCount();
	}

	$query = "";

	$columns = array('cus_name', 'pro_name', 'qty', 'total');

	$query .= "SELECT `customer`.`cus_name`, `product`.`pro_name`, `cart`.`qty`, `cart`.`total`, `cart`.`crt_id` FROM `cart` LEFT JOIN `customer` ON `customer`.`cus_id` = `cart`.`cus_id` LEFT JOIN `product` ON `product`.`pro_id` = `cart`.`pro_id` WHERE `cart`.`ordered` = 'Y'";

	$dbE = false;

	if (isset($_POST["search"]["value"]) && !empty($_POST["search"]["value"])) {
		$query .= 'WHERE `cus_name` LIKE :a1 ';
		$query .= 'WHERE `pro_name` LIKE :a2 ';
		$query .= 'WHERE `qty` LIKE :a3 ';
		$query .= 'WHERE `total` LIKE :a4 ';
		$dbE = true;
	}

	if (isset($_POST["order"])) {
		$query .= 'ORDER BY ' . $columns[$_POST["order"]["0"]['column']] . ' ' . $_POST["order"]["0"]['dir'] . ' ';
	} else {
		$query .= 'ORDER BY `cart`.`crt_id` DESC ';
	}

	if ($_POST["length"] != -1) {
		$query .= 'LIMIT ' . $_POST["start"] . ', ' . $_POST["length"];
	}

	$statement = $pdoDbConnect->prepare($query);

	if ($dbE) {
		$statement->execute(["a1" => "%" . $_POST["search"]["value"] . "%", "a2" => "%" . $_POST["search"]["value"] . "%", "a3" => "%" . $_POST["search"]["value"] . "%", "a4" => "%" . $_POST["search"]["value"] . "%"]);
	} else {
		$statement->execute();
	}

	$filtered_rows = $statement->rowCount();
	$result = $statement->fetchAll();
	$data = array();

	foreach ($result as $value) {
		$sub_array = array();
		$sub_array[] = $value['cus_name'];
		$sub_array[] = $value['pro_name'];
		$sub_array[] = $value['qty'];
		$sub_array[] = $value['total'];
		$data[] = $sub_array;
	}
	$output = array(
		"draw"              => intval($_POST['draw']),
		"recordsFiltered"   => get_total_records(),
		"recordsTotal"      => $filtered_rows,
		"data"              => $data
	);
	$pdoDbConnect = null;
	echo json_encode($output);
}
/*
*****************************************************************************************
*
* *
**
***
*****
******
*****
****
***
**
*/

?>