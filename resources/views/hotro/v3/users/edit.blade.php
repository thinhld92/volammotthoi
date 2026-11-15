@extends('hotro.v3.layouts.master')

@section('page_title', __('Update Info'))

@section('link_css')
<link rel="stylesheet" href="{{ asset('backend/assets/vendor/libs/flatpickr/flatpickr.css') }}" />
@endsection

@section('content')
<div class="v3-bento-card p-4 p-md-5">
  <div class="d-flex align-items-center gap-3 pb-3 mb-4" style="border-bottom: 1px solid var(--v3-border);">
    <div class="v3-feature-icon" style="width: 44px; height: 44px; min-width: 44px; border-radius: 13px; font-size: 1.15rem;">
      <i class="fa-solid fa-user-shield"></i>
    </div>
    <div>
      <h4 class="fw-bolder mb-0">Cập Nhật Thông Tin &amp; Bảo Mật</h4>
      <div class="small" style="color: var(--v3-muted);">Quản lý ảnh đại diện, mật khẩu đăng nhập và thông tin bảo hộ tài khoản</div>
    </div>
  </div>

  <!-- Avatar Upload Block -->
  <div class="p-3 p-md-4 rounded-4 mb-4" style="background: var(--v3-surface-soft); border: 1px solid var(--v3-border);">
    <div class="d-flex flex-column flex-sm-row align-items-center gap-4">
      <div class="v3-avatar-jade-ring mb-0" style="width: 92px; height: 92px;">
        <img src="{{ $user->photo }}" alt="user-avatar" id="uploadedAvatar" />
      </div>

      <div class="text-center text-sm-start">
        <div class="d-flex flex-wrap justify-content-center justify-content-sm-start gap-2 mb-2">
          <label for="upload" class="btn-v3-jade py-2 px-3" tabindex="0">
            <i class="fa-solid fa-camera"></i>
            <span>Tải Ảnh Mới</span>
            <input
              type="file"
              id="upload"
              class="account-file-input"
              hidden
              accept="image/png, image/jpeg"
            />
          </label>

          <button type="button" class="btn-v3-soft py-2 px-3 account-image-reset">
            <i class="fa-solid fa-rotate-left"></i>
            <span>{{ __('Reset') }}</span>
          </button>
        </div>

        <div class="small" style="color: var(--v3-muted);" id="avatarUploadStatus">
          Hỗ trợ định dạng JPG hoặc PNG (tự động căn chuẩn khung vuông 500x500).
        </div>
      </div>
    </div>
  </div>

  @if ($errors->any())
    <div class="v3-alert v3-alert-danger">
      <i class="fa-solid fa-circle-exclamation fs-5"></i>
      <span>Đã có lỗi xảy ra, vui lòng kiểm tra lại các trường bên dưới.</span>
    </div>
  @endif

  <form method="POST" action="{{ route('hotro.users.update') }}" novalidate>
    @csrf
    @method('PUT')

    <div class="d-flex align-items-center gap-2 mb-3">
      <span class="v3-pill-tag"><i class="fa-solid fa-key"></i> 1. {{ __('Account Details') }}</span>
    </div>

    <div class="row g-3 mb-4">
      <!-- Username -->
      <div class="col-md-6">
        <label class="v3-label" for="multicol-username">
          {{ __('Username') }} <span class="text-danger">(*)</span>
        </label>
        <input
          type="text"
          id="multicol-username"
          class="v3-control"
          value="{{ $user->cAccName }}"
          readonly
          disabled
        />
      </div>

      <!-- Email (Masked supported) -->
      <div class="col-md-6">
        <label class="v3-label" for="multicol-email">
          {{ __('Email') }} <span class="text-danger">(*)</span>
        </label>
        <input
          type="text"
          name="cEMail"
          id="multicol-email"
          class="v3-control {{ $errors->has('cEMail') ? 'is-invalid' : '' }}"
          placeholder="nhapemail@example.com"
          value="{{ old('cEMail') ?? $maskedEmail ?? '' }}"
        />
        @foreach ($errors->get('cEMail') as $message)
          <div class="v3-error">
            <i class="fa-solid fa-circle-exclamation"></i> {{ $message }}
          </div>
        @endforeach
      </div>

      <!-- New Password 1 -->
      <div class="col-md-6">
        <label class="v3-label" for="multicol-password">
          {{ __('Password') }} (Pass 1 mới — bỏ trống nếu không đổi)
        </label>
        <div class="v3-input-wrap">
          <input
            type="password"
            name="cPassWord"
            id="multicol-password"
            class="v3-control has-end-icon {{ $errors->has('cPassWord') ? 'is-invalid' : '' }}"
            placeholder="············"
            autocomplete="new-password"
          />
          <button type="button" class="v3-pw-toggle" data-pw-toggle="multicol-password" tabindex="-1" aria-label="Ẩn/Hiện mật khẩu">
            <i class="fa-regular fa-eye-slash"></i>
          </button>
        </div>
        @foreach ($errors->get('cPassWord') as $message)
          <div class="v3-error">
            <i class="fa-solid fa-circle-exclamation"></i> {{ $message }}
          </div>
        @endforeach
      </div>

      <!-- Confirm New Password 1 -->
      <div class="col-md-6">
        <label class="v3-label" for="multicol-confirm-password">
          {{ __('Confirm Password') }} (Nhập lại Pass 1 mới)
        </label>
        <div class="v3-input-wrap">
          <input
            type="password"
            name="cPassWord_confirmation"
            id="multicol-confirm-password"
            class="v3-control has-end-icon"
            placeholder="············"
            autocomplete="new-password"
          />
          <button type="button" class="v3-pw-toggle" data-pw-toggle="multicol-confirm-password" tabindex="-1" aria-label="Ẩn/Hiện mật khẩu">
            <i class="fa-regular fa-eye-slash"></i>
          </button>
        </div>
      </div>

      <!-- New Password 2 -->
      <div class="col-md-6">
        <label class="v3-label" for="multicol-cSecPassword">
          {{ __('Password 2') }} (Pass 2 mới — bỏ trống nếu không đổi)
        </label>
        <div class="v3-input-wrap">
          <input
            type="password"
            name="cSecPassword"
            id="multicol-cSecPassword"
            class="v3-control has-end-icon {{ $errors->has('cSecPassword') ? 'is-invalid' : '' }}"
            placeholder="············"
            autocomplete="new-password"
          />
          <button type="button" class="v3-pw-toggle" data-pw-toggle="multicol-cSecPassword" tabindex="-1" aria-label="Ẩn/Hiện mật khẩu cấp 2">
            <i class="fa-regular fa-eye-slash"></i>
          </button>
        </div>
        @foreach ($errors->get('cSecPassword') as $message)
          <div class="v3-error">
            <i class="fa-solid fa-circle-exclamation"></i> {{ $message }}
          </div>
        @endforeach
      </div>

      <!-- Current Password 2 (Required Confirmation) -->
      <div class="col-md-6">
        <label class="v3-label" for="multicol-old-cSecPassword">
          <i class="fa-solid fa-shield-halved me-1" style="color: var(--v3-jade);"></i>
          {{ __('Current Password 2') }} (Pass 2 hiện tại) <span class="text-danger">(*)</span>
        </label>
        <div class="v3-input-wrap">
          <input
            type="password"
            name="old_cSecPassword"
            id="multicol-old-cSecPassword"
            class="v3-control has-end-icon {{ $errors->has('old_cSecPassword') ? 'is-invalid' : '' }}"
            placeholder="Nhập mật khẩu cấp 2 hiện tại để xác nhận"
            autocomplete="current-password"
          />
          <button type="button" class="v3-pw-toggle" data-pw-toggle="multicol-old-cSecPassword" tabindex="-1" aria-label="Ẩn/Hiện mật khẩu cấp 2 cũ">
            <i class="fa-regular fa-eye-slash"></i>
          </button>
        </div>
        @foreach ($errors->get('old_cSecPassword') as $message)
          <div class="v3-error">
            <i class="fa-solid fa-circle-exclamation"></i> {{ $message }}
          </div>
        @endforeach
      </div>
    </div>

    <hr class="my-4" style="border-color: var(--v3-border);" />

    <div class="d-flex align-items-center gap-2 mb-3">
      <span class="v3-pill-tag"><i class="fa-solid fa-user-tag"></i> 2. {{ __('Personal Info') }}</span>
    </div>

    <div class="row g-3 mb-4">
      <!-- Full Name -->
      <div class="col-md-6">
        <label class="v3-label" for="multicol-first-name">
          {{ __('Full Name') }} <span class="text-danger">(*)</span>
        </label>
        <input
          type="text"
          name="cRealName"
          id="multicol-first-name"
          class="v3-control {{ $errors->has('cRealName') ? 'is-invalid' : '' }}"
          placeholder="Nhập họ và tên"
          value="{{ old('cRealName') ?? $user->cRealName ?? '' }}"
        />
        @foreach ($errors->get('cRealName') as $message)
          <div class="v3-error">
            <i class="fa-solid fa-circle-exclamation"></i> {{ $message }}
          </div>
        @endforeach
      </div>

      <!-- CCCD / CMND -->
      <div class="col-md-6">
        <label class="v3-label" for="multicol-last-name">
          {{ __('ID') }} (12 chữ số)
        </label>
        <input
          type="text"
          name="cIDNum"
          id="multicol-last-name"
          class="v3-control {{ $errors->has('cIDNum') ? 'is-invalid' : '' }}"
          placeholder="VD: 07909900xxxx"
          value="{{ old('cIDNum') ?? $user->cIDNum ?? '' }}"
        />
        @foreach ($errors->get('cIDNum') as $message)
          <div class="v3-error">
            <i class="fa-solid fa-circle-exclamation"></i> {{ $message }}
          </div>
        @endforeach
      </div>

      <!-- Birth Date -->
      <div class="col-md-6">
        <label class="v3-label" for="multicol-birthdate">
          {{ __('Birth Date') }}
        </label>
        <input
          type="text"
          name="dBirthDay"
          id="multicol-birthdate"
          class="v3-control dob-picker"
          placeholder="{{ __('YYYY-MM-DD') }}"
          value="{{ old('dBirthDay') ?? $user->dBirthDay }}"
        />
      </div>

      <!-- Phone Number (Masked supported — no masking JS stripping *) -->
      <div class="col-md-6">
        <label class="v3-label" for="multicol-phone">
          {{ __('Phone Number') }}
        </label>
        <input
          type="text"
          name="cPhone"
          id="multicol-phone"
          class="v3-control {{ $errors->has('cPhone') ? 'is-invalid' : '' }}"
          placeholder="VD: 0909xxxxxx"
          value="{{ old('cPhone') ?? $maskedPhone ?? '' }}"
        />
        @foreach ($errors->get('cPhone') as $message)
          <div class="v3-error">
            <i class="fa-solid fa-circle-exclamation"></i> {{ $message }}
          </div>
        @endforeach
      </div>
    </div>

    <div class="d-flex flex-wrap align-items-center gap-3 pt-2">
      <button type="submit" class="btn-v3-jade px-4 py-2">
        <i class="fa-solid fa-floppy-disk"></i>
        <span>Lưu Thay Đổi</span>
      </button>
      <a href="{{ route('hotro.dashboard') }}" class="btn-v3-soft px-4 py-2">
        <span>{{ __('Go back') }}</span>
      </a>
    </div>
  </form>
</div>
@endsection

@section('script')
<script src="{{ asset('backend/assets/vendor/libs/flatpickr/flatpickr.js') }}"></script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    if (typeof flatpickr !== 'undefined') {
      flatpickr('.dob-picker', {
        dateFormat: 'Y-m-d',
        allowInput: true
      });
    }

    const accountUserImage = document.getElementById('uploadedAvatar');
    const topbarUserImages = document.querySelectorAll('.v3-user-pill img');
    const fileInput = document.querySelector('.account-file-input');
    const resetFileInput = document.querySelector('.account-image-reset');
    const statusEl = document.getElementById('avatarUploadStatus');
    const tokenInput = document.querySelector("input[name='_token']");
    const token = tokenInput ? tokenInput.value : '';

    if (accountUserImage && fileInput) {
      const resetImage = accountUserImage.src;

      fileInput.onchange = function () {
        if (fileInput.files && fileInput.files[0]) {
          accountUserImage.src = window.URL.createObjectURL(fileInput.files[0]);
          if (statusEl) statusEl.textContent = 'Đang tải ảnh đại diện lên máy chủ...';

          const data = new FormData();
          data.append('avatar', fileInput.files[0]);
          data.append('_token', token);

          fetch("{{ route('hotro.upload-avatar') }}", {
            method: 'POST',
            body: data
          })
            .then(function (res) { return res.json(); })
            .then(function (data) {
              if (data && data.urlFile) {
                accountUserImage.src = data.urlFile;
                topbarUserImages.forEach(function (img) { img.src = data.urlFile; });
                if (statusEl) statusEl.textContent = 'Đã cập nhật ảnh đại diện thành công!';
              }
            })
            .catch(function (err) {
              console.error(err);
              if (statusEl) statusEl.textContent = 'Không thể tải ảnh lên, vui lòng thử lại.';
            });
        }
      };

      if (resetFileInput) {
        resetFileInput.onclick = function () {
          fileInput.value = '';
          const data = new FormData();
          data.append('avatar_url', resetImage);
          data.append('_token', token);

          fetch("{{ route('hotro.reset-avatar') }}", {
            method: 'POST',
            body: data
          })
            .then(function (res) { return res.json(); })
            .then(function (data) {
              if (data && data.urlFile) {
                accountUserImage.src = data.urlFile;
                topbarUserImages.forEach(function (img) { img.src = data.urlFile; });
                if (statusEl) statusEl.textContent = 'Đã đặt lại ảnh đại diện ban đầu.';
              }
            })
            .catch(function (err) { console.error(err); });
        };
      }
    }
  });
</script>
@endsection
