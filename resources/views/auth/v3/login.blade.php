<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- Chặn Google thu thập thông tin -->
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

  <!-- Theme 3: Thủy Mặc Thanh Ngọc (Neo-Oriental Light Bento) -->
  <link rel="stylesheet" href="{{ asset('frontend/assets/css/jade-bento-v3.css') }}?v=3.2" />
</head>
<body class="jade-bento-theme">
  <div class="v3-auth-page">
    <!-- Top Action Bar -->
    <div class="v3-auth-topbar">
      <a href="{{ route('home') }}" class="btn-v3-soft py-2 px-3">
        <i class="fa-solid fa-arrow-left"></i>
        <span>Về Trang Chủ</span>
      </a>

      <a href="{{ getWebsiteConfig('download_link') ?? route('welcome') }}" target="_blank" rel="noopener noreferrer" class="btn-v3-soft py-2 px-3">
        <i class="fa-solid fa-download" style="color: var(--v3-vermilion);"></i>
        <span>Tải về</span>
      </a>
    </div>

    <!-- Main Split Bento Shell -->
    <div class="v3-auth-shell">
      <div class="row g-0">
        <!-- Left Thủy Mặc Thanh Ngọc Artwork -->
        <div class="col-lg-6 d-none d-lg-block">
          <div class="v3-auth-art" style="background-image: url('{{ asset('frontend/assets/images/v3/hero_swordsman.jpg') }}');">
            <div>
              <span class="v3-pill-badge mb-2">
                <i class="fa-solid fa-gem"></i>
                <span>Cổng Tài Khoản Chính Thức</span>
              </span>
              <h2 class="fw-bolder mb-2 text-white">Hành Trình Bá Nghiệp Võ Lâm</h2>
              <p class="small mb-3" style="color: rgba(255, 255, 255, 0.86);">
                Quản lý bảo mật mật khẩu cấp 2, tải bản cài đặt tốc độ cao và giải cứu nhân vật kẹt máy chủ chỉ với một chạm.
              </p>
              <div class="d-flex flex-wrap gap-2">
                <span class="badge rounded-pill px-3 py-2" style="background: rgba(255,255,255,0.18); backdrop-filter: blur(8px); color: #fff;">
                  <i class="fa-solid fa-shield-halved me-1"></i> Bảo mật 2 lớp
                </span>
                <span class="badge rounded-pill px-3 py-2" style="background: rgba(255,255,255,0.18); backdrop-filter: blur(8px); color: #fff;">
                  <i class="fa-solid fa-bolt me-1"></i> Giải kẹt tức thì
                </span>
              </div>
            </div>
          </div>
        </div>

        <!-- Right Login Form -->
        <div class="col-12 col-lg-6">
          <div class="v3-auth-form">
            <div class="text-center mb-4">
              <a href="{{ route('home') }}" class="d-inline-block mb-3">
                <img
                  src="{{ getWebsiteConfig('site_logo') ?? asset('backend/assets/img/illustrations/logo_volam.png') }}"
                  alt="Logo"
                  style="max-height: 70px; max-width: 195px; object-fit: contain;"
                />
              </a>
              <h3 class="fw-bolder mb-1">Đăng Nhập Tài Khoản</h3>
              <p class="small mb-0" style="color: var(--v3-muted);">
                Chào mừng đại hiệp đến với {{ getWebsiteConfig('site_title') ?? env('APP_NAME') }}
              </p>
            </div>

            @if (session('success'))
              <div class="v3-alert v3-alert-success">
                <i class="fa-solid fa-circle-check"></i>
                <span>{{ session('success') }}</span>
              </div>
            @endif

            @if (session('error'))
              <div class="v3-alert v3-alert-danger">
                <i class="fa-solid fa-triangle-exclamation"></i>
                <span>{{ session('error') }}</span>
              </div>
            @endif

            <form id="formAuthentication" action="{{ route('login') }}" method="POST" novalidate>
              @csrf

              <div class="mb-3">
                <label for="cAccName" class="v3-label">Tài khoản đăng nhập</label>
                <input
                  type="text"
                  class="v3-control {{ $errors->has('cAccName') ? 'is-invalid' : '' }}"
                  id="cAccName"
                  name="cAccName"
                  value="{{ old('cAccName') }}"
                  placeholder="Nhập tên tài khoản"
                  autofocus
                />
                @error('cAccName')
                  <div class="v3-error">
                    <i class="fa-solid fa-circle-exclamation"></i> {{ $message }}
                  </div>
                @enderror
              </div>

              <div class="mb-4">
                <label class="v3-label" for="password">Mật khẩu</label>
                <div class="v3-input-wrap">
                  <input
                    type="password"
                    id="password"
                    class="v3-control has-end-icon {{ $errors->has('password') ? 'is-invalid' : '' }}"
                    name="password"
                    placeholder="············"
                  />
                  <button type="button" class="v3-pw-toggle" data-pw-toggle="password" tabindex="-1" aria-label="Ẩn/Hiện mật khẩu">
                    <i class="fa-regular fa-eye-slash"></i>
                  </button>
                </div>
                @error('password')
                  <div class="v3-error">
                    <i class="fa-solid fa-circle-exclamation"></i> {{ $message }}
                  </div>
                @enderror
              </div>

              <button type="submit" class="btn-v3-jade w-100 py-3 mb-3">
                <i class="fa-solid fa-right-to-bracket"></i>
                <span>Đăng Nhập Ngay</span>
              </button>

              <p class="text-center small mb-0" style="color: var(--v3-muted);">
                Chưa có tài khoản?
                <a href="{{ route('register') }}" class="fw-bold" style="color: var(--v3-jade-dark);">
                  Tạo tài khoản mới
                </a>
              </p>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="{{ asset('backend/assets/vendor/libs/jquery/jquery.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    (function () {
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
