		<section class="wrapper">
			<div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-user"></i>Pengguna</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i>Home</li>
						<li><i class="icon_documents_alt"></i>Halaman</li>
						<li><i class="fa fa-user"></i>Pengguna</li>
					</ol>
				</div>
			</div>
					<table>
                           <tbody>
                              <tr>
                                 <td width="100px" align="center"><a href="?page=Tambah-Pengguna" target="_self" class="btn btn-primary">Tambah</a></td>
								 <!--<td>
									Tampilkan berdasarkan
									<select class="navbar-form">
                                              <option>Kode</option>
                                              <option>NIP</option>
                                              <option>Nama</option>
                                    </select>
									</div>
								 </td>-->
								 <td align="right">
									<form class="navbar-form" method="post" action="?page=Data-Pengguna">
										<input class="form-control" name="txt_cari" id='txt_cari' placeholder="berdasarkan nama" type="text">&nbsp;
									</form>
								 </td>
								 <td>&nbsp;</td>
                              </tr>
                           </tbody>
                    </table>
					</p>
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
						<?php 
						ini_set('display_errors', 1); ini_set('error_reporting', E_ERROR);
						$cari	= $_POST['txt_cari'];
						if (!empty($cari)){
						$where	= " WHERE user_id LIKE '%$cari%' OR username LIKE '%$cari%'";
						
						echo "<table id='datatables' class='table table-striped table-advance table-hover'>
                           <tbody>
                              <tr>
                                 <th><center>No</center></th>
                                 <th width='170px'>Username</th>
                                 <th>Nama</th>
                                 <th width='170px'>Status</th>
                                 <th width='170px'>Jurusan</th>
                                 <th width='170px'>Aksi</th>
                              </tr>";
								$query=mysql_query("SELECT * FROM tb_user $where");
								$ni=1;
								while($result=mysql_fetch_array($query)){
								$no=$ni++;
								$Kode = $result['user_id'];		
  
								echo "<tr'>
								<td align='center'>".$no."</td>
								<td>".$result['username']."</td>
								<td>".$result['nama']."</td>
								<td>".$result['status']."</td>
								<td>".$result['jurusan']."</td>
								<td>
									<div class='btn-group'>
										<a class='btn btn-success' data-toggle='modal' href='?page=Edit-Pengguna&amp;User_ID=".$Kode."' target='_self'><i class='icon_check_alt2'></i></a>
										<a class='btn btn-danger' data-toggle='modal' href='?page=Hapus-Pengguna&amp;User_ID=".$Kode."' target='_self'><i class='icon_close_alt2'></i></a>
									</div>
								</td>
								</tr>";
								}
						echo "</tbody></table>";
						} else {
						echo "<table id='datatables' class='table table-striped table-advance table-hover'>
                           <tbody>
                              <tr>
                                 <th><center>No</center></th>
                                 <th width='170px'>Username</th>
                                 <th>Nama</th>
                                 <th width='170px'>Status</th>
                                 <th width='170px'>Jurusan</th>
                                 <th width='170px'>Aksi</th>
                              </tr>";
								//paging
								$per_hal = 10;
								$jumlah_record = mysql_query ("SELECT COUNT(*) FROM tb_user");
								$jum = mysql_result($jumlah_record, 0);
								$halaman = ceil($jum/$per_hal);
								$page = (isset($_GET['hal'])) ? (int)$_GET['hal'] : 1;
								$start = ($page - 1) * $per_hal;
								$query = mysql_query("SELECT * FROM tb_user ORDER BY user_id LIMIT $start, $per_hal");
								$ni=1;
								while($result=mysql_fetch_array($query)){
								$no=$ni++;
								$Kode = $result['user_id'];		
								
								echo "<tr>
								<td align='center'>".$no."</td>
								<td>".$result['username']."</td>
								<td>".$result['nama']."</td>
								<td>".$result['status']."</td>
								<td>".$result['jurusan']."</td>
								<td>
									<div class='btn-group'>
										<a class='btn btn-danger' data-toggle='modal' href='?page=Hapus-Pengguna&amp;User_ID=".$Kode."' target='_self'><i class='icon_close_alt2'></i></a>
									</div>
								</td>
								</tr>
								";
								}
						?>
						
							<tr>
								<td colspan='5px'>
								<div class='text-center'>
                                  <ul class='pagination'>
                                      <?php if ($page<=1){ ?>
									  <li><a href="index.php?page=Data-Pengguna&amp;hal=1"> &laquo; </a></li>
									  <?php } else { ?>
									  <li><a href="index.php?page=Data-Pengguna&amp;hal=<?php echo $page -1 ?>"> &laquo; </a></li>
									  <?php } ?>
                                      <?php
										for($x=1;$x<=$halaman;$x++)
										{
											?><li><a href="index.php?page=Data-Pengguna&amp;hal=<?php echo $x ?>"><?php echo $x ?></a></li>
									  <?php } ?> 
									  
                                      <?php if ($page>=$halaman){ ?>
                                      <li><a href="index.php?page=Data-Pengguna&amp;hal=<?php echo $halaman ?>"> &raquo; </a></li>
									  <?php } else { ?>
									  <li><a href="index.php?page=Data-Pengguna&amp;hal=<?php echo $page +1 ?>"> &raquo; </a></li>
									  <?php } ?>
                                  </ul>
                              </div>
							  </td>
							  </tr>
						   </tbody>
                        </table>
						<?php } ?>
                      </section>
                  </div>
              </div>
              <!-- page end-->
          </section>