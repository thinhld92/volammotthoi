@extends('clients.layouts.master')

@section('content')
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
        {{-- <h2 class="mb-3"><a href='{{route('single_post', $post->slug)}}' title="Nhiệm vụ ẩn - xem ngay!">
          <span class="TextNews">
            <img alt="tin-tuc_file/tin-tinh-nang.png" title="Nhiệm vụ ẩn - xem ngay!" src="{{$post->thumbnail}}" class="Cate"/>
            {{$post->title}}
          </span>
          <span class="Date">{{$post->publishedDate}}</span></a>
        </h2>
        <p>{{$post->description}}</p> --}}
      </li>
      @endforeach
      
    </ul>
    
      <!-- Paging --> 
      <!--Paging-->
    <div class="PagingWrapper">
      {{$posts->fragment('boxContent')->links('clients.layouts.partials.paginate')}}
    </div>
  </div>
</div>
@endsection