<?php
// memanggil library FPDF
require('../function/vendor/fpdf/fpdf.php');
include '../function/koneksi.php';
 
// intance object dan memberikan pengaturan halaman PDF
$pdf=new FPDF('L','mm','A4');
$pdf->AddPage();
 
$pdf->SetFont('Times','B',13);
$pdf->Cell(200,10,'Laporan Kegiatan',0,0,'C');
 
$pdf->Cell(10,15,'',0,1);
$pdf->SetFont('Times','B',9);
$pdf->Cell(50,7,'Mulai',1,0,'C');
$pdf->Cell(50,7,'Selesai' ,1,0,'C');
$pdf->Cell(75,7,'Judul',1,0,'C');
$pdf->Cell(55,7,'Keterangan',1,0,'C');
 
 
$pdf->Cell(10,7,'',0,1);
$pdf->SetFont('Times','',10);
$no=1;
$data = mysqli_query($conn,"SELECT  * FROM jadwal");
while($d = mysqli_fetch_array($data)){
  $pdf->Cell(50,6, $d['mulai'],1,0,'C');
  $pdf->Cell(50,6, $d['selesai'],1,0);
  $pdf->Cell(75,6, $d['judul_kegiatan'],1,0);  
  $pdf->Cell(55,6, $d['deskripsi'],1,1);
}
 
$pdf->Output('D', 'laporan_kegiatan.pdf');
 
?>