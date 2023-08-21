@php
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Auth;

    // Get the logged-in user's nokp
$nokp = Auth::user()->nokp;

// Fetch data from 'petanibajak' table for the logged-in user
$petanibajak = DB::table('petanibajak')
    ->where('nokp', $nokp)
    ->first(); // Assuming you expect only one row for the logged-in user

// Get the current year
$currentYear = date('Y');

// Fetch data from 'tanah' table where 'nokppetani' matches the logged-in user's nokp and 'tarikh' year is the current year
    $tanah = DB::table('tanah')
        ->select('tanah.*', 'pemilikgeran', 'nogeran', 'luaspohon', 'bil', 'noakaun', 'stesen', 'pemilikan', 'tahunpohon')
        ->where('nokppetani', $nokp)
        ->whereYear('tarikh', $currentYear)
        ->latest('tarikh')
        ->get();

    // Get the last segment of the URL path, which should be the table_id
    $tableId = request()->segment(count(request()->segments()));

    // Debug: Output the value of $tableId
    // dd($tableId);

    // Find the specific item in $tanah where the table_id matches
    $specificItem = $tanah->where('table_id', $tableId)->first();
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
                                            name="nama" placeholder="Nama Pemohon" value="{{ Auth::user()->nama }}"
                                            readonly></td>

                                </tr>
                                <tr>
                                    <td>2. Kad Pengenalan</td>
                                    <td>:</td>
                                    <td><input type="text" class="form-control" id="nokp" name="nokp"
                                            placeholder="No.Kad Pengenalan" value="{{ Auth::user()->nokp }}" readonly></td>
                                </tr>
                                <tr>
                                    <td width="25%">No. Petani</td>
                                    <td width="5%">:</td>
                                    <td width="70%"><input type="text" class="form-control" id="user_id"
                                            name="user_id" placeholder="user_id" value="{{ $petanibajak->nopetani }}"
                                            readonly></td>
                                </tr>
                                <tr>
                                    <td>3. Alamat Perhubungan</td>
                                    <td>:</td>
                                    <td><input type="text" class="form-control" id="nokp" name="alamat"
                                            placeholder="alamat"
                                            value="{{ $petanibajak->alamat }} {{ $petanibajak->poskod }}" readonly></td>
                                </tr>
                                <tr>
                                    <td>4. Daerah</td>
                                    <td>:</td>
                                    <td><input type="text" class="form-control" id="daerah" name="daerah"
                                            placeholder="daerah" value="{{ $petanibajak->daerah }}" readonly></td>
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
                            <tr>
                                <td width="25%">Nama Pemilik Geran</td>
                                <td width="5%">:</td>
                                <td width="70%"><input type="text" class="form-control" id="nama" name="nama"
                                        placeholder="Nama Pemohon" value="{{ $specificItem->pemilikgeran }}" readonly></td>
                            </tr>
                            <tr>
                                <td width="25%">Pemilikan Geran</td>
                                <td width="5%">:</td>
                                <td width="70%">
                                    <input type="text" class="form-control" id="pemilikan" name="pemilikan"
                                        placeholder="Nama Pemohon"
                                        value="{{ DB::table('pemilikan')->where('kodmilik', $specificItem->pemilikan)->value('deskripsi') }}"
                                        readonly>
                                </td>

                            </tr>

                            <input type="text" class="form-control" id="bil" name="bil" placeholder="Bil"
                                value="{{ $specificItem->bil }}" hidden>


                            <tr>
                                <td width="25%">Jabatan</td>
                                <td width="5%">:</td>
                                <td width="70%"><input type="text" class="form-control" id="stesen" name="stesen"
                                        placeholder="Bil" value="{{ $specificItem->stesen }}" readonly></td>
                            </tr>

                            <tr>
                                <td>No. Geran</td>
                                <td>:</td>
                                <td><input type="text" class="form-control" id="nogeran" name="nogeran"
                                        placeholder="No. Geran" value="{{ $specificItem->nogeran }}" readonly></td>
                            </tr>
                            <tr>
                                <td>Luas Permohonan (Ekar)</td>
                                <td>:</td>
                                <td>
                                    <div class="input-group">
                                        <input type="text" name="luas" id="luas" class="form-control"
                                            value="{{ $specificItem->luaspohon }}" readonly>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Kampung</td>
                                <td>:</td>
                                <td>
                                    <input type="text" class="form-control" id="lokasi" name="lokasi"
                                        placeholder="lokasi"
                                        value="{{ DB::table('lokasitanah')->where('id', $specificItem->lokasi)->value('namalokasi') }}"
                                        readonly>
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
                        </table>
                    </div>

                    <!-- Maklumat Tuntutan -->
                    <div class="box box-primary">
                        <table width="100%" class="table table-bordered table-hover" id="bayaran">

                            <!-- flash message of success -->
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <form action="{{ route('tuntutan.store') }}" method="POST">
                                @csrf
                                <tr>
                                    <th colspan="3">Maklumat Tuntutan</th>
                                </tr>


                                <input type="hidden" class="form-control" name="table_id"
                                    value="{{ $specificItem->table_id }}" readonly>



                                <input type="hidden" class="form-control" name="luaspohon"
                                    value="{{ $specificItem->luaspohon }}" readonly>




                                <tr>
                                    <td>Siap Bajak</td>
                                    <td>:</td>
                                    <td>
                                        <select class="form-control" name="bulanbajak" id="bulanbajak">
                                            <option value="">Sila pilih...</option>
                                            <option value="1">Januari</option>
                                            <option value="2">Februari</option>
                                            <option value="3">Mac</option>
                                            <option value="4">April</option>
                                            <option value="5">Mei</option>
                                            <option value="6">Jun</option>
                                            <option value="7">Julai</option>
                                            <option value="8">Ogos</option>
                                            <option value="9">September</option>
                                            <option value="10">Oktober</option>
                                            <option value="11">November</option>
                                            <option value="12">Disember</option>
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Tuntutan (RM)</td>
                                    <td>:</td>
                                    <td>
                                        <div class="input-group">
                                            @php
                                                $bulanbajakValue = old('bulanbajak') ?? 0;
                                            @endphp

                                            <input type="text" name="amaunlulus" id="amaunlulus" class="form-control"
                                                style="display: none;">
                                            <input type="text" name="amaunlulus2" id="amaunlulus2"
                                                class="form-control" style="display: none;">
                                        </div>
                                    </td>
                                </tr>

                                <script>
                                    document.getElementById('bulanbajak').addEventListener('change', function() {
                                        var selectedValue = this.value;
                                        var amaunlulusField = document.getElementById('amaunlulus');
                                        var amaunlulus2Field = document.getElementById('amaunlulus2');

                                        if (selectedValue >= 3 && selectedValue <= 7) {
                                            amaunlulusField.style.display = 'block';
                                            amaunlulus2Field.style.display = 'none';
                                        } else {
                                            amaunlulusField.style.display = 'none';
                                            amaunlulus2Field.style.display = 'block';
                                        }
                                    });
                                </script>







                                <td>No Akaun Bank</td>
                                <td>:</td>
                                <td>
                                    <div class="input-group">
                                        <input type="number" name="noakaun" id="noakaun" class="form-control"
                                            value="{{ $petanibajak->lastnoakaun }}">
                                    </div>
                                </td>
                                </tr>
                                <tr>
                                    <td>Nama Bank</td>
                                    <td>:</td>
                                    <td>
                                        <select class="form-control" name="bank" id="bank"
                                            value="{{ $petanibajak->lastkodbank }}">
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
                                        <select class="form-control" name="bankcwgn" id="bankcwgn"
                                            value="{{ $petanibajak->lastcwgnbnk }}">
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
                                        <input type="date" class="form-control" id="tartuntut" name="tartuntut"
                                            value="{{ date('Y-m-d') }}" required>
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
