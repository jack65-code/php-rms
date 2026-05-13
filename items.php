<?php
session_start();

if(!isset($_SESSION['name'])){
  header("Location:index.php");
}



include("config.php");

if(isset($_POST["btn"])){

$name = $_POST["itemname"];
$price = $_POST["itemprice"];
$category = $_POST["category"];
$stock = $_POST["itemstock"];


$q = "INSERT INTO `items`(`item_name`, `item_price`, `item_category`, `item_stock`, `created_At`) VALUES ('$name','$price','$category','$stock',current_timestamp())";

  $query = mysqli_query($connection,$q);

}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Dasher Free - Responsive Bootstrap 5 Admin Dashboard</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/11.0.5/swiper-bundle.css" integrity="sha512-pmAAV1X4Nh5jA9m+jcvwJXFQvCBi3T17aZ1KWkqXr7g/O2YMvO8rfaa5ETWDuBvRq6fbDjlw4jHL44jNTScaKg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <?php
  include("partials/head/head-links.html");

  ?>
</head>
<body>
  <!-- Vertical Sidebar -->
  <div>
    <?php 
  include("partials/sidebar-collapse.html")
  ?>

<!-- Main Content -->
<div id="content" class="position-relative h-100">
  
  <?php
  include("partials/topbar-second.html")

?>
      <!-- container -->
      <div class="custom-container">
        <h1>Items</h1>
        <a class="btn btn-warning" href="view_items.php">View Items</a>
          <form class="needs-validation mb-6" novalidate method="POST">
                    <div class="my-6">
                      <label for="signinEmailInput" class="form-label">
                        Item name
                        <span class="text-danger">*</span>
                      </label>
                      <input type="text" name="itemname" class="form-control" id="signinEmailInput"
                      placeholder="item name"
                      required />
                    </div>
                    <div class="my-6">
                      <label for="signinEmailInput" class="form-label">
                        Item price
                        <span class="text-danger">*</span>
                      </label>
                      <input type="number" name="itemprice" class="form-control" id="signinEmailInput"
                      placeholder="item price"
                      required />
                    </div>
                    <div class="my-6">
                      <label for="signinEmailInput" class="form-label">
                        Item Category
                        <span class="text-danger">*</span>
                      </label>
                    <select name="category" id="" class="form-control">
                        <?php
                        include("config.php");

                        $query = mysqli_query($connection,"SELECT * FROM category");

                        while($row = mysqli_fetch_assoc($query)){

                       

                            ?>
                        <option value="<?php echo $row['cid'] ?>"><?php echo $row["cate_name"] ?></option>
                <?php
                        }
                ?>
                       </select>
                    </div>
                    <div class="my-6">
                      <label for="signinEmailInput" class="form-label">
                        Item Stock
                        <span class="text-danger">*</span>
                      </label>
                      <input type="number" name="itemstock" class="form-control" id="signinEmailInput"
                      placeholder="item Stock"
                      required />
                    </div>
                      <div class="d-grid">
                      <button name="btn" class="btn btn-primary" type="submit">Add Items</button>
                    </div>
</form>

</div>
<?php


include("partials/scripts.html")
?>
  <!-- jsvectormap -->
  <script src="assets/js/vendors/sidebarnav.js"></script>
  <script src="node_modules/jsvectormap/dist/js/jsvectormap.min.js"></script>
  <script src="node_modules/jsvectormap/dist/maps/world.js"></script>
  <script src="node_modules/jsvectormap/dist/maps/world-merc.js"></script>
  <script src="node_modules/apexcharts/dist/apexcharts.min.js"></script>
  <script src="assets/js/vendors/chart.js"></script>
  <script src="node_modules/choices.js/public/assets/scripts/choices.min.js"></script>
  <script src="assets/js/vendors/choice.js"></script>
  <script src="node_modules/swiper/swiper-bundle.min.js"></script>
  <script src="assets/js/vendors/swiper.js"></script>
</body>

</html>



