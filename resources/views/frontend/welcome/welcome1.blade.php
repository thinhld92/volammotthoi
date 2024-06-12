<!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-navbar-fixed layout-wide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="{{asset('backend/assets\/')}}"
  data-template="front-pages">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>{{ config('app.name', 'Võ Lâm Tiên Kiếm') }} | Công thành chiến 2005</title>

    <meta name="description" content="VLTK - {{ config('app.name', 'Võ Lâm Tiên Kiếm') }}">
    <meta property="og:image"         content="{{asset(getWebsiteConfig('site_image') ?? '')}}" />
	  <link rel="icon" type="image/png" href="{{getWebsiteConfig('site_icon') ?? asset('clients/asset/images/icon.ico')}}">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap"
      rel="stylesheet" />

    <link rel="stylesheet" href="{{asset('backend/assets/vendor/fonts/tabler-icons.css')}}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{asset('backend/assets/vendor/css/rtl/core.css')}}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{asset('backend/assets/vendor/css/rtl/theme-default.css')}}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{asset('backend/assets/css/demo.css')}}" />
    <link rel="stylesheet" href="{{asset('backend/assets/vendor/css/pages/front-page.css')}}" />
    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{asset('backend/assets/vendor/libs/node-waves/node-waves.css')}}" />

    <link rel="stylesheet" href="{{asset('backend/assets/vendor/libs/nouislider/nouislider.css')}}" />
    <link rel="stylesheet" href="{{asset('backend/assets/vendor/libs/swiper/swiper.css')}}" />

    <!-- Page CSS -->

    <link rel="stylesheet" href="{{asset('backend/assets/vendor/css/pages/front-page-landing.css')}}" />

    <!-- Helpers -->
    <script src="{{('backend/assets/vendor/js/helpers.js')}}"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="{{('backend/assets/vendor/js/template-customizer.js')}}"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{('backend/assets/js/front-config.js')}}"></script>

    <style>
      .navbar.landing-navbar {
        margin-top: 0;
        padding-top: 0;
        padding-bottom: 0;
      }
      .light-style .landing-hero{
        background-image: url("{{asset('backend/assets/img/front-pages/landing-page/frame3.jpg')}}")
      }
      .landing-hero {
        border-radius: 0;
      }
      .light-style .layout-navbar.navbar-active .navbar.landing-navbar {
        background: transparent;
      }
      .app-brand-logo.demo {
        min-width: 100px;
        min-height: 50px;
      }

      .landing-reviews {
        border-radius: 0;
      }
      /* .light-style .bg-section-img1{
        background-image: url("{{asset('frontend/assets/images/volam/part5.jpg')}}") !important;
        background-size: cover !important;
      }
      .light-style .bg-section-img2{
        background-image: url("{{asset('frontend/assets/images/volam/5.jpg')}}") !important;
        background-size: cover !important;
      }
      .light-style .bg-section-img3{
        background-image: url("{{asset('frontend/assets/images/volam/21212.jpg')}}") !important;
        background-size: cover !important;
      }
      .light-style .bg-section-img4{
        background-image: url("{{asset('frontend/assets/images/volam/bg111111.jpg')}}") !important;
        background-size: cover !important;
      } */
      
    </style>
  </head>

  <body>
    <script src="{{('backend/assets/vendor/js/dropdown-hover.js')}}"></script>
    <script src="{{('backend/assets/vendor/js/mega-dropdown.js')}}"></script>

    <!-- Navbar: Start -->
    <nav class="layout-navbar shadow-none py-0">
      <div class="container">
        <div class="navbar navbar-expand-lg landing-navbar px-3 px-md-4">
          <!-- Menu logo wrapper: Start -->
          <div class="navbar-brand app-brand demo d-flex py-0 py-lg-1 me-4">
            <!-- Mobile menu toggle: Start-->
            <button
              class="navbar-toggler border-0 px-0 me-2"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent"
              aria-expanded="false"
              aria-label="Toggle navigation">
              <i class="ti ti-menu-2 ti-sm align-middle"></i>
            </button>
            <!-- Mobile menu toggle: End-->
            <a href="{{route('home')}}" class="app-brand-link" target="_blank">
              <span class="app-brand-logo demo">
                <img src="{{getWebsiteConfig('site_logo') ?? asset('clients/asset/images/zingvn/skin/logo1.png')}}"
                alt=""
                width="100%" />
              </span>
              {{-- <span class="app-brand-text demo menu-text fw-bold ms-2 ps-1">Vuexy</span> --}}
            </a>
          </div>
          <!-- Menu logo wrapper: End -->
          <!-- Menu wrapper: Start -->
          <div class="collapse navbar-collapse landing-nav-menu" id="navbarSupportedContent">
            <button
              class="navbar-toggler border-0 text-heading position-absolute end-0 top-0 scaleX-n1-rtl"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent"
              aria-expanded="false"
              aria-label="Toggle navigation">
              <i class="ti ti-x ti-sm"></i>
            </button>
            <ul class="navbar-nav me-auto">
              <li class="nav-item">
                <a class="nav-link fw-bold text-uppercase" aria-current="page" href="#landingHero">Trang Chủ</a>
              </li>
              <li class="nav-item">
                <a class="nav-link fw-bold text-uppercase" href="#landingFeatures">Thông tin</a>
              </li>
              <li class="nav-item">
                <a class="nav-link fw-bold text-uppercase" href="#landingDinhHuong">Định hướng</a>
              </li>
              <li class="nav-item">
                <a class="nav-link fw-bold text-uppercase" href="#landingCamket">Cam kết</a>
              </li>
              <li class="nav-item">
                <a class="nav-link fw-bold text-uppercase" href="#landingReviews">Nhận xét</a>
              </li>
              <li class="nav-item">
                <a class="nav-link fw-bold text-uppercase" target="_blank" href="{{getWebsiteConfig('download_link') ?? '#downloadGame'}}">Tải Game</a>
              </li>
            </ul>
          </div>
          <div class="landing-menu-overlay d-lg-none"></div>
          <!-- Menu wrapper: End -->
          <!-- Toolbar: Start -->
          <ul class="navbar-nav flex-row align-items-center ms-auto">
            <!-- Style Switcher -->
            <li class="nav-item dropdown-style-switcher dropdown me-2 me-xl-0">
              <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                <i class="ti ti-sm"></i>
              </a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-styles">
                <li>
                  <a class="dropdown-item" href="javascript:void(0);" data-theme="light">
                    <span class="align-middle"><i class="ti ti-sun me-2"></i>Light</span>
                  </a>
                </li>
                <li>
                  <a class="dropdown-item" href="javascript:void(0);" data-theme="dark">
                    <span class="align-middle"><i class="ti ti-moon me-2"></i>Dark</span>
                  </a>
                </li>
                <li>
                  <a class="dropdown-item" href="javascript:void(0);" data-theme="system">
                    <span class="align-middle"><i class="ti ti-device-desktop me-2"></i>System</span>
                  </a>
                </li>
              </ul>
            </li>
            <!-- / Style Switcher-->

            <!-- navbar button: Start -->
            <li>
              <a href="{{ route('register') }}" class="btn btn-primary" target="_blank">
                <span class="tf-icons ti ti-registered scaleX-n1-rtl me-md-1"></span>
                <span class="d-none d-md-block">Đăng ký</span>
              </a>
              <a href="{{ route('login') }}" class="btn btn-primary" target="_blank">
                <span class="tf-icons ti ti-login scaleX-n1-rtl me-md-1"></span>
                <span class="d-none d-md-block">Đăng Nhập</span>
              </a>
            </li>
            <!-- navbar button: End -->
          </ul>
          <!-- Toolbar: End -->
        </div>
      </div>
    </nav>
    <!-- Navbar: End -->

    <!-- Sections:Start -->

    <div data-bs-spy="scroll" class="scrollspy-example">
      <!-- Hero: Start -->
      <section id="hero-animation">
        <div id="landingHero" class="section-py landing-hero position-relative">
          <div class="container">
            <div class="hero-text-box text-center">
              <h1 class="text-primary hero-title display-6 fw-bold">PHIÊN BẢN CÔNG THÀNH CHIẾN 2005 - THÂN PHÁP</h1>
              @if ($opening_time and $opening_time['show'] == 1)
                <h2 class="hero-sub-title h6 mb-4 pb-1">
                  Opening Time<br class="d-none d-lg-block" />
                  <span class="">{{$opening_time['hour']}}h, ngày {{$opening_time['day']}}-{{$opening_time['month']}}-{{$opening_time['year']}}</span>
                </h2>
              @endif
              <div class="landing-hero-btn d-inline-block position-relative">
                <span class="hero-btn-item position-absolute d-none d-md-flex text-heading"
                  >Thêm thông tin
                  <img
                    src="{{asset('backend/assets/img/front-pages/icons/Join-community-arrow.png')}}"
                    alt="Join community arrow"
                    class="scaleX-n1-rtl"
                /></span>
                <a href="{{route('home')}}" class="btn btn-danger btn-lg">Đến Trang Chủ</a>
              </div>
            </div>

            
          </div>
        </div>
        <!-- <div class="landing-hero-blank"></div> -->
      </section>
      <!-- Hero: End -->

      <section id="landing-carosel" >
        <div
          id="carouselExampleDark"
          class="carousel carousel-dark slide carousel-fade"
          data-bs-ride="carousel">
          <div class="carousel-indicators">
            @php
              $count = 0;
            @endphp
            @foreach ($welcomeBanners as $banner)
              <button
              type="button"
              data-bs-target="#carouselExampleDark"
              data-bs-slide-to="{{$count}}"
              class="{{$loop->first ? 'active' : ''}}"
              aria-current="true"
              aria-label="{{$banner->title}}"></button>
              @php
                  $count++;
              @endphp
            @endforeach
          </div>
          <div class="carousel-inner" style="max-height: 100vh;">
            @foreach ($welcomeBanners as $banner)
              <div class="carousel-item {{$loop->first ? 'active' : ''}}">
                <img class="d-block w-100" src="{{$banner->image}}" alt="{{$banner->title}}" />
              </div>
            @endforeach
          </div>
          <a class="carousel-control-prev" href="#carouselExampleDark" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleDark" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </a>
        </div>
      </section>

      <!-- Useful features: Start -->
      <section id="landingFeatures" class="section-py bg-body landing-features bg-section-img1">
        <div class="container">
          <div class="col-lg-10 mx-auto">
            
            <div class="text-center mb-3 pb-1">
              <span class="badge bg-label-primary">Tính năng</span>
            </div>
            <h3 class="text-center mb-1">
              <span class="section-title">Thông tin server</span>
            </h3>
            <p class="text-center mb-3 mb-md-5 pb-3">
              <span class="text-danger">Phiên bản đồ xanh chủ đạo, hoài niệm, đầy đủ kỹ năng, nhiệm vụ</span>
            </p>
            <div class="features-icon-wrapper row gx-0 gy-4 g-sm-5">
              <div class="col-lg-4 col-sm-6 features-icon-box">
                <div class="card border border-primary shadow-lg">
                  <div class="card-header">
                    <div class="text-center mb-3">
                      <img src="{{asset('backend/assets/img/front-pages/icons/laptop.png')}}" alt="laptop charging" />
                    </div>
                    <h5 class="mb-3 text-center">An Toàn</h5>
                  </div>
                  <div class="card-body">
                    <p class="features-icon-description">
                      <ul class="list-unstyled">
                        <li class="mb-3">
                          <span class="badge badge-center rounded-pill bg-label-primary p-0 me-2"><i class="ti ti-check ti-xs"></i></span>
                          Không chứa mã độc, malware
                        </li>
                        <li class="mb-3">
                          <span class="badge badge-center rounded-pill bg-label-primary p-0 me-2"><i class="ti ti-check ti-xs"></i></span>
                          Không cần tắt AntiVirus
                        </li>
                        <li class="mb-3">
                          <span class="badge badge-center rounded-pill bg-label-primary p-0 me-2"><i class="ti ti-check ti-xs"></i></span>
                          Không cần tắt Windows Defender
                        </li>
                        <li class="mb-3">
                          <span class="badge badge-center rounded-pill bg-label-primary p-0 me-2"><i class="ti ti-check ti-xs"></i></span>
                          Vi phạm quy định sẽ bị block tài khoản
                        </li>
                      </ul>
                    </p>
                  </div>
                </div>
                
              </div>
              <div class="col-lg-4 col-sm-6 features-icon-box">
                <div class="card border border-primary shadow-lg">
                  <div class="card-header">
                    <div class="text-center mb-3">
                      <img src="{{asset('backend/assets/img/front-pages/icons/rocket.png')}}" alt="transition up" />
                    </div>
                    <h5 class="mb-3 text-center">Auto Ingame</h5>
                  </div>
                  <div class="card-body">
                    <p class="features-icon-description">
                      <ul class="list-unstyled">
                        <li class="mb-3">
                          <span class="badge badge-center rounded-pill bg-label-primary p-0 me-2"><i class="ti ti-check ti-xs"></i></span>
                          Đầy đủ chức năng để luyện công
                        </li>
                        <li class="mb-3">
                          <span class="badge badge-center rounded-pill bg-label-primary p-0 me-2"><i class="ti ti-check ti-xs"></i></span>
                          PK mượt mà
                        </li>
                        <li class="mb-3">
                          <span class="badge badge-center rounded-pill bg-label-primary p-0 me-2"><i class="ti ti-check ti-xs"></i></span>
                          Không sử dụng được Auto Ngoài
                        </li>
                        <li class="mb-3">
                          <span class="badge badge-center rounded-pill bg-label-primary p-0 me-2"><i class="ti ti-check ti-xs"></i></span>
                          Chống kéo xe PK
                        </li>
                      </ul>
                    </p>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-sm-6 features-icon-box">
                <div class="card border border-primary shadow-lg">
                  <div class="card-header">
                    <div class="text-center mb-3">
                      <img src="{{asset('backend/assets/img/front-pages/icons/paper.png')}}" alt="edit" />
                    </div>
                    <h5 class="mb-3 text-center">Hạn chế cày tiền</h5>
                  </div>
                  <div class="card-body">
                    <p class="features-icon-description">
                      <ul class="list-unstyled">
                        <li class="mb-3">
                          <span class="badge badge-center rounded-pill bg-label-primary p-0 me-2"><i class="ti ti-check ti-xs"></i></span>
                          4Acc/PC/IP
                        </li>
                        <li class="mb-3">
                          <span class="badge badge-center rounded-pill bg-label-primary p-0 me-2"><i class="ti ti-check ti-xs"></i></span>
                          1AccTN/PC/IP
                        </li>
                        <li class="mb-3">
                          <span class="badge badge-center rounded-pill bg-label-primary p-0 me-2"><i class="ti ti-check ti-xs"></i></span>
                          Chống máy ảo
                        </li>
                        <li class="mb-3">
                          <span class="badge badge-center rounded-pill bg-label-primary p-0 me-2"><i class="ti ti-check ti-xs"></i></span>
                          Tống Kim 1Acc/IP
                        </li>
                      </ul>
                    </p>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-sm-6 features-icon-box">
                <div class="card border border-primary shadow-lg">
                  <div class="card-header">
                    <div class="text-center mb-3">
                      <img src="{{asset('backend/assets/img/front-pages/icons/check.png')}}" alt="3d select solid" />
                    </div>
                    <h5 class="mb-3 text-center">Cân bằng người chơi</h5>
                  </div>
                  <div class="card-body">
                    <p class="features-icon-description">
                      <ul class="list-unstyled">
                        <li class="mb-3">
                          <span class="badge badge-center rounded-pill bg-label-primary p-0 me-2"><i class="ti ti-check ti-xs"></i></span>
                          Cân bằng người cày và donate
                        </li>
                        <li class="mb-3">
                          <span class="badge badge-center rounded-pill bg-label-primary p-0 me-2"><i class="ti ti-check ti-xs"></i></span>
                          Train rơi xu
                        </li>
                        <li class="mb-3">
                          <span class="badge badge-center rounded-pill bg-label-primary p-0 me-2"><i class="ti ti-check ti-xs"></i></span>
                          Mọi hoạt động ra xu
                        </li>
                      </ul>
                    </p>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-sm-6 features-icon-box">
                <div class="card border border-primary shadow-lg">
                  <div class="card-header">
                    <div class="text-center mb-3">
                      <img src="{{asset('backend/assets/img/front-pages/icons/user.png')}}" alt="lifebelt" />
                    </div>
                    <h5 class="mb-3 text-center">Hoạt động liên tục</h5>
                  </div>
                  <div class="card-body">
                    <p class="features-icon-description">
                      <ul class="list-unstyled">
                        <li class="mb-3">
                          <span class="badge badge-center rounded-pill bg-label-primary p-0 me-2"><i class="ti ti-check ti-xs"></i></span>
                          Liên tục tổ chức giải đấu hấp dẫn
                        </li>
                        <li class="mb-3">
                          <span class="badge badge-center rounded-pill bg-label-primary p-0 me-2"><i class="ti ti-check ti-xs"></i></span>
                          Tổng giá trị khổng lồ
                        </li>
                        <li class="mb-3">
                          <span class="badge badge-center rounded-pill bg-label-primary p-0 me-2"><i class="ti ti-check ti-xs"></i></span>
                          Lối chơi, hình thức đa dạng
                        </li>
                      </ul>
                    </p>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-sm-6 features-icon-box">
                <div class="card border border-primary shadow-lg">
                  <div class="card-header">
                    <div class="text-center mb-3">
                      <img src="{{asset('backend/assets/img/front-pages/icons/keyboard.png')}}" alt="google docs" />
                    </div>
                    <h5 class="mb-3 text-center">Hỗ trợ 24/7</h5>
                  </div>
                  <div class="card-body">
                    <p class="features-icon-description">
                      <ul class="list-unstyled">
                        <li class="mb-3">
                          <span class="badge badge-center rounded-pill bg-label-primary p-0 me-2"><i class="ti ti-check ti-xs"></i></span>
                          Đội ngũ support nhiệt tình
                        </li>
                        <li class="mb-3">
                          <span class="badge badge-center rounded-pill bg-label-primary p-0 me-2"><i class="ti ti-check ti-xs"></i></span>
                          Hỗ trợ tận giường 24/7
                        </li>
                        <li class="mb-3">
                          <span class="badge badge-center rounded-pill bg-label-primary p-0 me-2"><i class="ti ti-check ti-xs"></i></span>
                          Mọi lúc mọi nơi
                        </li>
                      </ul>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Useful features: End -->

      <!-- Dinh Huong Server: Start -->
      <section id="landingDinhHuong" class="section-py landing-reviews pb-0 bg-section-img2">
        <div class="container">
          <div class="row align-items-center gx-0 gy-4 g-lg-5">
            <div class="col-md-6 col-lg-4">
              <div class="mb-3 pb-1">
                <span class="badge bg-label-primary text-uppercase">Thông tin</span>
              </div>
              <h3 class="mb-1"><span class="section-title">ĐỊNH HƯỚNG SERVER</span></h3>
              <p class="mb-3 mb-md-5">
                &nbsp;
              </p>
            </div>
            <div class="col-md-6 col-lg-8">
              <div class="dinhhuong mb-5 pb-md-2 pb-md-3">
                <div class="card">
                  <div class="list-group">
                    <a href="javascript:void(0);" class="list-group-item list-group-item-action d-flex justify-content-between">
                      <div class="li-wrapper d-flex justify-content-start align-items-center">
                        <div class="avatar avatar-sm me-3">
                          <span class="avatar-initial rounded-circle bg-label-danger">1</span>
                        </div>
                        <div class="list-content">
                          <h6 class="mb-1">Đồ xanh là chủ đạo, cực kỳ có giá trị</h6>
                        </div>
                      </div>
                    </a>
                    <a href="javascript:void(0);" class="list-group-item list-group-item-action d-flex justify-content-between">
                      <div class="li-wrapper d-flex justify-content-start align-items-center">
                        <div class="avatar avatar-sm me-3">
                          <span class="avatar-initial rounded-circle bg-label-success">2</span>
                        </div>
                        <div class="list-content">
                          <h6 class="mb-1">Cày cuốc từ cấp 1 - lên cấp khá dễ, đến 100 sẽ chậm dần</h6>
                        </div>
                      </div>
                    </a>
                    <a href="javascript:void(0);" class="list-group-item list-group-item-action d-flex justify-content-between">
                      <div class="li-wrapper d-flex justify-content-start align-items-center">
                        <div class="avatar avatar-sm me-3">
                          <span class="avatar-initial rounded-circle bg-label-primary">3</span>
                        </div>
                        <div class="list-content">
                          <h6 class="mb-1">Các tính năng và event nguyên bản CTC 2005</h6>
                        </div>
                      </div>
                    </a>
                    <a href="javascript:void(0);" class="list-group-item list-group-item-action d-flex justify-content-between">
                      <div class="li-wrapper d-flex justify-content-start align-items-center">
                        <div class="avatar avatar-sm me-3">
                          <span class="avatar-initial rounded-circle bg-label-info">4</span>
                        </div>
                        <div class="list-content">
                          <h6 class="mb-1">Trang bị Hoàng Kim rơi từ Boss, Dã Tẩu 2k, sự kiện</h6>
                        </div>
                      </div>
                    </a>
                    <a href="javascript:void(0);" class="list-group-item list-group-item-action d-flex justify-content-between">
                      <div class="li-wrapper d-flex justify-content-start align-items-center">
                        <div class="avatar avatar-sm me-3">
                          <span class="avatar-initial rounded-circle bg-label-danger">5</span>
                        </div>
                        <div class="list-content">
                          <h6 class="mb-1">Liên tục tổ chức các giải đấu nội bộ server dùng 1 acc chính</h6>
                        </div>
                      </div>
                    </a>
                    <a href="javascript:void(0);" class="list-group-item list-group-item-action d-flex justify-content-between">
                      <div class="li-wrapper d-flex justify-content-start align-items-center">
                        <div class="avatar avatar-sm me-3">
                          <span class="avatar-initial rounded-circle bg-label-success">6</span>
                        </div>
                        <div class="list-content">
                          <h6 class="mb-1">Luôn luôn lắng nghe các góp ý và sẽ chọn lọc mỗi khi áp dụng</h6>
                        </div>
                      </div>
                    </a>
                    <a href="javascript:void(0);" class="list-group-item list-group-item-action d-flex justify-content-between">
                      <div class="li-wrapper d-flex justify-content-start align-items-center">
                        <div class="avatar avatar-sm me-3">
                          <span class="avatar-initial rounded-circle bg-label-primary">7</span>
                        </div>
                        <div class="list-content">
                          <h6 class="mb-1">Giữ vững nguyên tắc: Không can thiệp vào game, không can thiệp vào chuyện nội bộ các bang hội, không đưa bất kỳ acc hay vật phẩm nào vào game</h6>
                        </div>
                      </div>
                    </a>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Dinh Huong Server: End -->

      <!-- Fun facts: Start -->
      <section id="landingCamket" class="section-py bg-body landing-fun-facts bg-section-img3">
        <div class="container">
          <div class="row gy-3">
            <div class="col-sm-6 col-lg-3">
              <div class="card border border-label-primary shadow-none">
                <div class="card-body text-center">
                  <img src="{{asset('backend/assets/img/front-pages/icons/rocket.png')}}" alt="laptop" class="mb-2" />
                  <h5 class="h2 mb-1">100%</h5>
                  <p class="fw-medium mb-0">
                    An toàn<br />
                    Ổn định, lâu dài
                  </p>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-lg-3">
              <div class="card border border-label-success shadow-none">
                <div class="card-body text-center">
                  <img src="{{asset('backend/assets/img/front-pages/icons/user-success.png')}}" alt="laptop" class="mb-2" />
                  <h5 class="h2 mb-1">5K+</h5>
                  <p class="fw-medium mb-0">
                    Cộng đồng đông đảo<br />
                    Hơn 5k thành viên
                  </p>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-lg-3">
              <div class="card border border-label-info shadow-none">
                <div class="card-body text-center">
                  <img src="{{asset('backend/assets/img/front-pages/icons/diamond-info.png')}}" alt="laptop" class="mb-2" />
                  <h5 class="h2 mb-1">24/7</h5>
                  <p class="fw-medium mb-0">
                    Đội ngũ hỗ trợ mọi lúc<br />
                    24h/7ngày
                  </p>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-lg-3">
              <div class="card border border-label-warning shadow-none">
                <div class="card-body text-center">
                  <img src="{{asset('backend/assets/img/front-pages/icons/check-warning.png')}}" alt="laptop" class="mb-2" />
                  <h5 class="h2 mb-1">100%</h5>
                  <p class="fw-medium mb-0">
                    Hỗ trợ 100% khoản nạp<br />
                    khi xảy ra sự cố Reopen
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Fun facts: End -->

      <!-- Our great team: Start -->
      <section id="landingTeam" class="section-py landing-team bg-section-img4">
        <div class="container">
          <div class="text-center mb-3 pb-1">
            <span class="badge bg-label-primary">Open server</span>
          </div>
          <h3 class="text-center mb-1"><span class="section-title">Chuỗi sự kiện Open Server</span></h3>
          <p class="text-center mb-md-5 pb-3">Tham gia chuỗi sự kiện Open server để xưng bá anh hùng</p>
          <div class="row gy-5 mt-2">
            <div class="col-lg-3 col-sm-6">
              <div class="card mt-3 mt-lg-0 shadow-none">
                <div class="bg-label-primary position-relative team-image-box">
                  <img
                    src="{{asset('backend/assets/img/front-pages/landing-page/TopTK.jpg')}}"
                    class="position-absolute card-img-position bottom-0 start-50 scaleX-n1-rtl"
                    alt="human image"
                    width="100%" />
                </div>
                <div class="card-body border border-top-0 border-label-primary text-center">
                  <h5 class="card-title mb-0 text-uppercase">TOP Tống Kim - Alpha Test</h5>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-sm-6">
              <div class="card mt-3 mt-lg-0 shadow-none">
                <div class="bg-label-info position-relative team-image-box">
                  <img
                    src="{{asset('backend/assets/img/front-pages/landing-page/Top1Ngay.jpg')}}"
                    class="position-absolute card-img-position bottom-0 start-50 scaleX-n1-rtl"
                    alt="human image" 
                    width="100%" />
                </div>
                <div class="card-body border border-top-0 border-label-info text-center">
                  <h5 class="card-title mb-0 text-uppercase">TOP 2 ngày</h5>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-sm-6">
              <div class="card mt-3 mt-lg-0 shadow-none">
                <div class="bg-label-danger position-relative team-image-box">
                  <img
                    src="{{asset('backend/assets/img/front-pages/landing-page/Top120.jpg')}}"
                    class="position-absolute card-img-position bottom-0 start-50 scaleX-n1-rtl"
                    alt="human image" 
                    width="100%" />
                </div>
                <div class="card-body border border-top-0 border-label-danger text-center">
                  <h5 class="card-title mb-0 text-uppercase">TOP 120</h5>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-sm-6">
              <div class="card mt-3 mt-lg-0 shadow-none">
                <div class="bg-label-success position-relative team-image-box">
                  <img
                    src="{{asset('backend/assets/img/front-pages/landing-page/TopBangHoi.jpg')}}"
                    class="position-absolute card-img-position bottom-0 start-50 scaleX-n1-rtl"
                    alt="human image" 
                    width="100%"/>
                </div>
                <div class="card-body border border-top-0 border-label-success text-center">
                  <h5 class="card-title mb-0 text-uppercase">TOP Bang Hội</h5>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Our great team: End -->

      <!-- Real customers reviews: Start -->
      <section id="landingReviews" class="section-py bg-body landing-reviews pb-0">
        <!-- What people say slider: Start -->
        <div class="container">
          <div class="row align-items-center gx-0 gy-4 g-lg-5">
            <div class="col-md-6 col-lg-5 col-xl-3">
              <div class="mb-3 pb-1">
                <span class="badge bg-label-primary">Góc game thủ</span>
              </div>
              <h3 class="mb-1"><span class="section-title">Nhận xét game thủ</span></h3>
              <p class="mb-3 mb-md-5">
                Hãy xem các anh hùng hào kiệt<br class="d-none d-xl-block" />
                đã có trải nghiệm thế nào.
              </p>
              <div class="landing-reviews-btns">
                <button
                  id="reviews-previous-btn"
                  class="btn btn-label-primary reviews-btn me-3 scaleX-n1-rtl"
                  type="button">
                  <i class="ti ti-chevron-left ti-sm"></i>
                </button>
                <button id="reviews-next-btn" class="btn btn-label-primary reviews-btn scaleX-n1-rtl" type="button">
                  <i class="ti ti-chevron-right ti-sm"></i>
                </button>
              </div>
            </div>
            <div class="col-md-6 col-lg-7 col-xl-9">
              <div class="swiper-reviews-carousel overflow-hidden mb-5 pb-md-2 pb-md-3">
                <div class="swiper" id="swiper-reviews">
                  <div class="swiper-wrapper">
                    <div class="swiper-slide">
                      <div class="card h-100">
                        <div class="card-body text-body d-flex flex-column justify-content-between h-100">
                          <div class="mb-3">
                          </div>
                          <p>
                            “Quá hay luôn, lên VIP 10 còn dễ nữa là.”
                          </p>
                          <div class="text-warning mb-3">
                            <i class="ti ti-star-filled ti-sm"></i>
                            <i class="ti ti-star-filled ti-sm"></i>
                            <i class="ti ti-star-filled ti-sm"></i>
                            <i class="ti ti-star-filled ti-sm"></i>
                            <i class="ti ti-star-filled ti-sm"></i>
                          </div>
                          <div class="d-flex align-items-center">
                            <div class="avatar me-2 avatar-sm">
                              <img src="{{asset('backend/assets/img/avatars/1.png')}}" alt="Avatar" class="rounded-circle" />
                            </div>
                            <div>
                              <h6 class="mb-0">VạnLý_ĐộcHành</h6>
                              <p class="small text-muted mb-0">Bang Tình Nghĩa</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="swiper-slide">
                      <div class="card h-100">
                        <div class="card-body text-body d-flex flex-column justify-content-between h-100">
                          <div class="mb-3">
                          </div>
                          <p>
                            “Không nạp cũng chơi được, chịu khó hoạt động tý là mạnh như rồng”
                          </p>
                          <div class="text-warning mb-3">
                            <i class="ti ti-star-filled ti-sm"></i>
                            <i class="ti ti-star-filled ti-sm"></i>
                            <i class="ti ti-star-filled ti-sm"></i>
                            <i class="ti ti-star-filled ti-sm"></i>
                            <i class="ti ti-star-filled ti-sm"></i>
                          </div>
                          <div class="d-flex align-items-center">
                            <div class="avatar me-2 avatar-sm">
                              <img src="{{asset('backend/assets/img/avatars/2.png')}}" alt="Avatar" class="rounded-circle" />
                            </div>
                            <div>
                              <h6 class="mb-0">Hoả Lang</h6>
                              <p class="small text-muted mb-0">Bang Sát Thần</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="swiper-slide">
                      <div class="card h-100">
                        <div class="card-body text-body d-flex flex-column justify-content-between h-100">
                          <div class="mb-3">
                            
                          </div>
                          <p>
                            “Không chơi server này thì chơi server nào nữa, nhảy đi đâu cho ốm đòn ra”
                          </p>
                          <div class="text-warning mb-3">
                            <i class="ti ti-star-filled ti-sm"></i>
                            <i class="ti ti-star-filled ti-sm"></i>
                            <i class="ti ti-star-filled ti-sm"></i>
                            <i class="ti ti-star-filled ti-sm"></i>
                            <i class="ti ti-star-filled ti-sm"></i>
                          </div>
                          <div class="d-flex align-items-center">
                            <div class="avatar me-2 avatar-sm">
                              <img src="{{asset('backend/assets/img/avatars/3.png')}}" alt="Avatar" class="rounded-circle" />
                            </div>
                            <div>
                              <h6 class="mb-0">Nhất Chi Mai</h6>
                              <p class="small text-muted mb-0">Trùm Boss</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="swiper-slide">
                      <div class="card h-100">
                        <div class="card-body text-body d-flex flex-column justify-content-between h-100">
                          <div class="mb-3">
                            
                          </div>
                          <p>
                            “Chơi ngon mà post điểm Tống Kim bị admin nó nhốt tù, cay”
                          </p>
                          <div class="text-warning mb-3">
                            <i class="ti ti-star-filled ti-sm"></i>
                            <i class="ti ti-star-filled ti-sm"></i>
                            <i class="ti ti-star-filled ti-sm"></i>
                            <i class="ti ti-star-filled ti-sm"></i>
                            <i class="ti ti-star ti-sm"></i>
                          </div>
                          <div class="d-flex align-items-center">
                            <div class="avatar me-2 avatar-sm">
                              <img src="{{asset('backend/assets/img/avatars/4.png')}}" alt="Avatar" class="rounded-circle" />
                            </div>
                            <div>
                              <h6 class="mb-0">Sài Gòn Bạc</h6>
                              <p class="small text-muted mb-0">Bang Tình Nghĩa</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="swiper-slide">
                      <div class="card h-100">
                        <div class="card-body text-body d-flex flex-column justify-content-between h-100">
                          <div class="mb-3">
                            
                          </div>
                          <p>
                            “Đi làm về hoạt động từ 18h đến 24h, đừ người 😂”
                          </p>
                          <div class="text-warning mb-3">
                            <i class="ti ti-star-filled ti-sm"></i>
                            <i class="ti ti-star-filled ti-sm"></i>
                            <i class="ti ti-star-filled ti-sm"></i>
                            <i class="ti ti-star-filled ti-sm"></i>
                            <i class="ti ti-star-filled ti-sm"></i>
                          </div>
                          <div class="d-flex align-items-center">
                            <div class="avatar me-2 avatar-sm">
                              <img src="{{asset('backend/assets/img/avatars/5.png')}}" alt="Avatar" class="rounded-circle" />
                            </div>
                            <div>
                              <h6 class="mb-0">Lê Châu Tam</h6>
                              <p class="small text-muted mb-0">Trùm VDQ</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="swiper-slide">
                      <div class="card h-100">
                        <div class="card-body text-body d-flex flex-column justify-content-between h-100">
                          <div class="mb-3">
                          
                          </div>
                          <p>
                            “Chơi hay, ham quá, vợ nó la 😰”
                          </p>
                          <div class="text-warning mb-3">
                            <i class="ti ti-star-filled ti-sm"></i>
                            <i class="ti ti-star-filled ti-sm"></i>
                            <i class="ti ti-star-filled ti-sm"></i>
                            <i class="ti ti-star-filled ti-sm"></i>
                            <i class="ti ti-star ti-sm"></i>
                          </div>
                          <div class="d-flex align-items-center">
                            <div class="avatar me-2 avatar-sm">
                              <img src="{{asset('backend/assets/img/avatars/1.png')}}" alt="Avatar" class="rounded-circle" />
                            </div>
                            <div>
                              <h6 class="mb-0">Vui Là 9</h6>
                              <p class="small text-muted mb-0">Hội hóng boss</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="swiper-button-next"></div>
                  <div class="swiper-button-prev"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- What people say slider: End -->

      </section>
      <!-- Real customers reviews: End -->

      <!-- CTA: Start -->
      <section id="downloadGame" class="section-py landing-cta p-lg-0 pb-0">
        <div class="container">
          <div class="row align-items-center gy-5 gy-lg-0">
            <div class="col-lg-6 text-center text-lg-start">
              <h6 class="h2 text-primary fw-bold mb-1">Bạn đã sẵn sàng chinh phục cảnh giới kiếm hiệp đỉnh cao?</h6>
              <p class="fw-medium mb-4">Bắt đầu ngay và nhận hỗ trợ tân thủ cực kỳ hấp dẫn</p>
              <a href="{{getWebsiteConfig('download_link') ?? '#'}}" class="btn btn-lg btn-danger" target="_blank">
                <span><i class="ti ti-download"></i></span>
                <span class="d-none d-md-block">Tải ngay</span>
              </a>
            </div>
            <div class="col-lg-6 pt-lg-5 text-center text-lg-end">
              <img
                src="{{asset('backend/assets/img/front-pages/landing-page/gallery1.png')}}"
                alt="cta dashboard"
                class="img-fluid" />
            </div>
          </div>
        </div>
      </section>
      <!-- CTA: End -->
    </div>

    <!-- / Sections:End -->

    <!-- Footer: Start -->
    <footer class="landing-footer bg-body footer-text">
      <div class="footer-bottom py-3">
        <div
          class="container d-flex flex-wrap justify-content-between flex-md-row flex-column text-center text-md-start">
          <div class="mb-2 mb-md-0">
            <span class="footer-text"
              >©
              <script>
                document.write(new Date().getFullYear());
              </script>
            </span>
            <a href="{{route('home')}}" target="_blank" class="fw-medium text-white footer-link">{{ config('app.name', 'Võ Lâm Tiên Kiếm') }}.</a>
            <span class="footer-text"> Made with ❤️ for a better game.</span>
          </div>
          <div> 
            <a href="{{getWebsiteConfig('fanpage_url') ?? ''}}" class="footer-link me-3" target="_blank">
              <img
                src="{{asset('backend/assets/img/front-pages/icons/facebook-light.png')}}"
                alt="facebook icon"
                data-app-light-img="front-pages/icons/facebook-light.png"
                data-app-dark-img="front-pages/icons/facebook-dark.png" />
            </a>
          </div>
        </div>
      </div>
    </footer>
    <!-- Footer: End -->

    <!-- Core JS -->
    <!-- build:js assets/vend{{('backend/core.js')}} -->
    <script src="{{('backend/assets/vendor/libs/popper/popper.js')}}"></script>
    <script src="{{('backend/assets/vendor/js/bootstrap.js')}}"></script>
    <script src="{{('backend/assets/vendor/libs/node-waves/node-waves.js')}}"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{('backend/assets/vendor/libs/nouislider/nouislider.js')}}"></script>
    <script src="{{('backend/assets/vendor/libs/swiper/swiper.js')}}"></script>

    <!-- Main JS -->
    <script src="{{('backend/assets/js/front-main.js')}}"></script>

    <!-- Page JS -->
    <script src="{{('backend/assets/js/front-page-landing.js')}}"></script>
  </body>
</html>
