<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- Chặn Google thu thập thông tin -->
  <meta name="robots" content="noindex, nofollow, noarchive, nosnippet" />
  <meta name="googlebot" content="noindex, nofollow, noarchive, nosnippet" />

  <title>@yield('page_title', 'Quản Lý Tài Khoản') - {{ getWebsiteConfig('site_title') ?? config('app.name', 'Võ Lâm Tiên Kiếm') }}</title>
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
  @yield('link_css')
</head>
<body class="crimson-bladepoint-theme">
  <div class="v4-hotro-shell">
    @include('hotro.v4.layouts.partials.sidebar')
    <div class="v4-hotro-backdrop" id="v4Backdrop"></div>

    <div class="v4-hotro-main">
      @include('hotro.v4.layouts.partials.navbar')

      <main class="v4-hotro-content">
        @if (session('success'))
          <div class="v4-alert v4-alert-success">
            <i class="fa-solid fa-circle-check fs-5"></i>
            <span>{{ session('success') }}</span>
          </div>
        @endif

        @if (session('error'))
          <div class="v4-alert v4-alert-danger">
            <i class="fa-solid fa-triangle-exclamation fs-5"></i>
            <span>{{ session('error') }}</span>
          </div>
        @endif

        @yield('content')
      </main>

      @include('hotro.v4.layouts.partials.footer')
    </div>
  </div>

  @if(getWebsiteConfig('fanpage_url'))
    <a href="{{ getWebsiteConfig('fanpage_url') }}" target="_blank" rel="noopener noreferrer" class="v4-fb-float" title="Fanpage Facebook Cộng Đồng">
      <i class="fa-brands fa-facebook-f"></i>
    </a>
  @endif

  @include('hotro.v4.layouts.partials.script')
</body>
</html>
