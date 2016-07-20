<?php
include("../library/inc.connection.php");
include_once "../library/inc.library.php";
include_once "../library/inc.sesadmin.php";
						
$mapel_id = $_POST['txtOptTes'];
$pertanyaan = $_POST['txtPertanyaan'];
$pilihan1 = $_POST['txtPilihan1'];
$pilihan2 = $_POST['txtPilihan2'];
$pilihan3 = $_POST['txtPilihan3'];
$pilihan4 = $_POST['txtPilihan4'];
$jawaban = $_POST['txtJawaban'];

$qcek = mysql_query("SELECT * FROM tb_pertanyaan WHERE desk_pertanyaan LIKE '%$pertanyaan%'");

if ($cek = mysql_fetch_array($qcek)){
		echo "<script>alert('pertanyaan sudah ada')
				location.replace('?page=Data-Pertanyaan')</script>";
	}else{
		$qupdate = mysql_query("INSERT INTO tb_pertanyaan (mapel_id, desk_pertanyaan, pilihan1, pilihan2, pilihan3, pilihan4, benar) VALUES ( '$mapel_id', '$pertanyaan','$pilihan1', '$pilihan2', '$pilihan3','$pilihan4', '$jawaban')");
		echo "<script>location.replace('?page=Data-Pertanyaan')</script>";
	}
?>