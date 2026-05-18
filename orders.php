<?php
session_start();

if(!isset($_SESSION['name'])){
  header("Location:index.php");
}

include("config.php");

if(isset($_POST["btn"])){

$name = $_POST["cname"];

  $query = mysqli_query($connection,"INSERT INTO `category`(`cate_name`, `createdAt`) VALUES ('$name',current_timestamp())");

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
<style>
 

.card {
    border: 1px solid #ccc;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 300px;
}

.card-content {
    padding: 20px;
}

.image {
    text-align: center;
}

.image img {
    border-radius: 50%;
    width: 100px;
    height: 100px;
}

.text-center {
    text-align: center;
    margin-bottom: 20px;
}



.buttons {
    display: flex;
    justify-content: center;
}

.buttons button {
    margin: 0 5px;
    padding: 8px 16px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    background-color: #007bff;
    color: #fff;
    font-size: 14px;
}

.buttons button.follow {
    background-color: #28a745;
}

.buttons button.message {
    background-color: #ff0707;
}
</style>
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
        <h1>Orders</h1>

        <div class="row">
              <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

    <li class="nav-item" role="presentation">
      <button
        class="nav-link active"
        id="home-tab"
        data-bs-toggle="pill"
        data-bs-target="#all"
        type="button"
        role="tab"
      >
        All
      </button>
    </li>
<?php

$query1 = mysqli_query($connection,"SELECT * FROM category");
while($row1 = mysqli_fetch_assoc($query1)){

 $id = $row1['cid'];


?>
    <li class="nav-item" role="presentation">
      <button
        class="nav-link"
        id="profile-tab"
        data-bs-toggle="pill"
        data-bs-target="#content-<?php echo $id; ?>"
        type="button"
        role="tab"
      >
        <?php echo $row1['cate_name'];  ?>
      </button>
    </li>
<?php
}

?>

  </ul>

  <!-- Pills Content -->
  <div class="tab-content border p-4 rounded">

    <div
      class="tab-pane fade show active"
      id="all"
      role="tabpanel">
    <h1>yeh all ka page hai</h1>
  </div>
    <?php

$query2 = mysqli_query($connection,"SELECT * FROM category");

while($row2 = mysqli_fetch_assoc($query2)){

?>

<div
  class="tab-pane fade"
  id="content-<?php echo $row2['cid']; ?>"
  role="tabpanel"
>
  <h3><?php echo $row2['cate_name']; ?></h3>

  <p>
    This is <?php echo $row2['cate_name']; ?> content.
  </p>
</div>

<?php
}
?>

</div>
</div>
<?php


include("partials/scripts.html")
?>
  <!-- jsvectormap -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
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