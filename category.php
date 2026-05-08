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
        <h1>Add Category</h1>
        <form class="needs-validation mb-6" novalidate method="POST">
                    <div class="my-6">
                      <label for="signinEmailInput" class="form-label">
                        Catergory name
                        <span class="text-danger">*</span>
                      </label>
                      <input type="text" name="cname" class="form-control" id="signinEmailInput"
                      placeholder="write category name"
                      required />
                      <div class="invalid-feedback">Please enter email.</div>
                    </div>
                      <div class="d-grid">
                      <button name="btn" class="btn btn-primary" type="submit">Add Category</button>
                    </div>
</form>
    <div class="row g-6 my-5">
          <div class="col-xl-12">
            <!-- card -->
            <div class="card card-lg">
              <!-- card header -->
              <div class="card-header border-bottom-0">
                <div>
                  <h5 class="mb-0">Category</h5>
                </div>
              </div>
              <!-- table -->
              <div class="table-responsive">
                <table class="table text-nowrap mb-0 table-centered table-hover">
                  <thead>
                    <tr>
                      <th>Category ID</th>
                      <th>Category Name</th>
                      <th>Created At</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $query = mysqli_query($connection,"SELECT * FROM category");

                    while($row = mysqli_fetch_assoc($query)){


                        ?>
                    <tr>
                      <td><?php echo $row["cid"]; ?></td>
                      <td><?php echo $row["cate_name"]; ?></td>
                      <td><?php echo $row["createdAt"]; ?></td>
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