<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- Chặn Google thu thập thông tin -->
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

  <!-- Theme 4: Huyết Nguyệt Ma Giáo (Crimson Bladepoint) -->
  <link rel="stylesheet" href="{{ asset('frontend/assets/css/crimson-bladepoint-v4.css') }}?v=4.1" />
</head>
<body class="crimson-bladepoint-theme">
  <div class="v4-auth-page" style="background-image: url('{{ asset('frontend/assets/images/v4/hotro_fortress.jpg') }}');">
    <div class="v4-auth-topbar" style="max-width: 1080px;">
      <a href="{{ route('home') }}" class="btn-v4-bronze py-2 px-3">
        <i class="fa-solid fa-arrow-left"></i>
        <span>Về Trang Chủ</span>
      </a>

      <a href="{{ getWebsiteConfig('download_link') ?? route('welcome') }}" target="_blank" rel="noopener noreferrer" class="btn-v4-crimson py-2 px-3">
        <i class="fa-solid fa-download"></i>
        <span>Tải về</span>
      </a>
    </div>

    <div class="v4-auth-shell v4-card" style="max-width: 1080px;">
      <div class="row g-0">
        <!-- Left Huyết Nguyệt Duel Artwork -->
        <div class="col-lg-5 d-none d-lg-block">
          <div class="v4-auth-art" style="background-image: url('{{ asset('frontend/assets/images/v4/banner_duel.jpg') }}');">
            <div>
              <span class="v4-badge-crimson mb-2">
                <i class="fa-solid fa-fire-flame-curved"></i>
                <span>Gia Nhập Giang Hồ</span>
              </span>
              <h2 class="fw-bolder mb-2 text-white">Khởi Tạo Đại Hiệp</h2>
              <p class="small mb-3" style="color: var(--v4-text-main);">
                Vui lòng ghi nhớ kỹ <strong>Mật khẩu cấp 2</strong> và <strong>Email</strong> để bảo vệ tài khoản và khôi phục thông tin khi cần thiết.
              </p>
              <div class="d-flex flex-wrap gap-2">
                <span class="v4-badge-bronze"><i class="fa-solid fa-check"></i> Miễn phí đăng ký</span>
                <span class="v4-badge-bronze"><i class="fa-solid fa-lock"></i> Mã hoá an toàn</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Right Registration Form -->
        <div class="col-12 col-lg-7">
          <div class="v4-auth-form">
            <div class="text-center mb-4">
              <a href="{{ route('home') }}" class="d-inline-block mb-2">
                <img
                  src="{{ getWebsiteConfig('site_logo') ?? asset('backend/assets/img/illustrations/logo_volam.png') }}"
                  alt="Logo"
                  style="max-height: 62px; max-width: 180px; object-fit: contain;"
                />
              </a>
              <h3 class="fw-bolder mb-1 text-white">Đăng Ký {{ getWebsiteConfig('site_title') ?? env('APP_NAME') }}</h3>
              <p class="small mb-0" style="color: var(--v4-text-muted);">
                Điền đầy đủ các thông tin bên dưới để tạo tài khoản vào game
              </p>
            </div>

            <form id="formAuthentication" action="{{ route('register') }}" method="POST" novalidate>
              @csrf

              <div class="row g-3 mb-4">
                <div class="col-md-6">
                  <label for="cAccName" class="v4-label">Tài khoản <span class="text-danger">(*)</span></label>
                  <input
                    type="text"
                    class="v4-control {{ $errors->has('cAccName') ? 'is-invalid' : '' }}"
                    id="cAccName"
                    name="cAccName"
                    placeholder="{{ __('Enter your username') }}"
                    value="{{ old('cAccName') ?? '' }}"
                    autofocus
                  />
                  @error('cAccName')
                    <div class="v4-error">
                      <i class="fa-solid fa-circle-exclamation"></i> {{ $message }}
                    </div>
                  @enderror
                </div>

                <div class="col-md-6">
                  <label for="cRealName" class="v4-label">{{ __('Full Name') }} <span class="text-danger">(*)</span></label>
                  <input
                    type="text"
                    class="v4-control {{ $errors->has('cRealName') ? 'is-invalid' : '' }}"
                    id="cRealName"
                    name="cRealName"
                    placeholder="{{ __('Enter your name') }}"
                    value="{{ old('cRealName') ?? '' }}"
                  />
                  @error('cRealName')
                    <div class="v4-error">
                      <i class="fa-solid fa-circle-exclamation"></i> {{ $message }}
                    </div>
                  @enderror
                </div>

                <div class="col-md-6">
                  <label class="v4-label" for="cPassWord">Mật khẩu (Pass 1) <span class="text-danger">(*)</span></label>
                  <div class="v4-input-wrap">
                    <input
                      type="password"
                      id="cPassWord"
                      class="v4-control has-end-icon {{ $errors->has('cPassWord') ? 'is-invalid' : '' }}"
                      name="cPassWord"
                      placeholder="············"
                    />
                    <button type="button" class="v4-pw-toggle" data-pw-toggle="cPassWord" tabindex="-1" aria-label="Ẩn/Hiện mật khẩu">
                      <i class="fa-regular fa-eye-slash"></i>
                    </button>
                  </div>
                  @error('cPassWord')
                    <div class="v4-error">
                      <i class="fa-solid fa-circle-exclamation"></i> {{ $message }}
                    </div>
                  @enderror
                </div>

                <div class="col-md-6">
                  <label class="v4-label" for="cPassWord_confirmation">{{ __('Confirm Password') }} <span class="text-danger">(*)</span></label>
                  <div class="v4-input-wrap">
                    <input
                      type="password"
                      id="cPassWord_confirmation"
                      class="v4-control has-end-icon"
                      name="cPassWord_confirmation"
                      placeholder="············"
                    />
                    <button type="button" class="v4-pw-toggle" data-pw-toggle="cPassWord_confirmation" tabindex="-1" aria-label="Ẩn/Hiện mật khẩu">
                      <i class="fa-regular fa-eye-slash"></i>
                    </button>
                  </div>
                </div>

                <div class="col-md-6">
                  <label class="v4-label" for="cSecPassword">
                    <i class="fa-solid fa-shield-halved me-1" style="color: var(--v4-crimson-bright);"></i>
                    {{ __('Password 2') }} <span class="text-danger">(*)</span>
                  </label>
                  <div class="v4-input-wrap">
                    <input
                      type="password"
                      id="cSecPassword"
                      class="v4-control has-end-icon {{ $errors->has('cSecPassword') ? 'is-invalid' : '' }}"
                      name="cSecPassword"
                      placeholder="············"
                    />
                    <button type="button" class="v4-pw-toggle" data-pw-toggle="cSecPassword" tabindex="-1" aria-label="Ẩn/Hiện mật khẩu cấp 2">
                      <i class="fa-regular fa-eye-slash"></i>
                    </button>
                  </div>
                  @error('cSecPassword')
                    <div class="v4-error">
                      <i class="fa-solid fa-circle-exclamation"></i> {{ $message }}
                    </div>
                  @enderror
                </div>

                <div class="col-md-6">
                  <label for="cEMail" class="v4-label">{{ __('Email') }} <span class="text-danger">(*)</span></label>
                  <input
                    type="email"
                    class="v4-control {{ $errors->has('cEMail') ? 'is-invalid' : '' }}"
                    id="cEMail"
                    name="cEMail"
                    placeholder="{{ __('Enter your email') }}"
                    value="{{ old('cEMail') ?? '' }}"
                  />
                  @error('cEMail')
                    <div class="v4-error">
                      <i class="fa-solid fa-circle-exclamation"></i> {{ $message }}
                    </div>
                  @enderror
                </div>
              </div>

              <button type="submit" class="btn-v4-crimson w-100 py-3 mb-3">
                <i class="fa-solid fa-user-plus"></i>
                <span>Đăng Ký Tài Khoản</span>
              </button>

              <p class="text-center small mb-0" style="color: var(--v4-text-muted);">
                Đã có tài khoản?
                <a href="{{ route('login') }}" class="fw-bold" style="color: var(--v4-bronze-light);">
                  Đăng nhập ngay
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
