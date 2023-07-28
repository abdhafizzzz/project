@extends('navigation')
@section('navigation')
    <div class="content-wrapper" style="min-height: 647.4px;">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0" style="color: black;">Paparan Utama</h1>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">   

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <style>
                    /* Define the blinking animation */
                    @keyframes blink {
                        0% {
                            opacity: 1;
                        }

                        50% {
                            opacity: 0;
                        }

                        100% {
                            opacity: 1;
                        }
                    }

                    /* Apply the blinking animation to the flashing class */
                    .flashing {
                        animation: blink 1s infinite;
                    }

                    /* Apply red color to the red-text class */
                    .red-text {
                        color: red;
                    }

                    /* Apply black color to the .content-header h1 */
                    .content-header h1 {
                        color: black !important;
                    }
                </style>

                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>Langkah 1</h3>
                                <p>Kemaskini Butiran Anda</p>
                            </div>
                            <div class="icon">
                                <i class="nav-icon fa-regular fa-user"></i>
                            </div>
                            <a href="{{ route('daftar') }}" class="small-box-footer"><small>Anda hanya boleh melakukan
                                    kemaskini butiran sebelum <span class="red-text flashing">29 Februari 2023</span> sahaja
                                </small><i class="fas fa-arrow-circle-right"> Kemaskini disini</i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>Langkah 2<sup style="font-size: 20px"></sup></h3>
                                <p>Senarai Tanah</p>
                            </div>
                            <div class="icon">
                                <i class="fa-solid fa-location-dot"></i>
                            </div>
                            <a href="{{ route('tanahindex') }}" class="small-box-footer"><small>Lengkapkan senarai geran
                                    tanah anda</small><br><span class="red-text flashing">Muat naik geran tanah</span>
                                </small><i class="fas fa-arrow-circle-right"> Senarai tanah anda </i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>Langkah 3</h3>
                                <p>Tuntutan Siap Bajak</p>
                            </div>
                            <div class="icon">
                                <i class="fa-solid fa-tractor"></i>
                            </div>
                            <a href="{{ route('ptundaf') }}" class="small-box-footer"><small>Lengkapkan tuntutan bagi tanah
                                    siap dibajak </small><i class="fas fa-arrow-circle-right"> Lengkapkan Tuntutan </i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>Langkah 4</h3>
                                <p>Semak Status</p>
                            </div>
                            <div class="icon">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </div>
                            <a href="{{ route('carian') }}" class="small-box-footer">Ketahui status semasa tuntutan <i
                                    class="fas fa-arrow-circle-right"> Semak disini</i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
