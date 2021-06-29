<!DOCTYPE html>
<html lang="en">

	<!--begin::Head-->
	<head>
		<base href="">
		<meta charset="utf-8" />
		<title>Metronic Live preview | Keenthemes</title>
		<meta name="description" content="Metronic admin dashboard live demo. Check out all the features of the admin panel. A large number of settings, additional services and widgets." />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<link rel="canonical" href="https://keenthemes.com/metronic" />
		<!--begin::Styles-->
		@include('layouts.styles')
	</head>

	<!--end::Head-->

	<!--begin::Body-->
	<body id="kt_body" class="page-loading-enabled page-loading header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">

		<!--[html-partial:include:{"file":"partials/_page-loader.html"}]/-->
		@include('layouts.partials-admin._page-loader')
		<!--[html-partial:include:{"file":"layout.html"}]/-->
		<!--begin::Main-->

		<!--[html-partial:include:{"file":"partials/_header-mobile.html"}]/-->
		@include('layouts.partials-admin._header-mobile')
		<div class="d-flex flex-column flex-root">

			<!--begin::Page-->
			<div class="d-flex flex-row flex-column-fluid page">

				<!--[html-partial:include:{"file":"partials/_aside.html"}]/-->
				@include('layouts.partials-admin._aside')
				<!--begin::Wrapper-->
				<div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">

					<!--[html-partial:include:{"file":"partials/_header.html"}]/-->
					@include('layouts.partials-admin._header')
					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">

						<!--[html-partial:include:{"file":"partials/_subheader/subheader-v1.html"}]/-->
						@include('layouts.partials-admin._subheader.subheader-v1')
						<!--Content area here-->
						@yield('content')
					</div>

					<!--end::Content-->

					<!--[html-partial:include:{"file":"partials/_footer.html"}]/-->
					@include('layouts.partials-admin._footer')
				</div>

				<!--end::Wrapper-->
			</div>

			<!--end::Page-->
		</div>

		<!--end::Main-->

		<!--[html-partial:include:{"file":"partials/_extras/offcanvas/quick-user.html"}]/-->
		@include('layouts.partials-admin._extras.offcanvas.quick-user')
		<!--[html-partial:include:{"file":"partials/_extras/scrolltop.html"}]/-->
		@include('layouts.partials-admin._extras.scrolltop')
		
		<!--begin::Scripts-->
		@include('layouts.scripts')
	</body>

	<!--end::Body-->
</html>