<?php
	include ('header.php');
	
	if(isset($_POST['deleteClient'])){
		include('config.php');
		$cl_id=$_POST['cl_id'];
		$sql = "DELETE from clients WHERE cl_id='$cl_id'";
		if ($conn->query($sql) === TRUE) {
			$conn->close();
		}
		else {
			?>
		<script>
		alert("client Deletion Failed. Please try again...");
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
<h3>Clients Report (Customers):-</h3><hr style="background-color:lightgrey; height:1px;">
<form action="" method="">
<table class="table table-bordered">
    <thead>
      <tr style="background-color:teal; color:white;">
        <th>S.No.</th>
        <th>Name</th>
        <th>Mobile No.</th>
        <th>Email ID</th>
        <th>Address</th>
        <th>Other Details</th>        
		<th>Edit</th>
		<th>Delete</th>
		
      </tr>
    </thead>
	
	<?php 
	include ('config.php');

$sql1 = "SELECT * FROM clients";
$result = $conn->query($sql1);

if ($result->num_rows > 0) {
    // output data of each row
	$sno=1;
    while($row = $result->fetch_assoc()) {		
	?>	
	<tr class="bigBFun">
        <td><?php echo $sno++; ?></td>
        <td><?php echo $row["cl_name"] ?></td>
        <td><?php echo $row["cl_mobile"] ?></td>
        <td><?php echo $row["cl_email"] ?></td>
        <td><?php echo $row["cl_address"] ?></td>
        <td><?php echo $row["cl_detail"] ?></td>        
		
		<td><a href="update_client.php?upcid=<?php echo $row["cl_id"];?>" class="btn btn-primary">Edit</a></td>
		<td><a href="#" class="btn btn-danger" id="<?php echo $row["cl_id"];?>" name="<?php echo $row["cl_name"] ?>">Delete</a></td>
		
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
	<form action="client_report.php" method="post">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title" ></h3>
        <input type="text" id="delId" name="cl_id" class="hidden">
        
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
	  
        <input type="submit" class="btn btn-danger" value="Yes" name="deleteClient">
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
			$(".modal-body").html("Are you confirmed to delete <b>"+$("#"+id).attr("name")+".</b>");
			//show the modal
			$("#modal-gallery").modal("show");
			
			});
	});
</script>
