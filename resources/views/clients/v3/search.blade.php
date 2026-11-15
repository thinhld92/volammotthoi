@extends('clients.v3.layouts.master')

@section('content')
<!-- Breadcrumb & Search Form -->
<div class="v3-bento-card p-3 px-4 mb-4 d-flex flex-wrap justify-content-between align-items-center gap-3">
  <div class="d-flex align-items-center gap-2 small">
    <a href="{{ route('home') }}" class="fw-bold" style="color: var(--v3-jade-dark);">
      <i class="fa-solid fa-house me-1"></i>Bảng Tin
    </a>
    <span style="color: var(--v3-dim);">/</span>
    <span class="fw-semibold" style="color: var(--v3-ink);">Tìm kiếm</span>
  </div>

  <form action="{{ route('search') }}" method="GET" class="d-flex">
    <div class="v3-input-wrap">
      <input
        type="text"
        name="search"
        class="v3-control has-end-icon py-2"
        style="border-radius: 999px !important; min-width: 240px;"
        placeholder="Nhập từ khóa tìm kiếm..."
        value="{{ $search ?? request('search') }}"
      />
      <button type="submit" class="v3-pw-toggle" aria-label="Tìm kiếm">
        <i class="fa-solid fa-magnifying-glass"></i>
      </button>
    </div>
  </form>
</div>

<div class="mb-4">
  <span class="v3-pill-tag mb-1">
    <i class="fa-solid fa-magnifying-glass"></i> Tra Cứu Giang Hồ
  </span>
  <h1 class="h3 fw-bolder mb-0">{{ $title ?? 'Kết quả tìm kiếm' }}</h1>
</div>

<div class="row g-4 mb-4">
  @if(isset($posts) && $posts->count())
    @foreach($posts as $post)
      <div class="col-md-6 col-lg-4">
        <article class="v3-post-card">
          <a href="{{ route('single_post', $post->slug) }}" class="v3-post-thumb d-block">
            <img src="{{ $post->thumbnail ?? $post->image ?? asset('frontend/assets/images/v3/jade_sect_duel.jpg') }}" alt="{{ $post->title }}" />
          </a>

          <div class="d-flex align-items-center justify-content-between gap-2 mb-2 px-1">
            <span class="v3-pill-tag">
              {{ $post->category->name ?? 'Tin Tức' }}
            </span>
            <span class="small" style="color: var(--v3-muted);">
              <i class="fa-regular fa-calendar me-1"></i>{{ $post->publishedDate ?? $post->published_date }}
            </span>
          </div>

          <h2 class="v3-post-title px-1">
            <a href="{{ route('single_post', $post->slug) }}">{{ $post->title }}</a>
          </h2>

          <p class="v3-post-desc px-1">
            {{ \Illuminate\Support\Str::limit(strip_tags($post->description ?? ''), 115) }}
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
        <i class="fa-solid fa-magnifying-glass fs-1 mb-3 d-block" style="color: var(--v3-jade);"></i>
        <h5 class="fw-bold mb-1">Không tìm thấy bài viết phù hợp</h5>
        <p class="mb-3 small" style="color: var(--v3-muted);">Vui lòng thử lại bằng từ khóa khác hoặc quay về trang Bảng Tin.</p>
        <a href="{{ route('home') }}" class="btn-v3-jade py-2 px-4">Về Bảng Tin</a>
      </div>
    </div>
  @endif
</div>

<div class="d-flex justify-content-center pt-2">
  {{ $posts->links() }}
</div>
@endsection
