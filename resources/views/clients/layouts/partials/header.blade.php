<div id="header">
  <!-- Begin block Sub_DownloadGame_DownloadGame - MTkwfFN1Yl9Eb3dubG9hZEdhbWV8NTU5fHRpbi10dWN8RG93bmxvYWRHYW1lfEhUTUw -->
<div id="download">
<a class="SetUp" href="{{$website_configs['download_link']}}" title="Cài đặt ngay" >Cài đặt ngay</a>
<a href="{{route('register')}}" target="_blank" class="Register Dangky" title="Đăng ký nhanh">Đăng ký nhanh</a>
<a class="NapThe" href="{{route('hotro.payments.create')}}" title="Nạp thẻ" >Nạp thẻ</a>
</div>
<!-- End block Sub_DownloadGame_DownloadGame -->
  <!-- Begin block Main_Navigation_MainNavigation - MTU1fE1haW5fTmF2aWdhdGlvbnw1NTl8dGluLXR1Y3xNYWluTmF2aWdhdGlvbnxIVE1M -->
<a class="Logo" href="{{route('home')}}" title="Trở về trang chủ Võ Lâm Truyền Kỳ">Trở về trang chủ Võ Lâm Truyền Kỳ</a>
<div id="boxNav">
<ul id="nav">
  <li class="{{(request()->is('home')) ? 'Hilite' : ''}}"><a class="Nav-1" href="{{route('home')}}" title="Trang chủ">Trang chủ<span>icon</span></a></li>
@foreach ($commonData['main_menus'] as $menu)
  <li class="{{(request()->is('categories/'.$menu->slug)) ? 'Hilite' : ''}}">
    <a class="Nav-{{++$loop->iteration}}" href="{{route('cat_posts', $menu->slug)}}" title="{{$menu->name}}">{{$menu->name}}
      <span>icon</span>
    </a>
  </li>
@endforeach

{{-- <li><a class="Nav-2" href="http://localhost/tin-tuc.html" title="Tin tức">Tin tức<span>icon</span></a></li>
<li><a class="Nav-3" href="http://localhost/su-kien.html" title="Sự kiện">Sự kiện<span>icon</span></a></li>
<li><a class="Nav-4" href="" title="Cẩm nang">Cẩm nang<span>icon</span></a></li> --}}
<li><a class="Nav-5" href="{{route('hotro.dashboard')}}" title="Hỗ trợ" target="_blank">Hỗ trợ<span>icon</span></a></li>
<li><a class="Nav-6" href="{{$website_configs['fanpage_url']}}" title="Fanpage" target="_blank">Fanpage<span>icon</span></a></li>
</ul>
</div>
<!-- End block Main_Navigation_MainNavigation -->
</div>