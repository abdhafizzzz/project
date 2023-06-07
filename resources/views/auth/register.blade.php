@extends('layouts.app')

@section('content')

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

                                <div class="form-outline mb-4">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus minlength="3" maxlength="255">
                                    <label class="form-label" for="form3Example1cg">Nama Penuh</label>
                                    <small>(Sila Isi Nama Penuh seperti dalam Kad Pengenalan)</small>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="kad_pengenalan" class="col-md-4 col-form-label text-md-right">{{ __('Kad Pengenalan') }}</label>
                                    <input id="kad_pengenalan" type="text" class="form-control @error('kad_pengenalan') is-invalid @enderror" name="kad_pengenalan" value="{{ old('kad_pengenalan') }}" required autocomplete="kad_pengenalan" autofocus>
                                    <small>(Masukkan nombor kad pengenalan anda tanpa tanda '-')</small>
                                    @error('kad_pengenalan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                                <div class="form-outline mb-4">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                    <label class="form-label" for="form3Example3cg">Email Anda</label>
                                    <small>(contoh abc123@gmail.com)</small>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-outline mb-4">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" minlength="8">
                                    <label class="form-label" for="form3Example4cg">Kata Laluan</label>
                                    <small>(minimum 8 gabungan huruf dan nombor)</small>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-outline mb-4">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    <label class="form-label" for="form3Example4cdg">Ulang Kata Laluan</label>
                                </div>

                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Daftar</button>
                                </div>

                                <p class="text-center text-muted mt-5 mb-0">Sudah Daftar?
                                    <a href="http://ebajak.test/login" button type="button" class="btn btn-link btn-outline-primary">Log Masuk disini</button></a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</form>

@endsection
