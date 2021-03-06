<head>
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
.back {
  color: red;
  text-decoration: none;
  background-color: transparent;
}
a:hover {
  color: cyan;
  text-decoration: none;
}
.masthead {
  padding-top: 5.5rem;
  padding-bottom: 1;
  text-align: left;
  color: #000;
 
  background-repeat: no-repeat; 
  background-position: right bottom;
  background-size: 60vh;

}

.masthead-subheading {
  font-size: 20px;
 
  line-height: 2.5rem;
  margin-bottom: 25px;
  font-family: "Droid Serif", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
}

 .masthead-heading {
  font-size: 3rem;
  font-weight: 500;
  line-height: 3.25rem;
  margin-bottom: 2rem;
  text-shadow: 0 0 20px #fff, 0 0 30px #ff4da6, 0 0 40px green, 0 0 10px green, 0 0 20px green, 0 0 30px green, 0 0 40px green;
  font-family: "Montserrat", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
}

.plantimg{
    margin-top:5rem;
    float:right

}
	</style>
    </head>
<body>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top" id="mainNav">
      <!-- Brand/logo -->
      <a class="navbar-brand js-scroll-trigger" href="index.php"
        ><img src="assets/icon/logo.png" height="30px" width="30px" alt="logo"/>
        MEDICINAL NURSERY</a>
   
 
</nav>
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "medicinal_plants";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) 
    die();
    $Date = date("Y-m-d",strtotime('+330 minutes'));
$search=$_POST["search"];
$sql = "SELECT * from plants where  Name LIKE '%$search%'";
$result = $conn->query($sql);	
?>
<section class="page-section"  style="margin-top:20px" >
<div class="container">
       
 
<?php
if ($result->num_rows > 0) 
{
	while($row = $result->fetch_assoc()) 
{ 
?>
    <!-- Masthead-->
	<div class="masthead">
    <img class="plantimg" src="<?php echo "./assets/img/".$row["Photo"]?>" height=200>
    <div class="container">
     
      <div class="masthead-heading text-uppercase"><?php echo$row["Name"]?></div>
      <div class="masthead-subheading">
      <?php echo "Taxonomy: ".$row["Taxonomy"]?> <br>
      <?php echo "Date of Plant: ".$row["DOB"]?> <br>
      <?php 
      $date1=date_create($Date);
      $date2=date_create($row["DOB"]);
      $diff=date_diff($date1,$date2);
      $plant_age= number_format($diff->format("%a"));
      echo "Current Age: ".$plant_age?>  <br>
      <?php echo "Max Age: ".$row["MaxAge"]?>  <br>
      <?php echo "Water Amount: ".$row["WaterAmount"]." unit"?>  <br>
      <?php echo "Water Frequency: ".$row["WaterFrequency"]?>  <br>
      <?php echo "Nutrition Amount: ".$row["NutritionAmount"]." unit"?>  <br>
      <?php echo "Nutrition Frequency: ".$row["NutritionFrequency"]?>  <br>
      <?php echo "Location (row,col): ".$row["Row"].",".$row["Col"]?>  <br>
      <?php 
      
      if ($row["Flag"]==0)
      {
          $status="Dead";
        }
      else
      {
          $status="Alive";
        }
      echo "Status: ".$status;
      ?>  <br>
    </div>
  </header>
    
<?php
}
}
else {
    ?>
    <div style="padding-top:100px">No Results</div>
   <a class="back" href="./ShowDetails.php">BACK</a>
    <?php
}

	?>
	</table>
    </div>
</div>
</section>