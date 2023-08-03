<?php
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Auth;

    // Get the logged-in user's nokp
$nokp = Auth::user()->nokp;

    // Fetch data from 'tanah' table where 'nokppetani' matches the logged-in user's nokp and 'tarikh' is in the last year
    $tanah = DB::table('tanah')
        ->where('nokppetani', $nokp)
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
                    <a href="<?php echo e(route('pet_cetak', ['table_id' => isset($item->table_id) ? $item->table_id : ''])); ?>"
                        class="btn btn-info" style="margin-bottom: 10px;"
                        onclick="return confirm('Teruskan ke Cetakan Borang PP13.1')">Cetak Borang PP13.1</a>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <tbody>
                                <?php
                                    $years = [];
                                ?>
                                <?php $__currentLoopData = $tanah; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $year = date('Y', strtotime($item->tarikh));
                                        if (!in_array($year, $years)) {
                                            $years[] = $year;
                                        }
                                    ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    rsort($years);
                                ?>
                                <?php $__currentLoopData = $years; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $year): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="year-row" data-toggle="collapse" data-target="#expandableRow<?php echo e($year); ?>" aria-expanded="false"
                                        aria-controls="expandableRow<?php echo e($year); ?>">
                                        <td colspan="5">
                                            <?php echo e($year); ?>

                                            <span class="arrow"></span>
                                        </td>
                                    </tr>
                                    <tr class="collapse" id="expandableRow<?php echo e($year); ?>">
                                        <td colspan="5">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">Bil</th>
                                                        <th class="text-center">Pemilik Geran</th>
                                                        <th class="text-center">No Geran</th>
                                                        <th class="text-center">Status</th>
                                                        <th class="text-center">Tindakan</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        $counter = 1;
                                                    ?>
                                                    <?php $__currentLoopData = $tanah; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if(date('Y', strtotime($item->tarikh)) == $year): ?>
                                                            <tr>
                                                                <td class="text-center"><?php echo e($counter++); ?></td>
                                                                <td class="text-center"><?php echo e($item->pemilikgeran); ?></td>
                                                                <td class="text-center"><?php echo e($item->nogeran); ?></td>
                                                                <td class="text-center"><span class="badge bg-danger">Belum Tambah Geran</span></td>
                                                                <td class="text-center">
                                                                    <a href="<?php echo e(route('tanah.delete', ['id' => $item->table_id, 'success' => true])); ?>"
                                                                        class="btn btn-danger" style="margin-bottom: 10px;"
                                                                        onclick="return confirm('Anda pasti untuk memadam geran tanah ini?')">Padam</a>
                                                                    <a href="#" class="btn btn-primary" style="margin-bottom: 10px;"
                                                                        onclick="toggleRowExpansion(event, '<?php echo e($index); ?>')">Tambah Geran</a>
                                                                        <a href="<?php echo e(route('tanah.changeDate', ['id' => $item->table_id, 'success' => true])); ?>"
                                                                            class="btn btn-secondary" style="margin-bottom: 10px;"
                                                                            onclick="return confirm('Anda pasti untuk membuat tuntutan?')">Hantar untuk Tuntut</a>
                                                                </td>
                                                            </tr>
                                                            <tr class="collapse" id="expandableRow<?php echo e($index); ?>">
                                                                <td colspan="5">
                                                                    <div>
                                                                        <form action="<?php echo e(route('upload')); ?>" method="POST" enctype="multipart/form-data">
                                                                            <?php echo csrf_field(); ?>
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
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
<?php $__env->stopSection(); ?>

<style>
    .year-row {
        cursor: pointer;
    }

    .arrow {
        display: inline-block;
        width: 10px;
        height: 10px;
        border-top: 2px solid #000;
        border-right: 2px solid #000;
        transform: rotate(-45deg);
        transition: transform 0.3s ease;
        margin-left:
    }

    .year-row[aria-expanded="true"] .arrow {
        transform: rotate(135deg);
    }

    .collapse {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.3s linear;
    }

    .collapse.show {
        max-height: 500px; /* Adjust the value to the maximum height of the expanded row */
        transition: max-height 0.3s linear;
    }

    .year-row {
        position: relative;
        cursor: pointer;
    }

    .year-row .arrow {
        position: absolute;
        top: 50%;
        right: 10px;
        transform: translateY(-50%) rotate(-45deg);
        width: 10px;
        height: 10px;
        border-top: 2px solid black;
        border-right: 2px solid black;
        transition: transform 0.3s ease;
    }

    .year-row[aria-expanded="true"] .arrow {
        transform: translateY(-50%) rotate(135deg);
    }
</style>


<?php $__env->startSection('scripts'); ?>
    
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
            var contentRow = document.getElementById('expandableRow' + index);
            var arrow = event.currentTarget.querySelector('.arrow');

            if (contentRow.classList.contains('show')) {
                contentRow.classList.remove('show');
                arrow.style.transform = 'rotate(-45deg)';
            } else {
                contentRow.classList.add('show');
                arrow.style.transform = 'rotate(135deg)';
            }
        }
    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\project-master\resources\views/tanahindex.blade.php ENDPATH**/ ?>