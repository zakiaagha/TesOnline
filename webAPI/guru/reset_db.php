		<section class="wrapper">
			<div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-user"></i>Guru</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
						<li><i class="icon_documents_alt"></i>Halaman</li>
						<li><i class="fa fa-user"></i>Reset Database</li>
					</ol>
				</div>
			</div>
					<table class="box-form">
                           <tbody>
                              <tr>
								 <td></td>
								 <td>
									<h4>RESET DATABASE</h4>
								 </td>
							  </tr>
                           </tbody>
                    </table>
					</p>
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <div class="panel-body">
                              <div class="form">
                                  <form class="form-validate form-horizontal" method="post" action="?page=Reset-Database" target="_self">
									<tr class="active">
										<td><div class="form-group ">
                                          <label for="cemail" class="control-label col-lg-1" >Status</label>
                                          <div class="col-lg-4">
										  <select class="form-control m-bot15" name='txtStatus' id='txtStatus'>
												<option value='1'>ALL</option>
												<option value='2'>Data Profil Sekolah</option>
												<option value='3'>Data Paket Keahlian</option>
												<option value='4'>Data Wali Kelas</option>
												<option value='5'>Data Guru</option> 
												<option value='6'>Data Siswa</option>
												<option value='7'>Data Akses Guru</option>
												<option value='8'>Data Kelas</option>
												<option value='9'>Data Kelas Siswa</option>
												<option value='10'>Data Mata Pelajaran</option>
												<option value='11'>Data Kompetensi Dasar</option>
												<option value='12'>Data Antar Mata Pelajaran</option>
												<option value='13'>Data Kehadiran</option>
												<option value='14'>Data Ekstrakulikuler</option>
												<option value='15'>Data Pengetahuan</option>
												<option value='16'>Data Keterampilan</option>
												<option value='17'>Data Sikap</option>  
												<option value='18'>Data Deskripsi</option>  
                                          </select>
										  </div>
										</td><input class="btn btn-info" type="submit" name="btnTampil" Value="Reset" /></td>
										<td>
									</tr>
								  </form>
                              </div>
					      </div>
                      </section>
                  </div>
              </div>
              <!-- page end-->
          </section>
		  
<?php
#jika Tombol SImpan di Klik
 if(isset($_POST['btnTampil'])){
	$data = $_POST['data'];
 	#Seluruh Table
	if($data==1){
		$qrySave=mysql_query("TRUNCATE table tabel_profil") 
		or die ("Gagal query".mysql_error());
		$qrySave=mysql_query("TRUNCATE table tabel_jurusan") 
		or die ("Gagal query".mysql_error());
		$qrySave=mysql_query("TRUNCATE table tabel_walas") 
		or die ("Gagal query".mysql_error());
		$qrySave=mysql_query("TRUNCATE table tabel_guru") 
		or die ("Gagal query".mysql_error());
		$qrySave=mysql_query("TRUNCATE table tabel_siswa") 
		or die ("Gagal query".mysql_error());
		$qrySave=mysql_query("TRUNCATE table tabel_akses_guru") 
		or die ("Gagal query".mysql_error());
		$qrySave=mysql_query("TRUNCATE table tabel_kelas") 
		or die ("Gagal query".mysql_error());
		$qrySave=mysql_query("TRUNCATE table tabel_perkelas") 
		or die ("Gagal query".mysql_error());
		$qrySave=mysql_query("TRUNCATE table tabel_mapel") 
		or die ("Gagal query".mysql_error());
		$qrySave=mysql_query("TRUNCATE table tabel_kompetensi") 
		or die ("Gagal query".mysql_error());
		$qrySave=mysql_query("TRUNCATE table tabel_antar_mapel") 
		or die ("Gagal query".mysql_error());
		$qrySave=mysql_query("TRUNCATE table tabel_kehadiran") 
		or die ("Gagal query".mysql_error());
		$qrySave=mysql_query("TRUNCATE table tabel_ekstrakurikuler") 
		or die ("Gagal query".mysql_error());
		$qrySave=mysql_query("TRUNCATE table tabel_pengetahuan") 
		or die ("Gagal query".mysql_error());
		$qrySave=mysql_query("TRUNCATE table tabel_keterampilan") 
		or die ("Gagal query".mysql_error());
		$qrySave=mysql_query("TRUNCATE table tabel_sikap") 
		or die ("Gagal query".mysql_error());
		$qrySave=mysql_query("TRUNCATE table tabel_deskripsi") 
		or die ("Gagal query".mysql_error());
	} elseif($data==2){ #Seluruh Profil
		$qrySave=mysql_query("TRUNCATE table tabel_profil") 
		or die ("Gagal query".mysql_error());
 	} elseif ($data==3){ #Seluruh Jurusan
		$qrySave=mysql_query("TRUNCATE table tabel_jurusan") 
		or die ("Gagal query".mysql_error());
 	} elseif ($data==4){ #Seluruh Matapelajaran
		$qrySave=mysql_query("TRUNCATE table tabel_walas") 
		or die ("Gagal query".mysql_error());
 	} elseif ($data==5){ #Seluruh Kompetensi Dasar
		$qrySave=mysql_query("TRUNCATE table tabel_guru") 
		or die ("Gagal query".mysql_error());
 	} elseif ($data==6){ #Seluruh Sub Kompetensi Dasar
		$qrySave=mysql_query("TRUNCATE table tabel_siswa") 
		or die ("Gagal query".mysql_error());
 	} elseif ($data==7){ #Seluruh Kunci Jawaban
		$qrySave=mysql_query("TRUNCATE table tabel_akses_guru") 
		or die ("Gagal query".mysql_error());
 	} elseif ($data==8){ #Seluruh Jawaban Siswa
		$qrySave=mysql_query("TRUNCATE table tabel_kelas") 
		or die ("Gagal query".mysql_error());
 	} elseif ($data==9){ #Seluruh Siswa
		$qrySave=mysql_query("TRUNCATE table tabel_perkelas") 
		or die ("Gagal query".mysql_error());
 	} elseif ($data==10){ #Seluruh Siswa
		$qrySave=mysql_query("TRUNCATE table tabel_mapel") 
		or die ("Gagal query".mysql_error());
	} elseif ($data==11){ #Seluruh Siswa
		$qrySave=mysql_query("TRUNCATE table tabel_kompetensi") 
		or die ("Gagal query".mysql_error());
	} elseif ($data==12){ #Seluruh Siswa
		$qrySave=mysql_query("TRUNCATE table tabel_antar_mapel") 
		or die ("Gagal query".mysql_error());
	} elseif ($data==13){ #Seluruh Siswa
		$qrySave=mysql_query("TRUNCATE table tabel_kehadiran") 
		or die ("Gagal query".mysql_error());
	} elseif ($data==14){ #Seluruh Siswa
		$qrySave=mysql_query("TRUNCATE table tabel_ekstrakurikuler") 
		or die ("Gagal query".mysql_error());
	} elseif ($data==15){ #Seluruh Siswa
		$qrySave=mysql_query("TRUNCATE table tabel_pengetahuan") 
		or die ("Gagal query".mysql_error());
	} elseif ($data==16){ #Seluruh Siswa
		$qrySave=mysql_query("TRUNCATE table tabel_keterampilan") 
		or die ("Gagal query".mysql_error());
	} elseif ($data==17){ #Seluruh Siswa
		$qrySave=mysql_query("TRUNCATE table tabel_sikap") 
		or die ("Gagal query".mysql_error());
	} elseif ($data==18){ #Seluruh Siswa
		$qrySave=mysql_query("TRUNCATE table tabel_deskripsi") 
		or die ("Gagal query".mysql_error());
	} else {}
}
?>