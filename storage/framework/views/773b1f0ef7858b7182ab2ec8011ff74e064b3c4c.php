<?php
    use Illuminate\Support\Facades\DB;
    $user_id = DB::table('daftar')->where('user_id', Auth::user()->id)->value('user_id');
?>



<?php $__env->startSection('navigation'); ?>
<div class="content-wrapper">

    <div class="back-button">
        <a href="<?php echo e(route('tanahindex')); ?>" class="btn btn-secondary" style="margin-top: 15px;margin-left: 15px;">Kembali</a>
    </div>

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Daftar Tanah</h1>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="<?php echo e(isset($tanah) ? route('senaraitanah.update', $tanah->table_id) : route('senaraitanah.store')); ?>" method="POST">
                            <?php echo csrf_field(); ?>

                            <!-- Add a hidden input field to store the tanah record ID -->
                            <?php if(isset($tanah)): ?>
                                <?php echo method_field('PUT'); ?>
                                <input type="hidden" name="id" value="<?php echo e(isset($tanah) ? $tanah->table_id : ''); ?>">
                            <?php endif; ?>

                            <div class="form-group">
                                <label for="table_id">Table ID</label>
                                <input type="text" class="form-control" id="table_id" name="table_id" value="<?php echo e(DB::table('tanah')->where('table_id', Auth::user()->id)->value('table_id')); ?>">
                            </div>

                            <div class="form-group">
                                <label for="bil">Bil</label>
                                <input type="text" class="form-control" id="bil" name="bil" value="<?php echo e(DB::table('tanah')->where('table_id', Auth::user()->id)->value('bil')); ?>">
                            </div>

                            <div class="form-group">
                                <label for="pohonid">Pohon ID</label>
                                <input type="text" class="form-control" id="pohonid" name="pohonid"
                                value="<?php echo e($user_id); ?>" readonly>
                            </div>


                                <div class="form-group">
                                    <label for="nama_pemilik">Nama Pemilik</label>
                                    <input type="text" class="form-control" id="pemilikgeran" name="pemilikgeran" value="<?php echo e(DB::table('tanah')->where('table_id', Auth::user()->id)->value('pemilikgeran')); ?>">
                                </div>
                                <div class="form-group">
                                    <label for="no_geran">No.Geran</label>
                                    <input type="text" class="form-control" id="nogeran" name="nogeran" value="<?php echo e(DB::table('tanah')->where('table_id', Auth::user()->id)->value('nogeran')); ?>">
                                </div>
                                <div class="form-group">
                                    <label for="lokasi_tanah">Lokasi Tanah</label>
                                    <select class="form-control" id="lokasi" name="lokasi">
                                        <option value="">Sila pilih...</option>
                                        <?php $__currentLoopData = DB::table('lokasitanah')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lokasi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($lokasi->kodlokasi); ?>"><?php echo e($lokasi->namalokasi); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="luas_dalam_geran">Luas Dalam Geran (Ekar)</label>
                                    <input type="text" class="form-control" id="luasekar" name="luasekar" value="<?php echo e(DB::table('tanah')->where('table_id', Auth::user()->id)->value('luasekar')); ?>">
                                </div>
                                <div class="form-group">
                                    <label for="luas_dipohon">Luas Dipohon/Musim (Ekar)</label>
                                    <input type="text" class="form-control" id="luaspohon" name="luaspohon" value="<?php echo e(DB::table('tanah')->where('table_id', Auth::user()->id)->value('luaspohon')); ?>">
                                </div>
                                <div class="form-group">
                                    <label for="pemilikan_tanah">Pemilikan Tanah</label>
                                    <select class="form-select" id="pemilikan" name="pemilikan">
                                        <option value="0">Sila Pilih...</option>
                                        <option value="1">Sendiri</option>
                                        <option value="2">Sewa</option>
                                        <option value="3">Tuntut Waris</option>
                                    </select>
                                </div>




                            <!-- Add more form fields for other tanah properties -->

                            <button type="submit" class="btn btn-success">Tambah Tanah</button>
                        </form>
                        <script>
                            window.addEventListener('DOMContentLoaded', (event) => {
                                const tableIdInput = document.getElementById('table_id');

                                // Check if the table_id input already has a value
                                if (!tableIdInput.value) {
                                    // Generate a new table_id
                                    const previousTableId = localStorage.getItem('previousTableId');
                                    let newTableId = previousTableId ? parseInt(previousTableId) + 1 : 1;

                                    // Check if the newTableId is less than 94446
                                    if (newTableId < 94446) {
                                        newTableId = 94446; // Set the initial value to 94446
                                    }

                                    // Set the new table_id value
                                    tableIdInput.value = newTableId;

                                    // Store the new table_id in local storage for future use
                                    localStorage.setItem('previousTableId', newTableId);
                                }
                            });
                        </script>

                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
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
<?php $__env->stopSection(); ?>


<?php echo $__env->make('navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\project-master\resources\views/senaraitanah.blade.php ENDPATH**/ ?>