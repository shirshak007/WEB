
<head>

<style>
.alert {
    padding: 20px;
    background-color: GREEN;
    color: white;
	float: none !important;
	width: auto !important;
}

.closebtn {
    margin-left: 15px;
    color: white;
    font-weight: bold;
    float: right;
    font-size: 22px;
    line-height: 20px;
    cursor: pointer;
    transition: 0.3s;
}

.closebtn:hover {
    color: black;
}
</style>
</head>
<nav>
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "medicinal_plants";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$plant_id=$_POST["plant_id"];
$plant_name=$_POST["plant_name"];
$plant_age=$_POST["plant_age"];

$row=$_POST["row"];
$col=$_POST["col"];
$taxonomy=$_POST["taxonomy"];
$subgroup=$_POST["subgroup"];
$maingroup=$_POST["maingroup"];
$water_amount=1;
$water_frequency=1;
$nutrition_amount=1;
$nutrition_frequency=30;
$max_age=720;
//file upload
$target_dir = "./assets/img";
$target_file = $target_dir . basename($_FILES["file"]["name"]);
$file_ext = substr($target_file, strripos($target_file, '.'));
$target_file = "plant".$plant_id.$file_ext;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["file"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["file"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["file"]["tmp_name"],"./assets/img/". $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["file"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}

//all conditions goes here
if((int)$plant_age<=30)
{
    if($maingroup=="3")
    {
        $water_amount=1-(1*20/100);
        $water_frequency=2; 
        $nutrition_amount=1+(1*25/100);
        $nutrition_frequency=30;
   
    }
    elseif($subgroup=="4"){
        $water_amount=1+(1*30/100);
        $water_frequency=2; 
        $nutrition_amount=1+(1*20/100);
        $nutrition_frequency=30;
    }
    else{
        $water_amount=1;
        $water_frequency=1; 
        $nutrition_amount=1;
        $nutrition_frequency=30;
    }
}
elseif(((int)$plant_age>30) &&((int)$plant_age<=120))
{

    if($maingroup=="3")
    {
        $water_amount=2-(2*20/100);
        $water_frequency=2; 
        $nutrition_amount=1+(1*25/100);
        $nutrition_frequency=30;
    }
    elseif($subgroup=="4"){
        $water_amount=2+(2*30/100);
        $water_frequency=2; 
        $nutrition_amount=1+(1*20/100);
        $nutrition_frequency=30;
    }
    else{
        $water_amount=2;
        $water_frequency=1; 
        $nutrition_amount=1;
        $nutrition_frequency=30;
    }
   
}
elseif(((int)$plant_age>120) &&((int)$plant_age<=210))
{
    if($maingroup=="3")
    {
        
        $water_amount=3-(3*20/100);
        $water_frequency=2; 
        $nutrition_amount=1+(1*25/100);
        $nutrition_frequency=30;
    
    }
    elseif($subgroup=="4"){
        $water_amount=3+(3*30/100);
        $water_frequency=2; 
        $nutrition_amount=1+(1*20/100);
        $nutrition_frequency=30;
    }
    else{
        $water_amount=3;
        $water_frequency=2; 
        $nutrition_amount=1;
        $nutrition_frequency=30;
    }
  
}
else
{
    if($maingroup=="3")
    {
        
        $water_amount=4-(4*30/100);
        $water_frequency=2; 
        $nutrition_amount=1+(1*25/100);
        $nutrition_frequency=30;
   
    }
    elseif($subgroup=="4"){
        $water_amount=4+(4*30/100);
        $water_frequency=2; 
        $nutrition_amount=1+(1*20/100);
        $nutrition_frequency=30;
    }
    else{
        $water_amount=4;
        $water_frequency=2; 
        $nutrition_amount=1;
        $nutrition_frequency=30;
    }
   
}
if($subgroup=="6")
{
    $max_age=900;
}
elseif($subgroup=="3")
{
    $max_age=570;
}
else
{
    $max_age=720;
}

$Date = date("Y-m-d",strtotime('+330 minutes')); 
//manage current and date of birth
$dob= date('Y-m-d', strtotime($Date. '-' .$plant_age.' days'));
// Add days to date and display it 
$days=$nutrition_frequency-$plant_age%$nutrition_frequency;
$daysw=$water_frequency-$plant_age%$water_frequency;
// Add days to date and display it 
$next_water= date('Y-m-d', strtotime($Date. '+' .$daysw.' days')); 
$next_nutrition= date('Y-m-d', strtotime($Date. '+' .$days.' days'));

// $date1=date_create("2013-03-15");
// $date2=date_create("2013-12-12");
// $diff=date_diff($date1,$date2);
// echo $diff->format("%a days");

$sql = "INSERT INTO plants (ID,Name,DOB,CurrentAge,MaxAge,WaterAmount,WaterFrequency,NutritionAmount,NutritionFrequency,Photo,Taxonomy,Row,Col,SubgroupID,MaingroupID,Flag,NextWater,NextNutrition) VALUES($plant_id,'$plant_name','$dob','$plant_age','$max_age','$water_amount','$water_frequency','$nutrition_amount','$nutrition_frequency','plant$plant_id.jpg','$taxonomy','$row','$col',$subgroup,$maingroup,1,'$next_water','$next_nutrition')";
   if ($conn->query($sql) === TRUE) 
   {
	
?>
<body>
<div class="alert">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
  <strong>New Plant Inserted successfully</strong><br>

  
</div>
<?php 
header("Refresh: 1; URL=AdminHome.php");

} 
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
?>

<?php
}

?>