@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">{{ __('Set Semula Kata Laluan') }}</div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Anda') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>Email belum didaftarkan.</strong>
                            </span>
                        @enderror

                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Hantar Link untuk Set Semula Kata Laluan') }}
                        </button>

                        <p class="small mb-5 pb-lg-2"><a class="text-black-50" href="{{ route('home') }}">Kembali ke laman utama</a></p>
                    </div>

                </div>
            </form>
        </div>
    </div>
@endsection
