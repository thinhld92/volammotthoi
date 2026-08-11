@extends((getWebsiteConfig('layout_website') == 2) ? 'clients.layouts.master2' : 'clients.layouts.master')

@section('content')
@if((int) getWebsiteConfig('layout_website') == 2)
  <div class="modern-glass-card p-4 p-md-5 mb-4">
    <div class="mb-4 border-bottom border-secondary pb-3">
      <span class="badge-modern badge-modern-gold mb-2">
        {{ $post->category->name ?? 'Bài Viết' }}
      </span>
      <h1 class="text-white fw-bold display-6 mb-2">{{ $post->title }}</h1>
      <div class="text-muted small">
        <i class="fa-regular fa-clock me-1"></i> {{ $post->published_date ?? $post->created_at }}
      </div>
    </div>

    <div id="single-post-content" class="fs-5 leading-relaxed text-slate-200">
      {!! $post->content !!}
    </div>

    <div class="border-top border-secondary mt-5 pt-4 d-flex justify-content-between align-items-center flex-wrap gap-3">
      <a href="{{ route('home') }}" class="btn-modern-secondary btn-sm">
        <i class="fa-solid fa-arrow-left me-1"></i> Quay lại tin tức
      </a>
      <div class="fb-like" 
        data-href="{{ request()->url() }}" 
        data-width=""
        data-layout="button_count" 
        data-action="like" 
        data-size="small"  
        data-share="true">
      </div>
    </div>
  </div>

  <div class="modern-glass-card p-4">
    <div class="fb-comments" data-href="{{ request()->url() }}" data-width="100%" data-numposts="10" data-colorscheme="dark"></div>
  </div>
@else
  <div id="boxTab">
    <div id="single-post-content">
      <div id="searchResult" class="bmV3c3w1NTl8dGluLXR1Yw">
        {!! $post->content !!}
      </div>

      <div class="like-post row mt-3">
        <div class="col-12 text-end">
          <div class="fb-like" 
            data-href="{{ request()->url() }}" 
            data-width=""
            data-layout="standard" 
            data-action="like" 
            data-size="small"  
            data-share="true">
          </div>
        </div>
      </div>
      <div class="fb-comments" data-href="{{ request()->url() }}" data-width="100%" data-numposts="10"></div>
    </div>
  </div>
@endif
@endsection