@extends('hotro.v3.layouts.master')

@section('page_title', 'Tổng Quan Tài Khoản')

@section('content')
<!-- Hero Profile Banner Card (Thủy Mặc Thanh Ngọc) -->
<div class="v3-profile-hero mb-4">
  <div class="v3-profile-banner" style="background-image: url('{{ asset('frontend/assets/images/v3/hotro_jade_banner.jpg') }}');">
    <div class="v3-avatar-jade-ring">
      <img src="{{ $user->photo }}" alt="{{ $user->cAccName }}" />
    </div>

    <h2 class="fw-bolder mb-1">{{ $user->cAccName }}</h2>
    <div class="d-inline-flex align-items-center gap-2 mb-3 small fw-semibold" style="color: var(--v3-jade-dark);">
      <i class="fa-solid fa-gem"></i>
      <span>{{ $user->cRealName ?: 'Hiệp Khách Giang Hồ' }}</span>
    </div>

    <div class="d-flex flex-wrap justify-content-center gap-2">
      <a href="{{ route('hotro.users.edit') }}" class="btn-v3-jade py-2 px-4">
        <i class="fa-solid fa-user-pen"></i>
        <span>Đổi Mật Khẩu &amp; Thông Tin</span>
      </a>
      <a href="{{ route('hotro.users.kick-acc') }}" class="btn-v3-soft py-2 px-4" style="color: var(--v3-vermilion) !important; border-color: rgba(225, 29, 72, 0.25);">
        <i class="fa-solid fa-bolt-lightning"></i>
        <span>Kick Kẹt Acc</span>
      </a>
    </div>
  </div>
</div>

<!-- 2-Column Bento Content Grid -->
<div class="row g-4">
  <!-- Left Column: Account Details -->
  <div class="col-xl-5 col-lg-5">
    <div class="v3-bento-card p-4 h-100">
      <div class="d-flex align-items-center gap-2 pb-3 mb-3" style="border-bottom: 1px solid var(--v3-border);">
        <div class="v3-feature-icon" style="width: 40px; height: 40px; min-width: 40px; border-radius: 12px; font-size: 1rem;">
          <i class="fa-solid fa-scroll"></i>
        </div>
        <h5 class="fw-bold mb-0">{{ __('Account Details') }}</h5>
      </div>

      <div class="d-flex flex-column gap-3">
        <div class="d-flex align-items-center justify-content-between py-2" style="border-bottom: 1px dashed var(--v3-border);">
          <span class="small fw-semibold" style="color: var(--v3-muted);">
            <i class="fa-solid fa-user me-2" style="color: var(--v3-jade);"></i>{{ __('Username') }}
          </span>
          <span class="fw-bold" style="color: var(--v3-ink);">{{ $user->cAccName }}</span>
        </div>

        <div class="d-flex align-items-center justify-content-between py-2" style="border-bottom: 1px dashed var(--v3-border);">
          <span class="small fw-semibold" style="color: var(--v3-muted);">
            <i class="fa-solid fa-address-card me-2" style="color: var(--v3-jade);"></i>{{ __('Full Name') }}
          </span>
          <span class="fw-bold" style="color: var(--v3-ink);">{{ $user->cRealName }}</span>
        </div>

        <div class="d-flex align-items-center justify-content-between py-2" style="border-bottom: 1px dashed var(--v3-border);">
          <span class="small fw-semibold" style="color: var(--v3-muted);">
            <i class="fa-regular fa-calendar-check me-2" style="color: var(--v3-jade);"></i>{{ __('Register Date') }}
          </span>
          <span class="fw-bold" style="color: var(--v3-ink);">{{ $user->registerDate }}</span>
        </div>

        <div class="d-flex align-items-center justify-content-between py-2" style="border-bottom: 1px dashed var(--v3-border);">
          <span class="small fw-semibold" style="color: var(--v3-muted);">
            <i class="fa-solid fa-hourglass-half me-2" style="color: var(--v3-jade);"></i>{{ __('End Date') }}
          </span>
          <span class="fw-bold" style="color: var(--v3-ink);">{{ optional($user->account_habitus)->endDate ?? '—' }}</span>
        </div>

        <div class="d-flex align-items-center justify-content-between pt-1">
          <span class="small fw-semibold" style="color: var(--v3-muted);">
            <i class="fa-solid fa-shield-halved me-2" style="color: var(--v3-jade);"></i>Bảo mật cấp 2
          </span>
          <span class="v3-safe-badge">
            <i class="fa-solid fa-check"></i> Đã kích hoạt
          </span>
        </div>
      </div>
    </div>
  </div>

  <!-- Right Column: Client & Patch Downloads ("Tải về") -->
  <div class="col-xl-7 col-lg-7">
    <div class="v3-bento-card p-4 h-100">
      <div class="d-flex align-items-center gap-2 pb-3 mb-3" style="border-bottom: 1px solid var(--v3-border);">
        <div class="v3-feature-icon" style="width: 40px; height: 40px; min-width: 40px; border-radius: 12px; font-size: 1rem;">
          <i class="fa-solid fa-cloud-arrow-down"></i>
        </div>
        <h5 class="fw-bold mb-0">Tải về Bản Cài Đặt &amp; Cập Nhật</h5>
      </div>

      <p class="small mb-4" style="color: var(--v3-muted);">
        <i class="fa-solid fa-circle-info me-1" style="color: var(--v3-jade);"></i>
        Đã có sẵn thư mục VLTK thì chọn <strong style="color: var(--v3-jade-dark);">Link Patch</strong>, máy mới hoàn toàn thì chọn <strong style="color: var(--v3-vermilion);">Link Full</strong> (chỉ cần tải 1 link).
      </p>

      <div class="row g-3">
        <div class="col-sm-6">
          <a href="https://drive.google.com/file/d/11eWOfNMNvo_PCFIXVak8Qz7rYI5nvtIr/view" target="_blank" rel="noopener noreferrer" class="v3-feature-bento p-3 align-items-center justify-content-between">
            <div class="d-flex align-items-center gap-3">
              <div class="v3-feature-icon" style="width: 44px; height: 44px; min-width: 44px; border-radius: 12px; font-size: 1.1rem;">
                <i class="fa-solid fa-file-zipper"></i>
              </div>
              <div>
                <div class="fw-bold" style="color: var(--v3-ink);">Link Patch 1</div>
                <div class="small" style="color: var(--v3-muted);">Bản gọn nhẹ • Drive</div>
              </div>
            </div>
            <i class="fa-solid fa-download" style="color: var(--v3-jade);"></i>
          </a>
        </div>

        <div class="col-sm-6">
          <a href="https://drive.google.com/file/d/1mlyYsEgAZDyzoheVlqGRK6WXZCiP0eVM/view" target="_blank" rel="noopener noreferrer" class="v3-feature-bento p-3 align-items-center justify-content-between">
            <div class="d-flex align-items-center gap-3">
              <div class="v3-feature-icon" style="width: 44px; height: 44px; min-width: 44px; border-radius: 12px; font-size: 1.1rem;">
                <i class="fa-solid fa-file-zipper"></i>
              </div>
              <div>
                <div class="fw-bold" style="color: var(--v3-ink);">Link Patch 2</div>
                <div class="small" style="color: var(--v3-muted);">Dự phòng • Drive</div>
              </div>
            </div>
            <i class="fa-solid fa-download" style="color: var(--v3-jade);"></i>
          </a>
        </div>

        <div class="col-sm-6">
          <a href="https://drive.google.com/file/d/1HrOGwQkUwZtqcVAfrxT6ojbljMns7IPz/view" target="_blank" rel="noopener noreferrer" class="v3-feature-bento p-3 align-items-center justify-content-between">
            <div class="d-flex align-items-center gap-3">
              <div class="v3-feature-icon" style="width: 44px; height: 44px; min-width: 44px; border-radius: 12px; font-size: 1.1rem; background: var(--v3-vermilion-soft); color: var(--v3-vermilion);">
                <i class="fa-solid fa-hard-drive"></i>
              </div>
              <div>
                <div class="fw-bold" style="color: var(--v3-ink);">Link Full 1</div>
                <div class="small" style="color: var(--v3-muted);">Trọn bộ đầy đủ • Drive</div>
              </div>
            </div>
            <i class="fa-solid fa-download" style="color: var(--v3-vermilion);"></i>
          </a>
        </div>

        <div class="col-sm-6">
          <a href="https://drive.google.com/file/d/1_SgBG0ctqqO72oO2isdsmsdAaIEr8tv0/view" target="_blank" rel="noopener noreferrer" class="v3-feature-bento p-3 align-items-center justify-content-between">
            <div class="d-flex align-items-center gap-3">
              <div class="v3-feature-icon" style="width: 44px; height: 44px; min-width: 44px; border-radius: 12px; font-size: 1.1rem; background: var(--v3-vermilion-soft); color: var(--v3-vermilion);">
                <i class="fa-solid fa-hard-drive"></i>
              </div>
              <div>
                <div class="fw-bold" style="color: var(--v3-ink);">Link Full 2</div>
                <div class="small" style="color: var(--v3-muted);">Full dự phòng • Drive</div>
              </div>
            </div>
            <i class="fa-solid fa-download" style="color: var(--v3-vermilion);"></i>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
