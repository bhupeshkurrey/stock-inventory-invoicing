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
<h3>Enter your purchasing detail Here:-</h3><hr style="background-color:lightgrey; height:1px;">
<form action="purchase.php" method="post">
<div class="form-group row">
<div class="col-sm-8">
<label for="sel1">Purchase From (Party Name/Supplier):</label>
<input type="text" class="form-control" id="prnm" name="pur_from" required />
  </div>
   
   <div class="col-sm-4">
   <label for="sel2">Purchasing Bill No. (If any):</label>
  <input type="text" class="form-control" id="prnm" name="pur_billno" required />
 </div>
</div>   
   <div class="row">
   <div class="col-sm-12">
   <label for="prdesc">Purchasing Detail:</label>
 <textarea class="form-control"  id="prdesc" name="pur_detail" required></textarea>
 </div></div><br>
 <div class="row">
   <div class="col-sm-4">
   <label for="prsize">Purchasing Date (YYYY-MM-DD):</label>
  <input type="text" class="form-control" id="prsize" name="pur_date" value="<?php echo date("Y-m-d");?>" required/>
 </div>
 <div class="col-sm-5">
<label for="uom">Purchasing Amount (INR):</label>
  <input type="text" class="form-control" id="uom" name="pur_amount" required/></div>
  

  
  <div class="col-sm-3">
<label for="prstk">. </label>
  <input type="submit" class="form-control btn btn-primary" value="SUBMIT"></div>
 </div>
 <br>

      
  
  
  
  
  
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

