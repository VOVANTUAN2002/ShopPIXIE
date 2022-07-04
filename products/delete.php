<?php
session_start();
include_once '../db.php';
echo "<pre>";
print_r($_REQUEST);
$id = (isset($_REQUEST['id']) && !empty($_REQUEST['id'])) ? ($_REQUEST['id']) : "";
try {
    $db = new db();
    $connect = $db->connect();
    $sql =  "DELETE FROM `products` WHERE `products`.`id` = $id ";

    $delete = $connect->exec($sql);
    if(!$delete){
        throw new Exception();
    }
    header("Location: list.php");
} catch (Exception $e) {
    $_SESSION['erorr'] = "Không thể xóa vì dính khóa ngoại";
    header("Location: list.php");
}
