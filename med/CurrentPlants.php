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

ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #2a1506;
}

li {
    float: left;
}

li a, .dropbtn {
    display: inline-block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover, .dropdown:hover .dropbtn {
    background-color: #037070;
}

li.dropdown {
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #75D975;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: left;
}

.dropdown-content a:hover {background-color: #f1f1f1}

.dropdown:hover .dropdown-content {
    display: block;
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
.showall{
	color:black;
	text-decoration:none
}
.showall:hover{
	color:green;
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
    $Date = date("Y-m-d",strtotime('+330 minutes'));
$sql = "SELECT * from plants where Flag=1 LIMIT 4;";
$result = $conn->query($sql);	
?>
<a class="showall" href="CurrentPlantsShowAll.php">Show All...</a>
<table id="report1">
	<tr>
    <th>ID</th>
    <th>Name</th>
	<th>Taxonomy</th>
	<th>Current Age</th>
    <th>Position</th>
    <th>Photo</th>
	</tr>
	<?php
	

if ($result->num_rows > 0) 
{
	while($row = $result->fetch_assoc()) 
{ 

?>
	
    <tr>
	<td><?php echo $row["ID"]?></td>
	<td><?php echo $row["Name"]?></td>
    <td><?php echo $row["Taxonomy"]?></td>
    <td><?php 
    $date1=date_create($Date);
    $date2=date_create($row["DOB"]);
    $diff=date_diff($date1,$date2);
    echo $diff->format("%a days")
    ?></td>
    <td><?php echo $row["Row"].",".$row["Col"]?></td>
    <td><img src="./assets/img/<?php echo $row["Photo"]?>" width=100 height=80></td>
	
	
	</tr>
<?php 
}
}
else  {
    ?>
    <div style="padding-top:50px">No Results</div>
   
    <?php
}

	?>
	</table>
    