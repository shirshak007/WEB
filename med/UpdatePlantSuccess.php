<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.alert1 {
    padding: 20px;
    background-color: GREEN;
    color: white;
	float: none !important;
	width: auto !important;
}
.alert2 {
    padding: 20px;
    background-color: RED;
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
<body>
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
session_start();
$plant_id=$_POST["plant_id"];

$plant_name=$_POST["plant_name"];
$Date = date("Y-m-d",strtotime('+330 minutes'));
$dop=$_POST["dob"];
$date1=date_create($Date);
    $date2=date_create($dop);
    $diff=date_diff($date1,$date2);
    
$current_age=$diff->format("%a");
$row=$_POST["row"];
$col=$_POST["col"];
$taxonomy=$_POST["taxonomy"];
$subgroup=$_POST["subgroup"];
$maingroup=$_POST["maingroup"];
$status=$_POST["status"];
$water_amount=1;
$water_frequency=1;
$nutrition_amount=1;
$nutrition_frequency=30;
$max_age=720;
    //all conditions goes here
    if((int)$current_age<=30)
    {
        if($maingroup=="3")
        {
            $water_amount=1-(1*20/100);
            $water_frequency=1; 
            $nutrition_amount=1+(1*25/100);
            $nutrition_frequency=30;
       
        }
        elseif($subgroup=="4"){
            $water_amount=1+(1*30/100);
            $water_frequency=1; 
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
    elseif(((int)$current_age>30) &&((int)$current_age<=120))
    {
    
        if($maingroup=="3")
        {
            $water_amount=2-(2*20/100);
            $water_frequency=1; 
            $nutrition_amount=1+(1*25/100);
            $nutrition_frequency=30;
        }
        elseif($subgroup=="4"){
            $water_amount=2+(2*30/100);
            $water_frequency=1; 
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
    elseif(((int)$current_age>120) &&((int)$current_age<=210))
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
$dob= date('Y-m-d', strtotime($Date. '-' .$current_age.' days'));
// Add days to date and display it 
$days=$nutrition_frequency-$current_age%$nutrition_frequency;

$daysw=$water_frequency-$current_age%$water_frequency;
// Add days to date and display it 

$next_water= date('Y-m-d', strtotime($Date. '+' .$daysw.' days')); 
$next_nutrition= date('Y-m-d', strtotime($Date. '+' .$days.' days'));

$sql1 = "update plants set Name='$plant_name',Taxonomy='$taxonomy',DOB='$dop',WaterAmount='$water_amount',WaterFrequency='$water_frequency',NutritionAmount='$nutrition_amount',NutritionFrequency='$nutrition_frequency',CurrentAge='$current_age',Row='$row',Col='$col',SubgroupID='$subgroup',MaingroupID='$maingroup',Flag=$status where ID=$plant_id";
  if ($conn->query($sql1) === TRUE) {
   // echo "Record updated successfully";
	?>
	<div class="alert1">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
  <strong>Updated successfully</strong>
</div>
	<?php
  
  header("Refresh: 1; URL=AdminHome.php");

} else {
    echo "Error updating record: " . $conn->error;

}

?>