@extends('frontend.layouts.master')

@section('slider')
  <!-- START: Image Slider -->
  <div class="nk-gap-2"></div>

  <div class="nk-image-slider" data-autoplay="8000">
    <div class="nk-image-slider-item">
      <img src="{{asset('frontend/assets/images/slide-1.jpg')}}" alt="" class="nk-image-slider-img" data-thumb="{{asset('frontend/assets/images/slide-1-thumb.jpg')}}">
      <div class="nk-image-slider-content">
        <h3 class="h4">As we Passed, I remarked</h3>
        <p class="text-white">As we passed, I remarked a beautiful church-spire rising above some old elms in the park; and before them, in the midst of a lawn, chimneys covered with ivy, and the windows shining in the sun.</p>
        <a href="#" class="nk-btn nk-btn-rounded nk-btn-color-white nk-btn-hover-color-main-1">Read More</a>
      </div>
    </div>
      
    <div class="nk-image-slider-item">
      <img src="{{asset('frontend/assets/images/slide-2.jpg')}}" alt="" class="nk-image-slider-img" data-thumb="{{asset('frontend/assets/images/slide-2-thumb.jpg')}}">
      <div class="nk-image-slider-content">
        <h3 class="h4">He made his passenger captain of one</h3>
        <p class="text-white">Now the races of these two have been for some ages utterly extinct, and besides to discourse any further of them would not be at all to my purpose. But the concern I have most at heart is for our Corporation of Poets, from whom I am preparing a petition to your Highness,  to be subscribed with the names of one...</p>
        <a href="#" class="nk-btn nk-btn-rounded nk-btn-color-white nk-btn-hover-color-main-1">Read More</a>
      </div>
    </div>
      
    <div class="nk-image-slider-item">
      <img src="{{asset('frontend/assets/images/slide-3.jpg')}}" alt="" class="nk-image-slider-img" data-thumb="{{asset('frontend/assets/images/slide-3-thumb.jpg')}}">
    </div>
      
    <div class="nk-image-slider-item">
      <img src="{{asset('frontend/assets/images/slide-4.jpg')}}" alt="" class="nk-image-slider-img" data-thumb="{{asset('frontend/assets/images/slide-4-thumb.jpg')}}">
      <div class="nk-image-slider-content">
        <h3 class="h4">At length one of them called out in a clear</h3>
        <p class="text-white">TJust then her head struck against the roof of the hall: in fact she was now more than nine feet high...</p>
        <a href="#" class="nk-btn nk-btn-rounded nk-btn-color-white nk-btn-hover-color-main-1">Read More</a>
      </div>
    </div>
      
    <div class="nk-image-slider-item">
      <img src="{{asset('frontend/assets/images/slide-5.jpg')}}" alt="" class="nk-image-slider-img" data-thumb="{{asset('frontend/assets/images/slide-5-thumb.jpg')}}">
      <div class="nk-image-slider-content">
        <h3 class="h4">For good, too though, in consequence</h3>
        <p class="text-white">She gave my mother such a turn, that I have always been convinced I am indebted to Miss Betsey for having been born on a Friday. The word was appropriate to the moment.</p>
        <p class="text-white">My mother was so much worse that Peggotty, coming in with the teaboard and candles, and seeing at a glance how ill she was, - as Miss Betsey might have done sooner if there had been light enough, - conveyed her upstairs to her own room with all speed; and immediately dispatched Ham Peggotty, her nephew, who had been for some days past secreted in the house...</p>
        <a href="#" class="nk-btn nk-btn-rounded nk-btn-color-white nk-btn-hover-color-main-1">Read More</a>
      </div>
        
    </div>
      
  </div>
  <!-- END: Image Slider -->

  <!-- START: Categories -->
  <div class="nk-gap-2"></div>
  <div class="row vertical-gap">
      <div class="col-lg-4">
          <div class="nk-feature-1">
              <div class="nk-feature-icon">
                  <img src="{{asset('frontend/assets/images/icon-mouse.png')}}" alt="">
              </div>
              <div class="nk-feature-cont">
                  <h3 class="nk-feature-title"><a href="#">PC</a></h3>
                  <h4 class="nk-feature-title text-main-1"><a href="#">View Games</a></h4>
              </div>
          </div>
      </div>
      <div class="col-lg-4">
          <div class="nk-feature-1">
              <div class="nk-feature-icon">
                  <img src="{{asset('frontend/assets/images/icon-gamepad.png')}}" alt="">
              </div>
              <div class="nk-feature-cont">
                  <h3 class="nk-feature-title"><a href="#">PS4</a></h3>
                  <h4 class="nk-feature-title text-main-1"><a href="#">View Games</a></h4>
              </div>
          </div>
      </div>
      <div class="col-lg-4">
          <div class="nk-feature-1">
              <div class="nk-feature-icon">
                  <img src="{{asset('frontend/assets/images/icon-gamepad-2.png')}}" alt="">
              </div>
              <div class="nk-feature-cont">
                  <h3 class="nk-feature-title"><a href="#">Xbox</a></h3>
                  <h4 class="nk-feature-title text-main-1"><a href="#">View Games</a></h4>
              </div>
          </div>
      </div>
  </div>
  <!-- END: Categories -->
@endsection

@section('content')
  <!-- START: Tabbed News  -->
<div class="nk-gap-2"></div>

  <h3 class="nk-decorated-h-2"><span><span class="text-main-1">Tabbed</span> News</span></h3>
  <div class="nk-gap"></div>
  <div class="nk-tabs">
      <!--
          Additional Classes:
              .nav-tabs-fill
      -->
      <ul class="nav nav-tabs nav-tabs-fill" role="tablist">
          <li class="nav-item">
              <a class="nav-link active" href="#tabs-1-1" role="tab" data-toggle="tab">Action</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="#tabs-1-2" role="tab" data-toggle="tab">MMO</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="#tabs-1-3" role="tab" data-toggle="tab">Strategy</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="#tabs-1-4" role="tab" data-toggle="tab">Adventure</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="#tabs-1-5" role="tab" data-toggle="tab">Racing</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="#tabs-1-6" role="tab" data-toggle="tab">Indie</a>
          </li>
      </ul>
      <div class="tab-content">

          <div role="tabpanel" class="tab-pane fade" id="tabs-1-5">
              <div class="nk-gap"></div>
              <!-- START: Racing Tab -->
              

<div class="nk-blog-post nk-blog-post-border-bottom">
<a href="blog-article.html" class="nk-post-img">
<img src="{{asset('frontend/assets/images/post-7-fw.jpg')}}" alt="At length one of them called out in a clear">

<span class="nk-post-categories">
  <span class="bg-main-5">Racing</span>
</span>

</a>
<div class="nk-gap-1"></div>

</div>



<div class="nk-blog-post nk-blog-post-border-bottom">
<div class="row vertical-gap">
<div class="col-lg-12 col-md-12">
  <h2 class="nk-post-title h4"><a href="blog-article.html">We found a witch! May we burn her?</a></h2>
</div>
</div>
</div>





              <!-- END: Racing Tab -->
          </div>

      </div>
  </div>
  <!-- END: Tabbed News -->


  <!-- START: Latest Pictures -->
  <div class="nk-gap"></div>
  <h2 class="nk-decorated-h-2 h3"><span><span class="text-main-1">Latest</span> Pictures</span></h2>
  <div class="nk-gap"></div>
  <div class="nk-popup-gallery">
      <div class="row vertical-gap">
          <div class="col-lg-4 col-md-6">
              <div class="nk-gallery-item-box">
                  <a href="{{asset('frontend/assets/images/gallery-1.jpg')}}" class="nk-gallery-item" data-size="1016x572">
                      <div class="nk-gallery-item-overlay"><span class="ion-eye"></span></div>
                      <img src="{{asset('frontend/assets/images/gallery-1-thumb.jpg')}}" alt="">
                  </a>
                  <div class="nk-gallery-item-description">
                      <h4>Called Let</h4>
                      Divided thing, land it evening earth winged whose great after. Were grass night. To Air itself saw bring fly fowl. Fly years behold spirit day greater of wherein winged and form. Seed open don't thing midst created dry every greater divided of, be man is. Second Bring stars fourth gathering he hath face morning fill. Living so second darkness. Moveth were male. May creepeth. Be tree fourth.
                  </div>
              </div>
          </div>
          <div class="col-lg-4 col-md-6">
              <div class="nk-gallery-item-box">
                  <a href="{{asset('frontend/assets/images/gallery-2.jpg')}}" class="nk-gallery-item" data-size="1188x594">
                      <div class="nk-gallery-item-overlay"><span class="ion-eye"></span></div>
                      <img src="{{asset('frontend/assets/images/gallery-2-thumb.jpg')}}" alt="">
                  </a>
                  <div class="nk-gallery-item-description">
                      Seed open don't thing midst created dry every greater divided of, be man is. Second Bring stars fourth gathering he hath face morning fill. Living so second darkness. Moveth were male. May creepeth. Be tree fourth.
                  </div>
              </div>
          </div>
          <div class="col-lg-4 col-md-6">
              <div class="nk-gallery-item-box">
                  <a href="{{asset('frontend/assets/images/gallery-3.jpg')}}" class="nk-gallery-item" data-size="625x350">
                      <div class="nk-gallery-item-overlay"><span class="ion-eye"></span></div>
                      <img src="{{asset('frontend/assets/images/gallery-3-thumb.jpg')}}" alt="">
                  </a>
              </div>
          </div>
          <div class="col-lg-4 col-md-6">
              <div class="nk-gallery-item-box">
                  <a href="{{asset('frontend/assets/images/gallery-4.jpg')}}" class="nk-gallery-item" data-size="873x567">
                      <div class="nk-gallery-item-overlay"><span class="ion-eye"></span></div>
                      <img src="{{asset('frontend/assets/images/gallery-4-thumb.jpg')}}" alt="">
                  </a>
              </div>
          </div>
          <div class="col-lg-4 col-md-6">
              <div class="nk-gallery-item-box">
                  <a href="{{asset('frontend/assets/images/gallery-5.jpg')}}" class="nk-gallery-item" data-size="471x269">
                      <div class="nk-gallery-item-overlay"><span class="ion-eye"></span></div>
                      <img src="{{asset('frontend/assets/images/gallery-5-thumb.jpg')}}" alt="">
                  </a>
              </div>
          </div>
          <div class="col-lg-4 col-md-6">
              <div class="nk-gallery-item-box">
                  <a href="{{asset('frontend/assets/images/gallery-6.jpg')}}" class="nk-gallery-item" data-size="472x438">
                      <div class="nk-gallery-item-overlay"><span class="ion-eye"></span></div>
                      <img src="{{asset('frontend/assets/images/gallery-6-thumb.jpg')}}" alt="">
                  </a>
              </div>
          </div>
      </div>
  </div>
  <!-- END: Latest Pictures -->
@endsection