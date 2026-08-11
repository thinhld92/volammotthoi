<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>{{ getWebsiteConfig('site_title') ?? config('app.name', 'Võ Lâm Tiên Kiếm') }}</title>
  
  <!-- Chặn Google thu thập thông tin theo yêu cầu -->
  <meta name="robots" content="noindex, nofollow, noarchive, nosnippet" />
  <meta name="googlebot" content="noindex, nofollow, noarchive, nosnippet" />

  <link rel="icon" type="image/x-icon" href="{{ getWebsiteConfig('site_icon') ?? asset('clients/asset/images/icon.ico') }}">

  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- FontAwesome 6 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  
  <!-- Custom Modern Theme CSS -->
  <link rel="stylesheet" href="{{ asset('frontend/assets/css/modern-theme.css') }}">
</head>
<body class="modern-theme">

  <!-- Floating Glass Responsive Navbar (Matching Mockup 1) -->
  <nav class="navbar navbar-expand-lg modern-navbar">
    <div class="container-fluid p-0">
      <a href="{{ route('welcome') }}" class="navbar-brand d-flex align-items-center text-decoration-none me-3">
        <img src="{{ getWebsiteConfig('site_logo') ?? asset('clients/asset/images/zingvn/skin/logo1.png') }}" alt="Logo" height="40">
      </a>

      <div class="d-flex align-items-center gap-2 d-lg-none ms-auto me-2">
        <!-- Theme Toggle Button Mobile -->
        <button id="themeToggleBtnMobile" class="btn-theme-toggle" type="button" title="Đổi giao diện sáng/tối">
          <i class="fa-solid fa-moon"></i>
        </button>
      </div>

      <!-- Mobile Hamburger Toggle Button -->
      <button class="navbar-toggler text-warning border-0 p-1" type="button" data-bs-toggle="collapse" data-bs-target="#modernWelcomeMenu" aria-controls="modernWelcomeMenu" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fa-solid fa-bars fs-3 text-gold"></i>
      </button>

      <!-- Collapsible Menu -->
      <div class="collapse navbar-collapse" id="modernWelcomeMenu">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 gap-1">
          <li class="nav-item">
            <a href="{{ route('welcome') }}" class="nav-link active">Trang Chủ</a>
          </li>
          <li class="nav-item">
            <a href="{{ route('home') }}" class="nav-link">Bảng Tin</a>
          </li>
          <li class="nav-item">
            <a href="#features" class="nav-link">Tính Năng</a>
          </li>
          <li class="nav-item">
            <a href="#showcase" class="nav-link">Hình Ảnh</a>
          </li>
          <li class="nav-item">
            <a href="#community" class="nav-link">Cộng Đồng</a>
          </li>
        </ul>

        <!-- Action Buttons -->
        <div class="d-flex align-items-center gap-2 mobile-action-btns">
          <!-- Theme Toggle Button Desktop -->
          <button id="themeToggleBtnDesktop" class="btn-theme-toggle d-none d-lg-inline-flex" type="button" title="Đổi giao diện sáng/tối">
            <i class="fa-solid fa-moon"></i>
          </button>

          <a href="{{ getWebsiteConfig('download_link') ?? '#download' }}" class="btn-modern-primary py-2 px-3 fs-6" target="_blank">
            <i class="fa-solid fa-download"></i> Tải Về
          </a>
          <a href="{{ route('login') }}" class="btn-modern-secondary py-2 px-3 fs-6">
            Đăng Nhập
          </a>
          <a href="{{ route('register') }}" class="btn-modern-secondary py-2 px-3 fs-6">
            Đăng Ký
          </a>
        </div>
      </div>
    </div>
  </nav>

  <!-- Hero Section with Banner Carousel (Reverted to 5:7 Balanced Proportion) -->
  <section class="min-vh-50 d-flex align-items-center position-relative pt-5 pb-3">
    <div class="container position-relative z-2 pt-5 mt-2">
      
      <div class="hero-wuxia-box mb-4">
        <div class="row align-items-center gy-4">
          
          <!-- Text & CTA Column (5 parts of 12 grid - Perfectly Balanced) -->
          <div class="col-lg-5">
            <span class="badge-modern badge-modern-gold mb-3 d-inline-block">
              <i class="fa-solid fa-crown me-1"></i> PHIÊN BẢN CÔNG THÀNH CHIẾN 2005
            </span>

            <h1 class="display-4 fw-bold mb-3 text-white">
              Hành Trình Bá Nghiệp Võ Lâm
            </h1>

            <p class="text-muted fs-6 mb-4">
              Khám phá thế giới kiếm hiệp đỉnh cao, hoài niệm ký ức Công Thành Chiến 2005. Chuẩn đồ xanh, cân bằng cày cuốc & giao dịch tự do.
            </p>

            <!-- Countdown Timer & Action Box (Equal 54px Height Alignment) -->
            <div class="d-flex flex-wrap align-items-center gap-3">
              @if(isset($opening_time) && isset($opening_time['show']) && $opening_time['show'] == 1)
                <div class="countdown-wuxia-box">
                  <div class="countdown-item">
                    <div class="countdown-val">{{ sprintf('%02d', $opening_time['day']) }}</div>
                    <div class="countdown-label">Ngày</div>
                  </div>
                  <div class="countdown-item">
                    <div class="countdown-val">{{ sprintf('%02d', $opening_time['month']) }}</div>
                    <div class="countdown-label">Tháng</div>
                  </div>
                  <div class="countdown-item">
                    <div class="countdown-val">{{ sprintf('%02d', $opening_time['hour']) }}h</div>
                    <div class="countdown-label">Khai Mở</div>
                  </div>
                </div>
              @endif

              <a href="{{ getWebsiteConfig('download_link') ?? '#download' }}" class="btn-modern-primary btn-hero-cta" target="_blank">
                <i class="fa-solid fa-download me-1"></i> Tải Về Ngay
              </a>
            </div>
          </div>

          <!-- Hero Right Column: Banner Carousel Slider (7 parts of 12 grid) -->
          <div class="col-lg-7 text-center position-relative">
            <div class="modern-hero-carousel-box rounded-4 overflow-hidden shadow-lg">
              @if(isset($welcomeBanners) && $welcomeBanners->count())
                <div id="heroBannerCarousel" class="carousel slide" data-bs-ride="carousel">
                  <div class="carousel-inner">
                    @foreach($welcomeBanners as $banner)
                      <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                        <a href="{{ $banner->link ?? '#' }}" target="_blank">
                          <img src="{{ $banner->image }}" class="d-block w-100 hero-banner-img" alt="{{ $banner->title }}">
                        </a>
                      </div>
                    @endforeach
                  </div>
                  @if($welcomeBanners->count() > 1)
                    <button class="carousel-control-prev" type="button" data-bs-target="#heroBannerCarousel" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#heroBannerCarousel" data-bs-slide="next">
                      <span class="carousel-control-next-icon"></span>
                    </button>
                  @endif
                </div>
              @else
                <img src="{{ asset('backend/assets/img/front-pages/landing-page/TopTK.jpg') }}" alt="Banner" class="img-fluid w-100 hero-banner-img">
              @endif
            </div>
          </div>

        </div>
      </div>

    </div>
  </section>

  <!-- Features Grid Section (Matching Mockup 1 Cards Layout) -->
  <section id="features" class="py-4">
    <div class="container py-2">
      <div class="text-center mb-4">
        <span class="badge-modern badge-modern-gold mb-3 d-inline-block">Trải Nghiệm Huyền Thoại</span>
        <h2 class="display-5 fw-bold text-white mt-1 mb-2">Tính Năng Nổi Bật</h2>
        <p class="text-muted">Hệ thống tối ưu trải nghiệm, cân bằng và công bằng tuyệt đối</p>
      </div>

      <!-- 6 Feature Cards Grid (Matching Mockup 1 3x2 Grid) -->
      <div class="row g-4">
        
        <!-- Card 1 -->
        <div class="col-md-6 col-lg-4">
          <div class="wuxia-feature-card h-100">
            <div class="wuxia-icon-box">
              <i class="fa-solid fa-trophy"></i>
            </div>
            <div>
              <h5 class="text-white mb-1">Công Thành Chiến</h5>
              <p class="text-muted small mb-0">Tống Kim máu lửa, Thất Thành chiến nảy lửa rực cháy hào khí.</p>
            </div>
          </div>
        </div>

        <!-- Card 2 -->
        <div class="col-md-6 col-lg-4">
          <div class="wuxia-feature-card h-100">
            <div class="wuxia-icon-box">
              <i class="fa-solid fa-earth-americas"></i>
            </div>
            <div>
              <h5 class="text-white mb-1">Thế Giới Rộng Lớn</h5>
              <p class="text-muted small mb-0">Bản đồ chuẩn nguyên bản, khám phá các vùng đất kiếm hiệp kỳ bí.</p>
            </div>
          </div>
        </div>

        <!-- Card 3 -->
        <div class="col-md-6 col-lg-4">
          <div class="wuxia-feature-card h-100">
            <div class="wuxia-icon-box">
              <i class="fa-solid fa-users"></i>
            </div>
            <div>
              <h5 class="text-white mb-1">Thập Đại Môn Phái</h5>
              <p class="text-muted small mb-0">Đầy đủ 10 môn phái Ngũ Hành tương sinh tương khắc chuẩn xác.</p>
            </div>
          </div>
        </div>

        <!-- Card 4 -->
        <div class="col-md-6 col-lg-4">
          <div class="wuxia-feature-card h-100">
            <div class="wuxia-icon-box">
              <i class="fa-solid fa-crown"></i>
            </div>
            <div>
              <h5 class="text-white mb-1">Boss Hoàng Kim</h5>
              <p class="text-muted small mb-0">Săn Boss Dã Tẩu, Hoàng Kim rơi đồ xanh & trang bị có giá trị cao.</p>
            </div>
          </div>
        </div>

        <!-- Card 5 -->
        <div class="col-md-6 col-lg-4">
          <div class="wuxia-feature-card h-100">
            <div class="wuxia-icon-box">
              <i class="fa-solid fa-scroll"></i>
            </div>
            <div>
              <h5 class="text-white mb-1">Kỹ Năng Nguyên Bản</h5>
              <p class="text-muted small mb-0">Kỹ năng 90 - 120 hoàn thiện, cân bằng hiệu ứng combat tuyệt vời.</p>
            </div>
          </div>
        </div>

        <!-- Card 6 -->
        <div class="col-md-6 col-lg-4">
          <div class="wuxia-feature-card h-100">
            <div class="wuxia-icon-box">
              <i class="fa-solid fa-headset"></i>
            </div>
            <div>
              <h5 class="text-white mb-1">Cộng Đồng Đông Đảo</h5>
              <p class="text-muted small mb-0">Đội ngũ kỹ thuật hỗ trợ 24/7 nhiệt tình, giải quyết sự cố tức thì.</p>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- Cool Wuxia Image Showcase Gallery (Visual First, No Heavy Text) -->
  <section id="showcase" class="py-5">
    <div class="container py-2">
      <div class="text-center mb-4">
        <span class="badge-modern badge-modern-gold mb-3 d-inline-block">Thế Giới Kiếm Hiệp</span>
        <h2 class="display-5 fw-bold text-white mt-1 mb-2">Hình Ảnh Nổi Bật</h2>
      </div>

      <div class="row g-4 justify-content-center">
        <!-- Image 1 -->
        <div class="col-md-6 col-lg-4">
          <div class="modern-glass-card overflow-hidden h-100 p-2 position-relative">
            <img src="{{ asset('frontend/assets/images/wuxia_showcase.png') }}" class="w-100 rounded-3 object-fit-cover shadow-sm" style="height: 260px;" alt="Bá Vương Xuất Thế">
          </div>
        </div>

        <!-- Image 2 -->
        <div class="col-md-6 col-lg-4">
          <div class="modern-glass-card overflow-hidden h-100 p-2 position-relative">
            <img src="{{ asset('frontend/assets/images/wuxia_battle.png') }}" class="w-100 rounded-3 object-fit-cover shadow-sm" style="height: 260px;" alt="Công Thành Rực Lửa">
          </div>
        </div>

        <!-- Image 3 -->
        <div class="col-md-6 col-lg-4">
          <div class="modern-glass-card overflow-hidden h-100 p-2 position-relative">
            <img src="{{ asset('backend/assets/img/front-pages/landing-page/TopTK.jpg') }}" class="w-100 rounded-3 object-fit-cover shadow-sm" style="height: 260px;" alt="Hào Khí Võ Lâm">
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="modern-footer text-center">
    <div class="container">
      <p class="mb-1 text-white opacity-75">&copy; {{ date('Y') }} {{ getWebsiteConfig('site_title') ?? 'Võ Lâm Tiên Kiếm' }}. All rights reserved.</p>
      <p class="small text-muted mb-1">Bản quyền thuộc về KingSoft. Độc quyền phát hành tại Việt Nam bởi VNG</p>
      <p class="small text-warning opacity-75 mb-0">Lưu ý : Chúng tôi không phải nhà phát hành chính thức - cân nhắc trước khi tham gia Game.</p>
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
</body>
</html>
