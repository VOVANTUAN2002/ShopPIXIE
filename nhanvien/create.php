<?php
//Kết nối cơ  sở dữ liệu
session_start();
foreach ($_SESSION['user'] as $user) {
    if (isset($user->role)) {

        if ($user->role == "Giám đốc") {
            break;
        } else {
            header("location:../login.php");
            die();
        }
    } else {
        header("location:../login.php");
        die();
    }
}
$errors = [];
//controller
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST  && $_POST['nhanvien'] && $_POST['role']) {
        include_once('../db.php');

        // MOdel
        $db = new db();
        $connect = $db->connect();
        // $id = $_GET['id'];

        $sql = "INSERT INTO `nhanvien` (`id`, `nhanvien`, `role`, passwork, email) VALUES
    (NULL, '" . $_POST['nhanvien'] . "', '" . $_POST['role'] . "', '" . $_POST['passwork'] . "', '" . $_POST['email'] . "') ;";

        // print_r($sql);
        // die();
        $connect->exec($sql);
        header("location: index.php");
    } else {
        $errors['email'] = " vui lòng nhập email của bạn !";
        $errors['nhanvien'] = " Vui lòng nhân viên của bạn !";
        $errors['role'] = " vui lòng nhập vai trò của bạn !";
        $errors['passwork'] = " vui lòng nhập Mật khẩu của bạn !";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>

    <div class="container">
        <h1 class="text-center">Thêm thời khóa biểu</h1>
        <form action="" method="POST" class="form">
            <div class="form-group">
            <div class="form-group">
                <label>Email</label>
                <input value="" name="email" class="form-control">
                <?= (isset($errors['email'])) ? $errors['email'] : ""; ?>
                <br>
            </div>
                <label>Nhân viên</label>
                <input value="" name="nhanvien" class="form-control">
                <?= (isset($errors['nhanvien'])) ? $errors['nhanvien'] : ""; ?>
            </div>
            <div class="form-group">
                <label>Vai trò</label>
                <input value="" name="role" class="form-control">
                <?= (isset($errors['role'])) ? $errors['role'] : ""; ?>
                <br>
            </div>
            <div class="form-group">
                <label>Mật khẩu</label>
                <input value="" name="passwork" class="form-control">
                <?= (isset($errors['passwork'])) ? $errors['passwork'] : ""; ?>
                <br>
            </div>
            <button type="text" name="submit">lưu</button>
        </form>
</body>

</html>