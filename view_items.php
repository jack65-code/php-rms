<?php
session_start();

if(!isset($_SESSION['name'])){
  header("Location:index.php");
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
        <button class="btn btn-warning">View Items</button>
        <div class="row g-6 my-5">
          <div class="col-xl-12">
            <!-- card -->
            <div class="card card-lg">
              <!-- card header -->
              <div class="card-header border-bottom-0">
                <div>
                  <h5 class="mb-0">Items</h5>
                </div>
              </div>
              <!-- table -->
              <div class="table-responsive">
                <table class="table text-nowrap mb-0 table-centered table-hover">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Price</th>
                      <th>Category</th>
                      <th>Qty</th>
                      <th>Created At</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    include("config.php");
                    $query = mysqli_query($connection,"SELECT * FROM items");

                    while($row = mysqli_fetch_assoc($query)){


                        ?>
                    <tr>
                      <td><?php echo $row["itemID"]; ?></td>
                      <td><?php echo $row["item_name"]; ?></td>
                      <td><?php echo $row["item_price"]; ?></td>
                      <td><?php echo $row["item_category"]; ?></td>
                      <td><?php echo $row["item_stock"]; ?></td>
                      <td><?php echo $row["created_At"]; ?></td>
                      <td>
                        <a href="#!" class="btn btn-warning btn-sm">Edit</a>
                        <a href="#!" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                    </tr>
                    <?php
     }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
  </div>

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