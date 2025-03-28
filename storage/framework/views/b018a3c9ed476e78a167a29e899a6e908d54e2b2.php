<div>
    <div class="row">
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-30">
            <div class="pd-20 card-box height-100-p">
                <div class="profile-photo">
                    <a href="modal" data-toggle="modal" data-target="#modal" class="edit-avatar"><i class="fa fa-pencil"></i></a>
                    <img src="vendors/images/photo1.jpg" alt="" class="avatar-photo">
                    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-body pd-5">
                                    <div class="img-container">
                                        <img id="image" src="<?php echo e($seller->Picture); ?>" alt="Picture">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input type="submit" value="Update" class="btn btn-primary">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">
                                        Close
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <h5 class="text-center h5 mb-0"><?php echo e($seller->name); ?></h5>
                <p class="text-center text-muted font-14">
                   <?php echo e($seller->email); ?>

                </p>


            </div>
        </div>
        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 mb-30">
            <div class="card-box height-100-p overflow-hidden">
                <div class="profile-tab height-100-p">
                    <div class="tab height-100-p">
                        <ul class="nav nav-tabs customtab" role="tablist">
                            <li class="nav-item">
                                <a wire:click.prevent='selectTab("personal_details")' class="nav-link <?php echo e($tab=='personal_details'?'active':''); ?>" data-toggle="tab" href="#personal_details" role="tab">Personal Details</a>
                            </li>
                            <li class="nav-item">
                                <a wire:click.prevent='selectTab("update_password")' class="nav-link <?php echo e($tab=='update_password'?'active':''); ?>" data-toggle="tab" href="#update_password" role="tab">Update Password</a>
                            </li>

                        </ul>
                        <div class="tab-content">
                            <!-- Timeline Tab start -->
                            <div class="tab-pane fade   <?php echo e($tab=='personal_details'?'active show':''); ?>" id="personal_details" role="tabpanel">
                                <div class="pd-20">
                                  <form wire:submit.prevent="saveSellerProfileInfo()">
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
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                 <label for="">Full Name</label>
                                                 <input type="text" wire:model.live="name" placeholder="Enter Seller Name"
                                                  class="form-control"
                                                 >
                                                 <?php $__errorArgs = ['name'];
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
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                 <label for="">Email</label>
                                                 <input type="email" wire:model.live="email" disabled placeholder="Enter Seller email"
                                                  class="form-control"
                                                 >
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
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                 <label for="">username</label>
                                                 <input type="text" wire:model.live="username" placeholder="Enter Seller username"
                                                  class="form-control"
                                                 >
                                                 <?php $__errorArgs = ['username'];
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
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                 <label for="">phone</label>
                                                 <input type="text" wire:model.live="phone" placeholder="Enter Seller phone"
                                                  class="form-control"
                                                 >
                                                 <?php $__errorArgs = ['phone'];
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
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                 <label for="">address</label>
                                                 <input type="text" wire:model.live="address" placeholder="Enter Seller address"
                                                  class="form-control"
                                                 >
                                                 <?php $__errorArgs = ['address'];
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
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary" type="submit">Save Change</button>
                                  </form>
                                </div>
                            </div>
                            <!-- Timeline Tab End -->
                            <!-- Tasks Tab start -->
                            <div class="tab-pane fade <?php echo e($tab=='update_password'?'active show':''); ?>" id="update_password" role="tabpanel">
                                ---------------- updated password--------------
                            </div>
                            <!-- Tasks Tab End -->


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH D:\all think proparite laravel\E-Commerce\e-commerce\resources\views/livewire/seller/seller-profile.blade.php ENDPATH**/ ?>