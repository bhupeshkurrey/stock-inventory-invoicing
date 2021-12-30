<?php
include('config.php');

$cat_id=$_POST['cat_id'];
$prod_name=$_POST['prod_name'];
$prod_desc=$_POST['prod_desc'];
$prod_color=$_POST['prod_color'];
$prod_size=$_POST['prod_size'];
$prod_stock=$_POST['prod_stock'];
$prod_uprice=$_POST['prod_uprice'];
$prod_uom=$_POST['prod_uom'];

$sql = "INSERT INTO products (cat_id, prod_name, prod_desc, prod_color, prod_size, prod_stock, prod_uprice, prod_uom) VALUES ('$cat_id', '$prod_name', '$prod_desc', '$prod_color', '$prod_size', '$prod_stock', '$prod_uprice','$prod_uom')";

if ($conn->query($sql) === TRUE) {
    $conn->close();
	?>
	<script>
	alert("Product Created Successfully...");
	</script>
	<?php
	include ('product.php');
	/* echo "Category created successfully";
	echo "<script>setTimeout(\"location.href = 'category.php';\",500);</script>"; */

} 
else {
    ?>
	<script>
	alert("Product Creation Failed. Please try again...");
	</script>
	<?php
	include ('product.php');
}


?>