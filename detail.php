<?php
include_once('db.php');

if ($_GET && $_GET['id']) {
    $db = new db();
    $connect = $db->connect();

    $sql = "SELECT * FROM customers WHERE id= '" . $_GET['id'] . "' ";
    $query = $connect->prepare($sql);
    $query->execute();
    $customer = array();

    while ($result = $query->fetch(PDO::FETCH_OBJ)) {
        $customer = $result;
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
    <title>Thông tin thời kháo biểu</title>
</head>

<body>
    <b>
        <h3 style="text-align:center">Thông tin thời kháo biểu</h3>
    </b>
    <hr>
    <div class="container">
        <div><b>Thứ 2:</b> <?php echo $customer->thu2 ?></div>
        <div><b>Thư 3:</b> <?php echo $customer->thu3 ?></div>
        <div><b>Thứ 4:</b> <?php echo $customer->thu4 ?></div>
        <div><b>Thứ 5:</b> <?php echo $customer->thu5 ?></div>
        <div><b>thứ 6:</b> <?php echo $customer->thu6 ?></div>
        <div><b>Thứ 7:</b> <?php echo $customer->thu7 ?></div>
        <div><b>Chủ Nhật:</b> <?php echo $customer->chunhat ?></div>
    </div>

    <hr>
    <input type="button" onclick="window.history.go(-1); return false; " name="submit" class="btn btn-dark" value="quay lai">

</body>

</html>