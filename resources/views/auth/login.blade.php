@extends('layouts.app')

@section('content')
    @if (session('registration_success'))
        <div class="alert alert-success">
            {{ session('registration_success') }}
        </div>
    @endif
    <section class="vh-100 gradient-custom" style="background-image: url('img/back.png'); background-size: cover;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5 text-center">
                    <div class="card custom-card" style="background-image: url('img/logindoa.png'); background-size: cover; border-radius: 1rem;">
                        <div class="card-body" style="margin-top: 300px;"> <!-- Adjust the margin-top here -->
                                                        <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <!-- Add more spacing at the upper part -->
                                {{-- <div class="mb-4 mt-3"></div>
                                <div class="mb-4 mt-3"></div>     <div class="mb-4 mt-3"></div>
                                <div class="mb-4 mt-3"></div> --}}


                                <h2 class="fw-bold mb-3"></h2>
                                <p class="text-white mb-4"></p> <!-- Make the text white -->

                                <div class="form-outline form-white mb-4">
                                    <label for="nokp" class="form-label text-white">{{('No Kad Pengenalan')}}</label> <!-- Make the label text white -->
                                    <input id="nokp" type="text" class="form-control @error('nokp') is-invalid @enderror" name="nokp" required autocomplete="nokp" autofocus aria-label="Kad Pengenalan" aria-describedby="nokp_error">
                                    <small class="text-white">(Masukkan nombor kad pengenalan anda tanpa tanda '-')</small> <!-- Make the text white -->
                                    @error('nokp')
                                    <span id="nokp_error" class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-outline form-white mb-4">
                                    <label for="password" class="form-label text-white">{{('Kata Laluan')}}</label> <!-- Make the label text white -->
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" aria-label="Kata Laluan" aria-describedby="password_error">
                                    @error('password')
                                    <span id="password_error" class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-check mb-4 d-flex justify-content-start">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                    <label class="form-check-label text-white" for="remember" style="padding-left: 12px"> <!-- Make the label text white -->
                                        {{ ('Ingat Saya') }}
                                    </label>
                                </div>

                                <button class="btn btn-dark btn-outline-primary btn-lg px-4 mb-4 custom-btn" title="Klik untuk Log Masuk" aria-label="Log Masuk">Log Masuk</button>

                                <p class="small mb-4 pb-2"><a class="text-white" href="{{ route('password.request') }}">Lupa kata laluan? Sila klik sini</a></p> <!-- Make the text white -->
                                <p class="text-white mb-0">Untuk pengguna baru, sila daftar dahulu <a href="{{ url('register') }}" class="btn btn-outline-light btn-lg px-4 btn-success" onclick="openNewPage()">Daftar</a></p> <!-- Make the text white -->                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="container text-center mt-5">
        <img src="{{ asset('img/logojpkn.png') }}" alt="Footer Logo" style="max-width: 200px;">
        <div>
            <span class="text-black">&copy; {{ date('Y') }}© 2020 - 2023 Hak Cipta terpelihara Jabatan Perkhidmatan Komputer Negeri Sabah</span> <!-- Make the text white -->
        </div>
    </footer>
</html>


<style>
    /* Add more spacing at the upper part of the card */
    .custom-card {
        padding-top: 100px; /* You can adjust the value as needed */
    }

    /* Adjust the form's position */
    .card-body {
        margin-top: 20px; /* You can adjust the value to move the form lower */
    }

    /* Responsive adjustments */
    @media (max-width: 576px) { /* Small screens */
        .custom-card {
            padding-top: 50px; /* Adjust the spacing for smaller screens */
        }
    }

    /* Button hover effect */
    .custom-btn:hover {
        background-color: blue; /* Change background color to blue on hover */
    }

    /* Make text white */
    .text-white {
        color: white;
    }
</style>
