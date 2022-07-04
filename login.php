<?php
session_start();
include_once('db.php');
$json_users = file_get_contents('uuser.json');
if ($json_users) {
    $users = json_decode($json_users);
} else {
    $users = [];
}
$user = (isset($_SESSION['user'])) ? $_SESSION['user'] : "";
$errors = [];
$can_do = true;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // echo '<pre>';
    // print_r($_REQUEST);
    // echo '</pre>';
    // die();
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
    // echo $password;
    // die();
    $nhanvien = $email;
   

    if ($email = ""){
        $errors['email'] = 'vui lòng nhập email';
    }
    if ($password = ""){
        $errors['password'] = 'vui lòng nhập password';
    }
    

    if (count($errors) === 0) {
                $db = new db();

                $connect = $db->connect();
                $sql = "SELECT * FROM `nhanvien` where passwork = '".$_REQUEST['password']."' and email = '".$nhanvien."' ";
                // echo $password;
                
                // echo $sql;

                // echo $sql;
                // die();
                $query = $connect->prepare($sql);
                $query->execute();
                $customer = array();

                while ($result = $query->fetch(PDO::FETCH_OBJ)) {
                $customer = $result;
                }
                // echo "<pre>";
                // print_r($customer);
                // echo "</pre>";
                // die();
        if (!$customer){

        }else{
             $_SESSION['user'] = $customer ;
            header("Location: index0.php");
            die();
        }
        foreach ($users as $user) {
            if ($user->email == $_REQUEST['email'] && $user->password == $_REQUEST['password']) {
                // echo "123";
                // die();
                $_SESSION['user'] = $user;
                $can_do = false;
               
            } 
        }
    }
}

?>

<div class="container">
    <div class="row">
        <div class="col-1g-12">
            <h3 class="text-center">login</h3>
                <p class="text-danger" >
                    <?= isset($_SESSION['success']) ? $_SESSION['success'] : "" ?>

                    <?php if($can_do == false){
                   echo " Đăng nhập không thành công  !";
                    } 
                    ?>  
                </p>
            <form action="" method="POST">
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" name="email" placeholder="Enter email">
                <?= (isset($errors['email'])) ? $errors['email'] : ""; ?>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Password">
                <?= (isset($errors['password'])) ? $errors['password'] : ""; ?>
                </div>
                <button type="submit" class="form-control"><i class=" form-control btn btn-info">Login</i></button>
                <hr>
                <a href="index.php" class="btn btn-danger">quay lại</a>
            </form>

            <body>

            </body>

            <head>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                <title>login</title>
            </head>
            <style>
                form {
                    width: 100%;
                    border: 2px solid rgb(153, 168, 153);
                    padding: 20px;
                    margin: 0 auto;
                    font-weight: 100%;
                }

                form label {
                    width: 50px;
                    padding: 13px;
                }

                body {
                    background: rgb(213, 555, 999);
                    height: 100%;
                    width: 100%;
                }

                input[type=text],
                select {
                    width: 100%;
                    padding: 12px 20px;
                    margin: 8px 0;
                    display: inline-block;
                    border: 1px solid #ccc;
                    border-radius: 4px;
                    box-sizing: border-box;
                }

                input[type=submit] {
                    width: 100%;
                    background-color: #4CAF50;
                    color: white;
                    padding: 14px 20px;
                    margin: 8px 0;
                    border: none;
                    border-radius: 4px;
                    cursor: pointer;
                }

                input[type=submit]:hover {
                    background-color: #45a049;
                }

                div {
                    border-radius: 5px;
                    background-color: #f2f2f2;
                    padding: 20px;
                }
            </style>

            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">