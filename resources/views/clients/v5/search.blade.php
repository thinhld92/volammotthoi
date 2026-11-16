@extends('clients.v5.layouts.master')

@section('content')
<form action="{{ route('search') }}" method="GET" class="v5-search-bar">
  <input type="text" name="search" placeholder="Nhập từ khóa tìm kiếm..." value="{{ $search ?? request('search') }}" />
  <button type="submit" aria-label="Tìm kiếm"><i class="fa-solid fa-magnifying-glass"></i></button>
</form>

<div class="mb-4 text-center">
  <span class="v5-badge mb-2"><i class="fa-solid fa-magnifying-glass"></i> Tra Cứu Giang Hồ</span>
  <h1 class="h3 fw-bolder mb-0">{{ $title ?? 'Kết quả tìm kiếm' }}</h1>
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
        <i class="fa-solid fa-magnifying-glass fs-1 mb-3 d-block" style="color: var(--v5-gold-light);"></i>
        <h5 class="fw-bold mb-1">Không tìm thấy bài viết phù hợp</h5>
        <p class="small mb-3" style="color: var(--v5-text-muted);">Vui lòng thử lại với từ khóa khác hoặc quay về Bảng Tin.</p>
        <a href="{{ route('home') }}" class="btn-v5-gold py-2 px-4">Về Bảng Tin</a>
      </div>
    </div>
  @endif
</div>

<div class="d-flex justify-content-center pt-2">
  {{ $posts->links() }}
</div>
@endsection
