<?php
include_once('../db.php');
session_start();
foreach ($_SESSION['user'] as $user) {
    if(isset($user->role)){

    
    if ($user->role == "Giám đốc") {
        break;
    } else {
        header("location:../login.php");
        die();
    }
}else{
    header("location:../login.php");
    die();
}
}
echo "<pre>";
print_r($_REQUEST);
$id = (isset($_REQUEST['id']) && !empty($_REQUEST['id'])) ? ($_REQUEST['id']) : "";
$db = new db();
$connect = $db->connect();
$sql =  "DELETE FROM `nhanvien` WHERE `nhanvien`.`id` = '".$_REQUEST["id"]. "'";
echo $sql;
$connect->exec($sql);
header("Location: index.php");