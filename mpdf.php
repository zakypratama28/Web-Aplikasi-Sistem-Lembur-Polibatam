<?php
include 'koneksi.php';
include 'cek_status_login.php';
include 'keuanganfilter.php';
require_once __DIR__ . '/vendor/autoload.php';

$unit = $_POST['unit'];
$getBulan = $_POST['bulan'];
$bulan = date('m', strtotime($getBulan));
$tahun = date('Y', strtotime($getBulan));
$nama = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');

$namaBulan = $nama[(int)$bulan];
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