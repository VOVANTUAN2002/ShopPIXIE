<?php
include_once('../db.php');

$db = new db();

$connect = $db->connect();

if ($_GET && $_GET['id']) {

    $sql = "SELECT * FROM products WHERE id = '" . $_GET['id'] . "' ";

    $query = $connect->prepare($sql);

    $query->execute();

    $product = array();

    while ($result = $query->fetch(PDO::FETCH_OBJ)) {
        $product = $result;
    }
}

if ($_POST && $_POST['name'] && $_POST['price'] && $_POST['image'] ) {

    $id = $_GET['id'];

    $sql = "UPDATE `products` SET `name` = '".$_POST['name']."', 
    `price` = '".$_POST['price']."', 
    `image` ='".$_POST['image']."' 
    WHERE `products`.`id` = $id ";

    // echo $sql;
    // die();
    
    $connect->exec($sql);
    header("location: list.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Sửa Đổi</title>
</head>

<body>

    <div class="container">
        <h1 class="text-center">Sửa thời khóa biểu</h1>
        <form action="" method="POST" class="form">
            <div class="form-group">
                <label>Tên</label>
                <input value="<?= $product->name ?>" name="name" class="form-control">
            </div>
            <div class="form-group">
                <label>Giá</label>
                <input value="<?= $product->price ?>" name="price" class="form-control">
            </div>
            <div class="form-group">
                <label>Ảnh</label>
                <input value="<?= $product->image ?>" name="image" class="form-control">
                <br>
            </div>
            <button type="submit" name="submit" class="btn btn-dark">Lưu</button>
            <a href="list.php" class="btn btn-dark">quay lại</a>
    </div>
    </form>
</body>

</html>