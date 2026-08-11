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

      <div class="d-flex align-items-center gap-2 d-lg-none ms-auto me-2">
        <!-- Theme Toggle Button Mobile -->
        <button id="themeToggleBtnMobile" class="btn-theme-toggle" type="button" title="Đổi giao diện sáng/tối">
          <i class="fa-solid fa-moon"></i>
        </button>
      </div>

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

        <!-- Action Buttons & Theme Switcher -->
        <div class="d-flex align-items-center gap-2 mobile-action-btns">
          <!-- Theme Toggle Button Desktop -->
          <button id="themeToggleBtnDesktop" class="btn-theme-toggle d-none d-lg-inline-flex" type="button" title="Đổi giao diện sáng/tối">
            <i class="fa-solid fa-moon"></i>
          </button>

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
          <span class="fw-medium">{{ $title ?? 'Tin tức tổng hợp' }}</span>
        </div>

        <form action="{{ route('search') }}" method="GET" class="d-flex gap-2">
          <div class="input-group input-group-sm">
            <input type="text" name="search" class="form-control bg-transparent border-secondary" placeholder="Tìm kiếm bài viết..." value="{{ request('search') }}">
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
      <p class="small text-muted mb-1">Bản quyền thuộc về KingSoft. Độc quyền phát hành tại Việt Nam bởi VNG</p>
      <p class="small footer-disclaimer mb-0">Lưu ý : Chúng tôi không phải nhà phát hành chính thức - cân nhắc trước khi tham gia Game.</p>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  
  <!-- Light/Dark Mode Persistence Script -->
  <script>
    (function() {
      const savedTheme = localStorage.getItem('modern_theme') || 'dark';
      if (savedTheme === 'light') {
        document.body.classList.add('light-theme');
      }

      function updateIcons(isLight) {
        const icons = document.querySelectorAll('#themeToggleBtnDesktop i, #themeToggleBtnMobile i');
        icons.forEach(icon => {
          if (isLight) {
            icon.className = 'fa-solid fa-sun';
          } else {
            icon.className = 'fa-solid fa-moon';
          }
        });
      }

      updateIcons(savedTheme === 'light');

      function toggleTheme() {
        const isLight = document.body.classList.toggle('light-theme');
        const newTheme = isLight ? 'light' : 'dark';
        localStorage.setItem('modern_theme', newTheme);
        updateIcons(isLight);
      }

      const btnDesktop = document.getElementById('themeToggleBtnDesktop');
      const btnMobile = document.getElementById('themeToggleBtnMobile');

      if (btnDesktop) btnDesktop.addEventListener('click', toggleTheme);
      if (btnMobile) btnMobile.addEventListener('click', toggleTheme);
    })();
  </script>
  @yield('script')
</body>
</html>
