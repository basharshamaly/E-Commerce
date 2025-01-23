<?php $__env->startSection('title','page Edit subcategory'); ?>

<?php $__env->startSection('styles'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('content'); ?>


 <div class="row">
    <div class="col-md-12">
        <div class="pd-20 card-box mb-30">
            <div class="clearfix">
                <div class="pull-left">
                    <h5 class="text-dark">Edit SubCategory</h5>
                </div>
                <div class="pull-right">
                    <a href="<?php echo e(route('admin.category.cat-sub-cat-list')); ?>" class="btn btn-primary btn-sm " > <i class="ion-arrow-left-a"></i> Back to categories List </a>
                </div>
            </div>
            <form action="<?php echo e(route('admin.category.update-subcategory',$subcategories->id)); ?>" method="post" class="mt-3">
                <?php echo method_field('PUT'); ?>
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
                    <label for="parent_category">Parent Category</label>
                    <select id="parent_category" name="parent_category" class="form-control">
                  
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($category->id); ?>" 
                                <?php echo e($subcategories->category_id == $category->id ? 'selected' : ''); ?>>
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
                    <input type="text" name="subcategory_name" id="subcategory_name" placeholder="enter subcategory_name" class="form-control" value="<?php echo e($subcategories->subcategory_name); ?>">
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
                    <label for="is_child_of">Is Child Of</label>
                    <select name="is_child_of" id="is_child_of" class="form-control">
                        <option value="0">------</option>
                        <?php $__currentLoopData = $subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(isset($subcategory->id) && isset($subcategoryy->id) && $subcategory->id != $subcategoryy->id): ?>
                            
                                <option value="<?php echo e($subcategory->id); ?>" 
                                    <?php echo e($subcategoryy->Is_Child_Category != 0 && $subcategory->Is_Child_Category==$subcategory->id ? 'selected' : ''); ?>>
                                    <?php echo e($subcategory->subcategory_name); ?>

                                </option>
                            <?php endif; ?>
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

        <button type="submit" class="btn btn-primary">UPDATED</button>
        </form>
        </div>
    </div>
 </div>

<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('back.pages.page-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\all think proparite laravel\E-Commerce\e-commerce\resources\views/back/pages/admin/edit-subcategory.blade.php ENDPATH**/ ?>