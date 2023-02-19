<?php
include ('session.php');
require_once 'config.php';

$newConnection = new databaseConnect();
$pdoDbConnect = $newConnection->connect();


?>