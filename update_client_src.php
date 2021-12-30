<?php
include('config.php');
$upcid=$_GET['upcid'];
$cl_name=$_POST['cl_name'];
$cl_mobile=$_POST['cl_mobile'];
$cl_email=$_POST['cl_email'];
$cl_address=$_POST['cl_address'];
$cl_detail=$_POST['cl_detail'];


$sql = "UPDATE clients SET 	cl_name='$cl_name',
							cl_mobile='$cl_mobile',
							cl_email='$cl_email',
							cl_address='$cl_address',
							cl_detail='$cl_detail'							
							WHERE cl_id='$upcid'";

if ($conn->query($sql) === TRUE) {
    $conn->close();
	?>
	<!--<script>
	alert("Client Updated Successfully...");
	</script>-->
	<?php 
	header("Location:client_report.php");
	//include ('client_report.php');
	/* echo "Category created successfully";
	echo "<script>setTimeout(\"location.href = 'category.php';\",500);</script>"; */

} 
else {
    ?>
	<script>
	alert("Client Updation Failed. Please try again...");
	</script>
	<?php
	include ('client_report.php');
}


?>