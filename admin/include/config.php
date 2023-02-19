<?php
include 'global.php';
class databaseConnect
{
	private $hostname = "localhost"; // server name localhost:3306
	private $username = "root"; // username  user
	private $password = "";// password  user123
	private $databaseName = "cc_pro"; // our database name
/*	private $username = "dnphu3bk_admin";
	private $password = "P#}7&A)IRmCD";
	private $databaseName = "dnphu3bk_dnp";*/

	private function pdoDbConnect(){
		$databaseType = 'mysql:host='.$this->hostname.';dbname='.$this->databaseName;
		$pdoDbConnect = new PDO($databaseType,$this->username,$this->password);
		$pdoDbConnect -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
		$pdoDbConnect -> setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
		$pdoDbConnect -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		try {
			return $pdoDbConnect;
		} catch (Exception $e) {
			echo 'Error: '. $e->getMessage();
		}
	}
	public function connect(){
		return $this->pdoDbConnect();
	}
}
?>