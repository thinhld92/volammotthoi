@extends('backend.layouts.master')

@section('content')
<div class="card">
  <div class="card-header d-flex justify-content-between align-items-center">
    <h5 class="mb-0 text-uppercase">Lịch sử thay đổi thông tin người dùng</h5>
  </div>

  <div class="card-body border-top">
    <form class="input-group input-group-merge mb-3" method="GET" action="{{ route('admin.user-audit-logs.index') }}">
      <span class="input-group-text" id="basic-addon-search31"><i class="ti ti-search"></i></span>
      <input
        type="search"
        class="form-control"
        placeholder="Tìm kiếm tài khoản, IP..."
        aria-label="Search..."
        name="keyword"
        value="{{ request('keyword') }}"
      />
      <select name="action_type" class="form-select" style="max-width: 200px;">
        <option value="">-- Tất cả hành động --</option>
        <option value="change_password" {{ request('action_type') == 'change_password' ? 'selected' : '' }}>Đổi mật khẩu</option>
        <option value="change_secpassword" {{ request('action_type') == 'change_secpassword' ? 'selected' : '' }}>Đổi mật khẩu cấp 2</option>
        <option value="change_email" {{ request('action_type') == 'change_email' ? 'selected' : '' }}>Đổi Email</option>
        <option value="change_phone" {{ request('action_type') == 'change_phone' ? 'selected' : '' }}>Đổi SĐT</option>
        <option value="change_realname" {{ request('action_type') == 'change_realname' ? 'selected' : '' }}>Đổi Tên thật</option>
        <option value="change_idnum" {{ request('action_type') == 'change_idnum' ? 'selected' : '' }}>Đổi CCCD</option>
      </select>
      <button type="submit" class="btn btn-outline-primary">Lọc</button>
    </form>

    <div class="table-responsive text-nowrap">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>#</th>
            <th>Tài khoản</th>
            <th>Hành động</th>
            <th>Giá trị cũ</th>
            <th>Giá trị mới</th>
            <th>IP</th>
            <th>Thời gian</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          @if ($logs->count())
            @foreach ($logs as $index => $item)
              <tr>
                <td>{{ $logs->firstItem() + $index }}</td>
                <td>
                  <span class="fw-bold text-primary">{{ $item->cAccName }}</span>
                </td>
                <td>
                  @php
                      $actionLabel = $item->action_type;
                      switch ($item->action_type) {
                          case 'change_password': $actionLabel = '<span class="badge bg-warning">Đổi mật khẩu</span>'; break;
                          case 'change_secpassword': $actionLabel = '<span class="badge bg-danger">Đổi MK cấp 2</span>'; break;
                          case 'change_email': $actionLabel = '<span class="badge bg-info">Đổi Email</span>'; break;
                          case 'change_phone': $actionLabel = '<span class="badge bg-success">Đổi SĐT</span>'; break;
                          case 'change_realname': $actionLabel = '<span class="badge bg-secondary">Đổi Tên</span>'; break;
                          case 'change_idnum': $actionLabel = '<span class="badge bg-dark">Đổi CCCD</span>'; break;
                      }
                  @endphp
                  {!! $actionLabel !!}
                </td>
                <td>{{ $item->old_value }}</td>
                <td>{{ $item->new_value }}</td>
                <td>{{ $item->ip_address }}</td>
                <td>{{ $item->created_at ? $item->created_at->format('d/m/Y H:i:s') : '' }}</td>
              </tr>
            @endforeach
          @else
            <tr>
              <td colspan="7" class="text-center py-4">Không có nhật ký nào.</td>
            </tr>
          @endif
        </tbody>
      </table>
    </div>

    <div class="pt-3">
      {{ $logs->links() }}
    </div>
  </div>
</div>
@endsection
