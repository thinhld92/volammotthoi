@extends('hotro.v5.layouts.master')

@section('page_title', 'Tổng Quan Tài Khoản')

@section('content')
<!-- Hero Profile Banner Card (Biện Kinh Địa Đồ) -->
<div class="v5-card mb-4">
  <div class="v5-profile-banner" style="background-image: url('{{ asset('frontend/assets/images/v5/hotro_bienkinh.jpg') }}');">
    <div class="v5-avatar-ring">
      <img src="{{ $user->photo }}" alt="{{ $user->cAccName }}" />
    </div>

    <h2 class="fw-bolder mb-1 text-white">{{ $user->cAccName }}</h2>
    <div class="d-inline-flex align-items-center gap-2 mb-3 small fw-semibold" style="color: var(--v5-gold-light);">
      <i class="fa-regular fa-compass"></i>
      <span>{{ $user->cRealName ?: 'Hiệp Khách Giang Hồ' }}</span>
    </div>

    <div class="d-flex flex-wrap justify-content-center gap-2">
      <a href="{{ route('hotro.users.edit') }}" class="btn-v5-gold py-2 px-4">
        <i class="fa-solid fa-user-pen"></i>
        <span>Đổi Mật Khẩu &amp; Thông Tin</span>
      </a>
      <a href="{{ route('hotro.users.kick-acc') }}" class="btn-v5-jade py-2 px-4">
        <i class="fa-solid fa-bolt-lightning"></i>
        <span>Kick Kẹt Acc</span>
      </a>
    </div>
  </div>
</div>

<div class="row g-4">
  <!-- Left Column: Account Details -->
  <div class="col-xl-5 col-lg-5">
    <div class="v5-card p-4 h-100">
      <div class="d-flex align-items-center gap-2 pb-3 mb-3" style="border-bottom: 1px solid var(--v5-gold-border);">
        <i class="fa-solid fa-scroll fs-5" style="color: var(--v5-gold-light);"></i>
        <h5 class="fw-bold mb-0" style="color: var(--v5-gold-light);">{{ __('Account Details') }}</h5>
      </div>

      <div class="d-flex flex-column gap-3">
        <div class="d-flex align-items-center justify-content-between py-2" style="border-bottom: 1px dashed var(--v5-border-subtle);">
          <span class="small fw-semibold" style="color: var(--v5-text-muted);">
            <i class="fa-solid fa-user me-2" style="color: var(--v5-gold);"></i>{{ __('Username') }}
          </span>
          <span class="fw-bold text-white">{{ $user->cAccName }}</span>
        </div>

        <div class="d-flex align-items-center justify-content-between py-2" style="border-bottom: 1px dashed var(--v5-border-subtle);">
          <span class="small fw-semibold" style="color: var(--v5-text-muted);">
            <i class="fa-solid fa-address-card me-2" style="color: var(--v5-gold);"></i>{{ __('Full Name') }}
          </span>
          <span class="fw-bold text-white">{{ $user->cRealName }}</span>
        </div>

        <div class="d-flex align-items-center justify-content-between py-2" style="border-bottom: 1px dashed var(--v5-border-subtle);">
          <span class="small fw-semibold" style="color: var(--v5-text-muted);">
            <i class="fa-regular fa-calendar-check me-2" style="color: var(--v5-gold);"></i>{{ __('Register Date') }}
          </span>
          <span class="fw-bold text-white">{{ $user->registerDate }}</span>
        </div>

        <div class="d-flex align-items-center justify-content-between py-2" style="border-bottom: 1px dashed var(--v5-border-subtle);">
          <span class="small fw-semibold" style="color: var(--v5-text-muted);">
            <i class="fa-solid fa-hourglass-half me-2" style="color: var(--v5-gold);"></i>{{ __('End Date') }}
          </span>
          <span class="fw-bold text-white">{{ optional($user->account_habitus)->endDate ?? '—' }}</span>
        </div>

        <div class="d-flex align-items-center justify-content-between pt-1">
          <span class="small fw-semibold" style="color: var(--v5-text-muted);">
            <i class="fa-solid fa-shield-halved me-2" style="color: var(--v5-gold);"></i>Bảo mật cấp 2
          </span>
          <span class="v5-badge">
            <i class="fa-solid fa-check"></i> Đã kích hoạt
          </span>
        </div>
      </div>
    </div>
  </div>

  <!-- Right Column: Client & Patch Downloads ("Tải về") -->
  <div class="col-xl-7 col-lg-7">
    <div class="v5-card p-4 h-100">
      <div class="d-flex align-items-center gap-2 pb-3 mb-3" style="border-bottom: 1px solid var(--v5-gold-border);">
        <i class="fa-solid fa-cloud-arrow-down fs-5" style="color: var(--v5-gold-light);"></i>
        <h5 class="fw-bold mb-0" style="color: var(--v5-gold-light);">Tải về Bản Cài Đặt</h5>
      </div>

      <p class="small mb-4" style="color: var(--v5-text-muted);">
        <i class="fa-solid fa-circle-info me-1" style="color: var(--v5-gold-light);"></i>
        Đã có sẵn thư mục VLTK thì chọn <strong style="color: var(--v5-jade-bright);">Patch 1 / Patch 2</strong>, máy mới hoàn toàn thì chọn <strong style="color: var(--v5-gold-light);">Full 1 / Full 2</strong>.
      </p>

      <div class="row g-3">
        <div class="col-sm-6">
          <a href="https://drive.google.com/file/d/11eWOfNMNvo_PCFIXVak8Qz7rYI5nvtIr/view" target="_blank" rel="noopener noreferrer" class="v5-card p-3 d-flex align-items-center justify-content-between">
            <div>
              <div class="fw-bold text-white"><i class="fa-solid fa-download me-2" style="color: var(--v5-jade-bright);"></i>Patch 1</div>
              <div class="small" style="color: var(--v5-text-muted);">Bản gọn nhẹ • Google Drive</div>
            </div>
            <i class="fa-solid fa-arrow-up-right-from-square small" style="color: var(--v5-gold-light);"></i>
          </a>
        </div>

        <div class="col-sm-6">
          <a href="https://drive.google.com/file/d/1mlyYsEgAZDyzoheVlqGRK6WXZCiP0eVM/view" target="_blank" rel="noopener noreferrer" class="v5-card p-3 d-flex align-items-center justify-content-between">
            <div>
              <div class="fw-bold text-white"><i class="fa-solid fa-download me-2" style="color: var(--v5-jade-bright);"></i>Patch 2</div>
              <div class="small" style="color: var(--v5-text-muted);">Link dự phòng • Google Drive</div>
            </div>
            <i class="fa-solid fa-arrow-up-right-from-square small" style="color: var(--v5-gold-light);"></i>
          </a>
        </div>

        <div class="col-sm-6">
          <a href="https://drive.google.com/file/d/1HrOGwQkUwZtqcVAfrxT6ojbljMns7IPz/view" target="_blank" rel="noopener noreferrer" class="v5-card p-3 d-flex align-items-center justify-content-between">
            <div>
              <div class="fw-bold" style="color: var(--v5-gold-light);"><i class="fa-solid fa-hard-drive me-2"></i>Full 1</div>
              <div class="small" style="color: var(--v5-text-muted);">Trọn bộ đầy đủ • Google Drive</div>
            </div>
            <i class="fa-solid fa-arrow-up-right-from-square small" style="color: var(--v5-gold-light);"></i>
          </a>
        </div>

        <div class="col-sm-6">
          <a href="https://drive.google.com/file/d/1_SgBG0ctqqO72oO2isdsmsdAaIEr8tv0/view" target="_blank" rel="noopener noreferrer" class="v5-card p-3 d-flex align-items-center justify-content-between">
            <div>
              <div class="fw-bold" style="color: var(--v5-gold-light);"><i class="fa-solid fa-hard-drive me-2"></i>Full 2</div>
              <div class="small" style="color: var(--v5-text-muted);">Full dự phòng • Google Drive</div>
            </div>
            <i class="fa-solid fa-arrow-up-right-from-square small" style="color: var(--v5-gold-light);"></i>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
