<!-- Banner Ends Here -->
<?php include '../layout/header.php' ?>
<?php
include '.././db.php';
$db = new db();
$connect = $db->connect();
$sql = "SELECT * FROM `products` ";
$query = $connect->prepare($sql);

$query->execute();

$products = array();
while ($result = $query->fetch(PDO::FETCH_OBJ)) {
    array_push($products, $result);//push vô mảng với nhiều đối tượng

}
// echo "<pre>";
// print_r($products);
// die();

?>
    <!-- Featured Starts Here -->
    <div class="featured-items">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <div class="line-dec"></div>
              <h1>Featured Items</h1>
            </div>
          </div>
          <div class="col-md-12">
            <div class="owl-carousel owl-theme">

            <?php if (empty($products) === 0) : ?>
                    <!--kiểm tra nếu mảng rỗng-->
                    <tr>
                        <td>không có</td>
                    </tr>

                <?php endif; ?>

              <?php 
                  foreach ($products as $key => $product):
              ?>
                <a href="detail.php?id=<?= $product->id ?>">
                <div class="featured-item">
                  <img style="width:250px; height:250px;" src="../images/<?= $product->image ?>" alt="Item 2">
                  <h4><?= $product->name ?></h4>
                  <h6><?= $product->price ?></h6>
                </div>
              </a>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Featred Ends Here -->
    <?php include '../layout/footer.php' ?>