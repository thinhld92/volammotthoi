@extends('hotro.v2.layouts.master')

@section('page_title', 'Tổng Quan Tài Khoản')

@section('content')
<!-- Hero Profile Banner Card (Concept A) -->
<div class="hotro-hero-card mb-4">
  <div class="hotro-hero-visual" style="background-image: url('{{ asset('frontend/assets/images/hotro_hero_banner.jpg') }}');">
    <div class="hotro-avatar-ring">
      <img src="{{ $user->photo }}" alt="{{ $user->cAccName }}" />
    </div>

    <h2 class="hotro-hero-username">{{ $user->cAccName }}</h2>
    <div class="hotro-hero-realname">
      <i class="fa-solid fa-award text-warning"></i>
      <span>{{ $user->cRealName ?: 'Hiệp Khách Giang Hồ' }}</span>
    </div>

    <div class="hotro-hero-actions">
      <a href="{{ route('hotro.users.edit') }}" class="btn-hotro-gold-outline">
        <i class="fa-solid fa-user-pen"></i>
        <span>Đổi Mật Khẩu & Thông Tin</span>
      </a>
      <a href="{{ route('hotro.users.kick-acc') }}" class="btn-hotro-danger-outline">
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
    <div class="hotro-card h-100">
      <div class="hotro-card-header">
        <h5 class="hotro-card-title">
          <i class="fa-solid fa-scroll"></i>
          <span>{{ __('Account Details') }}</span>
        </h5>
      </div>
      <div class="hotro-card-body">
        <ul class="hotro-info-list">
          <li class="hotro-info-item">
            <span class="hotro-info-label">
              <i class="fa-solid fa-user"></i>
              <span>{{ __('Username') }}</span>
            </span>
            <span class="hotro-info-value">{{ $user->cAccName }}</span>
          </li>

          <li class="hotro-info-item">
            <span class="hotro-info-label">
              <i class="fa-solid fa-address-card"></i>
              <span>{{ __('Full Name') }}</span>
            </span>
            <span class="hotro-info-value">{{ $user->cRealName }}</span>
          </li>

          <li class="hotro-info-item">
            <span class="hotro-info-label">
              <i class="fa-regular fa-calendar-check"></i>
              <span>{{ __('Register Date') }}</span>
            </span>
            <span class="hotro-info-value">{{ $user->registerDate }}</span>
          </li>

          <li class="hotro-info-item">
            <span class="hotro-info-label">
              <i class="fa-solid fa-hourglass-half"></i>
              <span>{{ __('End Date') }}</span>
            </span>
            <span class="hotro-info-value">{{ optional($user->account_habitus)->endDate ?? '—' }}</span>
          </li>

          <li class="hotro-info-item">
            <span class="hotro-info-label">
              <i class="fa-solid fa-shield-halved"></i>
              <span>Bảo mật cấp 2</span>
            </span>
            <span class="hotro-safe-pill">
              <i class="fa-solid fa-check"></i> Đã bảo vệ
            </span>
          </li>
        </ul>
      </div>
    </div>
  </div>

  <!-- Right Column: Game Client & Patch Downloads -->
  <div class="col-xl-7 col-lg-7">
    <div class="hotro-card h-100">
      <div class="hotro-card-header">
        <h5 class="hotro-card-title">
          <i class="fa-solid fa-cloud-arrow-down"></i>
          <span>Tải Game & Bản Cập Nhật</span>
        </h5>
      </div>
      <div class="hotro-card-body">
        <p class="text-muted small mb-4">
          <i class="fa-solid fa-circle-info text-warning me-1"></i>
          Đã có sẵn data nền thì tải <strong class="text-warning">Bản Patch</strong>, chưa có gì thì tải <strong class="text-info">Bản Full</strong> (chỉ cần tải 1 trong các link dự phòng bên dưới).
        </p>

        <div class="hotro-download-grid">
          <a href="https://drive.google.com/file/d/11eWOfNMNvo_PCFIXVak8Qz7rYI5nvtIr/view" target="_blank" rel="noopener noreferrer" class="hotro-download-card">
            <div class="d-flex align-items-center gap-3">
              <div class="hotro-dl-icon">
                <i class="fa-solid fa-file-zipper"></i>
              </div>
              <div>
                <div class="fw-bold" style="color: var(--text-heading);">Link Patch 1</div>
                <div class="small text-muted">Bản gọn nhẹ • Google Drive</div>
              </div>
            </div>
            <i class="fa-solid fa-download text-warning"></i>
          </a>

          <a href="https://drive.google.com/file/d/1mlyYsEgAZDyzoheVlqGRK6WXZCiP0eVM/view" target="_blank" rel="noopener noreferrer" class="hotro-download-card">
            <div class="d-flex align-items-center gap-3">
              <div class="hotro-dl-icon">
                <i class="fa-solid fa-file-zipper"></i>
              </div>
              <div>
                <div class="fw-bold" style="color: var(--text-heading);">Link Patch 2</div>
                <div class="small text-muted">Link dự phòng • Google Drive</div>
              </div>
            </div>
            <i class="fa-solid fa-download text-warning"></i>
          </a>

          <a href="https://drive.google.com/file/d/1HrOGwQkUwZtqcVAfrxT6ojbljMns7IPz/view" target="_blank" rel="noopener noreferrer" class="hotro-download-card full-client">
            <div class="d-flex align-items-center gap-3">
              <div class="hotro-dl-icon">
                <i class="fa-solid fa-hard-drive"></i>
              </div>
              <div>
                <div class="fw-bold" style="color: var(--text-heading);">Link Full 1</div>
                <div class="small text-muted">Trọn bộ đầy đủ • Google Drive</div>
              </div>
            </div>
            <i class="fa-solid fa-download text-info"></i>
          </a>

          <a href="https://drive.google.com/file/d/1_SgBG0ctqqO72oO2isdsmsdAaIEr8tv0/view" target="_blank" rel="noopener noreferrer" class="hotro-download-card full-client">
            <div class="d-flex align-items-center gap-3">
              <div class="hotro-dl-icon">
                <i class="fa-solid fa-hard-drive"></i>
              </div>
              <div>
                <div class="fw-bold" style="color: var(--text-heading);">Link Full 2</div>
                <div class="small text-muted">Full dự phòng • Google Drive</div>
              </div>
            </div>
            <i class="fa-solid fa-download text-info"></i>
          </a>
        </div>
      </div>
    </div>
  </div>

  @if(false)
  <div class="col-12">
    <div class="hotro-card">
      <div class="hotro-card-header">
        <h5 class="hotro-card-title">
          <i class="fa-solid fa-clock-rotate-left"></i>
          <span>{{ __('Payment history') }}</span>
        </h5>
      </div>
      <div class="hotro-card-body">
        <div class="table-responsive">
          <table class="table align-middle mb-0">
            <thead>
              <tr>
                <th>Số tiền</th>
                <th>Số xu</th>
                <th>Trạng thái</th>
                <th class="text-center">Thao tác</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($payments as $payment)
                @if ($payment->status != \App\Enums\PaymentStatus::COMPLETED && $payment->status != \App\Enums\PaymentStatus::BONUS)
                  <tr>
                    <td class="fw-bold">{{ number_format($payment->amount) }} VND</td>
                    <td class="text-warning fw-bold">{{ number_format($payment->coin) }} Xu</td>
                    <td>
                      @if (in_array($payment->status, $array_accept))
                        <a href="{{ route('hotro.payments.transfer', $payment) }}">
                          <span class="badge-modern badge-modern-gold mb-0">{{ $payment->status_name }}</span>
                        </a>
                      @else
                        <span class="badge-modern badge-modern-blue mb-0">{{ $payment->status_name }}</span>
                      @endif
                    </td>
                    <td class="text-center">
                      @if (in_array($payment->status, $array_accept))
                        <div class="d-inline-flex gap-2">
                          <a href="{{ route('hotro.payments.transfer', $payment) }}" class="btn btn-sm btn-success" title="Đi đến thanh toán">
                            <i class="fa-solid fa-forward"></i>
                          </a>
                          <a href="#" class="btn btn-sm btn-danger" onclick="submitFormDelete(event, {{ $payment->id }})" title="Huỷ lệnh nạp">
                            <form id="form-delete-{{ $payment->id }}" action="{{ route('hotro.payments.cancel', $payment) }}" method="POST" class="d-none">
                              @csrf
                              @method('PUT')
                            </form>
                            <i class="fa-solid fa-trash"></i>
                          </a>
                        </div>
                      @endif
                    </td>
                  </tr>
                @endif
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  @endif
</div>
@endsection

@section('script')
<script>
  function submitFormDelete(event, id) {
    event.preventDefault();
    const form = document.getElementById('form-delete-' + id);
    if (form) form.submit();
  }
</script>
@endsection
