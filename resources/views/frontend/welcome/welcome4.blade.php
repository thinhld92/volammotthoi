<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>{{ getWebsiteConfig('site_title') ?? config('app.name', 'Võ Lâm Tiên Kiếm') }}</title>

  <!-- Chặn Google thu thập thông tin -->
  <meta name="robots" content="noindex, nofollow, noarchive, nosnippet" />
  <meta name="googlebot" content="noindex, nofollow, noarchive, nosnippet" />

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
<body class="crimson-bladepoint-theme d-flex flex-column min-vh-100">

  <!-- Top Metallic Horizontal Navigation Bar -->
  <header class="v4-header">
    <div class="v4-container">
      <nav class="navbar navbar-expand-lg">
        <a href="{{ route('welcome') }}" class="navbar-brand d-flex align-items-center me-4">
          <img src="{{ getWebsiteConfig('site_logo') ?? asset('clients/asset/images/zingvn/skin/logo1.png') }}" alt="Logo" />
        </a>

        <button class="navbar-toggler border-0 p-1 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#v4WelcomeNav" aria-controls="v4WelcomeNav" aria-expanded="false" aria-label="Mở menu">
          <i class="fa-solid fa-bars fs-3" style="color: var(--v4-bronze-light);"></i>
        </button>

        <div class="collapse navbar-collapse" id="v4WelcomeNav">
          <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a href="{{ route('welcome') }}" class="nav-link v4-nav-link active">Trang Chủ</a>
            </li>
            <li class="nav-item">
              <a href="{{ route('home') }}" class="nav-link v4-nav-link">Bảng Tin</a>
            </li>
            <li class="nav-item">
              <a href="#features" class="nav-link v4-nav-link">Tính Năng</a>
            </li>
            <li class="nav-item">
              <a href="#showcase" class="nav-link v4-nav-link">Hình Ảnh</a>
            </li>
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
    <!-- Full-Bleed Cinematic Blood-Moon Hero Stage -->
    <section class="v4-hero-stage" style="background-image: url('{{ asset('frontend/assets/images/v4/hero_bloodmoon.jpg') }}');">
      <div class="v4-container w-100">
        <div class="v4-hero-content">
          <div class="v4-badge-crimson">
            <i class="fa-solid fa-fire-flame-curved"></i>
            <span>Huyết Nguyệt Tái Thế • Công Thành Đại Chiến</span>
          </div>

          <h1 class="display-4 fw-bolder mb-3 text-white">
            Hành Trình Bá Nghiệp Võ Lâm
          </h1>

          <p class="mb-4" style="color: var(--v4-text-main); font-size: 1.02rem; max-width: 500px;">
            Giang hồ dậy sóng dưới ánh trăng máu. Tái hiện đỉnh cao Công Thành Chiến 2005 với hệ thống trang bị chuẩn nguyên bản, PK rực lửa và bang hội tranh hùng.
          </p>

          @if(isset($opening_time) && isset($opening_time['show']) && $opening_time['show'] == 1)
            <div>
              <div class="small fw-bold text-uppercase mb-1" style="color: var(--v4-bronze-light); letter-spacing: 0.08em;">
                <i class="fa-regular fa-clock me-1"></i> Khai mở máy chủ mới
              </div>
              <div class="v4-countdown">
                <div class="v4-cd-box">
                  <div class="v4-cd-num">{{ sprintf('%02d', $opening_time['day']) }}</div>
                  <div class="v4-cd-lbl">Ngày</div>
                </div>
                <div class="v4-cd-box">
                  <div class="v4-cd-num">{{ sprintf('%02d', $opening_time['month']) }}</div>
                  <div class="v4-cd-lbl">Tháng</div>
                </div>
                <div class="v4-cd-box">
                  <div class="v4-cd-num">{{ sprintf('%02d', $opening_time['hour']) }}h</div>
                  <div class="v4-cd-lbl">Khai Mở</div>
                </div>
              </div>
            </div>
          @endif
        </div>
      </div>
    </section>

    <!-- Overlapping Chamfered Launcher Dock Bar -->
    <div class="v4-container">
      <div class="v4-launcher-wrap">
        <div class="v4-launcher-bar">
          <div class="v4-dock-download-wrap">
            <a href="{{ getWebsiteConfig('download_link') ?? route('hotro.dashboard') }}" target="_blank" rel="noopener noreferrer" class="v4-dock-download">
              <span>Tải về</span>
              <i class="fa-solid fa-download"></i>
            </a>
          </div>

          <a href="{{ route('register') }}" class="v4-dock-tile">
            <span class="v4-dock-tile-inner">
              <i class="fa-solid fa-user-plus"></i>
              <span>Đăng Ký</span>
            </span>
          </a>

          <a href="{{ route('login') }}" class="v4-dock-tile">
            <span class="v4-dock-tile-inner">
              <i class="fa-solid fa-right-to-bracket"></i>
              <span>Đăng Nhập</span>
            </span>
          </a>

          <a href="{{ route('hotro.dashboard') }}" class="v4-dock-tile">
            <span class="v4-dock-tile-inner">
              <i class="fa-solid fa-user-shield"></i>
              <span>Hỗ Trợ TK</span>
            </span>
          </a>

          <a href="{{ getWebsiteConfig('fanpage_url') ?? '#' }}" target="_blank" rel="noopener noreferrer" class="v4-dock-tile">
            <span class="v4-dock-tile-inner">
              <i class="fa-brands fa-facebook-f"></i>
              <span>Cộng Đồng</span>
            </span>
          </a>
        </div>
      </div>

      <!-- Panoramic Huyết Nguyệt Banner Carousel -->
      <section class="mb-5">
        <div class="v4-card v4-carousel-frame">
          <div id="v4WelcomeCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="4500">
            <div class="carousel-inner">
              <div class="carousel-item active position-relative">
                <a href="{{ route('home') }}">
                  <img src="{{ asset('frontend/assets/images/v4/banner_siege.jpg') }}" alt="Công Thành Huyết Chiến" />
                  <div class="v4-carousel-caption d-none d-sm-inline-flex">
                    <span class="v4-badge-bronze">Chiến Trường Rực Lửa</span>
                    <span class="fw-bold small text-white">Công Thành Huyết Chiến • Vạn Quân Tranh Bá</span>
                  </div>
                </a>
              </div>

              <div class="carousel-item position-relative">
                <a href="{{ route('home') }}">
                  <img src="{{ asset('frontend/assets/images/v4/banner_duel.jpg') }}" alt="Song Kiếm Quyết Đấu" />
                  <div class="v4-carousel-caption d-none d-sm-inline-flex">
                    <span class="v4-badge-bronze">Đỉnh Cao Tuyệt Học</span>
                    <span class="fw-bold small text-white">Luận Kiếm Dưới Trăng • Ngũ Hành Tương Khắc</span>
                  </div>
                </a>
              </div>

              <div class="carousel-item position-relative">
                <a href="{{ route('register') }}">
                  <img src="{{ asset('frontend/assets/images/v4/hotro_fortress.jpg') }}" alt="Tổng Đà Giang Hồ" />
                  <div class="v4-carousel-caption d-none d-sm-inline-flex">
                    <span class="v4-badge-bronze">Tụ Nghĩa Đường</span>
                    <span class="fw-bold small text-white">Chiêu Mộ Quần Hùng • Kiến Tạo Bá Nghiệp</span>
                  </div>
                </a>
              </div>
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#v4WelcomeCarousel" data-bs-slide="prev">
              <span class="carousel-control-prev-icon"></span>
              <span class="visually-hidden">Trước</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#v4WelcomeCarousel" data-bs-slide="next">
              <span class="carousel-control-next-icon"></span>
              <span class="visually-hidden">Tiếp</span>
            </button>
          </div>
        </div>
      </section>

      <!-- 6 Chamfered Bronze Feature Cards -->
      <section id="features" class="py-2 mb-5">
        <div class="d-flex flex-wrap justify-content-between align-items-end gap-3 mb-4">
          <div>
            <span class="v4-badge-bronze mb-2">Huyền Thoại Kiếm Hiệp</span>
            <h2 class="fw-bolder mb-0">Tính Năng Đặc Sắc</h2>
          </div>
          <a href="{{ route('home') }}" class="btn-v4-bronze">
            <span>Xem Bảng Tin</span>
            <i class="fa-solid fa-arrow-right small"></i>
          </a>
        </div>

        <div class="row g-4">
          <div class="col-md-6 col-lg-4">
            <div class="v4-card v4-feature-card">
              <div class="v4-feature-icon"><i class="fa-solid fa-trophy"></i></div>
              <div>
                <h5 class="fw-bold mb-1">Công Thành Chiến</h5>
                <p class="small mb-0" style="color: var(--v4-text-muted);">Chiến trường Tống Kim máu lửa, Thất Thành đại chiến quy tụ quần hùng đoạt ngai vị.</p>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-4">
            <div class="v4-card v4-feature-card">
              <div class="v4-feature-icon"><i class="fa-solid fa-earth-asia"></i></div>
              <div>
                <h5 class="fw-bold mb-1">Bản Đồ Nguyên Bản</h5>
                <p class="small mb-0" style="color: var(--v4-text-muted);">Hệ thống thành thị, động luyện công và nhiệm vụ Dã Tẩu chuẩn mực ký ức xưa.</p>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-4">
            <div class="v4-card v4-feature-card">
              <div class="v4-feature-icon"><i class="fa-solid fa-yin-yang"></i></div>
              <div>
                <h5 class="fw-bold mb-1">Thập Đại Môn Phái</h5>
                <p class="small mb-0" style="color: var(--v4-text-muted);">Đầy đủ 10 môn phái Ngũ Hành tương sinh tương khắc, khắc chế biến ảo khôn lường.</p>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-4">
            <div class="v4-card v4-feature-card">
              <div class="v4-feature-icon"><i class="fa-solid fa-crown"></i></div>
              <div>
                <h5 class="fw-bold mb-1">Boss Hoàng Kim</h5>
                <p class="small mb-0" style="color: var(--v4-text-muted);">Săn Boss Hoàng Kim đoạt trang bị xanh cực phẩm, giao thương tự do náo nhiệt.</p>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-4">
            <div class="v4-card v4-feature-card">
              <div class="v4-feature-icon"><i class="fa-solid fa-scroll"></i></div>
              <div>
                <h5 class="fw-bold mb-1">Kỹ Năng 9x - 12x</h5>
                <p class="small mb-0" style="color: var(--v4-text-muted);">Tuyệt kỹ trấn phái mượt mà, cân bằng sát thương, tôn vinh kỹ năng điều khiển PK.</p>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-4">
            <div class="v4-card v4-feature-card">
              <div class="v4-feature-icon"><i class="fa-solid fa-shield-halved"></i></div>
              <div>
                <h5 class="fw-bold mb-1">Bảo Mật &amp; Hỗ Trợ 24/7</h5>
                <p class="small mb-0" style="color: var(--v4-text-muted);">Hệ thống mật khẩu cấp 2 an toàn, tự động giải kẹt nhân vật chỉ trong một chạm.</p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Visual Gallery -->
      <section id="showcase" class="py-2">
        <div class="mb-4">
          <span class="v4-badge-bronze mb-2">Tuyệt Tác Giang Hồ</span>
          <h2 class="fw-bolder mb-0">Hình Ảnh Huyết Nguyệt</h2>
        </div>

        <div class="row g-4">
          <div class="col-md-4">
            <div class="v4-card p-2 h-100">
              <img src="{{ asset('frontend/assets/images/v4/hero_bloodmoon.jpg') }}" class="w-100 object-fit-cover rounded-1" style="height: 240px;" alt="Huyết Nguyệt Kiếm Khách" />
            </div>
          </div>
          <div class="col-md-4">
            <div class="v4-card p-2 h-100">
              <img src="{{ asset('frontend/assets/images/v4/banner_duel.jpg') }}" class="w-100 object-fit-cover rounded-1" style="height: 240px;" alt="Song Kiếm Tranh Phong" />
            </div>
          </div>
          <div class="col-md-4">
            <div class="v4-card p-2 h-100">
              <img src="{{ asset('frontend/assets/images/v4/banner_siege.jpg') }}" class="w-100 object-fit-cover rounded-1" style="height: 240px;" alt="Công Thành Rực Lửa" />
            </div>
          </div>
        </div>
      </section>
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
</body>
</html>
