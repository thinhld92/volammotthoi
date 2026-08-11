@extends('backend.layouts.master')

@section('content')
<div class="row">
  <div class="col-12 col-lg-8">
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0 text-uppercase">Thêm IP Vào Danh Sách Đen</h5>
        <a href="{{ route('admin.ip-blacklists.index') }}" class="btn btn-secondary">
          <i class="fa fa-arrow-left me-1"></i> Quay lại
        </a>
      </div>
      <div class="card-body">
        <form 
          method="POST" 
          action="{{ route('admin.ip-blacklists.store') }}"
          class="needs-validation {{ $errors->any() ? 'was-validated custom-validate' : '' }}"
        >
          @csrf

          <div class="mb-3">
            <label class="form-label" for="ip">Địa chỉ IP <span class="text-danger">(*)</span></label>
            <input 
              type="text" 
              name="ip" 
              id="ip" 
              class="form-control {{ $errors->has('ip') ? 'is-invalid custom-invalid' : '' }}" 
              placeholder="Ví dụ: 192.168.1.100" 
              value="{{ old('ip') ?? ($ip ?? '') }}" 
              required
            />
            @foreach ($errors->get('ip') as $message)
              <div class="invalid-feedback d-block">{{ $message }}</div>
            @endforeach
          </div>

          <div class="mb-3">
            <label class="form-label" for="reason">Lý do chặn (Ghi chú)</label>
            <textarea 
              name="reason" 
              id="reason" 
              rows="3" 
              class="form-control {{ $errors->has('reason') ? 'is-invalid custom-invalid' : '' }}" 
              placeholder="Ví dụ: Đăng ký ảo hàng loạt, spam..."
            >{{ old('reason') }}</textarea>
            @foreach ($errors->get('reason') as $message)
              <div class="invalid-feedback d-block">{{ $message }}</div>
            @endforeach
          </div>

          <div class="text-end">
            <button type="submit" class="btn btn-danger me-2">
              <i class="fa fa-ban me-1"></i> Chặn IP này
            </button>
            <a href="{{ route('admin.ip-blacklists.index') }}" class="btn btn-label-secondary">Hủy</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
