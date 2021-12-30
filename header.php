<?php
session_start();
if(!isset($_SESSION['usr']))
{
header("Location:index.php");
}
else
{
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Stock Inventory & Invoicing</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">    
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</head>
<body style="padding-top:180px;">
<?php
	
?>
<div class="navbar-fixed-top">
<div class="container-fluid" style="background-color:teal;color:#fff;height:auto;">
  <h1 class="text-center" style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif;">STOCK INVENTORY & INVOICING</h1>  
  <h3 class="text-center">( Billing Made Easy )</h3>
</div>

<nav class="navbar navbar-inverse" style="border-radius:0 0;">
  
  <ul class="nav navbar-nav">
    <li class="activeHome"><a href="home.php"><i class="fa fa-home"></i> Home</a></li>
    <li class="activeCategory dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-plus-circle"></i> Add <span class="caret"></span></a>
		<ul class="dropdown-menu">
			<li><a href="category.php"><i class="fa fa-plus"></i>&nbsp; Add Category</a></li>
			<li><a href="product.php"><i class="fa fa-plus"></i>&nbsp; Add Product</a></li>
			<li><a href="create_client.php"><i class="fa fa-plus"></i>&nbsp; Add Client</a></li>
			<li><a href="purchase_entry.php"><i class="fa fa-plus"></i>&nbsp; Purchase Entry</a></li>
			<!--<li><a href="#"><i class="fa fa-plus"></i>&nbsp; Add Tax</a></li>
			<li><a href="#"><i class="fa fa-plus"></i>&nbsp; Add Discount</a></li>-->
		</ul>
	</li>
	
	<li class="activeNew dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-pencil-square-o"></i> New <span class="caret"></span></a>
		<ul class="dropdown-menu">
			<li><a href="new_invoice.php">New Invoice</a></li>
			<li><a href="new_estimate.php">New Estimate</a></li>
		</ul>
	</li>
    <li class="activeReport dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-th-list"></i> Reports <span class="caret"></span></a>
		<ul class="dropdown-menu">
			<li><a href="invoice_report.php"> Invoices</a></li>
			<li><a href="estimate_report.php"> Estimates</a></li>
			<li><a href="client_report.php"> Clients</a></li>
			<li><a href="product_report.php"> Products</a></li>
			<li><a href="purchase_report.php"> Purchasing</a></li>
		</ul>
	</li>
  </ul>
  <ul class="nav navbar-nav navbar-right">
  <li class="activeUser"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-user-plus"></i> Welcome <?php echo $_SESSION ['usr']; ?> <span class="caret"></span></a>
		<ul class="dropdown-menu">
			<li><a href="index.php"><i class="fa fa-user-times"></i> Log Out</a></li>
			<li><a href="change_password.php"><i class="fa fa-eye"></i> Change Password</a></li>
		</ul>
	</li>
     
      <li><a href="#"></a></li>
     
    </ul>
</nav>
</div>


</body>
</html>

<?php
}
?>