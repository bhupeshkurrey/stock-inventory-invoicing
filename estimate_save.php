<?php
	include ('config.php');

	$cl_id = $_POST['cl_id'];
	$issue_date = $_POST['issue_date'];
	$est_amount = $_POST['est_amount'];
	
	if(count($_POST['productname'])>0)	{
		
	$conn->query("INSERT INTO estimates(cl_id,est_date,est_amount) VALUES('$cl_id','$issue_date','$est_amount')");
	$id = $conn->insert_id;
	for($i=0 ;$i < count($_POST['productname']) ;$i++)
	{
		$conn->query("INSERT INTO estimateDetail
			SET est_id     = '{$id}',
			    prod_id = '{$_POST['productname'][$i]}',
			    prod_rate     = '{$_POST['price'][$i]}',
			    prod_qty        = '{$_POST['quantity'][$i]}',
			    prod_discount     = '{$_POST['discount'][$i]}',
			    prod_amount       = '{$_POST['amount'][$i]}'
			");
	}
	$conn->close();
	
	header('Location:new_estimate.php?imsg=1');
	}
	else{
		header('Location:new_estimate.php?rmsg=1');
		 
		
	}
?>