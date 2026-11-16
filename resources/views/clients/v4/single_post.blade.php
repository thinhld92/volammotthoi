@extends('clients.v4.layouts.master')

@section('content')
<!-- Breadcrumb Bar -->
<div class="v4-card p-3 px-4 mb-4 d-flex flex-wrap justify-content-between align-items-center gap-3">
  <div class="d-flex flex-wrap align-items-center gap-2 small">
    <a href="{{ route('home') }}" class="fw-bold" style="color: var(--v4-bronze-light);">
      <i class="fa-solid fa-house me-1"></i>Bảng Tin
    </a>
    @if(isset($category) && $category)
      <span style="color: var(--v4-text-dim);">/</span>
      <a href="{{ route('cat_posts', $category->slug) }}" class="fw-semibold" style="color: var(--v4-text-main);">
        {{ $category->name }}
      </a>
    @endif
    <span style="color: var(--v4-text-dim);">/</span>
    <span class="fw-semibold text-white text-truncate" style="max-width: 340px;">{{ $post->title }}</span>
  </div>

  <a href="{{ route('home') }}" class="btn-v4-bronze py-1 px-3 small">
    <i class="fa-solid fa-arrow-left"></i>
    <span>Quay lại</span>
  </a>
</div>

<!-- Article Reader Card -->
<article class="v4-card p-4 p-md-5 mb-4">
  <header class="pb-4 mb-4" style="border-bottom: 1px solid var(--v4-bronze-border);">
    <div class="d-flex flex-wrap align-items-center gap-2 mb-3">
      <span class="v4-badge-bronze">
        <i class="fa-solid fa-bookmark"></i>
        {{ $post->category->name ?? 'Bài Viết' }}
      </span>
      <span class="small" style="color: var(--v4-text-muted);">
        <i class="fa-regular fa-clock me-1"></i>{{ $post->published_date ?? $post->created_at }}
      </span>
    </div>

    <h1 class="display-6 fw-bolder mb-0 text-white">{{ $post->title }}</h1>
  </header>

  <div id="single-post-content">
    {!! $post->content !!}
  </div>

  <footer class="pt-4 mt-5 d-flex flex-wrap justify-content-between align-items-center gap-3" style="border-top: 1px solid var(--v4-bronze-border);">
    <a href="{{ route('home') }}" class="btn-v4-bronze py-2 px-4">
      <i class="fa-solid fa-arrow-left"></i>
      <span>Quay lại Bảng Tin</span>
    </a>

    <div class="fb-like"
      data-href="{{ request()->url() }}"
      data-width=""
      data-layout="button_count"
      data-action="like"
      data-size="small"
      data-share="true">
    </div>
  </footer>
</article>

<div class="v4-card p-4">
  <h5 class="fw-bold mb-3">
    <i class="fa-regular fa-comments me-2" style="color: var(--v4-bronze-light);"></i>Thảo Luận Cộng Đồng
  </h5>
  <div class="fb-comments" data-href="{{ request()->url() }}" data-width="100%" data-numposts="10" data-colorscheme="dark"></div>
</div>
@endsection
