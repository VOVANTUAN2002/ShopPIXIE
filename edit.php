<?php
include_once('db.php');

$db = new db();

$connect = $db->connect();

if ($_GET && $_GET['id']) {

    $sql = "SELECT * FROM customers WHERE id = '" . $_GET['id'] . "' ";

    $query = $connect->prepare($sql);

    $query->execute();

    $customer = array();

    while ($result = $query->fetch(PDO::FETCH_OBJ)) {
        $customer = $result;
    }
}

if ($_POST && $_POST['id'] && $_POST['thu2'] && $_POST['thu3'] && $_POST['thu4'] && $_POST['thu5'] && $_POST['thu6'] && $_POST['thu7'] && $_POST['chunhat']) {

    $id = $_GET['id'];

    $sql = "UPDATE `customers` SET `id` = '". $_POST['id']. "',
    thu2 = '" . $_POST['thu2'] . "',
    thu3 = '" . $_POST['thu3'] . "',
    thu4 = '" . $_POST['thu4'] . "',
    thu5 = '" . $_POST['thu5'] . "',
    thu6 = '" . $_POST['thu6'] . "',
    thu7 = '" . $_POST['thu7'] . "',
    chunhat = '" . $_POST['chunhat'] . "'
    WHERE customers . id  = $id ";
    // echo $sql;
    // die();
    $connect->exec($sql);
    header("location: adim.php");
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
                <label>Thứ 2</label>
                <input value="<?= $customer->thu2 ?>" name="thu2" class="form-control">
            </div>
            <div class="form-group">
                <label>Thứ 3</label>
                <input value="<?= $customer->thu3 ?>" name="thu3" class="form-control">
            </div>
            <div class="form-group">
                <label>Thứ 4</label>
                <input value="<?= $customer->thu4 ?>" name="thu4" class="form-control">
                <br>
            </div>
            <div class="form-group">
                <label>Thứ 5</label>
                <input value="<?= $customer->thu5 ?>" name="thu5" class="form-control">
                <br>
            </div>
            <div class="form-group">
                <label>Thứ 6</label>
                <input value="<?= $customer->thu6 ?>" name="thu6" class="form-control">
                <br>
            </div>
            <div class="form-group">
                <label>Thứ 7</label>
                <input value="<?= $customer->thu7 ?>" name="thu7" class="form-control">
                <br>
            </div>
            <div class="form-group">
                <label>Chủ Nhật</label>
                <input value="<?= $customer->chunhat ?>" name="chunhat" class="form-control">
                <br>
            </div>
            <button type="submit" name="submit" class="btn btn-dark">Lưu</button>
            <a href="index.php" class="btn btn-dark">quay lại</a>
    </div>
    </form>
</body>

</html>