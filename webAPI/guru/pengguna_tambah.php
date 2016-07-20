<section class="wrapper">
			<div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-user"></i>Pengguna</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
						<li><i class="icon_documents_alt"></i>Halaman</li>
						<li><i class="fa fa-user"></i>Tambah Pengguna</li>
					</ol>
				</div>
			</div>
			<table class="box-form">
                <tbody>
                              <tr>
								 <td></td>
								 <td>
									<h4>TAMBAH DATA PENGGUNA</h4>
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
                                  <form class="form-validate form-horizontal" id="feedback_form" method="post" action="?page=Pengguna-Proses">
                                      </p>
									  <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-2">Username</label>
                                          <div class="col-lg-4">
                                              <input class="form-control" id="txtUsername" name="txtUsername" type="text"/>
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="cemail" class="control-label col-lg-2">Password</label>
                                          <div class="col-lg-4">
                                              <input class="form-control " id="txtPasswd" type="password" name="txtPasswd"/>
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="cemail" class="control-label col-lg-2">Nama</label>
                                          <div class="col-lg-4">
                                              <input class="form-control " id="txtNama" type="text" name="txtNama"/>
                                          </div>
                                      </div>
									                    <div class="form-group ">
                                           <label for="cemail" class="control-label col-lg-2">Status</label>
                                           <div class="col-lg-4">
										                          <select class="form-control m-bot15" name='txtStatus' id='txtStatus'>
                                                  <option value='Admin' selected>Admin</option>
											                            <option value='Guru Sekolah'>Guru</option>
                                                  <option value='Siswa'>Siswa</option>
                                              </select> 
                                           </div>
                                      </div>
                                      <div class="form-group ">
                                           <label for="cemail" class="control-label col-lg-2">Jurusan</label>
                                           <div class="col-lg-4">
                                              <select class="form-control m-bot15" name='txtJurusan' id='txtJurusan'>
                                                  <option value='-' selected>-- Pilih Jurusan --</option>
                                                  <option value='Teknik Mesin'>Teknik Mesin</option>
                                                  <option value='Teknik Multimedia'>Teknik Multimedia</option>
                                                  <option value='Teknik Otomotif'>Teknik Otomotif</option>
                                              </select> 
                                           </div>
                                      </div>
                                      <div class="form-group">
                                          <div class="col-lg-offset-2 col-lg-10">
                                              <button class="btn btn-primary" type="submit">Simpan</button>
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