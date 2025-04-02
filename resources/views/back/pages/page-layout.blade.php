<!DOCTYPE html>
<html>
	<head>
		<!-- Basic Page Info -->
		<meta charset="utf-8" />
		<title>@yield('title')</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">

		<!-- Site favicon -->
		<meta name="csrf-token" content="{{ csrf_token() }}">
        {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}

		<link
			rel="icon"
			type="image/png"
			sizes="16x16"
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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


        <link rel="stylesheet" href="{{ asset('extra-assets/ijaboCropTool/ijaboCropTool.min.css') }}">


                    <!-- Toastr CSS -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
        <link rel="stylesheet" href="/extra-assets/jquery-ui-1.14.1/jquery-ui.min.css">
           <link rel="stylesheet" href="/extra-assets/jquery-ui-1.14.1/jquery-ui.structure.css">
           <link rel="stylesheet" href="/extra-assets/jquery-ui-1.14.1/jquery-ui.structure.min.css">
           <link rel="stylesheet" href="/extra-assets/jquery-ui-1.14.1/jquery-ui.theme.min.css">

           @kropifyStyles
           @livewireStyles


        <style>
            .logo-size {


                width: 80px;
                height:100px;
                object-fit: contain;
            }
        </style>
        @yield('styles')
        {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/css/select2.min.css" rel="stylesheet" /> --}}


	</head>
	<body>
		{{-- <div class="pre-loader">
			<div class="pre-loader-box">
				<div class="loader-logo">
					<img src="vendors/images/deskapp-logo.svg" alt="" />
				</div>
				<div class="loader-progress" id="progress_div">
					<div class="bar" id="bar1"></div>
				</div>
				<div class="percent" id="percent1">0%</div>
				<div class="loading-text">Loading...</div>
			</div>
		</div> --}}


		<div class="header">
			<div class="header-left">
				<div class="menu-icon bi bi-list"></div>
				<div
					class="search-toggle-icon bi bi-search"
					data-toggle="header_search"
				></div>
				<div class="header-search">
					<form>
						<div class="form-group mb-0">
							<i class="dw dw-search2 search-icon"></i>
							<input
								type="text"
								class="form-control search-input"
								placeholder="Search Here"
							/>
							<div class="dropdown">
								<a
									class="dropdown-toggle no-arrow"
									href="#"
									role="button"
									data-toggle="dropdown"
								>
									<i class="ion-arrow-down-c"></i>
								</a>
								<div class="dropdown-menu dropdown-menu-right">
									<div class="form-group row">
										<label class="col-sm-12 col-md-2 col-form-label"
											>From</label
										>
										<div class="col-sm-12 col-md-10">
											<input
												class="form-control form-control-sm form-control-line"
												type="text"
											/>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-12 col-md-2 col-form-label">To</label>
										<div class="col-sm-12 col-md-10">
											<input
												class="form-control form-control-sm form-control-line"
												type="text"
											/>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-12 col-md-2 col-form-label"
											>Subject</label
										>
										<div class="col-sm-12 col-md-10">
											<input
												class="form-control form-control-sm form-control-line"
												type="text"
											/>
										</div>
									</div>
									<div class="text-right">
										<button class="btn btn-primary">Search</button>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="header-right">
				<div class="dashboard-setting user-notification">
					<div class="dropdown">
						<a
							class="dropdown-toggle no-arrow"
							href="javascript:;"
							data-toggle="right-sidebar"
						>
							<i class="dw dw-settings2"></i>
						</a>
					</div>
				</div>
				<div class="user-notification">
					<div class="dropdown">
						<a
							class="dropdown-toggle no-arrow"
							href="#"
							role="button"
							data-toggle="dropdown"
						>
							<i class="icon-copy dw dw-notification"></i>
							<span class="badge notification-active"></span>
						</a>
						<div class="dropdown-menu dropdown-menu-right">
							<div class="notification-list mx-h-350 customscroll">
								<ul>
									<li>
										<a href="#">
											<img src="/back/vendors/images/img.jpg" alt="" />
											<h3>John Doe</h3>
											<p>
												Lorem ipsum dolor sit amet, consectetur adipisicing
												elit, sed...
											</p>
										</a>
									</li>
									<li>
										<a href="#">
											<img src="/back/vendors/images/photo1.jpg" alt="" />
											<h3>Lea R. Frith</h3>
											<p>
												Lorem ipsum dolor sit amet, consectetur adipisicing
												elit, sed...
											</p>
										</a>
									</li>
									<li>
										<a href="#">
											<img src="/back/vendors/images/photo2.jpg" alt="" />
											<h3>Erik L. Richards</h3>
											<p>
												Lorem ipsum dolor sit amet, consectetur adipisicing
												elit, sed...
											</p>
										</a>
									</li>
									<li>
										<a href="#">
											<img src="/back/vendors/images/photo3.jpg" alt="" />
											<h3>John Doe</h3>
											<p>
												Lorem ipsum dolor sit amet, consectetur adipisicing
												elit, sed...
											</p>
										</a>
									</li>
									<li>
										<a href="#">
											<img src="/back/vendors/images/photo4.jpg" alt="" />
											<h3>Renee I. Hansen</h3>
											<p>
												Lorem ipsum dolor sit amet, consectetur adipisicing
												elit, sed...
											</p>
										</a>
									</li>
									<li>
										<a href="#">
											<img src="/back/vendors/images/img.jpg" alt="" />
											<h3>Vicki M. Coleman</h3>
											<p>
												Lorem ipsum dolor sit amet, consectetur adipisicing
												elit, sed...
											</p>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
                {{-- @auth --}}
			  @if(Auth::guard('admin')->check())
              {{-- way one to include livewire to bage --}}
              {{-- <livewire(livewire:admin-seller-header-profile-info)> --}}

             {{-- way two to include livewire to bage --}}
             @livewire('admin-seller-header-profile-info')


            @elseif(Auth::guard('seller')->check())
              {{-- way one to include livewire to bage --}}
              {{-- <livewire(livewire:admin-seller-header-profile-info)> --}}
                @livewire('admin-seller-header-profile-info')


             {{-- way two to include livewire to bage --}}
             {{-- @livewire('admin-seller-header-profile-info') --}}
              @endif
              {{-- @endauth --}}
			</div>
		</div>

		<div class="right-sidebar">
			<div class="sidebar-title">
				<h3 class="weight-600 font-16 text-blue">
					Layout Settings
					<span class="btn-block font-weight-400 font-12"
						>User Interface Settings</span
					>
				</h3>
				<div class="close-sidebar" data-toggle="right-sidebar-close">
					<i class="icon-copy ion-close-round"></i>
				</div>
			</div>
			<div class="right-sidebar-body customscroll">
				<div class="right-sidebar-body-content">
					<h4 class="weight-600 font-18 pb-10">Header Background</h4>
					<div class="sidebar-btn-group pb-30 mb-10">
						<a
							href="javascript:void(0);"
							class="btn btn-outline-primary header-white active"
							>White</a
						>
						<a
							href="javascript:void(0);"
							class="btn btn-outline-primary header-dark"
							>Dark</a
						>
					</div>

					<h4 class="weight-600 font-18 pb-10">Sidebar Background</h4>
					<div class="sidebar-btn-group pb-30 mb-10">
						<a
							href="javascript:void(0);"
							class="btn btn-outline-primary sidebar-light"
							>White</a
						>
						<a
							href="javascript:void(0);"
							class="btn btn-outline-primary sidebar-dark active"
							>Dark</a
						>
					</div>

					<h4 class="weight-600 font-18 pb-10">Menu Dropdown Icon</h4>
					<div class="sidebar-radio-group pb-10 mb-10">
						<div class="custom-control custom-radio custom-control-inline">
							<input
								type="radio"
								id="sidebaricon-1"
								name="menu-dropdown-icon"
								class="custom-control-input"
								value="icon-style-1"
								checked=""
							/>
							<label class="custom-control-label" for="sidebaricon-1"
								><i class="fa fa-angle-down"></i
							></label>
						</div>
						<div class="custom-control custom-radio custom-control-inline">
							<input
								type="radio"
								id="sidebaricon-2"
								name="menu-dropdown-icon"
								class="custom-control-input"
								value="icon-style-2"
							/>
							<label class="custom-control-label" for="sidebaricon-2"
								><i class="ion-plus-round"></i
							></label>
						</div>
						<div class="custom-control custom-radio custom-control-inline">
							<input
								type="radio"
								id="sidebaricon-3"
								name="menu-dropdown-icon"
								class="custom-control-input"
								value="icon-style-3"
							/>
							<label class="custom-control-label" for="sidebaricon-3"
								><i class="fa fa-angle-double-right"></i
							></label>
						</div>
					</div>

					<h4 class="weight-600 font-18 pb-10">Menu List Icon</h4>
					<div class="sidebar-radio-group pb-30 mb-10">
						<div class="custom-control custom-radio custom-control-inline">
							<input
								type="radio"
								id="sidebariconlist-1"
								name="menu-list-icon"
								class="custom-control-input"
								value="icon-list-style-1"
								checked=""
							/>
							<label class="custom-control-label" for="sidebariconlist-1"
								><i class="ion-minus-round"></i
							></label>
						</div>
						<div class="custom-control custom-radio custom-control-inline">
							<input
								type="radio"
								id="sidebariconlist-2"
								name="menu-list-icon"
								class="custom-control-input"
								value="icon-list-style-2"
							/>
							<label class="custom-control-label" for="sidebariconlist-2"
								><i class="fa fa-circle-o" aria-hidden="true"></i
							></label>
						</div>
						<div class="custom-control custom-radio custom-control-inline">
							<input
								type="radio"
								id="sidebariconlist-3"
								name="menu-list-icon"
								class="custom-control-input"
								value="icon-list-style-3"
							/>
							<label class="custom-control-label" for="sidebariconlist-3"
								><i class="dw dw-check"></i
							></label>
						</div>
						<div class="custom-control custom-radio custom-control-inline">
							<input
								type="radio"
								id="sidebariconlist-4"
								name="menu-list-icon"
								class="custom-control-input"
								value="icon-list-style-4"
								checked=""
							/>
							<label class="custom-control-label" for="sidebariconlist-4"
								><i class="icon-copy dw dw-next-2"></i
							></label>
						</div>
						<div class="custom-control custom-radio custom-control-inline">
							<input
								type="radio"
								id="sidebariconlist-5"
								name="menu-list-icon"
								class="custom-control-input"
								value="icon-list-style-5"
							/>
							<label class="custom-control-label" for="sidebariconlist-5"
								><i class="dw dw-fast-forward-1"></i
							></label>
						</div>
						<div class="custom-control custom-radio custom-control-inline">
							<input
								type="radio"
								id="sidebariconlist-6"
								name="menu-list-icon"
								class="custom-control-input"
								value="icon-list-style-6"
							/>
							<label class="custom-control-label" for="sidebariconlist-6"
								><i class="dw dw-next"></i
							></label>
						</div>
					</div>

					<div class="reset-options pt-30 text-center">
						<button class="btn btn-danger" id="reset-settings">
							Reset Settings
						</button>
					</div>
				</div>
			</div>
		</div>

		<div class="left-side-bar">
			<div class="brand-logo">
				<a href="index.html">
					<img src="/images/site/{{$settings->site_logo ??""}}" alt="" class="dark-logo logo-size" />
				</a>
				<div class="close-sidebar" data-toggle="left-sidebar-close">
					<i class="ion-close-round"></i>
				</div>
			</div>
			<div class="menu-block customscroll">
				<div class="sidebar-menu">
					<ul id="accordion-menu">
						@if(Route::is('admin.*'))

                        <li class="dropdown">
							<a href="{{ route('admin.home') }}" class="dropdown-toggle {{ Route::is('admin.home')?'active': '' }}">
								<span class="micon bi bi-house"></span
								><span class="mtext">Home</span>
							</a>
						</li>

						<li>
							<a href="invoice.html" class="dropdown-toggle no-arrow ">
								<span class="micon bi bi-receipt-cutoff"></span
								><span class="mtext">Invoice</span>
							</a>
						</li>
						<li>
							<a href="{{route('admin.category.cat-sub-cat-list')}}" class="dropdown-toggle no-arrow {{ Route::Is('admin.category.*')?'active':'' }}">
								<span class="micon dw dw-align-left3"></span
								><span class="mtext">Category Managment</span>
							</a>
						</li>

						<li>
							<div class="sidebar-small-cap">Settings</div>
						</li>


                        <li>
							<a href="{{ route('admin.profile') }}" class="dropdown-toggle no-arrow {{Route::Is('admin.profile') ? 'active':''}}">
								<span class="micon"><i class="fas fa-user"></i>
                                    </span
								><span class="mtext">Profile</span>
							</a>
						</li>
                        <li>
							<a href="{{ route('admin.settings') }}" class="dropdown-toggle no-arrow {{Route::Is('admin.settings') ? 'active':''}}">
								<span class="micon"><i class="fas fa-cogs"></i>
                                    </span
								><span class="mtext">Settings</span>
							</a>
						</li>
                        @endif



                        @if(Route::is('seller.*'))

                        <li class="dropdown">
							<a href="{{ route('seller.home') }}" class="dropdown-toggle {{ Route::is('seller.home')?'active': '' }}">
								<span class="micon bi bi-house"></span
								><span class="mtext">Home</span>
							</a>
						</li>

						<li>
							<a href="invoice.html" class="dropdown-toggle no-arrow ">
								<span class="micon bi bi-receipt-cutoff"></span
								><span class="mtext">Invoice</span>
							</a>
						</li>

                        <li>
							<div class="sidebar-small-cap">Settings</div>
						</li>



                        <li>
							<a href="{{ route('seller.profile') }}" class="dropdown-toggle no-arrow">
								<span class="micon"><i class="fas fa-user"></i>
                                    </span
								><span class="mtext">Profile</span>
							</a>
						</li>

                        <li>
							<a href="" class="dropdown-toggle no-arrow ">
								<span class="micon"><i class="fas fa-cogs"></i>
                                    </span
								><span class="mtext">Settings</span>
							</a>
						</li>
						{{-- <li>
							<a href="invoice.html" class="dropdown-toggle no-arrow ">
								<span class="micon bi bi-receipt-cutoff"></span
								><span class="mtext">Invoice</span>
							</a>
						</li> --}}

{{--
						<li>
							<div class="sidebar-small-cap">Settings</div>
						</li> --}}


                        {{-- <li>
							<a href="{{ route('admin.profile') }}" class="dropdown-toggle no-arrow {{Route::Is('admin.profile') ? 'active':''}}">
								<span class="micon"><i class="fas fa-user"></i>
                                    </span
								><span class="mtext">Profile</span>
							</a>
						</li>
                        <li>
							<a href="{{ route('admin.settings') }}" class="dropdown-toggle no-arrow {{Route::Is('admin.settings') ? 'active':''}}">
								<span class="micon"><i class="fas fa-cogs"></i>
                                    </span
								><span class="mtext">Settings</span>
							</a>
						</li> --}}
                        @endif





					</ul>
				</div>
			</div>
		</div>
		<div class="mobile-menu-overlay"></div>

		<div class="main-container">
			<div class="pd-ltr-20 xs-pd-20-10">
				<div class="min-height-200px">
                    <div>
                        @stack('content')
                    </div>

				</div>
				<div class="footer-wrap pd-20 mb-20 card-box">
					DeskApp - Bootstrap 4 Admin Template By
					<a href="https://github.com/dropways" target="_blank"
						>Ankit Hingarajiya</a
					>
				</div>
			</div>
		</div>


		<!-- js -->

        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/js/select2.min.js"></script> --}}
{{-- <link href="/path-to-your-css/select2.min.css" rel="stylesheet" />
<script src="/path-to-your-js/select2.min.js"></script> --}}

		<script src="/back/vendors/scripts/core.js"></script>
		<script src="/back/vendors/scripts/script.min.js"></script>
		<script src="/back/vendors/scripts/process.js"></script>
		<script src="/back/vendors/scripts/layout-settings.js"></script>


            <!-- Toastr JS -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            {{-- <script src="https://cdn.jsdelivr.net/npm/ijabo-croptool@latest/dist/ijaboCropTool.min.js"></script> --}}


            <script src="{{ asset('extra-assets/ijaboCropTool/jquery.js') }}"></script>


            <script src="{{ asset('extra-assets/ijaboCropTool/ijaboCropTool.min.js') }}"></script>
            <script src="/extra-assets/jquery-ui-1.14.1/jquery-ui.min.js"></script>

            <script>
//    $(document).ready(function(){
//                 $('.summernote').summernote({
// 					height:200
// 				});
// 			});

            window.addEventListener('showToaster', function (event) {
                toastr.remove(); // إزالة التنبيهات السابقة
                if (event.detail[0].type === 'info') {
                    toastr.info(event.detail[0].message); // عرض رسالة معلومات
                } else if (event.detail[0].type === 'success') {
                    toastr.success(event.detail[0].message); // عرض رسالة نجاح
                } else if (event.detail[0].type === 'error') {
                    toastr.error(event.detail[0].message); // عرض رسالة خطأ
                } else if (event.detail[0].type === 'warning') {
                    toastr.warning(event.detail[0].message); // عرض رسالة تحذير
                } else {
                    return false; // إذا كان النوع غير معروف
                }
            });
        </script>

    @kropifyScripts

    @livewireScripts
	@stack('scripts')
	</body>
</html>
