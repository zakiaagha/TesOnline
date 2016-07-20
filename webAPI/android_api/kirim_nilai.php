<?php

include("../library/inc.connection.php");

// json response array
$response = array("error" => FALSE);

if (isset($_POST['username']) && isset($_POST['mapel']) && isset($_POST['nilai'])) {

    $username = $_POST['username'];
    $mapel = $_POST['mapel'];
    $nilai = $_POST['nilai'];
     
	$query_search = "select * from tb_hasil where user = '".$username."' AND mapel LIKE '%".$mapel."%'";
    $query_exec = mysql_query($query_search) or die(mysql_error());
    $rows = mysql_num_rows($query_exec);
     
    if($rows >= 1) { 
		$query_update = "update tb_hasil SET user = '".$username."', mapel = '".$mapel."', tgl_tes = '".date("Y-m-d")."', nilai= '".$nilai."' WHERE user = '".$username."' AND mapel LIKE '%".$mapel."%'";
		$query_exec = mysql_query($query_update) or die(mysql_error());
		$response["error"] = TRUE;
		$response["error_msg"] = "Data sudah ada!";
		echo json_encode($response);
    } else  {
        $query_tambah = "insert into tb_hasil (user, mapel, tgl_tes, nilai) Values ('$username', '$mapel', '".date("Y-m-d")."', '$nilai')";
		$query_exec = mysql_query($query_tambah) or die(mysql_error());
        $response["error"] = TRUE;
        $response["error_msg"] = "Nilai berhasil di modifikasi";
        echo json_encode($response);
    }
} else {
    $response["error"] = TRUE;
    $response["error_msg"] = "user, mapel dan nilai harus diisi!";
    echo json_encode($response);
}
?>

