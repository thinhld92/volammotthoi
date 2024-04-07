<div class="search">
  <form method="get" action="{{route('search')}}" class="search__form" id="search__form">
    <input type="text" name="search" placeholder="Nhập từ khóa cần tìm" class="search__field" value="{{$search ?? ''}}">         
    <input type="submit" value="Tìm Kiếm" class="search__button">
  </form>
</div>