<?php
	session_start();	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">    
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<style>
.navbar-inverse .navbar-nav>.activeLogin>a,
.navbar-inverse .navbar-nav>.activeLogin>a:focus,
.navbar-inverse .navbar-nav>.activeLogin>a:hover
{
	color:lightgreen;
	background-color:#080808;
}
</style>
</head>
<body style="padding-top:180px;">
<?php
	session_unset();
	session_destroy();
	
?>
<div class="navbar-fixed-top">
<div class="container-fluid" style="background-color:teal;color:#fff;height:auto;">
  <h1 class="text-center" style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif;">STOCK INVENTORY & INVOICING</h1>  
  <h3 class="text-center">( Billing Made Easy )</h3>
</div>

<nav class="navbar navbar-inverse" style="border-radius:0 0;">
  
  <ul class="nav navbar-nav">
    <li class="activeLogin"><a href=""><i class="fa fa-lock"></i><b>&nbsp; Admin  Login </b></a></li>
       
  </ul>
 
</nav>
</div>
<!--Head Portion End-->

<div class="container" align="center">
<div class="well well-lg" style="max-width:500px;" >
<h2 class="text-center"><span class="glyphicon glyphicon-lock"></span> Admin Login</h2>
<hr style="background-color:lightgrey; height:1px;">
<form action="login.php" method="post">
            <div class="form-group">
              <div class="text-left"><label for="usrname"><span class="glyphicon glyphicon-user"></span> Username</label></div>
              <input type="text" class="form-control" id="usrname" placeholder="Enter username" name="username" required>
            </div>
            <div class="form-group">
              <div class="text-left"><label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label></div>
              <input type="password" class="form-control" id="psw" placeholder="Enter password" name="password" required>
            </div>
            
              <div align="right"><?php if(isset($_GET['msg'])){ echo "<font color=red>".$_GET['msg']."</font>";} ?><button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-off"></span> Login</button></div>
          </form>
</div>

</div>

<!--Footer Portion Starts Here-->
<footer class="container-fluid text-center navbar-fixed-bottom" style="background-color:teal; color:white;">
  <a href="#" title="To Top" style="color:lightgreen;">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a>
  <p>Copyright &copy;  2016 Bhupesh Kurrey, This software is Designed & Maintained by <a href="#" title="Software Developer"style="color:lightgreen; font-weight:bold; font-family: arial;">Bhupesh Kurrey</a></p>		
</footer>
</body>
</html>

