<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <meta name="robots" content="noindex, nofollow, noarchive, nosnippet" />
  <meta name="googlebot" content="noindex, nofollow, noarchive, nosnippet" />

  <title>Đăng ký - {{ getWebsiteConfig('site_title') ?? config('app.name', 'Võ Lâm Tiên Kiếm') }}</title>
  <link rel="icon" type="image/x-icon" href="{{ getWebsiteConfig('site_icon') ?? asset('clients/asset/images/icon.ico') }}" />

  <!-- Bootstrap 5.3 & FontAwesome 6 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

  <!-- Google Fonts: Be Vietnam Pro (Full Vietnamese Support) -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,400;1,600;1,700&display=swap" rel="stylesheet" />

  <!-- Wuxia Modern Theme & HoTro V2 Styles -->
  <link rel="stylesheet" href="{{ asset('frontend/assets/css/modern-theme.css') }}?v=2.2" />
  <link rel="stylesheet" href="{{ asset('frontend/assets/css/hotro-v2.css') }}?v=2.2" />
</head>
<body class="modern-theme">
  <script>
    (function () {
      if (localStorage.getItem('modern_theme') === 'light') {
        document.body.classList.add('light-theme');
      }
    })();
  </script>

  <div class="auth-v2-page" style="background-image: url('{{ asset(getWebsiteConfig('login_background') ?? 'backend/assets/img/illustrations/login_background.jpg') }}');">
    <div class="auth-v2-overlay"></div>

    <!-- Top Action Bar -->
    <div class="auth-v2-topbar">
      <a href="{{ route('home') }}" class="btn-modern-secondary btn-sm px-3 py-2">
        <i class="fa-solid fa-arrow-left"></i>
        <span>Về Trang Chủ</span>
      </a>

      <button type="button" class="hotro-theme-switch" id="authThemeSwitch" title="Đổi giao diện Sáng / Tối">
        <i class="fa-solid fa-moon"></i>
        <i class="fa-solid fa-sun"></i>
        <span class="switch-thumb"></span>
      </button>
    </div>

    <!-- Main Register Card -->
    <div class="auth-v2-container">
      <div class="auth-v2-shell" style="max-width: 1080px;">
        <div class="row g-0">
          <!-- Left Wuxia Artwork Showcase -->
          <div class="col-lg-5 d-none d-lg-block">
            <div class="auth-v2-showcase h-100" style="background-image: url('{{ asset('frontend/assets/images/wuxia_battle.png') }}');">
              <div class="auth-v2-showcase-content">
                <span class="badge-modern badge-modern-gold mb-2">
                  <i class="fa-solid fa-fire-flame-curved me-1"></i> Gia Nhập Giang Hồ
                </span>
                <h2 class="fw-bold mb-2" style="color: #F8FAFC !important;">Khởi Tạo Đại Hiệp</h2>
                <p class="small mb-3" style="color: #CBD5E1 !important;">
                  Vui lòng ghi nhớ kỹ <strong>Mật khẩu cấp 2</strong> và <strong>Email</strong> để bảo vệ tài khoản và khôi phục thông tin khi cần thiết.
                </p>
                <div class="d-flex flex-wrap gap-2">
                  <span class="hotro-safe-pill"><i class="fa-solid fa-check"></i> Miễn phí đăng ký</span>
                  <span class="hotro-safe-pill"><i class="fa-solid fa-lock"></i> Mã hoá an toàn</span>
                </div>
              </div>
            </div>
          </div>

          <!-- Right Registration Form -->
          <div class="col-12 col-lg-7">
            <div class="auth-v2-form-panel">
              <div class="text-center mb-4">
                <a href="{{ route('home') }}" class="d-inline-block mb-2">
                  <img
                    src="{{ getWebsiteConfig('site_logo') ?? asset('backend/assets/img/illustrations/logo_volam.png') }}"
                    alt="Logo"
                    style="max-height: 64px; max-width: 180px; object-fit: contain;"
                  />
                </a>
                <h3 class="fw-bold mb-1">Đăng Ký {{ getWebsiteConfig('site_title') ?? env('APP_NAME') }}</h3>
                <p class="text-muted small mb-0">Điền đầy đủ các thông tin bên dưới để tạo tài khoản game</p>
              </div>

              <form id="formAuthentication" action="{{ route('register') }}" method="POST" novalidate>
                @csrf

                <div class="row g-3 mb-4">
                  <!-- Username -->
                  <div class="col-md-6">
                    <label for="cAccName" class="hotro-form-label">Tài khoản <span class="text-danger">(*)</span></label>
                    <input
                      type="text"
                      class="hotro-control {{ $errors->has('cAccName') ? 'is-invalid' : '' }}"
                      id="cAccName"
                      name="cAccName"
                      placeholder="{{ __('Enter your username') }}"
                      value="{{ old('cAccName') ?? '' }}"
                      autofocus
                    />
                    @error('cAccName')
                      <div class="hotro-error-msg">
                        <i class="fa-solid fa-circle-exclamation"></i> {{ $message }}
                      </div>
                    @enderror
                  </div>

                  <!-- Full Name -->
                  <div class="col-md-6">
                    <label for="cRealName" class="hotro-form-label">{{ __('Full Name') }} <span class="text-danger">(*)</span></label>
                    <input
                      type="text"
                      class="hotro-control {{ $errors->has('cRealName') ? 'is-invalid' : '' }}"
                      id="cRealName"
                      name="cRealName"
                      placeholder="{{ __('Enter your name') }}"
                      value="{{ old('cRealName') ?? '' }}"
                    />
                    @error('cRealName')
                      <div class="hotro-error-msg">
                        <i class="fa-solid fa-circle-exclamation"></i> {{ $message }}
                      </div>
                    @enderror
                  </div>

                  <!-- Password 1 -->
                  <div class="col-md-6">
                    <label class="hotro-form-label" for="cPassWord">Mật khẩu (Pass 1) <span class="text-danger">(*)</span></label>
                    <div class="hotro-input-wrap">
                      <input
                        type="password"
                        id="cPassWord"
                        class="hotro-control has-end-icon {{ $errors->has('cPassWord') ? 'is-invalid' : '' }}"
                        name="cPassWord"
                        placeholder="············"
                      />
                      <button type="button" class="hotro-pw-toggle" data-pw-toggle="cPassWord" tabindex="-1" aria-label="Ẩn/Hiện mật khẩu">
                        <i class="fa-regular fa-eye-slash"></i>
                      </button>
                    </div>
                    @error('cPassWord')
                      <div class="hotro-error-msg">
                        <i class="fa-solid fa-circle-exclamation"></i> {{ $message }}
                      </div>
                    @enderror
                  </div>

                  <!-- Confirm Password 1 -->
                  <div class="col-md-6">
                    <label class="hotro-form-label" for="cPassWord_confirmation">{{ __('Confirm Password') }} <span class="text-danger">(*)</span></label>
                    <div class="hotro-input-wrap">
                      <input
                        type="password"
                        id="cPassWord_confirmation"
                        class="hotro-control has-end-icon"
                        name="cPassWord_confirmation"
                        placeholder="············"
                      />
                      <button type="button" class="hotro-pw-toggle" data-pw-toggle="cPassWord_confirmation" tabindex="-1" aria-label="Ẩn/Hiện mật khẩu">
                        <i class="fa-regular fa-eye-slash"></i>
                      </button>
                    </div>
                  </div>

                  <!-- Password 2 -->
                  <div class="col-md-6">
                    <label class="hotro-form-label" for="cSecPassword">
                      <i class="fa-solid fa-shield-halved text-warning me-1"></i>
                      {{ __('Password 2') }} <span class="text-danger">(*)</span>
                    </label>
                    <div class="hotro-input-wrap">
                      <input
                        type="password"
                        id="cSecPassword"
                        class="hotro-control has-end-icon {{ $errors->has('cSecPassword') ? 'is-invalid' : '' }}"
                        name="cSecPassword"
                        placeholder="············"
                      />
                      <button type="button" class="hotro-pw-toggle" data-pw-toggle="cSecPassword" tabindex="-1" aria-label="Ẩn/Hiện mật khẩu cấp 2">
                        <i class="fa-regular fa-eye-slash"></i>
                      </button>
                    </div>
                    @error('cSecPassword')
                      <div class="hotro-error-msg">
                        <i class="fa-solid fa-circle-exclamation"></i> {{ $message }}
                      </div>
                    @enderror
                  </div>

                  <!-- Email -->
                  <div class="col-md-6">
                    <label for="cEMail" class="hotro-form-label">{{ __('Email') }} <span class="text-danger">(*)</span></label>
                    <input
                      type="email"
                      class="hotro-control {{ $errors->has('cEMail') ? 'is-invalid' : '' }}"
                      id="cEMail"
                      name="cEMail"
                      placeholder="{{ __('Enter your email') }}"
                      value="{{ old('cEMail') ?? '' }}"
                    />
                    @error('cEMail')
                      <div class="hotro-error-msg">
                        <i class="fa-solid fa-circle-exclamation"></i> {{ $message }}
                      </div>
                    @enderror
                  </div>
                </div>

                <button type="submit" class="btn-modern-primary w-100 py-2 mb-3">
                  <i class="fa-solid fa-user-plus"></i>
                  <span>Đăng Ký Tài Khoản</span>
                </button>

                <p class="text-center small text-muted mb-0">
                  Đã có tài khoản?
                  <a href="{{ route('login') }}" class="fw-bold" style="color: var(--accent-gold);">
                    Đăng nhập ngay
                  </a>
                </p>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="{{ asset('backend/assets/vendor/libs/jquery/jquery.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    (function () {
      const switchBtn = document.getElementById('authThemeSwitch');
      if (switchBtn) {
        switchBtn.addEventListener('click', function () {
          const isLight = document.body.classList.toggle('light-theme');
          localStorage.setItem('modern_theme', isLight ? 'light' : 'dark');
        });
      }

      document.querySelectorAll('[data-pw-toggle]').forEach(function (btn) {
        btn.addEventListener('click', function () {
          const input = document.getElementById(btn.getAttribute('data-pw-toggle'));
          const icon = btn.querySelector('i');
          if (!input) return;
          if (input.type === 'password') {
            input.type = 'text';
            if (icon) icon.className = 'fa-regular fa-eye';
          } else {
            input.type = 'password';
            if (icon) icon.className = 'fa-regular fa-eye-slash';
          }
        });
      });
    })();
  </script>
</body>
</html>
