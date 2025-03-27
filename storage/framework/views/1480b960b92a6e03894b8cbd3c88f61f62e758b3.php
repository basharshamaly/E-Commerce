<?php $__env->startSection('title','Login Page'); ?>

<?php $__env->startPush('styles'); ?>
<style>
    /* جعل الصفحة في المنتصف بدون أن تملأ الشاشة بالكامل */
    .login-container {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
        width: 100vw;
        background: #f4f6f9;
        padding: 20px;
    }
    
    /* تصغير حجم المحتوى */
    .login-wrapper {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 80%;
        height: 70vh;
        max-width: 1100px;
        background: #fff;
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    }
    
    /* توزيع الحجم بين الصورة والفورم */
    .login-image, .login-box {
        flex: 1;
    }

    /* التحكم بحجم الصورة */
    .login-image img {
        width: 100%;
        height: auto;
        max-height: 100%;
    }

    /* ضبط حجم الفورم */
    .login-box {
        padding: 20px;
        max-width: 450px;
    }

    /* استجابة للجوال */
    @media (max-width: 768px) {
        .login-wrapper {
            flex-direction: column;
            height: auto;
            text-align: center;
        }
        .login-image {
            width: 100%;
            max-width: 350px;
            margin-bottom: 20px;
        }
        .login-box {
            width: 100%;
        }
    }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="login-container">
    <div class="login-wrapper">
        <!-- صورة تسجيل الدخول -->
        <div class="login-image">
            <img src="<?php echo e(asset('back/vendors/images/login-page-img.png')); ?>" alt="Login Image" class="img-fluid">
        </div>

        <!-- فورم تسجيل الدخول -->
        <div class="login-box">
            <div class="login-title">
                <h2 class="text-center text-primary">Login To Dashboard</h2>
            </div>

            <form action="<?php echo e(route('admin.login_Handler')); ?>" method="POST">
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
                    <input type="text" name="login_id" class="form-control form-control-lg <?php $__errorArgs = ['login_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('login_id')); ?>" placeholder="Username/Email"/>
                    <?php $__errorArgs = ['login_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="invalid-feedback">
                        <?php echo e($message); ?>

                    </div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    <div class="input-group-append custom">
                        <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                    </div>
                </div>

                <div class="input-group custom">
                    <input type="password" name="password" class="form-control form-control-lg <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="**********"/>
                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="invalid-feedback">
                        <?php echo e($message); ?>

                    </div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    <div class="input-group-append custom">
                        <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                    </div>
                </div>

                <div class="row pb-30">
                    <div class="col-6">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck1"/>
                            <label class="custom-control-label" for="customCheck1">Remember</label>
                        </div>
                    </div>
                    <div class="col-6 text-right">
                        <a href="<?php echo e(route('admin.forgot-password')); ?>">Forgot Password?</a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="input-group mb-0">
                            <input class="btn btn-primary btn-lg btn-block" type="submit" value="Sign In">
                        </div>
                        <div class="font-16 weight-600 pt-10 pb-10 text-center" data-color="#707373">OR</div>
                        <div class="input-group mb-0">
                            <a class="btn btn-outline-primary btn-lg btn-block" href="register.html">Register To Create Account</a>
                        </div>
                    </div>
                </div>
            </form>
        </div> 
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('back.layout.auth-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\all think proparite laravel\E-Commerce\e-commerce\resources\views/back/pages/admin/auth/login.blade.php ENDPATH**/ ?>