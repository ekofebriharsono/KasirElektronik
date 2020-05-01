
<?php
 $conn = mysqli_connect("localhost", "root", "hacked200613", "laptop");

require('fpdf/fpdf.php');
$pdf = new FPDF('P','mm','A4');
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(190,7,'Laporan Semua Transaksi Penjualan ',0,1,'C');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(190,7,'Peroide 1 Januari - 31 Desember 2018',0,1,'C');


$pdf->Cell(10,7,'',0,1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(18,6,'',0,0);
$pdf->Cell(30,6,'Id Transaksi',1,0);
$pdf->Cell(50,6,'Nama',1,0);
$pdf->Cell(27,6,'Total',1,0);
$pdf->Cell(25,6,'Jumlah Uang',1,0);
$pdf->Cell(27,6,'Tanggal',1,1);

$pdf->SetFont('Arial','',10);

$tbldetail = mysqli_query($conn, "SELECT * FROM Tpenjualan ");
while ($row = mysqli_fetch_array($tbldetail)){
$pdf->Cell(18,6,'',0,0);
$pdf->Cell(30,6,$row['id_transaksi'],1,0);
$pdf->Cell(50,6,$row['nama'],1,0);
$pdf->Cell(27,6,$row['total'],1,0);
$pdf->Cell(25,6,$row['jumlahuang'],1,0);
$pdf->Cell(27,6,$row['tanggal'],1,1);
}
$pdf->Cell(18,6,'',0,1);
$pdf->Cell(27,6,"==========================================================================================",0,1);
$pdf->Output();
?>
