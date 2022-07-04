<?php
//Kết nối cơ  sở dữ liệu


include_once('db.php');

//controller
if ($_POST && $_POST['thu2'] && $_POST['thu3'] && $_POST['thu4'] && $_POST['thu5'] && $_POST['thu6'] && $_POST['thu7'] && $_POST['chunhat']) {

    //MOdel
    $db = new db();
    $connect = $db->connect();
    // $id = $_GET['id'];
    
    $sql = "INSERT INTO customers(  thu2, thu3, thu4, thu5, thu6, thu7 , chunhat) VALUES ( 
    '" . $_POST['thu2'] . "',
    '" . $_POST['thu3'] . "', 
    '" . $_POST['thu4'] . "', 
    '" . $_POST['thu5'] . "', 
    '" . $_POST['thu6'] . "', 
    '" . $_POST['thu7'] . "', 
    '" . $_POST['chunhat'] . "' 
    )";
    
    // echo '<pre>';
    // print_r($sql);
    // die();
    $connect->exec($sql);
    header("location: adim.php");
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
                <label>Thứ 2</label>
                <input value="" name="thu2" class="form-control">
            </div>
            <div class="form-group">
                <label>Thứ 3</label>
                <input value="" name="thu3" class="form-control">
            </div>
            <div class="form-group">
                <label>Thứ 4</label>
                <input value="" name="thu4" class="form-control">
                <br>
            </div>
            <div class="form-group">
                <label>Thứ 5</label>
                <input value="" name="thu5" class="form-control">
                <br>
            </div>
            <div class="form-group">
                <label>Thứ 6</label>
                <input value="" name="thu6" class="form-control">
                <br>
            </div>
            <div class="form-group">
                <label>Thứ 7</label>
                <input value="" name="thu7" class="form-control">
                <br>
            </div>
            <div class="form-group">
                <label>Chủ Nhật</label>
                <input value="" name="chunhat" class="form-control">
                <br>
            </div>
            <input type="submit" name="submit" class="btn btn-dark" value="Lưu">
            <input type="button" onclick="window.history.go(-1); return false; " name="submit" class="btn btn-dark" value="Quay lại">
    </div>
    </form>
</body>

</html>