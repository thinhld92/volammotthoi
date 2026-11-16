@extends('hotro.v4.layouts.master')

@section('page_title', 'Tổng Quan Tài Khoản')

@section('content')
<!-- Hero Profile Banner Card (Huyết Nguyệt Sơn Trang) -->
<div class="v4-card mb-4">
  <div class="v4-profile-banner" style="background-image: url('{{ asset('frontend/assets/images/v4/hotro_fortress.jpg') }}');">
    <div class="v4-avatar-ring">
      <img src="{{ $user->photo }}" alt="{{ $user->cAccName }}" />
    </div>

    <h2 class="fw-bolder mb-1 text-white">{{ $user->cAccName }}</h2>
    <div class="d-inline-flex align-items-center gap-2 mb-3 small fw-semibold" style="color: var(--v4-bronze-light);">
      <i class="fa-solid fa-crown"></i>
      <span>{{ $user->cRealName ?: 'Hiệp Khách Giang Hồ' }}</span>
    </div>

    <div class="d-flex flex-wrap justify-content-center gap-2">
      <a href="{{ route('hotro.users.edit') }}" class="btn-v4-crimson py-2 px-4">
        <i class="fa-solid fa-user-pen"></i>
        <span>Đổi Mật Khẩu &amp; Thông Tin</span>
      </a>
      <a href="{{ route('hotro.users.kick-acc') }}" class="btn-v4-bronze py-2 px-4">
        <i class="fa-solid fa-bolt-lightning"></i>
        <span>Kick Kẹt Acc</span>
      </a>
    </div>
  </div>
</div>

<!-- 2-Column Content Grid -->
<div class="row g-4">
  <!-- Left Column: Account Details -->
  <div class="col-xl-5 col-lg-5">
    <div class="v4-card p-4 h-100">
      <div class="d-flex align-items-center gap-2 pb-3 mb-3" style="border-bottom: 1px solid var(--v4-bronze-border);">
        <div class="v4-feature-icon" style="width: 40px; height: 40px; min-width: 40px; font-size: 1rem;">
          <i class="fa-solid fa-scroll"></i>
        </div>
        <h5 class="fw-bold mb-0 text-white">{{ __('Account Details') }}</h5>
      </div>

      <div class="d-flex flex-column gap-3">
        <div class="d-flex align-items-center justify-content-between py-2" style="border-bottom: 1px dashed var(--v4-border-subtle);">
          <span class="small fw-semibold" style="color: var(--v4-text-muted);">
            <i class="fa-solid fa-user me-2" style="color: var(--v4-bronze);"></i>{{ __('Username') }}
          </span>
          <span class="fw-bold text-white">{{ $user->cAccName }}</span>
        </div>

        <div class="d-flex align-items-center justify-content-between py-2" style="border-bottom: 1px dashed var(--v4-border-subtle);">
          <span class="small fw-semibold" style="color: var(--v4-text-muted);">
            <i class="fa-solid fa-address-card me-2" style="color: var(--v4-bronze);"></i>{{ __('Full Name') }}
          </span>
          <span class="fw-bold text-white">{{ $user->cRealName }}</span>
        </div>

        <div class="d-flex align-items-center justify-content-between py-2" style="border-bottom: 1px dashed var(--v4-border-subtle);">
          <span class="small fw-semibold" style="color: var(--v4-text-muted);">
            <i class="fa-regular fa-calendar-check me-2" style="color: var(--v4-bronze);"></i>{{ __('Register Date') }}
          </span>
          <span class="fw-bold text-white">{{ $user->registerDate }}</span>
        </div>

        <div class="d-flex align-items-center justify-content-between py-2" style="border-bottom: 1px dashed var(--v4-border-subtle);">
          <span class="small fw-semibold" style="color: var(--v4-text-muted);">
            <i class="fa-solid fa-hourglass-half me-2" style="color: var(--v4-bronze);"></i>{{ __('End Date') }}
          </span>
          <span class="fw-bold text-white">{{ optional($user->account_habitus)->endDate ?? '—' }}</span>
        </div>

        <div class="d-flex align-items-center justify-content-between pt-1">
          <span class="small fw-semibold" style="color: var(--v4-text-muted);">
            <i class="fa-solid fa-shield-halved me-2" style="color: var(--v4-bronze);"></i>Bảo mật cấp 2
          </span>
          <span class="v4-badge-bronze">
            <i class="fa-solid fa-check"></i> Đã kích hoạt
          </span>
        </div>
      </div>
    </div>
  </div>

  <!-- Right Column: Client & Patch Downloads ("Tải về") -->
  <div class="col-xl-7 col-lg-7">
    <div class="v4-card p-4 h-100">
      <div class="d-flex align-items-center gap-2 pb-3 mb-3" style="border-bottom: 1px solid var(--v4-bronze-border);">
        <div class="v4-feature-icon" style="width: 40px; height: 40px; min-width: 40px; font-size: 1rem;">
          <i class="fa-solid fa-cloud-arrow-down"></i>
        </div>
        <h5 class="fw-bold mb-0 text-white">Tải về Bản Cài Đặt &amp; Cập Nhật</h5>
      </div>

      <p class="small mb-4" style="color: var(--v4-text-muted);">
        <i class="fa-solid fa-circle-info me-1" style="color: var(--v4-bronze-light);"></i>
        Đã có sẵn thư mục VLTK thì chọn <strong style="color: var(--v4-bronze-light);">Link Patch</strong>, máy mới hoàn toàn thì chọn <strong style="color: #FCA5A5;">Link Full</strong> (chỉ cần tải 1 link).
      </p>

      <div class="row g-3">
        <div class="col-sm-6">
          <a href="https://drive.google.com/file/d/11eWOfNMNvo_PCFIXVak8Qz7rYI5nvtIr/view" target="_blank" rel="noopener noreferrer" class="v4-card v4-feature-card p-3 align-items-center justify-content-between">
            <div class="d-flex align-items-center gap-3">
              <div class="v4-feature-icon" style="width: 44px; height: 44px; min-width: 44px; font-size: 1.1rem;">
                <i class="fa-solid fa-file-zipper"></i>
              </div>
              <div>
                <div class="fw-bold text-white">Link Patch 1</div>
                <div class="small" style="color: var(--v4-text-muted);">Bản gọn nhẹ • Drive</div>
              </div>
            </div>
            <i class="fa-solid fa-download" style="color: var(--v4-bronze-light);"></i>
          </a>
        </div>

        <div class="col-sm-6">
          <a href="https://drive.google.com/file/d/1mlyYsEgAZDyzoheVlqGRK6WXZCiP0eVM/view" target="_blank" rel="noopener noreferrer" class="v4-card v4-feature-card p-3 align-items-center justify-content-between">
            <div class="d-flex align-items-center gap-3">
              <div class="v4-feature-icon" style="width: 44px; height: 44px; min-width: 44px; font-size: 1.1rem;">
                <i class="fa-solid fa-file-zipper"></i>
              </div>
              <div>
                <div class="fw-bold text-white">Link Patch 2</div>
                <div class="small" style="color: var(--v4-text-muted);">Dự phòng • Drive</div>
              </div>
            </div>
            <i class="fa-solid fa-download" style="color: var(--v4-bronze-light);"></i>
          </a>
        </div>

        <div class="col-sm-6">
          <a href="https://drive.google.com/file/d/1HrOGwQkUwZtqcVAfrxT6ojbljMns7IPz/view" target="_blank" rel="noopener noreferrer" class="v4-card v4-feature-card p-3 align-items-center justify-content-between">
            <div class="d-flex align-items-center gap-3">
              <div class="v4-feature-icon" style="width: 44px; height: 44px; min-width: 44px; font-size: 1.1rem; color: #FCA5A5;">
                <i class="fa-solid fa-hard-drive"></i>
              </div>
              <div>
                <div class="fw-bold text-white">Link Full 1</div>
                <div class="small" style="color: var(--v4-text-muted);">Trọn bộ đầy đủ • Drive</div>
              </div>
            </div>
            <i class="fa-solid fa-download" style="color: var(--v4-crimson-bright);"></i>
          </a>
        </div>

        <div class="col-sm-6">
          <a href="https://drive.google.com/file/d/1_SgBG0ctqqO72oO2isdsmsdAaIEr8tv0/view" target="_blank" rel="noopener noreferrer" class="v4-card v4-feature-card p-3 align-items-center justify-content-between">
            <div class="d-flex align-items-center gap-3">
              <div class="v4-feature-icon" style="width: 44px; height: 44px; min-width: 44px; font-size: 1.1rem; color: #FCA5A5;">
                <i class="fa-solid fa-hard-drive"></i>
              </div>
              <div>
                <div class="fw-bold text-white">Link Full 2</div>
                <div class="small" style="color: var(--v4-text-muted);">Full dự phòng • Drive</div>
              </div>
            </div>
            <i class="fa-solid fa-download" style="color: var(--v4-crimson-bright);"></i>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
