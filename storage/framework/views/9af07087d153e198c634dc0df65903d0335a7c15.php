<?php
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Auth;

    // Get the logged-in user's nokp
    $nokp = Auth::user()->nokp;

    // Get the current year
    $currentDate = date('Y-m-d');

    // Fetch data from 'tanah' table where 'nokppetani' matches the logged-in user's nokp and 'tarikh' is in the last year
    $tanah = DB::table('tanah')
            ->whereDate('tarikh', $currentDate)
            ->get();
?>



<?php $__env->startSection('navigation'); ?>
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
                                    <?php
                                    $counter = 1; // Start the counter
                                    ?>
                                    <?php $__currentLoopData = $tanah; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($counter++); ?></td>
                                        <td><?php echo e($item->pemilikgeran); ?></td>
                                        <td><?php echo e($item->nogeran); ?></td>
                                        <td><?php echo e(DB::table('lokasitanah')->where('kodlokasi', $item->lokasi)->value('namalokasi')); ?></td>
                                        <td><?php echo e($item->luasekar); ?></td>
                                        <td><?php echo e($item->luaspohon); ?></td>
                                        <td><?php echo e(DB::table('pemilikan')->where('kodmilik', $item->pemilikan)->value('deskripsi')); ?></td>
                                        <td class="project-state">
                                            <span class="badge badge-danger">Belum Tuntut</span>
                                        </td>
                                        <td class="project-actions text-right">
                                            <a href="<?php echo e(route('ptundaf.edit', ['id' => $item->table_id])); ?>" class="btn btn-warning" style="margin-bottom: 10px;">Edit</a>

                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\project-master\resources\views/ptundaf.blade.php ENDPATH**/ ?>