@php
    use Illuminate\Support\Facades\DB;
    $userData = DB::table('daftar')->where('user_id', Auth::user()->id)->first();
@endphp

@extends('navigation')

@section('navigation')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Sistem Pembayaran Subsidi Pembajakan Sawah Padi
            {{-- <small>Modul Pegawai Pertanian</small> --}}
        </h1>
        <ol class="breadcrumb">
            <li><a href="home"><i class="fa fa-dashboard"></i> Laman Utama</a></li>
        </ol>
        </section>

        <!-- flash message of success -->
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

    <!-- Main content -->
    {{-- <form method="post" action="{{ route('store') }}" id="pet" name="pet"> --}}
        <form action="{{ route('daftar.update') }}" method="POST">
        @csrf
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
                    <input type="text" class="form-control" id="pemohon" name="pemohon" placeholder="Nama Pemohon" value="{{ Auth::user()->name }}" readonly>

                    <label for="pendaftaran">No.Kad Pengenalan</label>
                    <input type="text" class="form-control" id="nokp" name="nokp" placeholder="No.Kad Pengenalan" value="{{ Auth::user()->kad_pengenalan }}" readonly>

                    <!-- textarea -->
                    <label>Alamat</label>
                    <textarea class="form-control" rows="3" placeholder="Alamat ..." name="alamat">{{ DB::table('daftar')->where('user_id', Auth::user()->id)->value('alamat') }}</textarea>



                    <label for="poskod">Poskod</label>  
                    <input type="text" class="form-control" id="poskod" name="poskod" placeholder="Poskod" value="{{ DB::table('daftar')->where('user_id', Auth::user()->id)->value('poskod') }}">

                    <!-- select daerah-->
                    <label for="daerah">Daerah</label>
                    <select class="form-control" name="daerah_id">
                        <option value="">Sila pilih...</option>
                        @foreach (DB::table('daerah')->get() as $daerah)
                            <option value="{{ $daerah->koddaerah }}" {{ DB::table('daftar')->where('user_id', Auth::user()->id)->value('daerah_id') == $daerah->koddaerah ? 'selected' : '' }}>
                                {{ $daerah->namadaerah }}
                            </option>
                        @endforeach
                    </select>

                    <label for="notelrumah">No. Telefon</label>
                    <input type="text" class="form-control" id="notel" name="notel" placeholder="No.Telefon" value="{{ DB::table('daftar')->where('user_id', Auth::user()->id)->value('notel') }}">

                    <label for="notel">Handphone</label>
                    <input type="text" class="form-control" id="nohp" name="nohp" placeholder="Handphone" value="{{ DB::table('daftar')->where('user_id', Auth::user()->id)->value('nohp') }}">

            </div> <!-- /.form-group -->
            </div> <!-- /.box-body -->
            </div> <!-- /.box -->
            </div> <!--/.col (left) -->

            <!-- right column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">MAKLUMAT LAIN</h3>
                    </div>
                    <div class="form-group">
                        <!-- /.box-header -->
                        <div class="box-body">
                            <label>No.Kad Petani</label>
                            <div class="input-group date">
                                <input type="text" class="form-control" placeholder="No. Kad Petani ATAU No. Kad Pengenalan" name="nokad" id="nokad" value="{{ DB::table('daftar')->where('user_id', Auth::user()->id)->value('nokad') }}">
                            </div>
                            <label>Tahun Permohonan</label>
                            <div class="input-group date">
                                <input name="tahunpohon" type="text" class="form-control" id="tahunpohon" value="{{ date('Y') }}">
                            </div>
                            <br>

                <!-- radio -->
                <div class="form-group">
                    <label>Pendaftaran</label>
                    <div class="radio">
                        <label>
                            <input type="radio" name="rd_daftar" id="rd_daftar1" value=1 {{ DB::table('daftar')->where('user_id', Auth::user()->id)->value('rd_daftar') == 1 ? 'checked' : '' }}>
                            Baru
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="rd_daftar" id="rd_daftar2" value=2 {{ DB::table('daftar')->where('user_id', Auth::user()->id)->value('rd_daftar') == 2 ? 'checked' : '' }}>
                            Lama
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="Pemohon">Musim Penanaman</label>
                    <!-- checkbox -->
                    <div class="form-group">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="ch_musim" id="ch_musim" value="1" {{ isset($userData->ch_musim) && $userData->ch_musim == 1 ? 'checked' : '' }}>
                                Luar Musim (Bulan Mac - Julai)
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="ch_musim2" id="ch_musim2" value="1" {{ isset($userData->ch_musim2) && $userData->ch_musim2 == 1 ? 'checked' : '' }}>
                                Musim Utama (Bulan Ogos - Feb)
                            </label>
                        </div>
                    </div>
                </div>

                <label for="tarikh" style="margin-bottom: 6px">Tarikh</label>
                <div class="form-group">
                    <label for="tarikh">Tarikh</label>
                    <input type="date" name="tarikh" id="tarikh" class="form-control" value="{{ $userData && $userData->tarikh ? $userData->tarikh : '' }}">
                </div>

                <div class="box-footer">
                    {{-- <button type="submit" style="margin-top:1rem" class="btn btn-primary" name="submit1" value="seterusnya">Simpan & Seterusnya</button> --}}
                    <button type="submit" style="margin-top:2rem" class="btn btn-primary">Simpan</button>
                </div>
                </div> <!-- /.form-group -->
                </div> <!-- /.box-body -->
                </div> <!-- /.box -->
                </div> <!--/.col (right) -->
                </div> <!-- /.row -->
                </section>
                </form>

</div>
</div><!--content wrapper-->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
{{-- <script src="plugins/jquery/jquery.min.js"></script> , after commented this, logout dropout working herm--}}
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
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->

<script src="dist/js/pages/dashboard.js"></script>
@endsection
