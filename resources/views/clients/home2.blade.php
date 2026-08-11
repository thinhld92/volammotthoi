@extends('clients.layouts.master2')

@section('content')
<!-- Hero Banners Section -->
@if(isset($hotBanners) && $hotBanners->count())
  <div class="mb-5">
    <div id="homeBannerCarousel" class="carousel slide modern-glass-card overflow-hidden" data-bs-ride="carousel">
      <div class="carousel-inner">
        @foreach($hotBanners as $banner)
          <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
            <a href="{{ $banner->link ?? '#' }}" target="_blank">
              <img src="{{ $banner->image }}" class="d-block w-100 object-fit-cover" alt="{{ $banner->title }}" style="max-height: 400px;">
            </a>
          </div>
        @endforeach
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#homeBannerCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#homeBannerCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
      </button>
    </div>
  </div>
@endif

<!-- Section Title -->
<div class="d-flex justify-content-between align-items-center mb-4 border-bottom border-secondary pb-3">
  <div>
    <span class="badge-modern badge-modern-gold mb-1">Cập Nhật Mới Nhất</span>
    <h2 class="text-white fw-bold mb-0">Tin Tức & Sự Kiện</h2>
  </div>
</div>

<!-- Posts Grid -->
<div class="row g-4 mb-4">
  @if(isset($hotPosts) && $hotPosts->count())
    @foreach($hotPosts as $post)
      <div class="col-md-6 col-lg-4">
        <div class="modern-glass-card h-100 d-flex flex-column p-3">
          <div class="position-relative mb-3 overflow-hidden rounded-3" style="height: 180px;">
            <img src="{{ $post->image ?? asset('frontend/assets/images/auto/background_news.jpg') }}" class="w-100 h-100 object-fit-cover" alt="{{ $post->title }}">
            <span class="position-absolute top-0 start-0 m-2 badge-modern badge-modern-gold">
              {{ $post->category->name ?? 'Tin Tức' }}
            </span>
          </div>

          <div class="d-flex flex-column flex-grow-1">
            <div class="text-dim small mb-2">
              <i class="fa-regular fa-clock me-1"></i> {{ $post->published_date }}
            </div>
            <h5 class="text-white fw-bold mb-2 line-clamp-2">
              <a href="{{ route('single_post', $post->slug) }}" class="text-white text-decoration-none hover-gold">
                {{ $post->title }}
              </a>
            </h5>
            <p class="text-muted small mb-4 line-clamp-3 flex-grow-1">
              {{ Str::limit(strip_tags($post->description ?? $post->content ?? ''), 110) }}
            </p>

            <div>
              <a href="{{ route('single_post', $post->slug) }}" class="btn-modern-secondary btn-sm w-100 text-center">
                Xem Chi Tiết <i class="fa-solid fa-arrow-right ms-1 fs-7"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    @endforeach
  @else
    <div class="col-12 py-5 text-center text-muted">
      <i class="fa-regular fa-newspaper fs-1 mb-3 d-block opacity-50"></i>
      Chưa có bài viết nào được đăng.
    </div>
  @endif
</div>

<!-- Pagination -->
@if(isset($hotPosts) && method_exists($hotPosts, 'links'))
  <div class="d-flex justify-content-center pt-3">
    {{ $hotPosts->links() }}
  </div>
@endif
@endsection
