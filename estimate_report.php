<?php
	include ('header.php');
	
	/*if(isset($_POST['deleteProduct'])){
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
	}*/
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
<h3>Estimate Reports:-</h3><hr style="background-color:lightgrey; height:1px;">
<form action="" method="">
<table class="table table-bordered">
    <thead>
      <tr style="background-color:teal; color:white;">
        <th>Estimate ID</th>
        <th>Client Name</th>
        <th>Date of Invoice</th>
        <th>Estimate Amount</th>        
		<th>Action</th>
		
      </tr>
    </thead>
	
	<?php 
	include ('config.php');

$sql1 = "SELECT estimates.est_id, clients.cl_name, estimates.est_date, estimates.est_amount FROM estimates INNER JOIN clients ON estimates.cl_id=clients.cl_id";
$result = $conn->query($sql1);

if ($result->num_rows > 0) {
    // output data of each row
	$sno=1;
    while($row = $result->fetch_assoc()) {
		
		
	?>	
	<tr class="bigBFun">        
        <td><?php echo $row["est_id"] ?></td>
        <td><?php echo $row["cl_name"] ?></td>
        <td><?php echo $row["est_date"] ?></td>
        <td>Rs. <?php echo $row["est_amount"] ?></td>        
		
		<td><a href="genEstimate.php?esid=<?php echo $row["est_id"] ?>" class="btn btn-primary" target="_blank">View</a> </td>
		<!--<td><a href="#" class="btn btn-danger" id="" name="">Delete</a></td>-->
		
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
	<form action="" method="">
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
			
		/* when clicking a thumbnail 
		
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
			
			});    */
	});
</script>