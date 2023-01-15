<?php 
session_start();
date_default_timezone_set("Asia/Jakarta");
$is_local = "yes";
if (strtolower($is_local) == 'yes') {
	error_reporting(0);
	$conn = new mysqli("localhost","root","","puskes_tridaya");
}else{
	$conn = new mysqli("localhost","dtek9578_main","Protech2021!","dtek9578_ahmad");
}

define(	"TITLE",		"Puskes");
define(	"BASE_URL",		"http://dtech.web.id/skripsi/ahmad");

function bulan($bln)
{
	if ($bln==1) {$string = "Januari";}
	elseif ($bln==2) {$string = "Februari";}
	elseif ($bln==3) {$string = "Maret";}
	elseif ($bln==4) {$string = "April";}
	elseif ($bln==5) {$string = "Mei";}
	elseif ($bln==6) {$string = "Juni";}
	elseif ($bln==7) {$string = "Juli";}
	elseif ($bln==8) {$string = "Agustus";}
	elseif ($bln==9) {$string = "September";}
	elseif ($bln==10) {$string = "Oktober";}
	elseif ($bln==11) {$string = "November";}
	elseif ($bln==12) {$string = "Desember";}
	return $string;
}
?>