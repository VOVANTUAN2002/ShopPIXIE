<?php
session_start();
$code = $_SESSION['code'];
include_once('../db.php');
echo '<pre>';
print_r($_REQUEST);
$db = new db();
$connect = $db->connect();
$sql = "INSERT INTO `oders` (`id`, `name`, `address`, `phone`, `total`) VALUES (NULL, '" . $_REQUEST['ten'] . "', '" . $_REQUEST['address'] . "', '" . $_REQUEST['phone'] . "', '" . $_REQUEST['total'] . "' )";
$query = $connect->prepare($sql);
$query->execute();
$oders_id = $connect->lastInsertId();
// echo $oders_id;
// die();
$sql = "SELECT carts.*,image , name ,(carts.price*carts.quantity) as total FROM `carts` JOIN products ON carts.product_id = products.id WHERE code = $code ";
// echo $sql;
// chữ as có nghĩa là quy định cột đó là cái gì!

$query = $connect->prepare($sql);

$query->execute();

// carts là một mảng trổng
$carts = array();

while ($result = $query->fetch(PDO::FETCH_OBJ)) {
    array_push($carts, $result); //push vô mảng với nhiều đối tượng

}

foreach ($carts as $key => $cart) {

    $sql = "INSERT INTO `oder_details` (`id`, `price`, `quantily`, `product_id`, `oders_id`) VALUES (NULL, '$cart->price', '$cart->quantity', '$cart->product_id', '$oders_id')";
    $query = $connect->prepare($sql);
    $query->execute();
}
header('location: thongbao.php?oders_id='.$oders_id);