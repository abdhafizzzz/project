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

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="img/doalogo.gif" alt="ebajakLogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    {{-- <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul> --}}

    <!-- Right navbar links -->
    <ul class="nav ml-auto"> <!-- Add the "ml-auto" class here -->
        <li class="nav-item">
            <a class="nav-link" href="profail.php">Profail ERWATI</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="logout.php">Log Keluar</a>
        </li>
    </ul>
</nav>

{{-- </header>
</div> --}}
      {{-- <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div> --}}
            <!-- Message End -->
          {{-- </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div> --}}
            <!-- Message End -->
          {{-- </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div> --}}
            <!-- Message End -->
          {{-- </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item"> --}}
            {{-- <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li> --}}
      {{-- <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul> --}}
  {{-- </nav> --}}
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
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
            <a href="#" class="nav-link ">
              <i class="nav-icon fa fa-edit"></i>
              <p>
                PETANI
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('daftar') }}" class="nav-link">
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
    </section>    <!-- Main content -->
    <section class="content">
    <h3>Salam Sejahtera...</h3>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <center><h1>Klik untuk muat turun <a href="manual/manual_ebajak.pdf"  target="_blank">Manual eBajak</a></h1></center>

    </section>
    <!-- /.content -->
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
