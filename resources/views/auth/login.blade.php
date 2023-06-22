@extends('layouts.app')

@section('content')
    @if (session('registration_success'))
        <div class="alert alert-success">
            {{ session('registration_success') }}
        </div>
    @endif

    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5 text-center">
                    <div class="card" style="background-color: gold; border-radius: 1rem;">
                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <img src="{{ asset('img/doalogo.gif') }}" alt="Logo" class="img-fluid mb-3" style="max-width: 200px;">
                                <h2 class="fw-bold mb-2">eBajak</h2>
                                <p class="text-black-50 mb-5">Sistem Subsidi Petani</p>
                                <div class="form-outline form-white mb-4">
                                    <label for="kad_pengenalan" class="col-md-4 col-form-label text-md-right">{{ __('Kad Pengenalan') }}</label>
                                    <input id="kad_pengenalan" type="text" class="form-control @error('kad_pengenalan') is-invalid @enderror" name="kad_pengenalan" value="{{ old('kad_pengenalan') }}" required autocomplete="kad_pengenalan" autofocus aria-label="Kad Pengenalan" aria-describedby="kad_pengenalan_error">
                                    <small>(Masukkan nombor kad pengenalan anda tanpa tanda '-')</small>
                                    @error('kad_pengenalan')
                                        <span id="kad_pengenalan_error" class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-outline form-white mb-4">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" aria-label="Kata Laluan" aria-describedby="password_error">
                                    <label class="form-label" for="typePasswordX">Kata Laluan</label>
                                    @error('password')
                                        <span id="password_error" class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <button class="btn btn-dark btn-outline-primary btn-lg px-5 mb-3" title="Klik untuk Log Masuk" aria-label="Log Masuk">Log Masuk</button>
                                <p class="small mb-5 pb-lg-2"><a class="text-black-50" href="{{ route('password.request') }}">Lupa kata laluan? sila klik sini</a></p>
                                <p class="mb-0">Untuk pengguna baru sila daftar dahulu <a href="http://ebajak.test/register" class="btn btn-outline-light btn-lg px-5 btn-success" onclick="openNewPage()">Daftar</a></p>
                            </form>
                        </div>
                    </div>
                    <footer class="container text-center">
                        <img src="{{ asset('img/logojpkn.png') }}" alt="Footer Logo" style="max-width: 200px;">
                        <div>
                            <span>&copy; {{ date('Y') }}© 2020 - 2023 Hak Cipta terpelihara Jabatan Perkhidmatan Komputer Negeri Sabah</span>
                        </div>
                    </footer>


                </div>
            </div>
        </div>
    </section>
@endsection














