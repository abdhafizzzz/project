@php
    use Illuminate\Support\Facades\DB;
@endphp

@extends('navigation')

@section('navigation')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Sistem Pembayaran Subsidi Pembajakan Sawah Padi
            {{-- <small>Modul Pegawai Pertanian</small> --}}
        </h1>
        <ol class="breadcrumb">
            <li><a href="home"><i class="fa fa-dashboard"></i> Laman Utama</a></li>
        </ol>
        </section>

        <!-- flash message of success -->
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

    <!-- Main content -->
        <!-- Display existing data if it exists -->
        @if ($existingData)
        <form action="{{ route('saveData') }}" method="POST">
            @csrf
            @method('PUT')
            <section class="content">
                <div class="row ">

                <!-- left column -->
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                        <h3 class="box-title">BUTIR-BUTIR PEMOHON (INDIVIDU)</h3>
                    </div>
                    <!-- /.box-header -->

            <div class="box-body">
                <div class="form-group">
                    <label for="pemohon">Nama Pemohon</label>
                    <input type="text" class="form-control" id="pemohon" name="pemohon" placeholder="Nama Pemohon" value="{{ Auth::user()->name }}" readonly>

                    <label for="pendaftaran">No.Kad Pengenalan</label>
                    <input type="text" class="form-control" id="nokp" name="nokp" placeholder="No.Kad Pengenalan" value="{{ Auth::user()->kad_pengenalan }}" readonly>

                    <!-- textarea -->
                    <label>Alamat</label>
                    <textarea class="form-control" rows="3" placeholder="Alamat ..." name="alamat" value="{{ $existingData->alamat  }}"></textarea>

                    <label for="poskod">Poskod</label>
                    <input type="text" class="form-control" id="poskod" name="poskod" placeholder="Poskod">

                    <!-- select daerah-->
                    <label for="daerah">Daerah</label>

                    <select class="form-control" name="daerah_id">
                        <option value="">Sila pilih...</option>
                        @foreach (DB::table('daerah')->get() as $daerah)
                            <option value="{{ $daerah->koddaerah}}">{{ $daerah->namadaerah }}</option>
                        @endforeach
                    </select>

                    <label for="notelrumah">No. Telefon</label>
                    <input type="text" class="form-control" id="notel" name="notel" placeholder="No.Telefon">

                    <label for="notel">Handphone</label>
                    <input type="text" class="form-control" id="nohp" name="nohp" placeholder="Handphone">

            </div> <!-- /.form-group -->
            </div> <!-- /.box-body -->
            </div> <!-- /.box -->
            </div> <!--/.col (left) -->

        <!-- right column -->
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border"><h3 class="box-title">MAKLUMAT LAIN </h3></div>
                <div class="form-group">
                <!-- /.box-header -->

                <div class="box-body">
                <label>No.Kad Petani</label>
                <div class="input-group date">
                <input type="text" class="form-control" placeholder="No. Kad Petani ATAU No. Kad Pengenalan" name="nokad" id="nokad">
                </div>
                <label>Tahun Permohonan</label>
                <div class="input-group date">
                <input name="tahunpohon" type="text" class="form-control" id="tahunpohon" value=2023>
                </div>
                <BR>

                <!-- radio -->
                <div class="form-group">
                <label>Pendaftaran</label>
                    <div class="radio">
                        <label>
                        <input type="radio" name="rd_daftar" id="rd_daftar1" value=1 checked>
                        Baru
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                        <input type="radio" name="rd_daftar" id="rd_daftar2" value=2>
                        Lama
                        </label>
                    </div>
                </div>



                <div class="form-group">
                <P><label for="Pemohon">Musim Penanaman</label></P>

                <!-- checkbox -->
                <div class="form-group">
                    <div class="checkbox">
                        <label>
                        <input type="checkbox" name="ch_musim" id="ch_musim" value=1>
                        Luar Musim (Bulan Mac - Julai)</input>
                        </label>
                    </div>

                    <div class="checkbox">
                        <label>
                        <input type="checkbox" name="ch_musim2" id="ch_musim2" value=1>
                        Musim Utama (Bulan Ogos - Feb)</input>
                        </label>
                    </div>
                </div>
                <label for="tarikh" style="margin-bottom: 6px">Tarikh</label>
                <div class="input-group date">
                    <input name="tarikh" type="date" class="form-control" id="tarikh"/>
                    <span class="input-group-addon">
                    </span>
                </div>

                <div class="box-footer">
                    <button type="submit" style="margin-top:2rem" class="btn btn-primary">Simpan</button>
                </div>
            </div> <!-- /.form-group -->
            </div> <!-- /.box-body -->
            </div> <!-- /.box -->
            </div> <!--/.col (right) -->
    </div> <!-- /.row -->
    </section>
    </form>

    @else

    <form action="{{ route('daftar.save.data') }}" method="POST">
        @csrf
        <section class="content">
            <div class="row ">

            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                    <h3 class="box-title">BUTIR-BUTIR PEMOHON (INDIVIDU)</h3>
                </div>
                <!-- /.box-header -->

        <div class="box-body">
            <div class="form-group">
                <label for="pemohon">Nama Pemohon</label>
                <input type="text" class="form-control" id="pemohon" name="pemohon" placeholder="Nama Pemohon" value="{{ Auth::user()->name }}" readonly>

                <label for="pendaftaran">No.Kad Pengenalan</label>
                <input type="text" class="form-control" id="nokp" name="nokp" placeholder="No.Kad Pengenalan" value="{{ Auth::user()->kad_pengenalan }}" readonly>

                <!-- textarea -->
                <label>Alamat</label>
                <textarea class="form-control" rows="3" placeholder="Alamat ..." name="alamat"></textarea>

                <label for="poskod">Poskod</label>
                <input type="text" class="form-control" id="poskod" name="poskod" placeholder="Poskod">

                <!-- select daerah-->
                <label for="daerah">Daerah</label>

                <select class="form-control" name="daerah_id">
                    <option value="">Sila pilih...</option>
                    @foreach (DB::table('daerah')->get() as $daerah)
                        <option value="{{ $daerah->koddaerah}}">{{ $daerah->namadaerah }}</option>
                    @endforeach
                </select>

                <label for="notelrumah">No. Telefon</label>
                <input type="text" class="form-control" id="notel" name="notel" placeholder="No.Telefon">

                <label for="notel">Handphone</label>
                <input type="text" class="form-control" id="nohp" name="nohp" placeholder="Handphone">

        </div> <!-- /.form-group -->
        </div> <!-- /.box-body -->
        </div> <!-- /.box -->
        </div> <!--/.col (left) -->

    <!-- right column -->
    <div class="col-md-6">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border"><h3 class="box-title">MAKLUMAT LAIN </h3></div>
            <div class="form-group">
            <!-- /.box-header -->

            <div class="box-body">
            <label>No.Kad Petani</label>
            <div class="input-group date">
            <input type="text" class="form-control" placeholder="No. Kad Petani ATAU No. Kad Pengenalan" name="nokad" id="nokad">
            </div>
            <label>Tahun Permohonan</label>
            <div class="input-group date">
            <input name="tahunpohon" type="text" class="form-control" id="tahunpohon" value=2023>
            </div>
            <BR>

            <!-- radio -->
            <div class="form-group">
            <label>Pendaftaran</label>
                <div class="radio">
                    <label>
                    <input type="radio" name="rd_daftar" id="rd_daftar1" value=1 checked>
                    Baru
                    </label>
                </div>
                <div class="radio">
                    <label>
                    <input type="radio" name="rd_daftar" id="rd_daftar2" value=2>
                    Lama
                    </label>
                </div>
            </div>



            <div class="form-group">
            <P><label for="Pemohon">Musim Penanaman</label></P>

            <!-- checkbox -->
            <div class="form-group">
                <div class="checkbox">
                    <label>
                    <input type="checkbox" name="ch_musim" id="ch_musim" value=1>
                    Luar Musim (Bulan Mac - Julai)</input>
                    </label>
                </div>

                <div class="checkbox">
                    <label>
                    <input type="checkbox" name="ch_musim2" id="ch_musim2" value=1>
                    Musim Utama (Bulan Ogos - Feb)</input>
                    </label>
                </div>
            </div>
            <label for="tarikh" style="margin-bottom: 6px">Tarikh</label>
            <div class="input-group date">
                <input name="tarikh" type="date" class="form-control" id="tarikh"/>
                <span class="input-group-addon">
                </span>
            </div>

            <div class="box-footer">
                <button type="submit" style="margin-top:2rem" class="btn btn-primary">Simpan</button>
            </div>
        </div> <!-- /.form-group -->
        </div> <!-- /.box-body -->
        </div> <!-- /.box -->
        </div> <!--/.col (right) -->
</div> <!-- /.row -->
</section>
</form>
@endif

</div>
</div><!--content wrapper-->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
{{-- <script src="plugins/jquery/jquery.min.js"></script> , after commented this, logout dropout working herm--}}
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->

<script src="dist/js/pages/dashboard.js"></script>
@endsection


<tbody>
    @php
    $counter = ($tanah->currentPage() - 1) * $tanah->perPage() + 1;
    @endphp
    @foreach($tanah as $item)
    <tr>
        <td>{{ $counter++ }}</td>

        <?php

        /*
         * This file is part of the PHPFlasher package.
         * (c) Younes KHOUBZA <younes.khoubza@gmail.com>
         */

        return array(
            /*
            |---------------------------------------------------------------------------
            | Default PHPFlasher library
            |---------------------------------------------------------------------------
            | This option controls the default library that will be used by PHPFlasher
            | to display notifications in your Laravel application. PHPFlasher supports
            | several libraries, including "flasher", "toastr", "noty", "notyf",
            | "sweetalert" and "pnotify".
            |
            | The "flasher" library is used by default. If you want to use a different
            | library, you will need to install it using composer. For example, to use
            | the "toastr" library, run the following command:
            |     composer require php-flasher/flasher-toastr-laravel
            |
            | Here is a list of the supported libraries and the corresponding composer
            | commands to install them:
            |
            | "toastr"     : composer require php-flasher/flasher-toastr-laravel
            | "noty"       : composer require php-flasher/flasher-noty-laravel
            | "notyf"      : composer require php-flasher/flasher-notyf-laravel
            | "sweetalert" : composer require php-flasher/flasher-sweetalert-laravel
            | "pnotify"    : composer require php-flasher/flasher-pnotify-laravel
            */
            'default' => 'flasher',

            /*
            |---------------------------------------------------------------------------
            | Main PHPFlasher javascript file
            |---------------------------------------------------------------------------
            | This option specifies the location of the main javascript file that is
            | required by PHPFlasher to display notifications in your Laravel application.
            |
            | By default, PHPFlasher uses a CDN to serve the latest version of the library.
            | However, you can also choose to download the library locally or install it
            | using npm.
            |
            | To use the local version of the library, run the following command:
            |     php artisan flasher:install
            |
            | This will copy the necessary assets to your application's public folder.
            | You can then specify the local path to the javascript file in the 'local'
            | field of this option.
            */
            'root_script' => array(
                'cdn' => 'https://cdn.jsdelivr.net/npm/@flasher/flasher@1.3.1/dist/flasher.min.js',
                'local' => '/vendor/flasher/flasher.min.js',
            ),

            /*
            |---------------------------------------------------------------------------
            | PHPFlasher Stylesheet
            |---------------------------------------------------------------------------
            | This option specifies the location of the stylesheet file that is
            | required by PHPFlasher to style the notifications in your Laravel application.
            |
            | By default, PHPFlasher uses a CDN to serve the latest version of the stylesheet.
            | However, you can also choose to download the stylesheet locally or include it
            | from your assets.
            |
            | To use the local version of the stylesheet, make sure you have the necessary
            | assets in your application's public folder. Then specify the local path to
            | the stylesheet file in the 'local' field of this option.
            */
            'styles' => array(
                'cdn' => 'https://cdn.jsdelivr.net/npm/@flasher/flasher@1.3.1/dist/flasher.min.css',
                'local' => '/vendor/flasher/flasher.min.css',
            ),

            /*
            |---------------------------------------------------------------------------
            | Whether to use CDN for PHPFlasher assets or not
            |---------------------------------------------------------------------------
            | This option controls whether PHPFlasher should use CDN links or local assets
            | for its javascript and CSS files. By default, PHPFlasher uses CDN links
            | to serve the latest version of the library. However, you can also choose
            | to use local assets by setting this option to 'false'.
            |
            | If you decide to use local assets, don't forget to publish the necessary
            | files to your application's public folder by running the following command:
            |     php artisan flasher:install
            |
            | This will copy the necessary assets to your application's public folder.
            */
            'use_cdn' => true,

            /*
            |---------------------------------------------------------------------------
            | Translate PHPFlasher messages
            |---------------------------------------------------------------------------
            | This option controls whether PHPFlasher should pass its messages to the Laravel's
            | translation service for localization.
            |
            | By default, this option is set to 'true', which means that PHPFlasher will
            | attempt to translate its messages using the translation service.
            |
            | If you don't want PHPFlasher to use the Laravel's translation service, you can
            | set this option to 'false'. In this case, PHPFlasher will use the messages
            | as-is, without attempting to translate them.
            */
            'auto_translate' => true,

            /*
            |---------------------------------------------------------------------------
            | Inject PHPFlasher in Response
            |---------------------------------------------------------------------------
            | This option controls whether PHPFlasher should automatically inject its
            | javascript and CSS files into the HTML response of your Laravel application.
            |
            | By default, this option is set to 'true', which means that PHPFlasher will
            | listen to the response of your application and automatically insert its
            | scripts and stylesheets into the HTML before the closing `</body>` tag.
            |
            | If you don't want PHPFlasher to automatically inject its scripts and stylesheets
            | into the response, you can set this option to 'false'. In this case, you will
            | need to manually include the necessary files in your application's layout.
            */
            'auto_render' => true,

            'flash_bag' => array(
                /*
                |-----------------------------------------------------------------------
                | Enable flash bag
                |-----------------------------------------------------------------------
                | This option controls whether PHPFlasher should automatically convert
                | Laravel's flash messages to PHPFlasher notifications. This feature is
                | useful when you want to migrate from a legacy system or another
                | library that uses similar conventions for flash messages.
                |
                | When this option is set to 'true', PHPFlasher will check for flash
                | messages in the session and convert them to notifications using the
                | mapping specified in the 'mapping' option. When this option is set
                | to 'false', PHPFlasher will ignore flash messages in the session.
                */
                'enabled' => true,

                /*
                |-----------------------------------------------------------------------
                | Flash bag type mapping
                |-----------------------------------------------------------------------
                | This option allows you to map or convert session keys to PHPFlasher
                | notification types. On the left side are the PHPFlasher types.
                | On the right side are the Laravel session keys that you want to
                | convert to PHPFlasher types.
                |
                | For example, if you want to convert Laravel's 'danger' flash
                | messages to PHPFlasher's 'error' notifications, you can add
                | the following entry to the mapping:
                |     'error' => ['danger'],
                */
                'mapping' => array(
                    'success' => array('success'),
                    'error' => array('error', 'danger'),
                    'warning' => array('warning', 'alarm'),
                    'info' => array('info', 'notice', 'alert'),
                ),
            ),

            /*
            |---------------------------------------------------------------------------
            | Global Filter Criteria
            |---------------------------------------------------------------------------
            | This option allows you to filter the notifications that are displayed
            | in your Laravel application. By default, all notifications are displayed,
            | but you can use this option to limit the number of notifications or
            | filter them by type.
            |
            | For example, to limit the number of notifications to 5, you can set
            | the 'limit' field to 5:
            |     'limit' => 5,
            |
            | To filter the notifications by type, you can specify an array of
            | types that you want to display. For example, to only display
            | error notifications, you can set the 'types' field to ['error']:
            |     'types' => ['error'],
            |
            | You can also combine multiple criteria by specifying multiple fields.
            | For example, to display up to 5 error notifications, you can set
            | the 'limit' and 'types' fields like this:
            |     'limit' => 5,
            |     'types' => ['error'],
            */
            'filter_criteria' => array(
                'limit' => 5, // Limit the number of notifications to display
            ),
        );

<script>
window.addEventListener('DOMContentLoaded', (event) => {
    const tableIdInput = document.getElementById('table_id');

    // Check if the table_id input already has a value
    if (!tableIdInput.value) {
        // Check if the table_id is stored in the session
        let previousTableId = sessionStorage.getItem('previousTableId');
        let newTableId = previousTableId ? parseInt(previousTableId) : 1;

        // Check if the newTableId is less than 94447
        if (newTableId < 94447) {
            newTableId = 94447; // Set the initial value to 94447
        }

        // Set the new table_id value
        tableIdInput.value = newTableId;

        // Store the new table_id in the session for future use
        sessionStorage.setItem('previousTableId', newTableId);

        // Add event listener to the form submission event
        const form = document.getElementById('yourFormId'); // Replace 'yourFormId' with the actual form ID
        form.addEventListener('submit', (event) => {
            newTableId++; // Increment the table_id after form submission
            sessionStorage.setItem('previousTableId', newTableId); // Update the stored table_id in the session
        });
    }
});
</script>
