@extends('clients.layouts.master')

@section('content')
<div id="boxTab">
  <div id="single-post-content">
    {{-- <div class="like-post row">
      <div class="col-12 mb-4">
        <div class="fb-like" 
          data-href="{{request()->url()}}" 
          data-width=""
          data-layout="standard" 
          data-action="like" 
          data-size="small"  
          data-share="true"
        >
        </div>
      </div>
    </div> --}}
    <div id="searchResult" class="bmV3c3w1NTl8dGluLXR1Yw">
      {!!$post->content!!}
    </div>

    <div class="like-post row mt-3">
      <div class="col-12 text-end">
        <div class="fb-like" 
          data-href="{{request()->url()}}" 
          data-width=""
          data-layout="standard" 
          data-action="like" 
          data-size="small"  
          data-share="true"
        >
        </div>
      </div>
    </div>
    <div class="fb-comments" data-href="{{request()->url()}}" data-width="100%" data-numposts="10"></div>
  </div>
</div>
@endsection