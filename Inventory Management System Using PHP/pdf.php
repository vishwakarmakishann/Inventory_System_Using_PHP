<?php 

require 'vendor/autoload.php';

include 'db.php';

$result=$conn->query("select *, (quantity*price) as total from product");

$pdf=new TCPDF();

$pdf->setAutoPageBreak(TRUE,PDF_MARGIN_BOTTOM);
$pdf->AddPage();
$pdf->setFont('times','B',16);
$pdf->Cell(0,10,'Inventory Report',0,1,'C');

$html= '
<table border="1" cellpadding="4">
<tr>
<td>Product Id</td>
<td>Product Name</td>
<td>Product Price</td>
<td>Product Quantity</td>
<td>Product Category</td>
<td>Total</td>
.</tr>
';

while ($row=$result->fetch_assoc()) {
    
$html .= '
<tr>
<td>'.$row["id"].'</td>
<td>' .$row["name"].' </td>
<td>'.$row["price"].'</td>
<td>'.$row["quantity"].'</td>
<td>'.$row["category"].'</td>
<td>'.$row["total"].'</td>

</tr>
';
}

$html .= '</table>';

$pdf->writeHtml($html,true,false,true,false,'');
$pdf->Output('report.pdf','D')
?>