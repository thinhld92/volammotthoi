@extends('backend.layouts.master')

@section('content')
<div class="card">
  <div class="card-header d-flex justify-content-between align-items-center">
    <h5 class="mb-0 text-uppercase">Danh Sách IP Đen (IP Blacklist)</h5>
    <a href="{{ route('admin.ip-blacklists.create') }}" class="btn btn-primary">
      <i class="fa fa-plus me-1"></i> Thêm IP Đen
    </a>
  </div>

  <div class="card-body border-top">
    @if (session('success'))
      <div class="alert alert-success alert-dismissible" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    <form class="input-group input-group-merge mb-3" method="GET" action="{{ route('admin.ip-blacklists.index') }}">
      <span class="input-group-text" id="basic-addon-search31"><i class="ti ti-search"></i></span>
      <input
        type="search"
        class="form-control"
        placeholder="Tìm kiếm IP hoặc lý do..."
        aria-label="Search..."
        name="search"
        value="{{ $search ?? '' }}"
      />
      <button type="submit" class="btn btn-outline-primary">Tìm kiếm</button>
    </form>

    <div class="table-responsive text-nowrap">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>#</th>
            <th>Địa chỉ IP</th>
            <th>Lý do chặn</th>
            <th>Ngày tạo</th>
            <th class="text-center">Thao tác</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          @if ($blacklists->count())
            @foreach ($blacklists as $index => $item)
              <tr>
                <td>{{ $blacklists->firstItem() + $index }}</td>
                <td>
                  <span class="fw-bold text-danger">{{ $item->ip }}</span>
                </td>
                <td>{{ $item->reason ?? 'Không có lý do' }}</td>
                <td>{{ $item->created_at ? $item->created_at->format('d/m/Y H:i') : '' }}</td>
                <td class="text-center">
                  <form 
                    id="form-delete-{{ $item->id }}" 
                    action="{{ route('admin.ip-blacklists.destroy', $item) }}" 
                    method="POST" 
                    class="d-inline-block"
                  >
                    @csrf
                    @method('DELETE')
                    <button 
                      type="button" 
                      class="btn btn-sm btn-danger me-1" 
                      title="Xóa IP khỏi danh sách đen"
                      onclick="confirmDelete(event, {{ $item->id }}, '{{ $item->ip }}')"
                    >
                      <i class="fa fa-trash me-1"></i> Xóa
                    </button>
                  </form>
                </td>
              </tr>
            @endforeach
          @else
            <tr>
              <td colspan="5" class="text-center py-4">Không tìm thấy địa chỉ IP nào trong danh sách đen.</td>
            </tr>
          @endif
        </tbody>
      </table>
    </div>

    <div class="pt-3">
      {{ $blacklists->links() }}
    </div>
  </div>
</div>
@endsection

@section('script')
<script>
  function confirmDelete(event, id, ip) {
    event.preventDefault();
    if (confirm('Bạn có chắc chắn muốn xóa IP ' + ip + ' khỏi danh sách đen không?')) {
      document.getElementById('form-delete-' + id).submit();
    }
  }
</script>
@endsection
