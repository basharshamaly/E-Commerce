

<?php $__env->startSection('title','register auth example'); ?>

<?php $__env->startPush('styles'); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="row align-items-center">

   <h1>welcome to e-commerce people</h1>
</div>

<div class="row align-items-center">

    <div class="col-md-6 col-lg-7">
        <?php echo $__env->yieldContent('content'); ?>
        </div>
    <div class="col-md-6 col-lg-5">
        <div class="login-box bg-white box-shadow border-radius-10">
            <div class="login-title">
                <h2 class="text-center text-primary">Register</h2>
            </div>

            <form action="" method="POST">
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
                <div class="select-role">
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn active">
                            <input type="radio" name="options" id="seller" />
                            <div class="icon">
                                <img
                                    src="/back/vendors/images/briefcase.svg"
                                    class="svg"
                                    alt=""
                                />
                            </div>
                            <span>I'm</span>
                            Manager
                        </label>
                        <label class="btn">
                            <input type="radio" name="options" id="user" />
                            <div class="icon">
                                <img
                                    src="/back/vendors/images/person.svg"
                                    class="svg"
                                    alt=""
                                />
                            </div>
                            <span>I'm</span>
                            Employee
                        </label>
                    </div>

                </div>

                <div class="input-group custom">
                    <input
                        type="text"
                        name="login_id"
                        class="form-control form-control-lg"
                        placeholder="Username/Email"
                    />
                    <?php $__errorArgs = ['login_id'];
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
                            ><i class="icon-copy dw dw-user1"></i
                        ></span>
                    </div>
                </div>
                <div class="input-group custom">
                    <input
                        type="password"
                        class="form-control form-control-lg "
                        name="password"
                        placeholder="**********"
                    />
                    <?php $__errorArgs = ['password'];
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
                            ><i class="dw dw-padlock1"></i
                        ></span>
                    </div>
                </div>
                <div class="row pb-30">
                    <div class="col-6">
                        <div class="custom-control custom-checkbox">
                            <input
                                type="checkbox"
                                class="custom-control-input"
                                id="customCheck1"
                            />
                            <label class="custom-control-label" for="customCheck1"
                                >Remember</label
                            >
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="forgot-password">
                            
                            <a href="">Forgot Password</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="input-group mb-0">

                            
                            <input class="btn btn-primary btn-lg btn-block" type="submit" value="Sign In">


                        </div>
                        <div
                            class="font-16 weight-600 pt-10 pb-10 text-center"
                            data-color="#707373"
                        >
                            OR
                        </div>
                        <div class="input-group mb-0">
                            <a
                                class="btn btn-outline-primary btn-lg btn-block"
                                href="<?php echo e(route('seller.login')); ?>"
                                >Login if You Have Account</a
                            >
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
         
<?php $__env->stopSection(); ?> 

<?php $__env->startPush('scripts'); ?>
   
<?php $__env->stopPush(); ?>

<?php echo $__env->make('back.layout.auth-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\all think proparite laravel\E-Commerce\e-commerce\resources\views/back/pages/seller/auth/register.blade.php ENDPATH**/ ?>