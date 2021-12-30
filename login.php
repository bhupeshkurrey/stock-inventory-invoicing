<?php 
session_start();
include ('config.php');

$username=$_POST['username'];
$password=$_POST['password'];
$msg="Invalid Username or Password.";

//To protect MySQL injection (more detail about MySQL injection)
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysqli_real_escape_string($conn,$username);
$password = mysqli_real_escape_string($conn,$password);


$sql = "SELECT * from user where u_name='$username' AND u_pass='$password'";
$result = $conn->query($sql);

	if($result->num_rows > 0)
	{
		$_SESSION["usr"] = $username;
	    $_SESSION["pwd"] = $password;
		header("Location:home.php");
	}
	
	else
	{
		?>
		<script> alert("Invalid Username or Password");</script>
		<?php
		header ("Location: index.php?msg=$msg");
	}

?>