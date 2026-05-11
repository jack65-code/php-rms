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
        <h1>Users Data</h1>

        <div class="row">

        <?php
        include("config.php");

        $query = mysqli_query($connection,"SELECT * FROM users");

        while($row = mysqli_fetch_assoc($query)){


       
?>

   <div class="col-4 mt-3">
     <div class="card">
        <div class="card-content">
            <div class="image">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTabOgeMNrSqYJ4c2-kMg0I_QreIqbVVfgvWQ&s" alt="Profile Picture">
            </div>
            <div class="text-center">
                <h2><?php echo $row["username"];   ?></h2>
                <span><?php echo $row["email"];   ?></span>
                <h6><?php
                if($row["role"] == 0){
                    echo "Admin";
                    }else{
                    echo "Waiter";

                }
                 ?></h6>
            </div>
            <div class="buttons">
                <button class="follow">Edit</button>
                <button class="message">Delete</button>
            </div>
        </div>
    </div>
   </div>
   <?php
 }
   ?>
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