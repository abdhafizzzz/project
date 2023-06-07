@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <!-- Form content -->
    </form>

    @if(session('registration_success'))
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Registration Successful</div>

                        <div class="card-body">
                            <p>{{ session('registration_success') }}</p>
                            <p>Your account has been successfully created.</p>
                            <p>You can now log in using your email and password.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
@endsection
