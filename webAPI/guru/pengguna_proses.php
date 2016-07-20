<?php
include("../library/inc.connection.php");
include_once "../library/inc.library.php";
include_once "../library/inc.sesadmin.php";
						
$username = $_POST['txtUsername'];
$password = $_POST['txtPasswd'];
$nama = $_POST['txtNama'];
$status = $_POST['txtStatus'];
$jurusan = $_POST['txtJurusan'];



$qcek = mysql_query("SELECT * FROM tb_user WHERE username='$username'");
if ($cek = mysql_fetch_array($qcek)){
	echo "<script>alert('data pengguna sudah ada')
	location.replace('?page=Data-Pengguna')</script>";
	
}else{
	$qupdate = mysql_query("INSERT INTO tb_user (username, password, nama, status, jurusan) VALUES ( '$username','".md5($password)."','$nama', '$status', '$jurusan' )");
	echo "<script>location.replace('?page=Data-Pengguna')</script>";
}
?>