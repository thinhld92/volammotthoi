@extends('clients.v5.layouts.master')

@section('content')
@php
  $filterCategories = \App\Models\Category::all();
@endphp

<form action="{{ route('search') }}" method="GET" class="v5-search-bar">
  <input type="text" name="search" placeholder="Tìm kiếm bài viết..." value="{{ request('search') }}" />
  <button type="submit" aria-label="Tìm kiếm"><i class="fa-solid fa-magnifying-glass"></i></button>
</form>

<div class="v5-cat-tabs">
  <a href="{{ route('home') }}" class="v5-cat-tab">Tất cả</a>
  @foreach($filterCategories as $cat)
    <a href="{{ route('cat_posts', $cat->slug) }}" class="v5-cat-tab {{ (isset($category) && $category->id == $cat->id) ? 'active' : '' }}">
      {{ $cat->name }}
    </a>
  @endforeach
</div>

<div class="mb-4 text-center">
  <span class="v5-badge mb-2"><i class="fa-regular fa-compass"></i> Chuyên Mục Giang Hồ</span>
  <h1 class="h3 fw-bolder mb-0">{{ $title ?? 'Bài Viết' }}</h1>
</div>

<div class="row g-4 mb-4">
  @if(isset($posts) && $posts->count())
    @foreach($posts as $post)
      <div class="col-md-6 col-lg-4">
        <article class="v5-card v5-post-card">
          <a href="{{ route('single_post', $post->slug) }}" class="v5-post-thumb d-block">
            <img src="{{ $post->thumbnail ?? $post->image ?? asset('frontend/assets/images/v5/spotlight_tongkim.jpg') }}" alt="{{ $post->title }}" />
          </a>

          <div class="small mb-1" style="color: var(--v5-text-dim);">
            {{ $post->publishedDate ?? $post->published_date }} • {{ $post->category->name ?? 'Tin tức' }}
          </div>

          <h2 class="v5-post-title">
            <a href="{{ route('single_post', $post->slug) }}">{{ $post->title }}</a>
          </h2>

          <p class="v5-post-desc">
            {{ \Illuminate\Support\Str::limit(strip_tags($post->description ?? ''), 115) }}
          </p>

          <div class="text-center mt-auto">
            <a href="{{ route('single_post', $post->slug) }}" class="v5-btn-detail"><span>Xem chi tiết</span></a>
          </div>
        </article>
      </div>
    @endforeach
  @else
    <div class="col-12">
      <div class="v5-card p-5 text-center">
        <i class="fa-regular fa-folder-open fs-1 mb-3 d-block" style="color: var(--v5-gold-light);"></i>
        <h5 class="fw-bold mb-1">Chưa có bài viết trong chuyên mục này</h5>
        <p class="small mb-3" style="color: var(--v5-text-muted);">Mời đại hiệp quay lại Bảng Tin để xem các thông báo mới nhất.</p>
        <a href="{{ route('home') }}" class="btn-v5-gold py-2 px-4">Về Bảng Tin</a>
      </div>
    </div>
  @endif
</div>

<div class="d-flex justify-content-center pt-2">
  {{ $posts->links() }}
</div>
@endsection
