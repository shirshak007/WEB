
<html>
<title>Medicinal Garden| Show Details</title>

<link rel="icon" type="image/x-icon" href="assets/icon/favicon.ico" />
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    />
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script
    src="https://use.fontawesome.com/releases/v5.13.0/js/all.js"
    crossorigin="anonymous"
  ></script>
  
<style>
.navbar-dark .nav-item:hover .nav-link {
    color: white;
}

.navbar-dark .navbar-nav .nav-link {
    color: #96ff40;
}


body {
    font-family: tahoma, helvetica, arial, sans-serif;
    font-size: 18px;
    padding-top: 12px;
    line-height: 2;
    background-attachment: fixed;
    background-size: 100%;
    opacity: 1;
 
}
a {
  color: #fed136;
  text-decoration: none;
  background-color: transparent;
}
a:hover {
  color: cyan;
  text-decoration: none;
}
.afooter {
  color:white
}
.dropdown {
    position:fixed;
    right:20px;
    color: #fed136;
  text-decoration: none;
  background-color: transparent;
}
.dropdown-content {
    display: none;
    position: absolute;
    background-color: #75D975;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}
.dropdown-content a:hover {background-color: #f1f1f1}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: left;
}


.dropdown:hover .dropdown-content {
    display: block;
    color: white;
    text-decoration: none;
}
.sidenav {
  
  width: 160px;
  position: fixed;
  z-index: 1;
  top: 80px;
  left: 0;
  background-color: #111;
  overflow-y: auto;
  padding-top: 20px;
}

.sidenav a {
  padding: 6px;
  text-decoration: none;
  font-size: 16px;
  color: #818181;
  display: block;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.main {
  margin-left: 160px; /* Same as the width of the sidenav */
  font-size: 28px; /* Increased text to enable scrolling */
  padding: 0px 10px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}

/* Start http://www.cursors-4u.com */ * {cursor: url(https://cur.cursors-4u.net/cursors/cur-11/cur1014.cur), auto !important;} /* End http://www.cursors-4u.com */
</style>
</head>
<body>


<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top" id="mainNav">
      <!-- Brand/logo -->
      <a class="navbar-brand js-scroll-trigger" href="index.php"
        ><img src="assets/icon/logo.png" height="30px" width="30px" alt="logo"/>
        MEDICINAL NURSERY</a>
   
 
</nav>
<!-- Sidenav-->
<div class="sidenav">
  <a class="js-scroll-trigger" href="#maingroups">Main Groups</a>
  <a class="js-scroll-trigger" href="#subgroups">Sub Groups</a>
  <a class="js-scroll-trigger" href="#current_plants">Current Plants</a>
  <a class="js-scroll-trigger" href="#dead_plants">Dead Plants</a>
  <a class="js-scroll-trigger" href="#water">Water Schedule</a>
  <a class="js-scroll-trigger" href="#nutrition">Nutrition Schedule</a>
  <a class="js-scroll-trigger" href="#single_plant">Get Plant Info</a>
</div>
<div style="padding-left:200px;padding-top:80px ;margin-bottom:20px">
<!-- Main Groups-->
<section class="page-section"  style="margin-top:20px" id="maingroups">
<div class="container">
      <div class="text-center">
        <h2 class="section-heading text-uppercase">Main Groups</h2>
<?php
include("./Maingroups.php");
?>
</div>
</div>
</section>
<!-- Sub Groups-->
<section class="page-section"  style="margin-top:20px" id="subgroups">
    <div class="container">
      <div class="text-center">
        <h2 class="section-heading text-uppercase">Subgroups</h2>
<?php
include("./Subgroups.php");
?>

</div>
</div>
</section>

<!-- Current Plants-->
<section class="page-section"  style="margin-top:20px" id="current_plants">
    <div class="container">
      <div class="text-center">
        <h2 class="section-heading text-uppercase">Current Plants</h2>
<?php
include("./CurrentPlants.php");
?>

</div>
</div>
</section>
<!-- Dead Plants-->
<section class="page-section"  style="margin-top:20px" id="dead_plants">
    <div class="container">
      <div class="text-center">
        <h2 class="section-heading text-uppercase">Dead Plants</h2>
<?php
include("./DeadPlants.php");
?>

</div>
</div>
</section>
<!-- Water Schedule-->
<section class="page-section"  style="margin-top:20px" id="water">
    <div class="container">
      <div class="text-center">
        <h2 class="section-heading text-uppercase">Water Schedule</h2>
<?php
include("./WaterSchedule.php");
?>

</div>
</div>
</section>
<!-- Nutrition Schedule-->
<section class="page-section"  style="margin-top:20px" id="nutrition">
    <div class="container">
      <div class="text-center">
        <h2 class="section-heading text-uppercase">Nutrition Schedule</h2>
<?php
include("./NutritionSchedule.php");
?>

</div>
</div>
</section>
<!-- Single Plant Info-->
<section class="page-section"  style="margin-top:20px" id="single_plant">
    <div class="container">
      <div class="text-center">
        <h2 class="section-heading text-uppercase">single plant info</h2>
<?php
include("./SinglePlantInfo.php");
?>

</div>
</div>
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
  <!-- Third party plugin JS-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>

  <!-- Core theme JS-->
  <script src="./js/scripts.js"></script>
</div>
 <!-- Footer-->
 <footer class="footer py-4 bg-dark" id="footer">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-4 text-lg-left" style="color: white;">
          Copyright © Medicinal Garden 2020
        </div>
        <div class="col-lg-4 my-3 text-lg-center">
          <address class="text-light">
           
            Mail Us:
            <a
              class="text-light"
              href="mailto:xyx@med.in
            "
              >xyx@med.in </a
            ><br />
            Call Us:
            <a class="text-light" href="tel:9876543210">9876543210</a>
          </address>
          <a class="btn btn-light btn-social mx-2" href="#!"
            ><i class="fab fa-whatsapp"></i
          ></a>
          <a class="btn btn-light btn-social mx-2" href="#!"
            ><i class="fab fa-facebook-f"></i
          ></a>
        </div>
        <div class="col-lg-4 text-lg-right">
          <a class="afooter"  href="#">Privacy Policy</a><br>
          <a class="afooter" href="#">Terms & Conditions</a>
        </div>
      </div>
    </div>
  </footer>
  <!-- Bootstrap core JS-->
</body>
