@extends('navigation')

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@section('navigation')
    <div class="content-wrapper" style="overflow-y: auto;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Senarai Tanah</h1>
            <head>Jika tahun dalam senarai di bawah bukan tahun semasa, sila klik butang  <button class="btn btn-success disabled-button">Kemaskini Senarai</button></head>
            <br>
            <head>Sekiranya anda TIDAK ingin menuntut tanah di bawah, sila klik butang  <button class="btn btn-danger disabled-button">Padam</button> pada tanah tersebut.</head><br>

        </section>

        <!-- Main content -->
        <section class="content">
            <div class="card">
                <div class="card-body">
                    <button class="btn btn-success mr-2 mb-3" id="refresh-button">Kemaskini Senarai</button>
                    <a class="btn btn-success mr-2 mb-3" href="{{ route('senaraitanah') }}">Tambah Tanah Baru</a>
                    <a href="{{ route('pet_cetak', ['table_id' => isset($item->table_id) ? $item->table_id : '']) }}"
                        target="_blank"
                        class="btn btn-info mr-2 mb-3"
                        {{-- onclick="return confirm('Teruskan ke Cetakan Borang PP13.1')" --}}
                        onclick="printPage(event)">Cetak Borang PP13.1</a>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center">Bil</th>
                                        <th class="text-center">Tahun</th>
                                        <th class="text-center">Pemilik Geran</th>
                                        <th class="text-center">No Geran</th>
                                        <th class="text-center">Lokasi</th>
                                        <th class="text-center">Pemilikan</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Tindakan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $counter = 1;
                                    @endphp
                                    @foreach ($tanah as $index => $item)
                                        <tr>
                                            <td class="text-center">{{ $counter++ }}</td>
                                            <td class="text-center">{{ $item->tarikh }}</td>
                                            <td class="text-center">{{ $item->pemilikgeran }}</td>
                                            <td class="text-center">{{ $item->nogeran }}</td>
                                            <td class="text-center">{{ $item->lokasi }}</td>
                                            <td class="text-center">{{ $item->pemilikan }}</td>
                                            <td class="text-center"><span class="badge bg-danger">Belum Tambah Geran</span></td>
                                            <td class="text-center">
                                                <a href="{{ route('tanah.delete', ['id' => $item->table_id, 'success' => true]) }}"
                                                    class="btn btn-danger" style="margin-bottom: 10px;"
                                                    onclick="return confirm('Anda pasti untuk memadam geran tanah ini?')">Padam</a>
                                                <a href="#" class="btn btn-primary" style="margin-bottom: 10px;"
                                                    onclick="toggleRowExpansion(event, '{{ $index }}')">Tambah Geran</a>

                                                <tr id="expandableRow{{ $index }}" style="display: none;">
                                                    <td colspan="5">
                                                        <div>
                                                            <form action="{{ route('upload') }}" method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                <div class="form-group">
                                                                    <input type="file" name="file" accept=".pdf" required>
                                                                </div>
                                                                <button type="submit" class="btn btn-primary">Muatnaik fail</button>
                                                                <small>*PDF sahaja</small>
                                                            </form>
                                                        </div>
                                                        <div>
                                                            <p>something to put here for future reference etc</p>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <!-- /.content-wrapper -->


@endsection

    <style>
        .disabled-button {
        pointer-events: none;
        opacity: 1; /* Optionally reduce the opacity to indicate the button is disabled */
        /* Add any other styles you want to apply to the disabled button */
        }
    </style>

    <style>
        tr.expandable-row-expanded {
            display: table-row; /* Show the expanded row as a table row */
        }

        html,
        body {
            height: 100%; /* Set the height of the page to 100% */
            margin: 0;
            padding: 0;
        }

        main {
            min-height: calc(100% - 100px); /* Subtract the height of the footer from the total height of the page */
        }
    </style>

{{-- SCRIPTS --}}
@section('scripts')
    {{-- this script is used to check if there are no records --}}
    <script>
        $(document).ready(function() {
            // Check if there are no records
            if ($('.table tbody tr').length === 0) {
                $('.table tbody').append('<tr><td colspan="6" class="text-center">Tiada rekod</td></tr>');
            }
        });
    </script>

    <script>
        function toggleRowExpansion(event, index) {
            event.preventDefault();
            var row = document.getElementById('expandableRow' + index);
            if (row.style.display === 'table-row') {
                row.style.display = 'none'; // Hide the row if already expanded
            } else {
                row.style.display = 'table-row'; // Show the row if not expanded
            }
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
            $('#refresh-button').click(function() {
                $.ajax({
                    url: "{{ route('tanahindex.updateyear') }}",
                    type: "GET",
                    success: function(response) {
                    // Handle the success response, if needed
                    Swal.fire({
                    title: 'Kemaskini',
                    text: 'Berjaya!',
                    icon: 'success'
                }).then(() => {
                    location.reload(); // Refresh the page
                });
            },
                    error: function(xhr) {
                        // Handle the error response, if needed
                    }
                });
            });
        });
    </script>

    <script>
    function printPage(event) {
        event.preventDefault(); // Prevent the link from navigating immediately

        var printWindow = window.open(event.target.href, '_blank'); // Open the new tab
        printWindow.onload = function() {
            printWindow.print(); // Trigger the print dialog
        };
    }
    </script>
@endsection

