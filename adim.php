<?php
session_start();

include_once('db.php');

$db = new db();

// if(empty($_SESSION['user'])){
//     header("location:login.php");

// }

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
        background-color: #000000;

    }
    .table-dark{
        color: white;
    }
</style>
    <title>Document</title>
</head>

<body style="background-color: #eee;">

    <div class="col-lg-12 icon" style="background-color: black;padding:10px;color:white;">

        <ul class="nav" style="list-style-type:none;margin: -10px;">

            <li><a href="../products/list.php"><i class="fas fa-user-circle" style="font-size:20px"></i> Quản Trị</a></li>
            <li><a href="add.php"><i class="fas fa-users" style="font-size:20px"></i> Quản lý danh mục</a></li>
            <li style="float: right;"><a href="#"><i class="fa fa-search" style="font-size:20px;text-align: right;"></i> Quản lý tìm kiếm</a></li>
        </ul>
    </div>
    <div class="btn-group" role="group">
        <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            Bấm vào để đăng xuất tài khoản
        </button>
        <div class="dropdown-menu" aria-labelledby="">
            <i class="far fa-user-circle"></i><a href="logout.php"> Đăng xuất</a>
        </div>
    </div>

    <body>
        <div class="container">
            <h1 style="text-align:center"> Quản lý thời khóa biểu</h1>

            <table class="table tale-boder" border="2px">
                <thead>
                    <tr class="table-light">
                        <b>
                            <td>Ngày</td>
                        </b>
                        
                        <b>
                            <td>Thứ 2</td>
                        </b>
                        <b>
                            <td>Thứ 3</td>
                        </b>
                        <b>
                            <td>Thứ 4</td>
                        </b>
                        <b>
                            <td>Thứ 5</td>
                        </b>
                        <b>
                            <td>Thứ 6</td>
                        </b>
                        <b>
                            <td>Thứ 7</td>
                        </b>
                        <b>
                            <td>Chủ nhật</td>
                        </b>
                        <b>
                            <td colspan="3" style="text-align:center">Xem Thêm</td>
                           
                        </b>
                    </tr>
                </thead>
                <tbody>
                    <!--kiểm tra nếu biến if(empty($customers)):  rỗng-->
                    <?php if (count($customers) === 0) : ?>
                        <!--kiểm tra nếu mảng rỗng-->
                        <tr>
                            <td>không có</td>
                        </tr>

                    <?php endif;

                    foreach ($customers as $customer) :
                    ?>
                        <tr class="table-light">
                            <td class="table-dark"><?php echo $customer->id ?></td>
                          
                            <td><?php echo $customer->thu2 ?></td>
                            <td><?php echo $customer->thu3 ?></td>
                            <td><?php echo $customer->thu4 ?></td>
                            <td><?php echo $customer->thu5 ?></td>
                            <td><?php echo $customer->thu6 ?></td>
                            <td><?php echo $customer->thu7 ?></td>
                            <td><?php echo $customer->chunhat ?></td>

                            <!-- <td><a href="detail.php?id=<?php echo $customer->id ?>" class="btn btn-info">Xem chi tiết</a></td> -->
                            <td><a href="edit.php?id=<?php echo $customer->id ?>" class="btn btn-dark" ><i class="fas fa-retweet"></i> Sửa </a></td>
                            <td><a href="delete.php?id=<?php echo $customer->id ?>" class="btn btn-dark" onclick="return confirm('Are you sure you want to delete this item?');"><i class="far fa-trash-alt"></i></a></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <input type="button" onclick="window.history.go(-1); return false; " name="submit" class="btn btn-dark" value="Quay lại">
    </body>

</html>
