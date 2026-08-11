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

  <!-- Floating Glass Navbar -->
  <nav class="modern-navbar d-flex justify-content-between align-items-center">
    <a href="{{ route('home') }}" class="d-flex align-items-center text-decoration-none">
      <img src="{{ getWebsiteConfig('site_logo') ?? asset('clients/asset/images/zingvn/skin/logo1.png') }}" alt="Logo" height="38">
    </a>

    <div class="d-none d-lg-flex align-items-center gap-2">
      <a href="{{ route('welcome') }}" class="nav-link">Trang Chủ</a>
      <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Tin Tức</a>
      
      @php
        $globalCategories = \App\Models\Category::all();
      @endphp
      @foreach($globalCategories as $cat)
        <a href="{{ route('cat_posts', $cat->slug) }}" class="nav-link {{ (isset($category) && $category->id == $cat->id) ? 'active' : '' }}">
          {{ $cat->name }}
        </a>
      @endforeach
    </div>

    <div class="d-flex align-items-center gap-2">
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
  </nav>

  <!-- Main Container -->
  <main class="flex-grow-1 pt-5 mt-4 pb-5">
    <div class="container mt-4">
      
      <!-- Top Search & Quick Bar -->
      <div class="modern-glass-card p-3 mb-4 d-flex flex-wrap justify-content-between align-items-center gap-3">
        <div class="d-flex align-items-center gap-2 text-muted small">
          <i class="fa-solid fa-house text-gold"></i>
          <span>/</span>
          <span class="text-white">{{ $title ?? 'Trang Tin Tức' }}</span>
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
