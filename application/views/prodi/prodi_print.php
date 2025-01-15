// views/prodi/prodi_print.php

<?php
$pdf = new FPDF("P", "cm");
$pdf->AddPage();
$pdf->SetTitle("Laporan Data Program Studi");
$pdf->SetFont("Arial", "B", 16);
$pdf->Cell(19, 1, "KEMAHASISWAAN UNISKA BANJARMASIN", 0, 1, "C");
$pdf->Image(base_url('assets/images/logo-uniska.png'), 1.5, 1, -300);
$pdf->SetFont("Arial", "", 11);
$pdf->Cell(19, 1, "Alamat: Jalan Adhyaksa No.3 Kel. Sungai Miai Kec. Banjarmasin Utara", 0, 1, "C");
$pdf->Line(4.5, 3, 20, 3);
$pdf->Ln();
$pdf->SetFont("Arial", "B", 12);
$pdf->Cell(19, 1, "Laporan Data Program Studi", 0, 1, "C");
$pdf->Ln();
$pdf->SetFont("Arial", "B", 11);
$pdf->SetFillColor(0, 255, 0);
$pdf->Cell(2, 1, "No", 1, 0, "C", true);
$pdf->Cell(15, 1, "Nama Program Studi", 1, 1, "C", true);
$pdf->SetFont("Arial", "", 11);

$no = 1;
foreach ($prodi as $p) {
    $pdf->Cell(2, 1, $no++, 1, 0, "C");
    $pdf->Cell(15, 1, $p->nama_prodi, 1, 1, "C");
}

$pdf->Output("I", "Laporan Data Program Studi.pdf");
