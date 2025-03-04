<?php $__env->startSection('title','page create subcategory'); ?>

<?php $__env->startSection('styles'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('content'); ?>


 <div class="row">
    <div class="col-md-12">
        <div class="pd-20 card-box mb-30">
            <div class="clearfix">
                <div class="pull-left">
                    <h5 class="text-dark">Add SubCategory</h5>
                </div>
                <div class="pull-right">
                    <a href="<?php echo e(route('admin.category.cat-sub-cat-list')); ?>" class="btn btn-primary btn-sm " > <i class="ion-arrow-left-a"></i> Back to categories List </a>
                </div>
            </div>
            <form action="<?php echo e(route('admin.category.store-subcategory')); ?>" enctype="multipart/form-data" method="POST" class="mt-3">
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
                    <label for="">Paerant Category</label>
                       <select id="parent_category" name="parent_category" class="form-control">
                        <option value="">
                          Not set Paerant Category
                        </option>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($category->id); ?>" <?php echo e(old('parent_category')==$category->id?'selected':''); ?>>
                            <?php echo e($category->category_name); ?>

                        </option>


                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                       </select>
                    <?php $__errorArgs = ['parent_category'];
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
                    <label for="">SubCategory Name</label>
                    <input type="text" name="subcategory_name" id="subcategory_name" placeholder="enter subcategory_name" class="form-control" value="<?php echo e(old('subcategory_name')); ?>">
                    <?php $__errorArgs = ['subcategory_name'];
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
                    <label for="">Sub_Category Image</label>
                    <input type="file" name="subcategory_image" id="subcategory_image" placeholder="enter subcategory_image" class="form-control" value="<?php echo e(old('subcategory_image')); ?>">
                    <?php $__errorArgs = ['subcategory_image'];
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
                    <?php if($subcategories_1 && $subcategories_1->subcategory_image): ?>

                    <img
                        src="/images/subcategories/<?php echo e($subcategories_1->subcategory_image); ?>"
                        alt="Sub Category Image Preview"
                        id="subcategory_image_preview"
                        class="img-thumbnail"
                        style="width: 100px; height: 100px; object-fit: cover;"
                        data-ijabo-default-img="/images/categories/<?php echo e($subcategories_1->subcategory_image); ?>"
                    >
                    <?php else: ?>
                        <p>No subcategory image available</p>
                        <?php endif; ?>
                </div>
            </div>


            <div class="col-md-7">
                <div class="form-group">
                    <label for="">price</label>
                    <input type="text" name="price" id="price" placeholder="enter price" class="form-control" value="<?php echo e(old('price')); ?>">
                    <?php $__errorArgs = ['price'];
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
                    <label for="">Is Child Of</label>
                        <select name="is_child_of" id="is_child_of" class="form-control">
                            <option value="0">------</option>
                            <?php $__currentLoopData = $subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($subcategory->id); ?>"><?php echo e($subcategory->subcategory_name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    <?php $__errorArgs = ['is_child_of'];
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

        <button type="submit" class="btn btn-primary">CREATE</button>
        </form>
        </div>
    </div>
 </div>

<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>

<script>
    $('input[type="file"][name="subcategory_image"]').ijaboViewer({
        preview:'#subcategory_image_preview',
        allowedExtensions:['jpg','png','jpeg','svg'],
        imageShape:'square',
        onErrorShape:function(message,element){
            alert(message);
        },OnInvalidType:function(message,element){
            alert(message);
        },OnSuccess:function(message,element){},
    })
   </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('back.pages.page-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\all think proparite laravel\E-Commerce\e-commerce\resources\views/back/pages/admin/add-subcategory.blade.php ENDPATH**/ ?>