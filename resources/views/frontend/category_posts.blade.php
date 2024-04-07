@extends('frontend.layouts.master')

@section('breadcrumb')
            
<!-- START: Breadcrumbs -->
<div class="nk-gap-1"></div>
<div class="container">
    <ul class="nk-breadcrumbs">
        
        
        <li><a href="index.html">Home</a></li>
        
        
        <li><span class="fa fa-angle-right"></span></li>
        
        <li><a href="#">Blog</a></li>
        
        
        <li><span class="fa fa-angle-right"></span></li>
        
        <li><span>Blog List</span></li>
        
    </ul>
</div>
<div class="nk-gap-1"></div>
<!-- END: Breadcrumbs -->
@endsection


@section('content')
  <!-- START: Posts List -->
  <div class="nk-blog-list">
    @foreach ($posts as $post)
    <!-- START: Post -->
    <div class="nk-blog-post">
        <div class="row vertical-gap">
            <div class="col-md-5 col-lg-6">
                <a href="{{route('single_post', $post->slug)}}" class="nk-post-img">
                    <img src="{{$post->thumbnail}}" alt="Smell magic in the air. Or maybe barbecue">
                    {{-- <span class="nk-post-comments-count">4</span> --}}
                </a>
            </div>
            <div class="col-md-7 col-lg-6">
                <h2 class="nk-post-title h4"><a href="{{route('single_post', $post->slug)}}">{{$post->title}}</a></h2>

                <div class="nk-post-text">
                    <p>{{$post->description}}</p>
                </div>

                <div class="nk-post-by">
                    <img src="{{$post->admin->photo}}" alt="Hitman" class="rounded-circle" width="35"> by <a href="#">{{$post->admin->username}}</a> in Sep 18, 2018
                </div>
            </div>
        </div>
    </div>
    <!-- END: Post -->
    @endforeach


<!-- START: Pagination -->
<div class="nk-pagination nk-pagination-center">
    <a href="#" class="nk-pagination-prev">
        <span class="ion-ios-arrow-back"></span>
    </a>
    <nav>
        <a class="nk-pagination-current" href="#">1</a>
        <a href="#">2</a>
        <a href="#">3</a>
        <a href="#">4</a>
        <span>...</span>
        <a href="#">14</a>
    </nav>
    <a href="#" class="nk-pagination-next">
        <span class="ion-ios-arrow-forward"></span>
    </a>
</div>
<!-- END: Pagination -->
</div>
<!-- END: Posts List -->
@endsection