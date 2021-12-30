<?php 
include('header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Vandana Saree</title>
	<style>
.navbar-inverse .navbar-nav>.activeCategory>a,
.navbar-inverse .navbar-nav>.activeCategory>a:focus,
.navbar-inverse .navbar-nav>.activeCategory>a:hover
{
	color:lightgreen;
	background-color:#080808;
}
</style>
</head>
<body style="padding-bottom:100px;">
<div class="container">
<div class="well well-lg">
<h3>Add a new Client / Customer Here:-</h3><hr style="background-color:lightgrey; height:1px;">
<form action="clients.php" method="post">
<div class="form-group">
  <label for="usr">Client Name:</label>
  <input type="text" class="form-control" id="usr" name="cl_name" required>
</div>

<div class="row">
	<div class="col-sm-5">
	<div class="form-group">
  <label for="usr">Mobile No.:</label>
  <input type="text" class="form-control" id="usr" name="cl_mobile">
</div>
	</div>
	
	<div class="col-sm-7">
	<div class="form-group">
  <label for="usr">Email ID.:</label>
  <input type="text" class="form-control" id="usr" name="cl_email">
</div>
	</div>
</div>

<div class="row">
	<div class="col-sm-6">
		<div class="form-group">
			<label for="address">Address:</label>
			<textarea class="form-control" rows="4" id="address" name="cl_address" required></textarea>
		</div>
	</div>
		<div class="col-sm-6">
			<div class="form-group">
				<label for="details">Other Details:</label>
				<textarea class="form-control" rows="4" id="details" name="cl_detail"></textarea>
			</div>
		</div>
</div>

 <div class="row">
 <div class="col-sm-12 text-right"><input type="submit" class="btn btn-primary" value="Add Client"></div>
 </div>
      
  
  
  
  
  

</form>
<br>
<br>

</div>
</div>
<?php 
include('footer.php');
?>
</body>
</html>

