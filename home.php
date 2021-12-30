<?php 
include('header.php');
include ('config.php');

$dt = "'".date("Y-m-d")."'";
$sql1="Select * from invoices where inv_date=$dt";
$result1 = $conn->query($sql1);
$today =0;
while($row1 = $result1->fetch_assoc()) {
	$today =$today + $row1["inv_amount"];	
}

$lstdtonly = date("d")-1;
if(strlen($lstdtonly)==1){
	$lstdtonly = "0".$lstdtonly;
}
$lstdt = "'".date("Y-m")."-".$lstdtonly."'";
$sql2="Select * from invoices where inv_date=$lstdt";
$result2 = $conn->query($sql2);
$lastdate =0;
while($row2 = $result2->fetch_assoc()) {
	$lastdate =$lastdate + $row2["inv_amount"];	
}


$thsmonth = "'".date("Y-m")."-01'";
$sql3="Select * from invoices where inv_date between $thsmonth AND $dt";
$result3 = $conn->query($sql3);
$thismonth =0;
while($row3 = $result3->fetch_assoc()) {
	$thismonth =$thismonth + $row3["inv_amount"];	
}

$thsyear = "'".date("Y")."-01-01'";
$sql4="Select * from invoices where inv_date between $thsyear AND $dt";
$result4 = $conn->query($sql4);
$thisyear =0;
while($row4 = $result4->fetch_assoc()) {
	$thisyear =$thisyear + $row4["inv_amount"];	
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<style>
.navbar-inverse .navbar-nav>.activeHome>a,
.navbar-inverse .navbar-nav>.activeHome>a:focus,
.navbar-inverse .navbar-nav>.activeHome>a:hover
{
	color:lightgreen;
	background-color:#080808;
}
* {box-sizing:border-box;}
ul {list-style-type: none;}
body {font-family: Verdana,sans-serif;}

.month {
    padding: 70px 25px;
    width: 100%;
    background: teal;
}

.month ul {
    margin: 0;
    padding: 0;
}

.month ul li {
    color: white;
    font-size: 20px;
    text-transform: uppercase;
    letter-spacing: 3px;
}

.month .prev {
    float: left;
    padding-top: 10px;
}

.month .next {
    float: right;
    padding-top: 10px;
}

.weekdays {
    margin: 0;
    padding: 10px 0;
    background-color: #ddd;
}

.weekdays li {
    display: inline-block;
    width: 13.6%;
    color: #666;
    text-align: center;
}

.days {
    padding: 10px 0;
    background: #eee;
    margin: 0;
}

.days li {
    list-style-type: none;
    display: inline-block;
    width: 13.6%;
    text-align: center;
    margin-bottom: 5px;
    font-size:12px;
    color: #777;
}

.days .active {
    padding: 5px;
    background: #1abc9c;
    color: white !important
}

/* Add media queries for smaller screens */
@media screen and (max-width:720px) {
    .weekdays li, .days li {width: 13.1%;}
}

@media screen and (max-width: 420px) {
    .weekdays li, .days li {width: 12.5%;}
    .days li .active {padding: 2px;}
}

@media screen and (max-width: 290px) {
    .weekdays li, .days li {width: 12.2%;}
}
</style>
<script>
function checkDate(){
		var now = new Date();
		var dt = now.getDate();
		var mnt = now.getMonth()+1;
		var yr = now.getFullYear();
		var hour = now.getHours();
		var minute = now.getMinutes();
		var second = now.getSeconds();
		document.getElementById("disp").innerHTML = hour+":"+minute+":"+second;		
}

setInterval(checkDate,1000);
</script>
</head>
<body style="padding-bottom:100px;" >

<div class="container">

<div class="row">
	<div class="col-sm-2" ><div style="background-color:#683c72; color:white; height:420px; padding-top:10px;">
		<H1 class="text-center" style="margin:4px;">D</H2>
		<H1 class="text-center" style="margin:4px;">A</H2>
		<H1 class="text-center" style="margin:4px;">S</H2>
		<H1 class="text-center" style="margin:4px;">H</H2>
		<H1 class="text-center" style="margin:4px;">B</H2>
		<H1 class="text-center" style="margin:4px;">O</H2>
		<H1 class="text-center" style="margin:4px;">A</H2>
		<H1 class="text-center" style="margin:4px;">R</H2>
		<H1 class="text-center" style="margin:4px;">D</H2>
	</div></div>
	<div class="col-sm-10">
		<div class="row">
				<div class="col-sm-6" style="background-color:#09568d; color:white; height:210px;"><H2 class="text-center">TODAYS SALE</H1><hr><H1 class="text-center">₹ <?php echo $today; ?></H1></div>
				<div class="col-sm-6" style="background-color:#0f482e; color:white; height:210px;" ><H2 class="text-center">LAST DAY SALE</H1><hr><H1 class="text-center">₹ <?php echo $lastdate; ?></H1></div>
		</div>
		<div class="row">
				<div class="col-sm-6" style="background-color:#ce3500; color:white; height:210px;"><H2 class="text-center">THIS MONTH</H1><hr><H1 class="text-center">₹ <?php echo $thismonth; ?></H1></div>
				<div class="col-sm-6" style="background-color:#901e1d; color:white; height:210px;"><H2 class="text-center">THIS YEAR</H1><hr><H1 class="text-center">₹ <?php echo $thisyear; ?></H1></div>
		</div>
	</div>
</div>
	</div>
</div>

</div>
<?php 
include('footer.php');
?>
</body>
</html>

