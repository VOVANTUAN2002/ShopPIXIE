<?php
include_once('db.php');

$db = new db();

$connect = $db->connect();

$sql = 'SELECT * FROM products';

$query = $connect->prepare($sql);

$query->execute();

$products = array();

while ($result = $query->fetch(PDO::FETCH_OBJ)) {
    array_push($products, $result);
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
        text-decoration: none;
    }

    .btn-secondary {
        color: #fff;
        background-color: #241153;

    }
    .btn-dark {
    color: #fff;
    background-color: #0080ff;
}
</style>
    <title>Document</title>
</head>

<body style="background-color: #eee;">

    <div class="col-lg-12 icon" style="background-color: #cc1111 ;padding:10px;color:white;">

        <ul class="nav" style="list-style-type:none;margin: -10px;">

            <li><a href="nhanvien/index.php"><i class="fas fa-user-circle" style="font-size:20px"></i> Quản Trị</a></li>
            <li><a href="#"><i class="fas fa-users" style="font-size:20px"></i> Quản lý danh mục</a></li>
            <li><a href="#"><i class="fas fa-user" style="font-size:20px"></i> Quản lý Thời khóa biểu</a></li>

        </ul>
    </div>
    <div class="btn-group" role="group">
        <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            Bấm vào để đăng xuất tài khoản
        </button>
        <div class="dropdown-menu" aria-labelledby="">
            <i class="far fa-user-circle"></i><a href="logout.php">Đăng xuất</a>
        </div>
    </div>
    </div>

    <body>

        <div class="container">
            <h1 style="text-align:center">Danh sách </h1>

            <a href="add.php" class="btn btn-primary"><i class="fas fa-user-plus"></i>Thêm mới</a>
            </table>
            <table class="table tale-boder" border="2px">
                <thead>
                    <tr class="table-light">

                        <th> ID </th>
                        <th>Tên</th>
                        <th>Giá</th>
                        <th>Ảnh</th>
                        <th>Công cụ</th>

                    </tr>
                </thead>
                <tbody>
                    <!--kiểm tra nếu biến if(empty($customers)):  rỗng-->
                    <?php if (count($products) === 0) : ?>
                        <!--kiểm tra nếu mảng rỗng-->
                        <tr>
                            <td>không có</td>
                        </tr>

                    <?php endif;

                    foreach ($products as $product) :
                    ?>
                        <tr class="table-light">

                            <td><?= $product->id; ?></td>
                            <td><?= $product->name; ?></td>
                            <td><?= $product->price; ?></td>
                            <td><img style="width:100px; height:100px;" src="images/<?= $product->image ?>"></td>

                            <td>
                                <a href="./products/edit.php?id=<?= $product->id ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <a href="./nhanvien/index.php" class="btn btn-dark">quay lại</a>

    </body>

</html>

<hr>
<div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
    <a href="index1.php" type="button" class="btn btn-secondary">1</a>
    <a href="index1.php" type="button" class="btn btn-secondary">2</a>
    <a href="index1.php" type="button" class="btn btn-secondary">3</a>
    <a href="index1.php" type="button" class="btn btn-secondary">4</a>
    <a href="index1.php" type="button" class="btn btn-secondary">5</a>
    <a href="index1.php" type="button" class="btn btn-secondary">6</a>
    <a href="index1.php" type="button" class="btn btn-secondary">7</a>
    <a href="index1.php" type="button" class="btn btn-secondary">8</a>
    <a href="index1.php" type="button" class="btn btn-secondary">9</a>
    <a href="index1.php" type="button" class="btn btn-secondary">10</a>
    <a href="index1.php" type="button" class="btn btn-secondary">11</a>
    <a href="index1.php" type="button" class="btn btn-secondary">12</a>
</div>
