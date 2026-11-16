@extends('hotro.v4.layouts.master')

@section('page_title', __('Kick Account'))

@section('content')
<div class="row justify-content-center">
  <div class="col-xl-6 col-lg-8">
    <div class="v4-card p-4 p-md-5">
      <div class="d-flex align-items-center gap-3 pb-3 mb-4" style="border-bottom: 1px solid var(--v4-bronze-border);">
        <div class="v4-feature-icon" style="width: 46px; height: 46px; min-width: 46px; color: var(--v4-crimson-bright);">
          <i class="fa-solid fa-bolt-lightning"></i>
        </div>
        <div>
          <h4 class="fw-bolder mb-0 text-white">{{ __('Kick Account') }}</h4>
          <div class="small" style="color: var(--v4-text-muted);">Giải cứu nhân vật bị kẹt kết nối trên máy chủ</div>
        </div>
      </div>

      <div class="p-3 rounded-2 mb-4" style="background: var(--v4-bronze-soft); border: 1px solid var(--v4-bronze-border);">
        <div class="d-flex gap-3 align-items-start">
          <i class="fa-solid fa-circle-info fs-5 mt-1" style="color: var(--v4-bronze-light);"></i>
          <div class="small">
            <div class="fw-bold mb-1 text-white">Khi nào cần dùng tính năng này?</div>
            <div style="color: var(--v4-text-main);">
              Khi mất kết nối đột ngột khiến đăng nhập vào game báo <strong>"Tài khoản đang được sử dụng"</strong>. Nhập mật khẩu đăng nhập (Pass 1) bên dưới để ngắt phiên treo ngay lập tức.
            </div>
          </div>
        </div>
      </div>

      <form method="POST" action="{{ route('hotro.users.kick-acc') }}" novalidate>
        @csrf

        <div class="mb-4">
          <label class="v4-label" for="currentPassword">
            {{ __('Please confirm your password before continuing') }} <span class="text-danger">(*)</span>
          </label>
          <div class="v4-input-wrap">
            <input
              class="v4-control has-end-icon {{ $errors->has('currentPassword') ? 'is-invalid' : '' }}"
              type="password"
              name="currentPassword"
              id="currentPassword"
              placeholder="Nhập mật khẩu đăng nhập (Pass 1)"
              autofocus
            />
            <button type="button" class="v4-pw-toggle" data-pw-toggle="currentPassword" tabindex="-1" aria-label="Ẩn/Hiện mật khẩu">
              <i class="fa-regular fa-eye-slash"></i>
            </button>
          </div>
          @foreach ($errors->get('currentPassword') as $message)
            <div class="v4-error">
              <i class="fa-solid fa-circle-exclamation"></i> {{ $message }}
            </div>
          @endforeach
        </div>

        <button type="submit" class="btn-v4-crimson w-100 py-3 mb-3">
          <i class="fa-solid fa-bolt-lightning"></i>
          <span>Giải Cứu Nhân Vật Ngay</span>
        </button>

        <div class="text-center">
          <a href="{{ route('hotro.dashboard') }}" class="small fw-semibold" style="color: var(--v4-text-muted);">
            <i class="fa-solid fa-arrow-left me-1"></i> Quay về trang Tổng Quan
          </a>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
