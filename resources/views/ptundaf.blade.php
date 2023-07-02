<?php
// Retrieve all daftar records for the logged in user
$daftars = DB::select('SELECT * FROM daftar WHERE id = ?', [Auth::id()]);
?>
@extends('navigation')
@section('navigation')
    <html>

    <head>
    </head>




    <!-- Left side column. contains the logo and sidebar -->


    <!-- sidebar: style can be found in sidebar.less -->


    <!-- sidebar menu: : style can be found in sidebar.less -->

    <!-- /.sidebar -->


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Sistem Pembayaran Subsidi Pembajakan Sawah Padi
                {{-- <small>Modul Petani</small> --}}
            </h1>
            <ol class="breadcrumb">
                <li><a href="index.php"><i class="fa fa-dashboard"></i> Laman Utama</a></li>
            </ol>
        </section>

        <!-- Main content -->
        <form method="post" action="ptun_daf2act.php" id="ptun_daf2" name="ptun_daf2">
            <section class="content">


                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title"><b>A. TUNTUTAN SUBSIDI PEMBAJAKAN (LUAR MUSIM)</b></h3>
                                </div>
                                <table id="pemohon" class="table table-noborder table-hover">
                                    <tr>

                                        @foreach ($daftars as $daftar)
                                            <td width="15%">1. Nama Pemohon</td>
                                            <td width="2%">:</td>
                                            <td width="83%">{{ $daftar->pemohon }}</td>
                                        @endforeach
                                    </tr>
                                    <tr>
                                        @foreach ($daftars as $daftar)
                                            <td>2. Kad Pengenalan</td>
                                            <td>:</td>
                                            <td>{{ $daftar->nokp }}
                                        @endforeach
                                        <input type="hidden" name="tahun" id="tahun" class="form-control" value=2021>
                                        <input type="hidden" name="nokp" id="nokp" class="form-control"
                                            value=751027125135>
                                        <input type="hidden" name="musimini" id="musimini" class="form-control" value=1>
                                        <input type="hidden" name="pohonid" id="pohonid" class="form-control" value=2148>
                                        </td>
                                    </tr>
                                    <tr>
                                        @foreach ($daftars as $daftar)
                                            <td>3. Alamat Perhubungan</td>
                                            <td>:</td>
                                            <td>{{ $daftar->alamat }}</td>
                                        @endforeach
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <!--box primary-->
                        <div class="box box-primary">
                            <table width="96%" class="table table-noborder table-hover" id="details">
                                <tr>
                                    <td width="17%">No. Pendaftaran</td>
                                    <td width="2%">:</td>
                                    <td width="81%">TBN: A035</td>
                                </tr>
                                <tr>
                                    <td>Tarikh Permohonan</td>
                                    <td>:</td>
                                    <td>09/02/2021</td>
                                </tr>
                                <tr>
                                    <td>No. Geran</td>
                                    <td>:</td>
                                    <td>NT.14304306</td>
                                </tr>
                                <tr>
                                    <td>Luas Permohonan (Ekar)</td>
                                    <td>:</td>
                                    <td>
                                        <div class="input-group">
                                            <input type="text" name="luas" id="luas" class="form-control"
                                                value=1.83 onChange="return nilaiRM(this)">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Kampung</td>
                                    <td>:</td>
                                    <td>
                                        Kg. Nambayan</td>
                                </tr>
                                <tr>
                                    <td>Siap Bajak</td>
                                    <td>:</td>
                                    <td> <select class="form-control" name="daerah_id">
                                            <option value="">Sila pilih...</option>
                                            @foreach (DB::table('bulan')->get() as $bulan)
                                                <option value="{{ $bulan->kodbulan }}">{{ $bulan->bulan }}</option>
                                            @endforeach
                                        </select></td>
                                </tr>
                                <tr>
                                    <td>Tuntutan (RM)</td>
                                    <td>:</td>
                                    <td>
                                        <div class="input-group">

                                            <input type="text" name="tuntutan" id="tuntutan" class="form-control"
                                                value=366>
                                            <input type="hidden" name="subsidi" id="subsidi" class="form-control"
                                                value=200>
                                            <input type="hidden" name="bilnya" id="bilnya" class="form-control"
                                                value=1>
                                    </td>
                                </tr>
                            </table>
                        </div>

                        <div class="box box-primary">
                            <table width="96%" class="table table-noborder table-hover" id="bayaran">
                                <tr>
                                    <td width="17%">Nama Penerima</td>
                                    <td width="2%">:</td>
                                    <td width="81%">Abel Bin Duanis</td>
                                </tr>
                                <tr>
                                    <td>No.Kad Pengenalan</td>
                                    <td>:</td>
                                    <td>751027125135</td>
                                </tr>
                                <tr>
                                    <td>No Akaun Bank</td>
                                    <td>:</td>
                                    <td>
                                        <div class="input-group">
                                            <input type="text" name="akaun" id="akaun" class="form-control" value=>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Nama Bank</td>
                                    <td>:</td>
                                    <td> <select class="form-control" name="daerah_id">
                                            <option value="">Sila pilih...</option>
                                            @foreach (DB::table('bank')->get() as $bank)
                                                <option value="{{ $bank->kodbank }}">{{ $bank->namabank }}</option>
                                            @endforeach
                                        </select></td>
                                </tr>
                                <tr>
                                    <td>Cawangan Bank</td>
                                    <td>:</td>
                                    <td> <select class="form-control" name="daerah_id">
                                            <option value="">Sila pilih...</option>
                                            @foreach (DB::table('daerah')->get() as $daerah)
                                                <option value="{{ $daerah->id }}">{{ $daerah->name }}</option>
                                            @endforeach
                                        </select></td>
                                </tr>
                            </table>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary" name="submit1" value="daftar">Daftar Tuntutan &
                                Seterusnya</button>
                            <button onclick="window.close()" type="button" class="btn btn-primary" name="tutup"
                                id="tutup" value="Tutup">Tutup</button>
                            </button>
                        </div>
                    </div>
                    <!--box primary-->
                </div>
                <!--box-->
    </div>
    <!--col-xs-12-->
    </div>
    <!--row-->

    </section>
    </form>
    <!-- /.content -->

    </div>

    </body>

    </html>
@endsection
