<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>eBajak | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <header class="main-header">
            <nav class="navbar navbar-expand navbar-white navbar-light">
                <ul class="navbar-nav ml-auto"> <!-- Add ml-auto class to align items to the right -->
                    <li class="nav-item">
                        <a class="nav-link" href="profail.php">Profail ERWATI</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Log Keluar</a>
                    </li>
                </ul>
            </nav>
        </header>
        <!-- Rest of the content -->
    </div>
</body>




  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link">
      <img src="img/doalogo.gif" alt="eBajak Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">eBajak</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Jamal Bin Abdillah</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->

      <!-- Sidebar Menu -->
      <!-- Mula Sidebar ebajak-->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-header">MENU PETANI</li>
          <li class="nav-item menu">
            <a href="#" class="nav-link active ">
              <i class="nav-icon fa fa-edit"></i>
              <p>
                PETANI
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link active ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daftar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index2.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Semak</p>
                </a>
              </li>

            </ul>
          </li>

          <li class="nav-item menu">
            <a href="#" class="nav-link ">
              <i class="nav-icon fa fa-edit"></i>
              <p>
                TUNTUTAN
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="ptun_daf.php" class="nav-link" style="text-decoration:none;">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daftar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="ptun_per.php" class="nav-link" style="text-decoration:none;">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Periksa</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="ptun_kem.php" class="nav-link" style="text-decoration:none;">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dikembalikan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="ptun_smk.php" class="nav-link" style="text-decoration:none;">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Semak</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="ptun_lus.php" class="nav-link" style="text-decoration:none;">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lulus</p>
                </a>
              </li>
            </ul>
          </li>



          <li class="nav-item menu">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-edit"></i>
              <p>
                PENYATA
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pet_janapyt.php" class="nav-link" style="text-decoration:none;">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Jana</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pyt_sed.php" class="nav-link" style="text-decoration:none;">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sedia</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pyt_sah.php" class="nav-link" style="text-decoration:none;">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Semak</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pyt_lus.php" class="nav-link" style="text-decoration:none;">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lulus</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pyt_txt.php" class="nav-link" style="text-decoration:none;">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Jana TXT</p>
                </a>
              </li>
            </ul>
          </li>


          <li class="nav-header">MENU KONTRAKTOR</li>


          <li class="nav-item menu">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-edit"></i>
              <p>
                KONTRAKTOR
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="kon.php" class="nav-link" style="text-decoration:none;">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daftar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="kon_smk.php" class="nav-link" style="text-decoration:none;">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Semak</p>
                </a>
              </li>
            </ul>
          </li>




          <li class="nav-item menu">
            <a href="#" class="nav-link ">
              <i class="nav-icon fa fa-edit"></i>
              <p>
                TUNTUTAN
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="ptun_daf.php" class="nav-link" style="text-decoration:none;">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daftar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="ptun_kem.php" class="nav-link" style="text-decoration:none;">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dikembalikan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="ptun_smk.php" class="nav-link" style="text-decoration:none;">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Semak</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="ptun_lus.php" class="nav-link" style="text-decoration:none;">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lulus</p>
                </a>
              </li>
            </ul>
          </li>






          <li class="nav-item menu">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-edit"></i>
              <p>
                PENYATA
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pet_janapyt.php" class="nav-link" style="text-decoration:none;">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Jana</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pyt_sed.php" class="nav-link" style="text-decoration:none;">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sedia</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pyt_sah.php" class="nav-link" style="text-decoration:none;">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Semak</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pyt_lus.php" class="nav-link" style="text-decoration:none;">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lulus</p>
                </a>
              </li>

            </ul>
          </li>


          <li class="nav-header">MENU KEMASKINI</li>




          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-edit"></i>
              <p>
                KEMASKINI
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pet_ed.php" class="nav-link" style="text-decoration:none;">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Petani</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="kon_ed.php" class="nav-link" style="text-decoration:none;">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kontraktor</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="ptun_ed.php" class="nav-link" style="text-decoration:none;">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tuntutan Individu</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="ktun_ed.php" class="nav-link" style="text-decoration:none;">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tuntutan Kontraktor</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pyt_ed.php" class="nav-link" style="text-decoration:none;">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Penyata Individu</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pytkon_ed.php" class="nav-link" style="text-decoration:none;">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Penyata Kontraktor</p>
                </a>
              </li>
            </ul>
          </li>




          <li class="nav-header">MENU CARIAN</li>

          <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
              <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-sidebar">
                  <i class="fas fa-search fa-fw"></i>
                </button>
              </div>
            </div>
          </div>



          <li class="nav-header">MENU LAPORAN/SENARAI</li>


          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-edit"></i>
              <p>
                LAPORAN/SENARAI
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pet_ls.php" class="nav-link" style="text-decoration:none;">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Permohonan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="kon_ls.php" class="nav-link" style="text-decoration:none;">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kontraktor</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="ptun_ls.php" class="nav-link" style="text-decoration:none;">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tuntutan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pyt_ls.php" class="nav-link" style="text-decoration:none;">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Penyata</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pbyr_ls.php" class="nav-link" style="text-decoration:none;">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pembayaran</p>
                </a>
              </li>
            </ul>
          </li>



          <li class="nav-header">MENU SISTEM</li>


          <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="fa-regular fa-gear"></i>
              <p>
                SISTEM
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="sis_z.php" class="nav-link" style="text-decoration:none;">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Zon</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="sis_kw.php" class="nav-link" style="text-decoration:none;">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kawasan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="sis_m.php" class="nav-link" style="text-decoration:none;">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Mukim</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="sis_lok.php" class="nav-link" style="text-decoration:none;">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lokasi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="sis_user.php" class="nav-link" style="text-decoration:none;">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pengguna</p>
                </a>
              </li>
            </ul>
          </li>


      </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  {{-- <div class="content-wrapper"> --}}
    <!-- Content Header (Page header) -->
    {{-- <div class="content-header">
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Laman Utama</a></li>
          </ol> --}}
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
     <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
          Sistem Pembayaran Subsidi Pembajakan Sawah Padi
          <small>Modul Pegawai Pertanian</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="index.php"><i class="fa fa-dashboard"></i> Laman Utama</a></li>
        </ol>
      </section>
  <!-- Main content -->
    <form method="post" action="pet_act.php" id="pet" name="pet">
    <section class="content">
       <div class="row ">

       <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">BUTIR-BUTIR PEMOHON (INDIVIDU)</h3>
              </div>
              <!-- /.box-header -->

              <div class="box-body">
                  <div class="form-group">
                    <label for="pemohon">Nama Pemohon</label>
                    <input type="text" class="form-control" id="pemohon" name="pemohon" placeholder="Nama Pemohon">

                    <label for="pendaftaran">No.Kad Pengenalan</label>
                    <input type="text" class="form-control" id="nokp" name="nokp" placeholder="No.Kad Pengenalan">

                    <!-- textarea -->
                    <label>Alamat</label>
                    <textarea class="form-control" rows="3" placeholder="Alamat ..." name="alamat"></textarea>

                    <label for="poskod">Poskod</label>
                    <input type="text" class="form-control" id="poskod" name="poskod" placeholder="Poskod">

                    <!-- select -->
                    <label for="daerah">Daerah</label>
                    <select class="form-control"  name="daerah">
                      <option value="0">Sila pilih...</option>
                         <option value="32"
                          >Banggi					</option>
                         <option value="17"
                          >Beaufort					</option>
                         <option value="8"
                          >Beluran					</option>
                         <option value="38"
                          >Kemabong					</option>
                         <option value="13"
                          >Keningau					</option>
                         <option value="9"
                          >Kinabatangan					</option>
                         <option value="3"
                          >Kota Belud					</option>
                         <option value="1"
                          >Kota Kinabalu					</option>
                         <option value="22"
                          >Kota Marudu					</option>
                         <option value="18"
                          >Kuala Penyu					</option>
                         <option value="5"
                          >Kudat					</option>
                         <option value="23"
                          >Kunak					</option>
                         <option value="11"
                          >Lahad Datu					</option>
                         <option value="36"
                          >Matunggong					</option>
                         <option value="35"
                          >Membakut					</option>
                         <option value="34"
                          >Menumbok					</option>
                         <option value="15"
                          >Nabawan					</option>
                         <option value="40"
                          >Paitan					</option>
                         <option value="2"
                          >Papar					</option>
                         <option value="21"
                          >Penampang					</option>
                         <option value="26"
                          >Pitas					</option>
                         <option value="39"
                          >Putatan					</option>
                         <option value="6"
                          >Ranau					</option>
                         <option value="7"
                          >Sandakan					</option>
                         <option value="12"
                          >Semporna					</option>
                         <option value="19"
                          >Sipitang					</option>
                         <option value="37"
                          >Sook					</option>
                         <option value="14"
                          >Tambunan					</option>
                         <option value="33"
                          >Tamparuli					</option>
                         <option value="10"
                          >Tawau					</option>
                         <option value="30"
                          >Telupid					</option>
                         <option value="16"
                          >Tenom					</option>
                         <option value="31"
                          >Tongod					</option>
                         <option value="4"
                          >Tuaran					</option>

                    </select>

                   <label for="notelrumah">No. Telefon</label>
                    <input type="text" class="form-control" id="notel" name="notel" placeholder="No.Telefon">

                   <label for="notel">Handphone</label>
                    <input type="text" class="form-control" id="nohp" name="nohp" placeholder="Handphone">

              </div> <!-- /.form-group -->
            </div> <!-- /.box-body -->
            </div> <!-- /.box -->
              </div> <!--/.col (left) -->

          <!-- right column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="box box-primary">
              <div class="box-header with-border"><h3 class="box-title">MAKLUMAT LAIN </h3></div>
              <div class="form-group">
              <!-- /.box-header -->

                <div class="box-body">
                <label>No.Kad Petani</label>
                <div class="input-group date">
                <input name="nokad" type="text" class="form-control" id="nokad">
                </div>
                <label>Tahun Permohonan</label>
                <div class="input-group date">
                <input name="tahunpohon" type="text" class="form-control" id="tahunpohon" value=2023>
                </div>
                  <BR>

                  <!-- radio -->
                  <div class="form-group">
                  <label>Pendaftaran</label>
                    <div class="radio">
                      <label>
                        <input type="radio" name="rd_daftar" id="rd_daftar1" value=1 checked>
                        Baru
                     </label>
                    </div>
                    <div class="radio">
                      <label>
                        <input type="radio" name="rd_daftar" id="rd_daftar2" value=2>
                        Lama
                      </label>
                    </div>
                  </div>


                  <p></p>
                  <div class="form-group">
                  <P><label for="Pemohon">Musim Penanaman</label></P>

                  <!-- checkbox -->
                  <div class="form-group">
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" name="ch_musim" id="ch_musim" value=1>
                        Luar Musim (Bulan Mac - Julai)</input>
                      </label>
                    </div>

                    <div class="checkbox">
                      <label>
                        <input type="checkbox" name="ch_musim2" id="ch_musim2" value=1>
                        Musim Utama (Bulan Ogos - Feb)</input>
                      </label>
                    </div>
                </div>
      <label>Tarikh</label>
      <div class="input-group date">
      <input name="tarikh" type="text" class="form-control" id="tarikh"/>
          <span class="input-group-addon">
          <span class="glyphicon glyphicon-calendar"></span>
          </span>
      </div>

                <div class="box-footer">
                  <button type="submit" class="btn btn-primary" name="submit1" value="seterusnya">Simpan & Seterusnya</button>
                </div>
            </div> <!-- /.form-group -->
            </div> <!-- /.box-body -->
            </div> <!-- /.box -->
              </div> <!--/.col (right) -->
      </div> <!-- /.row -->
      </section>
    </form>
  </div>
  <footer class="main-footer"><b>Dibangunkan & Hakcipta Terpelihara</b><strong> &copy; 2020 <a href="http://www.jpkn.sabah.gov.my">JPKN</a>.</strong>
  </footer>
  </div><!--content wrapper-->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
</body>
</html>
