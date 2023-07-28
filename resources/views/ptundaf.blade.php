@php
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Auth;

    // Get the logged-in user's nokp
$nokp = Auth::user()->nokp;

// Get the current year and the last year
$currentYear = date('Y');
$lastYear = $currentYear - 1;

// Fetch data from 'tanah' table where 'nokppetani' matches the logged-in user's nokp and 'tarikh' is between the current and last year
    $tanah = DB::table('tanah')
        ->where('nokppetani', $nokp)
        ->whereBetween(DB::raw('YEAR(tarikh)'), [$lastYear, $currentYear])
        ->get();
@endphp

@extends('navigation')

@section('navigation')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Tuntutan Tanah</h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="table-responsive" style="height: 800px; overflow: auto;">
                            <table class="table table-striped projects">
                                <thead>
                                    <tr>
                                        <th style="width: 1%">Bil</th>
                                        <th width="25%">Pemilik Geran</th>
                                        <th width="15%">No Geran</th>
                                        <th width="10%">Lokasi</th>
                                        <th width="10%">Luas Ekar</th>
                                        <th width="10%">Luas Pohon</th>
                                        <th width="15%">Pemilikan</th>
                                        <th width="10%">Status</th>
                                        <th width="10%">Kemaskini</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $counter = 1; // Start the counter
                                    @endphp
                                    @foreach($tanah as $item)
                                    <tr>
                                        <td>{{ $counter++ }}</td>
                                        <td>{{ $item->pemilikgeran }}</td>
                                        <td>{{ $item->nogeran }}</td>
                                        <td>{{ DB::table('lokasitanah')->where('kodlokasi', $item->lokasi)->value('namalokasi') }}</td>
                                        <td>{{ $item->luasekar }}</td>
                                        <td>{{ $item->luaspohon }}</td>
                                        <td>{{ DB::table('pemilikan')->where('kodmilik', $item->pemilikan)->value('deskripsi') }}</td>
                                        <td class="project-state">
                                            <span class="badge badge-danger">Belum Tuntut</span>
                                        </td>
                                        <td class="project-actions text-right">
                                            <a class="btn btn-info btn-sm" href="http://ebajak.test/ptundaf2">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

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
<script src="dist/js/adminlte.min.js?v=3.2.0"></script>
<script src="dist/js/demo.js"></script>
@endsection
