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
    <a href="{{class('home')}}" class="brand-link">
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
    <form method="post" action="pet_bact.php" name="pet_b" id="pet_b">
        <input type="hidden" class="form-control" name="a_box" value=aa>
        <input type="hidden" class="form-control" name="t_box" value=2023>
        <input type="hidden" class="form-control" name="t1_box" value=>
        <input type="hidden" class="form-control" name="pid_box" value=2570>

        <!-- Main content -->
        <section class="content">
          <section class="content-header">
          <h1 style="color:red;text-align:center;background-color: powderblue;">
        Butir-butir pemohon berjaya disimpan!    </h1>
        </section>
        <section class="content">
            <section class="content-header">
          <h1>Senarai Tanah      </h1>
        </section>

          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title"></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th width="6%">Bil</th>
                      <th width="25%">Nama Pemilik<BR>Dalam Geran</th>
                      <th width="11%">No.Geran</th>
                      <th width="15%">Lokasi Tanah</th>
                      <th width="15%">Luas Dalam Geran<BR>(Ekar)</th>
                      <th width="12%">Luas Dipohon/<BR>Musim (Ekar)</th>
                      <th width="11%">Pemilikan Tanah</th>
                      <th width="11%">Tindakan</th>
                    </tr>
                    </thead>
                    <tbody>
                                  </tbody>
                    <tfoot>
                    <tr>
                      <th>-</th>
                      <th><input type="text" class="form-control" placeholder="Nama Pemilik" name="pemilik"></th>
                      <th><input type="text" class="form-control" placeholder="No.Geran" name="nogeran"></th>
                      <th><select class="form-select"  name="lokasi">
                                          <option value="0">Sila Pilih...</option>
                                                        <option value="34">
                                       Kg. Babagon/Mahua                              </option>
                                                        <option value="62">
                                       Kg. Baru                              </option>
                                                        <option value="28">
                                       Kg. Botung                              </option>
                                                        <option value="44">
                                       Kg. Bundu Apin-Apin                              </option>
                                                        <option value="11">
                                       Kg. Daar                              </option>
                                                        <option value="15">
                                       Kg. Dalungan/Kotonobon                              </option>
                                                        <option value="47">
                                       Kg. Garas/Libang                              </option>
                                                        <option value="2">
                                       Kg. Kapayan                              </option>
                                                        <option value="19">
                                       Kg. Keranaan                              </option>
                                                        <option value="58">
                                       Kg. Kiawayan                              </option>
                                                        <option value="5">
                                       Kg. Kipaku                              </option>
                                                        <option value="39">
                                       Kg. Kirokot                              </option>
                                                        <option value="29">
                                       Kg. Kituntul                              </option>
                                                        <option value="57">
                                       Kg. Kolombuong/Kiporing/Sintuong Tuong                              </option>
                                                        <option value="65">
                                       Kg. Kolombuong/Sintuong Tuong                              </option>
                                                        <option value="64">
                                       Kg. Kuala Namadan                              </option>
                                                        <option value="41">
                                       Kg. Kumawanan                              </option>
                                                        <option value="63">
                                       Kg. Kuyungon                              </option>
                                                        <option value="50">
                                       Kg. Libang                              </option>
                                                        <option value="51">
                                       Kg. Libang Laut                              </option>
                                                        <option value="13">
                                       Kg. Lintuhun                              </option>
                                                        <option value="43">
                                       Kg. Lotong/Kitou                              </option>
                                                        <option value="10">
                                       Kg. Lubong                              </option>
                                                        <option value="31">
                                       Kg. Lumondou                              </option>
                                                        <option value="38">
                                       Kg. Makatip                              </option>
                                                        <option value="25">
                                       Kg. Mangi Pangi                              </option>
                                                        <option value="8">
                                       Kg. Mangkatai                              </option>
                                                        <option value="32">
                                       Kg. Maras Karas                              </option>
                                                        <option value="27">
                                       Kg. Minodung                              </option>
                                                        <option value="14">
                                       Kg. Mogong                              </option>
                                                        <option value="9">
                                       Kg. Moloson/Solibog                              </option>
                                                        <option value="54">
                                       Kg. Molout                              </option>
                                                        <option value="33">
                                       Kg. Namadan/Bambangan                              </option>
                                                        <option value="53">
                                       Kg. Nambayan                              </option>
                                                        <option value="24">
                                       Kg. Nouduh                              </option>
                                                        <option value="48">
                                       Kg. Nukakatan                              </option>
                                                        <option value="40">
                                       Kg. Pahu                              </option>
                                                        <option value="3">
                                       Kg. Pantai                              </option>
                                                        <option value="16">
                                       Kg. Papar                              </option>
                                                        <option value="36">
                                       Kg. Patau                              </option>
                                                        <option value="35">
                                       Kg. Pegalan Kusob/ Rugading                              </option>
                                                        <option value="21">
                                       Kg. Piasau                              </option>
                                                        <option value="17">
                                       Kg. Pomotodon                              </option>
                                                        <option value="7">
                                       Kg. Pupuluton                              </option>
                                                        <option value="46">
                                       Kg. Rompon                              </option>
                                                        <option value="66">
                                       Kg. Sandapak                              </option>
                                                        <option value="37">
                                       Kg. Sinungkalangan                              </option>
                                                        <option value="61">
                                       Kg. Solibog                              </option>
                                                        <option value="23">
                                       Kg. Sukung/Lotud                              </option>
                                                        <option value="60">
                                       Kg. Sungoi                              </option>
                                                        <option value="1">
                                       Kg. Sunsuron                              </option>
                                                        <option value="55">
                                       Kg. Tampasak Liwan                              </option>
                                                        <option value="59">
                                       Kg. Tanaki                              </option>
                                                        <option value="12">
                                       Kg. Tebilong                              </option>
                                                        <option value="26">
                                       Kg. Tibabar                              </option>
                                                        <option value="42">
                                       Kg. Tikolod                              </option>
                                                        <option value="22">
                                       Kg. Timbou                              </option>
                                                        <option value="30">
                                       Kg. Tinompok                              </option>
                                                        <option value="56">
                                       Kg. Tinompok Liwan                              </option>
                                                        <option value="20">
                                       Kg. Toboh                              </option>
                                                        <option value="6">
                                       Kg. Tombotuon                              </option>
                                                        <option value="18">
                                       Kg. Tondulu                              </option>
                                                        <option value="4">
                                       Kg. Tontolob                              </option>
                                                        <option value="49">
                                       Kg. Tontolob Liwan                              </option>
                                                        <option value="45">
                                       Kg. Ulu Monsok                              </option>
                                                        <option value="52">
                                       Kg. Ulu Pegalan                              </option>
                                            </select></th>
                      <th><input type="text" class="form-control" placeholder="Luas Geran" name="luasgeran"></th>
                      <th><input type="text" class="form-control" placeholder="Luas Dipohon" name="luaspohon"></th>
                      <th><select class="form-select"  name="pemilikan">
                                          <option value="0">Sila Pilih...</option>
                                                        <option value="1">
                                       Sendiri                              </option>
                                                        <option value="2">
                                       Sewa                              </option>
                                                        <option value="3">
                                       Tuntut Waris                              </option>
                                            </select></th>
                      <th><button type="submit" class="btn btn-primary" name="submit1" id="submit1" value="Simpan"><img src="images/addnew1.png" alt="Tambah Rekod" width="20" height="20" class="img-square"></button></th>
                    </tr>
                    <tr>
                      <th width="6%"></th>
                      <th width="25%">JUMLAH</th>
                      <th width="11%"></th>
                      <th width="15%"></th>
                      <th width="15%"><input type="text" class="form-control" placeholder="Luas Geran" name="jumlahluasgeran" value=0></th>
                      <th width="12%"><input type="text" class="form-control" placeholder="Luas DiPohon" name="jumlahluaspohon" value=0></th>
                      <th width="11%"></th>
                      <th width="11%"></th>
                    </tr>
                    </tfoot>
                  </table>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
          <div class="box-footer" style="text-align:center;">
          <button type="submit" class="btn btn-primary" name="submit1" id="submit1" value="SimpanJumlah">Simpan</button>
          <button  onclick="location.href='pet.php'" type="button" class="btn btn-primary"name="selesai" value="Selesai" >Daftar Petani Baharu</button>
          <button  onclick="window.open('pet_cetak.php?a=aa&t=2023')" type="button" class="btn btn-primary" name="cetakp" value="Cetakp" >Cetak PP13.1</button>
          <button  onclick="window.open('pet_kad.php?a=aa&t=2023')" type="button" class="btn btn-primary" name="cetakk" value="Cetakk" >Cetak Kad Petani</button>
          </button>
                  </div>

        </section>
        <!-- /.content -->
    </form>

    <!-- Update Kawasan Modal Form -->
    <div id="id01" class="modal">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div id="headerbox">
                      <a href="#" class="closebtn">×</a>
                      <h4><i class="fa fa-edit"></i> Kemaskini Tanah</h4>
                    </div>
                    <div class="container">
                    <div class="col-md-12">
                            <div class="card card-user">
                              <div class="card-body">

                    <form id="tanah_ed" name="tanah_ed" method="POST" action="tanah_edact.php">
                      <div class="row">
                        <div class="col-md-10">
                          <div class="form-group">
                            <label>Pemilik Geran</label>
                            <input type="text" name="pemilik" class="form-control font-capitalize" value="">
                            <input type="hidden" name="bil" class="form-control font-capitalize" value="">
                            <input type="hidden" name="pohonid" class="form-control font-capitalize" value="2570">
                            <input type="hidden" name="idpet" class="form-control font-capitalize" value="aa">
                            <input type="hidden" name="tahun" class="form-control font-capitalize" value="2023">

                            <label>No. Geran</label>
                            <input type="text" name="nogeran" class="form-control font-capitalize" value="">
                            <label>Lokasi Tanah</label>
                            <select class="form-select"  name="lokasi">
                                                              <option value="0">Sila Pilih...</option>
                                                                  <option value="34"
                                    >Kg. Babagon/Mahua					                      </option>

                                                                  <option value="62"
                                    >Kg. Baru					                      </option>

                                                                  <option value="28"
                                    >Kg. Botung					                      </option>

                                                                  <option value="44"
                                    >Kg. Bundu Apin-Apin					                      </option>

                                                                  <option value="11"
                                    >Kg. Daar					                      </option>

                                                                  <option value="15"
                                    >Kg. Dalungan/Kotonobon					                      </option>

                                                                  <option value="47"
                                    >Kg. Garas/Libang					                      </option>

                                                                  <option value="2"
                                    >Kg. Kapayan					                      </option>

                                                                  <option value="19"
                                    >Kg. Keranaan					                      </option>

                                                                  <option value="58"
                                    >Kg. Kiawayan					                      </option>

                                                                  <option value="5"
                                    >Kg. Kipaku					                      </option>

                                                                  <option value="39"
                                    >Kg. Kirokot					                      </option>

                                                                  <option value="29"
                                    >Kg. Kituntul					                      </option>

                                                                  <option value="57"
                                    >Kg. Kolombuong/Kiporing/Sintuong Tuong					                      </option>

                                                                  <option value="65"
                                    >Kg. Kolombuong/Sintuong Tuong					                      </option>

                                                                  <option value="64"
                                    >Kg. Kuala Namadan					                      </option>

                                                                  <option value="41"
                                    >Kg. Kumawanan					                      </option>

                                                                  <option value="63"
                                    >Kg. Kuyungon					                      </option>

                                                                  <option value="50"
                                    >Kg. Libang					                      </option>

                                                                  <option value="51"
                                    >Kg. Libang Laut					                      </option>

                                                                  <option value="13"
                                    >Kg. Lintuhun					                      </option>

                                                                  <option value="43"
                                    >Kg. Lotong/Kitou					                      </option>

                                                                  <option value="10"
                                    >Kg. Lubong					                      </option>

                                                                  <option value="31"
                                    >Kg. Lumondou					                      </option>

                                                                  <option value="38"
                                    >Kg. Makatip					                      </option>

                                                                  <option value="25"
                                    >Kg. Mangi Pangi					                      </option>

                                                                  <option value="8"
                                    >Kg. Mangkatai					                      </option>

                                                                  <option value="32"
                                    >Kg. Maras Karas					                      </option>

                                                                  <option value="27"
                                    >Kg. Minodung					                      </option>

                                                                  <option value="14"
                                    >Kg. Mogong					                      </option>

                                                                  <option value="9"
                                    >Kg. Moloson/Solibog					                      </option>

                                                                  <option value="54"
                                    >Kg. Molout					                      </option>

                                                                  <option value="33"
                                    >Kg. Namadan/Bambangan					                      </option>

                                                                  <option value="53"
                                    >Kg. Nambayan					                      </option>

                                                                  <option value="24"
                                    >Kg. Nouduh					                      </option>

                                                                  <option value="48"
                                    >Kg. Nukakatan					                      </option>

                                                                  <option value="40"
                                    >Kg. Pahu					                      </option>

                                                                  <option value="3"
                                    >Kg. Pantai					                      </option>

                                                                  <option value="16"
                                    >Kg. Papar					                      </option>

                                                                  <option value="36"
                                    >Kg. Patau					                      </option>

                                                                  <option value="35"
                                    >Kg. Pegalan Kusob/ Rugading					                      </option>

                                                                  <option value="21"
                                    >Kg. Piasau					                      </option>

                                                                  <option value="17"
                                    >Kg. Pomotodon					                      </option>

                                                                  <option value="7"
                                    >Kg. Pupuluton					                      </option>

                                                                  <option value="46"
                                    >Kg. Rompon					                      </option>

                                                                  <option value="66"
                                    >Kg. Sandapak					                      </option>

                                                                  <option value="37"
                                    >Kg. Sinungkalangan					                      </option>

                                                                  <option value="61"
                                    >Kg. Solibog					                      </option>

                                                                  <option value="23"
                                    >Kg. Sukung/Lotud					                      </option>

                                                                  <option value="60"
                                    >Kg. Sungoi					                      </option>

                                                                  <option value="1"
                                    >Kg. Sunsuron					                      </option>

                                                                  <option value="55"
                                    >Kg. Tampasak Liwan					                      </option>

                                                                  <option value="59"
                                    >Kg. Tanaki					                      </option>

                                                                  <option value="12"
                                    >Kg. Tebilong					                      </option>

                                                                  <option value="26"
                                    >Kg. Tibabar					                      </option>

                                                                  <option value="42"
                                    >Kg. Tikolod					                      </option>

                                                                  <option value="22"
                                    >Kg. Timbou					                      </option>

                                                                  <option value="30"
                                    >Kg. Tinompok					                      </option>

                                                                  <option value="56"
                                    >Kg. Tinompok Liwan					                      </option>

                                                                  <option value="20"
                                    >Kg. Toboh					                      </option>

                                                                  <option value="6"
                                    >Kg. Tombotuon					                      </option>

                                                                  <option value="18"
                                    >Kg. Tondulu					                      </option>

                                                                  <option value="4"
                                    >Kg. Tontolob					                      </option>

                                                                  <option value="49"
                                    >Kg. Tontolob Liwan					                      </option>

                                                                  <option value="45"
                                    >Kg. Ulu Monsok					                      </option>

                                                                  <option value="52"
                                    >Kg. Ulu Pegalan					                      </option>

                                                                </select>
                            <label>Luas Dalam Geran (Ekar)</label>
                            <input type="text" name="luasekar" class="form-control font-capitalize" value="">
                            <label>Luas Dipohon/Musim (Ekar)</label>
                            <input type="text" name="luaspohon" class="form-control font-capitalize" value="">
                            <label>Pemilikan Tanah</label>
                            <select class="form-select"  name="pemilikan">
                                                              <option value="0">Sila Pilih...</option>
                                                                  <option value="1"
                                    >Sendiri					                      </option>

                                                                  <option value="2"
                                    >Sewa					                      </option>

                                                                  <option value="3"
                                    >Tuntut Waris					                      </option>

                                                                </select>

                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-4">
                            <button type="submit" name="submit1" class="btn btn-success btn-round" id="submit1" value="update"><i class="fa fa-pencil"></i> Kemaskini</button>
                        </div>
                      </div>
                    </form>
                              </div>
                            </div>
                       </div>
                    </div>
                  </div>
                </div>
              </div>
             <!-- Update Users Closed -->

    </div>
    <footer class="main-footer"><b>Dibangunkan & Hakcipta Terpelihara</b><strong> &copy; 2020 <a href="http://www.jpkn.sabah.gov.my">JPKN</a>.</strong>
    </footer>
    </div><!-- /.content-wrapper -->

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
