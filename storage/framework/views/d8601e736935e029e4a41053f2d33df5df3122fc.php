

<?php $__env->startSection('title','page example'); ?>

<?php $__env->startSection('styles'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('content'); ?>



<div class="min-height-200px">
    <div class="page-header">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="title">
                    <h4>Profile</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?php echo e(route('seller.home')); ?>">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Profile
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('seller.seller-profile')->html();
} elseif ($_instance->childHasBeenRendered('Q2Fl1KU')) {
    $componentId = $_instance->getRenderedChildComponentId('Q2Fl1KU');
    $componentTag = $_instance->getRenderedChildComponentTagName('Q2Fl1KU');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('Q2Fl1KU');
} else {
    $response = \Livewire\Livewire::mount('seller.seller-profile');
    $html = $response->html();
    $_instance->logRenderedChild('Q2Fl1KU', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
</div>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
   
<script>
   $('input[type="file"][id="sellerProfilePictureFile"]').kropify({
    preview: 'sellerProfilePicture',
    viewMode: 1,
    aspectRatio: 1,
    cancelButtonText: 'Cancel',
    resetButtonText: 'Reset',
    cropButtonText: 'Crop & update',
    processURL: '<?php echo e(route("seller.seller-profile-picture")); ?>',
    maxSize: 2097152, //2MB
    showLoader: true,
    animationClass: 'headShake',
    fileName: 'sellerProfilePictureFile', // ✅ هنا صار نفس اسم الحقل اللي تتوقعه PHP
    success: function (data) {
        if (data.status == 1) {
            livewire.emit('UpdateAdminSellerHeaderInfo');
            livewire.emit('UpdateSellerProfilePicture');
            toastr.success(data.msg);
        } else {
            toastr.error(data.msg);
        }
    },
    errors: function (error, text) {
        console.log(text);
    }
});

</script>


<?php $__env->stopPush(); ?>

<?php echo $__env->make('back.pages.page-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\all think proparite laravel\E-Commerce\e-commerce\resources\views/back/pages/seller/profile.blade.php ENDPATH**/ ?>