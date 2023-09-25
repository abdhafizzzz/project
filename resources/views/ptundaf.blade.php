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
                                                <td>{{ $item->lokasi }}</td>
                                                <td>{{ $item->luasekar }}</td>
                                                <td>{{ $item->luaspohon }}</td>
                                                <td>{{ $item->pemilikan }}</td>
                                                <td class="project-state">
                                                    @if ($item->tartuntut)
                                                        <span class="badge badge-success badge-sudah-diluluskan">Sudah Tuntut</span>
                                                    @else
                                                        <span class="badge badge-danger badge-sedang-diproses">Belum Tuntut</span>
                                                    @endif
                                                </td>
                                                <td class="project-actions text-right">
                                                    @if (!$item->noakaun)
                                                        <a href="{{ route('ptundaf2', ['table_id' => $item->table_id]) }}" class="btn btn-warning" style="margin-bottom: 10px;">Tuntut</a>
                                                    @endif

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
@endsection
