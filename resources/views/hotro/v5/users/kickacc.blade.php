@extends('hotro.v5.layouts.master')

@section('page_title', __('Kick Account'))

@section('content')
<div class="row justify-content-center">
  <div class="col-xl-6 col-lg-8">
    <div class="v5-card p-4 p-md-5">
      <div class="d-flex align-items-center gap-3 pb-3 mb-4" style="border-bottom: 1px solid var(--v5-gold-border);">
        <i class="fa-solid fa-bolt-lightning fs-4" style="color: var(--v5-gold-light);"></i>
        <div>
          <h4 class="fw-bolder mb-0" style="color: var(--v5-gold-light);">{{ __('Kick Account') }}</h4>
          <div class="small" style="color: var(--v5-text-muted);">Giải cứu nhân vật bị kẹt kết nối trên máy chủ</div>
        </div>
      </div>

      <div class="p-3 rounded-3 mb-4" style="background: rgba(16, 185, 129, 0.1); border: 1px solid var(--v5-gold-border);">
        <div class="d-flex gap-3 align-items-start">
          <i class="fa-solid fa-circle-info fs-5 mt-1" style="color: var(--v5-gold-light);"></i>
          <div class="small">
            <div class="fw-bold mb-1 text-white">Khi nào cần dùng tính năng này?</div>
            <div style="color: var(--v5-text-main);">
              Khi mất kết nối đột ngột khiến đăng nhập vào game báo <strong>"Tài khoản đang được sử dụng"</strong>. Nhập mật khẩu đăng nhập (Pass 1) bên dưới để ngắt phiên treo ngay lập tức.
            </div>
          </div>
        </div>
      </div>

      <form method="POST" action="{{ route('hotro.users.kick-acc') }}" novalidate>
        @csrf

        <div class="mb-4">
          <label class="v5-label" for="currentPassword">
            {{ __('Please confirm your password before continuing') }} <span class="text-danger">(*)</span>
          </label>
          <div class="v5-input-wrap">
            <input
              class="v5-control has-end-icon {{ $errors->has('currentPassword') ? 'is-invalid' : '' }}"
              type="password"
              name="currentPassword"
              id="currentPassword"
              placeholder="Nhập mật khẩu đăng nhập (Pass 1)"
              autofocus
            />
            <button type="button" class="v5-pw-toggle" data-pw-toggle="currentPassword" tabindex="-1" aria-label="Ẩn/Hiện mật khẩu">
              <i class="fa-regular fa-eye-slash"></i>
            </button>
          </div>
          @foreach ($errors->get('currentPassword') as $message)
            <div class="v5-error">
              <i class="fa-solid fa-circle-exclamation"></i> {{ $message }}
            </div>
          @endforeach
        </div>

        <button type="submit" class="btn-v5-gold w-100 py-3 mb-3">
          <i class="fa-solid fa-bolt-lightning"></i>
          <span>Giải Cứu Nhân Vật Ngay</span>
        </button>

        <div class="text-center">
          <a href="{{ route('hotro.dashboard') }}" class="small fw-semibold" style="color: var(--v5-text-muted);">
            <i class="fa-solid fa-arrow-left me-1"></i> Quay về trang Tổng Quan
          </a>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
