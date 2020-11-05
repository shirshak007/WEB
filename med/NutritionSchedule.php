<style>

* {
    box-sizing: border-box;
}
form.example input[type=text] {
    padding: 1px;
    font-size: 17px;
    border: 1px solid grey;
    float: left;
    width: 80%;
    background: #f1f1f1;
}

form.example button {
    float: left;
    width: 20%;
    padding: 10px;
    background: #2196F3;
    color: white;
    font-size: 17px;
    border: 1px solid grey;
    border-left: none;
    cursor: pointer;
}

form.example button:hover {
    background: #0b7dda;
}

form.example::after {
    content: "";
    clear: both;
    display: table;
}

#report1 {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
	color:black;
	
    background-color:#e3e3e3;
	opacity:1;
	text-align: center;
    width: 100%;
}

#report1 td, #report1 th {
    border: 1px solid #ddd;
	
	padding: 8px;
}

#report1 tr:hover {background-color: #118BBA;color:white}

#report1 th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: center;
    background-color: #4CAF50;
	color: white;
}
a{
	color:black;
	text-decoration:none
}
.shake-hard:hover {
  /* Start the shake animation and make the animation last for 0.5 seconds */
  animation: shake 0.5s;

  /* When the animation is finished, start again */
  animation-iteration-count: infinite;
}

@keyframes shake {
  0% { transform: translate(1px, 1px) rotate(0deg); }
  10% { transform: translate(-1px, -2px) rotate(-1deg); }
  20% { transform: translate(-3px, 0px) rotate(1deg); }
  30% { transform: translate(3px, 2px) rotate(0deg); }
  40% { transform: translate(1px, -1px) rotate(1deg); }
  50% { transform: translate(-1px, 2px) rotate(-1deg); }
  60% { transform: translate(-3px, 1px) rotate(0deg); }
  70% { transform: translate(3px, 1px) rotate(-1deg); }
  80% { transform: translate(-1px, -1px) rotate(1deg); }
  90% { transform: translate(1px, 2px) rotate(0deg); }
  100% { transform: translate(1px, -2px) rotate(-1deg); }
}
	</style>

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
$Date = date("Y-m-d");

$sql = "SELECT * from plants where Flag=1;";
$result = $conn->query($sql);	
?>
<table id="report1">
	<tr>
    <th>ID</th>
    <th>Name</th>
	<th>Current Age</th>
    <th>Position</th>
    <th>Photo</th>
    <th>Nutrition</th>
    <th>Next Nutrition</th>
	</tr>
	<?php
	

if ($result->num_rows > 0) 
{
	while($row = $result->fetch_assoc()) 
{ 
    $date1=date_create($Date);
    $date2=date_create($row["DOB"]);
    $diff=date_diff($date1,$date2);
    $plant_age= $diff->format("%a");
    $water_amount=1;
    $water_frequency=1; 
    $nutrition_amount=1;
    $nutrition_frequency=30;
    //all conditions goes here
if((int)$plant_age<=30)
{
    if($row["MaingroupID"]=="3")
    {
        $water_amount=1-(1*20/100);
        $water_frequency=1; 
        $nutrition_amount=1+(1*25/100);
        $nutrition_frequency=30;
   
    }
    elseif($row["SubgroupID"]=="4"){
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
elseif(((int)$plant_age>30) &&((int)$plant_age<=120))
{

    if($row["MaingroupID"]=="3")
    {
        $water_amount=2-(2*20/100);
        $water_frequency=1; 
        $nutrition_amount=1+(1*25/100);
        $nutrition_frequency=30;
    }
    elseif($row["SubgroupID"]=="4"){
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
elseif(((int)$plant_age>120) &&((int)$plant_age<=210))
{
    if($row["MaingroupID"]=="3")
    {
        
        $water_amount=3-(3*20/100);
        $water_frequency=2; 
        $nutrition_amount=1+(1*25/100);
        $nutrition_frequency=30;
    
    }
    elseif($row["SubgroupID"]=="4"){
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
    if($row["MaingroupID"]=="3")
    {
        
        $water_amount=4-(4*30/100);
        $water_frequency=2; 
        $nutrition_amount=1+(1*25/100);
        $nutrition_frequency=30;
   
    }
    elseif($row["SubgroupID"]=="4"){
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
if($row["SubgroupID"]=="6")
{
    $max_age=900;
}
elseif($row["SubgroupID"]=="3")
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
$days=$nutrition_frequency-$plant_age%$nutrition_frequency;

$daysw=$water_frequency-$plant_age%$water_frequency;
// Add days to date and display it 
$next_water= date('Y-m-d', strtotime($Date. '+' .$daysw.' days')); 
$next_nutrition= date('Y-m-d', strtotime($Date. '+' .$days.' days')); 
?>
	
    <tr>
	<td><?php echo $row["ID"]?></td>
	<td><?php echo $row["Name"]?></td>
    
    <td><?php 
    $date1=date_create($Date);
    $date2=date_create($row["DOB"]);
    $diff=date_diff($date1,$date2);
    echo $diff->format("%a days")
    ?></td>
    <td><?php echo $row["Row"].",".$row["Col"]?></td>
    <td><img src="./assets/img/<?php echo $row["Photo"]?>" width=100 height=80></td>
    <td><?php 
    if(($plant_age%$nutrition_frequency)==0)
    echo $nutrition_amount." unit";
    else
    echo "no nutrition today";
    ?></td>
	<td><?php 
    
    echo $next_nutrition;
   
    ?></td>
	</tr>
<?php 
}
}
else  {
    ?>
    <div style="padding-top:100px">No Results</div>
   <a class="back" href="./ShowDetails.php">BACK</a>
    <?php
}

	?>
	</table>