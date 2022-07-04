
<?php 
include_once('../db.php');

// echo '<pre>';
// print_r($_REQUEST);
// echo '</pre>';
$db = new db();
$connect = $db->connect();
$sql = "SELECT * FROM products WHERE id = '" . $_GET['id'] . "' ";

$query = $connect->prepare($sql);

$query->execute();

while ($result = $query->fetch(PDO::FETCH_OBJ)) {// dịch ra 
    $product = $result;// lấy một đối tượng
}
// echo '<pre>';
// print_r($product);
// echo "</pre>";
// die();
?>
<?php include '../layout/header.php' ?>
 <div class="single-product">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <div class="line-dec"></div>
              <h1><?= $product->name ?></h1>
            </div>
          </div>
          <div class="col-md-6">
            <div class="product-slider">
              <div id="slider" class="flexslider">
                <ul class="slides">
                  <li>
                    <img src="../images/<?= $product->image ?>" />
                  </li>
                  <!-- items mirrored twice, total of 12 -->
                </ul>
              </div>
             
            </div>
          </div>
          <div class="col-md-6">
            <div class="right-content">
              <h4><?= $product->name ?></h4>
              <h6><?= number_format($product->price) ?> VNĐ</h6>
              <form action="../giohang/addToCart.php?id=<?= $product->id?>" method="post">
                <label for="quantity">Quantity:</label>
             
                <input name="quantity" type="quantity" class="quantity-text" id="quantity" 
                	onfocus="if(this.value == '1') { this.value = ''; }" 
                    onBlur="if(this.value == '') { this.value = '1';}"
                    value="1">
               <button type="submit" class="button" >THÊM VÀO GIỎ HÀNG</button>
              </form>
              <div class="down-content">
                <div class="categories">
                  <h6>Category: <span><a href="#">Pants</a>,<a href="#">Women</a>,<a href="#">Lifestyle</a></span></h6>
                </div>
                <div class="share">
                  <h6>Share: <span><a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-linkedin"></i></a><a href="#"><i class="fa fa-twitter"></i></a></span></h6>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  


    <!-- Bootstrap core JavaScript -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="../assets/js/custom.js"></script>
    <script src="../assets/js/owl.js"></script>
    <script src="../assets/js/isotope.js"></script>
    <script src="../assets/js/flex-slider.js"></script>


    <script language = "text/Javascript"> 
      cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
      function clearField(t){                   //declaring the array outside of the
      if(! cleared[t.id]){                      // function makes it static and global
          cleared[t.id] = 1;  // you could use true and false, but that's more typing
          t.value='';         // with more chance of typos
          t.style.color='#fff';
          }
      }
    </script>


  </body>

</html>

    <?php include '../layout/footer.php' ?>
