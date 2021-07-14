<?php
include 'koneksi.php';
include 'keuanganfilter.php';
require_once __DIR__ . '/vendor/autoload.php';
ob_start();
include 'data_det_honor.php';
$html = ob_get_contents();
ob_end_clean();
$fileName = 'detail honor '.date('Y-m-d');
$mpdf = new \Mpdf\Mpdf();
$mpdf->SetTitle($fileName);
$mpdf->AddPage('L'); // bentuk landscape
$mpdf->WriteHTML($html);

$mpdf->Output($fileName.'.pdf', 'D');