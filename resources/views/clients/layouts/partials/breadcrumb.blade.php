<div class="StaticTopPanel">
  <img src="{{asset('clients/asset/images/zingvn/skin/icon-header-tintuc.png')}}"/>
  <h2 class="TitleMain">{{$title ?? ""}}</h2>
  <ul id="breadcrumbs">
    <li itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
      <a href="{{route('home')}}" title="Trang chủ" itemprop="url"><span itemprop="title">Trang Chủ</span>
      </a>
      <span>>&nbsp;</span>
    </li>
    @if (isset($category))
      <li class="active"><a class="TabCateNews" href="{{route('cat_posts', $category->slug)}}" rel="Tin Tức" title="{{$category->name}}"> {{$category->name}}</a></li>
    @endif
  </ul>
</div>