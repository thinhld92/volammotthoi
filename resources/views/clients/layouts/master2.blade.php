<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>{{ $title ?? getWebsiteConfig('site_title') ?? 'Võ Lâm Tiên Kiếm' }}</title>
  
  <!-- Chặn Google thu thập thông tin theo yêu cầu -->
  <meta name="robots" content="noindex, nofollow, noarchive, nosnippet" />
  <meta name="googlebot" content="noindex, nofollow, noarchive, nosnippet" />

  <meta name="description" content="{{ $description ?? getWebsiteConfig('site_title') }}">
  <link rel="icon" type="image/x-icon" href="{{ getWebsiteConfig('site_icon') ?? asset('clients/asset/images/icon.ico') }}">

  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- FontAwesome 6 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  
  <!-- Custom Modern Theme CSS -->
  <link rel="stylesheet" href="{{ asset('frontend/assets/css/modern-theme.css') }}">
  @yield('css')
</head>
<body class="modern-theme d-flex flex-column min-vh-100">

  <!-- Floating Glass Responsive Navbar -->
  <nav class="navbar navbar-expand-lg modern-navbar">
    <div class="container-fluid p-0">
      <a href="{{ route('home') }}" class="navbar-brand d-flex align-items-center text-decoration-none me-3">
        <img src="{{ getWebsiteConfig('site_logo') ?? asset('clients/asset/images/zingvn/skin/logo1.png') }}" alt="Logo" height="36">
      </a>

      <!-- Mobile Hamburger Toggle Button -->
      <button class="navbar-toggler text-warning border-0 p-1" type="button" data-bs-toggle="collapse" data-bs-target="#modernNavMenu" aria-controls="modernNavMenu" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fa-solid fa-bars fs-3 text-gold"></i>
      </button>

      <!-- Collapsible Navbar Body -->
      <div class="collapse navbar-collapse" id="modernNavMenu">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 gap-1">
          <li class="nav-item">
            <a href="{{ route('welcome') }}" class="nav-link">Trang Chủ</a>
          </li>
          <li class="nav-item">
            <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Bảng Tin</a>
          </li>
          
          @php
            $globalCategories = \App\Models\Category::all();
          @endphp
          @foreach($globalCategories as $cat)
            <li class="nav-item">
              <a href="{{ route('cat_posts', $cat->slug) }}" class="nav-link {{ (isset($category) && $category->id == $cat->id) ? 'active' : '' }}">
                {{ $cat->name }}
              </a>
            </li>
          @endforeach
        </ul>

        <!-- Action Buttons -->
        <div class="d-flex align-items-center gap-2 mobile-action-btns">
          <a href="{{ getWebsiteConfig('download_link') ?? '#download' }}" class="btn-modern-primary btn-sm px-3 py-2" target="_blank">
            <i class="fa-solid fa-download"></i> Tải Về
          </a>
          <a href="{{ route('register') }}" class="btn-modern-secondary btn-sm px-3 py-2">
            <i class="fa-solid fa-user-plus"></i> Đăng Ký
          </a>
          <a href="{{ route('login') }}" class="btn-modern-secondary btn-sm px-3 py-2">
            <i class="fa-solid fa-right-to-bracket"></i> Đăng Nhập
          </a>
        </div>
      </div>
    </div>
  </nav>

  <!-- Main Container with Fixed Padding Top to prevent Breadcrumb Overlap -->
  <main class="flex-grow-1 modern-main-content pb-5">
    <div class="container">
      
      <!-- Top Search & Quick Bar -->
      <div class="modern-glass-card p-3 mb-4 d-flex flex-wrap justify-content-between align-items-center gap-3">
        <div class="d-flex align-items-center gap-2 text-muted small">
          <a href="{{ route('home') }}" class="text-gold text-decoration-none">
            <i class="fa-solid fa-house me-1"></i> Trang chủ
          </a>
          <span>/</span>
          <span class="text-white fw-medium">{{ $title ?? 'Tin tức tổng hợp' }}</span>
        </div>

        <form action="{{ route('search') }}" method="GET" class="d-flex gap-2">
          <div class="input-group input-group-sm">
            <input type="text" name="search" class="form-control bg-dark text-white border-secondary" placeholder="Tìm kiếm bài viết..." value="{{ request('search') }}">
            <button class="btn btn-outline-warning" type="submit">
              <i class="fa-solid fa-magnifying-glass"></i>
            </button>
          </div>
        </form>
      </div>

      <!-- Main Content Block -->
      @yield('content')

    </div>
  </main>

  <!-- Footer -->
  <footer class="modern-footer text-center mt-auto">
    <div class="container">
      <p class="mb-1 text-white opacity-75">&copy; {{ date('Y') }} {{ getWebsiteConfig('site_title') ?? 'Võ Lâm Tiên Kiếm' }}. All rights reserved.</p>
      <small class="text-dim">Giao diện tin tức tối giản hiện đại 2026</small>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  @yield('script')
</body>
</html>
