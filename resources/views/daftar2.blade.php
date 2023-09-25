@php
    use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

// Get the logged-in user's nokp
$nokp = Auth::user()->nokp;

// Fetch data from 'petanibajak' table for the logged-in user
$petanibajak = DB::table('petanibajak')
    ->where('nokp', $nokp)
    ->first(); // Assuming you expect only one row for the logged-in user

// If $petanibajak is null, create an empty object to avoid errors in Blade
if (!$petanibajak) {
    $petanibajak = new stdClass();
    $petanibajak->lastkodbank = null;
    $petanibajak->lastnoakaun = null;
    $petanibajak->lastcwgnbnk = null;
    // Add other properties with default values as needed
}

// Fetch data from 'tanah' table where 'nokppetani' matches the logged-in user's nokp and 'tarikh' year is the current year
$tanah = DB::table('tanah')
    ->where('nokppetani', $nokp)
    ->first();

// ...

@endphp


@extends('navigation')
@section('navigation')

<div class="content-wrapper">
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Butiran Akaun</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .btn-info a {
            color: #ffffff; /* Set the color to white */
            text-decoration: none; /* Remove the underline */
        }
    </style>
</head>

<body>

<div class="container mt-4">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row">
        <div class="col-md-8;">
            <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Maklumat Pembayaran</h4>

                        <form class="forms-sample" method="post" action="{{ route('tuntutan.store') }}" enctype="multipart/form-data">
                            @csrf

                            <!-- Form fields go here -->
                            <table class="table table-bordered table-hover">
                                <tr>
                                    <th class="d-table-cell d-sm-none" colspan="3">Butiran Maklumat Bank</th>
                                    <th class="d-none d-sm-table-cell" colspan="3">Butiran</th>
                                </tr>
                                <tr>
                                    <td class="col-xs-12 col-sm-4">Nama Pemohon</td>
                                    <td class="col-xs-12 col-sm-1">:</td>
                                    <td class="col-xs-12 col-sm-7">
                                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Pemohon" value="{{ Auth::user()->nama }}" readonly>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-xs-12 col-sm-4">No.Kad Pengenalan</td>
                                    <td class="col-xs-12 col-sm-1">:</td>
                                    <td class="col-xs-12 col-sm-7">
                                        <input type="text" class="form-control" id="nokp" name="nokp" placeholder="No.Kad Pengenalan" value="{{ Auth::user()->nokp }}" readonly>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-xs-12 col-sm-4">No Akaun Bank</td>
                                    <td class="col-xs-12 col-sm-1">:</td>
                                    <td class="col-xs-12 col-sm-7">
                                        <div class="input-group">
                                            <input type="number" name="noakaun" id="noakaun" class="form-control" value="{{ isset($petanibajak) ? $petanibajak->lastnoakaun : '' }}">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-xs-12 col-sm-4">Nama Bank</td>
                                    <td class="col-xs-12 col-sm-1">:</td>
                                    <td class="col-xs-12 col-sm-7">
                                        <select class="form-control" name="bank" id="bank">
                                            <option value="">Sila pilih...</option>
                                            @foreach (DB::table('bank')->get() as $bank)
                                                <option value="{{ $bank->kodbank }}" {{ $petanibajak && $petanibajak->lastkodbank == $bank->kodbank ? 'selected' : '' }}>{{ $bank->namabank }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-xs-12 col-sm-4">Cawangan Bank</td>
                                    <td class="col-xs-12 col-sm-1">:</td>
                                    <td class="col-xs-12 col-sm-7">
                                        <select class="form-control" name="cwgnbnk" id="cwgnbnk">
                                            <option value="" selected>Sila pilih...</option>
                                            <option value="1">Kota Kinabalu</option>
                                            <option value="2">Papar</option>
                                            <option value="3">Kota Belud</option>
                                            <option value="4">Tuaran</option>
                                            <option value="5">Kudat</option>
                                            <option value="6">Ranau</option>
                                            <option value="7">Sandakan</option>
                                            <option value="8">Beluran</option>
                                            <option value="9">Kinabatangan</option>
                                            <option value="10">Tawau</option>
                                            <option value="11">Lahad Datu</option>
                                            <option value="12">Semporna</option>
                                            <option value="13">Keningau</option>
                                            <option value="14">Tambunan</option>
                                            <option value="15">Nabawan</option>
                                            <option value="16">Tenom</option>
                                            <option value="17">Beaufort</option>
                                            <option value="18">Kuala Penyu</option>
                                            <option value="19">Sipitang</option>
                                            <option value="21">Penampang</option>
                                            <option value="22">Kota Marudu</option>
                                            <option value="23">Kunak</option>
                                            <option value="26">Pitas</option>
                                            <option value="30">Telupid</option>
                                            <option value="31">Tongod</option>
                                            <option value="32">Banggi</option>
                                            <option value="33">Tamparuli</option>
                                            <option value="34">Menumbok</option>
                                            <option value="35">Membakut</option>
                                            <option value="36">Matunggong</option>
                                            <option value="37">Sook</option>
                                            <option value="38">Kemabong</option>
                                            <option value="39">Putatan</option>
                                            <option value="40">Paitan</option>
                                        </select><br>
                                    </td>
                                </tr>



                                <tr>

                                    <td class="col-xs-12 col-sm-4">Tarikh</td>
                                    <td class="col-xs-12 col-sm-1">:</td>
                                    <td class="col-xs-12 col-sm-7">
                                        <input type="date" class="form-control" id="tarikh" name="tarikh" placeholder="Tarikh" value="{{ date('Y-m-d') }}" readonly>
                                    </td>
                                </tr>
                            </table>

                            <!-- Upload IC -->
                            <div class="form-group">
                                <label for="nokpgambar">Upload IC (JPEG, PNG, JPG, GIF, or PDF):</label>
                                <input type="file" class="form-control" id="nokpgambar" name="nokpgambar" accept=".jpeg,.png,.jpg,.gif,.pdf" required>
                            </div>

                            <!-- Upload No Penyata Bank -->
                            <div class="form-group">
                                <label for="nobank">Upload No Penyata Bank (PDF):</label>
                                <input type="file" class="form-control" id="nobank" name="nobank" accept=".pdf" required>
                            </div>

                            <!-- Terms and conditions -->
                            <div class="form-check form-check-flat form-check-primary">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" required>
                                    Saya dengan ini mengaku bahawa semua keterangan berkenaan butiran pembayaran dan akaun bank yang saya berikan adalah BENAR dan membenarkan semua maklumat yang saya berikan untuk digunakan dan diproses oleh Jabatan Pertanian Sabah dan mana-mana agensi berkaitan Jabatan untuk tujuan proses semakan dan pembayaran seperti mana yang digunakan dalam Borang C Jabatan Pertanian Sabah.
                                </label>
                            </div>

                            <!-- Buttons -->
                            <div class="d-flex justify-content-end mt-3">
                                <button type="reset" class="btn btn-warning mr-2">Reset</button>
                                <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
                            </div>

                        </form>
                    </div>
            </div>
        </div>
    </div>

        <div class="card mt-4">
            <div class="card-body">
                <h4 class="card-title text-primary">Rekod Dokumen Dimuatnaik</h4>
                <div class="table-responsive">
                    <table class="table">
                        <tr align="center">
                            <td>
                                <br>
                                <button class="btn btn-info text-white" style="margin-bottom: 10px"><a href="{{ route('view.ic') }}" target="_blank">Lihat Kad Pengenalan</a></button>&emsp;
                                <button class="btn btn-info text-white" style="margin-bottom: 10px"><a href="{{ route('view.nobank') }}" target="_blank">Lihat No. Penyata Bank</a></button>&emsp;
                                <button class="btn btn-info text-white" style="margin-bottom: 10px"><a href="{{ route('view.nobank') }}" target="_blank">Cetak Lampiran C</a></button>&emsp;
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
</div>
</div>
@endsection
