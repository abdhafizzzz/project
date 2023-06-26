@extends('navigation')

@section('navigation')

<h1>Edit Daftar Entry</h1>

    <form action="{{ route('daftar.update', ['id' => $daftar->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="pemohon">Pemohon:</label>
            <input type="text" name="pemohon" id="pemohon" value="{{ $daftar->pemohon }}" required>
        </div>

        <div>
            <label for="nokp">No. Kad Pengenalan:</label>
            <input type="text" name="nokp" id="nokp" value="{{ $daftar->nokp }}" required>
        </div>

        <div>
            <label for="alamat">Alamat:</label>
            <textarea name="alamat" id="alamat" required>{{ $daftar->alamat }}</textarea>
        </div>

        <div>
            <label for="poskod">Poskod:</label>
            <input type="text" name="poskod" id="poskod" value="{{ $daftar->poskod }}" required>
        </div>

        <div>
            <label for="daerah_id">Daerah ID:</label>
            <input type="number" name="daerah_id" id="daerah_id" value="{{ $daftar->daerah_id }}" required>
        </div>

        <div>
            <label for="notel">No. Telefon:</label>
            <input type="text" name="notel" id="notel" value="{{ $daftar->notel }}" required>
        </div>

        <div>
            <label for="nohp">No. Telefon Bimbit:</label>
            <input type="text" name="nohp" id="nohp" value="{{ $daftar->nohp }}">
        </div>

        <div>
            <label for="nokad">No. Kad:</label>
            <input type="text" name="nokad" id="nokad" value="{{ $daftar->nokad }}" required>
        </div>

        <div>
            <label for="tahunpohon">Tahun Pohon:</label>
            <input type="number" name="tahunpohon" id="tahunpohon" value="{{ $daftar->tahunpohon }}" required>
        </div>

        <div>
            <label for="rd_daftar">Rumah Daftar:</label>
            <input type="checkbox" name="rd_daftar" id="rd_daftar" value="1" {{ $daftar->rd_daftar ? 'checked' : '' }}>
        </div>

        <div>
            <label for="ch_musim">Cuti Musim:</label>
            <input type="checkbox" name="ch_musim" id="ch_musim" value="1" {{ $daftar->ch_musim ? 'checked' : '' }}>
        </div>

        <div>
            <label for="ch_musim2">Cuti Musim 2:</label>
            <input type="checkbox" name="ch_musim2" id="ch_musim2" value="1" {{ $daftar->ch_musim2 ? 'checked' : '' }}>
        </div>

        <div>
            <label for="tarikh">Tarikh:</label>
            <input type="date" name="tarikh" id="tarikh" value="{{ $daftar->tarikh }}" required>
        </div>

        <button type="submit">Update</button>
    </form>
@endsection
