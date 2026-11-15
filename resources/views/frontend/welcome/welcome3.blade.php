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

  <!-- Theme 3: Thủy Mặc Thanh Ngọc (Neo-Oriental Light Bento) -->
  <link rel="stylesheet" href="{{ asset('frontend/assets/css/jade-bento-v3.css') }}?v=3.2" />
</head>
<body class="jade-bento-theme d-flex flex-column min-vh-100">

  <!-- Floating Frosted Pearl Pill Navbar -->
  <div class="v3-navbar-wrap">
    <nav class="navbar navbar-expand-lg v3-navbar">
      <div class="container-fluid p-0">
        <a href="{{ route('welcome') }}" class="navbar-brand d-flex align-items-center me-3">
          <img src="{{ getWebsiteConfig('site_logo') ?? asset('clients/asset/images/zingvn/skin/logo1.png') }}" alt="Logo" />
        </a>

        <button class="navbar-toggler border-0 p-1 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#v3WelcomeNav" aria-controls="v3WelcomeNav" aria-expanded="false" aria-label="Mở menu">
          <i class="fa-solid fa-bars fs-4" style="color: var(--v3-jade-dark);"></i>
        </button>

        <div class="collapse navbar-collapse" id="v3WelcomeNav">
          <ul class="navbar-nav mx-auto mb-2 mb-lg-0 gap-1">
            <li class="nav-item">
              <a href="{{ route('welcome') }}" class="nav-link v3-nav-link active">Trang Chủ</a>
            </li>
            <li class="nav-item">
              <a href="{{ route('home') }}" class="nav-link v3-nav-link">Bảng Tin</a>
            </li>
            <li class="nav-item">
              <a href="#features" class="nav-link v3-nav-link">Tính Năng</a>
            </li>
            <li class="nav-item">
              <a href="#showcase" class="nav-link v3-nav-link">Hình Ảnh</a>
            </li>
            <li class="nav-item">
              <a href="{{ getWebsiteConfig('fanpage_url') ?? '#' }}" target="_blank" rel="noopener noreferrer" class="nav-link v3-nav-link">Cộng Đồng</a>
            </li>
          </ul>

          <div class="d-flex flex-wrap align-items-center gap-2 mt-2 mt-lg-0">
            <a href="{{ route('register') }}" class="btn-v3-soft py-2 px-3">
              <i class="fa-solid fa-user-plus"></i>
              <span>Đăng Ký</span>
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

  <main class="flex-grow-1 pb-5">
    <div class="v3-container">

      <!-- Asymmetric 8:4 Bento Hero & Command Dock -->
      <section class="mb-5">
        <div class="row g-4 align-items-stretch">
          <!-- Left 8 Columns: Thủy Mặc Thanh Ngọc Hero Showcase -->
          <div class="col-lg-8">
            <div class="v3-hero-showcase">
              <div class="v3-hero-bg" style="background-image: url('{{ asset('frontend/assets/images/v3/hero_swordsman.jpg') }}');"></div>
              <div class="v3-hero-gradient"></div>

              <div class="v3-hero-inner">
                <div class="v3-pill-badge">
                  <i class="fa-solid fa-gem"></i>
                  <span>Phiên Bản Công Thành • Auto Ingame</span>
                </div>

                <h1 class="display-5 fw-bolder mb-3">
                  Hành Trình Bá Nghiệp Võ Lâm
                </h1>

                <p class="mb-4" style="color: var(--v3-text); font-size: 1rem;">
                  Khám phá giang hồ kiếm hiệp thanh nhã mà hào hùng, tái hiện trọn vẹn ký ức Công Thành Chiến 2005. Chuẩn trang bị, chuẩn kỹ năng, cân bằng cày cuốc &amp; PK tự do.
                </p>

                @if(isset($opening_time) && isset($opening_time['show']) && $opening_time['show'] == 1)
                  <div class="mb-3">
                    <div class="small fw-bold text-uppercase mb-2" style="color: var(--v3-jade-dark); letter-spacing: 0.06em;">
                      <i class="fa-regular fa-clock me-1"></i> Thời khắc khai mở máy chủ
                    </div>
                    <div class="v3-countdown-row">
                      <div class="v3-cd-tile">
                        <div class="v3-cd-num">{{ sprintf('%02d', $opening_time['day']) }}</div>
                        <div class="v3-cd-lbl">Ngày</div>
                      </div>
                      <span class="v3-cd-sep">:</span>
                      <div class="v3-cd-tile">
                        <div class="v3-cd-num">{{ sprintf('%02d', $opening_time['month']) }}</div>
                        <div class="v3-cd-lbl">Tháng</div>
                      </div>
                      <span class="v3-cd-sep">:</span>
                      <div class="v3-cd-tile">
                        <div class="v3-cd-num">{{ sprintf('%02d', $opening_time['hour']) }}h</div>
                        <div class="v3-cd-lbl">Khai Mở</div>
                      </div>
                    </div>
                  </div>
                @else
                  <div class="d-flex flex-wrap align-items-center gap-2 pt-1">
                    <a href="{{ route('home') }}" class="btn-v3-jade">
                      <i class="fa-solid fa-newspaper"></i>
                      <span>Xem Tin Tức &amp; Sự Kiện</span>
                    </a>
                    <a href="#features" class="btn-v3-soft">
                      <span>Khám Phá Tính Năng</span>
                    </a>
                  </div>
                @endif
              </div>
            </div>
          </div>

          <!-- Right 4 Columns: Bento Command Dock -->
          <div class="col-lg-4">
            <div class="v3-command-dock">
              <a href="{{ getWebsiteConfig('download_link') ?? route('hotro.dashboard') }}" target="_blank" rel="noopener noreferrer" class="v3-download-tile">
                <div>
                  <div class="v3-download-title">Tải về</div>
                  <div class="v3-download-sub">Bản Patch &amp; Full Client tốc độ cao</div>
                </div>
                <div class="v3-download-circle">
                  <i class="fa-solid fa-download"></i>
                </div>
              </a>

              <div class="v3-quick-grid">
                <a href="{{ route('register') }}" class="v3-quick-tile">
                  <i class="fa-solid fa-user-plus"></i>
                  <span>Đăng Ký</span>
                </a>
                <a href="{{ route('login') }}" class="v3-quick-tile">
                  <i class="fa-solid fa-right-to-bracket"></i>
                  <span>Đăng Nhập</span>
                </a>
                <a href="{{ route('hotro.dashboard') }}" class="v3-quick-tile">
                  <i class="fa-solid fa-user-shield"></i>
                  <span>Hỗ Trợ TK</span>
                </a>
                <a href="{{ getWebsiteConfig('fanpage_url') ?? '#' }}" target="_blank" rel="noopener noreferrer" class="v3-quick-tile">
                  <i class="fa-brands fa-facebook"></i>
                  <span>Cộng Đồng</span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Default Thủy Mặc Thanh Ngọc Panoramic Banner Carousel -->
      <section class="mb-5">
        <div class="v3-banner-carousel">
          <div id="v3WelcomeCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="4500">
            <div class="carousel-indicators mb-2">
              <button type="button" data-bs-target="#v3WelcomeCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#v3WelcomeCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#v3WelcomeCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>

            <div class="carousel-inner">
              <div class="carousel-item active position-relative">
                <a href="{{ route('home') }}">
                  <img src="{{ asset('frontend/assets/images/v3/banner_1_tongkim.jpg') }}" alt="Chiến Trường Tống Kim — Công Thành Đại Chiến" />
                  <div class="v3-banner-caption d-none d-sm-inline-flex">
                    <span class="v3-pill-tag">Tống Kim Rực Lửa</span>
                    <span class="fw-bold small" style="color: var(--v3-ink);">Công Thành Đại Chiến • Tranh Đoạt Giang Sơn</span>
                  </div>
                </a>
              </div>

              <div class="carousel-item position-relative">
                <a href="{{ route('home') }}">
                  <img src="{{ asset('frontend/assets/images/v3/banner_2_luankiem.jpg') }}" alt="Hoa Sơn Luận Kiếm — Thập Đại Môn Phái" />
                  <div class="v3-banner-caption d-none d-sm-inline-flex">
                    <span class="v3-pill-tag">Hoa Sơn Luận Kiếm</span>
                    <span class="fw-bold small" style="color: var(--v3-ink);">Thập Đại Môn Phái • Ngũ Hành Tương Khắc</span>
                  </div>
                </a>
              </div>

              <div class="carousel-item position-relative">
                <a href="{{ route('register') }}">
                  <img src="{{ asset('frontend/assets/images/v3/banner_3_banghoi.jpg') }}" alt="Giang Hồ Tụ Nghĩa — Chiêu Mộ Bang Hội" />
                  <div class="v3-banner-caption d-none d-sm-inline-flex">
                    <span class="v3-pill-tag">Giang Hồ Tụ Nghĩa</span>
                    <span class="fw-bold small" style="color: var(--v3-ink);">Chiêu Mộ Bang Hội • Huynh Đệ Đồng Lòng</span>
                  </div>
                </a>
              </div>
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#v3WelcomeCarousel" data-bs-slide="prev">
              <span class="v3-carousel-arrow"><i class="fa-solid fa-chevron-left"></i></span>
              <span class="visually-hidden">Trước</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#v3WelcomeCarousel" data-bs-slide="next">
              <span class="v3-carousel-arrow"><i class="fa-solid fa-chevron-right"></i></span>
              <span class="visually-hidden">Tiếp</span>
            </button>
          </div>
        </div>
      </section>

      <!-- Features Bento Grid Section -->
      <section id="features" class="py-3 mb-5">
        <div class="d-flex flex-wrap justify-content-between align-items-end gap-3 mb-4">
          <div>
            <span class="v3-pill-tag mb-2">
              <i class="fa-solid fa-gem"></i> Tinh Hoa Kiếm Hiệp
            </span>
            <h2 class="fw-bolder mb-0">Tính Năng Đặc Sắc</h2>
          </div>
          <p class="mb-0 small" style="color: var(--v3-muted);">
            Hệ thống vận hành ổn định, đề cao kỹ năng PK và giá trị cày cuốc bền vững
          </p>
        </div>

        <div class="row g-4">
          <div class="col-md-6 col-lg-4">
            <div class="v3-feature-bento">
              <div class="v3-feature-icon">
                <i class="fa-solid fa-trophy"></i>
              </div>
              <div>
                <h5 class="fw-bold mb-1">Công Thành Chiến</h5>
                <p class="small mb-0" style="color: var(--v3-muted);">
                  Chiến trường Tống Kim rực lửa, Thất Thành Đại Chiến quy tụ quần hùng tranh đoạt ngai vị.
                </p>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-4">
            <div class="v3-feature-bento">
              <div class="v3-feature-icon">
                <i class="fa-solid fa-mountain-sun"></i>
              </div>
              <div>
                <h5 class="fw-bold mb-1">Giang Hồ Nguyên Bản</h5>
                <p class="small mb-0" style="color: var(--v3-muted);">
                  Bản đồ kinh điển, nhiệm vụ Dã Tẩu và chuỗi hoạt động săn tìm bí kíp võ công chuẩn hồi ức.
                </p>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-4">
            <div class="v3-feature-bento">
              <div class="v3-feature-icon">
                <i class="fa-solid fa-yin-yang"></i>
              </div>
              <div>
                <h5 class="fw-bold mb-1">Thập Đại Môn Phái</h5>
                <p class="small mb-0" style="color: var(--v3-muted);">
                  10 môn phái quy tụ theo quy luật Ngũ Hành tương sinh tương khắc chặt chẽ, thiên biến vạn hóa.
                </p>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-4">
            <div class="v3-feature-bento">
              <div class="v3-feature-icon">
                <i class="fa-solid fa-crown"></i>
              </div>
              <div>
                <h5 class="fw-bold mb-1">Boss Hoàng Kim</h5>
                <p class="small mb-0" style="color: var(--v3-muted);">
                  Tranh đoạt Boss Hoàng Kim rơi trang bị xanh quý hiếm, tạo dựng nền giao thương sầm uất.
                </p>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-4">
            <div class="v3-feature-bento">
              <div class="v3-feature-icon">
                <i class="fa-solid fa-scroll"></i>
              </div>
              <div>
                <h5 class="fw-bold mb-1">Tuyệt Học 9x - 12x</h5>
                <p class="small mb-0" style="color: var(--v3-muted);">
                  Hệ thống kỹ năng 90 - 120 được tinh chỉnh mượt mà, tôn vinh kỹ năng điều khiển nhân vật.
                </p>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-4">
            <div class="v3-feature-bento">
              <div class="v3-feature-icon">
                <i class="fa-solid fa-shield-heart"></i>
              </div>
              <div>
                <h5 class="fw-bold mb-1">Đồng Hành 24/7</h5>
                <p class="small mb-0" style="color: var(--v3-muted);">
                  Cổng quản lý tài khoản bảo mật 2 lớp, tự giải kẹt nhân vật tức thì và hỗ trợ tận tâm.
                </p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Thủy Mặc Thanh Ngọc Visual Showcase -->
      <section id="showcase" class="py-2">
        <div class="d-flex flex-wrap justify-content-between align-items-end gap-3 mb-4">
          <div>
            <span class="v3-pill-tag mb-2">
              <i class="fa-solid fa-palette"></i> Thủy Mặc Thanh Ngọc
            </span>
            <h2 class="fw-bolder mb-0">Họa Phẩm Giang Hồ</h2>
          </div>
          <a href="{{ route('home') }}" class="btn-v3-soft py-2 px-3">
            <span>Vào Bảng Tin</span>
            <i class="fa-solid fa-arrow-right"></i>
          </a>
        </div>

        <div class="row g-4">
          <div class="col-md-4">
            <div class="v3-bento-card p-2 h-100">
              <img src="{{ asset('frontend/assets/images/v3/hero_swordsman.jpg') }}" class="w-100 object-fit-cover" style="height: 250px; border-radius: 20px;" alt="Thanh Ngọc Kiếm Khách" />
            </div>
          </div>
          <div class="col-md-4">
            <div class="v3-bento-card p-2 h-100">
              <img src="{{ asset('frontend/assets/images/v3/jade_sect_duel.jpg') }}" class="w-100 object-fit-cover" style="height: 250px; border-radius: 20px;" alt="Song Kiếm Luận Anh Hùng" />
            </div>
          </div>
          <div class="col-md-4">
            <div class="v3-bento-card p-2 h-100">
              <img src="{{ asset('frontend/assets/images/v3/hotro_jade_banner.jpg') }}" class="w-100 object-fit-cover" style="height: 250px; border-radius: 20px;" alt="Tiên Sơn Vân Các" />
            </div>
          </div>
        </div>
      </section>

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
</body>
</html>
