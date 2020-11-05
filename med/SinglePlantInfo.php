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
a:hover{
	color:yellow;
	text-decoration:none
}
 .search-container {
  float: right;
}
.search-container input {
  border: 1px solid grey;
    border-radius: 5px;
  padding: 6px;
  margin-top: 8px;
  margin-right: 16px;
  background: #fff;
  font-size: 17px;
 
  cursor: pointer;
}
.search-container button {
  float: right;
  border: 1px solid grey;
    border-radius: 5px;
  padding: 6px;
  margin-top: 8px;
  margin-right: 16px;
  background: #ddd;
  font-size: 17px;
 
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
$sql = "SELECT * from plants";
$result = $conn->query($sql);	
?>
<div class="search-container">
    <form action="./SinglePlantInfoSearch.php" method=post>
      <input type="text" placeholder="Search Phrase.." name="search">
      <button type="submit">Search</button>
    </form>
  </div>
<table id="report1">
	<tr>
    <th>ID</th>
    <th>Name</th>
	<th>Taxonomy</th>
	<th>Current Age</th>
    <th>Position</th>
    <th>Photo</th>
    <th>Action</th>
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
	
	<td>	
      <a class="atable" href="SinglePlantInfoOpen.php?plant_id=<?php echo $row["ID"]?>"><img src="./assets/icon/reveal.png" height="20px" width="20px"> Open</img></a>
      </td>
	</tr>
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