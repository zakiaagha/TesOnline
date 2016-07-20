<?php 

// array untuk JSON respon
$response = array("error" => FALSE);

//memanggil kelas koneksi ke db
require_once '../library/inc.connection.php';

if (isset($_POST['mapel'])) {
	 $mapel = $_POST['mapel'];
	//mengambil semua data soal
	$jumlahPertanyaan = "SELECT total_pertanyaan FROM tb_mapel WHERE nama_mapel LIKE '%".$mapel."%'";
	$limit = (int)$jumlahPertanyaan;
	$datasql = "select p.id_pertanyaan, p.desk_pertanyaan, p.pilihan1, p.pilihan2, p.pilihan3, p.pilihan4, p.benar from tb_mapel as m INNER JOIN tb_pertanyaan as p ON m.nama_mapel LIKE '%".$mapel."%' AND m.mapel_id = p.mapel_id ORDER BY RAND() LIMIT 15";
	$hasil = mysql_query($datasql, $koneksidb) or die ("data tidak ada".mysql_error());

	//cek data kosong
	if (mysql_num_rows($hasil) > 0){
		//looping semua data
		$response["pertanyaan"] = array();
	
		while ($row = mysql_fetch_array($hasil)) {
			//temp array
			$pertanyaan = array();
			$pertanyaan["tes_id"] = $row["id_pertanyaan"];
			$pertanyaan["desk_pertanyaan"] = $row["desk_pertanyaan"];
			$pertanyaan["pilihanA"] = $row["pilihan1"];
			$pertanyaan["pilihanB"] = $row["pilihan2"];
			$pertanyaan["pilihanC"] = $row["pilihan3"];
			$pertanyaan["pilihanD"] = $row["pilihan4"];
			$pertanyaan["jawaban"] = $row["benar"];
		
			//push question
			array_push($response['pertanyaan'], $pertanyaan);
		}
		//berhasil
		$response["error"] = FALSE;
	
		//echo JSON respon
		echo json_encode($response);
	} else {
		//tidak ada pertanyaan
		$response["error"] = TRUE;
		$response["pesan"] = "Pertanyaan tidak ada. Silahkan buat pertanyaan!";
	
		//echo tidak ada JSON
		echo json_encode($response);
	}
} else {
    // form kosong 
	$response["error"] = TRUE;
    $response["pesan"] = "silahkan pilih mata pelajaran!";
    echo json_encode($response);
}
 
?>