<?php
	include ('config.php');

	$cl_id = $_POST['cl_id'];
	$issue_date = $_POST['issue_date'];
	$inv_amount = $_POST['inv_amount'];
	
	if(count($_POST['productname'])>0)	{
		
	$conn->query("INSERT INTO invoices(cl_id,inv_date,inv_amount) VALUES('$cl_id','$issue_date','$inv_amount')");
	$id = $conn->insert_id;
	for($i=0 ;$i < count($_POST['productname']) ;$i++)
	{
		$conn->query("INSERT INTO invoicedetail
			SET inv_id     = '{$id}',
			    prod_id = '{$_POST['productname'][$i]}',
			    prod_rate     = '{$_POST['price'][$i]}',
			    prod_qty        = '{$_POST['quantity'][$i]}',
			    prod_discount     = '{$_POST['discount'][$i]}',
			    prod_amount       = '{$_POST['amount'][$i]}'
			");
		$conn->query("UPDATE products
			SET prod_stock = prod_stock - '{$_POST['quantity'][$i]}'
			WHERE prod_id = '{$_POST['productname'][$i]}'
			");
	}
	$conn->close();
	
	header('Location:new_invoice.php?imsg=1');
	}
	else{
		header('Location:new_invoice.php?rmsg=1');
		
	}
?>