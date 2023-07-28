<?php
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
?>



<?php if(session('success')): ?>
    <div class="alert alert-success">
        <?php echo e(session('success')); ?>

    </div>
<?php endif; ?>

<?php $__env->startSection('navigation'); ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Senarai Tanah</h1>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="card">
                <div class="card-body">
                    <a class="btn btn-success float-left mr-2 mb-3" href="<?php echo e(route('senaraitanah')); ?>">Tambah Tanah Baru</a>
                    
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Bil</th>
                                    <th>Pemilik Geran</th>
                                    <th>No Geran</th>
                                    <th>Status</th>
                                    <th>Tahun Mohon</th>
                                    <th>Tindakan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $counter = 1;
                                ?>
                                <?php $__currentLoopData = $tanah; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr data-widget="expandable-table" aria-expanded="false">
                                        <td><?php echo e($counter++); ?></td>
                                        <td><?php echo e($item->pemilikgeran); ?></td>
                                        <td><?php echo e($item->nogeran); ?></td>
                                        <td><span class="badge bg-danger">Belum Tuntut</span></td>
                                        <td><?php echo e(date('Y', strtotime($item->tarikh))); ?></td>
                                        <td> <a href="<?php echo e(route('edit-tanah', ['id' => $item->table_id])); ?>"
                                                class="btn btn-warning" style="margin-bottom: 10px;"
                                                onclick=" return confirm('Sila kemaskini data geran tanah')">Edit</a>

                                            <a href="<?php echo e(route('pet_cetak', ['table_id' => isset($item->table_id) ? $item->table_id : ''])); ?>"
                                                class="btn btn-info" style="margin-bottom: 10px;">PDF Cetak</a>


                                            <a href="#" class="btn btn-primary" style="margin-bottom: 10px;"
                                                id="uploadButton">Tambah Geran</a>
                                        </td>
                                    </tr>
                                    <tr class="expandable-body d-none">
                                        <td colspan="5">
                                            <div>
                                                <form action="<?php echo e(route('upload')); ?>" method="POST"
                                                    enctype="multipart/form-data">
                                                    <?php echo csrf_field(); ?>
                                                    <div class="form-group">
                                                        <input type="file" name="file" accept=".pdf" required>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Muatnaik fail</button>
                                                    <small>*PDF sahaja</small>
                                                </form>

                                            </div>
                                            <div>
                                                <p>
                                                    something to put here for future reference etc </p>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\project-master\resources\views/tanahindex.blade.php ENDPATH**/ ?>