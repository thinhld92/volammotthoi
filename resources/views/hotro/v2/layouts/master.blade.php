<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

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

  <!-- Wuxia Modern Theme & HoTro V2 Styles -->
  <link rel="stylesheet" href="{{ asset('frontend/assets/css/modern-theme.css') }}?v=2.2" />
  <link rel="stylesheet" href="{{ asset('frontend/assets/css/hotro-v2.css') }}?v=2.2" />
  @yield('link_css')
</head>
<body class="modern-theme">
  <script>
    (function () {
      if (localStorage.getItem('modern_theme') === 'light') {
        document.body.classList.add('light-theme');
      }
    })();
  </script>

  <div class="hotro-shell">
    @include('hotro.v2.layouts.partials.sidebar')
    <div class="hotro-sidebar-backdrop" id="hotroSidebarBackdrop"></div>

    <div class="hotro-main">
      @include('hotro.v2.layouts.partials.navbar')

      <main class="hotro-content">
        @if (session('success'))
          <div class="hotro-alert hotro-alert-success">
            <i class="fa-solid fa-circle-check fs-5"></i>
            <span>{{ session('success') }}</span>
          </div>
        @endif

        @if (session('error'))
          <div class="hotro-alert hotro-alert-danger">
            <i class="fa-solid fa-triangle-exclamation fs-5"></i>
            <span>{{ session('error') }}</span>
          </div>
        @endif

        @yield('content')
      </main>

      @include('hotro.v2.layouts.partials.footer')
    </div>
  </div>

  @if(getWebsiteConfig('fanpage_url'))
    <a href="{{ getWebsiteConfig('fanpage_url') }}" target="_blank" class="fixed-facebook-widget" title="Fanpage Facebook Cộng Đồng">
      <i class="fa-brands fa-facebook-f"></i>
      <span class="fixed-facebook-tooltip">Fanpage Hỗ Trợ</span>
    </a>
  @endif

  @include('hotro.v2.layouts.partials.script')
</body>
</html>
