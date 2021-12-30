<?php
include('config.php');

$pur_from=$_POST['pur_from'];
$pur_billno=$_POST['pur_billno'];
$pur_detail=$_POST['pur_detail'];
$pur_date=$_POST['pur_date'];
$pur_amount=$_POST['pur_amount'];


$sql = "INSERT INTO purchases (pur_from, pur_billno, pur_detail, pur_date, pur_amount) VALUES ('$pur_from', '$pur_billno', '$pur_detail', '$pur_date', '$pur_amount')";

if ($conn->query($sql) === TRUE) {
    $conn->close();
	?>
	<script>
	alert("Purchasing Submitted Successfully...");
	</script>
	<?php
	include ('purchase_entry.php');
	/* echo "Category created successfully";
	echo "<script>setTimeout(\"location.href = 'category.php';\",500);</script>"; */

} 
else {
    ?>
	<script>
	alert("Purchase Entry Failed. Please try again...");
	</script>
	<?php
	include ('purchase_entry.php');
}


?>