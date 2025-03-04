<?php $__env->startSection('title','page create category'); ?>

<?php $__env->startSection('styles'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('content'); ?>


 <div class="row">
    <div class="col-md-12">
        <div class="pd-20 card-box mb-30">
            <div class="clearfix">
                <div class="pull-left">
                    <h5 class="text-dark">Add Category</h5>
                </div>
                <div class="pull-right">
                    <a href="<?php echo e(route('admin.category.cat-sub-cat-list')); ?>" class="btn btn-primary btn-sm " > <i class="ion-arrow-left-a"></i> Back to categories List </a>
                </div>
            </div>
            <form action="<?php echo e(route('admin.category.store-category')); ?>" method="post" enctype="multipart/form-data" class="mt-3">
            <?php echo csrf_field(); ?>
            <?php if(Session::has('success')): ?>
            <div class="alert alert-success">
                <strong>Success:</strong> <?php echo Session::get('success'); ?>

            </div>
        <?php endif; ?>

        <?php if(Session::has('fail')): ?>
            <div class="alert alert-danger">
                <strong>Error:</strong> <?php echo Session::get('fail'); ?>

            </div>
        <?php endif; ?>

        <div class="row">
            <div class="col-md-7">
                <div class="form-group">
                    <label for="">Category Name</label>
                    <input type="text" name="category_name" id="category_name" placeholder="enter category_name" class="form-control" value="<?php echo e(old('category_name')); ?>">
                    <?php $__errorArgs = ['category_name'];
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
            <div class="col-md-7">
                <div class="form-group">
                    <label for="">Category Image</label>
                    <input type="file" name="category_image" id="category_image" placeholder="enter category_image" class="form-control" value="<?php echo e(old('category_image')); ?>">
                    <?php $__errorArgs = ['category_image'];
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
            <div class="col-md-7">
                <div class="avatar mb-3 ">
                    <label class="d-block font-weight-bold mb-2">Current Image</label>
                    <?php if($categories && $categories->category_image): ?>

                    <img
                        src="/images/categories/<?php echo e($categories->category_image); ?>"
                        alt="Category Image Preview"
                        id="category_image_preview"
                        class="img-thumbnail"
                        style="width: 100px; height: 100px; object-fit: cover;"
                        data-ijabo-default-img="/images/categories/<?php echo e($categories->category_image); ?>"
                    >
                    <?php else: ?>
                        <p>No category image available</p>
                        <?php endif; ?>
                </div>
            </div>
    </div>

        <button type="submit" class="btn btn-primary">CREATE</button>
        </form>
        </div>
    </div>
 </div>

<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
   <script>
    $('input[type="file"][name="category_image"]').ijaboViewer({
        preview:'#category_image_preview',
        allowedExtensions:['png',,'jpg','jpeg','svg'],
        imageShape:'square',
        onErrorShape:function(message,element){
            alert(message);
        },OnInvalidType:function(message,element){
            alert(message);
        },OnSuccess:function(message,element){},
    })
   </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('back.pages.page-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\all think proparite laravel\E-Commerce\e-commerce\resources\views/back/pages/admin/add-category.blade.php ENDPATH**/ ?>