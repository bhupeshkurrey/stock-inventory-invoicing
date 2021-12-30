<?php
include('config.php');
$pid=$_GET['pid'];


$sql = "DELETE from products WHERE prod_id='$pid'";

if ($conn->query($sql) === TRUE) {
    $conn->close();
	?>
	<script>
	alert("Product Deleted Successfully...");
	</script>
	<?php
	include ('product_report.php');
	/* echo "Category created successfully";
	echo "<script>setTimeout(\"location.href = 'category.php';\",500);</script>"; */

} 
else {
    ?>
	<script>
	alert("Product Deletion Failed. Please try again...");
	</script>
	<?php
	include ('product_report.php');
}


?>