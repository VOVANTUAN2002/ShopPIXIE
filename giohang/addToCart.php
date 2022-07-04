<?php

include_once('../db.php');
$db = new db();
$connect = $db->connect();
session_start();
echo '<pre>';
print_r($_REQUEST);
echo '</pre>';
//nếu session code tồn tại thì $code = $_SESSION['code'] ngược lại thì $_SESSION['code'] = time();
if (isset($_SESSION['code'])) {
    $code = $_SESSION['code'];
} else {
    $_SESSION['code'] = time();
}
$sql = "SELECT * FROM `carts` WHERE code = '$code' ";
// echo $sql;
// die();
$query = $connect->prepare($sql);

$query->execute();
$products = array();
while ($result = $query->fetch(PDO::FETCH_OBJ)) {
    array_push($products, $result); //push vô mảng với nhiều đối tượng

}
foreach ($products as $key => $product) {
    if ($_REQUEST['id'] == $product->product_id) {

        echo "<pre>";
        $sql = "UPDATE `carts` SET `quantity` = '" . $_REQUEST['quantity'] + $product->quantity . "'  WHERE `carts`.`id` = $product->id";
        $query = $connect->prepare($sql);
        $query->execute();

        echo $sql;
        print_r($product);
        header('location: giohang.php');
        die();
        
    }
}
// echo "<pre>";
// print_r($products);
// die();
// echo '<pre>';
// print_r($_REQUEST);
// echo '</pre>';
$sql = "SELECT * FROM products WHERE id = '" . $_GET['id'] . "' ";

$query = $connect->prepare($sql);

$query->execute();

while ($result = $query->fetch(PDO::FETCH_OBJ)) { // dịch ra
    $product = $result; // lấy một đối tượng

}
echo '<pre>';
print_r($product);
$sql = "INSERT INTO `carts` (`id`, `product_id`, `quantity`, `price`, `code`) VALUES (NULL, '$product->id', '" . $_REQUEST['quantity'] . "', '$product->price', '$code') ";
$query = $connect->prepare($sql);

$query->execute();

header('location: giohang.php');