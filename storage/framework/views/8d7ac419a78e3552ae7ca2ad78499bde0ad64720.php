<p>Dear <?php echo e($seller->name); ?>,</p>
<p>Your password has been successfully changed. Here are your new login details:</p>
<p><strong>Email:</strong> <?php echo e($seller->email); ?></p>
<p><strong>Password:</strong> <?php echo e($new_password); ?></p>
<p>Please change your password after logging in for security reasons.</p>
<?php /**PATH D:\all think proparite laravel\E-Commerce\e-commerce\resources\views/email-templates/seller-email-reset-template.blade.php ENDPATH**/ ?>