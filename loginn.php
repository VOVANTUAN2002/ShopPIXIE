<?php
session_start();
$json_users = file_get_contents('uuser.json');
if ($json_users) {
    $users = json_decode($json_users);
} else {
    $users = [];
}
$user = (isset($_SESSION['user'])) ? $_SESSION['user'] : '';
$errors = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email      = $_REQUEST['email'];
    $password   = $_REQUEST['password'];

    if ($email    == "") {
        $errors['email'] = " Email is required field !";
    }
    if ($password == "") {
        $errors['password'] = " Password is required field !";
    }

    $can_do = true;
    if (count($errors) === 0) {
        foreach ($users as $user) {
            if ($user->email == $email || $user->password == $password) {

                $_SESSION['user'] = $user;
                $can_do = false;
                header("Location: home/home.php");
            } else {
                exit();
            }
        }
    }
 
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">
    <title>trang login</title>
</head>

<body>
    <div class="container">
        <form action="" method="POST">
            <div class="form-group">
                <label>Login</label>
                <input type="text" class="form-control" name="email" placeholder="Enter email">
                <hr>
                <?= (isset($errors['email'])) ? $errors['email'] : ""; ?>
            </div>
            <div class="form-group">
                <label> Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password">
                <hr>
                <?= (isset($errors['password'])) ? $errors['password'] : ""; ?>
            </div>
            <button type="submit" class="form-control"><i class=" form-control btn btn-info">Login</i></button>
            <hr>
            <a href="./home/home.php" class="btn btn-danger">quay lại</a>
        </form>
    </div>

</body>

</html>