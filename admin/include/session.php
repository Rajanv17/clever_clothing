<?php
if (session_status() == PHP_SESSION_NONE){
	if (session_id() === "") {
		session_start();
		$sUser = $userId = $sUserContact = null;

		if(isset($_SESSION['ccuser']) && !empty($_SESSION['ccuser'])){
			$sUser = $_SESSION['ccuser'];
			$userId = $_SESSION['ccuserId'];
			$sUserContact = $_SESSION['ccuserContact'];
		}
	}
}
if(!isset($_SESSION['ccuser']) && empty($_SESSION['ccuser'])){
	// $_SESSION['msg'] = "please Login first";
	ob_clean();
	ob_start();
	header("location:login.php");
	ob_flush();
	die();
}
?>