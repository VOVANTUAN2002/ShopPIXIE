<?php
include 'db.php';

$db = new db();

$connect = $db->connect();

$sql = "SELECT * FROM customers WHERE thu2 LIKE '" .'%'.$_POST['search'].'%'."'";

$query = $connect->prepare($sql);

$query->execute();

$customer = array();

while ($result = $query->fetch(PDO::FETCH_OBJ)) {
    array_push($customer, $result);
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Danh sách mặt hàng</title>
</head>

<body>
    <div class="col-12 container">
        <div>
        <h1 style="text-align: center;">Danh sách </h1>
        <a href="index.php" class="btn btn-primary">Quay lại</a>
        </div>
<br>


        <table class="table table-border">
        <thead>
                <tr >
                    <td>#</td>
                    <td>Thứ 2</td>
                    <td>Thứ 3</td>
                   
                    <td></td>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($customers as $customer):
                ?>
                    <tr>
                        <td><?= $customer->thu2 ?></td>
                        <td><?= $customer->thu3 ?></td>
                        
                        <td><a href="edit.php?id=<?= $customer->id ?>" class="btn btn-dark">Sửa</a></td>
                        <td><a href="delete.php&id=<?= $customer->id ?>" class="btn btn-dark" onclick="return confirm('Bạn tự tin với quyết định của mình?');">Xóa</a></td>
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>