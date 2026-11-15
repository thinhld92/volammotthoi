<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>{{ $title ?? getWebsiteConfig('site_title') ?? 'Võ Lâm Tiên Kiếm' }}</title>

  <!-- Chặn Google thu thập thông tin -->
  <meta name="robots" content="noindex, nofollow, noarchive, nosnippet" />
  <meta name="googlebot" content="noindex, nofollow, noarchive, nosnippet" />

  <meta name="description" content="{{ $description ?? getWebsiteConfig('site_title') }}" />
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
  @yield('css')
</head>
<body class="jade-bento-theme d-flex flex-column min-vh-100">
  <div id="fb-root"></div>
  <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v18.0"></script>

  @php
    $globalCategories = \App\Models\Category::all();
  @endphp

  <!-- Floating Frosted Pearl Pill Navbar -->
  <div class="v3-navbar-wrap">
    <nav class="navbar navbar-expand-lg v3-navbar">
      <div class="container-fluid p-0">
        <a href="{{ route('home') }}" class="navbar-brand d-flex align-items-center me-3">
          <img src="{{ getWebsiteConfig('site_logo') ?? asset('clients/asset/images/zingvn/skin/logo1.png') }}" alt="Logo" />
        </a>

        <button class="navbar-toggler border-0 p-1 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#v3ClientsNav" aria-controls="v3ClientsNav" aria-expanded="false" aria-label="Mở menu">
          <i class="fa-solid fa-bars fs-4" style="color: var(--v3-jade-dark);"></i>
        </button>

        <div class="collapse navbar-collapse" id="v3ClientsNav">
          <ul class="navbar-nav mx-auto mb-2 mb-lg-0 gap-1">
            <li class="nav-item">
              <a href="{{ route('welcome') }}" class="nav-link v3-nav-link">Trang Chủ</a>
            </li>
            <li class="nav-item">
              <a href="{{ route('home') }}" class="nav-link v3-nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Bảng Tin</a>
            </li>
            @foreach($globalCategories as $cat)
              <li class="nav-item">
                <a href="{{ route('cat_posts', $cat->slug) }}" class="nav-link v3-nav-link {{ (isset($category) && $category->id == $cat->id) ? 'active' : '' }}">
                  {{ $cat->name }}
                </a>
              </li>
            @endforeach
            <li class="nav-item">
              <a href="{{ getWebsiteConfig('fanpage_url') ?? '#' }}" target="_blank" rel="noopener noreferrer" class="nav-link v3-nav-link">Cộng Đồng</a>
            </li>
          </ul>

          <div class="d-flex flex-wrap align-items-center gap-2 mt-2 mt-lg-0">
            <a href="{{ getWebsiteConfig('download_link') ?? route('hotro.dashboard') }}" target="_blank" rel="noopener noreferrer" class="btn-v3-soft py-2 px-3">
              <i class="fa-solid fa-download" style="color: var(--v3-vermilion);"></i>
              <span>Tải về</span>
            </a>
            <a href="{{ auth()->check() ? route('hotro.dashboard') : route('login') }}" class="btn-v3-jade py-2 px-3">
              <i class="fa-solid fa-circle-user"></i>
              <span>{{ auth()->check() ? auth()->user()->cAccName : 'Tài Khoản' }}</span>
            </a>
          </div>
        </div>
      </div>
    </nav>
  </div>

  <!-- Main Content -->
  <main class="flex-grow-1 pb-5">
    <div class="v3-container">
      @yield('content')
    </div>
  </main>

  <!-- Footer -->
  <footer class="v3-footer text-center mt-auto">
    <div class="v3-container">
      <p class="mb-1 fw-semibold" style="color: var(--v3-ink);">
        &copy; {{ date('Y') }} {{ getWebsiteConfig('site_title') ?? 'Võ Lâm Tiên Kiếm' }}. All rights reserved.
      </p>
      <p class="small mb-1">• Bản quyền thuộc về KingSoft. Độc quyền phát hành tại Việt Nam bởi VNG.</p>
      <p class="small v3-disclaimer mb-0">• Lưu ý : Chúng tôi không phải nhà phát hành chính thức - cân nhắc trước khi tham gia Game.</p>
    </div>
  </footer>

  @if(getWebsiteConfig('fanpage_url'))
    <a href="{{ getWebsiteConfig('fanpage_url') }}" target="_blank" rel="noopener noreferrer" class="v3-fb-float" title="Fanpage Facebook Cộng Đồng">
      <i class="fa-brands fa-facebook-f"></i>
    </a>
  @endif

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  @yield('script')
</body>
</html>
