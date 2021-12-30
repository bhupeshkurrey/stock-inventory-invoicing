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
<body>
<div class="container">
<div class="well well-lg">
<h3>Create a new Category Here:-</h3><hr style="background-color:lightgrey; height:1px;">
<form action="create_category.php" method="post">
<div class="form-group">
  <label for="usr">Category Name:</label>
  <div clas="row"><div class="col-sm-6"><input type="text" class="form-control" id="usr" name="cat_name" required /></div>
  <div class="col-sm-6"><input type="submit" class="btn btn-primary" value="Create"></div></div>
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

