<?php
include("../library/inc.connection.php");
include_once "../library/inc.library.php";
include_once "../library/inc.sesadmin.php";

if($_GET) {
	if(empty($_GET['id_pertanyaan'])){
		echo "<b>Data yang dihapus tidak ada</b>";
	}
	else {
		$sqlDelete = "DELETE FROM tb_pertanyaan WHERE id_pertanyaan='".$_GET['id_pertanyaan']."'";
		$qryDelete = mysql_query($sqlDelete, $koneksidb) or die ("Eror hapus data".mysql_error());
		if($qryDelete){
			echo "<meta http-equiv='refresh' content='0; url=?page=Data-Pertanyaan'>";
		}
	}
}
?>