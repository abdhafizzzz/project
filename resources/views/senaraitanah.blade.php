@extends('navigation')

@section('navigation')
<div class="content-wrapper">
    <div class="content-header">
        <div class="back-button">
            <a href="{{ route('tanahindex') }}" class="btn btn-secondary mt-2 ml-2">Kembali</a>
        </div>
        <section class="content-header">
            <h1 class="mt-3">Daftar Tanah</h1>
        </section>
    </div>

    <section class="content">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-sm-offset-3">
                <div class="box">
                    <div class="box-body">
                        <form action="{{ route('senaraitanah.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control" id="table_id" name="table_id" value="{{ $latestTableId }}" readonly style="display: none;">
                            </div>

                            <div class="form-group">
                                <label for="tarikh">Tarikh</label>
                                <input type="date" class="form-control" id="tarikh" name="tarikh" disabled>
                            </div>

                            <div class="form-group">
                                <label for="nokppetani">NO KP Petani</label>
                                <input type="text" class="form-control" id="nokppetani" name="nokppetani" value="{{ Auth::user()->nokp }}" readonly>
                            </div>

                            <div class="form-group">
                                <label for="pemilikgeran">Nama Pemilik</label>
                                <input type="text" class="form-control" id="pemilikgeran" name="pemilikgeran">
                            </div>

                            <div class="form-group">
                                <label for="nogeran">No.Geran</label>
                                <input type="text" class="form-control" id="nogeran" name="nogeran">
                            </div>

                            <div class="form-group">
                                <label for="lokasi">Lokasi Tanah</label>
                                <select class="form-control" id="lokasi" name="lokasi">
                                    <option value="">Sila pilih...</option>
                                    @foreach ($lokasiOptions->sortBy('namalokasi') as $lokasi)
                                        <option value="{{ $lokasi->id }}">{{ $lokasi->namalokasi }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="luasekar">Luas Dalam Geran (Ekar)</label>
                                <input type="text" class="form-control" id="luasekar" name="luasekar">
                            </div>

                            <div class="form-group">
                                <label for="luaspohon">Luas Dipohon/Musim (Ekar)</label>
                                <input type="text" class="form-control" id="luaspohon" name="luaspohon">
                            </div>

                            <div class="form-group">
                                <label for="pemilikan">Pemilikan Tanah</label>
                                <select class="form-select" id="pemilikan" name="pemilikan">
                                    <option value="0">Sila Pilih...</option>
                                    <option value="1">Sendiri</option>
                                    <option value="2">Sewa</option>
                                    <option value="3">Tuntut Waris</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-success">Tambah Tanah</button>
                        </form>

                        <script>
                            window.addEventListener('DOMContentLoaded', (event) => {
                                const tableIdInput = document.getElementById('table_id');

                                fetch('/get-latest-table-id')
                                    .then(response => response.json())
                                    .then(data => {
                                        const latestTableId = data.latestTableId;
                                        tableIdInput.value = latestTableId;
                                    })
                                    .catch(error => {
                                        console.error('Error:', error);
                                    });
                            });

                            var currentDate = new Date();
                            var formattedDate = currentDate.toISOString().split('T')[0];
                            document.getElementById('tarikh').value = formattedDate;
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
