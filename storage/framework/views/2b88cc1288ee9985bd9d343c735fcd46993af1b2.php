<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

$tanah = DB::table('tanah')->where('pohonid', Auth::user()->id)->paginate(10);
// $userData = DB::table('tanah')->where('pohonid', Auth::user()->id)->first();
?>



<?php $__env->startSection('navigation'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Senarai Tanah</h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <?php echo e($tanah->links()); ?>

                        <a class="btn btn-success" style="float:right;margin-bottom: 15px;margin-right: 15px" href="<?php echo e(route('senaraitanah')); ?>">Tambah Tanah Baru</a>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="tanahTable" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th width="6%">Table ID</th>
                                    <th width="6%">Bilangan</th>

                                    <th width="6%">Bil ID</th>
                                    <th width="25%">Pohon ID</th>
                                    <th width="25%">Pemilik Geran</th>
                                    <th width="15%">No Geran</th>
                                    <th width="10%">Lokasi</th>
                                    <th width="10%">Luas Ekar</th>
                                    <th width="10%">Luas Pohon</th>
                                    <th width="15%">Pemilikan</th>
                                    <th width="10%">Tindakan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $counter = ($tanah->currentPage() - 1) * $tanah->perPage() + 1;
                                ?>
                                <?php $__currentLoopData = $tanah; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    
                                    <td><?php echo e($item->table_id); ?></td>
                                    <td><?php echo e($counter++); ?></td>


                                    <td><?php echo e($item->bil); ?></td>
                                    <td><?php echo e($item->pohonid); ?></td>
                                    <td><?php echo e($item->pemilikgeran); ?></td>
                                    <td><?php echo e($item->nogeran); ?></td>
                                    <td><?php echo e($item->lokasi); ?></td>
                                    <td><?php echo e($item->luasekar); ?></td>
                                    <td><?php echo e($item->luaspohon); ?></td>
                                    <td><?php echo e($item->pemilikan); ?></td>
                                    <td style="text-align: center;">
                                        <a href="<?php echo e(route('edit-tanah', ['id' => $item->pohonid])); ?>" class="btn btn-warning" style="margin-bottom: 10px;">Edit</a>

                                        <a href="<?php echo e(route('pet_cetak', ['table_id' => isset($tanah->table_id) ? $tanah->table_id : ''])); ?>" class="btn btn-info" style="margin-bottom: 10px;">PDF Cetak</a>

                                        <a href="<?php echo e(route('edit-tanah', ['id' => $item->pohonid])); ?>" class="btn btn-primary" style="margin-bottom: 10px;">Tambah Geran</a>

                                        <a href="<?php echo e(route('tanah.delete', ['id' => $item->table_id, 'success' => true])); ?>" class="btn btn-danger" style="margin-bottom: 10px;" onclick="return confirm('Are you sure you want to delete this?')">Padam</a>

                                    </td>


                                    
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                            <tfoot>

                                




                        <tr>
                            <th width="6%"></th>
                            <th width="25%">JUMLAH</th>
                            <th width="11%"></th>
                            <th width="15%"></th>
                            <th width="15%"></th>
                            <th width="15%"></th>
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
                <?php echo e($tanah->links()); ?>


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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\project-master\resources\views/tanahindex.blade.php ENDPATH**/ ?>