Dear <b><?php echo e($seller->name); ?> </b><br>
<p>
    you are recivieng this email because you request to reset password <?php echo e($settings->site_name); ?></p>
    <p>
        please click on this link to reset password 
        <a href="<?php echo e($actionLink); ?>" target="_blank"><?php echo e($actionLink); ?></a> <br>
        <p>this link is only valid for 15 minutes </p>
    </p><?php /**PATH D:\all think proparite laravel\E-Commerce\e-commerce\resources\views/email-templates/seller-forgot-email-temblate.blade.php ENDPATH**/ ?>