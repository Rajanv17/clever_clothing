<?php
if (session_status() == PHP_SESSION_NONE){
	if (session_id() === "") {
		session_start();
		$sCus = $cusId = $userType = $userImage = $sUserContact = $sMemId = $loginTime = $memberBName = null;

		if(isset($_SESSION['ccuser']) && !empty($_SESSION['ccuser'])){
			$sCus = $_SESSION['ccuser'];
			$cusId = $_SESSION['ccuserId'];
			$sCusContact = $_SESSION['ccuserContact'];
		}
		if (isset($_SESSION['ccloginTimeStamp'])) {
			if ((time() - $_SESSION['ccloginTimeStamp'])>900) {
				session_unset();
				session_destroy();
				ob_start();
				header("location:index.php");
				ob_flush();
				die();
			}
			else{
				$_SESSION['ccloginTimeStamp'] = time();
			}
		}
	}
}
if(!isset($_SESSION['ccuser']) && empty($_SESSION['ccuser'])){
	// $_SESSION['msg'] = "please Login first";
	ob_clean();
	ob_start();
	header("location:index.php");
	ob_flush();
	die();
}
?>