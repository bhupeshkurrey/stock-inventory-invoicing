<?php
	include ('header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Vandana Saree</title>
	<style>
.navbar-inverse .navbar-nav>.activeReport>a,
.navbar-inverse .navbar-nav>.activeReport>a:focus,
.navbar-inverse .navbar-nav>.activeReport>a:hover
{
	color:lightgreen;
	background-color:#080808;
}
</style>
</head>
<body>
<div class="container-fluid">
<div class="well well-lg">
<h3>Products Report (Stock):-</h3><hr style="background-color:lightgrey; height:1px;">
<form action="" method="">
<table class="table table-bordered">
    <thead>
      <tr style="background-color:teal; color:white;">
        <th>S.No.</th>
        <th>Category</th>
        <th>Product Name</th>
        <th>Description</th>
        <th>Color</th>
        <th>Size</th>        
        <th>Unit of Measure</th>
		<th>Quantity</th>
		<th>Unit Price(INR)</th>
      </tr>
    </thead>
	
	<?php 
	include ('config.php');

$sql1 = "SELECT * FROM products";
$result = $conn->query($sql1);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		
		
	?>	
	<tr>
        <td><?php echo $row["prod_id"]; ?></td>
        <td><?php
		$abc= $row["cat_id"];
			$sql2 = "SELECT cat_name FROM category WHERE cat_id = '$abc'";
			$result1 = $conn->query($sql2);
			while ($rows = $result1->fetch_assoc()){ $c_name = $rows['cat_name'];	}
		echo $c_name;  ?></td>
        <td><?php echo $row["prod_name"] ?></td>
        <td><?php echo $row["prod_desc"] ?></td>
        <td><?php echo $row["prod_color"] ?></td>
        <td><?php echo $row["prod_size"] ?></td>
        <td><?php echo $row["prod_uom"] ?></td>
        <td><?php echo $row["prod_stock"] ?></td>
        <td><?php echo $row["prod_uprice"] ?></td>
      </tr>	
    <?php
		}	
	} 
else {
		echo "No Records Found...";
	}
$conn->close();
  ?>
   
      
    </tbody>
  </table>

</form>
<br>
<br>

</div>
</div>
<?php 
include('footer.php');
?>
</body>
</html>