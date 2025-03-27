<?php $__env->startSection('title','login auth example'); ?>

<?php $__env->startPush('styles'); ?>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>


<div class="login-header box-shadow">
    <div
        class="container-fluid d-flex justify-content-between align-items-center"
    >

    </div>
</div>
<div
    class="login-wrap d-flex align-items-center flex-wrap justify-content-center"
>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <img src="<?php echo e(asset('back/vendors/images/forgot-password.png')); ?>" alt="" />
            </div>
            <div class="col-md-6">
                <div class="login-box bg-white box-shadow border-radius-10">
                    <div class="login-title">
                        <h2 class="text-center text-primary">Forgot Password</h2>
                    </div>
                    <h6 class="mb-20">
                        Enter your email address to reset your password
                    </h6>
                    <form action="<?php echo e(route('seller.reset-password-link')); ?>" method="POST" >
                        <?php echo csrf_field(); ?>
                        <?php if (isset($component)) { $__componentOriginal30a904966a19513e16a14599f7a328d05fa0878c = $component; } ?>
<?php $component = App\View\Components\AlertForm::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('alert-form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AlertForm::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal30a904966a19513e16a14599f7a328d05fa0878c)): ?>
<?php $component = $__componentOriginal30a904966a19513e16a14599f7a328d05fa0878c; ?>
<?php unset($__componentOriginal30a904966a19513e16a14599f7a328d05fa0878c); ?>
<?php endif; ?>
                        <div class="input-group custom">
                            <input
                                type="text"
                                class="form-control form-control-lg"
                                placeholder="Email"
                                name="email"
                                value="<?php echo e(old('email')); ?>"
                            />
                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger">
                                    <?php echo e($message); ?>

                                </span>
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
                                    <button class="btn btn-primary btn-lg btn-block" type="submit">
                                        Submit</button>
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
                                        href="<?php echo e(route('seller.login')); ?>"
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

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('back.layout.auth-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\all think proparite laravel\E-Commerce\e-commerce\resources\views/back/pages/seller/auth/forgot-password.blade.php ENDPATH**/ ?>