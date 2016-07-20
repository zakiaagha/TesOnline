<?php
if(isset($_SESSION['SES_ADMIN'])){
?>

<!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu">                
                  <li class="active">
                      <a class="" href="?page=Data-Pengguna">
                          <i class="icon_profile"></i>
                          <span>Data Pengguna</span>
                      </a>
                  </li>
				  <li class="sub-menu">
                      <a class="" href="?page=Data-Mapel">
                          <i class="icon_folder"></i>
                          <span>Mata Pelajaran</span>
					  </a>                      
                  </li>
				  <li>
                      <a class="" href="?page=Data-Pertanyaan">
                          <i class="icon_question_alt"></i>
                          <span>Pertanyaan</span>
                      </a>
                  </li>
				  <li>
                      <a class="" href="?page=Data-Jawaban">
                          <i class="icon_check_alt"></i>
                          <span>Jawaban</span>
                      </a>
                  </li>
                  <li class="sub-menu">                     
                      <a class="" href="?page=Data-Nilai">
                          <i class="icon_menu-square_alt"></i>
                          <span>Nilai</span>
                      </a>
                  </li>
                                              
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
<?php
}
else {
  echo"<script>document.location='../index.php'</script>";
}
?>