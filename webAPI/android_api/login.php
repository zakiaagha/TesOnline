<?php

include("../library/inc.connection.php");

// json response array
$response = array("error" => FALSE);

if (isset($_POST['username']) && isset($_POST['password'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $query_search = "select * from tb_user where username = '".$username."' AND password = '".md5($password). "' AND status = 'Siswa'";
    $query_exec = mysql_query($query_search) or die(mysql_error());
    $rows = mysql_num_rows($query_exec);
     
    if($rows >= 1) { 
        $loginData = mysql_fetch_array($query_exec);
		// use is found
        $response["error"] = FALSE;
        $response["uid"] = $loginData["user_id"];
        $response["user"]["username"] = $loginData["username"];
        $response["user"]["password"] = $loginData["password"];
        $response["user"]["nama"] = $loginData["nama"];
        $response["user"]["status"] = $loginData["status"];
        $response["user"]["jurusan"] = $loginData["jurusan"];
		echo json_encode($response);
    } else  {
        // user is not found with the credentials
        $response["error"] = TRUE;
        $response["error_msg"] = "Login gagal. Username dan password salah";
        echo json_encode($response);
    }
} else {
    // required post params is missing
    $response["error"] = TRUE;
    $response["error_msg"] = "username atau password harus diisi";
    echo json_encode($response);
}
?>

