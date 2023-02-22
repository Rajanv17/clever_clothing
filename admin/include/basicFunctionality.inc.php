<?php
include ('session.php');
require_once 'config.php';

$newConnection = new databaseConnect();
$pdoDbConnect = $newConnection->connect();


/*
**************************************************************************************
*/
if (isset($_POST['functionality']) && ($_POST['functionality']) == "categoryManage") {
    $returnData = array();
    $data = array();
    empty_validation($_POST['id'], "Something went wrong while selecting id") == false ? exit() : $id = $_POST['id'];
    empty_validation($_POST['type'], "Something went wrong while selecting type") == false ? exit() : $type = strtoupper($_POST['type']);
    $query =  "UPDATE `categories` SET `active`= :active,`deleted`= :deleted,`updatedDate`= :cTime WHERE `c_id` = :id";
    $query2 =  "UPDATE `product` SET `active`= :active,`deleted`= :deleted,`updatedDate`= :cTime WHERE `c_id` = :id";
    try{
        $stmt = $pdoDbConnect -> prepare($query);
        $type == 'D' ?
        $result = $stmt -> execute(["active" => $no, "deleted" => $yes, 'cTime' => $currentTime, "id" => $id]) :$result = $stmt -> execute(["active" => $yes, "deleted" => $no, 'cTime' => $currentTime, "id" => $id]);
        if ($result) {
            try{
                $stmt = $pdoDbConnect -> prepare($query2);
                $type == 'D' ?
                $result = $stmt -> execute(["active" => $no, "deleted" => $yes, 'cTime' => $currentTime, "id" => $id]) :$result = $stmt -> execute(["active" => $yes, "deleted" => $no, 'cTime' => $currentTime, "id" => $id]);
                if ($result) {
                    $returnData['code'] = 200;
                    $returnData['msg'] = "Category ".($type == 'D' ? "Deactivated Successfully" : "Activated Successfully");
                }
            }
            catch(PDOException $e){
                $returnData['code'] = 100;
                $returnData['msg'] = "$query2 ".$e -> getMessage();
            }
        }
    }
    catch(PDOException $e){
        $returnData['code'] = 100;
        $returnData['msg'] = "$query ".$e -> getMessage();
    }
    echo json_encode($returnData);
}
/*
*******************************************************************************
*/
/*
**************************************************************************************
*/
if (isset($_POST['functionality']) && ($_POST['functionality']) == "productManage") {
    $returnData = array();
    $data = array();
    empty_validation($_POST['id'], "Something went wrong while selecting id") == false ? exit() : $id = $_POST['id'];
    empty_validation($_POST['type'], "Something went wrong while selecting type") == false ? exit() : $type = strtoupper($_POST['type']);
    $query =  "UPDATE `product` SET `active`= :active,`deleted`= :deleted,`updatedDate`= :cTime WHERE `c_id` = :id";
    try{
        $stmt = $pdoDbConnect -> prepare($query);
        $type == 'D' ?
        $result = $stmt -> execute(["active" => $no, "deleted" => $yes, 'cTime' => $currentTime, "id" => $id]) :$result = $stmt -> execute(["active" => $yes, "deleted" => $no, 'cTime' => $currentTime, "id" => $id]);
        if ($result) {
            $returnData['code'] = 200;
            $returnData['msg'] = "Product ".($type == 'D' ? "Deactivated Successfully" : "Activated Successfully");
        }
    }
    catch(PDOException $e){
        $returnData['code'] = 100;
        $returnData['msg'] = "$query ".$e -> getMessage();
    }
    echo json_encode($returnData);
}
/*
*******************************************************************************
*/
?>