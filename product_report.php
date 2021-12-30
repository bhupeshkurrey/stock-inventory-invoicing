<?php
	include ('header.php');
	
	if(isset($_POST['deleteProduct'])){
		include('config.php');
		$prod_id=$_POST['prod_id'];
		$sql = "DELETE from products WHERE prod_id='$prod_id'";
		if ($conn->query($sql) === TRUE) {
			$conn->close();
		}
		else {
			?>
		<script>
		alert("Product Deletion Failed. Please try again...");
		</script>
		<?php	
		}
	}
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
		<th colspan="2">Action</th>
		
      </tr>
    </thead>
	
	<?php 
	include ('config.php');

$sql1 = "SELECT * FROM products";
$result = $conn->query($sql1);

if ($result->num_rows > 0) {
    // output data of each row
	$sno=1;
    while($row = $result->fetch_assoc()) {
		
		
	?>	
	<tr class="bigBFun">
        <td><?php echo $sno++; ?></td>
        <td><?php
		
		$id= $row["prod_id"];
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
		
		<td><a href="edit.php?pid=<?php echo $row["prod_id"]; ?>" class="btn btn-primary">Edit</a> </td>
		<td><a href="#" class="btn btn-danger" id="<?php echo $row["prod_id"]; ?>" name="<?php echo $row["prod_name"] ?>">Delete</a></td>
		
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


<!-- Modal -->
<div  id="modal-gallery" role="dialog" class="modal">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
	<form action="product_report.php" method="post">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title" ></h3>
        <input type="text" id="delId" name="prod_id" class="hidden">
        
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
	  
        <input type="submit" class="btn btn-danger" value="Yes" name="deleteProduct">
        <button type="button" class="btn btn-success" data-dismiss="modal">No</button>
      </div>
	  </form>
    </div>

  </div>
</div>
<?php 
include('footer.php');
?>
</body>
</html>

<script type="text/javascript">
	$(document).ready(function(){
			
		/* when clicking a thumbnail */
		
		$(".bigBFun .btn-danger").click(function(){
			var title = $(".modal-title");
			title.empty();
			var id = this.id;			
			title.html("<p style="+"color:red;"+">Attention</p>");	
			$("#delId").val(id);
			$(".modal-body").empty();
			$(".modal-body").html("Are you confirmed to delete the product <b>"+$("#"+id).attr("name")+".</b>");
			//show the modal
			$("#modal-gallery").modal("show");
			
			});
	});
</script>