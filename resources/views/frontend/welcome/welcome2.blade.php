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

  <!-- Floating Glass Navbar -->
  <nav class="modern-navbar d-flex justify-content-between align-items-center">
    <a href="{{ route('welcome') }}" class="d-flex align-items-center text-decoration-none">
      <img src="{{ getWebsiteConfig('site_logo') ?? asset('clients/asset/images/zingvn/skin/logo1.png') }}" alt="Logo" height="40">
    </a>

    <div class="d-none d-md-flex align-items-center gap-2">
      <a href="{{ route('welcome') }}" class="nav-link active">Trang Chủ</a>
      <a href="{{ route('home') }}" class="nav-link">Tin Tức</a>
      <a href="#features" class="nav-link">Giới Thiệu</a>
      <a href="#events" class="nav-link">Sự Kiện</a>
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

  <!-- Hero Section -->
  <section class="min-vh-100 d-flex align-items-center position-relative pt-5">
    <div class="container position-relative z-2 text-center py-5 mt-4">
      <div class="row justify-content-center">
        <div class="col-lg-10">
          
          <span class="badge-modern badge-modern-gold mb-3 d-inline-block">
            <i class="fa-solid fa-sparkles me-1"></i> Trải Nghiệm Phong Cách Mới 2026
          </span>

          <h1 class="display-3 fw-bold mb-3 text-white">
            {{ getWebsiteConfig('site_title') ?? 'Võ Lâm Tiên Kiếm' }}
          </h1>

          <p class="lead text-muted max-w-700 mx-auto mb-4 fs-5">
            Không gian trải nghiệm tối giản, hiện đại, mượt mà và an toàn bảo mật hàng đầu.
          </p>

          <!-- Live Countdown Timer -->
          @if(isset($opening_time) && isset($opening_time['show']) && $opening_time['show'] == 1)
            <div class="mb-4">
              <div class="countdown-box mx-auto">
                <div class="countdown-item">
                  <div class="countdown-val">{{ sprintf('%02d', $opening_time['day']) }}</div>
                  <div class="countdown-label">Ngày</div>
                </div>
                <div class="text-gold opacity-50 fw-bold fs-4">:</div>
                <div class="countdown-item">
                  <div class="countdown-val">{{ sprintf('%02d', $opening_time['month']) }}</div>
                  <div class="countdown-label">Tháng</div>
                </div>
                <div class="text-gold opacity-50 fw-bold fs-4">:</div>
                <div class="countdown-item">
                  <div class="countdown-val">{{ sprintf('%02d', $opening_time['hour']) }}</div>
                  <div class="countdown-label">Giờ mở</div>
                </div>
              </div>
            </div>
          @endif

          <!-- CTA Buttons -->
          <div class="d-flex flex-wrap justify-content-center gap-3 mb-5">
            <a href="{{ getWebsiteConfig('download_link') ?? '#download' }}" class="btn-modern-primary" target="_blank">
              <i class="fa-solid fa-download fs-5"></i> Tải Về Ngay
            </a>
            <a href="{{ route('home') }}" class="btn-modern-secondary">
              <i class="fa-solid fa-newspaper fs-5"></i> Xem Bảng Tin
            </a>
          </div>

        </div>
      </div>
    </div>
  </section>

  <!-- Feature Highlights Section -->
  <section id="features" class="py-5">
    <div class="container py-4">
      <div class="text-center mb-5">
        <span class="badge-modern badge-modern-blue mb-2">Đặc Điểm Cốt Lõi</span>
        <h2 class="text-white fw-bold">Thông Tin & Tính Năng</h2>
        <p class="text-muted">Hệ thống vận hành tối ưu mang lại sự mượt mà tuyệt đối</p>
      </div>

      <div class="row g-4">
        <div class="col-md-4">
          <div class="modern-glass-card p-4 h-100">
            <div class="d-inline-flex align-items-center justify-content-center width-50 height-50 rounded-3 bg-gold-subtle text-gold mb-3 p-3">
              <i class="fa-solid fa-shield-halved fs-3 text-warning"></i>
            </div>
            <h4 class="text-white mb-2">An Toàn & Bảo Mật</h4>
            <p class="text-muted small mb-0">Hệ thống bảo vệ đa tầng, cam kết không chứa mã độc, đảm bảo an toàn tuyệt đối cho người sử dụng.</p>
          </div>
        </div>

        <div class="col-md-4">
          <div class="modern-glass-card p-4 h-100">
            <div class="d-inline-flex align-items-center justify-content-center width-50 height-50 rounded-3 bg-red-subtle text-danger mb-3 p-3">
              <i class="fa-solid fa-bolt fs-3 text-danger"></i>
            </div>
            <h4 class="text-white mb-2">Tốc Độ & Mượt Mà</h4>
            <p class="text-muted small mb-0">Tối ưu hóa đường truyền và máy chủ, phản hồi tức thì với độ trễ cực thấp.</p>
          </div>
        </div>

        <div class="col-md-4">
          <div class="modern-glass-card p-4 h-100">
            <div class="d-inline-flex align-items-center justify-content-center width-50 height-50 rounded-3 bg-blue-subtle text-info mb-3 p-3">
              <i class="fa-solid fa-headset fs-3 text-info"></i>
            </div>
            <h4 class="text-white mb-2">Hỗ Trợ 24/7</h4>
            <p class="text-muted small mb-0">Đội ngũ kỹ thuật trực hỗ trợ liên tục, giải đáp thắc mắc và xử lý yêu cầu nhanh chóng.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Banner Showcase Slider -->
  @if(isset($welcomeBanners) && $welcomeBanners->count())
    <section class="py-5">
      <div class="container">
        <div id="modernBannerCarousel" class="carousel slide modern-glass-card overflow-hidden" data-bs-ride="carousel">
          <div class="carousel-inner">
            @foreach($welcomeBanners as $banner)
              <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                <img src="{{ $banner->image }}" class="d-block w-100 object-fit-cover" alt="{{ $banner->title }}" style="max-height: 480px;">
              </div>
            @endforeach
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#modernBannerCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#modernBannerCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
          </button>
        </div>
      </div>
    </section>
  @endif

  <!-- Footer -->
  <footer class="modern-footer text-center">
    <div class="container">
      <p class="mb-1 text-white opacity-75">&copy; {{ date('Y') }} {{ getWebsiteConfig('site_title') ?? 'Võ Lâm Tiên Kiếm' }}. All rights reserved.</p>
      <small class="text-dim">Giao diện tối giản hiện đại 2026</small>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
