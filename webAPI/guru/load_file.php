<?php
if($_GET) {
	switch ($_GET['page']){				
		case '' :				
			if(!file_exists ("home.php")) die ("Sorry Empty Page!"); 
			include "home.php";						
		break;		
		case 'Login' :				
			if(!file_exists ("login.php")) die ("Sorry Empty Page!"); 
			include "login.php";						
		break;

		case 'Login-Validasi' :				
			if(!file_exists ("login_validasi.php")) die ("Sorry Empty Page!"); 
			include "login_validasi.php";						
		break;
		case 'Logout' :				
			if(!file_exists ("login_out.php")) die ("Sorry Empty Page!"); 
			include "login_out.php";						
		break;		

		# Data Pengguna
		case 'Data-Pengguna' :				
			if(!file_exists ("pengguna.php")) die ("Sorry Empty Page!"); 
			include "pengguna.php";	 break;		
		case 'Tambah-Pengguna' :				
			if(!file_exists ("pengguna_tambah.php")) die ("Sorry Empty Page!"); 
			include "pengguna_tambah.php";	 break;		
		case 'Hapus-Pengguna' :				
			if(!file_exists ("pengguna_delete.php")) die ("Sorry Empty Page!"); 
			include "pengguna_delete.php"; break;		
		case 'Pengguna-Proses' :				
			if(!file_exists ("pengguna_proses.php")) die ("Sorry Empty Page!"); 
			include "pengguna_proses.php"; break;
		case 'Edit-Pengguna' :				
			if(!file_exists ("pengguna_edit.php")) die ("Sorry Empty Page!"); 
			include "pengguna_edit.php"; break;	
			
		# Data Mapel
		case 'Data-Mapel' :				
			if(!file_exists ("mapel.php")) die ("Sorry Empty Page!"); 
			include "mapel.php";	 break;		
		case 'Tambah-Mapel' :				
			if(!file_exists ("mapel_tambah.php")) die ("Sorry Empty Page!"); 
			include "mapel_tambah.php";	 break;		
		case 'Hapus-Mapel' :				
			if(!file_exists ("mapel_delete.php")) die ("Sorry Empty Page!"); 
			include "mapel_delete.php"; break;		
		case 'Mapel-Proses' :				
			if(!file_exists ("mapel_proses.php")) die ("Sorry Empty Page!"); 
			include "mapel_proses.php"; break;
		case 'Edit-Mapel' :				
			if(!file_exists ("mapel_edit.php")) die ("Sorry Empty Page!"); 
			include "mapel_edit.php"; break;	
		
		# Data Pertanyaan
		case 'Data-Pertanyaan' :				
			if(!file_exists ("pertanyaan.php")) die ("Sorry Empty Page!"); 
			include "pertanyaan.php";	 break;		
		case 'Tambah-Pertanyaan' :				
			if(!file_exists ("pertanyaan_tambah.php")) die ("Sorry Empty Page!"); 
			include "pertanyaan_tambah.php";	 break;		
		case 'Hapus-Pertanyaan' :				
			if(!file_exists ("pertanyaan_delete.php")) die ("Sorry Empty Page!"); 
			include "pertanyaan_delete.php"; break;		
		case 'Pertanyaan-Proses' :				
			if(!file_exists ("pertanyaan_proses.php")) die ("Sorry Empty Page!"); 
			include "pertanyaan_proses.php"; break;
		case 'Edit-Pertanyaan' :				
			if(!file_exists ("pertanyaan_edit.php")) die ("Sorry Empty Page!"); 
			include "pertanyaan_edit.php"; break;	
			
		# Data Jawaban
		case 'Data-Jawaban' :				
			if(!file_exists ("jawaban.php")) die ("Sorry Empty Page!"); 
			include "jawaban.php";	 break;			
			
		# Data Nilai
		case 'Data-Nilai' :				
			if(!file_exists ("nilai.php")) die ("Sorry Empty Page!"); 
			include "nilai.php";	 break;		
		case 'Hapus-Nilai' :				
			if(!file_exists ("nilai_delete.php")) die ("Sorry Empty Page!"); 
			include "nilai_delete.php"; break;		
	
		#under construction
		case 'print' :				
			if(!file_exists ("export_to_excel.php.php")) die ("Sorry Empty Page!"); 
			include "export_to_excel.php.php"; break;
		
		#under construction
		case 'under-construction' :				
			if(!file_exists ("under.php")) die ("Sorry Empty Page!"); 
			include "under.php"; break;
	}
}
?>