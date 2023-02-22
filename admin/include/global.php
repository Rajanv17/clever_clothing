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
$link =  "admin/";
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
// image data will be stored in $_files type array
function fileUpload($fileName, $fileError, $fileSize, $fileTempName, $fileNewName, $folderName, $fileMax_Size, $fileExt, $filePath)
{
	$imageExt = array("image/jpg", "image/jpeg", "image/png");
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

			//checking file size is bigger than 1 mb 150000
			if ($fileSize > $fileMax_Size) {
				$uploadStatus = 0;
				$response['code'] = 100;
				$response['msg'] = "$fileName File is too large file size is :" . number_format((float)($fileSize / pow(1024, 2)), 3, '.', '') . " mb , size must be less than ".number_format((float)($fileMax_Size / pow(1024, 2)), 3, '.', '')."  MB";
				echo json_encode($response);
				return false;
				exit();
			}

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


$method = $_SERVER['REQUEST_METHOD'];

