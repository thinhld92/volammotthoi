@extends('hotro.v2.layouts.master')

@section('page_title', __('Payment receive info'))

@section('content')
<div class="row g-4">
  <!-- Left Column: Bank & Momo QR Accounts -->
  <div class="col-xl-8 col-lg-7">
    <div class="hotro-card h-100">
      <div class="hotro-card-header">
        <h5 class="hotro-card-title">
          <i class="fa-solid fa-qrcode"></i>
          <span>{{ __('Payment receive info') }}</span>
        </h5>
      </div>

      <div class="hotro-card-body">
        <div class="hotro-alert hotro-alert-danger mb-4">
          <i class="fa-solid fa-circle-info fs-5"></i>
          <div>
            <div>Vui lòng chuyển khoản vào <strong>1 trong các tài khoản</strong> dưới đây, sau đó tải lên hình ảnh biên lai xác nhận.</div>
            <div class="small mt-1 opacity-90">Sau khi được xác nhận, bạn hãy <strong>thoát game và đăng nhập lại</strong>, đến Tiền Trang để rút xu. Xin cảm ơn!</div>
          </div>
        </div>

        <div class="row g-4">
          <!-- Bank Card -->
          <div class="col-md-6">
            <div class="hotro-qr-card">
              <div class="d-flex align-items-center gap-3 mb-3">
                @if(getWebsiteConfig('bank_logo'))
                  <img src="{{ getWebsiteConfig('bank_logo') }}" alt="Bank" style="height: 38px; width: auto; border-radius: 8px;" />
                @else
                  <div class="hotro-dl-icon"><i class="fa-solid fa-building-columns"></i></div>
                @endif
                <h5 class="mb-0 fw-bold" style="color: var(--text-heading);">{{ getWebsiteConfig('bank_name') ?? 'Ngân Hàng' }}</h5>
              </div>

              <div class="d-flex align-items-center justify-content-between mb-2 small">
                <span class="text-muted">Số TK: <strong style="color: var(--text-heading);">{{ getWebsiteConfig('bank_address') }}</strong></span>
                @if(getWebsiteConfig('bank_address'))
                  <button type="button" class="btn-copy-mini" data-copy="{{ getWebsiteConfig('bank_address') }}">
                    <i class="fa-regular fa-copy"></i> Copy
                  </button>
                @endif
              </div>
              <div class="small text-muted mb-2">
                Chủ TK: <strong style="color: var(--text-heading);">{{ getWebsiteConfig('bank_account') }}</strong>
              </div>

              @if(getWebsiteConfig('bank_qrcode'))
                <img class="hotro-qr-img" src="{{ getWebsiteConfig('bank_qrcode') }}" alt="Bank QR" />
              @endif
            </div>
          </div>

          <!-- Momo Card -->
          <div class="col-md-6">
            <div class="hotro-qr-card">
              <div class="d-flex align-items-center gap-3 mb-3">
                <img src="{{ asset('clients/asset/images/momo_logo.png') }}" alt="Momo" style="height: 38px; width: 38px; border-radius: 8px;" />
                <h5 class="mb-0 fw-bold" style="color: var(--text-heading);">Ví MoMo</h5>
              </div>

              <div class="d-flex align-items-center justify-content-between mb-2 small">
                <span class="text-muted">SĐT Ví: <strong style="color: var(--text-heading);">{{ getWebsiteConfig('momo_address') }}</strong></span>
                @if(getWebsiteConfig('momo_address'))
                  <button type="button" class="btn-copy-mini" data-copy="{{ getWebsiteConfig('momo_address') }}">
                    <i class="fa-regular fa-copy"></i> Copy
                  </button>
                @endif
              </div>
              <div class="small text-muted mb-2">
                Chủ Ví: <strong style="color: var(--text-heading);">{{ getWebsiteConfig('momo_name') }}</strong>
              </div>

              @if(getWebsiteConfig('momo_image'))
                <img class="hotro-qr-img" src="{{ getWebsiteConfig('momo_image') }}" alt="Momo QR" />
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Right Column: Payment Summary & Upload Proof -->
  <div class="col-xl-4 col-lg-5">
    <div class="hotro-card mb-4">
      <div class="hotro-card-header">
        <h5 class="hotro-card-title">
          <i class="fa-solid fa-receipt"></i>
          <span>{{ __('Payment info') }}</span>
        </h5>
      </div>
      <div class="hotro-card-body">
        <ul class="hotro-info-list">
          <li class="hotro-info-item">
            <span class="hotro-info-label"><i class="fa-solid fa-user"></i> {{ __('Username') }}</span>
            <span class="hotro-info-value">{{ auth()->user()->cAccName }}</span>
          </li>
          <li class="hotro-info-item">
            <span class="hotro-info-label"><i class="fa-solid fa-money-bill-wave"></i> {{ __('Amount') }}</span>
            <span class="hotro-info-value text-danger">{{ number_format($payment->amount) }} VND</span>
          </li>
          <li class="hotro-info-item">
            <span class="hotro-info-label"><i class="fa-solid fa-coins"></i> {{ __('Coin receive') }}</span>
            <span class="hotro-info-value text-warning">{{ number_format($payment->coin) }} Xu</span>
          </li>
        </ul>
      </div>
    </div>

    <div class="hotro-card">
      <div class="hotro-card-header">
        <h5 class="hotro-card-title">
          <i class="fa-solid fa-file-arrow-up"></i>
          <span>{{ __('Confirm payment info') }}</span>
        </h5>
      </div>
      <div class="hotro-card-body">
        <div class="mb-3 text-center">
          <img
            class="img-fluid rounded-3 border"
            style="max-height: 240px; border-color: var(--border-gold) !important; object-fit: contain;"
            src="{{ old('image') ?? $payment->image ?? asset('backend/assets/img/functions/no-image.jpg') }}"
            alt="Ảnh biên lai"
            id="uploadedImage"
          />
        </div>

        <form action="{{ route('hotro.payments.transaction', $payment) }}" method="POST" enctype="multipart/form-data">
          @method('PUT')
          @csrf
          <div class="d-grid gap-2">
            <label for="upload" class="btn-modern-secondary w-100 py-2 cursor-pointer" tabindex="0">
              <i class="fa-solid fa-image"></i>
              <span>Chọn Ảnh Biên Lai</span>
              <input
                type="file"
                id="upload"
                class="account-file-input"
                hidden
                accept="image/png, image/jpeg"
                name="image"
                required
              />
            </label>

            <button class="btn-modern-primary w-100 py-2" type="submit">
              <i class="fa-solid fa-paper-plane"></i>
              <span>Gửi Xác Nhận Thanh Toán</span>
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const transferImage = document.getElementById('uploadedImage');
    const fileInput = document.querySelector('.account-file-input');

    if (transferImage && fileInput) {
      fileInput.onchange = function () {
        if (fileInput.files && fileInput.files[0]) {
          transferImage.src = window.URL.createObjectURL(fileInput.files[0]);
        }
      };
    }

    document.querySelectorAll('[data-copy]').forEach(function (btn) {
      btn.addEventListener('click', function () {
        const text = btn.getAttribute('data-copy');
        if (navigator.clipboard && text) {
          navigator.clipboard.writeText(text).then(function () {
            const orig = btn.innerHTML;
            btn.innerHTML = '<i class="fa-solid fa-check"></i> Đã chép';
            setTimeout(function () { btn.innerHTML = orig; }, 1800);
          });
        }
      });
    });
  });
</script>
@endsection
