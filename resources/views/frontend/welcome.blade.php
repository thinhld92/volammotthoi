<!DOCTYPE html>

    
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>{{ config('app.name', 'Võ Lâm Tiên Kiếm') }}</title>

    <meta name="description" content="GoodGames - {{ config('app.name', 'Võ Lâm Tiên Kiếm') }}">
    <meta name="keywords" content="game, gaming, premium">
    <meta name="author" content="Promickey">

    <link rel="icon" type="image/png" href="{{getWebsiteConfig('site_icon') ?? asset('clients/asset/images/icon.ico')}}">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- START: Styles -->

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7cOpen+Sans:400,700" rel="stylesheet" type="text/css">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{asset('frontend/assets/vendor/bootstrap/dist/css/bootstrap.min.css')}}">

    <!-- FontAwesome -->
    @include('mylib.fontawesome')

    <!-- IonIcons -->
    <link rel="stylesheet" href="{{asset('frontend/assets/vendor/ionicons/css/ionicons.min.css')}}">

    <!-- Flickity -->
    <link rel="stylesheet" href="{{asset('frontend/assets/vendor/flickity/dist/flickity.min.css')}}">

    <!-- Photoswipe -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/vendor/photoswipe/dist/photoswipe.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/vendor/photoswipe/dist/default-skin/default-skin.css')}}">

    <!-- Seiyria Bootstrap Slider -->
    <link rel="stylesheet" href="{{asset('frontend/assets/vendor/bootstrap-slider/dist/css/bootstrap-slider.min.css')}}">

    <!-- Summernote -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/vendor/summernote/dist/summernote-bs4.css')}}">

    <!-- GoodGames -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/goodgames.css')}}">

    <!-- Custom Styles -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/custom.css')}}">
    
    <!-- END: Styles -->

    <!-- jQuery -->
    <script src="{{asset('frontend/assets/vendor/jquery/dist/jquery.min.js')}}"></script>
    
    <style>
      .nk-feature-1{
        justify-content: center;
      }
      .nk-feature-1 .nk-feature-cont{
        padding-top: 8px;
        padding-left: 0;
        
      }
      .item-center{
        justify-content: center;
      }
      .nk-page-background-fixed{
        filter: brightness(100%);
        /* object-fit: contain; */
        background-size: contain;
        background-repeat: no-repeat;
      }
      .nk-social-links-2 > li > * {
        width: 40px;
        height: 40px;
        margin: 3px 5px;
        font-size: 1.8em;
        line-height: 40px;
        background-color: #fff;
        border-radius: 30px;
      }

      .nk-fullscreen-block-top a img{
        max-width: 500px;
      }

      .nk-fullscreen-block{
        position: relative;
      }
      
      .nk-feature-1{
        padding: 3px;
      }

    </style>
</head>


<!--
    Additional Classes:
        .nk-page-boxed
-->
<body>
    
    

    <div class="nk-main">
        

        
<div class="nk-fullscreen-block">
    {{-- <div class="nk-fullscreen-block-top">
        <div class="text-center">
            <div class="nk-gap-2"></div>
            <a href="{{ route('home') }}"><img src="{{asset('frontend/assets/images/volam/logo-mkh.png')}}" alt="GoodGames"></a>
            <div class="nk-gap-2"></div>
        </div>
    </div> --}}
    <div class="nk-fullscreen-block-middle">
        <div class="container text-center">
            {{-- <h1 class="h3">Coming Soon</h1> --}}

            <!--
                START: Countdown
22qwwertgml


                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                
                Additional Classes:
                    .nk-countdown-center
                    .nk-countdown-right
            -->
            {{-- <div class="nk-gap-2"></div> --}}
            <div class="nk-countdown nk-countdown-center" style="position: absolute;
            bottom: 13%;
            width: 100%;"
                data-end="{{getWebsiteConfig('opening_time') ?? '2024-02-19 19:00'}}" 
                data-timezone="Asia/Ho_Chi_Minh"
            >
            </div>
            {{-- <div class="nk-countdown nk-countdown-center" data-end="2024-01-19 19:00" data-timezone="Asia/Ho_Chi_Minh"></div> --}}
            <!-- END: Countdown -->

            <!-- START: Features -->
        {{-- <div class="nk-gap-2"></div>
        <h3 class="text-main-1">KHAI MỞ MÁY CHỦ MỚI</h3>
        <div class="nk-gap"></div> --}}
        <div class="row vertical-gap item-center" style="position: absolute;
        bottom: 2.5%;
        width: 100%;">
            {{-- <div class="col-lg-2"></div> --}}

            <div class="col-lg-2">
                <div class="nk-feature-1">
                    <div class="nk-feature-cont">
                        <h3 class="nk-feature-title"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></h3>
                        <h3 class="nk-feature-title text-main-3"><a href="{{ route('home') }}">Trang Chủ</a></h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="nk-feature-1">
                    <div class="nk-feature-cont">
                        <h3 class="nk-feature-title"><a href="{{ route('register') }}"><i class="fa-solid fa-plane"></i></a></h3>
                        <h3 class="nk-feature-title text-main-3"><a href="{{ route('register') }}">Đăng ký</a></h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="nk-feature-1">
                    <div class="nk-feature-cont">
                        <h3 class="nk-feature-title"><a href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i></a></h3>
                        <h3 class="nk-feature-title text-main-3"><a href="{{ route('login') }}">Đăng nhập</a></h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="nk-feature-1">
                    <div class="nk-feature-cont">
                        <h3 class="nk-feature-title"><a href="{{getWebsiteConfig('download_link') ?? '#'}}"><i class="fa-solid fa-cloud-arrow-down"></i></a></h3>
                        <h3 class="nk-feature-title text-main-3"><a href="{{getWebsiteConfig('download_link') ?? '#'}}">Tải game</a></h3>
                    </div>
                </div>
            </div>
            {{-- <div class="col-lg-2"></div> --}}

        </div>
        <!-- END: Features -->
            <div class="nk-gap-3"></div>
        </div>
    </div>
    {{-- <div class="nk-fullscreen-block-bottom">
        <ul class="nk-social-links-2 nk-social-links-center">
            <li><a class="nk-social-facebook" href="#"><span class="fab fa-facebook"></span></a></li>
            <li><a class="nk-social-youtube" href="#"><span class="fab fa-youtube"></span></a></li>
        </ul>
        <div class="nk-gap-2"></div>
    </div> --}}
</div>


        
    </div>

    

    
        <!-- START: Page Background -->

    <div class="nk-page-background-fixed" style="background-image: url('{{asset('frontend/assets/images/volam/vlmt_background.jpg')}}');"></div>
    {{-- <div class="nk-page-background-fixed" style="background-image: url('{{asset('frontend/assets/images/volam/volam_coming.jpg')}}');"></div> --}}
    {{-- <video class="nk-page-background-fixed" autoplay muted loop>
        <source src="{{asset('frontend/assets/images/video.mp4')}}" type="video/mp4">
        <source src="{{asset('frontend/assets/images/video.webm')}}" type="video/webm">
    </video> --}}

<!-- END: Page Background -->

    

    
        <!-- START: Search Modal -->
<div class="nk-modal modal fade" id="modalSearch" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="ion-android-close"></span>
                </button>

                <h4 class="mb-0">Search</h4>

                <div class="nk-gap-1"></div>
                <form action="#" class="nk-form nk-form-style-1">
                    <input type="text" value="" name="search" class="form-control" placeholder="Type something and press Enter" autofocus>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- END: Search Modal -->
    

    
        <!-- START: Login Modal -->
<div class="nk-modal modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="ion-android-close"></span>
                </button>

                <h4 class="mb-0"><span class="text-main-1">Sign</span> In</h4>

                <div class="nk-gap-1"></div>
                <form action="#" class="nk-form text-white">
                    <div class="row vertical-gap">
                        <div class="col-md-6">
                            Use email and password:

                            <div class="nk-gap"></div>
                            <input type="email" value="" name="email" class=" form-control" placeholder="Email">

                            <div class="nk-gap"></div>
                            <input type="password" value="" name="password" class="required form-control" placeholder="Password">
                        </div>
                        <div class="col-md-6">
                            Or social account:

                            <div class="nk-gap"></div>

                            <ul class="nk-social-links-2">
                                <li><a class="nk-social-facebook" href="#"><span class="fab fa-facebook"></span></a></li>
                                <li><a class="nk-social-google-plus" href="#"><span class="fab fa-google-plus"></span></a></li>
                                <li><a class="nk-social-twitter" href="#"><span class="fab fa-twitter"></span></a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="nk-gap-1"></div>
                    <div class="row vertical-gap">
                        <div class="col-md-6">
                            <a href="#" class="nk-btn nk-btn-rounded nk-btn-color-white nk-btn-block">Sign In</a>
                        </div>
                        <div class="col-md-6">
                            <div class="mnt-5">
                                <small><a href="#">Forgot your password?</a></small>
                            </div>
                            <div class="mnt-5">
                                <small><a href="#">Not a member? Sign up</a></small>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- END: Login Modal -->

    

    
<!-- START: Scripts -->

<!-- Object Fit Polyfill -->
<script src="{{asset('frontend/assets/vendor/object-fit-images/dist/ofi.min.js')}}"></script>

<!-- GSAP -->
<script src="{{asset('frontend/assets/vendor/gsap/src/minified/TweenMax.min.js')}}"></script>
<script src="{{asset('frontend/assets/vendor/gsap/src/minified/plugins/ScrollToPlugin.min.js')}}"></script>

<!-- Popper -->
<script src="{{asset('frontend/assets/vendor/popper.js/dist/umd/popper.min.js')}}"></script>

<!-- Bootstrap -->
<script src="{{asset('frontend/assets/vendor/bootstrap/dist/js/bootstrap.min.js')}}"></script>

<!-- Sticky Kit -->
<script src="{{asset('frontend/assets/vendor/sticky-kit/dist/sticky-kit.min.js')}}"></script>

<!-- Jarallax -->
<script src="{{asset('frontend/assets/vendor/jarallax/dist/jarallax.min.js')}}"></script>
<script src="{{asset('frontend/assets/vendor/jarallax/dist/jarallax-video.min.js')}}"></script>

<!-- imagesLoaded -->
<script src="{{asset('frontend/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js')}}"></script>

<!-- Flickity -->
<script src="{{asset('frontend/assets/vendor/flickity/dist/flickity.pkgd.min.js')}}"></script>

<!-- Photoswipe -->
<script src="{{asset('frontend/assets/vendor/photoswipe/dist/photoswipe.min.js')}}"></script>
<script src="{{asset('frontend/assets/vendor/photoswipe/dist/photoswipe-ui-default.min.js')}}"></script>

<!-- Jquery Validation -->
<script src="{{asset('frontend/assets/vendor/jquery-validation/dist/jquery.validate.min.js')}}"></script>

<!-- Jquery Countdown + Moment -->
<script src="{{asset('frontend/assets/vendor/jquery-countdown/dist/jquery.countdown.min.js')}}"></script>
<script src="{{asset('frontend/assets/vendor/moment/min/moment.min.js')}}"></script>
<script src="{{asset('frontend/assets/vendor/moment-timezone/builds/moment-timezone-with-data.min.js')}}"></script>

<!-- Hammer.js -->
<script src="{{asset('frontend/assets/vendor/hammerjs/hammer.min.js')}}"></script>

<!-- NanoSroller -->
<script src="{{asset('frontend/assets/vendor/nanoscroller/bin/javascripts/jquery.nanoscroller.js')}}"></script>

<!-- SoundManager2 -->
<script src="{{asset('frontend/assets/vendor/soundmanager2/script/soundmanager2-nodebug-jsmin.js')}}"></script>

<!-- Seiyria Bootstrap Slider -->
<script src="{{asset('frontend/assets/vendor/bootstrap-slider/dist/bootstrap-slider.min.js')}}"></script>

<!-- Summernote -->
<script src="{{asset('frontend/assets/vendor/summernote/dist/summernote-bs4.min.js')}}"></script>

<!-- nK Share -->
<script src="{{asset('frontend/assets/plugins/nk-share/nk-share.js')}}"></script>

<!-- GoodGames -->
<script src="{{asset('frontend/assets/js/goodgames.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/goodgames-init.js')}}"></script>
<!-- END: Scripts -->


    
</body>
</html>
