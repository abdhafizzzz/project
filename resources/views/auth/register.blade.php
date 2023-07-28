@extends('layouts.app')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<form method="POST" action="{{ route('register') }}">
    @csrf
    <section class="vh-100 bg-image" style="background-image: url('{{ asset('img/padionlykabur.jpg') }}'); background-size: cover;">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body p-5">
                                <h2 class="text-uppercase text-center mb-5">Daftar Pengguna Baru</h2>

                           <!-- Separate 'No Kad Pengenalan' field with a button to check if 'nokp' exists -->
<div class="form-group">
    <label for="nokp" class="col-md-4 col-form-label text-md-right">No Kad Pengenalan</label>
    <div class="input-group">
        <input id="nokp" type="text" class="form-control @error('nokp') is-invalid @enderror" name="nokp" value="{{ old('nokp') }}" required autofocus>
        <div class="input-group-append">
            <button type="button" class="btn btn-primary" id="checkNokp">Check</button>
        </div>
    </div>
</div>


                                <!-- 'Nama Penuh' input field -->
                                <div class="form-group">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">Nama Penuh</label>
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required>
                                </div>
                                <br>

                                <div class="form-outline mb-4">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                    <label class="form-label" for="email">Email Anda</label>
                                </div>

                                <div class="form-outline mb-4">
                                    <input id="password" type="password" class="form-control" name="password" required>
                                    <label class="form-label" for="password">Kata Laluan</label>
                                </div>

                                <div class="form-outline mb-4">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                    <label class="form-label" for="password-confirm">Ulang Kata Laluan</label>
                                </div>

                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Daftar</button>
                                </div>

                                <p class="text-center text-muted mt-5 mb-0">Sudah Daftar? <a href="{{ route('login') }}" button type="button" class="btn btn-link btn-outline-primary">Log Masuk disini</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</form>

<script>
    document.getElementById('checkNokp').addEventListener('click', function () {
        const nokp = document.getElementById('nokp').value;
        // Perform an AJAX call to check if the 'nokp' exists in the 'petanibajak' table
        const url = '{{ route('check-nokp') }}';

        fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({ nokp: nokp })
        })
            .then(response => response.json())
            .then(data => {
                if (data.exists) {
                    // If 'nokp' exists, set the 'nama' value in the 'name' input field
                    document.getElementById('name').value = data.nama;
                } else {
                    // If 'nokp' does not exist, clear the 'name' input field
                    document.getElementById('name').value = '';
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
    });
</script>
@endsection
