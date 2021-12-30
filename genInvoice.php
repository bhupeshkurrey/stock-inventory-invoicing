<?php
if(isset($_GET["inid"])){
$inid=$_GET["inid"];
include ('config.php');
$sql1 = "SELECT invoices.inv_id, clients.cl_name, clients.cl_address, invoices.inv_date, invoices.inv_amount FROM invoices INNER JOIN clients ON invoices.cl_id=clients.cl_id WHERE invoices.inv_id=$inid";
$result = $conn->query($sql1);
$row = $result->fetch_assoc();
	
require('fpdf/fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();

$pdf->SetFont('Times','U',14);
$pdf->Cell(0,8,'INVOICE',0,1,'C');


$pdf->SetFont('Times','B',18);
$pdf->Cell(0,10,'STOCK INVENTORY & INVOICING',0,2,'C');


$pdf->SetFont('arial',"","13");
$pdf->Cell(0,10,'( Billing Made Easy )',0,1,'C');
$pdf->SetFont('Times',"","12");
$pdf->Cell(0,10,'BigB Web Production, Raipur (C.G.), Mo.No. 99633-46100',0,1,'C');
$pdf->Cell(0,0.5,"",1,1);

$pdf->SetFont('times','B',14);
$pdf->Cell(30,10,'Invoice No. #',0,0);

$pdf->SetFont('times','',14);
$pdf->Cell(0,10,$inid,0,0);
$pdf->SetFont('times','',14);
$pdf->Cell(0,10,'Dated:'.$row["inv_date"],0,1,'R');

$pdf->SetFont('times','B',14);
$pdf->Cell(40,10,'Customer Name:',0,0);
$pdf->SetFont('times','',14);
$pdf->Cell(0,10,$row["cl_name"].'/ '.$row["cl_address"],0,1);
$pdf->Cell(0,0,"",1,1);

$pdf->SetFont('times','I',12);
$pdf->Cell(0,10,'Description of Particulars',0,1,'C');

// Below this table will generated
$pdf->SetFillColor(200,200,200);
$pdf->SetFont('Times','',14);
     $pdf->Cell(15,7,'S.No.',1,0,'C',true);
     $pdf->Cell(90,7,'Particulars',1,0,'C',true);
     $pdf->Cell(25,7,'Qty',1,0,'C',true);
     $pdf->Cell(30,7,'Rate',1,0,'C',true);
     $pdf->Cell(30,7,'Amount',1,0,'C',true);
     $pdf->Ln();
	 
$sql2="SELECT invoicedetail.prod_rate, invoicedetail.prod_qty, invoicedetail.prod_discount, invoicedetail.prod_amount, products.prod_name, products.prod_size FROM invoicedetail INNER JOIN products ON invoicedetail.prod_id=products.prod_id WHERE invoicedetail.inv_id=$inid";
$result1 = $conn->query($sql2);
$i=1;
$sub_total=0;
while($row1 = $result1->fetch_assoc()){
	
	
$pdf->SetFont('Times','',12);
     $pdf->Cell(15,7,$i,'LR',0,'C');
     $pdf->Cell(90,7,$row1["prod_name"]."-". $row1["prod_size"],'LR',0,'L');
     $pdf->Cell(25,7,$row1["prod_qty"],'LR',0,'C');
     $pdf->Cell(30,7,$row1["prod_rate"],'LR',0,'R');
		$prd_amount=$row1["prod_qty"]*$row1["prod_rate"];
		$sub_total+=$prd_amount;
     $pdf->Cell(30,7,$prd_amount,'LR',0,'R');
     $pdf->Ln();
$i++;
}
$pdf->Cell(190,0,'','T');
$pdf->Ln();
$pdf->SetFont('Times','',12);
     $pdf->Cell(15,7,'','L',0,'C');
     $pdf->Cell(90,7,'',0,0,'L');
     $pdf->Cell(25,7,'',0,0,'C');
     $pdf->Cell(30,7,'SUB-TOTAL',0,0,'R');
     $pdf->Cell(30,7,$sub_total,'LR',0,'R');
     $pdf->Ln();
	 
	 $discount=$sub_total-$row["inv_amount"];
	 
	 $pdf->SetFont('Times','',12);
     $pdf->Cell(15,7,'','L',0,'C');
     $pdf->Cell(90,7,'',0,0,'L');
     $pdf->Cell(25,7,'',0,0,'C');
     $pdf->Cell(30,7,'DISCOUNT',0,0,'R');
     $pdf->Cell(30,7,'-'.$discount,'LR',0,'R');
     $pdf->Ln();
$pdf->Cell(190,0,'','T'); $pdf->Ln();
	 $pdf->SetFont('Times','',12);
     $pdf->Cell(15,7,'','L',0,'C');
     $pdf->Cell(90,7,'',0,0,'L');
     $pdf->Cell(25,7,'',0,0,'C');
     $pdf->Cell(30,7,'TOTAL INVOICE(Rs.)',0,0,'R');
     $pdf->Cell(30,7,$row["inv_amount"],'LR',0,'R');
     $pdf->Ln();
$pdf->Cell(190,0,'','T');
$pdf->Ln(3);

$pdf->SetFont('Times','',12);
$pdf->Cell(0,10,'Thank You for Shoping with us.',0,1);

$pdf->SetFont('Times','B',12);
$pdf->Cell(0,10,'Note:',0,1);

$pdf->SetFont('Times','I',12);
$pdf->Cell(0,6,'(1) This is a computer generated invoice.',0,1);
$pdf->Cell(0,6,'(2) Terms and Conditions apply.',0,0);
$pdf->SetFont('Times','B',12);
$pdf->Cell(0,6,'For, AUTHORIZED SIGNATORY',0,1,'R');

$conn->close();
$pdf->Output();
}
else{
	header('Location:index.php');
}
?>