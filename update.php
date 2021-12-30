<?php
include('config.php');
$pid=$_GET['pid'];
$cat_id=$_POST['cat_id'];
$prod_name=$_POST['prod_name'];
$prod_desc=$_POST['prod_desc'];
$prod_color=$_POST['prod_color'];
$prod_size=$_POST['prod_size'];
$prod_stock=$_POST['prod_stock'];
$prod_uprice=$_POST['prod_uprice'];
$prod_uom=$_POST['prod_uom'];

$sql = "UPDATE products SET cat_id='$cat_id',
							prod_name='$prod_name',
							prod_desc='$prod_desc',
							prod_color='$prod_color',
							prod_size='$prod_size',
							prod_stock='$prod_stock',
							prod_uprice='$prod_uprice',
							prod_uom='$prod_uom'
							WHERE prod_id='$pid'";

if ($conn->query($sql) === TRUE) {
    $conn->close();
	?>
	<!--<script>
	alert("Product Updated Successfully...");
	</script>-->
	<?php
	//include ('product_report.php');
	header('Location:product_report.php');
	/* echo "Category created successfully";
	echo "<script>setTimeout(\"location.href = 'category.php';\",500);</script>"; */

} 
else {
    ?>
	<script>
	alert("Product Updation Failed. Please try again...");
	</script>
	<?php
	include ('product_report.php');
}


?>