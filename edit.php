<?php 
include('header.php');
include ('config.php');
$pid=$_GET['pid'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Vandana Saree</title>
	
</head>
<body style="padding-bottom:100px;">
<div class="container">
<div class="well well-lg">
<h3>Edit the Product ID No. <?php echo "$pid"; ?></h3><hr style="background-color:lightgrey; height:1px;">
<?php
	$sqls = "SELECT * from products WHERE prod_id='$pid'";
	$results = $conn->query($sqls);
	while($rows=$results->fetch_assoc()){
		$categoryid=$rows['cat_id'];
		$sqlss = "SELECT cat_name from category WHERE cat_id='$categoryid'";
	    $resultss = $conn->query($sqlss);
		$rowss=$resultss->fetch_assoc()
?>
<form action="update.php?pid=<?php echo $pid; ?>" method="post">
<div class="form-group row">
<div class="col-sm-4">
<label for="sel1">Select Category:</label>
<select class="form-control" id="sel1"  name="cat_id">

  <?php 
	
$sql = "SELECT cat_id, cat_name FROM category";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
	?>	
	<option value="<?php echo $row["cat_id"] ?>"><?php echo $row["cat_name"] ?></option>
    <?php
		}
	?>
	<option value="<?php echo "$rows[cat_id]";?>" selected="selected"><?php echo $rowss["cat_name"] ?></option>
		</select>
	<?php
	} 
else {
		?> <option value="">No Category Found</option> </select><?php
	}
$conn->close();
  ?>
  </div>
  <div class="col-sm-5">
 <label for="prnm">Product Name:</label>
 <input type="text" class="form-control" id="prnm" name="prod_name" value="<?php echo "$rows[prod_name]";?>" required />
   </div> 
   <div class="col-sm-3">
   <label for="sel2">Product Color:</label>
  <select class="form-control" id="sel2" name="prod_color">
  <option selected="selected"><?php echo "$rows[prod_color]";?></option>
    <option>N/A</option>
    <option>Red</option>
    <option>Green</option>
    <option>Blue</option>
    <option>Yellow</option>
    <option>Pink</option>
    <option>Orange</option>
    <option>Light Blue</option>
    <option>Black</option>
    <option>White</option>
    <option>Other</option>
  </select>
 </div>
</div>   
   <div class="row">
   <div class="col-sm-12">
   <label for="prdesc">Product Description:</label>
 <textarea class="form-control"  id="prdesc" name="prod_desc" ><?php echo "$rows[prod_desc]";?></textarea>
 </div></div><br>
 <div class="row">
   <div class="col-sm-2">
   <label for="prsize">Product Size:</label>
  <input type="text" class="form-control" id="prsize" name="prod_size" value="<?php echo "$rows[prod_size]";?>" />
 </div>
 <div class="col-sm-4">
<label for="uom">Unit of Measurement:</label>
  <input type="text" class="form-control" id="uom" name="prod_uom" value="<?php echo "$rows[prod_uom]";?>"/></div>
  
  <div class="col-sm-3">
<label for="prstk">Opening Stock: </label>
  <input type="text" class="form-control" id="prstk" name="prod_stock" value="<?php echo "$rows[prod_stock]";?>"/></div>
  
  <div class="col-sm-3">
<label for="prstk">Unit Price (INR): </label>
  <input type="text" class="form-control" id="prstk" name="prod_uprice" value="<?php echo "$rows[prod_uprice]";?>"/></div>
 </div>
 <br>
 <div class="row">
 <div class="col-sm-12 text-right"><input type="submit" class="btn btn-primary" value="Update Product"></div>
 </div>
      
  
  
  
  
  
</div>
</form>
<br>
<br>

</div>
</div>
<?php 
	}
include('footer.php');
?>
</body>
</html>

