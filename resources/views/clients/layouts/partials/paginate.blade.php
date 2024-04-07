
@if ($paginator->hasPages())
  <div class="PagingControl">
    <div class="CenterWrapper">
      @if ($paginator->onFirstPage())
        {{-- <span class="PagingFirstPageLnk">Trở về trang đầu tiên</span> --}}
        <span class="PagingPrevPageLnk">Trở về trang trước</span>
      @else
        {{-- <a href="{{ \Request::url().'?page=1'}}" class="PagingFirstPageLnk">Trở về trang đầu tiên</a> --}}
        <a href="{{ $paginator->previousPageUrl()}}" class="PagingPrevPageLnk">Trở về trang trước</a>
      @endif
      <ul class="PageList">

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
          {{-- "Three Dots" Separator --}}
          @if (is_string($element))
            <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
          @endif
          {{-- Array Of Links --}}
          @if (is_array($element))
            @foreach ($element as $page => $url)
              @if ($page == $paginator->currentPage())
                <li><span>{{ $page }}</span></li>
              @else
                <li><a class="PagingLinkNews" href="{{ $url }}">{{ $page }}</a></li>
              @endif
            @endforeach
          @endif
        @endforeach
        
      </ul>
      @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}" title="Đến trang tiếp theo" class="PagingNextPageLnk PagingLinkNews" >Đến trang tiếp theo</a>
        {{-- <a href="{{ \Request::url().'?page='.$paginator->lastPage() }}" title="Đến trang cuối cùng" class="PagingLastPageLnk PagingLinkNews" >Đến trang cuối cùng</a> --}}
      @else
        <span class="PagingNextPageLnk PagingLinkNews" >Đến trang tiếp theo</span>
        {{-- <span class="PagingLastPageLnk PagingLinkNews" >Đến trang cuối cùng</span> --}}
      @endif
      
    </div>
  </div>
@endif

{{-- end thinhld --}}


