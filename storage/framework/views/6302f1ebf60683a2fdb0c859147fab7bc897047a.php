<?php $__env->startSection('navigation'); ?>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <a href="<?php echo e(url('carian')); ?>" class="btn btn-info" style="margin-top: 15px; margin-left: 15px;">Reset</a>
        </section>

        <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>


        <!-- Main content -->
        <section class="content">
            <div class="container">
                <div class="row">
                    <!-- center column -->
                    <div class="col-md-6 offset-md-3">
                        <!-- general form elements -->
                        <div class="card">
                            <div class="card-header bg-olive">
                                <h3 class="card-title">Semak Status Tuntutan</h3>
                            </div>
                            <div class="card-body">
                                <form class="search-form" method="post" action="<?php echo e(route('carian')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <input type="text" name="search" class="form-control mb-3"
                                        placeholder="No.Kad Pengenalan" value="<?php echo e(Auth::user()->nokp); ?>" hidden>
                                    <h4 class="text-center"><?php echo e(Auth::user()->nama); ?></h4>
                                    <p class="text-center">No Kad Pengenalan <br><?php echo e(Auth::user()->nokp); ?></p>
                                    <div class="form-group text-center">
                                        <label for="Pemohon">Musim Penanaman</label>
                                        <div class="form-group">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="musim" id="musim" value="1"
                                                        <?php echo e(old('musim') == '1' ? 'checked' : ''); ?>>
                                                    Luar Musim (Bulan Mac - Julai)
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="musim2" id="musim2" value="1"
                                                        <?php echo e(old('musim2') == '1' ? 'checked' : ''); ?>>
                                                    Musim Utama (Bulan Ogos - Feb)
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="text" name="tahun" class="form-control"
                                                    placeholder="Tahun">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <button type="submit" name="submit1" class="btn btn-danger btn-block">
                                                    <span style="margin-right: 5px;">Cari</span>
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Display search results -->
        <?php if(isset($searchResults) && !$searchResults->isEmpty()): ?>
            <div class="card mt-4">
                <div class="card-header bg-olive">
                    <h3 class="card-title">Hasil Carian</h3>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="bg-olive">
                            <tr>
                                <th style="width: 15%" class="text-center">Tarikh</th>
                                <th style="width: 15%" class="text-center">Stesen</th>
                                <th style="width: 25%" class="text-center">Pemilik Geran</th>
                                <th style="width: 10%" class="text-center">No Geran</th>
                                <th style="width: 15%" class="text-center">Luas Pohon (ekar)</th>
                                <th style="width: 25%" class="text-center">Jumlah Tuntutan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $searchResults; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="text-center"><?php echo e(date('d/m/Y', strtotime($result->tahunpohon))); ?></td>
                                    <td><?php echo e($result->stationdesc); ?></td>
                                    <td><?php echo e($result->pemilikgeran); ?></td>
                                    <td><?php echo e($result->nogeran); ?></td>
                                    <td class="text-center"><?php echo e($result->luaspohon); ?></td>
                                    <td class="text-center">
                                        <?php if($result->nopenyatamusim): ?>
                                            <span class="badge badge-success badge-sudah-diluluskan">DILULUSKAN</span>
                                            <span class="badge badge-success badge-sudah-diluluskan">No Penyata
                                                (No.<?php echo e($result->nopenyatamusim); ?>)</span>
                                        <?php else: ?>
                                            <span class="badge badge-warning badge-sedang-diproses">Sedang Diproses</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php endif; ?>
        <!-- End of display search results -->
    </div>
    <!-- ... (rest of the content) ... -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\project-master\resources\views/carian.blade.php ENDPATH**/ ?>