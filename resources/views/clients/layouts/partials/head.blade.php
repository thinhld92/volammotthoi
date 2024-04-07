<head>
  <meta http-equiv="Content-Type" type="image/x-icon" content="text/html; charset=utf-8" />
  <meta name="robots" content="index,follow" />
  <meta name="revisit-after" content="1days" />
  <title>{{$title ?? getWebsiteConfig('site_title') ?? env('APP_NAME')}}</title>
  <meta name="description" content="Cập nhật ngay những thông tin nóng hổi từ chiến trường các giải đấu danh giá của VLTK!"/>
  <meta name="keywords" content="vo lam truyen ky, vo lam, vltk, game online, download game, tai game, choi game online, son ha xa tac, choi game mien phi, tai game mien phi, download game free"/>
  <link rel="shortcut icon" href="{{getWebsiteConfig('site_icon') ?? asset('clients/asset/images/icon.ico')}}"/>
  <meta property="og:url"           content="{{request()->url()}}" />
  <meta property="og:type"          content="website" />
  <meta property="og:title"         content="{{$title ?? getWebsiteConfig('site_title') ?? env('APP_NAME')}}" />
  <meta property="og:description"   content="{{$description ?? getWebsiteConfig('site_description') ?? 'Đắm mình vào sự trở lại đầy ngoạn mục của loạt giải đấu máu lửa Hùng Bá Thiên Hạ, Thống Nhất Giang Sơn, Hoàng Đồ Bá Nghiệp của VLTK!'}}" />
  <meta property="og:image"         content="{{asset($image ?? getWebsiteConfig('site_image'))}}" />

{{-- end meta --}}

  
  <link type="text/css" rel="stylesheet" href="{{asset('clients/asset/css/zingvn/mainsite.css')}}"/>
  <!-- htmld2p:REFERENCE -->
  <!-- htmld2p:END. REFERENCE -->
  <!-- htmld2p:CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <link type="text/css" rel="stylesheet" href="{{asset('clients/asset/css/zingvn/style-2015-03-18.css')}}" />
  <link type="text/css" rel="stylesheet" href="{{asset('clients/asset/css/zingvn/sub.css')}}" />
  <link type="text/css" rel="stylesheet" href="{{asset('clients/asset/css/zingvn/content.css')}}?ver=2" />
  <link type="text/css" rel="stylesheet" href="{{asset('clients/asset/css/zingvn/j-navigation.css')}}" />
  <link type="text/css" rel="stylesheet" href="{{asset('clients/asset/css/zingvn/detailnews.css')}}" />
  <link type="text/css" rel="stylesheet" href="{{asset('clients/asset/css/zingvn/listnews.css')}}" />
  <link type="text/css" rel="stylesheet" href="{{asset('clients/asset/css/zingvn/datepicker.css')}}" />
  <link type="text/css" rel="stylesheet" href="{{asset('clients/asset/css/zingvn/search.css')}}" />
  <link rel="stylesheet" type="text/css" href="{{asset('clients/asset/css/zingvn/listevent.css')}}" />
  <link rel="stylesheet" type="text/css" href="{{asset('clients/asset/css/zingvn/camnang.css')}}" />
  <link type="text/css" rel="stylesheet" href="{{asset('clients/asset/css/zingvn/trang-bi.css')}}">
  <link type="text/css" rel="stylesheet" href="{{asset('clients/asset/css/zingvn/rebuilt-style.css')}}">
  @include('mylib.fontawesome')
  <link type="text/css" rel="stylesheet" href="{{asset('clients/asset/css/content-styles.css')}}">
  <link type="text/css" rel="stylesheet" href="{{asset('clients/asset/css/custom.css')}}">
  <!-- htmld2p:END. CSS -->
</head>