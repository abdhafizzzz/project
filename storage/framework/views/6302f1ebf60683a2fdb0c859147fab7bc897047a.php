<?php $__env->startSection('navigation'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <a href="<?php echo e(route('carian')); ?>" class="btn btn-info" style="margin-top: 15px; margin-left: 15px;">Kembali</a>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container">
            <div class="row">
                <!-- center column -->
                <div class="col-md-4 offset-md-4">
                    <!-- general form elements -->

                    <h3 class="mt-4 mb-4">Semak Status Tuntutan</h3>
                    <div class="row">
                        <div class="col-md-12">

                            <div class="card card-widget widget-user-2">

                                <div class="widget-user-header bg-olive">
                                    <form class="search-form" method="post" action="<?php echo e(route('carian')); ?>">
                                        <?php echo csrf_field(); ?>
                                        <div class="form-group">
                                            <input type="text" name="search" class="form-control"
                                                placeholder="No.Kad Pengenalan" value="<?php echo e(Auth::user()->nokp); ?>"
                                                hidden>
                                        </div>
                                        <h3 class="widget-user-username"><?php echo e(Auth::user()->nama); ?></h3>
                                        <h5 class="widget-user-desc">No Kad Pengenalan <br> <?php echo e(Auth::user()->nokp); ?></h5>
                                </div>
                                <div>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-sm-4 border-right">
                                            <div class="description-block">
                                                <h5 class="description-header">Carian <br> Tahun</h5>
                                            </div>

                                        </div>

                                        <div class="col-sm-4 border-right">
                                            <div class="description-block">
                                                <h5 class="description-header"> <input type="text" name="tahun"
                                                        class="form-control" placeholder="Tahun">
                                                </h5>
                                            </div>

                                        </div>

                                        <div class="col-sm-4">
                                            <div class="description-block">
                                                <h5 class="description-header"> <button type="submit" name="submit1"
                                                        class="btn btn-danger">
                                                        <span style="margin-right: 5px;">Cari</span>
                                                        <i class="fas fa-search"></i>
                                                    </button></h5>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>

                    </div> <!-- /.box-body -->
                </div> <!-- /.box -->
            </div><!--/.col (center) -->
        </div>
        <!-- /.row -->

        <!-- Display search results -->
        <?php if(isset($searchResults) && !$searchResults->isEmpty()): ?>
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Hasil Carian</h3>
            </div>
            <div class="box-body table-responsive">
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
                            <td class="text-center"> <!-- Add text-center class here -->
                                <?php if($result->amaunlulus): ?>
                                    <span class="badge badge-success badge-sudah-diluluskan">Sudah Diluluskan (RM <?php echo e($result->amaunlulus); ?>)</span>
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
    </section>
    <!-- /.content -->
</div>
<!-- ... (rest of the content) ... -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\project-master\resources\views/carian.blade.php ENDPATH**/ ?>