<?php
include_once('db.php');
//nếu không tồn tại user thì về trang login
if(!isset($_SESSION['user'])){
    header("login.php");

}
$db = new db();

$connect = $db->connect();

$sql = 'SELECT * FROM customers';

$query = $connect->prepare($sql);

$query->execute();

$customers = array();

while ($result = $query->fetch(PDO::FETCH_OBJ)) {
    array_push($customers, $result);
    
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Trang chinh</title>
</head>


<body style="background-color: #eee;">

    <div class="col-lg-12 icon" style="background-color: #cc1111 ;padding:10px;color:white;">

        <ul class="nav" style="list-style-type:#eee;margin: -10px;">

            <li><a href="#"><i class="fas fa-user-circle" style="font-size:20px"></i> Quản Trị</a></li>
            <li><a href="#"><i class="fas fa-users" style="font-size:20px"></i> Quản lý danh mục</a></li>
            <li><a href="#"><i class="fas fa-user" style="font-size:20px"></i> Quản lý sản phẩm</a></li>
            <li style="float: right;"><a href="#"><i class="fa fa-search" style="font-size:20px;text-align: right;">Tìm Kiếm</i></a></li>
        </ul>
    </div>
</body>

<div class="btn-group" role="group">
    <button id="btnGroupDrop1" type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
        Bấm Vào Đây để đăng Ký tài Khoản
    </button>
    <div class="dropdown-menu" aria-labelledby="">
        <i class="far fa-user-circle"></i><a class="dropdown-item" href="register.php">Đăng Ký Tài Khoản</a><br>

        <i class="far fa-user-circle"></i><a class="dropdown-item" href="loginn.php">Đăng nhập tài khoản</a>
    </div>
</div>

<body>

    <!-- <p><a class="btn btn-dark" href="dangnhapadmin.php">Admin</a></p> -->
    <div class="container">
        <h1 class="text-align:center"></h1>
        <table class="table tale-boder" border="2px">
            <tbody>
                <h1>xin chào bạn</h1>
            </tbody>
        </table>
    </div>

</body>

</html>
<style>
    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        padding: 8px;
        border: 1px solid #dee2e6;
    }

    th {
        height: 40px;
        text-align: left;
    }

    .btn-group {
        left: 80%;
        width: 10%;
    }

    a {
        color: #eee;
        text-decoration: #000000;
    }
    
    .btn-dark {
    color: #fff;
    background-color: #0080ff;
}
</style>