<!DOCTYPE html>
<html>
	<head>
		<!-- Basic Page Info -->
		<meta charset="utf-8" />
		<title>E-Commerce @yield('title')</title>

		<!-- Site favicon -->
		<link
			rel="apple-touch-icon"
			sizes="180x180"
			href="/images/site/{{$settings->site_favicon ?? ""}}"
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
    @livewireStyles
	@stack('styles')

	</head>
	<body class="login-page">

		<div class="login-header box-shadow">
			<div
				class="container-fluid d-flex justify-content-between align-items-center"
			>
				<div class="brand-logo">
					<a href="login.html">
                        {{-- <img src="/images/site/{{$settings->site_logo ?? ""}}" alt="" class="dark-logo logo-size" /> --}}

						<img src="/back/vendors/images/deskapp-logo.svg" alt="" />
					</a>
				</div>
				<div class="login-menu">
					<ul>
                        @if(!Route::is('admin.*'))
                         @if (Route::is('seller.login'))

                        <li><a href="{{ route('seller.register') }}">Register</a></li>

                        @else
                        <li><a href="{{ route('seller.login') }}">login</a></li>

                        @endif 

                        @endif
					</ul>
				</div>
			</div>
		</div>
		<div
			class="login-wrap d-flex align-items-center flex-wrap justify-content-center"
		>

			<div class="container">
                @yield('content')

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


        @livewireScripts
        @stack('scripts')
	</body>
</html>
