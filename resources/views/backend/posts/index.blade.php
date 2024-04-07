@extends('backend.layouts.master')

@section('content')
<div class="card">
  <div class="card-header">
    <h5>{{__('Post list')}}</h5>
    
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
  <div class="table-responsive">
    <table class="table table-hover">
      <thead>
        <tr>
          <th>#</th>
          <th>Title</th>
          <th>Description</th>
          <th class="thumbnail">Thumbnail</th>
          <th class="actions">Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @if ($posts->count())
          @foreach ($posts as $post)
            <tr>
              <td>{{$post->id}}</td>
              <td>{{$post->title}}</td>
              <td>
                {{ $post->description }}
              </td>
              <td>
                <div class="avatar avatar-xl">
                  <img src="{{ $post->thumbnail }}" alt="{{ $post->title }}">
                </div>
              </td>
              <td>
                <div class="d-flex align-items-sm-center justify-content-sm-center">
                  <a href="{{route('admin.posts.edit', $post->id)}}" class="btn btn-icon"><i class="fa fa-pencil"></i></a>
                  <a href="" class="btn btn-icon delete-record me-2" onclick="submitFormDelete(event, {{$post->id}})">
                    <form 
                      id="form-delete-{{$post->id}}" 
                      action="{{route('admin.posts.destroy', $post)}}" 
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
  {{ $posts->links() }}
</div>

@endsection

@section('script')
  <script>
    function submitFormDelete(event, id) {
      event.preventDefault();
      document.getElementById('form-delete-' + id).submit();
    }
  </script>
@endsection