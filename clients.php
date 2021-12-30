<?php
include('config.php');

$cl_name=$_POST['cl_name'];
$cl_mobile=$_POST['cl_mobile'];
$cl_email=$_POST['cl_email'];
$cl_address=$_POST['cl_address'];
$cl_detail=$_POST['cl_detail'];

$sql = "INSERT INTO clients (cl_name, cl_mobile, cl_email, cl_address, cl_detail) VALUES ('$cl_name', '$cl_mobile', '$cl_email', '$cl_address', '$cl_detail')";

if ($conn->query($sql) === TRUE) {
    $conn->close();
	?>
	<script>
	alert("Client Added Successfully...");
	</script>
	<?php
	include ('create_client.php');
	/* echo "Category created successfully";
	echo "<script>setTimeout(\"location.href = 'category.php';\",500);</script>"; */

} 
else {
    ?>
	<script>
	alert("Client Not Added. Please try again...");
	</script>
	<?php
	include ('create_client.php');
}


?>