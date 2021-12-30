<?php
	include ('header.php');
	
	if(isset($_GET["imsg"])){
		
		echo "<script>alert('Estimate Generated Successfully...!');</script>";
		echo "<script>setTimeout(\"location.href = 'new_estimate.php';\",100);</script>";
	}
	if(isset($_GET["rmsg"])){
		
		echo "<script>alert('Add Minimum 1 Product.!');</script>";
	echo "<script>setTimeout(\"location.href = 'new_estimate.php';\",100);</script>";
	}
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Vandana Saree</title>
	<style>
.navbar-inverse .navbar-nav>.activeNew>a,
.navbar-inverse .navbar-nav>.activeNew>a:focus,
.navbar-inverse .navbar-nav>.activeNew>a:hover
{
	color:lightgreen;
	background-color:#080808;
}
</style>
</head>
<body>
<div class="container-fluid">
<div class="well well-lg">
<form action="estimate_save.php" method="post">
<h3>New Estimate:-</h3><hr style="background-color:lightgrey; height:1px;">
<div class="row">
<div class="col-sm-4">
<div class="form-group">
  <label for="sel1">Client Name:</label>  
  
  <select class="form-control" id="sel1"  name="cl_id">
  <?php 
		include ('config.php');
		$sql = "SELECT * FROM clients";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
	?>	
		<option value="<?php echo $row["cl_id"] ?>"><?php echo $row["cl_name"] ?></option>
    <?php
		}
	?>
		</select>
		<?php
	} 
else {
		?> <option value="">No Client Found</option> </select><?php
	}
$conn->close();
  ?>
		
</div>
</div>

<div class="col-sm-4">
<div class="form-group">
  <label for="usr">Issue Date:(YYYY-MM-DD)</label>
  <input type="text" class="form-control" id="usr" value="<?php echo date("Y-m-d"); ?>" name="issue_date">
</div>
</div>

</div>

<table class="table table-bordered selector" style="background-color:lightgrey;">
			<tbody>
				<tr>
				<td><label for="">Product Selector</label></td>
				<td><label for="">Product Name</label><select class="form-control productnameS" id="prodNameS"  >
				<?php 
				include ('config.php');
				$sql1 = "SELECT * FROM products";
				$result1 = $conn->query($sql1);
				if ($result1->num_rows > 0) {
				// output data of each row
				while($row = $result1->fetch_assoc()) {
				?>	
				<option alt="<?php echo $row["prod_uprice"]; ?>" id="<?php echo $row["prod_id"]; ?>" value="<?php echo $row["prod_id"]; ?>" name="<?php echo $row["prod_name"]." - ". $row["prod_size"] ?>"><?php echo $row["prod_name"]." - ". $row["prod_size"] ?></option>
				<?php
				}
				?>
				</select>
				<?php
				} 
				else {
				?> <option value="">No Product Found</option> </select><?php
				}
				$conn->close();
				?>				
				</td>				
				<td><label for="">Quantity</label><input type="text" id="" class="form-control quantityS"></td>
				<td><label for="">Unit Price</label><input type="text" class="form-control priceS" ></td>
				<td><label for="">Discount(%)</label><input type="text" class="form-control discountS" ></td>
				<td><label for="">Amount</label><input type="text" class="form-control amountS" style="background-color:#ffffff;" readonly></td>
				<td><label for="">Add</label><input type="button" value="+" id="add" class="form-control btn btn-primary" style="font-weight:bold;"></td>
				</tr>
			</tbody>
	
		</table>
		
		<table class="table table-bordered table-hover newList">
			<thead>
				<th>No.</th>
				<th>ProductName</th>
				<th>Quantity</th>
				<th>Unit Price</th>
				<th>Discount</th>
				<th>Amount</th>
				<th></th>
			</thead>
			<tbody class="detail">
								
			</tbody>
	
			<tfoot>
			
			<th style="text-align:right;" colspan="5">Estimate Amount</th>
				 <th style="text-align:center;"><p class="total">0</p><input type="text" class="hidden EAmount" name="est_amount"></th>
			</tfoot>
		</table>
		
	<div class="row">
 <div class="col-sm-12 text-right"><input type="submit" class="btn btn-primary" value="Save Estimate"></div>
 </div>	

<br>
<br>
</form>
</div>
</div>

<?php 
include('footer.php');
?>
</body>
</html>

<script type="text/javascript">
	$(function(){
			$('#add').click(function(){
				addnewrow();
				total();
			});
			
			$('body').delegate('.remove','click',function(){
				$(this).parent().parent().remove();
				total();
			});
			
			$('.detail').delegate('.quantity,.price,.discount','keyup',function(){
				var tr=$(this).parent().parent();
				var qty = tr.find('.quantity').val();
				var price = tr.find('.price').val();
				var dis = tr.find('.discount').val();
				var amt = (qty *price) - (qty *price*dis)/100;
				tr.find('.amount').val(amt);
				total();
			});
			
			$('.selector').delegate('.quantityS,.priceS,.discountS','keyup',function(){
				var tr=$(this).parent().parent();
				var qty = tr.find('.quantityS').val();
				var price = tr.find('.priceS').val();
				var dis = tr.find('.discountS').val();
				var amt = (qty *price) - (qty *price*dis)/100;
				var Ramt = Math.round(amt);
				tr.find('.amountS').val(Ramt);
				
			});
	});
	
	function total()
	{
		var t =0;
		$('.amount').each(function(i,e)
		{
			var amt = $(this).val()-0;
			t += amt;
		});
		
		$('.total').text(t);
		$('.EAmount').val(t);
	}
	
	function addnewrow()
	{	
		var n =($('.detail tr').length-0)+1;
		var tr = '<tr>'+
				'<td class="no">' + n + '</td>'+				
				'<td><input type="text" class="hidden form-control productname" name="productname[]"><p class="txtPN"></p></td>'+
				'<td><input type="text" class="hidden form-control quantity" name="quantity[]"><p class="txtQTY"></p></td>'+
				'<td><input type="text" class="hidden form-control price" name="price[]"><p class="txtPR"></p></td>'+
				'<td><input type="text" class="hidden form-control discount" name="discount[]"><p class="txtDSC"></p></td>'+
				'<td><input type="text" class="hidden form-control amount" name="amount[]"><p class="txtAM"></p></td>'+
				'<td><a href="#" class="remove"><span class="glyphicon glyphicon-remove" style="color:red;"></span></td>'+
				'</tr>';
		$('.detail').append(tr);
		//$("#"+id).attr("name")
		$optionID = $('.productnameS').val();
		$('.newList tbody tr:last .productname').attr('value',$optionID);
        $('.newList tbody tr:last .quantity').attr('value',$('.quantityS').val());
        $('.newList tbody tr:last .price').attr('value',$('.priceS').val());
        $('.newList tbody tr:last .discount').attr('value',$('.discountS').val());
        $('.newList tbody tr:last .amount').attr('value',$('.amountS').val());
		
		$('.newList tbody tr:last .txtPN').html($("#"+$optionID).attr("name"));
        $('.newList tbody tr:last .txtQTY').html($('.quantityS').val());
        $('.newList tbody tr:last .txtPR').html($('.priceS').val());
        $('.newList tbody tr:last .txtDSC').html($('.discountS').val());
        $('.newList tbody tr:last .txtAM').html($('.amountS').val());
	};
	
	$("#prodNameS").on('change', function() {
		var tr=$(this).parent().parent();
		var qty = tr.find('.quantityS').val();
		$(".quantityS").val("1");
		$optionID = $('.productnameS').val();
		$(".priceS").val($("#"+$optionID).attr("alt"));
		$(".discountS").val("0");
		$(".amountS").val($("#"+$optionID).attr("alt"));
	})
</script>