@extends('navigation')

@section('navigation')
<div class="content-wrapper">

    <div class="back-button">
        <a href="{{ route('tanahindex') }}" class="btn btn-secondary" style="margin-top: 15px;margin-left: 15px;">Kembali</a>
    </div>

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Daftar Tanah</h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">
                        <!-- Your form for adding new tanah -->
        <form action="{{ route('senaraitanah.store') }}" method="POST">
            @csrf
                            <div class="form-group">
                                {{-- <label for="table_id">Table ID</label> --}}
                                <input type="text" class="form-control" id="table_id" name="table_id" value="{{ $latestTableId }}" readonly style="display: none;">
                            </div>

                            <div class="form-group">
                                <label for="tarikh">Tarikh</label>
                                <input type="date" class="form-control" id="tarikh" name="tarikh"  required>
                            </div>


                            <div class="form-group">
                                <label for="pohonid">NO KP Petani</label>
                                <input type="text" class="form-control" id="nokppetani" name="nokppetani" value="{{ Auth::user()->nokp }}" readonly>
                            </div>


                                <div class="form-group">
                                    <label for="nama_pemilik">Nama Pemilik</label>
                                    <input type="text" class="form-control" id="pemilikgeran" name="pemilikgeran">
                                </div>
                                <div class="form-group">
                                    <label for="no_geran">No.Geran</label>
                                    <input type="text" class="form-control" id="nogeran" name="nogeran">
                                </div>
                                <div class="form-group">
                                    <label for="lokasi_tanah">Lokasi Tanah</label>
                                    <select class="form-control" id="lokasi" name="lokasi">
                                        <option value="">Sila pilih...</option>
                                        @foreach (DB::table('lokasitanah')->get() as $lokasi)
                                            <option value="{{ $lokasi->kodlokasi }}">{{ $lokasi->namalokasi }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="luas_dalam_geran">Luas Dalam Geran (Ekar)</label>
                                    <input type="text" class="form-control" id="luasekar" name="luasekar">
                                </div>
                                <div class="form-group">
                                    <label for="luas_dipohon">Luas Dipohon/Musim (Ekar)</label>
                                    <input type="text" class="form-control" id="luaspohon" name="luaspohon">
                                </div>
                                <div class="form-group">
                                    <label for="pemilikan_tanah">Pemilikan Tanah</label>
                                    <select class="form-select" id="pemilikan" name="pemilikan">
                                        <option value="0">Sila Pilih...</option>
                                        <option value="1">Sendiri</option>
                                        <option value="2">Sewa</option>
                                        <option value="3">Tuntut Waris</option>
                                    </select>
                                </div>




                            <!-- Add more form fields for other tanah properties -->

                            <button type="submit" class="btn btn-success">Tambah Tanah</button>
                        </form>

                        <script>
                            window.addEventListener('DOMContentLoaded', (event) => {
                                const tableIdInput = document.getElementById('table_id');

                                // Fetch the latest table_id from the server
                                fetch('/get-latest-table-id')
                                    .then(response => response.json())
                                    .then(data => {
                                        const latestTableId = data.latestTableId;

                                        // Set the new table_id value
                                        tableIdInput.value = latestTableId;
                                    })
                                    .catch(error => {
                                        console.error('Error:', error);
                                    });
                            });
                        </script>

                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
@endsection
