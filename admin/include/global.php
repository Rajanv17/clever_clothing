<?php
define('TIMEZONE', 'Asia/Kolkata');
date_default_timezone_set(TIMEZONE);
$currentTime = date("Y-m-d H:i:s");
$date = date('Y-m-d');
$currentDate = date('d');
$currentMonth = date('m');
$currentYear = date('Y');
$rightNow = time();
$imageTime = round(microtime(true)*10000);
$yes = 'Y';
$no = 'N';
$link_api = "http://192.168.0.108/projects/cc_pro/";
$link = "admin/";
$days =  180;

$DatabaseFile = null;

function empty_validation($key, $msg)
{
	if (empty($key)) {
		if ($key != "") {
			return true;
		} else if (is_null($msg)) {
			return false;
		} else {
			http_response_code(200);
			$response['code'] = 100;
			$response['msg'] = $msg;
			echo json_encode($response);
			return false;
			exit();
		}
	} else {
		return true;
	}
}

function is_setCheck($key){
	return isset($key);
}

function isset_message($msg)
{
	http_response_code(200);
	$response['code'] = 100;
	$response['msg'] = $msg;
	return json_encode($response);
}

function empty_array_validation($key, $msg)
{
	if (sizeof($key) == 0) {
		$response['code'] = 100;
		$response['msg'] = $msg;
		echo json_encode($response);
		return false;
		exit();
	} else {
		return true;
	}
}

function justTrim($key)
{
	return trim($key);
}

function numericCheck($key, $msg)
{
	$key = justTrim($key);
	if (!is_numeric($key)) {
		$response['code'] = 100;
		$response['msg'] = $msg;
		echo json_encode($response);
		return false;
		exit();
	} else {
		return true;
	}
}
function moneyFormatIndia($num)
{
	$explrestunits = "";
	if (strlen($num) > 3) {
		$lastthree = substr($num, strlen($num) - 3, strlen($num));
		$restunits = substr($num, 0, strlen($num) - 3); // extracts the last three digits
		$restunits = (strlen($restunits) % 2 == 1) ? "0" . $restunits : $restunits; // explodes the remaining digits in 2's formats, adds a zero in the beginning to maintain the 2's grouping.
		$expunit = str_split($restunits, 2);
		for ($i = 0; $i < sizeof($expunit); $i++) {
			// creates each of the 2's group and adds a comma to the end
			if ($i == 0) {
				$explrestunits .= (int)$expunit[$i] . ","; // if is first value , convert into integer
			} else {
				$explrestunits .= $expunit[$i] . ",";
			}
		}
		$thecash = $explrestunits . $lastthree;
	} else {
		$thecash = $num;
	}
	return $thecash; // writes the final format where $currency is the currency symbol.
}
function makeDirectory($dirpath)
{
	$mode = 0777;
	return is_dir($dirpath) || mkdir($dirpath, $mode, true);
}
function fileCheck($fileError, $fileSize)
{
	if ($fileError == 4 || $fileSize == 0) {
		return true;
	}
	if ($fileError != 4 && $fileSize != 0) {
		return false;
	}
}
function fileUpload($fileName, $fileError, $fileSize, $fileTempName, $fileNewName, $folderName, $fileMax_Size, $fileExt, $filePath)
{
	$imageExt = array("image/jpg", "image/jpeg", "image/png");
	$pdfExt = array("application/pdf");
	$svgExt = array("image/svg+xml");
	$directory = false;
	$targetDir = $folderName . "/";
	$databaseDir = substr($targetDir, 3);

	if (!file_exists($targetDir)) {
		$directory = makeDirectory($targetDir);
	} else {
		$directory = true;
	}

	$baseExtension = explode(".", $fileName);
	$extension = end($baseExtension);
	$newName = str_replace(" ", "_", $fileNewName) . "_" . round(microtime(true)*10000) . "." . $extension;
	$targetFile = $targetDir . $newName;
	$GLOBALS["$filePath"] = $databaseDir . $newName;

	$uploadStatus = 1;
	$fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
	$imageStatus = false;

	if ($fileError != 4 && $fileSize != 0) {
		if ($directory) {
			$finfo = new finfo();
			$fileinfo = $finfo->file($fileTempName, FILEINFO_MIME_TYPE);
			if ($fileExt == 1) {
				if ($fileinfo == $imageExt[0] || $fileinfo == $imageExt[1] || $fileinfo == $imageExt[2]) {
					$uploadStatus = 1;
				} else {
					$format = substr($fileinfo, strpos($fileinfo, '/') + 1);
					$uploadStatus = 0;
					$response['code'] = 100;
					$response['msg'] = "This is $format format and it's not a valid format";
					echo json_encode($response);
					return false;
					exit();
				}
			}
			if ($fileExt == 2) {
				if ($fileinfo == $pdfExt[0]) {
					$uploadStatus = 1;
				} else {
					$format = substr($fileinfo, strpos($fileinfo, '/') + 1);
					$uploadStatus = 0;
					$response['code'] = 100;
					$response['msg'] = "This is $format format and it's not a valid format";
					echo json_encode($response);
					return false;
					exit();
				}
			}
			if ($fileExt == 3) {
				if ($fileinfo == $svgExt[0]) {
					$uploadStatus = 1;
				} else {
					$format = substr($fileinfo, strpos($fileinfo, '/') + 1);
					$uploadStatus = 0;
					$response['code'] = 100;
					$response['msg'] = "This is $format format and it's not a valid format";
					echo json_encode($response);
					return false;
					exit();
				}
			}
			if ($fileExt == 4) {
				if ($fileinfo == $imageExt[0] || $fileinfo == $imageExt[1] || $fileinfo == $imageExt[2]  || $fileinfo == $pdfExt[0]) {
					$uploadStatus = 1;
				} else {
					$format = substr($fileinfo, strpos($fileinfo, '/') + 1);
					$uploadStatus = 0;
					$response['code'] = 100;
					$response['msg'] = "This is $format format and it's not a valid format";
					echo json_encode($response);
					return false;
					exit();
				}
			}
			if ($fileExt == 5) {
				if ($fileinfo ==  $imageExt[2]) {
					$uploadStatus = 1;
				} else {
					$format = substr($fileinfo, strpos($fileinfo, '/') + 1);
					$uploadStatus = 0;
					$response['code'] = 100;
					$response['msg'] = "This is $format format and it's not a valid format";
					echo json_encode($response);
					return false;
					exit();
				}
			}
			if ($fileExt == 6) {
				$uploadStatus = 1;
			}
			// checking if file already exists
			if (file_exists($targetFile)) {
				$uploadStatus = 0;
				$response['code'] = 100;
				$response['msg'] = "This file already exists";
				echo json_encode($response);
				return false;
				exit();
			}

			//checking file size is bigger than 1 mb 150000
			if ($fileSize > $fileMax_Size) {
				$uploadStatus = 0;
				$response['code'] = 100;
				$response['msg'] = "$fileName File is too large file size is :" . number_format((float)($fileSize / pow(1024, 2)), 3, '.', '') . " mb , size must be less than ".number_format((float)($fileMax_Size / pow(1024, 2)), 3, '.', '')."  MB";
				echo json_encode($response);
				return false;
				exit();
			}

			/*			//check verification for the image type
		if ($fileType != "jpg" && $fileType != "png" && $fileType != "jpeg" && $fileType != "pdf")
		{
			$uploadStatus = 0;
			$response['code'] = 100;
			$response['msg'] = "Wrong Format";
			echo json_encode($response);
			return false;
			exit();
		}*/

			//checking for the upload status
			if ($uploadStatus == 0) {
				$response['code'] = 100;
				$response['msg'] = "File not uploaded";
				echo json_encode($response);
				return false;
				exit();
			} else {
				if (move_uploaded_file($fileTempName, $targetFile)) {
					$msg = "The file " . basename($fileName) . " has been uploaded.";
					$imageStatus = true;
					return true;
					exit();
				} else {
					$response['code'] = 100;
					$response['msg'] = "there was error Uploading $fileName file";
					echo json_encode($response);
					return false;
					exit();
				}
			}
		} else {
			$response['code'] = 100;
			$response['msg'] = "unable to create directory";
			echo json_encode($response);
			return false;
			exit();
		}
	} else {
		$response['code'] = 100;
		$response['msg'] = "Please select image";
		echo json_encode($response);
		return false;
		exit();
	}
}

function changeText($text)
{
	return ucwords(strtolower(trim($text)));
}

function resetDate($date)
{
	return date('Y-m-d', strtotime(str_replace('/', '-', $date)));
}

function userFDate($date)
{
	return date('d-m-Y', strtotime(str_replace('/', '-', $date)));
}

function userFDateTime($date)
{
	return date('d-m-Y h:i:s A', strtotime(str_replace('/', '-', $date)));
}

function generateCode(){
	return sprintf('%03u', mt_rand(100,999));
}

$method = $_SERVER['REQUEST_METHOD'];

function getId($token)
{
	$idQuery = "SELECT e_id FROM user WHERE u_id = :token";
	try {
		$accountStatus = $GLOBALS['pdoDbConnect']->prepare($idQuery);
		$accountStatus->execute(["token" => $token]);
		$statusRowCount = $accountStatus->rowCount();
		$ans = $accountStatus->fetch();
		if ($statusRowCount > 0) {
			return $ans['e_id'];
		} else {
			return 0;
		}
	} catch (PDOException $e) {
		http_response_code(400);
		$response['code'] = 100;
		$response['message'] = '$idQuery ' . $e->getMessage();
		echo json_encode($response);
		return false;
		die();
	}
}

function getuserId($token)
{
	$idQuery = "SELECT `u_id` FROM `user` WHERE `e_id` = :token";
	try {
		$accountStatus = $GLOBALS['pdoDbConnect']->prepare($idQuery);
		$accountStatus->execute(["token" => $token]);
		$statusRowCount = $accountStatus->rowCount();
		$ans = $accountStatus->fetch();
		if ($statusRowCount > 0) {
			$memberData['userId'] = $ans['u_id'];
			return $memberData;
		} else {
			return 0;
		}
	} catch (PDOException $e) {
		http_response_code(400);
		$response['code'] = 100;
		$response['message'] = '$idQuery ' . $e->getMessage();
		echo json_encode($response);
		return false;
		die();
	}
}
