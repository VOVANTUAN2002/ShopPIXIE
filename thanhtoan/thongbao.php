<?php
include_once('../db.php');
// echo "<Pre>";
// print_r($_REQUEST);
// echo "</pre>";
$sql = "SELECT oder_details.*,image,products.name, (oder_details.price*oder_details.quantily) 
as total FROM `oders` JOIN oder_details 
ON oders.id = oder_details.oders_id JOIN products 
ON products.id = oder_details.product_id WHERE oders.id = '".$_REQUEST['oders_id']."'";
// echo $sql;
// die();
$db = new db();
$connect = $db->connect();
$query = $connect->prepare($sql);
$query->execute();
// carts là một mảng trổng
$oders = array();

while ($result = $query->fetch(PDO::FETCH_OBJ)) {
    array_push($oders, $result); //push vô mảng với nhiều đối tượng

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php include '../layout/header.php' ?>
<br> <br> <br>
<!-- <h2 class="text-center">Hướng dẫn thiết giao diện trang giỏ hàng bằng Bootstrap</h2> -->
<h1 class="text-center">Giỏ hàng đã mua</h1>
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
            foreach ($oders as $key => $cart):
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
                        <p name="quantily[]" class="form-control text-center" value="" type="number"><?= $cart->quantily?></p>
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
               
                </td>
            </tr>
            <tr>
                <td><a href="../home/home.php" class="btn btn-warning"><i class="fa fa-angle-left"></i> Tiếp tục mua hàng</a>
                </td>
            </tr>
        </tfoot>
    </table>
</div>
<?php include '../layout/footer.php' ?>
</body>
</html>