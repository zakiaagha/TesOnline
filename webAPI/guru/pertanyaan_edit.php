<?php
include("../library/inc.connection.php");
include_once "../library/inc.library.php";
include_once "../library/inc.sesadmin.php";

# Opsi Level Login

if($_GET) {
  if(isset($_POST['btnSave'])){ 
    # Baca Variabel Form
	$txtTesID  = $_POST['txtTes'];
    $txtTesID  = str_replace("'","&acute;",$txtTesID);
	$txtPertanyaan = $_POST['txtPertanyaan'];
    $txtPertanyaan  = str_replace("'","&acute;",$txtPertanyaan);
    $txtPilihan1 = $_POST['txtPilihan1'];
    $txtPilihan1 = str_replace("'","&acute;",$txtPilihan1);
    $txtPilihan2 = $_POST['txtPilihan2'];
    $txtPilihan2 = str_replace("'","&acute;",$txtPilihan2);
    $txtPilihan3 = $_POST['txtPilihan3'];
    $txtPilihan3 = str_replace("'","&acute;",$txtPilihan3);
    $txtPilihan4 = $_POST['txtPilihan4'];
    $txtPilihan4 = str_replace("'","&acute;",$txtPilihan4);
    $txtJawaban = $_POST['txtJawaban'];
    $txtJawaban = str_replace("'","&acute;",$txtJawaban);
	
      $sqlSave="UPDATE tb_pertanyaan SET desk_pertanyaan='$txtPertanyaan', pilihan1='$txtPilihan1', pilihan2='$txtPilihan2', pilihan3='$txtPilihan3', pilihan4='$txtPilihan4', benar=$txtJawaban WHERE tes_id='$txtTesID'";
      $qrySave=mysql_query($sqlSave);
      if($qrySave){
        echo "<meta http-equiv='refresh' content='0; url=?page=Data-Pertanyaan&Edit=Success'>";
      } else {
		  echo "<script>alert('Edit gagal')</script>";
	  }
    } 
    
  }  

  # TAMPILKAN DATA LOGIN UNTUK DIEDIT 
  $KodeEdit= isset($_GET['id_pertanyaan']) ?  $_GET['id_pertanyaan'] : $_POST['txtPertanyaan']; 
  $sqlShow = "SELECT * FROM tb_pertanyaan WHERE id_pertanyaan ='$KodeEdit'";
  $qryShow = mysql_query($sqlShow)  or die ("Query ambil data user salah : ".mysql_error());
  $dataShow = mysql_fetch_array($qryShow);
  $query=mysql_query("SELECT * FROM tb_tes as t INNER JOIN tb_kategori as k ON t.kat_id = k.kat_id AND t.tes_id = '".$dataShow['tes_id']."' ");
  $dataTes = mysql_fetch_array($query);

  # MASUKKAN DATA KE VARIABEL 
  $dataTesID = isset($dataTes['tes_id']) ?  $dataTes['tes_id'] : $_POST['txtTes'];
  $dataNamaTes = isset($dataTes['nama_tes']) ?  $dataTes['nama_tes'] : $_POST['txtTes'];
  $dataTesKat = isset($dataTes['nama_kategori']) ?  $dataTes['nama_kategori'] : $_POST['txtTes'];
  $dataPertanyaan = isset($dataShow['desk_pertanyaan']) ?  $dataShow['desk_pertanyaan'] : $_POST['txtPertanyaan'];
  $dataPilihan1 = isset($dataShow['pilihan1']) ?  $dataShow['pilihan1'] : $_POST['txtPilihan1'];
  $dataPilihan2 = isset($dataShow['pilihan2']) ?  $dataShow['pilihan2'] : $_POST['txtPilihan2'];
  $dataPilihan3 = isset($dataShow['pilihan3']) ?  $dataShow['pilihan3'] : $_POST['txtPilihan3'];
  $dataPilihan4 = isset($dataShow['pilihan4']) ?  $dataShow['pilihan4'] : $_POST['txtPilihan4'];
  $dataBenar= isset($dataShow['benar']) ?  $dataShow['benar'] : $_POST['txtJawaban'];
?>
<section class="wrapper">
			<div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="icon_question_alt"></i>Pertanyaan</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
						<li><i class="icon_documents_alt"></i>Halaman</li>
						<li><i class="icon_question_alt"></i>Edit Pertanyaan</li>
					</ol>
				</div>
			</div>
			<table class="box-form">
                <tbody>
                              <tr>
								 <td></td>
								 <td>
									<h4>EDIT DATA PERTANYAAN</h4>
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
                                  <form class="form-validate form-horizontal" id="feedback_form" method="post" action="?page=Edit-Pertanyaan">
                                      </p>
									  <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-2">Nama Tes</label>
                                          <div class="col-lg-4">
                                              <input class="form-control" id="txtNama" name="txtNama" type="text" value="<?php echo $dataNamaTes; echo " - "; echo $dataTesKat;?>" readonly/>
											  <input class="form-control" id="txtTes" name="txtTes" type="hidden" value="<?php echo $dataTesID;?>" hidden/>
                                          </div>
                                      </div>
									  <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-2">Pertanyaan</label>
                                          <div class="col-lg-4">
                                               <textarea rows="5" cols="50" class="form-control" id="txtPertanyaan" name="txtPertanyaan" type="text"><?php echo $dataPertanyaan; ?></textarea>
                                          </div>
                                      </div>
									  <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-2">Pilihan 1</label>
                                          <div class="col-lg-4">
                                              <input class="form-control" id="txtPilihan1" name="txtPilihan1" type="text" value="<?php echo $dataPilihan1; ?>"/>
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="cemail" class="control-label col-lg-2">Pilihan 2</label>
                                          <div class="col-lg-4">
                                              <input class="form-control " id="txtPilihan2" type="text" name="txtPilihan2" value="<?php echo $dataPilihan2; ?>"/>
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="cemail" class="control-label col-lg-2">Pilihan 3</label>
                                          <div class="col-lg-4">
                                              <input class="form-control " id="txtPilihan3" type="text" name="txtPilihan3" value="<?php echo $dataPilihan3; ?>"/>
                                          </div>
                                      </div>
									  <div class="form-group ">
                                          <label for="cemail" class="control-label col-lg-2">Pilihan 4</label>
                                          <div class="col-lg-4">
                                              <input class="form-control " id="txtPilihan4" type="text" name="txtPilihan4" value="<?php echo $dataPilihan4; ?>"/>
                                          </div>
                                      </div>
                                      
									  <div class="form-group ">
                                          <label for="cemail" class="control-label col-lg-2">Jawaban</label>
                                          <div class="col-lg-4">
										  <select class="form-control m-bot15" name='txtJawaban' id='txtJawaban'>
                                              <option value='1' selected>Pilihan 1</option>
											  <option value='2'>Pilihan 2</option>
                                              <option value='3'>Pilihan 3</option>
                                              <option value='4'>Pilihan 4</option>
                                          </select>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <div class="col-lg-offset-2 col-lg-10">
                                              <button class="btn btn-primary" type="submit" name="btnSave">Simpan</button>
											  <a href="?page=Data-Pertanyaan" class="btn btn-default" type="button">Batal</a>
                                          </div>
                                      </div>
                                  </form>
                              </div>

                          </div>
                      </section>
                  </div>
              </div>
			  
          </section>
		  
