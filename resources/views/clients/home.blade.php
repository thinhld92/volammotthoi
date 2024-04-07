<!DOCTYPE html">
<html>
<head>
  <meta http-equiv="Content-Type" type="image/x-icon" content="text/html; charset=utf-8" />
  <meta name="robots" content="index,follow" />
  <meta name="revisit-after" content="1days" />
  <!-- <meta property="fb:app_id" content="218407745021247" /> -->
  <title>{{getWebsiteConfig('site_title') ?? env('APP_NAME')}}</title>
  <meta name="description" content="Đắm mình vào sự trở lại đầy ngoạn mục của loạt giải đấu máu lửa Hùng Bá Thiên Hạ, Thống Nhất Giang Sơn, Hoàng Đồ Bá Nghiệp của VLTK!"/>
  <meta name="keywords" content="vo lam truyen ki, vo lam, vltk, game online, download game, tai game, choi game online, son ha xa tac, choi game mien phi, tai game mien phi, download game free"/>
  <meta property="og:url"           content="{{request()->url()}}" />
  <meta property="og:type"          content="website" />
  <meta property="og:title"         content="{{getWebsiteConfig('site_title') ?? env('APP_NAME')}}" />
  <meta property="og:description"   content="{{getWebsiteConfig('site_description') ?? 'Đắm mình vào sự trở lại đầy ngoạn mục của loạt giải đấu máu lửa Hùng Bá Thiên Hạ, Thống Nhất Giang Sơn, Hoàng Đồ Bá Nghiệp của VLTK!'}}" />
  <meta property="og:image"         content="{{asset(getWebsiteConfig('site_image') ?? '')}}" />
  <!--link rel="shortcut icon" href="favicon.ico"/-->
  <link rel="shortcut icon" href="{{getWebsiteConfig('site_icon') ?? asset('clients/asset/images/icon.ico')}}"/>

  {{-- end meta --}}

  <script type="text/javascript" src="{{asset('clients/asset/js/zingvn/mainsite1.js')}}"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <!--link rel="alternate" type="application/rss+xml" title="Volam - RSS" href="http://volam.zing.vn/rss"/-->
  <link type="text/css" rel="stylesheet" href="{{asset('clients/asset/css/zingvn/mainsite.css')}}"/>
  <link type="text/css" rel="stylesheet" href="{{asset('clients/asset/css/zingvn/jx1-index-2015-04-27.css')}}" />
  <link type="text/css" rel="stylesheet" href="{{asset('clients/asset/css/zingvn/rating.css')}}" />
  <link type="text/css" rel="stylesheet" href="{{asset('clients/asset/css/custom.css')}}" />
  <!-- Facebook Conversion Code for VLTKI -->
  
  <style type="text/css">
      .Rating {
          top: 0px;
      }
  @media screen and (max-width: 1025px) {
    .Rating {
          top: 170px;
      }
  }
  </style>
</head>
<body>
  <div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v18.0" nonce="qFOpiVos"></script>

  <div class="WrapperBG">
    <div id="wrapper" >
      <div id="wrapperIn">
        <div id="header">	
          <div id="boxEvent">
            <ul id="img">
              <li class="ActiveBanner" id="item2-1"><a  href="#" title="" target="_blank">1</a></li>
              <li id="item2-2"><a href="#" title="" target="_blank">2</a></li>
              <li id="item2-3"><a href="#" title="Mừng 11 tuổi" target="_blank">3</a></li>
              <li id="item2-4"><a href="#" title="" target="_blank">4</a></li>
              <li id="item2-5"><a href="#" title="" target="_blank">5</a></li>    
            </ul>
          </div>	
				  <a class="Logo"  href="{{route('home')}}" title="Trở về trang chủ Võ Lâm Truyền Kỳ">Trở về trang chủ Võ Lâm Truyền Kỳ</a>
          <div id="boxNav">
            <ul id="nav">
              <li><a class="Nav-1" href="{{route('home')}}" title="Trang chủ">Trang chủ<span>icon</span></a></li>
              @foreach ($commonData['main_menus'] as $menu)
                <li><a class="Nav-{{++$loop->iteration}}" href="{{route('cat_posts', $menu->slug)}}" title="{{$menu->name}}">{{$menu->name}}<span>icon</span></a></li>
              @endforeach
              {{-- <li><a class="Nav-2" href="/categories/tin-tuc" title="Tin tức">Tin tức<span>icon</span></a></li>
              <li><a class="Nav-3" href="/categories/su-kien" title="Sự kiện">Sự kiện<span>icon</span></a></li>
              <li><a class="Nav-4" href="javascript:void(0)" title="Cẩm nang">Cẩm nang<span>icon</span></a></li> --}}
              <li><a class="Nav-5" href="{{route('hotro.dashboard')}}" title="Hỗ trợ">Hỗ trợ<span>icon</span></a></li>
              <li><a class="Nav-6" href="{{$website_configs['fanpage_url'] ?? ''}}" title="Fanpage" target="_blank">Fanpage<span>icon</span></a></li>
            </ul>
          </div>
                    <!-- End block Main_Navigation_MainNavigation -->
          <div id="download">
                      <!-- Begin block Home_DownloadGame_DownloadGame - MTcxfEhvbWVfRG93bmxvYWRHYW1lfDU3Mnxob21lfERvd25sb2FkR2FtZXxIVE1M -->
            <div id="flashContent" style="margin:0 auto;">
              <a class="SetUp" href="{{$website_configs['download_link'] ?? ''}}" title="Cài đặt ngay" target="_blank">Cài đặt ngay</a>
            </div>
            <ul class="BlockButton">
              <li><a class="Btn-1" href="{{route('register')}}" title="Đăng Ký" target="_blank">Đăng Ký</a></li>
              <li><a class="Btn-2" href="{{route('hotro.payments.create')}}" title="Nạp thẻ">Nạp thẻ</a></li>
              <li><a class="Btn-3" href="{{route('login')}}" title="Quản lý tài khoản" target="_blank">Quản lý tài khoản</a></li>
              <li><a class="Btn-4" href="{{$website_configs['fanpage_url'] ?? ''}}" target="_blank" title="Fanpage">Fanpage</a></li>
              <!-- <li><a class="BtNhanQua" href="http:#" target="_blank">Kích hoạt code Tân Thủ</a></li> -->
            </ul>
                        <!-- End block Home_DownloadGame_DownloadGame -->

            <div class="BoxSearch">
              <form id="frmSearch" class="formSearch" method="get" action="{{route('search')}}">
                  <input type="text" name="search" id="Keyword1" autocomplete="off" value="Tìm kiếm" class="BgTextbox"/>
                  <input type="hidden" value="08a50be82d03c9442e876653184c0b33" id="token" name="token" />
                  <input type="hidden" value="" id="CateCode" name="CateCode" />
                  <input type="submit" name="buttonSubmit" title="Tìm" class="SearchBtn" onclick="document.form_timkiem.submit();"  />
              </form>
            </div>
              <!-- End block Home_Search_Search -->
          </div>
        </div>
        <div class="Main">
          <div class="Sidebar">
                    <!-- Begin block Home_Support_Support - MTU2fEhvbWVfU3VwcG9ydHw1NzJ8aG9tZXxTdXBwb3J0fEhUTUw -->
            <ul class="HoTro">
              <li>
                <p><strong>HotLine</strong></p>
                <p class="HotLine">{{$website_configs['phone_donate'] ?? '' }}</p>
                <p>(Donate momo) </p>
              </li>
              <li class="NoBorder"></li>
              <li class="NoBorder"></li>
            </ul>
                <!-- End block Home_Support_Support -->
                    <!-- Begin block Home_Social_AB_Test_Social - MTk1fEhvbWVfU29jaWFsX0FCX1Rlc3R8NTcyfGhvbWV8U29jaWFsfEhUTUw -->
            <div class="Social">
              <ul class="Tab">
                <li class="Active"><a class="Facebook" href="javascript:void(0);" rel="#SocialFb" title="Facebook">Facebook</a></li>
                <li><a class="DienDan" href="javascript:void(0);" rel="#SocialFr" title="Diễn đàn">Diễn đàn</a></li>
              </ul>
              <div class="SocialContent" id="SocialFb" style="display:block">
                <div class="fb-page" 
                  data-href="{{$website_configs['fanpage_url'] ?? ''}}"
                  data-hide-cover="false"
                  data-tabs="timeline"
                  data-height="650px"
                  data-adapt-container-width="true"
                  data-show-facepile="false">
                </div>
              </div>
              <div class="SocialContent" id="SocialFr"></div>
            </div>
            <!-- End block Home_Social_AB_Test_Social -->
          </div>
          <div class="MainContent" id="boxContent">
            <div class="InsideMainContent">
              <div class="WrapperNews">

                            <!-- Begin block news_TinTuc - MTk1ODF8NHxuZXdzfDU3Mnxob21lfFRpblR1Y3xQSFA -->
                <div class="ContentNews">
                  <div id="boxTab" class="BlockNews">
                    <ul class="Tab">
                      <li class='Active'><a class="Tab-1" href="javscript:void(0)" rel="" title="Tin Tức"><span>Tin Tức</span></a></li>
                      {{-- <li><a class="Tab-2" href="javscript:void(0)" rel="#" title="Hướng Dẫn"><span>Hướng Dẫn</span></a></li>
                      <li><a class="Tab-3" href="javscript:void(0)" rel="#" title="Cộng Đồng"><span>Cộng Đồng</span></a></li> --}}
                      <li ><a class="Tab-4" href="javscript:void(0)" rel="#" title=""><span></span></a></li>
                    </ul>
                    <a class="XemThem" title="Xem thêm" href="{{route('cat_posts', 'tin-tuc')}}">Xem thêm</a>
                    <div id="boxTab_1">
                      <ul class="ListNews container" id="MTk1ODF8NHxuZXdzfDU3Mnxob21lfFRpblR1Y3xQSFA">
                        @foreach ($hotPosts as $post)
                            
                          <li class="row">
                              <div class="col-2">
                                <div class="cat-news">

                                  <a href="{{route('cat_posts', $post->category->slug)}}">
                                    {{$post->category->name}}
                                  </a>
                                </div>
                              </div>
                              <div class="col-10 hot-news-title">
                                <a href='{{route('single_post', $post->slug)}}' class="Hot hot-news-title-link" title="{{$post->title}}">
                                  <span class="news-title">{{$post->title}}</span>
                                  <span class="Date news-date">{{$post->published_date}}</span>
                                </a>
                              </div>
                              {{-- <div class="col-1 hot-news-date">
                              </div> --}}
                          </li>
                        @endforeach
                        {{-- <li><a href='javscript:void(0)' class="Hot" title="Trang Bị Huyền Tinh - Sơn Hà Xã Tắc">Trang Bị Huyền Tinh - Sơn Hà Xã Tắc<span class="Date">24-6-2021</span></a></li>
                        <li><a href='javscript:void(0)' class="Hot" title="Trang Bị Hoàng Kim - Tình Nghĩa Giang Hồ">TTrang Bị Hoàng Kim - Tình Nghĩa Giang Hồ<span class="Date">24-6-2021</span></a></li>
                        <li><a href='javscript:void(0)' class="Hot" title="Trang Bị Bạch Kim - Phong Hỏa Liên Thành">Trang Bị Bạch Kim - Phong Hỏa Liên Thành<span class="Date">24-6-2021</span></a></li>
                        <li><a href='javscript:void(0)' class="Hot" title="Nâng Cấp Trang Bị Bạch Kim">Nâng Cấp Trang Bị Bạch Kim<span class="Date">24-6-2021</span></a></li>
                        <li><a href='javscript:void(0)' class="Hot" title="Kỹ Năng 120">Kỹ Năng 120<span class="Date">24-6-2021</span></a></li>
                        <li><a href='javscript:void(0)' class="Hot" title="Nâng Cấp Trang Bị Bạch Kim +6">Nâng Cấp Trang Bị Bạch Kim +6<span class="Date">24-6-2021</span></a></li> --}}
                      </ul>
                      <div class="PagingWrapper">
                        {{$hotPosts->fragment('boxContent')->links('clients.layouts.partials.paginate')}}
                      </div>
                    </div>
                  </div>
                </div>
                    <!-- End block news_TinTuc -->
                            <!-- Begin block event_BannerEvent - MTk1ODN8NDB8ZXZlbnR8NTcyfGhvbWV8QmFubmVyRXZlbnR8UEhQ -->
                <div class="jcarousel-wrapper BannerAd">
                  <a href="#" class="btn-view-more-event" title=""></a>
                  
                  <div class="jcarousel">
                    @if ($hotBanners->count() > 0)
                    <ul>
                      @foreach ($hotBanners as $banner)
                        <li>
                          <a href="{{$banner->link ?? '#'}}" target="_blank" title="{{$banner->title}}">
                            <img width="310" height="230" src="{{$banner->image}}" alt="{{$banner->title}}" />
                          </a>
                        </li>
                      @endforeach
                    </ul>
                    @else
                    <ul>
                      <li>
                        <a href="#" target="_blank" title="VIP">
                          <img width="310" height="230" src="{{asset('clients/asset/images/zingvn/banner/01.png')}}" alt="VIP" />
                        </a>
                      </li>
                      <li>
                        <a href="#" target="_blank" title="VIP">
                          <img width="310" height="230" src="{{asset('clients/asset/images/zingvn/banner/02.png')}}" alt="VIP" />
                        </a>
                      </li>
                      <li>
                        <a href="#" target="_blank" title="VIP">
                          <img width="310" height="230" src="{{asset('clients/asset/images/zingvn/banner/03.png')}}" alt="VIP" />
                        </a>
                      </li>
                      <li>
                        <a href="#" target="_blank" title="VIP">
                          <img width="310" height="230" src="{{asset('clients/asset/images/zingvn/banner/04.png')}}" alt="VIP" />
                        </a>
                      </li>
                      <li>
                        <a href="#" target="_blank" title="VIP">
                          <img width="310" height="230" src="{{asset('clients/asset/images/zingvn/banner/05.png')}}" alt="VIP" />
                        </a>
                      </li>
                      <li>
                        <a href="#" target="_blank" title="VIP">
                          <img width="310" height="230" src="{{asset('clients/asset/images/zingvn/banner/06.png')}}" alt="VIP" />
                        </a>
                      </li>
                      <li>
                        <a href="#" target="_blank" title="VIP">
                          <img width="310" height="230" src="{{asset('clients/asset/images/zingvn/banner/07.png')}}" alt="VIP" />
                        </a>
                      </li>
                      <li>
                        <a href="#" target="_blank" title="VIP">
                          <img width="310" height="230" src="{{asset('clients/asset/images/zingvn/banner/08.png')}}" alt="VIP" />
                        </a>
                      </li>
                      <li>
                        <a href="#" target="_blank" title="VIP">
                          <img width="310" height="230" src="{{asset('clients/asset/images/zingvn/banner/09.png')}}" alt="VIP" />
                        </a>
                      </li>
                      <li>
                        <a href="#" target="_blank" title="VIP">
                          <img width="310" height="230" src="{{asset('clients/asset/images/zingvn/banner/10.png')}}" alt="VIP" />
                        </a>
                      </li>
                      <li>
                        <a href="#" target="_blank" title="VIP">
                          <img width="310" height="230" src="{{asset('clients/asset/images/zingvn/banner/11.png')}}" alt="VIP" />
                        </a>
                      </li>			
                    </ul>
                    @endif
                  </div>
                  <p class="jcarousel-pagination"></p>
                </div>

                  <!-- End block event_BannerEvent -->
                            <!-- Begin block Home_DailyFeatures_DailyFeatures - MTkxfEhvbWVfRGFpbHlGZWF0dXJlc3w1NzJ8aG9tZXxEYWlseUZlYXR1cmVzfEhUTUw -->
                <div class="Daily">
                  <div class="DailyPageControl"> <a href="#" title="Trở về trang trước" class="PrevPage">Trở về trang trước</a>
                    <ul class="NumPage">
                      <li>CN</li>
                      <li>Thứ 2</li>
                      <li>Thứ 3</li>
                      <li>Thứ 4</li>
                      <li>Thứ 5</li>
                      <li>Thứ 6</li>
                      <li>Thứ 7</li>
                    </ul>
                    <a href="#" title="Đến trang tiếp theo" class="NextPage">Đến trang tiếp theo</a> 
                  </div>
                  <div class="DailyPage">
                    <div class="Page scroll-pane" id="page-1">
                      <ul>
                        <li><a href="javascript:void(0);" title=""><span class="Time">Mỗi đầu giờ</span><span class="TitlePage">Phong Lăng Độ</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">Mỗi đầu giờ</span><span class="TitlePage">Vượt ải</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">10h</span><span class="TitlePage">Hoa Sơn Đại Chiến</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">11h-12h</span><span class="TitlePage">Tống Kim</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">12h-12h30</span><span class="TitlePage">Hạt Hoàng Kim</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">12h30</span><span class="TitlePage">Boss Tiểu</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">13h-15h30</span><span class="TitlePage">Phong Hỏa Liên Thành</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">13h-14h</span><span class="TitlePage">Tống Kim</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">15h</span><span class="TitlePage">Hoa Sơn Đại Chiến</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">15h-16h</span><span class="TitlePage">Tống Kim</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">17h-18h</span><span class="TitlePage">Tống Kim</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">19h-21h</span><span class="TitlePage">Hoa Đăng</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">19h30</span><span class="TitlePage">Boss Đại</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">19h-20h</span><span class="TitlePage">Tống Kim</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">19h45-21-45</span><span class="TitlePage">Hoàng Chi Chương</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">21h-22h</span><span class="TitlePage">Tống Kim</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">22h</span><span class="TitlePage">Hoa Sơn Đại Chiến</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">23h-24h</span><span class="TitlePage">Tống Kim</span></a></li>
                      </ul>
                    </div>
                    <div class="Page scroll-pane" id="page-2">
                      <ul>
                        <li><a href="javascript:void(0);" title=""><span class="Time">Mỗi đầu giờ</span><span class="TitlePage">Phong Lăng Độ</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">Mỗi đầu giờ</span><span class="TitlePage">Vượt ải</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">10h</span><span class="TitlePage">Hoa Sơn Đại Chiến</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">11h-12h</span><span class="TitlePage">Tống Kim</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">12h-12h30</span><span class="TitlePage">Hạt Hoàng Kim</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">12h30</span><span class="TitlePage">Boss Tiểu</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">13h-14h</span><span class="TitlePage">Tống Kim</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">15h</span><span class="TitlePage">Hoa Sơn Đại Chiến</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">15h-16h</span><span class="TitlePage">Tống Kim</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">17h-18h</span><span class="TitlePage">Tống Kim</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">19h-21h</span><span class="TitlePage">Hoa Đăng</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">19h30</span><span class="TitlePage">Boss Đại</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">19h-20h</span><span class="TitlePage">Tống Kim</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">19h45-21-45</span><span class="TitlePage">Hoàng Chi Chương</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">21h-22h</span><span class="TitlePage">Tống Kim</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">22h</span><span class="TitlePage">Hoa Sơn Đại Chiến</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">23h-24h</span><span class="TitlePage">Tống Kim</span></a></li>
                      </ul>
                    </div>
                    <div class="Page scroll-pane" id="page-3">
                      <ul>
                        <li><a href="javascript:void(0);" title=""><span class="Time">Mỗi đầu giờ</span><span class="TitlePage">Phong Lăng Độ</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">Mỗi đầu giờ</span><span class="TitlePage">Vượt ải</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">10h</span><span class="TitlePage">Hoa Sơn Đại Chiến</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">11h-12h</span><span class="TitlePage">Tống Kim</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">12h-12h30</span><span class="TitlePage">Hạt Hoàng Kim</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">12h30</span><span class="TitlePage">Boss Tiểu</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">13h-14h</span><span class="TitlePage">Tống Kim</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">15h</span><span class="TitlePage">Hoa Sơn Đại Chiến</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">15h-16h</span><span class="TitlePage">Tống Kim</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">17h-18h</span><span class="TitlePage">Tống Kim</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">19h-21h</span><span class="TitlePage">Hoa Đăng</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">19h30</span><span class="TitlePage">Boss Đại</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">19h-20h</span><span class="TitlePage">Tống Kim</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">19h45-21-45</span><span class="TitlePage">Hoàng Chi Chương</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">21h-22h</span><span class="TitlePage">Tống Kim</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">22h</span><span class="TitlePage">Hoa Sơn Đại Chiến</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">23h-24h</span><span class="TitlePage">Tống Kim</span></a></li>
                      </ul>
                    </div>
                    <div class="Page scroll-pane" id="page-4">
                      <ul>
                        <li><a href="javascript:void(0);" title=""><span class="Time">Mỗi đầu giờ</span><span class="TitlePage">Phong Lăng Độ</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">Mỗi đầu giờ</span><span class="TitlePage">Vượt ải</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">10h</span><span class="TitlePage">Hoa Sơn Đại Chiến</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">11h-12h</span><span class="TitlePage">Tống Kim</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">12h-12h30</span><span class="TitlePage">Hạt Hoàng Kim</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">12h30</span><span class="TitlePage">Boss Tiểu</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">13h-14h</span><span class="TitlePage">Tống Kim</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">15h</span><span class="TitlePage">Hoa Sơn Đại Chiến</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">15h-16h</span><span class="TitlePage">Tống Kim</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">17h-18h</span><span class="TitlePage">Tống Kim</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">19h-21h</span><span class="TitlePage">Hoa Đăng</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">19h30</span><span class="TitlePage">Boss Đại</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">19h-20h</span><span class="TitlePage">Tống Kim</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">19h45-21-45</span><span class="TitlePage">Hoàng Chi Chương</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">21h-22h</span><span class="TitlePage">Tống Kim</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">22h</span><span class="TitlePage">Hoa Sơn Đại Chiến</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">23h-24h</span><span class="TitlePage">Tống Kim</span></a></li>
                      </ul>
                    </div>
                    <div class="Page scroll-pane" id="page-5">
                      <ul>
                        <li><a href="javascript:void(0);" title=""><span class="Time">Mỗi đầu giờ</span><span class="TitlePage">Phong Lăng Độ</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">Mỗi đầu giờ</span><span class="TitlePage">Vượt ải</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">10h</span><span class="TitlePage">Hoa Sơn Đại Chiến</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">11h-12h</span><span class="TitlePage">Tống Kim</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">12h-12h30</span><span class="TitlePage">Hạt Hoàng Kim</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">12h30</span><span class="TitlePage">Boss Tiểu</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">13h-14h</span><span class="TitlePage">Tống Kim</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">15h</span><span class="TitlePage">Hoa Sơn Đại Chiến</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">15h-16h</span><span class="TitlePage">Tống Kim</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">17h-18h</span><span class="TitlePage">Tống Kim</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">19h-21h</span><span class="TitlePage">Hoa Đăng</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">19h30</span><span class="TitlePage">Boss Đại</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">19h-20h</span><span class="TitlePage">Tống Kim</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">19h45-21-45</span><span class="TitlePage">Hoàng Chi Chương</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">21h-22h</span><span class="TitlePage">Tống Kim</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">22h</span><span class="TitlePage">Hoa Sơn Đại Chiến</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">23h-24h</span><span class="TitlePage">Tống Kim</span></a></li>
                      </ul>
                    </div>
                    <div class="Page scroll-pane" id="page-6">
                      <ul>
                        <li><a href="javascript:void(0);" title=""><span class="Time">Mỗi đầu giờ</span><span class="TitlePage">Phong Lăng Độ</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">Mỗi đầu giờ</span><span class="TitlePage">Vượt ải</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">10h</span><span class="TitlePage">Hoa Sơn Đại Chiến</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">11h-12h</span><span class="TitlePage">Tống Kim</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">12h-12h30</span><span class="TitlePage">Hạt Hoàng Kim</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">12h30</span><span class="TitlePage">Boss Tiểu</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">13h-14h</span><span class="TitlePage">Tống Kim</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">15h</span><span class="TitlePage">Hoa Sơn Đại Chiến</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">15h-16h</span><span class="TitlePage">Tống Kim</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">17h-18h</span><span class="TitlePage">Tống Kim</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">18h-21h30</span><span class="TitlePage">Thất Thành Đại Chiến</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">19h-21h</span><span class="TitlePage">Hoa Đăng</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">19h30</span><span class="TitlePage">Boss Đại</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">19h-20h</span><span class="TitlePage">Tống Kim</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">19h45-21-45</span><span class="TitlePage">Hoàng Chi Chương</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">21h-22h</span><span class="TitlePage">Tống Kim</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">22h</span><span class="TitlePage">Hoa Sơn Đại Chiến</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">23h-24h</span><span class="TitlePage">Tống Kim</span></a></li>
                      </ul>
                    </div>
                    <div class="Page scroll-pane" id="page-7">
                      <ul>
                        <li><a href="javascript:void(0);" title=""><span class="Time">Mỗi đầu giờ</span><span class="TitlePage">Phong Lăng Độ</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">Mỗi đầu giờ</span><span class="TitlePage">Vượt ải</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">10h</span><span class="TitlePage">Hoa Sơn Đại Chiến</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">11h-12h</span><span class="TitlePage">Tống Kim</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">12h-12h30</span><span class="TitlePage">Hạt Hoàng Kim</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">12h30</span><span class="TitlePage">Boss Tiểu</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">13h-15h30</span><span class="TitlePage">Phong Hỏa Liên Thành</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">13h-14h</span><span class="TitlePage">Tống Kim</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">15h</span><span class="TitlePage">Hoa Sơn Đại Chiến</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">15h-16h</span><span class="TitlePage">Tống Kim</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">17h-18h</span><span class="TitlePage">Tống Kim</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">19h-21h</span><span class="TitlePage">Hoa Đăng</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">19h30</span><span class="TitlePage">Boss Đại</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">19h-20h</span><span class="TitlePage">Tống Kim</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">19h45-21-45</span><span class="TitlePage">Hoàng Chi Chương</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">21h-22h</span><span class="TitlePage">Tống Kim</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">22h</span><span class="TitlePage">Hoa Sơn Đại Chiến</span></a></li>
                        <li><a href="javascript:void(0);" title=""><span class="Time">23h-24h</span><span class="TitlePage">Tống Kim</span></a></li>
                      </ul>
                    </div>
                  </div>
                </div>
                  <!-- End block Home_DailyFeatures_DailyFeatures -->

                            <!-- Begin block Home_ButtonFeatures_ButtonFeatures - MTYzfEhvbWVfQnV0dG9uRmVhdHVyZXN8NTcyfGhvbWV8QnV0dG9uRmVhdHVyZXN8SFRNTA -->
                <ul class="BlockButtonTinhNang">
                  <li><a class="BtnTN-1" href="http://localhost/index.php/cam-nang-2" title="Cẩm nang">Cẩm nang</a></li>
                  <li><a class="BtnTN-2" href="javascript:void(0);" title="Trang bị & Vật phẩm">Trang bị & Vật phẩm</a></li>
                  <li><a class="BtnTN-3" href="javascript:void(0);" title="Tính năng">Tính năng</a></li>
                  <li><a class="BtnTN-4" href="javascript:void(0);" title="Top cao thủ">Top cao thủ</a></li>
                </ul>
                  <!-- End block Home_ButtonFeatures_ButtonFeatures -->
              </div>
            </div>
          </div>
                <!-- Begin block Home_Sectarian_Sectarian - MTg3fEhvbWVfU2VjdGFyaWFufDU3Mnxob21lfFNlY3RhcmlhbnxIVE1M -->
          <div class="flipster">
            <ul>
              <li>
                <a href="javascript:void(0)" class="Button Block"><img src="{{asset('clients/asset/images/zingvn/skin/cf-11.jpg')}}" alt=""/></a>
                <a href="javascript:void(0)" class="ReadMore">[Xem chi tiết]</a>
              </li>
              <li>
                <a href="javascript:void(0)" class="Button Block"><img src="{{asset('clients/asset/images/zingvn/skin/cf-1.jpg')}}" alt=""/></a>
                <a href="javascript:void(0)" class="ReadMore">[Xem chi tiết]</a>
              </li>
              <li>
                <a href="javascript:void(0)" class="Button Block"><img src="{{asset('clients/asset/images/zingvn/skin/cf-2.jpg')}}" alt=""/></a>
                <a href="javascript:void(0)" class="ReadMore">[Xem chi tiết]</a>
              </li>
              <li>
                <a href="javascript:void(0)" class="Button Block"><img src="{{asset('clients/asset/images/zingvn/skin/cf-3.jpg')}}" alt=""/></a>
                <a href="javascript:void(0)" class="ReadMore">[Xem chi tiết]</a>
              </li>
              <li>
                <a href="javascript:void(0)" class="Button Block"><img src="{{asset('clients/asset/images/zingvn/skin/cf-4.jpg')}}" alt=""/></a>
                <a href="javascript:void(0)" class="ReadMore">[Xem chi tiết]</a>
              </li>
              <li>
                <a href="javascript:void(0)" class="Button Block"><img src="{{asset('clients/asset/images/zingvn/skin/cf-5.jpg')}}" alt=""/></a>
                <a href="javascript:void(0)" class="ReadMore">[Xem chi tiết]</a>
              </li>
              <li>
                <a href="javascript:void(0)" class="Button Block"><img src="{{asset('clients/asset/images/zingvn/skin/cf-6.jpg')}}" alt=""/></a>
                <a href="javascript:void(0)" class="ReadMore">[Xem chi tiết]</a>
              </li>
              <li>
                <a href="javascript:void(0)" class="Button Block"><img src="{{asset('clients/asset/images/zingvn/skin/cf-7.jpg')}}" alt=""/></a>
                <a href="javascript:void(0)" class="ReadMore">[Xem chi tiết]</a>
              </li>
              <li>
                <a href="javascript:void(0)" class="Button Block"><img src="{{asset('clients/asset/images/zingvn/skin/cf-8.jpg')}}" alt=""/></a>
                <a href="javascript:void(0)" class="ReadMore">[Xem chi tiết]</a>
              </li>
              <li>
                <a href="javascript:void(0)" class="Button Block"><img src="{{asset('clients/asset/images/zingvn/skin/cf-9.jpg')}}" alt=""/></a>
                <a href="javascript:void(0)" class="ReadMore">[Xem chi tiết]</a>
              </li>
              <li>
                <a href="javascript:void(0)" class="Button Block"><img src="{{asset('clients/asset/images/zingvn/skin/cf-10.jpg')}}" alt=""/></a>
                <a href="javascript:void(0)" class="ReadMore">[Xem chi tiết]</a>
              </li>
            </ul>
          </div>
          <!-- End block Home_Sectarian_Sectarian -->
        </div>
      </div>
        <!-- Begin block Main_Footer_MainFooter - MTkyfE1haW5fRm9vdGVyfDU3Mnxob21lfE1haW5Gb290ZXJ8SFRNTA -->
      <div id="footer">
        <div id="footerWrapper">
          <div id="footerWrapper">
            <p>• Bản quyền thuộc về KingSoft. Độc quyền phát hành tại Việt Nam bởi VNG.<br>
              • <font color=red>Lưu ý : Chúng tôi không phải nhà phát hành chính thức - cân nhắc trước khi tham gia Game.</font>
            </p>
          </div>
        </div>
          <!-- End block Main_Footer_MainFooter -->
      </div>
    </div>
  </div>

  <!-- <script type="text/javascript" src="asset/js/zingvn/call-topbar-zone-jx1.js"></script>  -->

  <script type="text/javascript" src="{{asset('clients/asset/js/zingvn/jx1-index-2015-01-15.js')}}"></script> 
  <script type="text/javascript" src="{{asset('clients/asset/js/zingvn/boxnews.js')}}"></script> 
  <script type="text/javascript">
    var SITE_URL = "http://192.168.1.200";
    var IMG_URL = "http://img.zing.vn/volamthuphi";
    var activemenu_nav = "menu1_0_0";
  </script>
    <!-- Begin block banner_banner-adv-center - MTk1ODl8MTgyfGJhbm5lcnw1NzJ8aG9tZXxiYW5uZXItYWR2LWNlbnRlcnxQSFA -->    
  <div id="thewindowbackground"></div>
  <div id="bannerPopup"></div>
    <!-- End block banner_banner-adv-center -->
    <!-- Begin block banner_banner-adv-bottom - MTk1ODh8MTgyfGJhbm5lcnw1NzJ8aG9tZXxiYW5uZXItYWR2LWJvdHRvbXxQSFA -->    
  <div id="bannerPopupBottom" class="fixedBanner"></div>
    <!-- End block banner_banner-adv-bottom -->
  <!-- <div id="advTopBar1_temp" style="z-index: 1000; display: none; left: 141.5px; top: 70px;"> 
    <script type="text/javascript">
      objAds.showBannerTopBar1();
    </script> 
  </div>
  <div id="ad_zone_2954_temp" style="z-index: 100; display: none; left: 141.5px; top: 70px;"> 
    <script type="text/javascript">
      objAds.showAdsBanner("ad_zone_2954");
    </script> 
  </div> -->

  <!-- <script type="text/javascript" src="asset/js/zingvn/socialPlugin-vr3.js"></script>  -->

  <div id="spot-im-root"></div>
</body>

</html>
