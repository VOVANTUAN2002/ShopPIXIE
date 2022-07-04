<?php
session_start();
class User
{
    public $id;
    public $fullname;
    public $email;
    public $password;
    public $repeatpassword;

    public function __construct($fullname, $email, $password ,$repeatpassword)
    {
        $this->fullname = $fullname;
        $this->email = $email;
        $this->password = $password;
        $this->repeatpassword = $repeatpassword;
    }
}
$errors = [];
$show_alert = (isset($_REQUEST['show_alert'])) ? $_REQUEST['show_alert'] : 0;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $fullname   = $_REQUEST['fullname'];
    $email      = $_REQUEST['email'];
    $password   = $_REQUEST['password'];
    $repeatpassword = $_REQUEST['repeatpassword'];

    if ($fullname == "") {
        $errors['fullname'] = " fullname is required field !";
    }
    if ($email    == "") {
        $errors['email'] = " Email is required field !";
    }
    if ($password == "") {
        $errors['password'] = " Password is required field !";
    }
    if ($repeatpassword == ""){
        $errors['repeatpassword'] = "repeatpassword is required field !";
    }

    if (count($errors) == 0) {

        $objUser = new User($fullname, $email, $password, $repeatpassword);
        $objUser->fullname     = $fullname;
        $objUser->email        = $email;
        $objUser->password     = $password;
        $objUser->repeatpassword = $repeatpassword;

        // $objUser->id     = time();
        $_SESSION['success'] = " Bạn đã đăng ký thành công ! ";
        $fileJson = "uuser.json";
        $user = $_REQUEST;
        $users = file_get_contents($fileJson);
        if ($users == "") {
            $users = [];
        } else {
            $users = json_decode($users, true);
        }

        $users[] = $objUser;
        $data = json_encode($users);
        file_put_contents($fileJson, $data);
        header("Location: loginn.php");
    }
}
?>

<!DOCTYPE html>
<html>
<div class="container">

</div>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Register</title>
</head>

<body class="container">
    <?php if ($show_alert) : ?>
        <div class="btn btn-info" role="alert">
            Đăng ký thành công, vui lòng nhấn vào <a href="login.php">đây</a>
            để tới trang đăng nhập
        </div>
    <?php endif; ?>
    <form action="" method="POST">
        <div class="container">
            <h1 class="text-center">Register</h1>
            <p>Please fill in this form to create an account !</p>
            <hr>

            <label for="">User <b> Name</b></label>
            <input type="text" placeholder="Enter fullname" name="fullname" id="fullname">
            <small class="form-text text-danger">
                <?= (isset($errors['fullname'])) ? $errors['fullname'] : ""; ?>
            </small><br></br>
            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Enter email" name="email" id="email">
            <small class="form-text text-danger">
                <?= (isset($errors['email'])) ? $errors['email'] : ""; ?>
            </small><br></br>
            <label for="password"> <b>Password </b></label>
            <input type="password" placeholder=" password" name="password" id="psw-repeat">

            <small class="form-text text-danger">
                <?= (isset($errors['password'])) ? $errors['password'] : ""; ?>
            </small><br></br>
            <label for="password">Repeat<b> Password</b></label>
            <input type="password" placeholder="Repeat Password" name="repeatpassword" id="psw-repeat">
            <small class="form-text text-danger">
                <?= (isset($errors['repeatpassword'])) ? $errors['repeatpassword'] : ""; ?>
            </small>
            <hr>

            <button type ="submit"   class="registerbtn"><a href="index.php"></a>Register</button>
            <a href="index.php" class="btn btn-danger">quay lại</a>
        </div>

       
    </form>

</body>

</html>
<style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: black;
        }

        * {
            box-sizing: border-box;
        }

        /* Add padding to containers */
        .container {
            padding: 16px;
            background-color: white;
        }

        /* Full-width input fields */
        input[type=text],
        input[type=password] {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            display: inline-block;
            border: none;
            background: #f1f1f1;
        }

        input[type=text]:focus,
        input[type=password]:focus {
            background-color: #ddd;
            outline: none;
        }

        /* Overwrite default styles of hr */
        hr {
            border: 1px solid #f1f1f1;
            margin-bottom: 25px;
        }

        /* Set a style for the submit button */
        .registerbtn {
            background-color: #000000;
            color: white;
            padding: 16px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
            opacity: 0.9;
        }

        .registerbtn:hover {
            opacity: 1;
            background-color: wheat;
        }

        /* Add a blue text color to links */
        a {
            color: dodgerblue;
        }

        /* Set a grey background color and center the text of the "sign in" section */
        .signin {
            background-color: #f1f1f1;
            text-align: center;
        }

        small {
            color: red;
        }
        .registerbtn{
            background-color: rgb(0,0,255)
        }
    </style>