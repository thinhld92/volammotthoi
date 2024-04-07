@extends('backend.layouts.master')

@section('content')
<div class="card">
  <div class="card-header">
    <form class="input-group input-group-merge">
      <span class="input-group-text" id="basic-addon-search31"><i class="ti ti-search"></i></span>
      <input
        type="search"
        class="form-control"
        placeholder="Search..."
        aria-label="Search..."
        aria-describedby="basic-addon-search31"
        name="search"
        value="{{ $search ?? '' }}"
      />
    </form>
    
  </div>
  <div class="table-responsive text-nowrap">
    <table class="table table-hover">
      <thead>
        <tr>
          <th>#</th>
          <th>Title</th>
          <th class="thumbnail">Image</th>
          <th>Link</th>
          <th class="banner-type">Type</th>
          <th class="actions">Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @if ($banners->count())
          @foreach ($banners as $banner)
            <tr>
              <td>{{$banner->id}}</td>
              <td>
                {{ $banner->title }}
              </td>
              <td>
                <div class="avatar avatar-xl">
                  <img src="{{ $banner->image }}" alt="{{ $banner->title }}">
                </div>
              </td>
              <td>{{ $banner->link }}</td>
              <td>
                <span class="badge bg-label-primary">{{$banner->type_name}}</span>
              </td>
              <td>
                <div class="d-flex align-items-sm-center justify-content-sm-center">
                  <a href="{{route('admin.banners.edit', $banner->id)}}" class="btn btn-icon"><i class="fa fa-pencil"></i></a>
                  <a href="" class="btn btn-icon delete-record me-2" onclick="submitFormDelete(event, {{$banner->id}})">
                    <form 
                      id="form-delete-{{$banner->id}}" 
                      action="{{route('admin.banners.destroy', $banner)}}" 
                      method="post"
                    >
                      @csrf
                      @method('DELETE')
                    </form>
                    <i class="fa fa-trash"></i> 
                  </a>
                </div>
              </td>
            </tr>
          @endforeach
        @else
         <tr>
          <td colspan="5">Không có bản ghi nào được tìm thấy</td>
         </tr>
        @endif
      </tbody>
    </table>
  </div>
</div>
<div class="pt-3">
  {{-- {{ $categories->links() }} --}}
</div>
<form id="form-sort-categories-order" action="{{ route('admin.categories.sort-order') }}" method="POST" class="d-none">
  @csrf
  <input type="hidden" name="sort_order" id="input-sort-order">
</form>
@endsection

@section('script')
  <script>
    function submitFormDelete(event, id) {
      event.preventDefault();
      document.getElementById('form-delete-' + id).submit();
    }
  </script>
@endsection