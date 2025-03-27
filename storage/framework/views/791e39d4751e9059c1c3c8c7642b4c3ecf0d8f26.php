<div>
    <div class="user-info-dropdown">
        <div class="dropdown">
            <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                <span class="user-icon">
                    <img src="<?php echo e(Auth::guard('admin')->user()->picture  ?? ""); ?>" alt="" />
                </span>
                <span class="user-name">
                    <?php echo e(Auth::guard('admin')->check() ? Auth::guard('admin')->user()->name : (Auth::guard('seller')->check() ? Auth::guard('seller')->user()->name : '')); ?>

                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                <a class="dropdown-item" href="<?php echo e(route('admin.profile')); ?>">
                    <i class="dw dw-user1"></i> Profile
                </a>
                <a class="dropdown-item" href="<?php echo e(route('admin.settings')); ?>">
                    <i class="dw dw-settings2"></i> Setting
                </a>
                <a class="dropdown-item" href="faq.html">
                    <i class="dw dw-help"></i> Help
                </a>

                <!-- زر تسجيل الخروج الموحد -->
                <?php if(Auth::guard('admin')->check() || Auth::guard('seller')->check()): ?>
                <form action="<?php echo e(Auth::guard('admin')->check() ? route('admin.logout_Handler') : route('seller.logout')); ?>" method="POST" id="logoutForm">
                    <?php echo csrf_field(); ?>
                    <button class="dropdown-item" type="submit">
                        <i class="dw dw-logout"></i> Log Out
                    </button>
                </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php /**PATH D:\all think proparite laravel\E-Commerce\e-commerce\resources\views/livewire/admin-seller-header-profile-info.blade.php ENDPATH**/ ?>