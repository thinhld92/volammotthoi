<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<meta http-equiv="x-ua-compatible" content="IE=edge">
	<meta name="keywords" content="game, gaming, premium, VLTK">
	<meta name="author" content="Promickey">
	<meta name="description" content="VLTK - {{ config('app.name', 'Võ Lâm Tiên Kiếm') }}">
	<link rel="icon" type="image/png" href="{{getWebsiteConfig('site_icon') ?? asset('clients/asset/images/icon.ico')}}">

	<!-- Font Imports -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Lato:wght@400;500;600;700&display=swap" rel="stylesheet">

	<!-- Core Style -->
	<link rel="stylesheet" href="{{asset('welcome/assets/css/style.css')}}">

	<!-- Font Icons -->
	<link rel="stylesheet" href="{{asset('welcome/assets/css/font-icons.css')}}">

	<!-- Plugins/Components CSS -->
	<link rel="stylesheet" href="{{asset('welcome/assets/css/swiper.css')}}">
	@include('mylib.fontawesome')

	<!-- Custom CSS -->
	<link rel="stylesheet" href="{{asset('welcome/assets/css/custom.css')}}">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Document Title
	============================================= -->
	<title>{{ config('app.name', 'Võ Lâm Tiên Kiếm') }}</title>

	<style>
		.swiper-pagination {
			bottom: 40px !important;
			--cnvs-swiper-bar-color: var(--cnvs-contrast-300);
			--cnvs-swiper-bar-active-color: var(--cnvs-contrast-900);
			--cnvs-swiper-bar-title-color: var(--cnvs-contrast-800);
			--cnvs-swiper-bar-width: 140px;
			--cnvs-swiper-bar-height: 4px;
			--cnvs-swiper-bar-gap: 25px;
			--cnvs-swiper-autoplay-speed: 5000ms;
		}

		.swiper-horizontal>.swiper-pagination-bullets .swiper-pagination-bullet {
			margin-right: var(--cnvs-swiper-bar-gap);
			background: transparent !important;
		}

		.swiper-pagination span.swiper-pagination-bullet-active, .swiper-pagination span:hover {
			background-color: transparent !important;
		}

		.swiper-pagination span {
			position: relative;
			width: var(--cnvs-swiper-bar-width);
			height: auto;
			text-align: left;
			border-radius: 3px;
			opacity: 1;
			border: 0;
		}
		.swiper-pagination span.slider-name {
			font-size: 15px;
			line-height: 40px;
			font-weight: 400;
			color: var(--cnvs-swiper-bar-title-color);
			text-transform: capitalize;
			background: transparent !important;
		}
		.swiper-pagination span.slider-bar {
			position: absolute;
			bottom: 0;
			left: 0;
			z-index: 1;
			width: 100%;
			height: var(--cnvs-swiper-bar-height);
			background-color: var(--cnvs-swiper-bar-color);
			overflow: hidden;
			border-radius: 3px;
		}
		.swiper-pagination span.slider-bar-active {
			position: absolute;
			bottom: 0;
			left: 0;
			z-index: 2;
			width: 0%;
			border-radius: 3px;
			height: var(--cnvs-swiper-bar-height);
			background-color: var(--cnvs-swiper-bar-active-color) !important;
		}

		.swiper-pagination span:hover span.slider-bar {
			background-color: var(--cnvs-swiper-bar-color) !important;
		}

		.swiper-pagination-bullet-active {
			background-color: transparent;
		}
		.swiper-pagination-bullet-active span.slider-bar-active {
			animation-name: swiperBarAnim;
			animation-duration: var(--cnvs-swiper-autoplay-speed);
			animation-timing-function: ease-in;
			animation-iteration-count: 1;
			animation-direction: alternate;
			animation-fill-mode: forwards;
		}

		@keyframes swiperBarAnim {
			0% {
				width: 0%;
			}
			100% {
				width: 100%;
			}
		}

		.swiper-slide-active .swiper-slide-bg {
			-webkit-animation: kenburns-top 14s ease-out both;
	        animation: kenburns-top 14s ease-out both;
		}

		#block-countdown-3 .countdown-section {
			padding: 20px;
			margin-left: 15px;
			background-color: #F1F1F1;
			border: 0;
			border-radius: 4px;
		}

		#block-countdown-3 .countdown-section:first-child { margin-left: 0; }

		/*@keyframes kenburns-top {
			0% {
				-webkit-transform: scale(1);
						transform: scale(1);
				-webkit-transform-origin: 50% 50%;
						transform-origin: 50% 50%;
			}
			100% {
				-webkit-transform: scale(1.15);
						transform: scale(1.15);
				-webkit-transform-origin: top;
						transform-origin: top;
			}
		}*/
	</style>
</head>

<body class="stretched">

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper">
		<header id="header" class="transparent-header" data-sticky-class="not-dark">
			<div id="header-wrap">
				<div class="container">
					<div class="header-row">

						<!-- Logo
						============================================= -->
						<div id="logo" class="me-lg-5">
							<a href="{{ route('home') }}">
								<img class="logo-default" srcset="{{getWebsiteConfig('site_logo') ?? asset('clients/asset/images/zingvn/skin/logo1.png')}}, {{getWebsiteConfig('site_logo') ?? asset('clients/asset/images/zingvn/skin/logo1.png')}}" src="{{getWebsiteConfig('site_logo') ?? asset('clients/asset/images/zingvn/skin/logo1.png')}}" alt="{{ config('app.name', 'Võ Lâm Tiên Kiếm') }}">
								<img class="logo-dark" srcset="{{getWebsiteConfig('site_logo') ?? asset('clients/asset/images/zingvn/skin/logo1.png')}}, {{getWebsiteConfig('site_logo') ?? asset('clients/asset/images/zingvn/skin/logo1.png')}}" src="{{getWebsiteConfig('site_logo') ?? asset('clients/asset/images/zingvn/skin/logo1.png')}}" alt="{{ config('app.name', 'Võ Lâm Tiên Kiếm') }}">
							</a>
						</div><!-- #logo end -->

						<div class="header-misc ms-lg-auto">
							@if ($opening_time['show'])
								<h2 id="block-countdown-3" class="countdown countdown-medium" data-year="{{$opening_time['year']}}" data-month="{{$opening_time['month']}}" data-day="{{$opening_time['day']}}" data-hour="{{$opening_time['hour']}}" data-format="dHMS"></h2>
							@endif
						</div>

						<div class="primary-menu-trigger">
							<button class="cnvs-hamburger" type="button" title="Open Mobile Menu">
								<span class="cnvs-hamburger-box"><span class="cnvs-hamburger-inner"></span></span>
							</button>
						</div>

						<!-- Primary Navigation
						============================================= -->
						<nav class="primary-menu">

							<ul class="menu-container">
								<li class="menu-item">
									<a class="menu-link" href="{{ route('home') }}"><div>Trang chủ</div></a>
								</li>
								<li class="menu-item">
									<a class="menu-link" href="{{ route('register') }}"><div>Đăng ký</div></a>
								</li>
								<li class="menu-item">
									<a class="menu-link" href="{{ route('login') }}"><div>Đăng nhập</div></a>
								</li>
								<li class="menu-item">
									<a class="menu-link" href="{{getWebsiteConfig('download_link') ?? '#'}}"><div>Tải Về</div></a>
								</li>
							</ul>
							
						</nav><!-- #primary-menu end -->
					</div>
				</div>
			</div>
			<div class="header-wrap-clone"></div>
		</header><!-- #header end -->

		<!-- Content
		============================================= -->
		<section id="content" class="include-header">
			<div class="content-wrap py-0">

				<!-- Hero Section
				============================================= -->
				<div class="slider-element swiper_wrapper dark min-vh-100 customjs">
					<div class="swiper swiper-parent">
						<div class="swiper-wrapper">
							@if ($welcomeBanners->count() > 0)
								@foreach ($welcomeBanners as $banner)
									<div class="swiper-slide">
										<div class="swiper-slide-bg" style="background-image: url('{{$banner->image}}');"></div>
									</div>
								@endforeach
							@else
								<div class="swiper-slide">
									<div class="swiper-slide-bg" style="background-image: url('{{asset("welcome/assets/images/1.jpg")}}');"></div>
								</div>
							@endif
						</div>
						<!-- If we need pagination -->
						<div class="swiper-pagination"></div>
					</div>
				</div>

			</div>
		</section><!-- #content end -->


	</div><!-- #wrapper end -->

	<!-- Go To Top
	============================================= -->
	<div id="gotoTop" class="uil uil-angle-up"></div>

	<!-- JavaScripts
	============================================= -->
	<script src="{{asset('welcome/assets/js/plugins.min.js')}}"></script>
	<script src="{{asset('welcome/assets/js/functions.bundle.js')}}"></script>

	<script>
		window.addEventListener( 'load', function() {
			var cssVarSpeed = getComputedStyle(document.querySelector('.swiper-pagination'));
			var swiperSpeed = (cssVarSpeed.getPropertyValue('--cnvs-swiper-autoplay-speed')).split('ms');


			var swiper = new Swiper('.swiper', {
				slidesPerView: '1',
				loop: true,
				autoplayDisableOnInteraction: false,
				autoplay: {
					delay: Number( swiperSpeed[0] )
				},
				pagination: {
					el: '.swiper-pagination',
					clickable: 'true',
					type: 'bullets',
					renderBullet: function (index, className) {
						return '<span class="' + className + '">' + '<span class="slider-bar"></span>' + '<span class="slider-bar-active"></span>'  + '</span>';
					},
				}
			});
		});
  </script>

</body>
</html>