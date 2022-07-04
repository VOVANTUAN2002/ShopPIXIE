<?php
session_start();
include_once('../db.php');
foreach ($_SESSION['user'] as $user) {
    if(isset($user->role)){

    
    if ($user->role == "Giám đốc") {
        break;
    } else {
        header("location:../login.php");
        die();
    }
}else{
    header("location:../login.php");
    die();
}
}
$db = new db();
$connect = $db->connect();


if ($_GET && $_GET['id']) {
    $sql = "SELECT * FROM nhanvien WHERE id = '" . $_GET['id'] . "' ";

    $query = $connect->prepare($sql);
    
    $query->execute();

    while ($result = $query->fetch(PDO::FETCH_OBJ)) {// dịch ra 
        $staff = $result;// lấy một đối tượng
    }
}
// echo "<pre>;";
// print_r($staff);
// die();
$errors = [];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
if ($_POST  && $_POST['nhanvien'] && $_POST['role'] && $_POST['passwork'] && $_POST['email']) {

    $id = $_GET['id'];

    $sql = "UPDATE `nhanvien` SET `nhanvien` = '".$_POST['nhanvien']."', `role` = '".$_POST['role']."' ,`passwork` = '".$_POST['passwork']."' ,`email` = '".$_POST['email']."' WHERE `nhanvien`.`id` = $id ";
    // echo $sql;
    // die();
    $connect->exec($sql);
    header("location: index.php");
}else{
    $errors['email'] = " vui lòng nhập email của bạn !";
    $errors['nhanvien'] = " Vui lòng nhân viên của bạn !";
    $errors['role'] = " vui lòng nhập vai trò của bạn !";
    $errors['passwork'] = " vui lòng nhập mật khẩu của bạn !";
}

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
            <div class="form-group">
                <label>email</label>
                <input value="<?= $staff->email ?>" name="email" class="form-control">
                <?= (isset($errors['email'])) ? $errors['email'] : ""; ?>

            </div>
                <label>Nhân viên</label>
                <input value="<?= $staff->nhanvien ?>" name="nhanvien" class="form-control">
                <?= (isset($errors['nhanvien'])) ? $errors['nhanvien'] : ""; ?>

            </div>
            <div class="form-group">
                <label>Role</label>
                <input value="<?= $staff->role ?>" name="role" class="form-control">
                <?= (isset($errors['role'])) ? $errors['role'] : ""; ?>

            </div>
            <div class="form-group">
                <label>Mật khẩu</label>
                <input value="<?= $staff->passwork ?>" name="passwork" class="form-control">
                <?= (isset($errors['passwork'])) ? $errors['passwork'] : ""; ?>

            </div>
            <button type="submit" name="submit" class="btn btn-dark">Lưu</button>
            <input type="button" onclick="window.history.go(-1); return false; " name="submit" class="btn btn-dark" value="Quay lại">
    </div>
    </form>
</body>

</html>