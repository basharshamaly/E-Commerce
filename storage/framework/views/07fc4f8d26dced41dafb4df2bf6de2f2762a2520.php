<div>
    <div class="row">
        <div class="col-md-12">
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                  <div class="pull-left">
                    <h4 class="h4 text-blue">Categories</h4>

                  </div>
                  <div class="pull-right">
                    <a href="<?php echo e(route('admin.category.add-category')); ?>" class="btn btn-primary btn-sm" type="button">
                        <i class="fa fa-plus"></i>
                        Add Category
                    </a>
                  </div>
                </div>
                <div class="table-responsive mt-4">
                     <table class="table table-borderless table-striped">
                        <thead class="bg-secondary text-white">
                            <tr>
                                <th>
                                    Category image
                                </th>
                                <th>Category Name</th>
                                <th>N. of sub categories</th>
                                <th>actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0" id="sortable_categories">
                            <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr data-index="<?php echo e($category->id); ?>" data-ordering="<?php echo e($category->ordering); ?>">
                                <td>
                                    <div class="avatar mr-2">
                                        <img src="/images/categories/<?php echo e($category->category_image); ?>" width="50" height="50"  alt="">
                                    </div>
                                </td>
                                <td><?php echo e($category->category_name); ?></td>
                                <td>
                                    <?php echo e($category->subcategories->count()); ?>

                                </td>
                                <td>
                                    <div class="table-actions">
                                        <a href="<?php echo e(route('admin.category.edit-category',$category->id)); ?>" class="text-primary">
                                            <i class="dw dw-edit-2"></i>
                                        </a>
                                        <a href="javaScript:;" class="text-danger deleteCategory" data-id="<?php echo e($category->id); ?>">
                                            <i class="dw dw-delete-2"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="4">
                                        <span class="text-danger">no catgory found</span>
                                    </td>
                                </tr>
                            <?php endif; ?>

                        </tbody>

                     </table>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                  <div class="pull-left">
                    <h4 class="h4 text-blue">Sub Categories</h4>

                  </div>
                  <div class="pull-right">
                    <a href="<?php echo e(route('admin.category.add-subcategory')); ?>" class="btn btn-primary btn-sm" type="button">
                        <i class="fa fa-plus"></i>
                        Add Sub Category
                    </a>
                  </div>
                </div>
                <div class="table-responsive mt-4">
                     <table class="table table-borderless table-striped">
                        <thead class="bg-secondary text-white">
                            <tr>
                                <th>
                                    Sub Category Name
                                </th>
                                <th>Category Name</th>
                                <th>Child SubCategory Name</th>
                                <th>actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            <?php $__empty_1 = true; $__currentLoopData = $subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td>
                                    <?php echo e($subcategory->subcategory_name); ?>

                                </td>
                                <td>
                                    <?php echo e($subcategory->category->category_name); ?>

                                </td>
                                <td>
                                    <?php if($subcategory->childSubCategory->count() > 0): ?>
                                        <ul class="list-group">
                                            <?php $__currentLoopData = $subcategory->childSubCategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li class="d-flex justify-content-between align-items-center">
                                                    <?php echo e($item->subcategory_name); ?>

                                                    <div>
                                                        <a href="<?php echo e(route('admin.category.edit-subcategory',['id'=>$item->id])); ?>" class="text-primary" data-toggle="tooltip" title="Edit child subcategory name">
                                                            Edit
                                                        </a>
                                                        |
                                                        <a href="#" class="text-danger" data-toggle="tooltip" title="Delete child subcategory name">
                                                            Delete
                                                        </a>
                                                    </div>
                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    <?php else: ?>
                                        <span>None</span>
                                    <?php endif; ?>
                                </td>
                                
                                <td>
                                    <div class="table-actions">
                                        <a href="<?php echo e(route('admin.category.edit-subcategory',['id'=>$subcategory->id])); ?>" class="text-primary">
                                            <i class="dw dw-edit-2"></i>
                                        </a>
                                   
                                        <a href="" class="text-danger">
                                            <i class="dw dw-delete-2"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <td colspan="4">
                                <span class="text">No sub Category Found</span>
                            </td>

                            <?php endif; ?>
                       
                        </tbody>

                     </table>
                </div>
            </div>
        </div>
       </div></div>
<?php /**PATH D:\all think proparite laravel\E-Commerce\e-commerce\resources\views/livewire/cat-sub-categories-list.blade.php ENDPATH**/ ?>