<?php
include 'db.php';
header("content-type:txt/csv");
header("content-disposition:attachment; filename = report.csv");
$output = fopen("php://output", 'w');
fputcsv($output, array("Id","Name","Price","Quantity","Category", "Total"));

$result = $conn -> query("select id, name, price, quantity, category, (quantity * price) as total from product");
while($row=$result->fetch_assoc()){
    fputcsv($output, $row);
}
?>