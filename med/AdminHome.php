
<html>
<title>Medicinal Garden| Admin Home</title>

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

div.container{
width:100%;
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
  overflow-x: hidden;
  padding-top: 20px;
}

.sidenav a {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 20px;
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
        <div class="dropdown" style="float:right">
    <a href="javascript:void(0)"><?php session_start(); echo $_SESSION["a_name"];?></a>
    <div class="dropdown-content">
	  <a href="AdminHome.php">Home</a>
      
      <a href="logout.php">Log Out</a>
	  
    </div>
  </div>
</nav>
<!-- Sidenav-->
<div class="sidenav">
  <a class="js-scroll-trigger" href="#addplant">Add Plant</a>
  <a class="js-scroll-trigger"  href="#updateplant">Update Plant</a>
</div>
<div style="padding-left:200px;padding-top:80px ;margin-bottom:20px">
<!-- Add Plant-->
<section class="page-section"  style="margin-top:20px" id="addplant">
<div class="container">
      <div class="text-center">
        <h2 class="section-heading text-uppercase">Add New Plant</h2>
<?php
include("./AddPlant.php");
?>
</div>
</div>
</section>
<!-- Update Plant-->

</div>
<div style="padding-left:200px;padding-top:80px ;margin-bottom:20px">

<!-- Update Plant-->
<section class="page-section"  style="margin-top:20px" id="updateplant">
<div class="container">
      <div class="text-center">
        <h2 class="section-heading text-uppercase">Update Plant</h2>
<?php
include("./UpdatePlantSelect.php");
?>
</div>
</div>
</section>
</div>
<!-- Bootstrap core JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
  <!-- Third party plugin JS-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>

  <!-- Core theme JS-->
  <script src="./js/scripts.js"></script>
</body>
