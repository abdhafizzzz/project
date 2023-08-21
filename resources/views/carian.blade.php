@extends('navigation')

@section('navigation')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <a href="{{ route('carian') }}" class="btn btn-info" style="margin-top: 15px; margin-left: 15px;">Kembali</a>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container">
            <div class="row">
                <!-- center column -->
                <div class="col-md-6 offset-md-3">
                    <!-- general form elements -->
                    <div class="card">
                        <div class="card-header bg-olive">
                            <h3 class="card-title">Semak Status Tuntutan</h3>
                        </div>
                        <div class="card-body">
                            <form class="search-form" method="post" action="{{ route('carian') }}">
                                @csrf
                                <input type="text" name="search" class="form-control mb-3" placeholder="No.Kad Pengenalan" value="{{ Auth::user()->nokp }}" hidden>
                                <h4 class="text-center">{{ Auth::user()->nama }}</h4>
                                <p class="text-center">No Kad Pengenalan <br>{{ Auth::user()->nokp }}</p>
                                <div class="form-group text-center">
                                    <label for="Pemohon">Musim Penanaman</label>
                                    <div class="form-group">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="musim" id="musim" value="1"
                                                    {{ isset($userData->musim) && $userData->musim == 1 ? 'checked' : '' }}>
                                                Luar Musim (Bulan Mac - Julai)
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="musim2" id="musim2" value="1"
                                                    {{ isset($userData->musim2) && $userData->musim2 == 1 ? 'checked' : '' }}>
                                                Musim Utama (Bulan Ogos - Feb)
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input type="text" name="tahun" class="form-control" placeholder="Tahun">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <button type="submit" name="submit1" class="btn btn-danger btn-block">
                                                <span style="margin-right: 5px;">Cari</span>
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Display search results -->
    @if (isset($searchResults) && !$searchResults->isEmpty())
    <div class="card mt-4">
        <div class="card-header bg-olive">
            <h3 class="card-title">Hasil Carian</h3>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="bg-olive">
                    <tr>
                        <th style="width: 15%" class="text-center">Tarikh</th>
                        <th style="width: 15%" class="text-center">Stesen</th>
                        <th style="width: 25%" class="text-center">Pemilik Geran</th>
                        <th style="width: 10%" class="text-center">No Geran</th>
                        <th style="width: 15%" class="text-center">Luas Pohon (ekar)</th>
                        <th style="width: 25%" class="text-center">Jumlah Tuntutan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($searchResults as $result)
                    <tr>
                        <td class="text-center">{{ date('d/m/Y', strtotime($result->tahunpohon)) }}</td>
                        <td>{{ $result->stationdesc }}</td>
                        <td>{{ $result->pemilikgeran }}</td>
                        <td>{{ $result->nogeran }}</td>
                        <td class="text-center">{{ $result->luaspohon }}</td>
                        <td class="text-center">
                            @if ($result->nopenyatamusim)
                                <span class="badge badge-success badge-sudah-diluluskan">DILULUSKAN</span>
                                <span class="badge badge-success badge-sudah-diluluskan">No Penyata (No.{{ $result->nopenyatamusim }})</span>
                            @else
                                <span class="badge badge-warning badge-sedang-diproses">Sedang Diproses</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif
    <!-- End of display search results -->
</div>
<!-- ... (rest of the content) ... -->
@endsection
