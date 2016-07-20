<?php 

// array untuk JSON respon
$response = array("error" => FALSE);

//memanggil kelas koneksi ke db
require_once '../library/inc.connection.php';

if (isset($_POST['user'])) {
	 $user = $_POST['user'];
	//mengambil semua data user
	$datasql = "select * from tb_hasil where user LIKE '%".$user."%'";
	$hasil = mysql_query($datasql, $koneksidb) or die ("data tidak ada".mysql_error());
 
	//cek data kosong
	if (mysql_num_rows($hasil) > 0){
		//looping semua data
		$response["nilai"] = array();
	
		while ($row = mysql_fetch_array($hasil)) {
			//temp array
			$nilai = array();
			$nilai["user"] = $row["user"];
			$nilai["mapel"] = $row["mapel"];
			$nilai["nilai"] = $row["nilai"];
		
			//push question
			array_push($response['nilai'], $nilai);
		}
		//berhasil
		$response["error"] = FALSE;
	
		//echo JSON respon
		echo json_encode($response);
	} else {
		//tidak ada nilai
		$response["error"] = TRUE;
		$response["pesan"] = "nilai tidak ada.!";
	
		//echo tidak ada JSON
		echo json_encode($response);
	}
} else {
    // form kosong 
	$response["error"] = TRUE;
    $response["pesan"] = "silahkan kerjakan tes!";
    echo json_encode($response);
}
 
?>