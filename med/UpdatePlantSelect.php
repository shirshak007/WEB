<head>
<style>
.atable {
  color: black;
  text-decoration: none;
  background-color: transparent;
}

.atable:hover {
  color: green;
  text-decoration: underline;
}
</style>
<script language="javascript" type="text/javascript">

function sortTable(n) {

  var table, rows, switching, i, x, y, shouldSwitch,m;
  table = document.getElementById("report1");
  switching = true;
  m=n;
  /*Make a loop that will continue until
  no switching has been done:*/
  while (switching) {
    //start by saying: no switching is done:
    switching = false;
    rows = table.getElementsByTagName("tr");
    /*Loop through all table rows (except the
    first, which contains table headers):*/
    for (i = 1; i < (rows.length - 1); i++) {
      //start by saying there should be no switching:
      shouldSwitch = false;
      /*Get the two elements you want to compare,
      one from current row and one from the next:*/
      x = rows[i].getElementsByTagName("td")[3];
      y = rows[i + 1].getElementsByTagName("td")[3];
      //check if the two rows should switch place:
      if(m==0)
	  {
	  if (Number(x.innerHTML) > Number(y.innerHTML)) {
        //if so, mark as a switch and break the loop:
        shouldSwitch = true;
        break;
      }
	  }
	  else
	  {
		if (Number(x.innerHTML) < Number(y.innerHTML)) {
        //if so, mark as a switch and break the loop:
        shouldSwitch = true;
        break;
      }  
	  }
    }
    if (shouldSwitch) {
      /*If a switch has been marked, make the switch
      and mark that a switch has been done:*/
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
    }
  }
}

</script>
</head> 
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


?>

<select name="selected_plant" id="selected_plant" onchange="location = this.value;">
<option value="#"></option>
  <?php
  $sql = "SELECT * FROM plants";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        $plant_id=$row["ID"];
        ?>
        <option value="UpdatePlantEdit.php?plant_id=<?php echo $plant_id?>"><?php echo $row["ID"].". ".$row["Name"]?></option>
        <?php
      }
  } else {
      echo "0 results";
  }
  ?>
  </select>

<?php

$sql = "SELECT *,plants.ID as plant_id,plants.Name as plant_name, subgroup.Name as sub_name,maingroup.Name as main_name FROM plants,subgroup,maingroup where plants.SubgroupID=subgroup.ID AND plants.MaingroupID=maingroup.ID ORDER BY plants.Name ASC";
$result = $conn->query($sql);
  
?>

or, Select from here
<h6>Sorted By Name </h6>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Photo</th>
      <th scope="col">Taxonomy</th>
      <th scope="col">Subgroup</th>
      <th scope="col">Main Group</th>
      <th scope="col">Position</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
	<?php
if ($result->num_rows > 0) 
{
    // output data of each row
    while($row = $result->fetch_assoc()) 
	{
    ?>
   
      <td><?php echo $row["plant_id"]?></td>
      <td><?php echo $row["plant_name"]?></td>
      <td><img src="./assets/img/<?php echo $row["Photo"]?>" width=100 height=80></td>
      <td><?php echo $row["Taxonomy"]?></td>
      <td><?php echo $row["sub_name"]?></td>
      <td><?php echo $row["main_name"]?></td>
      <td><?php echo $row["Row"].",".$row["Col"]?></td>
      <td><?php if($row["Flag"]) echo "Alive"; else echo "Dead";?></td>
	    <td>	
      <a class="atable" href="UpdatePlantEdit.php?plant_id=<?php echo $row["plant_id"]?>"><img src="./assets/icon/edit.png" height="20px" width="20px"> Edit</img></a>
      </td>
  </tr>
  </tbody>

	<?php
  }
}
else echo "No results"; 

$conn->close();
?>
</table>

