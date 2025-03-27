<div>
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
<?php if(session('info')): ?>
<div class="alert alert-info">
    <?php echo e(session('info')); ?>

</div>
<?php endif; ?>
</div>
<?php /**PATH D:\all think proparite laravel\E-Commerce\e-commerce\resources\views/components/alert-form.blade.php ENDPATH**/ ?>