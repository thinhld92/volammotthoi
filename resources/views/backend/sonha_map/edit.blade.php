@extends('backend.layouts.master')

@section('content')
<div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
  <div>
    <h4 class="fw-bold mb-1">
      <i class="fa-solid fa-map-location-dot text-success me-2"></i>Cấu Hình Bản Đồ Sơn Hà Xã Tắc (Giao Diện V5)
    </h4>
    <p class="text-muted small mb-0">
      Chỉnh sửa trực tiếp tên mốc địa danh, khung giờ hoạt động, phần thưởng và bài viết liên kết trên Bản đồ tương tác mà không cần can thiệp code.
    </p>
  </div>

  <div class="d-flex flex-wrap gap-2">
    <a href="{{ route('home') }}" target="_blank" class="btn btn-outline-primary btn-sm">
      <i class="fa-solid fa-up-right-from-square me-1"></i> Xem Ngoài Trang Chủ
    </a>
    <form action="{{ route('admin.sonha-map.reset') }}" method="POST" onsubmit="return confirm('Khôi phục toàn bộ 5 mốc địa danh về thông tin mặc định ban đầu?');">
      @csrf
      <button type="submit" class="btn btn-outline-secondary btn-sm">
        <i class="fa-solid fa-rotate-left me-1"></i> Khôi Phục Mặc Định
      </button>
    </form>
  </div>
</div>

@if(session('success'))
  <div class="alert alert-success d-flex align-items-center gap-2 mb-4" role="alert">
    <i class="fa-solid fa-circle-check"></i>
    <div>{{ session('success') }}</div>
  </div>
@endif

<form action="{{ route('admin.sonha-map.update') }}" method="POST">
  @csrf
  @method('PUT')

  <!-- Thanh Trạng Thái Dưới Nút Tải Về -->
  <div class="card mb-4">
    <div class="card-header pb-2">
      <h6 class="fw-bold mb-0 text-uppercase">
        <i class="fa-solid fa-signal text-success me-2"></i>Dòng Trạng Thái Hoạt Động (Dưới Nút Tải Về)
      </h6>
    </div>
    <div class="card-body">
      <label class="form-label fw-semibold">Nội dung hiển thị (để trống nếu muốn ẩn dòng này)</label>
      <input
        type="text"
        name="status_bar"
        class="form-control"
        value="{{ old('status_bar', $mapConfig['status_bar'] ?? '') }}"
        placeholder="VD: Trạng Thái Hoạt Động: Tống Kim Đại Chiến 21:00"
      />
    </div>
  </div>

  <!-- Danh Sách 5 Mốc Địa Danh Trên Bản Đồ -->
  <div class="row g-4 mb-4">
    @foreach($mapConfig['pins'] as $idx => $pin)
      <div class="col-xl-6">
        <div class="card h-100 border-top border-3 border-success">
          <div class="card-header d-flex justify-content-between align-items-center pb-2">
            <h6 class="fw-bold mb-0">
              <span class="badge bg-label-success me-2">Mốc #{{ $idx + 1 }}</span>
              {{ $pin['name'] }}
            </h6>

            <div class="form-check form-switch mb-0">
              <input
                class="form-check-input"
                type="checkbox"
                id="pin-enabled-{{ $idx }}"
                name="pins[{{ $idx }}][enabled]"
                value="1"
                {{ !empty($pin['enabled']) ? 'checked' : '' }}
              />
              <label class="form-check-label small fw-semibold" for="pin-enabled-{{ $idx }}">Hiển thị mốc</label>
            </div>
          </div>

          <div class="card-body">
            <div class="row g-3">
              <div class="col-md-6">
                <label class="form-label small fw-semibold">Tên địa danh trên bản đồ</label>
                <input
                  type="text"
                  name="pins[{{ $idx }}][name]"
                  class="form-control form-control-sm"
                  value="{{ $pin['name'] }}"
                  required
                />
              </div>

              <div class="col-md-6">
                <label class="form-label small fw-semibold">Tiêu đề phụ (trong khung Popup)</label>
                <input
                  type="text"
                  name="pins[{{ $idx }}][subtitle]"
                  class="form-control form-control-sm"
                  value="{{ $pin['subtitle'] }}"
                  placeholder="VD: Sự Kiện Giờ Vàng"
                />
              </div>

              <div class="col-md-6">
                <label class="form-label small fw-semibold">Khung giờ mở hoạt động</label>
                <input
                  type="text"
                  name="pins[{{ $idx }}][schedule]"
                  class="form-control form-control-sm"
                  value="{{ $pin['schedule'] }}"
                  placeholder="VD: 13:00 • 19:00 • 21:00"
                />
              </div>

              <div class="col-md-6">
                <label class="form-label small fw-semibold">Phần thưởng nổi bật</label>
                <input
                  type="text"
                  name="pins[{{ $idx }}][rewards]"
                  class="form-control form-control-sm"
                  value="{{ $pin['rewards'] }}"
                  placeholder="VD: Điểm Tích Lũy • Bảo Rương"
                />
              </div>

              <div class="col-12">
                <label class="form-label small fw-semibold">Mô tả ngắn</label>
                <textarea
                  name="pins[{{ $idx }}][description]"
                  class="form-control form-control-sm"
                  rows="2"
                >{{ $pin['description'] }}</textarea>
              </div>

              <div class="col-md-4">
                <label class="form-label small fw-semibold">Chữ trên nút bấm</label>
                <input
                  type="text"
                  name="pins[{{ $idx }}][link_text]"
                  class="form-control form-control-sm"
                  value="{{ $pin['link_text'] }}"
                />
              </div>

              <div class="col-md-8">
                <label class="form-label small fw-semibold">Đường dẫn (URL) khi bấm nút</label>
                <input
                  type="text"
                  id="pin-url-{{ $idx }}"
                  name="pins[{{ $idx }}][link_url]"
                  class="form-control form-control-sm mb-1"
                  value="{{ $pin['link_url'] }}"
                  placeholder="/home hoặc /posts/ten-bai-viet"
                />
                @if(isset($recentPosts) && $recentPosts->count())
                  <select
                    class="form-select form-select-sm text-muted"
                    onchange="if(this.value){ document.getElementById('pin-url-{{ $idx }}').value = this.value; }"
                  >
                    <option value="">— Chọn nhanh từ bài viết có sẵn —</option>
                    @foreach($recentPosts as $p)
                      <option value="{{ route('single_post', $p->slug, false) }}">{{ $p->title }}</option>
                    @endforeach
                  </select>
                @endif
              </div>

              <div class="col-6">
                <label class="form-label small text-muted mb-1">Vị trí Ngang X (%)</label>
                <input
                  type="number"
                  min="5"
                  max="95"
                  name="pins[{{ $idx }}][x]"
                  class="form-control form-control-sm"
                  value="{{ $pin['x'] }}"
                />
              </div>

              <div class="col-6">
                <label class="form-label small text-muted mb-1">Vị trí Dọc Y (%)</label>
                <input
                  type="number"
                  min="8"
                  max="92"
                  name="pins[{{ $idx }}][y]"
                  class="form-control form-control-sm"
                  value="{{ $pin['y'] }}"
                />
              </div>
            </div>
          </div>
        </div>
      </div>
    @endforeach
  </div>

  <div class="card position-sticky bottom-0 shadow-lg border-success">
    <div class="card-body py-3 d-flex justify-content-between align-items-center flex-wrap gap-2">
      <span class="small text-muted">
        <i class="fa-solid fa-circle-info text-success me-1"></i> Bấm lưu để áp dụng ngay lập tức lên Bản đồ Sơn Hà Xã Tắc ngoài trang chủ &amp; bảng tin.
      </span>
      <button type="submit" class="btn btn-success px-4 fw-bold">
        <i class="fa-solid fa-floppy-disk me-1"></i> Lưu Cấu Hình Bản Đồ
      </button>
    </div>
  </div>
</form>
@endsection
