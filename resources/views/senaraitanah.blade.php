
@extends('navigation')


@section('navigation')
    <div class="content-wrapper container">

                            <section class="content-header">
                                <h1>Senarai Tanah </h1>
                            </section>

                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="box">
                                        <div class="box-header">
                                            <h3 class="box-title"></h3>
                                        </div>
                                        <!-- /.box-header -->
                                        <div class="box-body">
                                            <table id="example2" class="table table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th width="6%">Bil</th>
                                                        <th width="25%">Nama Pemilik<BR>Dalam Geran</th>
                                                        <th width="11%">No.Geran</th>
                                                        <th width="15%">Lokasi Tanah</th>
                                                        <th width="15%">Luas Dalam Geran<BR>(Ekar)</th>
                                                        <th width="12%">Luas Dipohon/<BR>Musim (Ekar)</th>
                                                        <th width="11%">Pemilikan Tanah</th>
                                                        <th width="11%">Muatnaik Geran</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>-</th>
                                                        <th><input type="text" class="form-control"
                                                                placeholder="Nama Pemilik" name="pemilik"></th>
                                                        <th><input type="text" class="form-control"
                                                                placeholder="No.Geran" name="nogeran"></th>
                                                        <th><select class="form-control" name="daerah_id">
                                                                <option value="">Sila pilih...</option>
                                                                @foreach (DB::table('lokasitanah')->get() as $lokasi)
                                                                    <option value="{{ $lokasi->kodlokasi }}">
                                                                        {{ $lokasi->namalokasi }}</option>
                                                                @endforeach
                                                            </select>
                                                        </th>
                                                        <th><input type="text" class="form-control"
                                                                placeholder="Luas Geran" name="luasgeran"></th>
                                                        <th><input type="text" class="form-control"
                                                                placeholder="Luas Dipohon" name="luaspohon"></th>
                                                        <th><select class="form-select" name="pemilikan">
                                                                <option value="0">Sila Pilih...</option>
                                                                <option value="1">
                                                                    Sendiri </option>
                                                                <option value="2">
                                                                    Sewa </option>
                                                                <option value="3">
                                                                    Tuntut Waris </option>
                                                            </select></th>
                                                        <th>



                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="card card-default">
                                                                        <div class="card-body">
                                                                            <form action="/target" class="dropzone"
                                                                                id="myDropzone">
                                                                                <div class="row">
                                                                                    <div class="col-lg-6">
                                                                                        <div class="btn-group w-100">
                                                                                            <span
                                                                                                class="btn btn-success col fileinput-button">
                                                                                                <i class="fas fa-plus"></i>
                                                                                                <span>Tambah fail</span>
                                                                                            </span>
                                                                                            <button type="button"
                                                                                                class="btn btn-primary col start">
                                                                                                <i
                                                                                                    class="fas fa-upload"></i>
                                                                                                <span>Mula Muatnaik</span>
                                                                                            </button>
                                                                                            <button type="button"
                                                                                                class="btn btn-warning col cancel">
                                                                                                <i
                                                                                                    class="fas fa-times-circle"></i>
                                                                                                <span>Batal Muatnaik</span>
                                                                                            </button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </th>






                                                    <tr>
                                                        <th width="6%"></th>
                                                        <th width="25%">JUMLAH</th>
                                                        <th width="11%"></th>
                                                        <th width="15%"></th>
                                                        <th width="15%"><input type="text" class="form-control"
                                                                placeholder="Luas Geran" name="jumlahluasgeran" value=0>
                                                        </th>
                                                        <th width="12%"><input type="text" class="form-control"
                                                                placeholder="Luas DiPohon" name="jumlahluaspohon" value=0>
                                                        </th>
                                                        <th width="11%"></th>
                                                        <th width="11%"></th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                        <!-- /.box-body -->
                                    </div>
                                    <!-- /.box -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                            <div class="box-footer" style="text-align:center;">
                                <button type="submit" class="btn btn-primary" name="submit1" id="submit1"
                                    value="SimpanJumlah">Simpan</button>

                                <button onclick="window.open('pet_cetak.php?a=aa&t=2023')" type="button"
                                    class="btn btn-primary" name="cetakp" value="Cetakp">Cetak PP13.1</button>

                            </div>

                        </section>
                        <!-- /.content -->
                        </form>

                        <!-- Update Kawasan Modal Form -->
                        <div id="id01" class="modal">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div id="headerbox">
                                        <a href="#" class="closebtn">×</a>
                                        <h4><i class="fa fa-edit"></i> Kemaskini Tanah</h4>
                                    </div>
                                    <div class="container">
                                        <div class="col-md-12">
                                            <div class="card card-user">
                                                <div class="card-body">

                                                    <form id="tanah_ed" name="tanah_ed" method="POST"
                                                        action="tanah_edact.php">
                                                        <div class="row">
                                                            <div class="col-md-10">
                                                                <div class="form-group">
                                                                    <label>Pemilik Geran</label>
                                                                    <input type="text" name="pemilik"
                                                                        class="form-control font-capitalize"
                                                                        value="">
                                                                    <input type="hidden" name="bil"
                                                                        class="form-control font-capitalize"
                                                                        value="">
                                                                    <input type="hidden" name="pohonid"
                                                                        class="form-control font-capitalize"
                                                                        value="2570">
                                                                    <input type="hidden" name="idpet"
                                                                        class="form-control font-capitalize"
                                                                        value="aa">
                                                                    <input type="hidden" name="tahun"
                                                                        class="form-control font-capitalize"
                                                                        value="2023">

                                                                    <label>No. Geran</label>
                                                                    <input type="text" name="nogeran"
                                                                        class="form-control font-capitalize"
                                                                        value="">
                                                                    <label>Lokasi Tanah</label>
                                                                    <select class="form-control" name="daerah_id">
                                                                        <option value="">Sila pilih...</option>
                                                                        @foreach (DB::table('lokasitanah')->get() as $lokasi)
                                                                            <option value="{{ $lokasi->kodlokasi }}">
                                                                                {{ $lokasi->namalokasi }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    <label>Luas Dalam Geran (Ekar)</label>
                                                                    <input type="text" name="luasekar"
                                                                        class="form-control font-capitalize"
                                                                        value="">
                                                                    <label>Luas Dipohon/Musim (Ekar)</label>
                                                                    <input type="text" name="luaspohon"
                                                                        class="form-control font-capitalize"
                                                                        value="">
                                                                    <label>Pemilikan Tanah</label>
                                                                    <select class="form-select" name="pemilikan">
                                                                        <option value="0">Sila Pilih...</option>
                                                                        <option value="1">Sendiri </option>

                                                                        <option value="2">Sewa </option>

                                                                        <option value="3">Tuntut Waris </option>

                                                                    </select>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <button type="submit" name="submit1"
                                                                    class="btn btn-success btn-round" id="submit1"
                                                                    value="update"><i class="fa fa-pencil"></i>
                                                                    Kemaskini</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Update Users Closed -->

                    </div>
                    <footer class="main-footer"><b>Dibangunkan & Hakcipta Terpelihara</b><strong> &copy; 2020 <a
                                href="http://www.jpkn.sabah.gov.my">JPKN</a>.</strong>
                    </footer>
                </div><!-- /.content-wrapper -->

                <!-- Control Sidebar -->
                <aside class="control-sidebar control-sidebar-dark">
                    <!-- Control sidebar content goes here -->
                </aside>
                <!-- /.control-sidebar -->
            </div>
            <!-- ./wrapper -->

            <!-- jQuery -->
            <script src="plugins/jquery/jquery.min.js"></script>
            <!-- jQuery UI 1.11.4 -->
            <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
            <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
            <script>
                $.widget.bridge('uibutton', $.ui.button)
            </script>


            <!-- Add the following JavaScript code -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>
            <script>
                Dropzone.autoDiscover = false;
                var myDropzone = new Dropzone("#myDropzone", {
                    // Configure Dropzone options here
                });

                // Add event listeners for the buttons
                document.querySelector('.fileinput-button').addEventListener('click', function() {
                    myDropzone.hiddenFileInput.click();
                });

                document.querySelector('.start').addEventListener('click', function() {
                    myDropzone.processQueue();
                });

                document.querySelector('.cancel').addEventListener('click', function() {
                    myDropzone.removeAllFiles();
                });
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
            <!-- daterangepicker -->
            <script src="plugins/moment/moment.min.js"></script>
            <script src="plugins/daterangepicker/daterangepicker.js"></script>
            <!-- Tempusdominus Bootstrap 4 -->
            <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
            <!-- Summernote -->
            <script src="plugins/summernote/summernote-bs4.min.js"></script>
            <!-- overlayScrollbars -->
            <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
            <!-- AdminLTE App -->
            <script src="dist/js/adminlte.js"></script>
            <!-- AdminLTE for demo purposes -->
            <script src="dist/js/demo.js"></script>
            <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
            <script src="dist/js/pages/dashboard.js"></script>
            </body>

            </html>
