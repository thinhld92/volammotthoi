<!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-wide customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="{{asset('backend/assets\/')}}"
  data-template="vertical-menu-template">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Đăng ký - {{getWebsiteConfig('site_title') ?? env('APP_NAME')}}</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{asset('backend/assets/img/favicon/favicon.ico')}}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap"
      rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="{{asset('backend/assets/vendor/fonts/fontawesome.css')}}" />
    <link rel="stylesheet" href="{{asset('backend/assets/vendor/fonts/tabler-icons.css')}}" />
    <link rel="stylesheet" href="{{asset('backend/assets/vendor/fonts/flag-icons.css')}}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{asset('backend/assets/vendor/css/rtl/core.css')}}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{asset('backend/assets/vendor/css/rtl/theme-default.css')}}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{asset('backend/assets/css/demo.css')}}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{asset('backend/assets/vendor/libs/node-waves/node-waves.css')}}" />
    <link rel="stylesheet" href="{{asset('backend/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />
    <link rel="stylesheet" href="{{asset('backend/assets/vendor/libs/typeahead-js/typeahead.css')}}" />
    <!-- Vendor -->
    <link rel="stylesheet" href="{{asset('backend/assets/vendor/libs/@form-validation/umd/styles/index.min.css')}}" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="{{asset('backend/assets/vendor/css/pages/page-auth.css')}}" />
    <link rel="stylesheet" href="{{asset('backend/assets/css/custom.css')}}">

    <!-- Helpers -->
    <script src="{{asset('backend/assets/vendor/js/helpers.js')}}"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="{{asset('backend/assets/vendor/js/template-customizer.js')}}"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{asset('backend/assets/js/config.js')}}"></script>

    <style>
        .authentication-wrapper.authentication-cover .authentication-inner .auth-cover-bg .auth-illustration {
            max-height: 100%;
            z-index: 1;
        }
        .authentication-wrapper.authentication-bg {
            background-image: url({{asset('backend/assets/img/illustrations/login_background.jpg')}});
            background-size: cover;
            background-repeat: no-repeat;
        }

        .mx-auto {
           
            padding: 1rem 3rem;
            opacity: 0.85;
            min-height: 100vh;
            margin: auto 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            margin-right: 0 !important;
            margin-left: auto !important;
        }

        .reset-padding{
          padding-left: 0;
          padding-right: 0;
        }

        
    </style>
  </head>

  <body>
    <!-- Content -->

    <div class="authentication-wrapper authentication-cover authentication-bg">
      <div class="authentication-inner row">
        <!-- /Left Text -->
        <div class="d-none d-lg-flex col-lg-6 p-0">
        </div>
        <!-- /Left Text -->

        <!-- Login -->
        <div class="d-flex col-12 col-lg-6 align-items-center reset-padding">
          <div class="w-px-500 mx-auto card">
            <!-- Logo -->
            <div class="app-brand mb-4">
              <a href="{{ route('home') }}" class="app-brand-link gap-2">
                <span class="app-brand-logo demo">
                    <img src="{{asset('backend/assets/img/illustrations/logo_volam.png')}}" alt="">
                </span>
              </a>
            </div>
            <!-- /Logo -->
            <h3 class="mb-1">Đăng ký {{getWebsiteConfig('site_title') ?? env('APP_NAME')}} </h3>
            {{-- <p class="mb-4">Vui lòng <strong>đăng ký</strong> để bắt đầu</p> --}}
            {{-- <h3 class="mb-1">Tính năng tạm khoá</h3> --}}

            <form
             id="formAuthentication" 
             class="mb-3 {{$errors->any() ? 'was-validated custom-validate' : ''}}" 
             action="{{ route('register') }}" 
             method="POST"
            >
              @csrf  
              <div class="mb-3">
                <label for="cAccName" class="form-label">Tài khoản</label>
                <input
                  type="text"
                  class="form-control"
                  id="cAccName"
                  name="cAccName"
                  placeholder="{{ __('Enter your username') }}"
                  value="{{old('cAccName') ?? ''}}"
                  autofocus
                />
                  @error('cAccName')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>
              <div class="mb-3 form-password-toggle">
                <div class="d-flex justify-content-between">
                  <label class="form-label" for="cPassWord">Mật khẩu</label>
                </div>
                <div class="input-group input-group-merge">
                  <input
                    type="password"
                    id="cPassWord"
                    class="form-control"
                    name="cPassWord"
                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                    aria-describedby="password" 
                  />
                  <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                </div>
                @error('cPassWord')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="mb-3 form-password-toggle">
                <div class="d-flex justify-content-between">
                  <label class="form-label" for="cPassWord_confirmation">{{ __("Confirm Password") }}</label>
                </div>
                <div class="input-group input-group-merge">
                  <input
                    type="password"
                    id="cPassWord_confirmation"
                    class="form-control"
                    name="cPassWord_confirmation"
                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                    aria-describedby="password" 
                  />
                  <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                </div>
              </div>
              <div class="mb-3 form-password-toggle">
                <div class="d-flex justify-content-between">
                  <label class="form-label" for="cSecPassword">{{ __("Password 2") }}</label>
                </div>
                <div class="input-group input-group-merge">
                  <input
                    type="password"
                    id="cSecPassword"
                    class="form-control"
                    name="cSecPassword"
                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                    aria-describedby="password" 
                  />
                  <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                </div>
                @error('cSecPassword')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>

              <div class="mb-3">
                <label for="cEMail" class="form-label">{{ __("Email")  }} </label>
                <input
                  type="email"
                  class="form-control"
                  id="cEMail"
                  name="cEMail"
                  placeholder="{{ __('Enter your email') }}"
                  autofocus 
                  value="{{old('cEMail') ?? ''}}"
                />
                  @error('cEMail')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>
              <div class="mb-3">
                <label for="cRealName" class="form-label">{{ __("Full Name")  }}</label>
                <input
                  type="text"
                  class="form-control"
                  id="cRealName"
                  name="cRealName"
                  placeholder="{{ __('Enter your name') }}"
                  autofocus
                  value="{{old('cRealName') ?? ''}}"
                />
                  @error('cRealName')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>
             
              <button class="btn btn-primary d-grid w-100">Đăng ký khoản</button>
            </form>
            <p class="text-center">
              <span>Đã có tài khoản?</span>
              <a href="{{ route('login') }}">
                <span>Đăng nhập</span>
              </a>
            </p>

           
          </div>
        </div>
        <!-- /Login -->
      </div>
    </div>

    <!-- / Content -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->

    <script src="{{asset('backend/assets/vendor/libs/jquery/jquery.js')}}"></script>
    <script src="{{asset('backend/assets/vendor/libs/popper/popper.js')}}"></script>
    <script src="{{asset('backend/assets/vendor/js/bootstrap.js')}}"></script>
    <script src="{{asset('backend/assets/vendor/libs/node-waves/node-waves.js')}}"></script>
    <script src="{{asset('backend/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
    <script src="{{asset('backend/assets/vendor/libs/hammer/hammer.js')}}"></script>
    <script src="{{asset('backend/assets/vendor/libs/i18n/i18n.js')}}"></script>
    <script src="{{asset('backend/assets/vendor/libs/typeahead-js/typeahead.js')}}"></script>
    <script src="{{asset('backend/assets/vendor/js/menu.js')}}"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{asset('backend/assets/vendor/libs/@form-validation/umd/bundle/popular.min.js')}}"></script>
    <script src="{{asset('backend/assets/vendor/libs/@form-validation/umd/plugin-bootstrap5/index.min.js')}}"></script>
    <script src="{{asset('backend/assets/vendor/libs/@form-validation/umd/plugin-auto-focus/index.min.js')}}"></script>

    <!-- Main JS -->
    <script src="{{asset('backend/assets/js/main.js')}}"></script>

    <!-- Page JS -->
    {{-- <script src="{{asset('backend/assets/js/pages-auth.js')}}"></script> --}}
  </body>
</html>
