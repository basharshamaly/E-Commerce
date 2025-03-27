<?php $__env->startSection('title','latout auth example'); ?>

<?php $__env->startPush('styles'); ?>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>


<div class="container">
    <div class="row align-items-center">
        <div class="col-md-6">
            <img src="<?php echo e(asset('back/vendors/images/forgot-password.png')); ?>" alt="" />
        </div>
        <div class="col-md-6">
            <div class="login-box bg-white box-shadow border-radius-10">
                <div class="login-title">
                    <h2 class="text-center text-primary">Reset Password</h2>
                </div>
                <h6 class="mb-20">Enter your new password, confirm and submit</h6>
                <form action="<?php echo e(route('seller.reset-password-handler')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <x-alert-form\>
                        <input type="hidden" name="token" value="<?php echo e(request()->token); ?>">
                    <div class="input-group custom">
                        <input
                            type="password"
                            class="form-control form-control-lg"
                            placeholder="New Password"
                            name="new_password"
                            value="<?php echo e(old('new_password')); ?>"
                        />
                        <?php $__errorArgs = ['new_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                             <span class="text-danger"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        <div class="input-group-append custom">
                            <span class="input-group-text"
                                ><i class="dw dw-padlock1"></i
                            ></span>
                        </div>
                    </div>
                    <div class="input-group custom">
                        <input
                            type="password"
                            class="form-control form-control-lg"
                            placeholder="Confirm New Password"
                            name="confirm_new_password"
                            value="<?php echo e(old('confirm_new_password')); ?>"

                        />
                        <?php $__errorArgs = ['confirm_new_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="text-danger"><?php echo e($message); ?></span>
                   <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        <div class="input-group-append custom">
                            <span class="input-group-text"
                                ><i class="dw dw-padlock1"></i
                            ></span>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-5">
                            <div class="input-group mb-0">

                                
                                <button class="btn btn-primary btn-lg btn-block" type="submit">
                                    submit
                                </button>



                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('back.layout.auth-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\all think proparite laravel\E-Commerce\e-commerce\resources\views/back/pages/seller/auth/reset.blade.php ENDPATH**/ ?>