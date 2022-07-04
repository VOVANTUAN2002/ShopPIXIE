<?php
include_once('../db.php');
session_start();
//lấy session code
$code = $_SESSION['code'];
// echo $code;

$db = new db();
$connect = $db->connect();
//tính toán giá tiền nhân với số lượng
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
$sql = "SELECT * ,SUM(`price`*`quantity`) as total  FROM `carts` WHERE `code` = $code";
$query = $connect->prepare($sql);

$query->execute();

while ($result = $query->fetch(PDO::FETCH_OBJ)) {// dịch ra 
    $product = $result;// lấy một đối tượng
}
// echo '<pre>';
// print_r($product->total);
// die();
?>
<?php include '../layout/header.php' ?>
<br> <br> <br>
<!-- <h2 class="text-center">Hướng dẫn thiết giao diện trang giỏ hàng bằng Bootstrap</h2> -->
<h1 class="text-center">Giỏ hàng</h1>
<div class="container">
    <table id="cart" class="table table-hover table-condensed">
        <thead>
            <tr>
                <th style="width:30%">Ảnh sản phẩm</th>
                <th style="width:20%">Tên sản phẩm</th>
                <th style="width:10%">Giá</th>
                <th style="width:8%">Số lượng</th>
                <th style="width:22%" class="text-center">Thành tiền</th>
                <th style="width:10%"> </th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($carts as $key => $cart):
            ?>
                <tr>

                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-2 hidden-xs"><img  src="../images/<?= $cart->image ?>" alt="Sản phẩm 1" class="img-responsive" width="100">
                            </div>
                            </td>
                            <td>
                            <div class="col-sm-10">
                                <h4 class="nomargin"><?= $cart->name ?></h4>
                                <!-- <p>Mô tả của sản phẩm 1</p> -->
                            </div>
                        </div>
                        </td>
                    <td data-th="Price"><?= number_format($cart->price ) ?></td>
                   
                    <td data-th="Quantity"><input name="product_id[]" type="hidden" class="hidden" value="<?= $cart->product_id ?>">
                        <input name="quantity[]" class="form-control text-center" value="<?= $cart->quantity?>" type="number">
                    </td>
                    <td data-th="Subtotal" class="text-center"><?= number_format($cart->total ) ?></td>
                    <td class="actions" data-th="">                  
                    </td>

                </tr>
            <?php endforeach; ?>
            <tr>

        </tbody>

        <tfoot>
            <tr class="visible-xs">
                <!-- <td class="text-center"><strong>Tổng 200.000 đ</strong> -->
                </td>
            </tr>
            <tr>
                <td><a href="../home/home.php" class="btn btn-warning"><i class="fa fa-angle-left"></i> Tiếp tục mua hàng</a>
                </td>
            </form >

                <td colspan="2" class="hidden-xs"> </td>
                <td class="hidden-xs text-center"><strong>Tổng tiền </strong>
                <form action="pay.php?total=<?= $product->total ?>" method="post">
                    <label for="">Họ Và Tên</label>
                    <input name="ten" >
                    <label for="">Địa chỉ nhận hàng</label>
                    <input name="address">
                    <label for="">Số điện thoại</label>
                    <input name="phone"> 
                </td>
                <td><button type="submit" class="btn btn-success btn-block">Thanh toán<i class="fa fa-angle-right"></i></button>
                </td>
                </form>
            </tr>
        </tfoot>
    </table>
</div>
<?php include '../layout/footer.php' ?>