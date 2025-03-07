

<?php $__env->startSection('title','register auth example'); ?>

<?php $__env->startPush('styles'); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

 <div class="login-box bg-white box-shadow border-radius-10">

    <div class="login-title">
        <h2 class="text-center text-primary">
            Create Seller Account 
        </h2>
    </div>

    <form action="<?php echo e(route('seller.createSeller')); ?>" method="post">
        <?php echo csrf_field(); ?>
        <x-alert-form\>
            <div class="form-group">
              <label for="">FullName</label>
                <input class="form-control" type="text" name="name" id="name" placeholder="Enter Full Name" value="<?php echo e(old('name')); ?>">
             <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                 <span class="text-danger ml-2"><?php echo e($message); ?></span>
             <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="form-group">
              <label for="">Email</label>
                <input class="form-control" type="email" name="email" id="email" placeholder="Enter  Email" value="<?php echo e(old('email')); ?>">
                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="text-danger ml-2"><?php echo e($message); ?></span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="form-group">
              <label for="">Password</label>
                <input class="form-control" type="password" name="password" id="password" placeholder="Enter  password">
                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="text-danger ml-2"><?php echo e($message); ?></span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="form-group">
              <label for="">Confirm_Password</label>
                <input class="form-control" type="password" name="confirm_password" id="confirm_password" placeholder="Enter  password">
                <?php $__errorArgs = ['confirm_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="text-danger ml-2"><?php echo e($message); ?></span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="input-group mb-0">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Create Account</button>
                    </div>
                </div>
            </div>

            <div class="font-16 weight-600 pt-10 pb-10 text-center" data-color="#707373" style="color: rgb(112,115,115);">
             OR
            </div>
            <div class="input-group mb-0">
                <a href="<?php echo e(route('seller.login')); ?>" class="btn btn-outline-primary btn-lg btn-block">SignIn</a>
            </div>
            
    </form>
 </div>
         
<?php $__env->stopSection(); ?> 

<?php $__env->startPush('scripts'); ?>
   
<?php $__env->stopPush(); ?>

<?php echo $__env->make('back.layout.auth-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\all think proparite laravel\E-Commerce\e-commerce\resources\views/back/pages/seller/auth/register.blade.php ENDPATH**/ ?>