@extends('clients.v5.layouts.master')

@section('map_hero')
  @include('clients.v5.layouts.partials.sonha_map_stage', ['compactMap' => true])
@endsection

@section('content')
@php
  $filterCategories = \App\Models\Category::all();
  $spotlightPost = (isset($hotPosts) && $hotPosts->count()) ? $hotPosts->first() : null;
  $gridPosts = (isset($hotPosts) && $hotPosts->count() > 1) ? $hotPosts->slice(1) : collect();
@endphp

<!-- Search Bar & Category Filter Tabs (Exact Match to Approved Mockup) -->
<form action="{{ route('search') }}" method="GET" class="v5-search-bar">
  <input type="text" name="search" placeholder="Tìm kiếm..." value="{{ request('search') }}" />
  <button type="submit" aria-label="Tìm kiếm"><i class="fa-solid fa-magnifying-glass"></i></button>
</form>

<div class="v5-cat-tabs">
  <a href="{{ route('home') }}" class="v5-cat-tab active">Tất cả</a>
  @foreach($filterCategories as $cat)
    <a href="{{ route('cat_posts', $cat->slug) }}" class="v5-cat-tab">{{ $cat->name }}</a>
  @endforeach
</div>

<!-- Featured Wide Spotlight Banner Card -->
@if($spotlightPost)
  <a href="{{ route('single_post', $spotlightPost->slug) }}" class="v5-spotlight-banner mb-4 d-flex text-decoration-none" style="background-image: url('{{ $spotlightPost->image ?? $spotlightPost->thumbnail ?? asset('frontend/assets/images/v5/spotlight_tongkim.jpg') }}');">
    <div class="v5-spotlight-inner">
      <span class="v5-badge mb-2">
        <i class="fa-solid fa-star"></i> {{ $spotlightPost->category->name ?? 'Tiêu Điểm' }}
      </span>
      <h1 class="h3 fw-bolder text-white mb-1">{{ $spotlightPost->title }}</h1>
      <p class="small mb-0" style="color: var(--v5-text-main); max-width: 720px;">
        {{ \Illuminate\Support\Str::limit(strip_tags($spotlightPost->description ?? $spotlightPost->content ?? ''), 150) }}
      </p>
    </div>
  </a>
@endif

<!-- 3x2 News Cards Grid -->
<div class="row g-4 mb-4">
  @if($gridPosts->count())
    @foreach($gridPosts as $post)
      <div class="col-md-6 col-lg-4">
        <article class="v5-card v5-post-card">
          <a href="{{ route('single_post', $post->slug) }}" class="v5-post-thumb d-block">
            <img src="{{ $post->image ?? $post->thumbnail ?? asset('frontend/assets/images/v5/spotlight_tongkim.jpg') }}" alt="{{ $post->title }}" />
          </a>

          <div class="small mb-1" style="color: var(--v5-text-dim);">
            {{ $post->published_date ?? $post->publishedDate }} • {{ $post->category->name ?? 'Tin tức' }}
          </div>

          <h2 class="v5-post-title">
            <a href="{{ route('single_post', $post->slug) }}">{{ $post->title }}</a>
          </h2>

          <p class="v5-post-desc">
            {{ \Illuminate\Support\Str::limit(strip_tags($post->description ?? $post->content ?? ''), 110) }}
          </p>

          <div class="text-center mt-auto">
            <a href="{{ route('single_post', $post->slug) }}" class="v5-btn-detail"><span>Xem chi tiết</span></a>
          </div>
        </article>
      </div>
    @endforeach
  @elseif(!$spotlightPost)
    <div class="col-12">
      <div class="v5-card p-5 text-center">
        <i class="fa-regular fa-compass fs-1 mb-3 d-block" style="color: var(--v5-gold-light);"></i>
        <h5 class="fw-bold mb-1">Chưa có bài viết nào</h5>
        <p class="small mb-0" style="color: var(--v5-text-muted);">Các tin tức và sự kiện mới nhất sẽ sớm được cập nhật tại đây.</p>
      </div>
    </div>
  @endif
</div>

@if(isset($hotPosts) && method_exists($hotPosts, 'links'))
  <div class="d-flex justify-content-center pt-2">
    {{ $hotPosts->links() }}
  </div>
@endif
@endsection
