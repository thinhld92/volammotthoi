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
            <span class="Date">{{$post->publishedDate}}</span>
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
@endsection
