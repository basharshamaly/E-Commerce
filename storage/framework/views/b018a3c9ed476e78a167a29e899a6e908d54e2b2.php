<div>
    <div class="row">
        <!-- البروفايل والصورة -->
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-30">
            <div class="pd-20 card-box height-100-p">
                <div class="profile-photo text-center">
                    <!-- زر التعديل على الصورة -->
                    <a href="javascript:;" 
                       onclick="event.preventDefault();document.getElementById('sellerProfilePictureFile').click();" 
                       class="edit-avatar">
                        <i class="fa fa-pencil"></i>
                    </a>

                    <!-- عرض الصورة الحالية -->
                    <img src="<?php echo e($seller->Picture); ?>" alt="Profile Picture" 
                         id="sellerProfilePicture" class="avatar-photo">

                    <!-- حقل رفع الصورة -->
                    <input type="file" name="sellerProfilePictureFile" 
                           id="sellerProfilePictureFile" 
                           style="opacity: 0; position: absolute; z-index: -1;">
                </div>

                <h5 class="text-center h5 mb-0"><?php echo e($seller->name); ?></h5>
                <p class="text-center text-muted font-14"><?php echo e($seller->email); ?></p>
            </div>
        </div>

        <!-- بيانات المستخدم وتبويبات التعديل -->
        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 mb-30">
            <div class="card-box height-100-p overflow-hidden">
                <div class="profile-tab height-100-p">
                    <div class="tab height-100-p">
                        <!-- التبويبات -->
                        <ul class="nav nav-tabs customtab" role="tablist">
                            <li class="nav-item">
                                <a wire:click.prevent="selectTab('personal_details')" 
                                   class="nav-link <?php echo e($tab == 'personal_details' ? 'active' : ''); ?>" 
                                   data-toggle="tab" href="#personal_details" role="tab">
                                    Personal Details
                                </a>
                            </li>
                            <li class="nav-item">
                                <a wire:click.prevent="selectTab('update_password')" 
                                   class="nav-link <?php echo e($tab == 'update_password' ? 'active' : ''); ?>" 
                                   data-toggle="tab" href="#update_password" role="tab">
                                    Update Password
                                </a>
                            </li>
                        </ul>

                        <!-- محتوى التبويبات -->
                        <div class="tab-content">

                            <!-- تبويب: التفاصيل الشخصية -->
                            <div class="tab-pane fade <?php echo e($tab == 'personal_details' ? 'active show' : ''); ?>" 
                                 id="personal_details" role="tabpanel">
                                <div class="pd-20">
                                    <form wire:submit.prevent="saveSellerProfileInfo()" enctype="multipart/form-data">
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

                                        <div class="row">
                                            <!-- الاسم -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Full Name</label>
                                                    <input type="text" wire:model.live="name" 
                                                           class="form-control" placeholder="Enter Seller Name">
                                                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                            </div>

                                            <!-- البريد الإلكتروني -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="email" wire:model.live="email" disabled 
                                                           class="form-control" placeholder="Enter Seller Email">
                                                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                            </div>

                                            <!-- اسم المستخدم -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Username</label>
                                                    <input type="text" wire:model.live="username" 
                                                           class="form-control" placeholder="Enter Seller Username">
                                                    <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                            </div>

                                            <!-- الهاتف -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Phone</label>
                                                    <input type="text" wire:model.live="phone" 
                                                           class="form-control" placeholder="Enter Seller Phone">
                                                    <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                            </div>

                                            <!-- العنوان -->
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Address</label>
                                                    <input type="text" wire:model.live="address" 
                                                           class="form-control" placeholder="Enter Seller Address">
                                                    <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </form>
                                </div>
                            </div>

                            <!-- تبويب: تحديث كلمة المرور -->
                            <div class="tab-pane fade <?php echo e($tab == 'update_password' ? 'active show' : ''); ?>" 
                                 id="update_password" role="tabpanel">
                                <form wire:submit.prevent="updatePasswordSeller()" enctype="multipart/form-data">
                                    <div class="row">
                                        <!-- كلمة المرور الحالية -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Current Password</label>
                                                <input type="password" wire:model.live="current_password" 
                                                       class="form-control" placeholder="Enter Current Password">
                                                <?php $__errorArgs = ['current_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>

                                        <!-- كلمة المرور الجديدة -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>New Password</label>
                                                <input type="password" wire:model.live="new_password" 
                                                       class="form-control" placeholder="Enter New Password" >
                                                <?php $__errorArgs = ['new_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>

                                        <!-- تأكيد كلمة المرور -->
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Confirm New Password</label>
                                                <input type="password" wire:model.live="confirm_new_password" 
                                                       class="form-control" placeholder="Confirm New Password">
                                                <?php $__errorArgs = ['confirm_new_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Save Change</button>
                                </form>
                            </div>
                            <!-- نهاية تبويب كلمة المرور -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH D:\all think proparite laravel\E-Commerce\e-commerce\resources\views/livewire/seller/seller-profile.blade.php ENDPATH**/ ?>