<!DOCTYPE html>
@extends('navigation')
@section('navigation')
<html>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">


  <!-- Left side column. contains the logo and sidebar -->
  <br>
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">



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
<form method="post" action="pet_smkact.php" name="pet_smk" id="pet_smk">
<section class="content">
<br>
<div class="center">
<br>
  <table id="carikon" class="table table-bordered table-hover">
    <div class="row" >
     <!-- left column -->
        <div class="col-md-12" >
          <!-- general form elements -->
          <div class="box box-primary"">
            <div class="box-header with-border">
                <h3 class="box-title" >CARIAN TAHUN UNTUK SEMAK PERMOHONAN PETANI</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <form class="search-form">
            <div class="input-group">
              <input type="text" name="search" class="form-control" placeholder="Tahun">
              <div class="input-group-btn">
                <button type="submit" name="submit1" class="btn btn-danger btn-flat">Cari <i class="fa fa-search"></i>
                </button>
              </div>
            </div>

           </form>
           </div> <!-- /.box-body -->
          </div> <!-- /.box -->
        </div><!--/.col (right) -->
    </div>
    <!-- /.row -->
  </table>
  </div>
  </section>
  </form>
</div>

</div><!-- /.content-wrapper -->
<!-- jQuery 3 -->

</body>
</html>
