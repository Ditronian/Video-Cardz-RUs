<?php

session_start();
require('fpdf.php');
include('AppData/Models/Order.php');
include('AppData/Models/Item.php');

$orders = unserialize($_SESSION['Orders']);
$id = intval($_GET['orderID']);
$invoiceOrder = null;
$grandTotal = 0.0;

foreach($orders as $order)
{
    if($order->orderID == $id)
    {
        $invoiceOrder = $order;
        break;
    }
}

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(0,0,'Invoice for order no.'.$order->orderID,0,1,'C');
$pdf->SetFont('Arial','',12);
$pdf->Cell(0,15,'Order Status: Shipped',0,1,'L');
$pdf->Cell(0,-15,'Order Date: '.$invoiceOrder->orderDate,0,1,'R');
$pdf->Cell(0,20,'--------------------------------------------------------------------------------------------------------------------------------------------------',0,1,'C');
foreach ($invoiceOrder->orderItems as $item)
{
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(20,5,'Item Name: '.$item->name,0,1,'L');
    $pdf->Cell(20,5,'Manufacturer: '.$item->manufacturer,0,1,'L');
    $pdf->Cell(20,5,'Price: $'.$item->price,0,1,'L');
    $pdf->Cell(20,5,'',0,1,'L');
    $grandTotal += $item->price;
}
$pdf->Cell(0,20,'--------------------------------------------------------------------------------------------------------------------------------------------------',0,1,'C');
$pdf->Cell(0,0,'Grand Total: $'.$grandTotal,0,1,'L');
$pdf->Output();
?>