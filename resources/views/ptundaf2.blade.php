@php
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Auth;

    $selectedRow = request('selectedRow');

    // Get the logged-in user's nokp
    $nokp = Auth::user()->nokp;

    // Fetch data from 'petanibajak' table for the logged-in user
    $petanibajak = DB::table('petanibajak')
        ->where('nokp', $nokp, 'desc')
        ->first(); // Assuming you expect only one row for the logged-in user

    // Get the current year
    $currentYear = date('Y');

    // // Fetch latest data from 'tanah' table where 'nokppetani' matches the logged-in user's nokp and 'tarikh' year is the current year
    // $tanah = DB::table('tanah')
    //     ->select('tanah.*', 'pemilikgeran', 'nogeran', 'luaspohon', 'bil')
    //     ->where('bil', $selectedRow)
    //     ->whereYear('tarikh', $currentYear)
    //     ->latest('tarikh')
    //     ->get();

        // Fetch latest data from 'tanah' table where 'nokppetani' matches the logged-in user's nokp and 'tarikh' year is the current year and 'bil' matches the selectedRow value
        $tanah = DB::table('tanah')
            ->select('tanah.*', 'pemilikgeran', 'nogeran', 'luaspohon', 'bil')
            ->where('nokppetani', $nokp)
            ->whereYear('tarikh', $currentYear)
            ->where('bil', $selectedRow)
            ->latest('tarikh')
            ->get();


    // Define the $tarikhMemohon variable inside the @php block (assuming it's the current date)
    $tarikhMemohon = date('Y-m-d');

    // Initialize arrays to store the data for the iterations
    $locationNames = [];
    $nogerans = [];

    // Iterate through the $tanah collection to access each row's properties
    foreach ($tanah as $item) {
        $locationNames[] = $item->lokasi;
        $nogerans[] = $item->nogeran;
    }
@endphp



@extends('navigation')
@section('navigation')
    <html>

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
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

            <section class="content container-fluid">

                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title"><b>TUNTUTAN SUBSIDI PEMBAJAKAN </b></h3>
                                </div>
                                <table id="tuntutan" class="table table-bordered table-hover">

                                    <tr>
                                        <td width="25%">1. Nama Pemohon</td>
                                        <td width="5%">:</td>
                                        <td width="70%"><input type="text" class="form-control" id="nama"
                                                name="nama" placeholder="Nama Pemohon"
                                                value="{{Auth::user()->nama }}"
                                                readonly></td>

                                    </tr>
                                    <tr>
                                        <td>2. Kad Pengenalan</td>
                                        <td>:</td>
                                        <td><input type="text" class="form-control" id="nokp" name="nokp"
                                                placeholder="No.Kad Pengenalan"
                                                value="{{ Auth::user()->nokp }}"
                                                readonly></td>
                                    </tr>
                                    <tr>
                                        <td width="25%">No. Petani</td>
                                        <td width="5%">:</td>
                                        <td width="70%"><input type="text" class="form-control" id="user_id"
                                                name="user_id" placeholder="user_id"
                                                value="{{ $petanibajak->nopetani }}"
                                                readonly></td>
                                    </tr>
                                    <tr>
                                        <td>3. Alamat Perhubungan</td>
                                        <td>:</td>
                                        <td><input type="text" class="form-control" id="nokp" name="alamat"
                                                placeholder="alamat"
                                                value="{{ $petanibajak->alamat }} {{ $petanibajak->poskod }}"
                                                readonly></td>
                                    </tr>
                                    <tr>
                                        <td>4. Daerah</td>
                                        <td>:</td>
                                        <td><input type="text" class="form-control" id="daerah" name="daerah"
                                                placeholder="daerah"
                                                value="{{ $petanibajak->daerah }}"
                                                readonly></td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <!-- Maklumat Geran -->
<div class="box box-primary">
    <table width="100%" class="table table-bordered table-hover" id="geran">
        <tr>
            <th colspan="3">Maklumat Geran</th>
        </tr>
        @if($tanah)
            @php
                $specificItem = $tanah->first(); // Get the first item from the collection
            @endphp
            <tr>
                <td width="25%">Nama Pemilik Geran</td>
                <td width="5%">:</td>
                <td width="70%"><input type="text" class="form-control" id="nama" name="nama"
                        placeholder="Nama Pemohon"
                        value="{{ $specificItem->pemilikgeran }}"
                        readonly></td>
            </tr>
            <tr>
                <td width="25%">Bil Geran</td>
                <td width="5%">:</td>
                <td width="70%"><input type="text" class="form-control" id="bil" name="bil"
                        placeholder="Bil"
                        value="{{ $specificItem->bil }}"
                        readonly></td>
            </tr>
            <tr>
                <td width="25%">Jabatan</td>
                <td width="5%">:</td>
                <td width="70%"><input type="text" class="form-control" id="stesen" name="stesen"
                        placeholder="Bil"
                        value="{{ $specificItem->stesen }}"
                        readonly></td>
            </tr>

            <tr>
                <td>No. Geran</td>
                <td>:</td>
                <td><input type="text" class="form-control" id="nogeran" name="nogeran"
                        placeholder="No. Geran" value="{{ $specificItem->nogeran }}"
                        readonly></td>
            </tr>
            <tr>
                <td>Luas Permohonan (Ekar)</td>
                <td>:</td>
                <td>
                    <div class="input-group">
                        <input type="text" name="luas" id="luas" class="form-control"
                            value="{{ $specificItem->luaspohon }}"
                            readonly>
                    </div>
                </td>
            </tr>
            <tr>
                <td>Kampung</td>
                <td>:</td>
                <td>
                    <input type="text" class="form-control" id="lokasi" name="lokasi"
                        value="{{ $specificItem->lokasi }}" readonly>
                </td>
            </tr>
            <tr>
                <td>Tahun Pohon</td>
                <td>:</td>
                <td>
                    <input type="text" class="form-control" id="tahunpohon" name="tahunpohon"
                        value="{{ $specificItem->tahunpohon }}" readonly>
                </td>
            </tr>
        @endif
    </table>
</div>

                        <!-- Maklumat Tuntutan -->
                        <div class="box box-primary">
                            <table width="100%" class="table table-bordered table-hover" id="bayaran">
                                <form action="{{ route('tuntutan.store',[$item->table_id]) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="table_id" value="{{ $item->table_id }}">
                                    <tr>
                                    <th colspan="3">Maklumat Tuntutan</th>
                                </tr>
                                <tr>
                                    <td>Siap Bajak</td>
                                    <td>:</td>
                                    <td>
                                        <select class="form-control" name="bulan">
                                            <option value="">Sila pilih...</option>
                                            @foreach (DB::table('bulan')->get() as $bulan)
                                                <option value="{{ $bulan->kodbulan }}">{{ $bulan->bulan }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tuntutan (RM)</td>
                                    <td>:</td>
                                    <td>
                                        <div class="input-group">
                                            <input type="text" name="tuntutan" id="tuntutan" class="form-control"
                                                value="{{ $item->luaspohon * 200 }}" >
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>No Akaun Bank</td>
                                    <td>:</td>
                                    <td>
                                        <div class="input-group">
                                            <input type="text" name="akaun" id="akaun" class="form-control">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Nama Bank</td>
                                    <td>:</td>
                                    <td>
                                        <select class="form-control" name="bank">
                                            <option value="">Sila pilih...</option>
                                            @foreach (DB::table('bank')->get() as $bank)
                                                <option value="{{ $bank->kodbank }}">{{ $bank->namabank }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Cawangan Bank</td>
                                    <td>:</td>
                                    <td>
                                        <select class="form-control" name="daerah_id">
                                            <option value="">Sila pilih...</option>
                                            @foreach (DB::table('daerah')->get() as $daerah)
                                                <option value="{{ $daerah->koddaerah }}">{{ $daerah->namadaerah }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tarikh Permohonan</td>
                                    <td>:</td>
                                    <td>
                                        <input type="date" class="form-control" id="tarpohon" name="tarpohon"
                                            required>
                                    </td>
                                </tr>
                            </table>
                        </div>

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary" name="submit" value="submit">Kemaskini
                                Tuntutan</button>
                        </div>
                    </div>
                </div>
            </section>
        </form>
    </div>
    <!-- /.content -->
    </div>
    </body>

    </html>
@endsection
