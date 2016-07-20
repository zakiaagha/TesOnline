<?php
session_start();
include("library/inc.connection.php");
include_once "library/inc.library.php";

function anti_injection($data){
  $filter = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter;
}
		# Baca variabel form
		$txtUser 	= anti_injection($_POST['txtUser']);
		$txtUser 	= str_replace("'","&acute;",$txtUser);
		$txtPassword= anti_injection($_POST['txtPassword']);
		$txtPassword= str_replace("'","&acute;",$txtPassword);
		
		if (!ctype_alnum($txtUser) OR !ctype_alnum($txtPassword)){
		?>
		<script>
			alert('Sekarang loginnya tidak bisa di injeksi lho.');
			window.location.href='index.php';
		</script>
		<?php
		}else{
		
		# LOGIN CEK KE TABEL USER LOGIN
		$loginSql = "SELECT * FROM tb_user WHERE username='".$txtUser."' AND password='".md5($txtPassword)."' AND status='Guru'";
		$loginQry = mysql_query($loginSql, $koneksidb)  or die ("Query Periksa Password Admin Salah : ".mysql_error());
		
		# JIKA LOGIN SUKSES
		if($loginQry){
			if (mysql_num_rows($loginQry) >=1) {
				$loginData = mysql_fetch_array($loginQry);
				// Jika yang login Administrator
				if($loginData['status']=="Guru") {
					$_SESSION['SES_ADMIN'] = "Admin";
					$_SESSION['SES_LOGIN'] = $loginData['user_id']; 
					$_SESSION['SES_LOGIN2'] = $loginData['username'];
					echo"<script>document.location='\guru\?page'</script>";
				}
				
			}
			else {
				echo"<script>document.location='index.php?q=0'
				alert('Anda tidak terdaftar sebagai guru.');</script>";
			}
		}
	}
		
?>
 
