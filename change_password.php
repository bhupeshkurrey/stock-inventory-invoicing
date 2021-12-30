<?php 
include('header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Vandana Saree</title>
	<style>
.navbar-inverse .navbar-nav>.activeUser>a,
.navbar-inverse .navbar-nav>.activeUser>a:focus,
.navbar-inverse .navbar-nav>.activeUser>a:hover
{
	color:lightgreen;
	background-color:#080808;
}
</style>
</head>
<body style="padding-bottom:100px;">
<div class="container">
<div class="well well-lg">
<h3>Change your Login Password:-</h3><hr style="background-color:lightgrey; height:1px;">
<form action="cpassword.php" method="post">

<div class="row">
	<div class="col-sm-6">
	<div class="form-group">
  <label for="pwd">New Username:</label>
  <input type="text" class="form-control" id="pwd" name="u_name" required>
</div>
	</div>
	
	<div class="col-sm-6">
	<div class="form-group">
  <label for="pwd">New Password:</label>
  <input type="password" class="form-control" id="pwd" name="u_pass" required>
</div>
	</div>
</div>

 <div class="row">
 <div class="col-sm-12 text-right"><input type="submit" class="btn btn-primary" value="Update"></div>
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

