<?php
include_once('../db.php');
session_start();
$code = $_SESSION['code'];
// echo $code;

echo "<pre>";
print_r($_REQUEST);
echo "</pre>";
/*
Array
(
    [product_id] => Array
        (
            [0] => 25
            [1] => 2
            [2] => 2
        )

    [quantity] => Array
        (
            [0] => 1
            [1] => 1
            [2] => 1
        )
)
*/
$db = new db();
$connect = $db->connect();
foreach ($_REQUEST['product_id'] as $key => $product_id) {
    // echo $product_id . '<br>';
    // câu sql này để lấy id của cart 
    $sql = "SELECT * FROM `carts` WHERE code = $code AND product_id = $product_id";
    $query = $connect->prepare($sql);

    $query->execute();

    while ($result = $query->fetch(PDO::FETCH_OBJ)) { // dịch ra
        $cart = $result; // lấy một đối tượng
        
    }
   

    // echo $cart->quantity;
    // cập nhật 1 phần tử trong mảng cart
    //$_REQUEST["quantity"][$key] là quantity của request 
    $sql = "UPDATE `carts` SET `quantity` = '".$_REQUEST["quantity"][$key]."' WHERE `carts`.`id` = $cart->id";
    $query = $connect->prepare($sql);

    $query->execute();
    
}
header("location:giohang.php");