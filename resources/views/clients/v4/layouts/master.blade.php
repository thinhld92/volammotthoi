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

  <!-- Theme 4: Huyết Nguyệt Ma Giáo (Crimson Bladepoint) -->
  <link rel="stylesheet" href="{{ asset('frontend/assets/css/crimson-bladepoint-v4.css') }}?v=4.1" />
  @yield('css')
</head>
<body class="crimson-bladepoint-theme d-flex flex-column min-vh-100">
  <div id="fb-root"></div>
  <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v18.0"></script>

  @php
    $globalCategories = \App\Models\Category::all();
  @endphp

  <!-- Top Metallic Horizontal Navigation Bar -->
  <header class="v4-header">
    <div class="v4-container">
      <nav class="navbar navbar-expand-lg">
        <a href="{{ route('home') }}" class="navbar-brand d-flex align-items-center me-4">
          <img src="{{ getWebsiteConfig('site_logo') ?? asset('clients/asset/images/zingvn/skin/logo1.png') }}" alt="Logo" />
        </a>

        <button class="navbar-toggler border-0 p-1 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#v4ClientsNav" aria-controls="v4ClientsNav" aria-expanded="false" aria-label="Mở menu">
          <i class="fa-solid fa-bars fs-3" style="color: var(--v4-bronze-light);"></i>
        </button>

        <div class="collapse navbar-collapse" id="v4ClientsNav">
          <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a href="{{ route('welcome') }}" class="nav-link v4-nav-link">Trang Chủ</a>
            </li>
            <li class="nav-item">
              <a href="{{ route('home') }}" class="nav-link v4-nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Bảng Tin</a>
            </li>
            @foreach($globalCategories as $cat)
              <li class="nav-item">
                <a href="{{ route('cat_posts', $cat->slug) }}" class="nav-link v4-nav-link {{ (isset($category) && $category->id == $cat->id) ? 'active' : '' }}">
                  {{ $cat->name }}
                </a>
              </li>
            @endforeach
            <li class="nav-item">
              <a href="{{ getWebsiteConfig('fanpage_url') ?? '#' }}" target="_blank" rel="noopener noreferrer" class="nav-link v4-nav-link">Cộng Đồng</a>
            </li>
          </ul>

          <div class="d-flex align-items-center gap-2 pb-3 pb-lg-0">
            <a href="{{ auth()->check() ? route('hotro.dashboard') : route('login') }}" class="btn-v4-bronze">
              <i class="fa-regular fa-user"></i>
              <span>{{ auth()->check() ? auth()->user()->cAccName : 'Tài Khoản' }}</span>
            </a>
          </div>
        </div>
      </nav>
    </div>
  </header>

  <main class="flex-grow-1 pb-5">
    @yield('hero')

    <div class="v4-container {{ View::hasSection('hero') ? '' : 'pt-4' }}">
      @yield('content')
    </div>
  </main>

  <footer class="v4-footer text-center mt-auto">
    <div class="v4-container">
      <p class="mb-1 fw-semibold text-white">
        &copy; {{ date('Y') }} {{ getWebsiteConfig('site_title') ?? 'Võ Lâm Tiên Kiếm' }}. All rights reserved.
      </p>
      <p class="small mb-1">• Bản quyền thuộc về KingSoft. Độc quyền phát hành tại Việt Nam bởi VNG.</p>
      <p class="small v4-disclaimer mb-0">• Lưu ý : Chúng tôi không phải nhà phát hành chính thức - cân nhắc trước khi tham gia Game.</p>
    </div>
  </footer>

  @if(getWebsiteConfig('fanpage_url'))
    <a href="{{ getWebsiteConfig('fanpage_url') }}" target="_blank" rel="noopener noreferrer" class="v4-fb-float" title="Fanpage Facebook Cộng Đồng">
      <i class="fa-brands fa-facebook-f"></i>
    </a>
  @endif

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  @yield('script')
</body>
</html>
