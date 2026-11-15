@extends('hotro.v2.layouts.master')

@section('page_title', __('Update Info'))

@section('link_css')
<link rel="stylesheet" href="{{ asset('backend/assets/vendor/libs/flatpickr/flatpickr.css') }}" />
@endsection

@section('content')
<div class="hotro-card">
  <div class="hotro-card-header">
    <h5 class="hotro-card-title">
      <i class="fa-solid fa-user-shield"></i>
      <span>Cập Nhật Thông Tin & Bảo Mật</span>
    </h5>
  </div>

  <!-- Avatar Upload Block -->
  <div class="hotro-card-body border-bottom" style="border-color: var(--border-glass) !important;">
    <div class="d-flex flex-column flex-sm-row align-items-center gap-4">
      <div class="hotro-avatar-ring mb-0" style="width: 96px; height: 96px;">
        <img src="{{ $user->photo }}" alt="user-avatar" id="uploadedAvatar" />
      </div>

      <div class="text-center text-sm-start">
        <div class="d-flex flex-wrap justify-content-center justify-content-sm-start gap-2 mb-2">
          <label for="upload" class="btn-modern-primary btn-sm px-3 py-2" tabindex="0">
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

          <button type="button" class="btn-modern-secondary btn-sm px-3 py-2 account-image-reset">
            <i class="fa-solid fa-rotate-left"></i>
            <span>{{ __('Reset') }}</span>
          </button>
        </div>

        <div class="small text-muted" id="avatarUploadStatus">
          Hỗ trợ định dạng JPG hoặc PNG (tự động căn chuẩn khung vuông 500x500).
        </div>
      </div>
    </div>
  </div>

  <!-- Profile & Security Update Form -->
  <div class="hotro-card-body">
    @if ($errors->any())
      <div class="hotro-alert hotro-alert-danger">
        <i class="fa-solid fa-circle-exclamation fs-5"></i>
        <span>Đã có lỗi xảy ra, vui lòng kiểm tra lại các trường bên dưới.</span>
      </div>
    @endif

    <form method="POST" action="{{ route('hotro.users.update') }}" novalidate>
      @csrf
      @method('PUT')

      <div class="hotro-section-subtitle">
        <i class="fa-solid fa-key"></i>
        <span>1. {{ __('Account Details') }}</span>
      </div>

      <div class="row g-3 mb-4">
        <!-- Username -->
        <div class="col-md-6">
          <label class="hotro-form-label" for="multicol-username">
            {{ __('Username') }} <span class="text-danger">(*)</span>
          </label>
          <input
            type="text"
            id="multicol-username"
            class="hotro-control"
            value="{{ $user->cAccName }}"
            readonly
            disabled
          />
        </div>

        <!-- Email (Masked supported) -->
        <div class="col-md-6">
          <label class="hotro-form-label" for="multicol-email">
            {{ __('Email') }} <span class="text-danger">(*)</span>
          </label>
          <input
            type="text"
            name="cEMail"
            id="multicol-email"
            class="hotro-control {{ $errors->has('cEMail') ? 'is-invalid' : '' }}"
            placeholder="nhapemail@example.com"
            value="{{ old('cEMail') ?? $maskedEmail ?? '' }}"
          />
          @foreach ($errors->get('cEMail') as $message)
            <div class="hotro-error-msg">
              <i class="fa-solid fa-circle-exclamation"></i> {{ $message }}
            </div>
          @endforeach
        </div>

        <!-- New Password 1 -->
        <div class="col-md-6">
          <label class="hotro-form-label" for="multicol-password">
            {{ __('Password') }} (Pass 1 mới — bỏ trống nếu không đổi)
          </label>
          <div class="hotro-input-wrap">
            <input
              type="password"
              name="cPassWord"
              id="multicol-password"
              class="hotro-control has-end-icon {{ $errors->has('cPassWord') ? 'is-invalid' : '' }}"
              placeholder="············"
              autocomplete="new-password"
            />
            <button type="button" class="hotro-pw-toggle" data-pw-toggle="multicol-password" tabindex="-1" aria-label="Ẩn/Hiện mật khẩu">
              <i class="fa-regular fa-eye-slash"></i>
            </button>
          </div>
          @foreach ($errors->get('cPassWord') as $message)
            <div class="hotro-error-msg">
              <i class="fa-solid fa-circle-exclamation"></i> {{ $message }}
            </div>
          @endforeach
        </div>

        <!-- Confirm New Password 1 -->
        <div class="col-md-6">
          <label class="hotro-form-label" for="multicol-confirm-password">
            {{ __('Confirm Password') }} (Nhập lại Pass 1 mới)
          </label>
          <div class="hotro-input-wrap">
            <input
              type="password"
              name="cPassWord_confirmation"
              id="multicol-confirm-password"
              class="hotro-control has-end-icon"
              placeholder="············"
              autocomplete="new-password"
            />
            <button type="button" class="hotro-pw-toggle" data-pw-toggle="multicol-confirm-password" tabindex="-1" aria-label="Ẩn/Hiện mật khẩu">
              <i class="fa-regular fa-eye-slash"></i>
            </button>
          </div>
        </div>

        <!-- New Password 2 -->
        <div class="col-md-6">
          <label class="hotro-form-label" for="multicol-cSecPassword">
            {{ __('Password 2') }} (Pass 2 mới — bỏ trống nếu không đổi)
          </label>
          <div class="hotro-input-wrap">
            <input
              type="password"
              name="cSecPassword"
              id="multicol-cSecPassword"
              class="hotro-control has-end-icon {{ $errors->has('cSecPassword') ? 'is-invalid' : '' }}"
              placeholder="············"
              autocomplete="new-password"
            />
            <button type="button" class="hotro-pw-toggle" data-pw-toggle="multicol-cSecPassword" tabindex="-1" aria-label="Ẩn/Hiện mật khẩu cấp 2">
              <i class="fa-regular fa-eye-slash"></i>
            </button>
          </div>
          @foreach ($errors->get('cSecPassword') as $message)
            <div class="hotro-error-msg">
              <i class="fa-solid fa-circle-exclamation"></i> {{ $message }}
            </div>
          @endforeach
        </div>

        <!-- Current Password 2 (Required Confirmation) -->
        <div class="col-md-6">
          <label class="hotro-form-label" for="multicol-old-cSecPassword">
            <i class="fa-solid fa-shield-halved text-warning me-1"></i>
            {{ __('Current Password 2') }} (Pass 2 hiện tại) <span class="text-danger">(*)</span>
          </label>
          <div class="hotro-input-wrap">
            <input
              type="password"
              name="old_cSecPassword"
              id="multicol-old-cSecPassword"
              class="hotro-control has-end-icon {{ $errors->has('old_cSecPassword') ? 'is-invalid' : '' }}"
              placeholder="Nhập mật khẩu cấp 2 hiện tại để xác nhận"
              autocomplete="current-password"
            />
            <button type="button" class="hotro-pw-toggle" data-pw-toggle="multicol-old-cSecPassword" tabindex="-1" aria-label="Ẩn/Hiện mật khẩu cấp 2 cũ">
              <i class="fa-regular fa-eye-slash"></i>
            </button>
          </div>
          @foreach ($errors->get('old_cSecPassword') as $message)
            <div class="hotro-error-msg">
              <i class="fa-solid fa-circle-exclamation"></i> {{ $message }}
            </div>
          @endforeach
        </div>
      </div>

      <hr class="my-4" style="border-color: var(--border-glass);" />

      <div class="hotro-section-subtitle">
        <i class="fa-solid fa-user-tag"></i>
        <span>2. {{ __('Personal Info') }}</span>
      </div>

      <div class="row g-3 mb-4">
        <!-- Full Name -->
        <div class="col-md-6">
          <label class="hotro-form-label" for="multicol-first-name">
            {{ __('Full Name') }} <span class="text-danger">(*)</span>
          </label>
          <input
            type="text"
            name="cRealName"
            id="multicol-first-name"
            class="hotro-control {{ $errors->has('cRealName') ? 'is-invalid' : '' }}"
            placeholder="Nhập họ và tên"
            value="{{ old('cRealName') ?? $user->cRealName ?? '' }}"
          />
          @foreach ($errors->get('cRealName') as $message)
            <div class="hotro-error-msg">
              <i class="fa-solid fa-circle-exclamation"></i> {{ $message }}
            </div>
          @endforeach
        </div>

        <!-- CCCD / CMND -->
        <div class="col-md-6">
          <label class="hotro-form-label" for="multicol-last-name">
            {{ __('ID') }} (12 chữ số)
          </label>
          <input
            type="text"
            name="cIDNum"
            id="multicol-last-name"
            class="hotro-control {{ $errors->has('cIDNum') ? 'is-invalid' : '' }}"
            placeholder="VD: 07909900xxxx"
            value="{{ old('cIDNum') ?? $user->cIDNum ?? '' }}"
          />
          @foreach ($errors->get('cIDNum') as $message)
            <div class="hotro-error-msg">
              <i class="fa-solid fa-circle-exclamation"></i> {{ $message }}
            </div>
          @endforeach
        </div>

        <!-- Birth Date -->
        <div class="col-md-6">
          <label class="hotro-form-label" for="multicol-birthdate">
            {{ __('Birth Date') }}
          </label>
          <input
            type="text"
            name="dBirthDay"
            id="multicol-birthdate"
            class="hotro-control dob-picker"
            placeholder="{{ __('YYYY-MM-DD') }}"
            value="{{ old('dBirthDay') ?? $user->dBirthDay }}"
          />
        </div>

        <!-- Phone Number (Masked supported) -->
        <div class="col-md-6">
          <label class="hotro-form-label" for="multicol-phone">
            {{ __('Phone Number') }}
          </label>
          <input
            type="text"
            name="cPhone"
            id="multicol-phone"
            class="hotro-control {{ $errors->has('cPhone') ? 'is-invalid' : '' }}"
            placeholder="VD: 0909xxxxxx"
            value="{{ old('cPhone') ?? $maskedPhone ?? '' }}"
          />
          @foreach ($errors->get('cPhone') as $message)
            <div class="hotro-error-msg">
              <i class="fa-solid fa-circle-exclamation"></i> {{ $message }}
            </div>
          @endforeach
        </div>
      </div>

      <div class="d-flex flex-wrap align-items-center gap-3 pt-2">
        <button type="submit" class="btn-modern-primary px-4 py-2">
          <i class="fa-solid fa-floppy-disk"></i>
          <span>Lưu Thay Đổi</span>
        </button>
        <a href="{{ route('hotro.dashboard') }}" class="btn-modern-secondary px-4 py-2">
          <span>{{ __('Go back') }}</span>
        </a>
      </div>
    </form>
  </div>
</div>
@endsection

@section('script')
<script src="{{ asset('backend/assets/vendor/libs/flatpickr/flatpickr.js') }}"></script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    // Initialize Birth Date Picker
    if (typeof flatpickr !== 'undefined') {
      flatpickr('.dob-picker', {
        dateFormat: 'Y-m-d',
        allowInput: true
      });
    }

    // Live Avatar Upload & Reset
    const accountUserImage = document.getElementById('uploadedAvatar');
    const topbarUserImages = document.querySelectorAll('.hotro-user-trigger img');
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
