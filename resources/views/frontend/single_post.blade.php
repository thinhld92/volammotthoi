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
    

<!-- START: Post -->
<div class="nk-blog-post nk-blog-post-single">
  <!-- START: Post Text -->
  <div class="nk-post-text mt-0">
      <div class="nk-post-img">
          <img src="{{$post->image}}" alt="Grab your sword and fight the Horde">
      </div>
      <div class="nk-gap-1"></div>
      <h1 class="nk-post-title h4">{{$post->title}}</h1>
      <div class="nk-post-by">
          <img src="{{$post->admin->photo}}" 
            alt="Witch Murder" 
            class="rounded-circle" 
            width="35"
          > 
          by <a href="#">{{$post->admin->username}}</a> in Sep 5, 2018

          
          <div class="nk-post-categories">
              
              <span class="bg-main-1">Action</span>
              
              <span class="bg-main-2">Adventure</span>
              
          </div>
          
      </div>
      <div class="nk-gap"></div>
      <div class="content-post">
          {!!$post->content!!}
      </div>
      

      <div class="nk-gap"></div>
      <div class="nk-post-share">
          <span class="h5">Share Article:</span>

          <ul class="nk-social-links-2">
              <li><span class="nk-social-facebook" title="Share page on Facebook" data-share="facebook"><span class="fab fa-facebook"></span></span></li>
              <li><span class="nk-social-google-plus" title="Share page on Google+" data-share="google-plus"><span class="fab fa-google-plus"></span></span></li>
              <li><span class="nk-social-twitter" title="Share page on Twitter" data-share="twitter"><span class="fab fa-twitter"></span></span></li>
              <li><span class="nk-social-pinterest" title="Share page on Pinterest" data-share="pinterest"><span class="fab fa-pinterest-p"></span></span></li>

              <!-- Additional Share Buttons
                  <li><span class="nk-social-linkedin" title="Share page on LinkedIn" data-share="linkedin"><span class="fab fa-linkedin"></span></span></li>
                  <li><span class="nk-social-vk" title="Share page on VK" data-share="vk"><span class="fab fa-vk"></span></span></li>
              -->
          </ul>
      </div>
  </div>
  <!-- END: Post Text -->

</div>
<!-- END: Post -->



@endsection