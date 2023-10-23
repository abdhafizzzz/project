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

    // Fetch data from 'rm_subsidi' table where 'tarikhkuatkuasa' year is the current year
    $latestRmSubsidi = DB::table('rm_subsidi')
        ->whereYear('tarikhkuatkuasa', $currentYear)
        ->latest('tarikhkuatkuasa')
        ->first();

    // Check if $latestRmSubsidi is not null before accessing the 'rm' attribute
    if($latestRmSubsidi) {
        $latestRmValue = $latestRmSubsidi->rm;
    } else {
        $latestRmValue = 0; // Set a default value if needed
    }
@endphp

@extends('navigation')

@section('navigation')
<div class="content-wrapper">
    <div class="content-header">
        <div class="back-button">
            <a href="{{ route('ptundaf') }}" class="btn btn-secondary mt-2 ml-2">Kembali</a>
        </div>
        <section class="content-header"></section>
    </div>

    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title"><b>BUTIRAN PETANI</b></h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nama Pemohon:</label>
                            <span>{{ Auth::user()->nama }}</span>
                        </div>
                        <div class="form-group">
                            <label>Kad Pengenalan:</label>
                            <span>{{ Auth::user()->nokp }}</span>
                        </div>
                        <div class="form-group">
                            <label>No. Petani:</label>
                            <span>{{ $petaniBajak->nopetani ?? null }}</span>
                        </div>
                        <div class="form-group">
                            <label>Alamat Perhubungan:</label>
                            <span>{{ $petanibajak->alamat }}, {{ $petanibajak->poskod }}</span>
                        </div>
                        <div class="form-group">
                            <label>Daerah:</label>
                            <span>{{ $petaniBajak->daerah }}</span>
                        </div>
                        <div class="form-group">
                            <label>No Tel</label>
                            <span>{{ $petaniBajak->telrumah }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title"><b>BUTIRAN TANAH</b></h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nama Pemilik Geran:</label>
                            <span>{{ $specificItem->pemilikgeran }}</span>
                        </div>
                        <div class="form-group">
                            <label>Pemilikan Geran:</label>
                            <span>{{ $tanahWithLokasi->pemilikan }}</span>
                        </div>
                        <div class="form-group">
                            <label>Jabatan:</label>
                            <span>{{ $specificItem->stesen }}</span>
                        </div>
                        <div class="form-group">
                            <label>No. Geran:</label>
                            <span>{{ $specificItem->nogeran }}</span>
                        </div>
                        <div class="form-group">
                            <label>Luas Permohonan (Ekar):</label>
                            <span>{{ $specificItem->luaspohon }}</span>
                        </div>
                        <div class="form-group">
                            <label>Kampung:</label>
                            <span>{{ $specificItem->lokasi }}</span>
                        </div>
                        <div class="form-group" hidden>
                            <label>Tahun Pohon:</label>
                            <span>{{ $specificItem->tahunpohon }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title"><b>MAKLUMAT PEMBAYARAN</b></h3>
                    </div>
                    <div class="card-body">
                        <!-- Content for the third card goes here -->

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form action="{{ route('tuntutan.store') }}" method="POST">
                            @csrf
                            <input type="hidden" class="form-control" name="table_id" value="{{ $specificItem->table_id }}" readonly>
                            <input type='hidden' class="form-control" name="luastanam" value="{{ $specificItem->luastanam }}" readonly>
                            <input type='hidden' class="form-control" name="luastanam" value="{{ $latestRmValue }}" readonly>

                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    var rmValue = parseFloat("{{ $latestRmValue }}");
                                    var luastanam = parseFloat("{{ $specificItem->luastanam }}");
                                    var result = luasTanam * rmValue;
                                    document.getElementById('amaun').value = result;
                                });
                            </script>

                            <div class="form-group">
                                <label>Siap Bajak:</label>
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
                            </div>

                            <div class="form-group">
                                <label>Tuntutan (RM):</label>
                                <input type="number" name="amaun" id="amaun" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>No Akaun Bank:</label>
                                <input type="number" name="noakaun" id="noakaun" class="form-control" value="{{ $petanibajak->noakaun }}" readonly>
                            </div>

                            <div class="form-group">
                                <label>Nama Bank:</label>
                                @php
                                    $bank = DB::table('bank')->where('kodbank', $petanibajak->bank)->value('namabank');
                                @endphp
                                <input type="text" name="bank" id="bank" class="form-control" value="{{ $bank }}" readonly>
                            </div>

                            <div class="form-group">
                                <label>Cawangan Bank:</label>
                                @php
                                    $namadaerah = DB::table('daerah')->where('koddaerah', $petanibajak->bankcwgn)->value('namadaerah');
                                @endphp
                                <input type="text" name="bankcwgn" id="bankcwgn" class="form-control" value="{{ $namadaerah }}" readonly>
                            </div>

                            <div class="form-group">
                                <label>Tarikh Permohonan:</label>
                                <input type="date" class="form-control" id="tartuntut" name="tartuntut" value="{{ now()->format('Y-m-d') }}" readonly required>
                            </div>
                            <button type="submit" class="btn btn-primary" name="submit" value="submit">Kemaskini Tuntutan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
