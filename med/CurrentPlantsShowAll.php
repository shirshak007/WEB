<html>  
<head>  
<title> Current Plants </title>  
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
a{
	color:black;
	text-decoration:none
}
a:hover{
	color:green;
	text-decoration:none
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
    //database connection  
     
    if (! $conn) {  
die("Connection failed" . mysqli_connect_error());  
    }  
    else {  
mysqli_select_db($conn, 'pagination');  
    }  
  
    //define total number of results you want per page  
    $results_per_page = 3;  
  
    //find the total number of results stored in the database  
    $query = "select * from plants";  
    $result = mysqli_query($conn, $query);  
    $number_of_result = mysqli_num_rows($result);  
  
    //determine the total number of pages available  
    $number_of_page = ceil ($number_of_result / $results_per_page);  
  
    //determine which page number visitor is currently on  
    if (!isset ($_GET['page']) ) {  
        $page = 1;  
    } else {  
        $page = $_GET['page'];  
    }  
  
    //determine the sql LIMIT starting number for the results on the displaying page  
    $page_first_result = ($page-1) * $results_per_page;  
  
    //retrieve the selected results from database   
    $query = "SELECT *FROM plants LIMIT " . $page_first_result . ',' . $results_per_page;  
    $result = mysqli_query($conn, $query);  
    $Date = date("Y-m-d",strtotime('+330 minutes'));
    //display the retrieved result on the webpage  
    ?>
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
  ?>
<a class="back" href="./ShowDetails.php">BACK</a><br><?php
    //display the link of the pages in URL  
    
    echo "Goto: ";

    for($page = 1; $page<= $number_of_page; $page++) {  
        echo '<a href = "CurrentPlantsShowAll.php?page=' . $page . '">' . $page . ' </a>';  
    }  
  
?>  
</body>  
</html> 