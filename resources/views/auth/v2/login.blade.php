<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <meta name="robots" content="noindex, nofollow, noarchive, nosnippet" />
  <meta name="googlebot" content="noindex, nofollow, noarchive, nosnippet" />

  <title>Đăng nhập - {{ getWebsiteConfig('site_title') ?? config('app.name', 'Võ Lâm Tiên Kiếm') }}</title>
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

    <!-- Main Auth Card -->
    <div class="auth-v2-container">
      <div class="auth-v2-shell">
        <div class="row g-0">
          <!-- Left Wuxia Artwork Showcase -->
          <div class="col-lg-6 d-none d-lg-block">
            <div class="auth-v2-showcase h-100" style="background-image: url('{{ asset('frontend/assets/images/wuxia_showcase.png') }}');">
              <div class="auth-v2-showcase-content">
                <span class="badge-modern badge-modern-gold mb-2">
                  <i class="fa-solid fa-crown me-1"></i> Cổng Tài Khoản Chính Thức
                </span>
                <h2 class="fw-bold mb-2" style="color: #F8FAFC !important;">Hành Trình Bá Nghiệp Võ Lâm</h2>
                <p class="small mb-3" style="color: #CBD5E1 !important;">
                  Quản lý thông tin bảo mật cấp 2, tải bản cài đặt mới nhất và giải cứu nhân vật kẹt máy chủ chỉ trong một chạm.
                </p>
                <div class="d-flex flex-wrap gap-2">
                  <span class="hotro-safe-pill"><i class="fa-solid fa-shield-halved"></i> Bảo mật 2 lớp</span>
                  <span class="hotro-safe-pill"><i class="fa-solid fa-bolt"></i> Hỗ trợ tức thì</span>
                </div>
              </div>
            </div>
          </div>

          <!-- Right Login Form -->
          <div class="col-12 col-lg-6">
            <div class="auth-v2-form-panel">
              <div class="text-center mb-4">
                <a href="{{ route('home') }}" class="d-inline-block mb-3">
                  <img
                    src="{{ getWebsiteConfig('site_logo') ?? asset('backend/assets/img/illustrations/logo_volam.png') }}"
                    alt="Logo"
                    style="max-height: 76px; max-width: 200px; object-fit: contain;"
                  />
                </a>
                <h3 class="fw-bold mb-1">Đăng Nhập Tài Khoản</h3>
                <p class="text-muted small mb-0">
                  Chào mừng đại hiệp đến với {{ getWebsiteConfig('site_title') ?? env('APP_NAME') }}
                </p>
              </div>

              @if (session('success'))
                <div class="hotro-alert hotro-alert-success">
                  <i class="fa-solid fa-circle-check"></i>
                  <span>{{ session('success') }}</span>
                </div>
              @endif

              @if (session('error'))
                <div class="hotro-alert hotro-alert-danger">
                  <i class="fa-solid fa-triangle-exclamation"></i>
                  <span>{{ session('error') }}</span>
                </div>
              @endif

              <form id="formAuthentication" action="{{ route('login') }}" method="POST" novalidate>
                @csrf

                <div class="mb-3">
                  <label for="cAccName" class="hotro-form-label">Tài khoản đăng nhập</label>
                  <input
                    type="text"
                    class="hotro-control {{ $errors->has('cAccName') ? 'is-invalid' : '' }}"
                    id="cAccName"
                    name="cAccName"
                    value="{{ old('cAccName') }}"
                    placeholder="Nhập tên tài khoản"
                    autofocus
                  />
                  @error('cAccName')
                    <div class="hotro-error-msg">
                      <i class="fa-solid fa-circle-exclamation"></i> {{ $message }}
                    </div>
                  @enderror
                </div>

                <div class="mb-4">
                  <label class="hotro-form-label" for="password">Mật khẩu</label>
                  <div class="hotro-input-wrap">
                    <input
                      type="password"
                      id="password"
                      class="hotro-control has-end-icon {{ $errors->has('password') ? 'is-invalid' : '' }}"
                      name="password"
                      placeholder="············"
                    />
                    <button type="button" class="hotro-pw-toggle" data-pw-toggle="password" tabindex="-1" aria-label="Ẩn/Hiện mật khẩu">
                      <i class="fa-regular fa-eye-slash"></i>
                    </button>
                  </div>
                  @error('password')
                    <div class="hotro-error-msg">
                      <i class="fa-solid fa-circle-exclamation"></i> {{ $message }}
                    </div>
                  @enderror
                </div>

                <button type="submit" class="btn-modern-primary w-100 py-2 mb-3">
                  <i class="fa-solid fa-right-to-bracket"></i>
                  <span>Đăng Nhập Ngay</span>
                </button>

                <p class="text-center small text-muted mb-0">
                  Chưa có tài khoản?
                  <a href="{{ route('register') }}" class="fw-bold" style="color: var(--accent-gold);">
                    Tạo tài khoản mới
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
