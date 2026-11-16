@extends('clients.v4.layouts.master')

@section('hero')
<!-- Full-Bleed Blood-Moon Hero Stage -->
<section class="v4-hero-stage v4-hero-compact" style="background-image: url('{{ asset('frontend/assets/images/v4/hero_bloodmoon.jpg') }}');">
  <div class="v4-container w-100">
    <div class="v4-hero-content">
      <div class="v4-badge-crimson">
        <i class="fa-solid fa-fire-flame-curved"></i>
        <span>Bảng Tin Giang Hồ • Cập Nhật Liên Tục</span>
      </div>
      <h1 class="display-5 fw-bolder mb-2 text-white">Hành Trình Bá Nghiệp Võ Lâm</h1>
      <p class="mb-0" style="color: var(--v4-text-main); max-width: 480px;">
        Theo dõi các tin tức nóng hổi, lịch trình sự kiện Công Thành Chiến và cẩm nang bôn tẩu mới nhất.
      </p>
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
</div>
@endsection

@section('content')
@php
  $feedCategories = \App\Models\Category::with(['posts' => function ($q) {
    $q->where('status', 1)->orderBy('published_at', 'desc')->limit(6);
  }])->take(3)->get();
  $spotlightPost = (isset($hotPosts) && $hotPosts->count()) ? $hotPosts->first() : null;
  $gridPosts = (isset($hotPosts) && $hotPosts->count() > 1) ? $hotPosts->slice(1) : collect();
@endphp

<!-- 2-Column Editorial Split (Matching Mockup A: Left Spotlight + Right Tabbed Chronicle Feed) -->
<div class="row g-4 mb-5 align-items-stretch">
  <!-- Left 7 Columns: Featured Event Spotlight Card -->
  <div class="col-lg-7">
    @if($spotlightPost)
      <article class="v4-card v4-spotlight-card h-100">
        <a href="{{ route('single_post', $spotlightPost->slug) }}" class="v4-spotlight-thumb d-block">
          <img src="{{ $spotlightPost->image ?? $spotlightPost->thumbnail ?? asset('frontend/assets/images/v4/banner_duel.jpg') }}" alt="{{ $spotlightPost->title }}" />
        </a>

        <div class="v4-spotlight-body">
          <div class="mb-2">
            <span class="v4-badge-bronze">
              <i class="fa-solid fa-star me-1"></i>{{ $spotlightPost->category->name ?? 'Tiêu Điểm Sự Kiện' }}
            </span>
          </div>

          <h2 class="h4 fw-bolder mb-2">
            <a href="{{ route('single_post', $spotlightPost->slug) }}" class="text-white">
              {{ $spotlightPost->title }}
            </a>
          </h2>

          <p class="small mb-3" style="color: var(--v4-text-muted);">
            {{ \Illuminate\Support\Str::limit(strip_tags($spotlightPost->description ?? $spotlightPost->content ?? ''), 135) }}
          </p>

          <div class="d-flex align-items-center justify-content-between gap-2 mt-auto pt-2" style="border-top: 1px solid var(--v4-border-subtle);">
            <span class="small" style="color: var(--v4-text-dim);">
              <i class="fa-regular fa-clock me-1"></i>{{ $spotlightPost->published_date ?? $spotlightPost->publishedDate }}
            </span>
            <a href="{{ route('single_post', $spotlightPost->slug) }}" class="btn-v4-bronze py-1 px-3 small">
              <span>Chi tiết</span>
              <i class="fa-solid fa-arrow-right small"></i>
            </a>
          </div>
        </div>
      </article>
    @else
      <div class="v4-card p-5 text-center h-100 d-flex flex-column justify-content-center">
        <i class="fa-regular fa-newspaper fs-1 mb-3" style="color: var(--v4-bronze);"></i>
        <h5 class="fw-bold mb-1">Chưa có bài viết tiêu điểm</h5>
        <p class="small mb-0" style="color: var(--v4-text-muted);">Các sự kiện mới nhất sẽ sớm xuất hiện tại đây.</p>
      </div>
    @endif
  </div>

  <!-- Right 5 Columns: Tabbed Chronicle Feed Panel + Search -->
  <div class="col-lg-5">
    <div class="v4-card h-100 d-flex flex-column">
      <div class="v4-feed-tabs" role="tablist">
        <button class="v4-feed-tab active" data-bs-toggle="tab" data-bs-target="#v4-tab-all" type="button" role="tab">
          Tất cả
        </button>
        @foreach($feedCategories as $cat)
          <button class="v4-feed-tab" data-bs-toggle="tab" data-bs-target="#v4-tab-{{ $cat->id }}" type="button" role="tab">
            {{ $cat->name }}
          </button>
        @endforeach
      </div>

      <div class="tab-content flex-grow-1">
        <!-- All Posts Tab -->
        <div class="tab-pane fade show active" id="v4-tab-all" role="tabpanel">
          <ul class="v4-feed-list">
            @if(isset($hotPosts) && $hotPosts->count())
              @foreach($hotPosts->take(5) as $item)
                <li class="v4-feed-item">
                  <span class="v4-feed-date">{{ $item->published_date ?? $item->publishedDate }}</span>
                  <a href="{{ route('single_post', $item->slug) }}" class="v4-feed-link">{{ $item->title }}</a>
                </li>
              @endforeach
            @else
              <li class="py-4 text-center small" style="color: var(--v4-text-muted);">Chưa có tin tức mới.</li>
            @endif
          </ul>
        </div>

        <!-- Category Specific Tabs -->
        @foreach($feedCategories as $cat)
          <div class="tab-pane fade" id="v4-tab-{{ $cat->id }}" role="tabpanel">
            <ul class="v4-feed-list">
              @forelse($cat->posts->take(5) as $cPost)
                <li class="v4-feed-item">
                  <span class="v4-feed-date">{{ $cPost->published_date ?? $cPost->publishedDate }}</span>
                  <a href="{{ route('single_post', $cPost->slug) }}" class="v4-feed-link">{{ $cPost->title }}</a>
                </li>
              @empty
                <li class="py-4 text-center small" style="color: var(--v4-text-muted);">Chưa có bài viết trong mục này.</li>
              @endforelse
            </ul>
          </div>
        @endforeach
      </div>

      <!-- Compact Search Footer inside Panel -->
      <div class="p-3 mt-auto" style="border-top: 1px solid var(--v4-border-subtle); background: rgba(11, 5, 7, 0.35);">
        <form action="{{ route('search') }}" method="GET">
          <div class="v4-input-wrap">
            <input
              type="text"
              name="search"
              class="v4-control has-end-icon py-2 small"
              placeholder="Tìm kiếm tin tức, sự kiện..."
              value="{{ request('search') }}"
            />
            <button type="submit" class="v4-pw-toggle" aria-label="Tìm kiếm">
              <i class="fa-solid fa-magnifying-glass"></i>
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Remaining Posts Grid -->
@if($gridPosts->count())
  <section>
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
      <div>
        <span class="v4-badge-bronze mb-1">Tổng Hợp Giang Hồ</span>
        <h3 class="h4 fw-bolder mb-0">Tin Tức &amp; Cẩm Nang Khác</h3>
      </div>
    </div>

    <div class="row g-4 mb-4">
      @foreach($gridPosts as $post)
        <div class="col-md-6 col-lg-4">
          <article class="v4-card v4-post-card">
            <a href="{{ route('single_post', $post->slug) }}" class="v4-post-thumb d-block">
              <img src="{{ $post->image ?? $post->thumbnail ?? asset('frontend/assets/images/v4/banner_siege.jpg') }}" alt="{{ $post->title }}" />
            </a>

            <div class="d-flex align-items-center justify-content-between gap-2 mb-2">
              <span class="v4-badge-bronze">{{ $post->category->name ?? 'Tin Tức' }}</span>
              <span class="small" style="color: var(--v4-text-dim);">
                <i class="fa-regular fa-calendar me-1"></i>{{ $post->published_date ?? $post->publishedDate }}
              </span>
            </div>

            <h4 class="v4-post-title">
              <a href="{{ route('single_post', $post->slug) }}">{{ $post->title }}</a>
            </h4>

            <p class="v4-post-desc">
              {{ \Illuminate\Support\Str::limit(strip_tags($post->description ?? $post->content ?? ''), 110) }}
            </p>

            <div class="mt-auto">
              <a href="{{ route('single_post', $post->slug) }}" class="btn-v4-bronze w-100 py-2">
                <span>Xem chi tiết</span>
                <i class="fa-solid fa-arrow-right small"></i>
              </a>
            </div>
          </article>
        </div>
      @endforeach
    </div>
  </section>
@endif

@if(isset($hotPosts) && method_exists($hotPosts, 'links'))
  <div class="d-flex justify-content-center pt-2">
    {{ $hotPosts->links() }}
  </div>
@endif
@endsection
