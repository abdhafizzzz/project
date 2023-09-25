@extends('layouts.app')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
    /* CSS styles to make text black and slightly larger */
    body {
        color: rgb(255, 255, 255);
        font-size: 18px;
    }

    /* You can specify more specific selectors for fine-grained control */
    .card {
        background-color: rgba(0, 128, 0, 0.5);
    }
</style>
<form method="POST" action="{{ route('register') }}">
    @csrf
    <section class="vh-100 bg-image" style="background-image: url('{{ asset('img/back.png') }}'); background-size: cover;">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                            <div class="card custom-card" style="background-image: url('img/back2.png'); background-size: cover; border-radius: 1rem;">
                                <div class="card-body" style="margin-top: 150px;"> <!-- Adjust the margin-top here -->

                                <!-- Separate 'No Kad Pengenalan' field with a button to check if 'nokp' exists -->
                                <div class="form-group">
                                    <label for="nokp" class="col-md-4 col-form-label text-md-right">No Kad Pengenalan</label>
                                    <div class="input-group">
                                        <input id="nokp" type="text" class="form-control @error('nokp') is-invalid @enderror" name="nokp" value="{{ old('nokp') }}" required autofocus>
                                        <div class="input-group-append">
                                            <button type="button" class="btn btn-primary" id="checkNokp">Periksa No K/P</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">Nama Penuh</label>
                                    <div class="input-group">
                                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required>
                                        <div class="input-group-append">
                                            <button type="button" class="btn btn-primary" id="checkNama">Periksa Nama</button>
                                        </div>
                                    </div>
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
                                    <button type="submit" class="btn btn-warning btn-block btn-lg gradient-custom-4 text-body">Daftar</button>
                                </div>

                                <p class="text-center mt-5 mb-0 login-link">Sudah Daftar? <a href="{{ route('login') }}" button type="button" class="btn btn-link btn-outline-primary">Log Masuk disini</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</form>

<script>
    // Event listener for checking if 'nokp' exists
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
                    // If 'nokp' exists, show a success message
                    alert('No Kad Pengenalan wujud. Sila masukkan nama yang telah didaftarkan dan tekan Periksa Nama.');
                } else {
                    // If 'nokp' does not exist, clear the 'name' input field
                    alert('No Kad Pengenalan belum wujud. Sila isi maklumat yang lain dan tekan DAFTAR.');
                    document.getElementById('name').value = '';
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
    });

    // Event listener for checking the match between 'nokp' and 'name'
    document.getElementById('checkNama').addEventListener('click', function () {
        const nokp = document.getElementById('nokp').value;
        const name = document.getElementById('name').value;

        // Perform an AJAX call to check if the 'nokp' and 'nama' combination exists in the 'petanibajak' table
        const url = '{{ route('check-nokp') }}';

        fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({ nokp: nokp, name: name })
        })
            .then(response => response.json())
            .then(data => {
                if (data.exists && data.match) {
                    // If 'nokp' and 'nama' match, show a success message
                    alert('No Kad Pengenalan dan Nama sepadan. Anda boleh meneruskan pendaftaran.');
                } else if (data.exists && !data.match) {
                    // If 'nokp' exists but 'nama' doesn't match, show an error and clear the 'name' input field
                    alert('Nama tidak sama seperti didalam sistem');
                    document.getElementById('name').value = ''; // Clear the 'name' field
                } else {
                    // If 'nokp' does not exist, clear the 'name' input field
                    alert('Error: No Kad Pengenalan tidak ditemukan dalam sistem. Sila isi maklumat lain dan tekan DAFTAR.');
                    document.getElementById('name').value = '';
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
    });
</script>

@endsection
