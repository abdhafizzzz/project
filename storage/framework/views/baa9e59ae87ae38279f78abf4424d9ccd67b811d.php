<?php $__env->startSection('content'); ?>
    <?php if(session('registration_success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('registration_success')); ?>

        </div>
    <?php endif; ?>

    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5 text-center">
                    <div class="card" style="background-color: gold; border-radius: 1rem;">
                        <div class="card-body">
                            <form method="POST" action="<?php echo e(route('login')); ?>">
                                <?php echo csrf_field(); ?>
                                <img src="<?php echo e(asset('img/doalogo.gif')); ?>" alt="Logo" class="img-fluid mb-3" style="max-width: 200px;">
                                <h2 class="fw-bold mb-2">eBajak</h2>
                                <p class="text-black-50 mb-5">Sistem Subsidi Petani</p>
                                <div class="form-outline form-white mb-4">
                                    <label for="nokp" class="col-md-4 col-form-label text-md-right"><?php echo e(('No Kad Pengenalan')); ?></label>
                                    <input id="nokp" type="text" class="form-control <?php $__errorArgs = ['nokp'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="nokp"  required autocomplete="nokp" autofocus aria-label="Kad Pengenalan" aria-describedby="nokp_error">
                                    <small>(Masukkan nombor kad pengenalan anda tanpa tanda '-')</small>
                                    <?php $__errorArgs = ['nokp'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span id="nokp_error" class="invalid-feedback" role="alert">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="form-outline form-white mb-4">
                                    <input id="password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required autocomplete="current-password" aria-label="Kata Laluan" aria-describedby="password_error">
                                    <label class="form-label" for="typePasswordX">Kata Laluan</label>
                                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span id="password_error" class="invalid-feedback" role="alert">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="form-check mb-4">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                    <label class="form-check-label" for="remember">
                                        <?php echo e(__('Remember Me')); ?>

                                    </label>
                                </div>
                                <button class="btn btn-dark btn-outline-primary btn-lg px-5 mb-3" title="Klik untuk Log Masuk" aria-label="Log Masuk">Log Masuk</button>
                                <p class="small mb-5 pb-lg-2"><a class="text-black-50" href="<?php echo e(route('password.request')); ?>">Lupa kata laluan? sila klik sini</a></p>
                                <p class="mb-0">Untuk pengguna baru sila daftar dahulu <a href="<?php echo e(route('register')); ?>" class="btn btn-outline-light btn-lg px-5 btn-success" onclick="openNewPage()">Daftar</a></p>
                            </form>


                        </div>
                    </div>
                    <footer class="container text-center">
                        <img src="<?php echo e(asset('img/logojpkn.png')); ?>" alt="Footer Logo" style="max-width: 200px;">
                        <div>
                            <span>&copy; <?php echo e(date('Y')); ?>© 2020 - 2023 Hak Cipta terpelihara Jabatan Perkhidmatan Komputer Negeri Sabah</span>
                        </div>
                    </footer>


                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\project-master\resources\views/auth/login.blade.php ENDPATH**/ ?>