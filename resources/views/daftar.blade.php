@extends('navigation')

@section('navigation')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Sistem Pembayaran Subsidi Pembajakan Sawah Padi
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
        <form action="{{ route('daftar.update') }}" method="POST">
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
                    <label for="pemohon">Nama Pemohon :</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Pemohon" value="{{ $userData && $userData->nama ? $userData->nama : Auth::user()->nama }}" readonly><br>

                    <label for="pendaftaran">No.Kad Pengenalan :</label>
                    <input type="text" class="form-control" id="nokp" name="nokp" placeholder="No.Kad Pengenalan" value="{{ $userData && $userData->nokp ? $userData->nokp : Auth::user()->nokp }}" readonly><br>

                    <div class="form-group">
                        <label>Jantina</label><br>
                        <div class="form-check-inline" style="margin-left: 15px; margin-right: 100px">
                            <input class="form-check-input" type="radio" name="jantina" id="rd_jantina1" value="L" {{ $userData->jantina == 'L' ? 'checked' : '' }}>
                            <label class="form-check-label" for="rd_jantina1">Lelaki</label>
                        </div>
                        <div class="form-check-inline">
                            <input class="form-check-input" type="radio" name="jantina" id="rd_jantina2" value="P" {{ $userData->jantina == 'P' ? 'checked' : '' }}>
                            <label class="form-check-label" for="rd_jantina2">Perempuan</label>
                        </div>
                    </div>

                    <!-- textarea -->
                    <label>Alamat :</label>
                    <textarea class="form-control" rows="3" placeholder="Alamat ..." name="alamat" maxlength="255" required>{{ $userData->alamat }}</textarea><br>

                    <label for="poskod">Poskod :</label>
                    <input type="text" class="form-control" id="poskod" name="poskod" placeholder="Poskod" pattern="[0-9]{5}" maxlength="5" required value="{{ $userData->poskod }}"><br>

                    <!-- select daerah-->
                    <label for="daerah">Daerah :</label>
                    <select class="form-control" name="daerah">
                        <option value="">Sila pilih...</option>
                        @foreach (DB::table('daerah')->get() as $daerah)
                            <option value="{{ $daerah->koddaerah }}" {{ DB::table('petanibajak')->where('nokp', Auth::user()->nokp)->value('daerah') == $daerah->koddaerah ? 'selected' : '' }}>
                                {{ $daerah->namadaerah }}
                            </option>
                        @endforeach
                    </select><br>

                    <label for="notelrumah">No. Telefon :</label>
                    <input type="text" class="form-control" id="telrumah" name="telrumah" placeholder="No.Telefon" value="{{ $userData->telrumah }}"><br>

                    <label for="notel">No. Lain yang boleh dihubungi :</label>
                    <input type="text" class="form-control" id="telhp" name="telhp" placeholder="Handphone" data-inputmask="'mask': ['999-999-99999 ', '+099 99 99 9999[9]-9999']" data-mask=""
                    inputmode="text" placeholder="___-___-_____" pattern="[0-9]{1,11}" title="Sila masukkan nombor telefon lengkap" value="{{ $userData->telhp }}"><br>

            </div> <!-- /.form-group -->
            </div> <!-- /.box-body -->
            </div> <!-- /.box -->
            </div> <!--/.col (left) -->

            <!-- right column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">MAKLUMAT LAIN</h3>
                    </div>
                    <div class="form-group">
                        <!-- /.box-header -->
                        <div class="box-body">
                            <label>No.Kad Petani</label><small>(jika ada)</small>
                            <div class="input-group date">
                                <input type="text" class="form-control" placeholder="No. Kad Petani (jika ada)" name="nopetani" id="nopetani" value="{{ $userData->nopetani }}">
                            </div><br>
                            <label>Tahun Permohonan :</label>
                            <div class="input-group date">
                                <input name="tahunpohon" type="text" class="form-control" id="tahunpohon" value="{{ date('Y') }}">
                            </div><p id="yearValidationMessage" style="color: red; display: none;">Tahun permohonan tidak boleh kurang daripada tahun kini.</p>
                            <br>

                <div class="form-group">
                    <label>Pendaftaran</label><br>
                    <div class="form-check-inline" style="margin-left: 15px; margin-right: 100px">
                        <input class="form-check-input" type="radio" name="baru" id="rd_daftar1" value=1 {{ $userData->baru == 1 ? 'checked' : '' }}>
                        <label class="form-check-label" for="rd_daftar1">Baru</label>
                    </div>
                    <div class="form-check-inline">
                        <input class="form-check-input" type="radio" name="baru" id="rd_daftar2" value=2 {{ $userData->baru == 2 ? 'checked' : '' }}>
                        <label class="form-check-label" for="rd_daftar2">Lama</label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="Pemohon">Musim Penanaman</label>
                    <!-- checkbox -->
                    <div class="form-group">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="musim" id="musim" value="1" {{ isset($userData->musim) && $userData->musim == 1 ? 'checked' : '' }}>
                                Luar Musim (Bulan Mac - Julai)
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="musim2" id="musim2" value="1" {{ isset($userData->musim2) && $userData->musim2 == 1 ? 'checked' : '' }}>
                                Musim Utama (Bulan Ogos - Feb)
                            </label>
                        </div>
                    </div>
                </div>

                <label for="stesen">Jabatan :</label>
                    <select class="form-control" name="stesen">
                        <option value="">Sila pilih...</option>
                        @foreach (DB::table('stesen')->get() as $stesen)
                            <option value="{{ $stesen->stationcode }}" {{ DB::table('petanibajak')->where('nokp', Auth::user()->nokp)->value('stesen') == $stesen->stationcode ? 'selected' : '' }}>
                                {{ $stesen->stationdesc }}
                            </option>
                        @endforeach
                    </select><br>

                <label for="tarikh" style="margin-bottom: 6px">Tarikh Memohon :</label>
                <div class="form-group">
                    <input type="date" name="tarpohon" id="tarpohon" class="form-control" value="{{ $tarikhMemohon }}">
                </div>
                {{-- <p id="dateValidationMessage" style="color: red; display: none;">Tarikh tidak boleh sebelum tarikh semasa.</p> --}}

                <div class="box-footer">
                    <button type="submit" style="margin-top:2rem" class="btn btn-primary">Kemaskini</button>
                </div>
                </div> <!-- /.form-group -->
                </div> <!-- /.box-body -->
                </div> <!-- /.box -->
                </div> <!--/.col (right) -->
                </div> <!-- /.row -->
                </section>
                </form>

</div>
</div><!--content wrapper-->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
{{-- <script src="plugins/jquery/jquery.min.js"></script> , after commented this, logout dropout working herm--}}
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>

{{-- <script>
    $(document).ready(function() {
        $('#notel').inputmask('(999) 999-9999', {
            greedy: false,
            placeholder: '(___) ___-____'
        });
    });
</script> need to modify later--}}

<script>
    const tahunPohonInput = document.getElementById('tahunpohon');
    const yearValidationMessage = document.getElementById('yearValidationMessage');

    tahunPohonInput.addEventListener('input', function() {
        const inputYear = parseInt(this.value, 10);
        const currentYear = new Date().getFullYear();

        if (inputYear < 2023) {
            yearValidationMessage.style.display = 'block';
            this.setCustomValidity('Invalid');
        } else {
            yearValidationMessage.style.display = 'none';
            this.setCustomValidity('');
        }
    });
</script>

{{-- <script>
    const tarikhInput = document.getElementById('tarpohon');

    tarikhInput.addEventListener('input', function() {
        const inputDate = new Date(this.value);
        const currentDate = new Date();

        if (inputDate.getTime() < currentDate.getTime()) {
            this.value = currentDate.toISOString().split('T')[0];
        }
    });
</script> can use later--}}
@endsection
