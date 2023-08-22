<?php if(session('success')): ?>
    <div class="alert alert-success">
        <?php echo e(session('success')); ?>

    </div>
<?php endif; ?>

<?php $__env->startSection('navigation'); ?>
    <div class="content-wrapper" style="overflow-y: auto;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Senarai Tanah</h1>
            <head>Sekiranya anda TIDAK ingin menuntut tanah di bawah, sila klik butang <button class="btn btn-danger disabled-button">Padam</button> pada tanah tersebut.</head><br>
            <head>Jikalau tahun dalam senarai bukanlah tahun sekarang, sila klik butang <button class="btn btn-success disabled-button">Kemaskini Senarai</button></head>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="card">
                <div class="card-body">
                    <button class="btn btn-success mr-2 mb-3" id="refresh-button">Kemaskini Senarai</button>
                    <a class="btn btn-success mr-2 mb-3" href="<?php echo e(route('senaraitanah')); ?>">Tambah Tanah Baru</a>
                    <a href="<?php echo e(route('pet_cetak', ['table_id' => isset($item->table_id) ? $item->table_id : ''])); ?>"
                        target="_blank"
                        class="btn btn-info mr-2 mb-3"
                        onclick="return confirm('Teruskan ke Cetakan Borang PP13.1')">Cetak Borang PP13.1</a>
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
                                    <?php
                                        $counter = 1;
                                    ?>
                                    <?php $__currentLoopData = $tanah; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td class="text-center"><?php echo e($counter++); ?></td>
                                            <td class="text-center"><?php echo e($item->tarikh); ?></td>
                                            <td class="text-center"><?php echo e($item->pemilikgeran); ?></td>
                                            <td class="text-center"><?php echo e($item->nogeran); ?></td>
                                            <td class="text-center"><?php echo e($item->lokasi); ?></td>
                                            <td class="text-center"><?php echo e($item->pemilikan); ?></td>
                                            <td class="text-center"><span class="badge bg-danger">Belum Tambah Geran</span></td>
                                            <td class="text-center">
                                                <a href="<?php echo e(route('tanah.delete', ['id' => $item->table_id, 'success' => true])); ?>"
                                                    class="btn btn-danger" style="margin-bottom: 10px;"
                                                    onclick="return confirm('Anda pasti untuk memadam geran tanah ini?')">Padam</a>
                                                <a href="#" class="btn btn-primary" style="margin-bottom: 10px;"
                                                    onclick="toggleRowExpansion(event, '<?php echo e($index); ?>')">Tambah Geran</a>

                                                <tr id="expandableRow<?php echo e($index); ?>" style="display: none;">
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
    <!-- /.content-wrapper -->


<?php $__env->stopSection(); ?>

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
                    url: "<?php echo e(route('tanahindex.updateyear')); ?>",
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

    
<?php $__env->stopSection(); ?>


<?php echo $__env->make('navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\project-master\resources\views/tanahindex.blade.php ENDPATH**/ ?>