<style>

* {
    box-sizing: border-box;
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

#report1 tr:hover {background-color: #118BBA;}

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
.search-container {
  float: right;
}
.search-container input {
  
  padding: 6px;
  margin-top: 8px;
  margin-right: 16px;
  background: #fff;
  font-size: 17px;
  border: none;
  cursor: pointer;
}
.search-container button {
  float: right;
  padding: 6px;
  margin-top: 8px;
  margin-right: 16px;
  background: #ddd;
  font-size: 17px;
  border: none;
  cursor: pointer;
}
 .search-container button:hover {
  background: #ccc;
}

@media screen and (max-width: 600px) {
   .search-container {
    float: none;
  }
   a,  input[type=text],  .search-container button {
    float: none;
    display: block;
    text-align: left;
    width: 100%;
    margin: 0;
    padding: 14px;
  }
   input[type=text] {
    border: 1px solid #ccc;  
  }
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
    $Date = date("Y-m-d",strtotime('+330 minutes'));
$search=$_POST["search"];
$sql = "SELECT * from plants where Flag=1;";
$result = $conn->query($sql);	
?>
<a class="back" href="./ShowDetails.php">BACK</a>
<h4>Water Schedule for <?php echo $search?></h4>
<table id="report1">
	<tr>
    <th>ID</th>
    <th>Name</th>
	<th>Current Age</th>
    <th>Position</th>
    <th>Photo</th>
    <th>Water</th>
    
	</tr>
	<?php
	

if ($result->num_rows > 0) 
{
	while($row = $result->fetch_assoc()) 
{ 
    $date1=date_create($search);
    $date2=date_create($row["DOB"]);
    $diff=date_diff($date1,$date2);
    $plant_age=$diff->format("%a");
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

// Add days to date and display it 
if(($plant_age%$water_frequency)==0)
{
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
    if(($plant_age%$water_frequency)==0)
    echo $water_amount." unit";
    else
    echo "no water on ". $search;
    ?></td>
	
	</tr>
<?php 

}
else echo "";
}
}
else echo "<tr><td>No Results</td></tr>";

	?>
	</table>