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

  <!-- Google Fonts: Be Vietnam Pro & Playfair Display (Full Vietnamese Support) -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,400;1,600;1,700&family=Playfair+Display:wght@700;800&display=swap" rel="stylesheet" />

  <!-- Theme 5: Sơn Hà Xã Tắc Đồ -->
  <link rel="stylesheet" href="{{ asset('frontend/assets/css/sonha-xatac-v5.css') }}?v=5.8" />
</head>
<body class="sonha-xatac-theme has-v5-map d-flex flex-column min-vh-100">
  @php
    $welcomePosts = \App\Models\Post::where('status', 1)
      ->with('category')
      ->orderBy('published_at', 'desc')
      ->limit(7)
      ->get();
    $spotlight = $welcomePosts->first();
    $recentCards = $welcomePosts->count() > 1 ? $welcomePosts->slice(1) : collect();
    $welcomeCats = \App\Models\Category::all();
  @endphp

  <!-- Floating Dark-Jade & Gold Capsule Navbar (Mẫu 1) -->
  <div class="v5-navbar-wrap">
    <nav class="navbar navbar-expand-lg v5-navbar">
      <div class="container-fluid p-0">
        <a href="{{ route('welcome') }}" class="navbar-brand d-flex align-items-center me-3">
          <img src="{{ getWebsiteConfig('site_logo') ?? asset('clients/asset/images/zingvn/skin/logo1.png') }}" alt="Logo" />
        </a>

        <button class="navbar-toggler border-0 p-1 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#v5WelcomeNav" aria-controls="v5WelcomeNav" aria-expanded="false" aria-label="Mở menu">
          <i class="fa-solid fa-bars fs-3" style="color: var(--v5-gold-light);"></i>
        </button>

        <div class="collapse navbar-collapse" id="v5WelcomeNav">
          <ul class="navbar-nav mx-auto mb-2 mb-lg-0 gap-1">
            <li class="nav-item">
              <a href="{{ route('welcome') }}" class="nav-link v5-nav-link active">Bản Đồ</a>
            </li>
            <li class="nav-item">
              <a href="{{ route('home') }}" class="nav-link v5-nav-link">Bảng Tin</a>
            </li>
            @foreach($welcomeCats->take(3) as $cat)
              <li class="nav-item">
                <a href="{{ route('cat_posts', $cat->slug) }}" class="nav-link v5-nav-link">{{ $cat->name }}</a>
              </li>
            @endforeach
            <li class="nav-item">
              <a href="{{ getWebsiteConfig('fanpage_url') ?? '#' }}" target="_blank" rel="noopener noreferrer" class="nav-link v5-nav-link">Cộng Đồng</a>
            </li>
          </ul>

          <div class="d-flex align-items-center gap-2 mt-2 mt-lg-0">
            <a href="{{ auth()->check() ? route('hotro.dashboard') : route('login') }}" class="btn-v5-gold">
              <span>{{ auth()->check() ? auth()->user()->cAccName : 'Tài Khoản' }}</span>
            </a>
          </div>
        </div>
      </div>
    </nav>
  </div>

  <main class="flex-grow-1">
    <!-- Interactive Sơn Hà Xã Tắc Map + Hand-Painted Soft Celadon-Jade Launcher Dock -->
    @include('clients.v5.layouts.partials.sonha_map_stage', ['compactMap' => false])

    <div class="v5-tapestry-stage">
      <div class="v5-container">
      @if(isset($opening_time) && isset($opening_time['show']) && $opening_time['show'] == 1)
        <div class="v5-card p-3 px-4 mb-4 d-flex flex-wrap justify-content-between align-items-center gap-3">
          <div>
            <span class="v5-badge mb-1"><i class="fa-regular fa-clock"></i> Khai Mở Máy Chủ Mới</span>
            <h5 class="fw-bolder mb-0 text-white">Đếm Ngược Giờ Khai Mở Chính Thức</h5>
          </div>
          <div class="d-flex align-items-center gap-2">
            <div class="px-3 py-2 rounded-2 text-center" style="background: var(--v5-bg-deep); border: 1px solid var(--v5-gold-border);">
              <div class="fw-bolder fs-5" style="color: var(--v5-gold-light);">{{ sprintf('%02d', $opening_time['day']) }}</div>
              <div class="small" style="color: var(--v5-text-muted); font-size: 0.7rem;">NGÀY</div>
            </div>
            <div class="px-3 py-2 rounded-2 text-center" style="background: var(--v5-bg-deep); border: 1px solid var(--v5-gold-border);">
              <div class="fw-bolder fs-5" style="color: var(--v5-gold-light);">{{ sprintf('%02d', $opening_time['month']) }}</div>
              <div class="small" style="color: var(--v5-text-muted); font-size: 0.7rem;">THÁNG</div>
            </div>
            <div class="px-3 py-2 rounded-2 text-center" style="background: var(--v5-bg-deep); border: 1px solid var(--v5-gold-border);">
              <div class="fw-bolder fs-5" style="color: var(--v5-gold-light);">{{ sprintf('%02d', $opening_time['hour']) }}h</div>
              <div class="small" style="color: var(--v5-text-muted); font-size: 0.7rem;">KHAI MỞ</div>
            </div>
          </div>
        </div>
      @endif

      <!-- Search Bar & Category Tabs (Matching Approved Mockup 2) -->
      <form action="{{ route('search') }}" method="GET" class="v5-search-bar">
        <input type="text" name="search" placeholder="Tìm kiếm tin tức, sự kiện, cẩm nang..." value="{{ request('search') }}" />
        <button type="submit" aria-label="Tìm kiếm"><i class="fa-solid fa-magnifying-glass"></i></button>
      </form>

      <div class="v5-cat-tabs">
        <a href="{{ route('home') }}" class="v5-cat-tab active">Tất cả</a>
        @foreach($welcomeCats as $cat)
          <a href="{{ route('cat_posts', $cat->slug) }}" class="v5-cat-tab">{{ $cat->name }}</a>
        @endforeach
      </div>

      <!-- Wide Spotlight Banner Card -->
      @if($spotlight)
        <a href="{{ route('single_post', $spotlight->slug) }}" class="v5-spotlight-banner mb-4 d-flex text-decoration-none" style="background-image: url('{{ $spotlight->image ?? $spotlight->thumbnail ?? asset('frontend/assets/images/v5/spotlight_tongkim.jpg') }}');">
          <div class="v5-spotlight-inner">
            <span class="v5-badge mb-2">
              <i class="fa-solid fa-star"></i> {{ $spotlight->category->name ?? 'Tiêu Điểm Giang Hồ' }}
            </span>
            <h2 class="h3 fw-bolder text-white mb-1">{{ $spotlight->title }}</h2>
            <p class="small mb-0" style="color: var(--v5-text-main); max-width: 720px;">
              {{ \Illuminate\Support\Str::limit(strip_tags($spotlight->description ?? $spotlight->content ?? ''), 150) }}
            </p>
          </div>
        </a>
      @else
        <div class="v5-spotlight-banner mb-4" style="background-image: url('{{ asset('frontend/assets/images/v5/spotlight_tongkim.jpg') }}');">
          <div class="v5-spotlight-inner">
            <span class="v5-badge mb-2"><i class="fa-solid fa-compass"></i> Sơn Hà Xã Tắc</span>
            <h2 class="h3 fw-bolder text-white mb-1">Hành Trình Bá Nghiệp Võ Lâm Truyền Kỳ</h2>
            <p class="small mb-0" style="color: var(--v5-text-main);">Bấm trực tiếp vào các địa danh trên Bản đồ Sơn Hà Xã Tắc phía trên để xem khung giờ hoạt động và phần thưởng quý hiếm.</p>
          </div>
        </div>
      @endif

      <!-- 3x2 News Grid -->
      @if($recentCards->count())
        <div class="row g-4 mb-4">
          @foreach($recentCards as $post)
            <div class="col-md-6 col-lg-4">
              <article class="v5-card v5-post-card">
                <a href="{{ route('single_post', $post->slug) }}" class="v5-post-thumb d-block">
                  <img src="{{ $post->image ?? $post->thumbnail ?? asset('frontend/assets/images/v5/spotlight_tongkim.jpg') }}" alt="{{ $post->title }}" />
                </a>

                <div class="small mb-1" style="color: var(--v5-text-dim);">
                  {{ $post->published_date ?? $post->publishedDate }} • {{ $post->category->name ?? 'Tin tức' }}
                </div>

                <h3 class="v5-post-title">
                  <a href="{{ route('single_post', $post->slug) }}">{{ $post->title }}</a>
                </h3>

                <p class="v5-post-desc">
                  {{ \Illuminate\Support\Str::limit(strip_tags($post->description ?? $post->content ?? ''), 105) }}
                </p>

                <div class="text-center mt-auto">
                  <a href="{{ route('single_post', $post->slug) }}" class="v5-btn-detail"><span>Xem chi tiết</span></a>
                </div>
              </article>
            </div>
          @endforeach
        </div>

        <div class="text-center pt-2">
          <a href="{{ route('home') }}" class="btn-v5-jade px-4 py-2">
            <span>Xem Toàn Bộ Bảng Tin</span>
            <i class="fa-solid fa-arrow-right small"></i>
          </a>
        </div>
      @endif
      </div>
    </div>
  </main>

  <footer class="v5-footer text-center mt-auto">
    <div class="v5-container">
      <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 pb-3 mb-3 small" style="border-bottom: 1px solid var(--v5-border-subtle);">
        <div class="d-flex flex-wrap gap-3">
          <a href="{{ route('register') }}">Đăng Ký</a>
          <a href="{{ route('login') }}">Đăng Nhập</a>
          <a href="{{ route('home') }}">Bảng Tin</a>
        </div>
        <div class="d-flex flex-wrap gap-3">
          <a href="{{ route('hotro.dashboard') }}">Hỗ Trợ TK</a>
          <a href="{{ getWebsiteConfig('fanpage_url') ?? '#' }}" target="_blank" rel="noopener noreferrer">Cộng Đồng</a>
        </div>
      </div>

      <p class="mb-1 fw-semibold text-white">
        &copy; {{ date('Y') }} {{ getWebsiteConfig('site_title') ?? 'Võ Lâm Tiên Kiếm' }}. All rights reserved.
      </p>
      <p class="small mb-1">• Bản quyền thuộc về KingSoft. Độc quyền phát hành tại Việt Nam bởi VNG.</p>
      <p class="small v5-disclaimer mb-0">• Lưu ý : Chúng tôi không phải nhà phát hành chính thức - cân nhắc trước khi tham gia Game.</p>
    </div>
  </footer>

  @if(getWebsiteConfig('fanpage_url'))
    <a href="{{ getWebsiteConfig('fanpage_url') }}" target="_blank" rel="noopener noreferrer" class="v5-fb-float" title="Fanpage Facebook Cộng Đồng">
      <i class="fa-brands fa-facebook-f"></i>
    </a>
  @endif

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
