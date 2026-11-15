@extends('hotro.v2.layouts.master')

@section('page_title', __('Kick Account'))

@section('content')
<div class="row justify-content-center">
  <div class="col-xl-6 col-lg-8">
    <div class="hotro-card">
      <div class="hotro-card-header">
        <h5 class="hotro-card-title">
          <i class="fa-solid fa-bolt-lightning"></i>
          <span>{{ __('Kick Account') }} — Giải Cứu Kẹt Nhân Vật</span>
        </h5>
      </div>

      <div class="hotro-card-body">
        <div class="p-3 rounded-3 mb-4" style="background: rgba(245, 158, 11, 0.1); border: 1px solid var(--border-gold);">
          <div class="d-flex gap-3 align-items-start">
            <i class="fa-solid fa-triangle-exclamation text-warning fs-4 mt-1"></i>
            <div class="small">
              <div class="fw-bold mb-1" style="color: var(--text-heading);">Khi nào cần dùng tính năng này?</div>
              <div class="text-muted">
                Khi mất kết nối đột ngột khiến đăng nhập vào game báo <strong>"Tài khoản đang được sử dụng"</strong>. Nhập mật khẩu đăng nhập bên dưới để hệ thống ngắt kết nối phiên bị treo ngay lập tức.
              </div>
            </div>
          </div>
        </div>

        <form method="POST" action="{{ route('hotro.users.kick-acc') }}" novalidate>
          @csrf

          <div class="mb-4">
            <label class="hotro-form-label" for="currentPassword">
              {{ __('Please confirm your password before continuing') }} <span class="text-danger">(*)</span>
            </label>
            <div class="hotro-input-wrap">
              <input
                class="hotro-control has-end-icon {{ $errors->has('currentPassword') ? 'is-invalid' : '' }}"
                type="password"
                name="currentPassword"
                id="currentPassword"
                placeholder="Nhập mật khẩu đăng nhập (Pass 1)"
                autofocus
              />
              <button type="button" class="hotro-pw-toggle" data-pw-toggle="currentPassword" tabindex="-1" aria-label="Ẩn/Hiện mật khẩu">
                <i class="fa-regular fa-eye-slash"></i>
              </button>
            </div>
            @foreach ($errors->get('currentPassword') as $message)
              <div class="hotro-error-msg">
                <i class="fa-solid fa-circle-exclamation"></i> {{ $message }}
              </div>
            @endforeach
          </div>

          <button type="submit" class="btn-hotro-rescue mb-3">
            <i class="fa-solid fa-bolt-lightning"></i>
            <span>Giải Cứu Nhân Vật Ngay</span>
          </button>

          <div class="text-center">
            <a href="{{ route('hotro.dashboard') }}" class="small text-muted text-decoration-none">
              <i class="fa-solid fa-arrow-left me-1"></i> Quay về trang Tổng Quan
            </a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
