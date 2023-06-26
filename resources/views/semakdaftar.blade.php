<?php
// Retrieve all daftar records for the logged in user
$daftars = DB::select('SELECT * FROM daftar WHERE id = ?', [Auth::id()]);
?>
@extends('navigation')

    @section('navigation')
        <div class="content-wrapper container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Daftar</div>

                        <div class="card-body">
                            @if (session('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <a href="{{ url('/create') }}" class="btn btn-primary">Tambah Data</a>

                            <table class="table mt-3">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Pemohon</th>
                                        <th scope="col">No. KP</th>
                                        <th scope="col">Alamat</th>
                                        <th scope="col">Poskod</th>
                                        <th scope="col">Daerah ID</th>
                                        <th scope="col">No. Tel</th>
                                        <th scope="col">No. HP</th>
                                        <th scope="col">No. Kad</th>
                                        <th scope="col">Tahun Pohon</th>
                                        <th scope="col">RD Daftar</th>
                                        <th scope="col">Ch Musim</th>
                                        <th scope="col">Ch Musim2</th>
                                        <th scope="col">Tarikh</th>
                                        <th scope="col">Tindakan</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($daftars as $daftar)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $daftar->pemohon }}</td>
                                            <td>{{ $daftar->nokp }}</td>
                                            <td>{{ $daftar->alamat }}</td>
                                            <td>{{ $daftar->poskod }}</td>
                                            <td>{{ $daftar->daerah_id }}</td>
                                            <td>{{ $daftar->notel }}</td>
                                            <td>{{ $daftar->nohp }}</td>
                                            <td>{{ $daftar->nokad }}</td>
                                            <td>{{ $daftar->tahunpohon }}</td>
                                            <td>{{ $daftar->rd_daftar }}</td>
                                            <td>{{ $daftar->ch_musim ? 'Yes' : 'No' }}</td>
                                            <td>{{ $daftar->ch_musim2 ? 'Yes' : 'No' }}</td>
                                            <td>{{ $daftar->tarikh }}</td>
                                            <td>
                                                <a href="{{ url('/daftar/' . $daftar->id) }}" class="btn btn-sm btn-info">Lihat</a>
                                                <a href="{{ url('/daftar/' . $daftar->id . '/edit') }}" class="btn btn-sm btn-primary">Edit</a>
                                                <form action="{{ url('/daftar/' . $daftar->id) }}" method="POST" style="display: inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
