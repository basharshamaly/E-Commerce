<!DOCTYPE html>
<html>
	<head>
		<!-- Basic Page Info -->
		<meta charset="utf-8" />
		<title>E-Commerce <?php echo $__env->yieldContent('title'); ?></title>

		<!-- Site favicon -->
		<link
			rel="apple-touch-icon"
			sizes="180x180"
			href="/images/site/<?php echo e($settings->site_favicon ?? ""); ?>"
		/>


		<!-- Mobile Specific Metas -->
		<meta
			name="viewport"
			content="width=device-width, initial-scale=1, maximum-scale=1"
		/>

		<!-- Google Font -->
		<link
			href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
			rel="stylesheet"
		/>
		<!-- CSS -->
		<link rel="stylesheet" type="text/css" href="/back/vendors/styles/core.css" />
		<link
			rel="stylesheet"
			type="text/css"
			href="/back/vendors/styles/icon-font.min.css"
		/>
		<link rel="stylesheet" type="text/css" href="/back/vendors/styles/style.css" />
        <link rel="stylesheet" href="/extra-asset/ijaboCropTool/ijaboCropTool.min.css">

                    <!-- Toastr CSS -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">

        <script
			async
			src="https://www.googletagmanager.com/gtag/js?id=G-GBZ3SGGX85"
		></script>
		<script
			async
			src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2973766580778258"
			crossorigin="anonymous"
		></script>
        <style>
            .logo-size {
                max-width: 150px;
                max-height: 150px;
                width: auto;
                height: auto;
            }
        </style>
    <?php echo \Livewire\Livewire::styles(); ?>

	<?php echo $__env->yieldPushContent('styles'); ?>

	</head>
	<body class="login-page">

		<div class="login-header box-shadow">
			<div
				class="container-fluid d-flex justify-content-between align-items-center"
			>
				<div class="brand-logo">
					<a href="login.html">
                        

						<img src="/back/vendors/images/deskapp-logo.svg" alt="" />
					</a>
				</div>
				<div class="login-menu">
					<ul>
                        <?php if(!Route::is('admin.*')): ?>
                         <?php if(Route::is('seller.login')): ?>

                        <li><a href="<?php echo e(route('seller.register')); ?>">Register</a></li>

                        <?php else: ?>
                        <li><a href="<?php echo e(route('seller.login')); ?>">login</a></li>

                        <?php endif; ?> 

                        <?php endif; ?>
					</ul>
				</div>
			</div>
		</div>
		<div
			class="login-wrap d-flex align-items-center flex-wrap justify-content-center"
		>

			<div class="container">
                <?php echo $__env->yieldContent('content'); ?>

			</div>
		</div>

		<!-- js -->
		<script src="/back/vendors/scripts/core.js"></script>
		<script src="/back/vendors/scripts/script.min.js"></script>
		<script src="/back/vendors/scripts/process.js"></script>
		<script src="/back/vendors/scripts/layout-settings.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

        <script src="/extra-assets/ijaboCropTool/ijaboCropTool.min.js"></script>

        <script>
            window.addEventListener('showToaster', function (event) {
                toastr.remove(); // إزالة التنبيهات السابقة
                if (event.detail.type === 'info') {
                    toastr.info(event.detail.message); // عرض رسالة معلومات
                } else if (event.detail.type === 'success') {
                    toastr.success(event.detail.message); // عرض رسالة نجاح
                } else if (event.detail.type === 'error') {
                    toastr.error(event.detail.message); // عرض رسالة خطأ
                } else if (event.detail.type === 'warning') {
                    toastr.warning(event.detail.message); // عرض رسالة تحذير
                } else {
                    return false; // إذا كان النوع غير معروف
                }
            });
        </script>


        <?php echo \Livewire\Livewire::scripts(); ?>

        <?php echo $__env->yieldPushContent('scripts'); ?>
	</body>
</html>
<?php /**PATH D:\all think proparite laravel\E-Commerce\e-commerce\resources\views/back/layout/auth-layout.blade.php ENDPATH**/ ?>