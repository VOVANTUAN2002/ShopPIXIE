<?php
//Kết nối cơ  sở dữ liệu

include_once('../db.php');

//controller
if ($_POST && $_POST['name'] && $_POST['price'] && $_POST['image'] ) {

    //MOdel
    $db = new db();
    $connect = $db->connect();
    // $id = $_GET['id'];
    
    $sql = "INSERT INTO `products` (`id`, `name`, `price`, `image`) VALUES (NULL, '".$_POST['name']."', '".$_POST['price']."', '".$_POST['image']."')";
    
    // echo '<pre>';
    // print_r($sql);
    // die();
    $connect->exec($sql);
    header("location: list.php");
}
?>
<!-- View -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Thêm</title>
</head>

<body>
    <div class="container">
        <h1 class="text-center">Thêm thời khóa biểu</h1>
        <form action="" method="POST" class="form">
            <div class="form-group">
                <label>Tên</label>
                <input value="" name="name" class="form-control">
            </div>
            <div class="form-group">
                <label>Giá</label>
                <input value="" name="price" class="form-control">
            </div>
            <div class="form-group">
                <label>Ảnh</label>
                <input value="" name="image" class="form-control">
                <br>
            </div>
            <input type="submit" name="submit" class="btn btn-dark" value="Lưu">
            <a href="list.php" class="btn btn-dark">quay lại</a>
    </div>
    </form>
</body>

</html>