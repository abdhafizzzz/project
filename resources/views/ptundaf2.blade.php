@php
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Auth;

// Get the logged-in user's nokp
$nokp = Auth::user()->nokp;

// Get the current year and the last year
$currentYear = date('Y');
$lastYear = $currentYear - 1;

// Fetch data from 'tanah' table where 'nokppetani' matches the logged-in user's nokp and 'tarikh' is between the current and last year
$tanah = DB::table('tanah')
    ->join('lokasitanah', 'tanah.lokasi', '=', 'lokasitanah.kodlokasi')
    ->where('tanah.nokppetani', $nokp)
    ->whereBetween(DB::raw('YEAR(tanah.tarikh)'), [$lastYear, $currentYear])
    ->first();

// Get the location name using the 'kodlokasi' from the 'lokasitanah' table
if ($tanah) {
    $locationName = $tanah->namalokasi;
} else {
    $locationName = ''; // Handle the case when no 'tanah' record is found
}
@endphp

@extends('navigation')
@section('navigation')
    <html>

    <head>
    </head>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

    <div class="back-button">
        <a href="{{ route('ptundaf') }}" class="btn btn-secondary" style="margin-top: 15px;margin-left: 15px;">Kembali</a>
    </div>
        <!-- Content Header (Page header) -->
        <section class="content-header">

        </section>

        <!-- Main content -->
        <form action="{{ route('ptundaf.edit', ['petanibajak_id' => Auth::user()->id]) }}" method="POST">
            @csrf
            <section class="content">


                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title"><b>TUNTUTAN SUBSIDI PEMBAJAKAN </b></h3>
                                </div>
                                <table id="tuntutan" class="table table-noborder table-hover">
                                    <tr>




                                            <td width="15%">1. Nama Pemohon</td>
                                            <td width="2%">:</td>
                                            <td width="83%"><input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Pemohon" value="{{ $userData && $userData->nama ? $userData->nama : Auth::user()->nama }}" readonly></td>

                                    </tr>
                                    <tr>

                                            <td>2. Kad Pengenalan</td>
                                            <td>:</td>
                                            <td><input type="text" class="form-control" id="nokp" name="nokp" placeholder="No.Kad Pengenalan" value="{{ $userData && $userData->nama ? $userData->nama : Auth::user()->nokp }}" readonly></td>
                                            <tr>
                                                <td width="17%">No. Pendaftaran</td>
                                                <td width="2%">:</td>
                                                <td width="81%"><input type="text" class="form-control" id="user_id" name="user_id" placeholder="user_id" value="{{ $userData && $userData->nama ? $userData->nama : Auth::user()->nopetani }}" readonly></td>
                                            </tr>


                                        <input type="hidden" name="pohonid" id="pohonid" class="form-control" value="{{ $userData && $userData->nama ? $userData->nama : Auth::user()->pohonid }}">
                                        </td>
                                    </tr>
                                    <tr>

                                        <td>3. Alamat Perhubungan</td>
                                        <td>:</td>
                                        <td><input type="text" class="form-control" id="nokp" name="alamat" placeholder="alamat" value="{{ $userData && $userData->nama ? $userData->nama : Auth::user()->alamat }}{{ $userData && $userData->nama ? $userData->nama : Auth::user()->poskod }}" readonly></td>
                                    </tr>
                                    <label for="daerah">Daerah :</label>
                                    <select class="form-control" name="daerah">
                                        <option value="">Sila pilih...</option>
                                        @foreach (DB::table('daerah')->get() as $daerah)
                                            <option value="{{ $daerah->koddaerah }}" {{ DB::table('petanibajak')->where('nokp', Auth::user()->nokp)->value('daerah') == $daerah->koddaerah ? 'selected' : '' }}>
                                                {{ $daerah->namadaerah }}
                                            </option>
                                        @endforeach
                                    </select><br>
                                </table>
                            </div>
                        </div>
                        <!--box primary-->
                        <div class="box box-primary">
                            <table width="96%" class="table table-noborder table-hover" id="details">
                                <label for="Pemohon">Musim Penanaman</label>
                                <tr>
                                    <td>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="musim" id="musim" value="1" {{ isset($userData->musim) && $userData->musim == 1 ? 'checked' : '' }}>
                                                Luar Musim (Bulan Mac - Julai)
                                            </label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="musim2" id="musim2" value="1" {{ isset($userData->musim2) && $userData->musim2 == 1 ? 'checked' : '' }}>
                                                Musim Utama (Bulan Ogos - Feb)
                                            </label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="stesen">Jabatan :</label></td>
                                    <td>
                                        <select class="form-control" name="stesen">
                                            <option value="">Sila pilih...</option>
                                            @foreach (DB::table('stesen')->get() as $stesen)
                                                <option value="{{ $stesen->stationcode }}" {{ DB::table('petanibajak')->where('nokp', Auth::user()->nokp)->value('stesen') == $stesen->stationcode ? 'selected' : '' }}>
                                                    {{ $stesen->stationdesc }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>



                                <tr>
                                    <td>No. Geran</td>
                                    <td>:</td>
                                    <td><input type="text" class="form-control" id="nogeran" name="nogeran" placeholder="No. Geran" value="{{ $userData && $userData->nama ? $userData->nama : Auth::user()->nogeran }}" readonly></td></td>
                                </tr>
                                <tr>
                                    <td>Luas Permohonan (Ekar)</td>
                                    <td>:</td>
                                    <td>
                                        <div class="input-group">
                                            <input type="text" name="luas" id="luas" class="form-control"
                                                value="{{ $userData && $userData->nama ? $userData->nama : Auth::user()->luaspohon }}" readonly>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Kampung</td>
                                    <td>:</td>
                                    <td>
                                        <input type="text" class="form-control" id="lokasi" name="lokasi" value="{{ $locationName }}" readonly>                                    </tr>
                                <tr>
                                    <td>Siap Bajak</td>
                                    <td>:</td>
                                    <td> <select class="form-control" name="bulan">
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

                                            <input type="text" name="tuntutan" id="tuntutan" class="form-control" value="{{ $tanah->luaspohon * 200 }}" >

                                    </td>
                                </tr>
                            </table>
                        </div>

                        <div class="box box-primary">
                            <table width="96%" class="table table-noborder table-hover" id="bayaran">
                                <tr>
                                    <td>No Akaun Bank</td>
                                    <td>:</td>
                                    <td>
                                        <div class="input-group">
                                            <input type="text" name="akaun" id="akaun" class="form-control" >
                                    </td>
                                </tr>
                                <tr>
                                    <td>Nama Bank</td>
                                    <td>:</td>
                                    <td> <select class="form-control" name="bank">
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
                                                <option value="{{ $daerah->koddaerah }}">{{ $daerah->namadaerah }}</option>
                                            @endforeach
                                        </select></td>
                                </tr>
                                <tr>

                                    <td>Tarikh Permohonan</td>
                                    <td>:</td>
                                    <td><input type="date" class="form-control" id="tarpohon" name="tarpohon" value="{{ $tarikhMemohon }}" ></td>
                                </tr>
                                <td>Tahun Pohon</td>
                                <td>:</td>
                                <td><input type="date" class="form-control" id="tahunpohon" name="tahunpohon" value="{{ date('Y') }}" ></td>
                            </tr>

                            </table>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary" name="submit1" value="daftar">Daftar Tuntutan </button>

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
