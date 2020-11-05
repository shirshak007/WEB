<head>
<title>Edit Plant</title>
<link rel="icon" type="image/x-icon" href="assets/icon/favicon.ico" />
<meta charset="UTF-8">
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
div.container{
    display:flex;
    flex-direction:row;
    align-items:center;
    justify-content:center;
    padding:40px;
    margin-top:20px;
}
div.form {
    background-color: #e8e8e8; /* Green */
    width:60%;
   
    color: black;
    padding: 15px 32px;
    text-align: left;
    text-decoration: none;
    display: inline-block;
    font-size: 14px;
    margin: 4px 2px;
    cursor: pointer;
    
}
@media only screen and (max-width: 600px) {
    div.form {width:95%;
   }
}
div.button {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
   
}

.button1 {
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
}

.button2:hover {
    box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);

}




input[type=text], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
input[type=text]:hover {
    background-color: #c7c7c7;
}
input[type=submit] {
    width: 100%;
    background-color: #4Db0E6;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #45b67f;
}

.navbar-dark .nav-item:hover .nav-link {
    color: white;
}

.navbar-dark .navbar-nav .nav-link {
    color: #96ff40;
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

</style>
</head>

<?php  session_start();?>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top" id="mainNav">
      <!-- Brand/logo -->
      <a class="navbar-brand js-scroll-trigger" href="index.php"
        ><img src="assets/icon/logo.png" height="30px" width="30px" alt="logo"/>
        MEDICINAL NURSERY</a>
        <div class="dropdown" style="float:right">
    <a href="javascript:void(0)"><?php  echo $_SESSION["a_name"];?></a>
    <div class="dropdown-content">
	  <a href="AdminHome.php">Home</a>
      
      <a href="logout.php">Log Out</a>
	  
    </div>
  </div>
</nav>
<div class="container">
<div class="form">
  <h3>UPDATE PLANT INFO</h3>

  
  
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

$plant_id=$_GET["plant_id"];

$sql = "SELECT * from plants where ID=$plant_id;";
$result = $conn->query($sql);
if ($result->num_rows > 0) 
{
	while($row = $result->fetch_assoc()) 
{ $main=$row["MaingroupID"];
    $sub=$row["SubgroupID"];
?>
  <form action=UpdatePlantSuccess.php method=post>
  <input type=hidden name=plant_id value="<?php echo $row["ID"]?>">
	Name
	<input type=text name=plant_name value="<?php echo $row["Name"]?>">

	Taxonomy Info
	<input type=text name=taxonomy value="<?php echo $row["Taxonomy"]?>">

	DOB<br>
	<input type=date name=dob value="<?php echo $row["DOB"]?>">
	<br>
	Row
	<input type=text name=row value="<?php echo $row["Row"]?>">
	
	Column
	<input type=text name=col value="<?php echo $row["Col"]?>">
    Status
    <select name="status" id="status">
    <option value=1 <?php if($row["Flag"]==1) echo "selected"; else echo "";?>>Alive</option>
    <option value=0  <?php if($row["Flag"]==0) echo "selected"; else echo "";?>>Dead</option>
    </select>
    Maingroup<font color=red>*</font>
    
  <select name="maingroup" id="maingroup">
  <?php
  $sql = "SELECT * FROM maingroup;";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
          $maingroup_id= $row["ID"];
          $maingroup_name= $row["Name"];
           ?>
          <option value=<?php echo $maingroup_id?> <?php if($maingroup_id==$main) echo "selected"; else echo "";?>><?php echo $maingroup_id. ". ".$maingroup_name?></option>
          <?php
      }
  } else {
      echo "0 results";
  }
  ?>
  </select>
  Subgroup<font color=red>*</font>
    
  <select name="subgroup" id="subgroup">
  <?php
  $sql = "SELECT * FROM subgroup;";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
          $subgroup_id= $row["ID"];
          $subgroup_name= $row["Name"];
          ?>
          <option value=<?php echo $subgroup_id?> <?php if($subgroup_id==$sub) echo "selected"; else echo "";?>><?php echo $subgroup_id. ". ".$subgroup_name?></option>
          <?php
      }
  } else {
      echo "0 results";
  }
  ?>
  </select>
	<input type=submit value="Update">
	</form> 
	<?php
}
}
?>
  
</div>

