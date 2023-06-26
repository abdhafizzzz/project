
<!DOCTYPE html>
@extends('navigation')
@section('navigation')
<html>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Sistem Pembayaran Subsidi Pembajakan Sawah Padi
      <small>Modul Petani</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-dashboard"></i> Laman Utama</a></li>
    </ol>
  </section>
  <!-- Main content -->
  <form method="post" action="ptun_dafact.php" id="ptun_daf" name="ptun_daf">
    <section class="content">
      <br>
      <table id="carikon" class="table table-bordered table-hover text-center">
        <tr>
          <td>
            <!-- general form elements -->
            <div class="box box-primary">
              <div class="box-header with-border text-center">
                <h3 class="box-title">CARIAN UNTUK MENDAFTAR TUNTUTAN PETANI</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <form class="search-form">
                  <div class="input-group">
                    <input type="text" name="kppet" class="form-control" placeholder="No. Kad Pengenalan">
                  </div>
                  <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Tahun">
                    <div class="input-group-btn">
                      <button type="submit" name="submit1" class="btn btn-danger btn-flat">Cari <i class="fa fa-search"></i></button>
                    </div>
                  </div>
                  <div class="input-group">
                    <select class="form-control" name="musim">
                      <option value=1>Luar Musim</option>
                      <option value=2>Musim Utama</option>
                    </select>
                  </div>
                  <div class="input-group">
                    <select class="form-control" name="zon">
                      <option value=1>Zon 1</option>
                      <option value=2>Zon 2</option>
                    </select>
                  </div>
                </form>
              </div> <!-- /.box-body -->
            </div> <!-- /.box -->
          </td>
        </tr>
      </table>
    </section>
  </form>
</div>

</body>

</html>
@endsection

