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
          <th class="status">Status</th>
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
                @php
                  if ($post->status == 1) {
                    $checked = "checked";
                  }else{
                    $checked = "";
                  }
                @endphp
                <label class="switch switch-success">
                  <input type="checkbox" 
                    class="switch-input status-checkbox" 
                    id="status-checkbox-{{$post->id}}"
                    {{$checked}}
                    data-id="{{$post->id}}" 
                    data-status="{{$post->status}}"
                  />
                  <span class="switch-toggle-slider"></span>
                </label>
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

    // Đăng ký sự kiện khi trang đã tải xong
document.addEventListener('DOMContentLoaded', function() {
  // Thêm event listener cho tất cả các checkbox status
  const statusCheckboxes = document.querySelectorAll('.status-checkbox');
  statusCheckboxes.forEach(checkbox => {
    checkbox.addEventListener('change', function(e) {
      const id = this.getAttribute('data-id');
      const currentStatus = this.checked ? 1 : 0;
      
      
      // Lưu trạng thái trước đó để có thể khôi phục nếu API thất bại
      const previousCheckedState = !this.checked;
      
      updatePostStatus(id, currentStatus, this);
    });
  });
});

function updatePostStatus(id, status, checkboxElement) {
  // Lấy token CSRF
  const token = $("input[name='_token']").val();
  
  const formData = new FormData();
  formData.append('id', id);
  formData.append('status', status);
  formData.append('_token', token);
  
  // Hiển thị loading indicator (tùy chọn)
  checkboxElement.disabled = true;
  
  fetch("{{route('admin.posts.update-status')}}", {
    method: 'POST',
    body: formData
  })
  .then(response => {
    if (!response.ok) {
      throw new Error('Network response was not ok');
    }
    return response.json();
  })
  .then(data => {
    // Xử lý phản hồi thành công
    console.log("Success:", data);
    
    // Cập nhật thuộc tính data-status
    checkboxElement.setAttribute('data-status', data.newStatus);
    
    // Hiển thị thông báo (tùy chọn)
    if (data.status === "success") {
      // Sử dụng thông báo nổi hoặc toast notification (nếu có)
      // toast.success(data.message || 'Status updated successfully');
    }
  })
  .catch(error => {
    // Xử lý lỗi - đảo ngược trạng thái checkbox
    console.error("Error:", error);
    checkboxElement.checked = !checkboxElement.checked;
    
    // Hiển thị thông báo lỗi (tùy chọn)
    // toast.error('Failed to update status');
  })
  .finally(() => {
    // Bỏ trạng thái loading
    checkboxElement.disabled = false;
  });
}
  </script>
@endsection