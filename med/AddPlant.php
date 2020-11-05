<head>
<style>
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

div.form {
    background-color: #e8e8e8; /* Green */
   
    color: black;
    padding: 15px 32px;
    text-align: left;
    text-decoration: none;
    display: inline-block;
    font-size: 14px;
    margin: 4px 2px;
    cursor: pointer;
    
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


ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
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
    background-color: #abc;
}

</style>
<script language="javascript" type="text/javascript">
function validateForm()
{
if(document.forms["myForm"]["plant_name"].value=="")
	{
	   alert("Name field should not be empty");
	   document.forms["myForm"]["plant_name"].focus();
	   return false
	}
	if(document.forms["myForm"]["plant_age"].value=="")
	{
	   alert("Age field should not be empty");
	   document.forms["myForm"]["plant_age"].focus();
	   return false
	}
    if(isNaN(document.forms["myForm"]["plant_age"].value))
	{
	   alert("Age field should be numeric");
	   document.forms["myForm"]["plant_age"].focus();
	   return false
	}
		
    if(document.forms["myForm"]["taxonomy"].value=="")
	{
	   alert("taxonomy field should not be empty");
	   document.forms["myForm"]["taxonomy"].focus();
	   return false
	}	if(document.forms["myForm"]["row"].value=="")
	{
	   alert("row field should not be empty");
	   document.forms["myForm"]["row"].focus();
	   return false
	}	if(document.forms["myForm"]["col"].value=="")
	{
	   alert("col field should not be empty");
	   document.forms["myForm"]["col"].focus();
	   return false
	}
}
</script>
</head> 
<body>


</div>


<div class="form">	
<form id="f1" name="myForm" action="AddPlantSuccess.php" onsubmit="return validateForm()" method="post" enctype="multipart/form-data">
PLANT ID<font color=red>*</font>(Auto Generated)
<input type=text name=plant_id readonly value="<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "medicinal_plants";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) 
    die("Connection failed: " . $conn->connect_error);


$sql = "SELECT * FROM plants ORDER BY ID DESC LIMIT 1";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $id1= $row["ID"];
		$id1++;
    }
} else {
    echo "0 results";
}

echo $id1;
?>">

    NAME<font color=red>*</font>
	<input type=text name=plant_name>
	
	CURRENT AGE(Days)<font color=red>*</font>
	<input type=text name=plant_age>
	
    
    TAXONOMY INFO<font color=red>*</font>
	<input type=text name=taxonomy min=1 max=100>
	
    ROW<font color=red>*</font>
	<input type=text name=row min=1 max=100>	
	
	COLUMN<font color=red>*</font>
	<input type=text name=col>	
	SELECT SUBGROUP<font color=red>*</font>
    
  <select name="subgroup" id="subgroup">
  <?php
  $sql = "SELECT * FROM subgroup";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
          $subgroup_id= $row["ID"];
          $subgroup_name= $row["Name"];
          echo "<option value=$subgroup_id>$subgroup_id. $subgroup_name</option>";
      }
  } else {
      echo "0 results";
  }
  ?>
    
  </select>
    SELECT MAIN GROUP<font color=red>*</font>
    
  <select name="maingroup" id="maingroup">
  <?php
  $sql = "SELECT * FROM maingroup";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
          $maingroup_id= $row["ID"];
          $maingroup_name= $row["Name"];
          echo "<option value=$maingroup_id>$maingroup_id. $maingroup_name</option>";
      }
  } else {
      echo "0 results";
  }
  ?>
  </select>
	Upload Image: <input id="file" name="file" type="file" />
	<input id="submit" name="submit" type="submit" value="Insert" />
	</form>
	</div>
	</div>
	
	</body>
	
