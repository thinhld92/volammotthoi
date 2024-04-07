@if ($sub_menu->childrenCategories->count())
  <li class="nk-drop-item"><a href="{{route('cat_posts', $menu->slug)}}">{{$sub_menu->name}}</a>
    <ul class="dropdown">
      @foreach ($sub_menu->childrenCategories as $item)
        @include('frontend.layouts.partials.subnav', ['sub_menu' => $item])
      @endforeach
    </ul>
  </li>
@else
  <li><a href="{{route('cat_posts', $menu->slug)}}">{{$sub_menu->name}}</a></li>
@endif