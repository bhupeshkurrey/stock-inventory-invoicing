<?php
include('config.php');

$u_name=$_POST['u_name'];
$u_pass=$_POST['u_pass'];

$sql = "UPDATE user SET u_name='$u_name', u_pass='$u_pass' WHERE u_id=1";

if ($conn->query($sql) === TRUE) {
    $conn->close();
	?>
	<script>
	alert("Password updated Successfully...");
	</script>
	<?php
	include ('index.php');
	/* echo "Category created successfully";
	echo "<script>setTimeout(\"location.href = 'category.php';\",500);</script>"; */

} 
else {
    ?>
	<script>
	alert("Password not updated. Please try again...");
	</script>
	<?php
	include ('change_password.php');
}


?>