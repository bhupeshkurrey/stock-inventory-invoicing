<?php
include('config.php');

$cat_name=$_POST['cat_name'];

$sql = "INSERT INTO category (cat_name) VALUES ('$cat_name')";

if ($conn->query($sql) === TRUE) {
    
	?>
	<script>
	alert("Category Created Successfully...");
	</script>
	<?php
	include ('category.php');
	/* echo "Category created successfully";
	echo "<script>setTimeout(\"location.href = 'category.php';\",500);</script>"; */

} 
else {
    ?>
	<script>
	alert("Category Creation Failed. Please try again...");
	</script>
	<?php
	include ('category.php');
}

$conn->close();
?>