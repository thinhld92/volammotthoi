@extends('clients.v3.layouts.master')

@section('content')
@php
  $filterCategories = \App\Models\Category::all();
@endphp

<!-- Top 8:4 Bento Showcase & Command Dock (Matching Mockup 1) -->
<section class="mb-5">
  <div class="row g-4 align-items-stretch">
    <!-- Left 8 Columns: Default Thủy Mặc Thanh Ngọc Banner Carousel -->
    <div class="col-lg-8">
      <div class="v3-banner-carousel">
        <div id="v3HomeBannerCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="4500">
          <div class="carousel-indicators mb-2">
            <button type="button" data-bs-target="#v3HomeBannerCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#v3HomeBannerCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#v3HomeBannerCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
          </div>

          <div class="carousel-inner">
            <div class="carousel-item active position-relative">
              <img src="{{ asset('frontend/assets/images/v3/banner_1_tongkim.jpg') }}" style="height: 366px;" alt="Chiến Trường Tống Kim — Công Thành Đại Chiến" />
              <div class="v3-banner-caption d-none d-sm-inline-flex">
                <span class="v3-pill-tag">Tống Kim Rực Lửa</span>
                <span class="fw-bold small" style="color: var(--v3-ink);">Công Thành Đại Chiến • Tranh Đoạt Giang Sơn</span>
              </div>
            </div>

            <div class="carousel-item position-relative">
              <img src="{{ asset('frontend/assets/images/v3/banner_2_luankiem.jpg') }}" style="height: 366px;" alt="Hoa Sơn Luận Kiếm — Thập Đại Môn Phái" />
              <div class="v3-banner-caption d-none d-sm-inline-flex">
                <span class="v3-pill-tag">Hoa Sơn Luận Kiếm</span>
                <span class="fw-bold small" style="color: var(--v3-ink);">Thập Đại Môn Phái • Ngũ Hành Tương Khắc</span>
              </div>
            </div>

            <div class="carousel-item position-relative">
              <img src="{{ asset('frontend/assets/images/v3/banner_3_banghoi.jpg') }}" style="height: 366px;" alt="Giang Hồ Tụ Nghĩa — Chiêu Mộ Bang Hội" />
              <div class="v3-banner-caption d-none d-sm-inline-flex">
                <span class="v3-pill-tag">Giang Hồ Tụ Nghĩa</span>
                <span class="fw-bold small" style="color: var(--v3-ink);">Chiêu Mộ Bang Hội • Huynh Đệ Đồng Lòng</span>
              </div>
            </div>
          </div>

          <button class="carousel-control-prev" type="button" data-bs-target="#v3HomeBannerCarousel" data-bs-slide="prev">
            <span class="v3-carousel-arrow"><i class="fa-solid fa-chevron-left"></i></span>
            <span class="visually-hidden">Trước</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#v3HomeBannerCarousel" data-bs-slide="next">
            <span class="v3-carousel-arrow"><i class="fa-solid fa-chevron-right"></i></span>
            <span class="visually-hidden">Tiếp</span>
          </button>
        </div>
      </div>
    </div>

    <!-- Right 4 Columns: Command Dock -->
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

<!-- News & Events Header + Category Filter Pills + Search -->
<section>
  <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
    <div>
      <span class="v3-pill-tag mb-1">
        <i class="fa-solid fa-bolt"></i> Cập Nhật Mới Nhất
      </span>
      <h2 class="h3 fw-bolder mb-0 text-uppercase">Tin Tức &amp; Sự Kiện Nổi Bật</h2>
    </div>

    <div class="d-flex flex-wrap align-items-center gap-2">
      <div class="v3-filter-bar">
        <a href="{{ route('home') }}" class="v3-filter-pill active">Tất cả</a>
        @foreach($filterCategories as $cat)
          <a href="{{ route('cat_posts', $cat->slug) }}" class="v3-filter-pill">{{ $cat->name }}</a>
        @endforeach
      </div>

      <form action="{{ route('search') }}" method="GET" class="d-flex">
        <div class="v3-input-wrap">
          <input
            type="text"
            name="search"
            class="v3-control has-end-icon py-2"
            style="border-radius: 999px !important; min-width: 210px; background: #FFFFFF !important;"
            placeholder="Tìm bài viết..."
            value="{{ request('search') }}"
          />
          <button type="submit" class="v3-pw-toggle" aria-label="Tìm kiếm">
            <i class="fa-solid fa-magnifying-glass"></i>
          </button>
        </div>
      </form>
    </div>
  </div>

  <!-- 3-Column Bento News Cards -->
  <div class="row g-4 mb-4">
    @if(isset($hotPosts) && $hotPosts->count())
      @foreach($hotPosts as $post)
        <div class="col-md-6 col-lg-4">
          <article class="v3-post-card">
            <a href="{{ route('single_post', $post->slug) }}" class="v3-post-thumb d-block">
              <img src="{{ $post->image ?? $post->thumbnail ?? asset('frontend/assets/images/v3/jade_sect_duel.jpg') }}" alt="{{ $post->title }}" />
            </a>

            <div class="d-flex align-items-center justify-content-between gap-2 mb-2 px-1">
              <span class="v3-pill-tag">
                {{ $post->category->name ?? 'Tin Tức' }}
              </span>
              <span class="small" style="color: var(--v3-muted);">
                <i class="fa-regular fa-calendar me-1"></i>{{ $post->published_date ?? $post->publishedDate }}
              </span>
            </div>

            <h3 class="v3-post-title px-1">
              <a href="{{ route('single_post', $post->slug) }}">{{ $post->title }}</a>
            </h3>

            <p class="v3-post-desc px-1">
              {{ \Illuminate\Support\Str::limit(strip_tags($post->description ?? $post->content ?? ''), 115) }}
            </p>

            <div class="px-1 mt-auto">
              <a href="{{ route('single_post', $post->slug) }}" class="btn-v3-soft w-100 py-2">
                <span>Xem chi tiết</span>
                <i class="fa-solid fa-arrow-right small"></i>
              </a>
            </div>
          </article>
        </div>
      @endforeach
    @else
      <div class="col-12">
        <div class="v3-bento-card p-5 text-center">
          <i class="fa-regular fa-newspaper fs-1 mb-3 d-block" style="color: var(--v3-jade);"></i>
          <h5 class="fw-bold mb-1">Chưa có bài viết nào</h5>
          <p class="mb-0 small" style="color: var(--v3-muted);">Các tin tức và sự kiện mới nhất sẽ sớm được cập nhật tại đây.</p>
        </div>
      </div>
    @endif
  </div>

  @if(isset($hotPosts) && method_exists($hotPosts, 'links'))
    <div class="d-flex justify-content-center pt-2">
      {{ $hotPosts->links() }}
    </div>
  @endif
</section>
@endsection
