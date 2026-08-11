@extends((getWebsiteConfig('layout_website') == 2) ? 'clients.layouts.master2' : 'clients.layouts.master')

@section('content')
@if((int) getWebsiteConfig('layout_website') == 2)
  <div class="mb-4 border-bottom border-secondary pb-3">
    <span class="badge-modern badge-modern-gold mb-1">Danh Mục</span>
    <h2 class="text-white fw-bold mb-0">{{ $title ?? 'Bài Viết' }}</h2>
  </div>

  <div class="row g-4 mb-4">
    @if(isset($posts) && $posts->count())
      @foreach ($posts as $post)
        <div class="col-md-6 col-lg-4">
          <div class="modern-glass-card h-100 d-flex flex-column p-3">
            <div class="position-relative mb-3 overflow-hidden rounded-3" style="height: 180px;">
              <img src="{{ $post->thumbnail ?? asset('frontend/assets/images/auto/background_news.jpg') }}" class="w-100 h-100 object-fit-cover" alt="{{ $post->title }}">
              <span class="position-absolute top-0 start-0 m-2 badge-modern badge-modern-gold">
                {{ $post->category->name ?? 'Tin Tức' }}
              </span>
            </div>

            <div class="d-flex flex-column flex-grow-1">
              <div class="text-dim small mb-2">
                <i class="fa-regular fa-clock me-1"></i> {{ $post->publishedDate }}
              </div>
              <h5 class="text-white fw-bold mb-2 line-clamp-2">
                <a href="{{ route('single_post', $post->slug) }}" class="text-white text-decoration-none hover-gold">
                  {{ $post->title }}
                </a>
              </h5>
              <p class="text-muted small mb-4 line-clamp-3 flex-grow-1">
                {{ Str::limit(strip_tags($post->description ?? ''), 110) }}
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
        Không tìm thấy bài viết nào trong mục này.
      </div>
    @endif
  </div>

  <div class="d-flex justify-content-center pt-3">
    {{ $posts->links() }}
  </div>
@else
  <div id="boxTab">    
    <div id="searchResult" class="bmV3c3w1NTl8dGluLXR1Yw">
      <ul class="NewsList">
        @foreach ($posts as $post)
        <li>
          <div class="row mt-3 mb-3">
            <div class="col-2">
              <a class="post-thumbnail" href="{{route('single_post', $post->slug)}}#boxContent">
                <img alt="{{$post->image_caption}}" title="{{$post->image_caption}}" src="{{$post->thumbnail}}" class="Cate"/>
              </a>
            </div>
            <div class="col-9">
              <h2 class="content-title">
                <a class="" href="{{route('single_post', $post->slug)}}#boxContent">
                  <span class="TextNews">{{$post->title}}</span>
                </a>
              </h2>
              <p>{{$post->description}}</p>
            </div>
            <div class="col-1">
              <span class="Date">{{$post->publishedDate}}</span></a>
            </div>
          </div>
        </li>
        @endforeach
      </ul>
      
      <div class="PagingWrapper">
        {{$posts->fragment('boxContent')->links('clients.layouts.partials.paginate')}}
      </div>
    </div>
  </div>
@endif
@endsection