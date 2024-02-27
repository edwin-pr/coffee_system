<?php
include 'core/classes.php';

if (!isset($_SESSION['supplier_number'])) {
  // code...
  echo "<script>window.location='logout.php'</script>";

}
else{
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="dash/assets/img/apple-icon.png">
<link rel="stylesheet" type="text/css" href="vendor/datatables/dataTables.bootstrap4.min.css">
  <link rel="icon" type="image/png" href="dash/assets/img/favicon.png">
  <title>
    Farmer - Dashboard
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="dash/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="dash/assets/css/nucleo-svg.css" rel="stylesheet" />
      <link href="assets/css/font-awesome.min.css" rel="stylesheet">
      <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="dash/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <!-- <link href="assets/css/style.css" rel="stylesheet"> -->
  <!-- <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/css/font-awesome.min.css" rel="stylesheet">
  <link href="assets/css/owl.carousel.min.css" rel="stylesheet"> -->
  <link id="pagestyle" href="dash/assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
  <link rel="stylesheet" href="css/vendor.bundle.addons.css" asp-append-version="true" />
  <link rel="stylesheet" href="css/vendor.bundle.base.css" asp-append-version="true" />
  <script src="js/off-canvas.js" asp-append-version="true"></script>
  <script src="js/vendor.bundle.addons.js" asp-append-version="true"></script>
  <script src="js/vendor.bundle.base.js" asp-append-version="true"></script>
  <script src="js/chart.js" asp-append-version="true"></script>
</head>

<body class="g-sidenav-show   bg-gray-100">
 
  <aside  class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
   
    <div style="height:700px;" class="collapse navbar-collapse mt-2  w-auto " id="sidenav-collapse-main">
      <ul  class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" href="dashboard2.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="farmer-report.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">report</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="logout.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-sign-out-alt text-success text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Logout</span>
          </a>
        </li>
  
      </ul>
    </div>
     
  </aside>
  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
   
 <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
     
        <div class="collapse navbar-collapse mt-sm-0 m-2 me-md-0 me-sm-4" id="navbar">
       
          <ul class="navbar-nav  justify-content-end">
        
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line bg-danger"></i>
                  <i class="sidenav-toggler-line bg-danger"></i>
                  <i class="sidenav-toggler-line bg-danger"></i>
                </div>
              </a>
            </li>
          

          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <?php } ?>