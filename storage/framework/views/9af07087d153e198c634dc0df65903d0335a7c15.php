<?php
    use Illuminate\Support\Facades\DB;
?>

<?php $__env->startSection('navigation'); ?>
    <html>

    <head>
    </head>




    <!-- Left side column. contains the logo and sidebar -->


    <!-- sidebar: style can be found in sidebar.less -->


    <!-- sidebar menu: : style can be found in sidebar.less -->

    <!-- /.sidebar -->


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Sistem Pembayaran Subsidi Pembajakan Sawah Padi
                
            </h1>
            <ol class="breadcrumb">
                <li><a href="index.php"><i class="fa fa-dashboard"></i> Laman Utama</a></li>
            </ol>
        </section>

        <!-- Main content -->
        <form method="post" action="ptun_daf2act.php" id="ptun_daf2" name="ptun_daf2">
            <section class="content">


                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title"><b>A. TUNTUTAN SUBSIDI PEMBAJAKAN (LUAR MUSIM)</b></h3>
                                </div>
                                <table id="pemohon" class="table table-noborder table-hover">
                                    <tr>


                                            <td width="15%">1. Nama Pemohon</td>
                                            <td width="2%">:</td>
                                            <td width="83%"><input type="text" class="form-control" id="pemohon" name="pemohon" placeholder="Nama Pemohon" value="<?php echo e(Auth::user()->name); ?>" readonly></td>

                                    </tr>
                                    <tr>

                                            <td>2. Kad Pengenalan</td>
                                            <td>:</td>
                                            <td><input type="text" class="form-control" id="nokp" name="nokp" placeholder="No.Kad Pengenalan" value="<?php echo e(Auth::user()->kad_pengenalan); ?>" readonly></td>

                                        <input type="hidden" name="tahun" id="tahun" class="form-control" value=2021>
                                        <input type="hidden" name="nokp" id="nokp" class="form-control"
                                            value=751027125135>
                                        <input type="hidden" name="musimini" id="musimini" class="form-control" value=1>
                                        <input type="hidden" name="pohonid" id="pohonid" class="form-control" value=2148>
                                        </td>
                                    </tr>
                                    <tr>

                                        <td>3. Alamat Perhubungan</td>
                                        <td>:</td>
                                        <td><input type="text" class="form-control" id="nokp" name="alamat" placeholder="alamat" value="<?php echo e(DB::table('daftar')->where('user_id', Auth::id())->value('alamat')); ?>" readonly></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <!--box primary-->
                        <div class="box box-primary">
                            <table width="96%" class="table table-noborder table-hover" id="details">
                                <tr>
                                    <td width="17%">No. Pendaftaran</td>
                                    <td width="2%">:</td>
                                    <td width="81%"><input type="text" class="form-control" id="user_id" name="user_id" placeholder="user_id" value="<?php echo e(Auth::user()->user_id); ?>" readonly></td>
                                </tr>
                                <tr>
                                    <td>Tarikh Permohonan</td>
                                    <td>:</td>
                                    <td><input type="text" class="form-control" id="tarikh" name="tarikh" placeholder="tarikh" value="<?php echo e(Auth::user()->tarikh); ?>" readonly></td></td>
                                </tr>
                                <tr>
                                    <td>No. Geran</td>
                                    <td>:</td>
                                    <td><input type="text" class="form-control" id="nogeran" name="nogeran" placeholder="No. Geran"></td></td>
                                </tr>
                                <tr>
                                    <td>Luas Permohonan (Ekar)</td>
                                    <td>:</td>
                                    <td>
                                        <div class="input-group">
                                            <input type="text" name="luas" id="luas" class="form-control"
                                                value=1.83 onChange="return nilaiRM(this)">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Kampung</td>
                                    <td>:</td>
                                    <td>
                                        <input type="text" class="form-control" id="lokasi" name="lokasi" placeholder="lokasi" value="<?php echo e($tanah->lokasi); ?>" readonly></td></td></td>
                                </tr>
                                <tr>
                                    <td>Siap Bajak</td>
                                    <td>:</td>
                                    <td> <select class="form-control" name="daerah_id">
                                            <option value="">Sila pilih...</option>
                                            <?php $__currentLoopData = DB::table('bulan')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bulan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($bulan->kodbulan); ?>"><?php echo e($bulan->bulan); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select></td>
                                </tr>
                                <tr>
                                    <td>Tuntutan (RM)</td>
                                    <td>:</td>
                                    <td>
                                        <div class="input-group">

                                            <input type="text" name="tuntutan" id="tuntutan" class="form-control"
                                                value=366>
                                            <input type="hidden" name="subsidi" id="subsidi" class="form-control"
                                                value=200>
                                            <input type="hidden" name="bilnya" id="bilnya" class="form-control"
                                                value=1>
                                    </td>
                                </tr>
                            </table>
                        </div>

                        <div class="box box-primary">
                            <table width="96%" class="table table-noborder table-hover" id="bayaran">
                                <tr>
                                    <td width="17%">Nama Penerima</td>
                                    <td width="2%">:</td>
                                    <td width="81%"><input type="text" class="form-control" id="pemohon" name="pemohon" placeholder="Nama Pemohon" value="<?php echo e(Auth::user()->name); ?>" readonly></td>
                                </tr>
                                <tr>
                                    <td>No.Kad Pengenalan</td>
                                    <td>:</td>
                                    <td><input type="text" class="form-control" id="nokp" name="alamat" placeholder="alamat" value="<?php echo e(Auth::user()->alamat); ?>" readonly></td>
                                </tr>
                                <tr>
                                    <td>No Akaun Bank</td>
                                    <td>:</td>
                                    <td>
                                        <div class="input-group">
                                            <input type="text" name="akaun" id="akaun" class="form-control" value=>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Nama Bank</td>
                                    <td>:</td>
                                    <td> <select class="form-control" name="daerah_id">
                                            <option value="">Sila pilih...</option>
                                            <?php $__currentLoopData = DB::table('bank')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bank): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($bank->kodbank); ?>"><?php echo e($bank->namabank); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select></td>
                                </tr>
                                <tr>
                                    <td>Cawangan Bank</td>
                                    <td>:</td>
                                    <td> <select class="form-control" name="daerah_id">
                                            <option value="">Sila pilih...</option>
                                            <?php $__currentLoopData = DB::table('daerah')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $daerah): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($daerah->koddaerah); ?>"><?php echo e($daerah->namadaerah); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select></td>
                                </tr>
                            </table>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary" name="submit1" value="daftar">Daftar Tuntutan &
                                Seterusnya</button>
                            <button onclick="window.close()" type="button" class="btn btn-primary" name="tutup"
                                id="tutup" value="Tutup">Tutup</button>
                            </button>
                        </div>
                    </div>
                    <!--box primary-->
                </div>
                <!--box-->
    </div>
    <!--col-xs-12-->
    </div>
    <!--row-->

    </section>
    </form>
    <!-- /.content -->

    </div>

    </body>

    </html>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\project-master\resources\views/ptundaf.blade.php ENDPATH**/ ?>