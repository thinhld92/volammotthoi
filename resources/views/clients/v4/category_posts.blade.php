@extends('clients.v4.layouts.master')

@section('content')
<!-- Breadcrumb & Search Bar -->
<div class="v4-card p-3 px-4 mb-4 d-flex flex-wrap justify-content-between align-items-center gap-3">
  <div class="d-flex align-items-center gap-2 small">
    <a href="{{ route('home') }}" class="fw-bold" style="color: var(--v4-bronze-light);">
      <i class="fa-solid fa-house me-1"></i>Bảng Tin
    </a>
    <span style="color: var(--v4-text-dim);">/</span>
    <span class="fw-semibold text-white">{{ $title ?? $category->name ?? 'Danh mục' }}</span>
  </div>

  <form action="{{ route('search') }}" method="GET" class="d-flex">
    <div class="v4-input-wrap">
      <input
        type="text"
        name="search"
        class="v4-control has-end-icon py-2 small"
        style="min-width: 220px;"
        placeholder="Tìm bài viết..."
        value="{{ request('search') }}"
      />
      <button type="submit" class="v4-pw-toggle" aria-label="Tìm kiếm">
        <i class="fa-solid fa-magnifying-glass"></i>
      </button>
    </div>
  </form>
</div>

<div class="mb-4">
  <span class="v4-badge-bronze mb-2">Chuyên Mục</span>
  <h1 class="h3 fw-bolder mb-0">{{ $title ?? 'Bài Viết' }}</h1>
</div>

<div class="row g-4 mb-4">
  @if(isset($posts) && $posts->count())
    @foreach($posts as $post)
      <div class="col-md-6 col-lg-4">
        <article class="v4-card v4-post-card">
          <a href="{{ route('single_post', $post->slug) }}" class="v4-post-thumb d-block">
            <img src="{{ $post->thumbnail ?? $post->image ?? asset('frontend/assets/images/v4/banner_duel.jpg') }}" alt="{{ $post->title }}" />
          </a>

          <div class="d-flex align-items-center justify-content-between gap-2 mb-2">
            <span class="v4-badge-bronze">{{ $post->category->name ?? 'Tin Tức' }}</span>
            <span class="small" style="color: var(--v4-text-dim);">
              <i class="fa-regular fa-calendar me-1"></i>{{ $post->publishedDate ?? $post->published_date }}
            </span>
          </div>

          <h2 class="v4-post-title">
            <a href="{{ route('single_post', $post->slug) }}">{{ $post->title }}</a>
          </h2>

          <p class="v4-post-desc">
            {{ \Illuminate\Support\Str::limit(strip_tags($post->description ?? ''), 115) }}
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
  @else
    <div class="col-12">
      <div class="v4-card p-5 text-center">
        <i class="fa-regular fa-folder-open fs-1 mb-3 d-block" style="color: var(--v4-bronze);"></i>
        <h5 class="fw-bold mb-1">Chưa có bài viết trong chuyên mục này</h5>
        <p class="small mb-3" style="color: var(--v4-text-muted);">Mời đại hiệp quay lại Bảng Tin để xem các thông báo mới nhất.</p>
        <a href="{{ route('home') }}" class="btn-v4-crimson py-2 px-4">Về Bảng Tin</a>
      </div>
    </div>
  @endif
</div>

<div class="d-flex justify-content-center pt-2">
  {{ $posts->links() }}
</div>
@endsection
