

<?php $__env->startSection('title','forgot-password page'); ?>

<?php $__env->startPush('styles'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>


<div
    class="login-wrap d-flex align-items-center flex-wrap justify-content-center"
>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <img src="<?php echo e(asset('/back/vendors/images/forgot-password.png')); ?>" alt="" />
            </div>
            <div class="col-md-6">
                <div class="login-box bg-white box-shadow border-radius-10">
                    <div class="login-title">
                        <h2 class="text-center text-primary">Forgot Password</h2>
                    </div>
                    <h6 class="mb-20">
                        Enter your email address to reset your password
                    </h6>
                    <form action="<?php echo e(route('admin.send-password-reset-link')); ?>" method="GET">
                        <?php echo csrf_field(); ?>

                        <?php if(session('fail')): ?>
                        <div class="alert alert-danger">
                            <?php echo e(session('fail')); ?>

                        </div>
                    <?php endif; ?>
                    <?php if(session('success')): ?>
                    <div class="alert alert-success">
                        <?php echo e(session('success')); ?>

                    </div>
                <?php endif; ?>
                        <div class="input-group custom">
                            <input
                                type="email"
                                name="email"
                                value="<?php echo e(old('email')); ?>"
                                class="form-control form-control-lg <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                placeholder="Email"
                            />
                           <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                           <div class="invalid invalid-feedback">
                                <?php echo e($message); ?>

                           </div>
                           <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            <div class="input-group-append custom">
                                <span class="input-group-text"
                                    ><i class="fa fa-envelope-o" aria-hidden="true"></i
                                ></span>
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-5">
                                <div class="input-group mb-0">
                                    <!--
                                    use code for form submit
                                    <input class="btn btn-primary btn-lg btn-block" type="submit" value="Submit">
                                -->
                                    <button type="submit" class="btn btn-primary btn-lg btn-block" >Submit</button
                                    >
                                </div>
                            </div>
                            <div class="col-2">
                                <div
                                    class="font-16 weight-600 text-center"
                                    data-color="#707373"
                                >
                                    OR
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="input-group mb-0">
                                    <a
                                        class="btn btn-outline-primary btn-lg btn-block"
                                        href="<?php echo e(route('admin.login')); ?>"
                                        >Login</a
                                    >
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- js -->
<script src="<?php echo e(asset('/back/vendors/scripts/core.js')); ?>"></script>
<script src="<?php echo e(asset('/back/vendors/scripts/script.min.js')); ?>"></script>
<script src="<?php echo e(asset('/back/vendors/scripts/process.js')); ?>"></script>
<script src="<?php echo e(asset('/back/vendors/scripts/layout-settings.js')); ?>"></script>




<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
   <script>
    fetch('<?php echo e(route('admin.send-password-reset-link')); ?>', {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
    },
    body: JSON.stringify({ email: email })
});
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('back.layout.auth-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\all think proparite laravel\E-Commerce\e-commerce\resources\views/back/pages/admin/auth/forgot-password.blade.php ENDPATH**/ ?>