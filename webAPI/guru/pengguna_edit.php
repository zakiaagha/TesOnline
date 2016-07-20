<?php
include("../library/inc.connection.php");
include_once "../library/inc.library.php";
include_once "../library/inc.sesadmin.php";

# Opsi Level Login

if($_GET) {
  if(isset($_POST['btnSave'])){ 
    # Baca Variabel Form
	$txtUsername  = $_POST['txtUsername'];
    $txtUsername  = str_replace("'","&acute;",$txtUsername);
	$txtPasswd  = $_POST['txtPasswd'];
    $txtPasswd  = str_replace("'","&acute;",$txtPasswd);
    $txtNama  = $_POST['txtNama'];
    $txtNama  = str_replace("'","&acute;",$txtNama);
    $txtStatus  = $_POST['txtStatus'];
    $txtStatus  = str_replace("'","&acute;",$txtStatus);
 	       
      $sqlSave="UPDATE tb_user SET username='$txtUsername', password='".md5($txtPasswd)."', nama='$txtNama', status='$txtStatus' WHERE user_id='".$txtUserID."'";
      $qrySave=mysql_query($sqlSave);
      if($qrySave){
        echo "<meta http-equiv='refresh' content='0; url=?page=Data-Pengguna&Edit=Success'>";
      }
    } 
    
  }  

  # TAMPILKAN DATA LOGIN UNTUK DIEDIT 
  $KodeEdit= isset($_GET['User_ID']) ?  $_GET['User_ID'] : $_POST['txtUsername']; 
  $sqlShow = "SELECT * FROM tb_user WHERE user_id='$KodeEdit'";
  $qryShow = mysql_query($sqlShow)  or die ("Query ambil data user salah : ".mysql_error());
  $dataShow = mysql_fetch_array($qryShow);


  # MASUKKAN DATA KE VARIABEL 
  $dataUser = isset($dataShow['username']) ?  $dataShow['username'] : $_POST['txtUsername'];
  $dataPass= isset($dataShow['password']) ?  $dataShow['password'] : $_POST['txtPasswd'];
  $dataNama = isset($dataShow['nama']) ?  $dataShow['nama'] : $_POST['txtNama'];
  $dataStatus = isset($dataShow['level']) ?  $dataShow['level'] : $_POST['txtStatus'];
?>
<section class="wrapper">
			<div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-user"></i>Pengguna</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
						<li><i class="icon_documents_alt"></i>Halaman</li>
						<li><i class="fa fa-user"></i>Edit Pengguna</li>
					</ol>
				</div>
			</div>
			<table class="box-form">
                <tbody>
                              <tr>
								 <td></td>
								 <td>
									<h4>EDIT DATA PENGGUNA</h4>
								 </td>
							  </tr>
                           </tbody>
            </table>
			</p>
			<div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <div class="panel-body">
                              <div class="form">
                                  <form class="form-validate form-horizontal" id="feedback_form" method="post" action="?page=Edit-Pengguna">
                                      </p>
									  <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-2">Username</label>
                                          <div class="col-lg-4">
                                              <input class="form-control" id="txtUsername" name="txtUsername" type="text" value="<?php echo $dataUser; ?>" readonly/>
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="cemail" class="control-label col-lg-2">Password</label>
                                          <div class="col-lg-4">
                                              <input class="form-control " id="txtPasswd" type="password" name="txtPasswd" value="<?php echo $dataPass; ?>"/>
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="cemail" class="control-label col-lg-2">Nama</label>
                                          <div class="col-lg-4">
                                              <input class="form-control " id="txtNama" type="text" name="txtNama" value="<?php echo $dataNama; ?>" />
                                          </div>
                                      </div>
									                    <div class="form-group ">
                                          <label for="cemail" class="control-label col-lg-2" >Status</label>
                                          <div class="col-lg-4">
										                          <select class="form-control m-bot15" name='txtStatus' id='txtStatus'>
                                                <option value='Admin' selected>Admin</option>
											                          <option value='Guru Sekolah'>Guru</option>
                                                <option value='Siswa'>Siswa</option>
                                              </select>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <div class="col-lg-offset-2 col-lg-10">
                                              <button class="btn btn-primary" type="submit" name="btnSave">Simpan</button>
											  <a href="?page=Data-Pengguna" class="btn btn-default" type="button">Batal</a>
                                          </div>
                                      </div>
                                  </form>
                              </div>

                          </div>
                      </section>
                  </div>
              </div>
			  
          </section>
		  
