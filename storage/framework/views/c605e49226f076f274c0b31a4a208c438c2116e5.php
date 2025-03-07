<div>
    <div class="tab">
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link  text-blue <?php echo e($tab=='general_settings' ? 'active':''); ?> " wire:click.prevent='selectTab("general_settings")' data-toggle="tab" href="#general_settings" role="tab" aria-selected="true">General Settings</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-blue <?php echo e($tab=='logo_favicon' ? 'active':''); ?>" wire:click.prevent='selectTab("logo_favicon")' data-toggle="tab" href="#logo_favicon" role="tab" aria-selected="false">Logo && Favicon</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-blue <?php echo e($tab=='social_network' ? 'active':''); ?>" wire:click.prevent='selectTab("social_network")' data-toggle="tab" href="#social_network" role="tab" aria-selected="false">Social Network</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-blue <?php echo e($tab=='payment_method' ? 'active':''); ?>" wire:click.prevent='selectTab("payment_method")' data-toggle="tab" href="#payment_method" role="tab" aria-selected="false">Payment Method</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade <?php echo e($tab=='general_settings' ? 'active show':''); ?> " id="general_settings" role="tabpanel">
                <div class="pd-20">
                <form wire:submit.prevent='updateGeneralSettings()'>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">

                                <label for=""><b>Site Name </b></label>
                                <input type="text" class="form-control" wire:model.defer='site_name' placeholder="Enter Site Name ">
                                <?php $__errorArgs = ['site_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">

                                <label for=""><b>Site Email </b></label>
                                <input type="email" class="form-control" wire:model.defer='site_email' placeholder="Enter Site Email ">
                                <?php $__errorArgs = ['site_email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">

                                <label for=""><b>Site phone </b></label>
                                <input type="text" class="form-control" wire:model.defer='site_phone' placeholder="Enter Site Phone ">
                                <?php $__errorArgs = ['site_phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-denger"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">

                                <label for=""><b>Site meta keywords </b></label>
                                <input type="text" class="form-control" wire:model.defer='site_meta_keywords' placeholder="Enter  site_meta_keywords ">
                                <?php $__errorArgs = ['site_meta_keywords'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-denger"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Site Address</label>
                        <input type="text" wire:model.defer="site_address" class="form-control" placeholder="Enter Site Address">
                        <?php $__errorArgs = ['site_address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="text-danger"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="form-group">
                        <label for="">Site meta Decription </label>
                        <textarea wire:model.defer='site_meta_description' cols="30" rows="10" placeholder="Enter site_meta_description" class="form-control"></textarea>
                        <?php $__errorArgs = ['site_meta_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="text-denger"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                   
                    <button type="submit" class="btn btn-primary">Save Change </button>
                </form>
                </div>
            </div>
            <div class="tab-pane fade <?php echo e($tab=='logo_favicon' ? 'active show':''); ?> " id="logo_favicon" role="tabpanel">
                <div class="pd-20">
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Site Logo</h5>
                            <div class="mb-2 mt-1" style="max-width: 200px;">
                                 <img
                                    wire:ignore
                                   src="<?php echo e($settings && $settings->site_logo
                                    ? asset('images/site/' . $settings->site_logo)
                                    : asset('images/site/logo.png')); ?>"
                                    class="img-thumbnail"
                                    data-ijab-default-img="/images/site/<?php echo e($site_logo); ?>"
                                    id="site_logo_image"
                                    alt="Site Logo"
                                  

                                >

                                <form
                                    action="<?php echo e(route('admin.change-site-logo')); ?>"
                                    method="post"
                                    enctype="multipart/form-data"
                                    id="change_site_logo"
                                >
                                    <?php echo csrf_field(); ?>
                                    <div class="mb-2">
                                        <input
                                            type="file"
                                            name="site_logo"
                                            id="site_logo"
                                            placeholder="Upload image of type PNG or JPG"
                                            class="form-control"
                                            onchange="previewImage(this)"

                                        >


                                        <?php $__errorArgs = ['site_logo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="text-danger error-text"><?php echo e($message); ?></span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Change Logo</button>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h5>Site FavIcon</h5>
                            <div class="mb-2 mt-1" style="max-width: 200px">
                                <img wire:ignore   src="<?php echo e($settings && $settings->site_favicon
                                ? asset('images/site/' . $settings->site_favicon)
                                : asset('images/site/favicon.png')); ?>"
                                  class="img-thumbnail"
                                data-ijab-default-img="/images/site/<?php echo e($site_favicon); ?>"
                                id="site_favicon_image"
                                alt="Site favicon">
                            </div>
                            <form action="<?php echo e(route('admin.change-site-favicon')); ?>" method="post" enctype="multipart/form-data" id="site_favicon_form">
                            <?php echo csrf_field(); ?>
                            <div class="mb-2">
                                <input type="file" name="site_favicon" id="site_favicon" placeholder="upload image site_favicon" class="form-control">
                                <span class="text-danger error-text"></span>
                            </div>
                            <button type="submit" class="btn btn-primary">Change FavIcon</button>
                        </form>
                        </div>
                    </div>
                </div>

            </div>
            <div class="tab-pane fade <?php echo e($tab=='social_network' ? 'active show':''); ?> " id="social_network" role="tabpanel">
                <div class="pd-20">
                   <form wire:submit.prevent="updateSocialNetworks()" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-md-4">
                           <div class="form-group">
                            <label for=""><b>Facebook URL</b></label>
                            <input type="text" wire:model.defer="facebook_url" placeholder="enter facebook url" class="form-control">
                            <?php $__errorArgs = ['facebook_url'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                  <div class="text-danger"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="form-group">
                            <label for=""><b>Twiter URL</b></label>
                            <input type="text" wire:model.defer="twiter_url" placeholder="enter twiter url" class="form-control">
                            <?php $__errorArgs = ['twiter_url'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                  <div class="text-danger"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="form-group">
                            <label for=""><b>Instgram URL</b></label>
                            <input type="text" wire:model.defer="instgram_url" placeholder="enter instgram url" class="form-control">
                            <?php $__errorArgs = ['instgram_url'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                  <div class="text-danger"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                           </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                           <div class="form-group">
                            <label for=""><b>Githup URL</b></label>
                            <input type="text" wire:model.defer="github_url" placeholder="enter github_url url" class="form-control">
                            <?php $__errorArgs = ['github_url'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                  <div class="text-danger"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="form-group">
                            <label for=""><b>YoutYope URL</b></label>
                            <input type="text" wire:model.defer="youtyope_url" placeholder="enter youtyope_url url" class="form-control">
                            <?php $__errorArgs = ['youtyope_url'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                  <div class="text-danger"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="form-group">
                            <label for=""><b>LinkedIn URL</b></label>
                            <input type="text" wire:model.defer="linkedin_url" placeholder="enter linkedin_url url" class="form-control">
                            <?php $__errorArgs = ['linkedin_url'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                  <div class="text-danger"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                           </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                   </form>
                </div>
            </div>
            <div class="tab-pane fade <?php echo e($tab=='payment_method' ? 'active show':''); ?> " id="payment_method" role="tabpanel">
                <div class="pd-20">
                    Payment Method
                </div>
            </div>
        </div>
    </div>

    <?php if(session('success')): ?>
    <script>
        toastr.success("<?php echo e(session('success')); ?>");
    </script>
    <?php endif; ?>

    <?php if(session('error')): ?>
    <script>
        toastr.error("<?php echo e(session('error')); ?>");



    </script>


<?php endif; ?>

<?php $__env->startSection('sc'); ?>
<script>
    function previewImage(input) {
if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
        document.getElementById('site_logo_image').src = e.target.result;

    }
    reader.readAsDataURL(input.files[0]);
}
}

</script>
<?php $__env->stopSection(); ?>

</div>
<?php /**PATH D:\all think proparite laravel\E-Commerce\e-commerce\resources\views/livewire/admin-settings.blade.php ENDPATH**/ ?>