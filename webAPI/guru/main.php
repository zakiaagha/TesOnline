<?php
if(isset($_SESSION['SES_KEPALA'])) {
	echo "<h2 align='center'>Selamat Datang</h2></p></h2>";
	echo "<h4 align='center'> Anda Login Sebagai Kepala Sekolah</h4>";
	include "../login_info.php";
	exit;
}
else if(isset($_SESSION['SES_ADMIN'])) {
	echo "<h2 align='center'>Selamat Datang</h2></p></h2>";
	echo "<h4 align='center'> Anda Login Sebagai Wakil Kurikulum</h4>";
	include "../login_info.php";
	exit;
}
else if(isset($_SESSION['SES_GURU'])) {
	echo "<h2 align='center'>Selamat Datang</h2></p></h2>";
	echo "<h4 align='center'> Anda Login Sebagai Guru</h4>";
	include "../login_info.php";
	exit;
}
else if(isset($_SESSION['SES_SISWA'])) {
	echo "<h2 align='center'>Selamat Datang</h2></p></h2>";
	echo "<h4 align='center'> Anda Login Sebagai Siswa</h4>";
	include "../login_info.php";
	exit;
}

else {
	echo "<h2 align='center'>Selamat Datang</h2></p></h2>";
	echo "<h4 align='center'>Anda belum login, silahkan <a href='../?page=Login' alt='Login'>login </a>untuk mengakses sitem ini</h4> ";	
}
?>