<div>
    <div class="user-info-dropdown">
        <div class="dropdown">
            <a
                class="dropdown-toggle"
                href="#"
                role="button"
                data-toggle="dropdown"
            >
                <span class="user-icon">
                    <img src="<?php echo e(Auth::guard('admin')->user()->picture ?? ""); ?>" alt="" />
                </span>
                <span class="user-name"><?php echo e(Auth::user()->name ?? ""); ?></span>
            </a>
            <div
                class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list"
            >
                <a class="dropdown-item" href="<?php echo e(route('admin.profile')); ?>"
                    ><i class="dw dw-user1"></i> Profile</a
                >
                <a class="dropdown-item" href="<?php echo e(route('admin.settings')); ?>"
                    ><i class="dw dw-settings2"></i> Setting</a
                >
                <a class="dropdown-item" href="faq.html"
                    ><i class="dw dw-help"></i> Help</a
                >
                <?php if(Auth::guard('admin')): ?>
                <form action="<?php echo e(route('admin.logout_Handler')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php if(session('success')): ?>
                    <div class="alert alert-success">
                       <?php echo e(session::get('success')); ?>

                       <button type="button" class="close" data-dismiss="alert" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                       </button>
                    </div>
                    <?php endif; ?>
                <button class="dropdown-item" type="submit"
                    ><i class="dw dw-logout"></i> Log Out</button>
                </form>
                <?php endif; ?>

                <?php if(Auth::guard('seller')): ?>
                <a class="dropdown-item" href="<?php echo e(route('seller.logout')); ?>" onclick="event.preventDefault();document.getElementById('sellerLogoutForm').submit();"
                ><i class="dw dw-help"></i> logout</a
            >
        <form action="<?php echo e(route('seller.logout')); ?>" method="POST" id="sellerLogoutForm">
            <?php echo csrf_field(); ?>
        </form>
        <?php endif; ?>

            </div>
        </div>
    </div>

</div>
<?php /**PATH D:\all think proparite laravel\E-Commerce\e-commerce\resources\views/livewire/admin-seller-header-profile-info.blade.php ENDPATH**/ ?>