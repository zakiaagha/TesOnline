<?php
include("../library/inc.connection.php");
include_once "../library/inc.library.php";
include_once "../library/inc.sesadmin.php";
						
$kategori = $_POST['txtNama_Mapel'];
$total= $_POST['txtTotal'];



$qcek = mysql_query("SELECT * FROM tb_mapel WHERE nama_kategori='$kategori'");
if ($cek = mysql_fetch_array($qcek)){
	echo "<script>alert('data kategori sudah ada')
	location.replace('?page=Data-Mapel')</script>";
	
}else{
	$qupdate = mysql_query("INSERT INTO tb_mapel (nama_mapel, total_pertanyaan) VALUES ( '$kategori', '$total')");
	echo "<script>location.replace('?page=Data-Mapel')</script>";
}
?>