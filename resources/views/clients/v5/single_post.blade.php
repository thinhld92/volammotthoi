@extends('clients.v5.layouts.master')

@section('content')
<div class="v5-card p-3 px-4 mb-4 d-flex flex-wrap justify-content-between align-items-center gap-3">
  <div class="d-flex flex-wrap align-items-center gap-2 small">
    <a href="{{ route('home') }}" class="fw-bold" style="color: var(--v5-gold-light);">
      <i class="fa-regular fa-compass me-1"></i>Bảng Tin
    </a>
    @if(isset($category) && $category)
      <span style="color: var(--v5-text-dim);">/</span>
      <a href="{{ route('cat_posts', $category->slug) }}" class="fw-semibold" style="color: var(--v5-text-main);">
        {{ $category->name }}
      </a>
    @endif
    <span style="color: var(--v5-text-dim);">/</span>
    <span class="fw-semibold text-white text-truncate" style="max-width: 340px;">{{ $post->title }}</span>
  </div>

  <a href="{{ route('home') }}" class="btn-v5-jade py-1 px-3 small">
    <i class="fa-solid fa-arrow-left"></i>
    <span>Quay lại</span>
  </a>
</div>

<article class="v5-card p-4 p-md-5 mb-4">
  <header class="pb-4 mb-4" style="border-bottom: 1px solid var(--v5-gold-border);">
    <div class="d-flex flex-wrap align-items-center gap-2 mb-3">
      <span class="v5-badge">
        <i class="fa-solid fa-scroll"></i>
        {{ $post->category->name ?? 'Bài Viết' }}
      </span>
      <span class="small" style="color: var(--v5-text-muted);">
        <i class="fa-regular fa-clock me-1"></i>{{ $post->published_date ?? $post->created_at }}
      </span>
    </div>

    <h1 class="display-6 fw-bolder mb-0 text-white">{{ $post->title }}</h1>
  </header>

  <div id="single-post-content">
    {!! $post->content !!}
  </div>

  <footer class="pt-4 mt-5 d-flex flex-wrap justify-content-between align-items-center gap-3" style="border-top: 1px solid var(--v5-gold-border);">
    <a href="{{ route('home') }}" class="btn-v5-jade py-2 px-4">
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

<div class="v5-card p-4">
  <h5 class="fw-bold mb-3">
    <i class="fa-regular fa-comments me-2" style="color: var(--v5-gold-light);"></i>Thảo Luận Cộng Đồng
  </h5>
  <div class="fb-comments" data-href="{{ request()->url() }}" data-width="100%" data-numposts="10" data-colorscheme="dark"></div>
</div>
@endsection
