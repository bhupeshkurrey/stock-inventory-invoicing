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
<h3>Create a new Product Here:-</h3><hr style="background-color:lightgrey; height:1px;">
<form action="create_product.php" method="post">
<div class="form-group row">
<div class="col-sm-4">
<label for="sel1">Select Category:</label>
<select class="form-control" id="sel1"  name="cat_id">
  <?php 
	include ('config.php');
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
 <input type="text" class="form-control" id="prnm" name="prod_name" required />
   </div> 
   <div class="col-sm-3">
   <label for="sel2">Product Color:</label>
  <select class="form-control" id="sel2" name="prod_color">
    <option selected>N/A</option>
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
 <textarea class="form-control"  id="prdesc" name="prod_desc" ></textarea>
 </div></div><br>
 <div class="row">
   <div class="col-sm-2">
   <label for="prsize">Product Size:</label>
  <input type="text" class="form-control" id="prsize" name="prod_size" />
 </div>
 <div class="col-sm-4">
<label for="uom">Unit of Measurement:</label>
  <input type="text" class="form-control" id="uom" name="prod_uom" /></div>
  
  <div class="col-sm-3">
<label for="prstk">Opening Stock: </label>
  <input type="text" class="form-control" id="prstk" name="prod_stock" required /></div>
  
  <div class="col-sm-3">
<label for="prstk">Unit Price (INR): </label>
  <input type="text" class="form-control" id="prstk" name="prod_uprice" required/></div>
 </div>
 <br>
 <div class="row">
 <div class="col-sm-12 text-right"><input type="submit" class="btn btn-primary" value="Save Product"></div>
 </div>
      
  
  
  
  
  
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

