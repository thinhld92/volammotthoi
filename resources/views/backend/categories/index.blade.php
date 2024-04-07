@extends('backend.layouts.master')

@section('content')
<div class="card">
  <div class="card-header">
    <div class="d-flex justify-content-between flex-wrap gap-3">
      <h5>{{__('Category list')}}</h5>
      <button class="btn-primary btn-sm mb-2" id="update-order-btn">
        Cập nhật thứ tự
      </button>
    </div>
    {{-- <form class="input-group input-group-merge">
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
    </form> --}}
    
  </div>
  <div class="table-responsive text-nowrap">
    <table class="table table-hover">
      <thead>
        <tr>
          <th>Name</th>
          <th>Description</th>
          <th class="thumbnail">Thumbnail</th>
          <th>Slug</th>
          <th class="text-nowrap text-sm-end order">Order</th>
          <th class="actions">Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @if ($categories->count())
          @foreach ($categories as $category)
            <tr>
              <td>{{str_repeat('--/', $category->level) }}{{ $category->name }}</td>
              <td>
                {{ $category->description }}
              </td>
              <td>
                <div class="avatar avatar-xl">
                  <img src="{{ $category->photo }}" alt="{{ $category->name }}">
                </div>
              </td>
              <td>{{ $category->slug }}</td>
              <td class="h6 mb-0 text-sm-center">
                <input 
                  type="number" 
                  class="form-control category-sort-order" 
                  data-id={{$category->id}} 
                  value="{{ $category->sort_order }}" 
                  min="0"
                >
              </td>
              <td>
                <div class="d-flex align-items-sm-center justify-content-sm-center">
                  <a href="{{route('admin.categories.edit', $category->id)}}" class="btn btn-icon"><i class="fa fa-pencil"></i></a>
                  <a href="" class="btn btn-icon delete-record me-2" onclick="submitFormDelete(event, {{$category->id}})">
                    <form 
                      id="form-delete-{{$category->id}}" 
                      action="{{route('admin.categories.destroy', $category)}}" 
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
  <script src="{{asset('backend/custom/js/categories-index.js')}}"></script>
  <script>
    function submitFormDelete(event, id) {
      event.preventDefault();
      document.getElementById('form-delete-' + id).submit();
    }
  </script>
@endsection