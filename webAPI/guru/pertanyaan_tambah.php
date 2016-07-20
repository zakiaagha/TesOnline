<section class="wrapper">
			<div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-user"></i>Pertanyaan</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
						<li><i class="icon_documents_alt"></i>Halaman</li>
						<li><i class="fa fa-user"></i>Tambah Pertanyaan</li>
					</ol>
				</div>
			</div>
			<table class="box-form">
                <tbody>
                              <tr>
								 <td></td>
								 <td>
									<h4>TAMBAH DATA PERTANYAAN</h4>
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
                                  <form class="form-validate form-horizontal" id="feedback_form" method="post" action="?page=Pertanyaan-Proses">
                                      </p>
									  <div class="form-group ">
                                          <label for="cemail" class="control-label col-lg-2">Nama Tes</label>
                                          <div class="col-lg-4">
										  <select class="form-control m-bot15" name='txtOptTes' id='txtOptTes'>
										  <?php 
										  $query=mysql_query("SELECT * FROM tb_mapel");
											echo "<option value='' selected>- Pilih Nama Tes -</option>";
											while($result=mysql_fetch_array($query))
											{
												echo "<option value='".$result['mapel_id']."'>".$result['nama_mapel']." </option>";        
											}
											echo "</select>";
											?>
                                          </div>
                                      </div>
									  <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-2">Pertanyaan</label>
                                          <div class="col-lg-4">
                                              <textarea rows="5" cols="50" class="form-control" id="txtPertanyaan" name="txtPertanyaan" type="text"></textarea>
                                          </div>
                                      </div>
									  <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-2">Pilihan 1</label>
                                          <div class="col-lg-4">
                                              <input class="form-control" id="txtPilihan1" name="txtPilihan1" type="text"/>
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="cemail" class="control-label col-lg-2">Pilihan 2</label>
                                          <div class="col-lg-4">
                                              <input class="form-control " id="txtPilihan2" type="text" name="txtPilihan2"/>
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="cemail" class="control-label col-lg-2">Pilihan 3</label>
                                          <div class="col-lg-4">
                                              <input class="form-control " id="txtPilihan3" type="text" name="txtPilihan3"/>
                                          </div>
                                      </div>
									  <div class="form-group ">
                                          <label for="cemail" class="control-label col-lg-2">Pilihan 4</label>
                                          <div class="col-lg-4">
                                              <input class="form-control " id="txtPilihan4" type="text" name="txtPilihan4"/>
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
                                              <button class="btn btn-primary" type="submit">Simpan</button>
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