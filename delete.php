<?php
include_once('db.php');
echo "<pre>";
print_r($_REQUEST);
$id = (isset($_REQUEST['id']) && !empty($_REQUEST['id'])) ? ($_REQUEST['id']) : "";
$db = new db();
$connect = $db->connect();
$sql =  "DELETE FROM `customers` WHERE `customers`.`id` = $id";
$connect->exec($sql);
header("Location: adim.php");