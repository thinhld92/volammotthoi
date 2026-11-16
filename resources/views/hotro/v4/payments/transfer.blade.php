@extends('hotro.v4.layouts.master')

@section('page_title', __('Payment receive info'))

@section('content')
<div class="row g-4">
  <div class="col-xl-8 col-lg-7">
    <div class="v4-card p-4 h-100">
      <h5 class="fw-bolder mb-3 text-white">{{ __('Payment receive info') }}</h5>

      <div class="v4-alert v4-alert-danger mb-4">
        <i class="fa-solid fa-circle-info fs-5"></i>
        <span>Vui lòng chuyển khoản vào 1 trong các tài khoản dưới đây và tải lên hình ảnh biên lai xác nhận.</span>
      </div>

      <div class="row g-4">
        <div class="col-md-6">
          <div class="p-3 rounded-2 h-100" style="background: rgba(11, 5, 7, 0.5); border: 1px solid var(--v4-bronze-border);">
            <h6 class="fw-bold mb-2 text-white">{{ getWebsiteConfig('bank_name') ?? 'Ngân Hàng' }}</h6>
            <div class="small mb-1">Số TK: <strong class="text-white">{{ getWebsiteConfig('bank_address') }}</strong></div>
            <div class="small mb-2">Chủ TK: <strong class="text-white">{{ getWebsiteConfig('bank_account') }}</strong></div>
            @if(getWebsiteConfig('bank_qrcode'))
              <img class="img-fluid rounded-2 mt-2" src="{{ getWebsiteConfig('bank_qrcode') }}" alt="Bank QR" />
            @endif
          </div>
        </div>

        <div class="col-md-6">
          <div class="p-3 rounded-2 h-100" style="background: rgba(11, 5, 7, 0.5); border: 1px solid var(--v4-bronze-border);">
            <h6 class="fw-bold mb-2 text-white">Ví MoMo</h6>
            <div class="small mb-1">SĐT: <strong class="text-white">{{ getWebsiteConfig('momo_address') }}</strong></div>
            <div class="small mb-2">Chủ Ví: <strong class="text-white">{{ getWebsiteConfig('momo_name') }}</strong></div>
            @if(getWebsiteConfig('momo_image'))
              <img class="img-fluid rounded-2 mt-2" src="{{ getWebsiteConfig('momo_image') }}" alt="Momo QR" />
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-4 col-lg-5">
    <div class="v4-card p-4">
      <h5 class="fw-bolder mb-3 text-white">{{ __('Confirm payment info') }}</h5>
      <div class="small mb-3">
        <div>{{ __('Username') }}: <strong class="text-white">{{ auth()->user()->cAccName }}</strong></div>
        <div>{{ __('Amount') }}: <strong style="color: #FCA5A5;">{{ number_format($payment->amount) }} VND</strong></div>
        <div>{{ __('Coin receive') }}: <strong style="color: var(--v4-bronze-light);">{{ number_format($payment->coin) }} Xu</strong></div>
      </div>

      <div class="mb-3 text-center">
        <img
          class="img-fluid rounded-2 border"
          style="max-height: 220px; border-color: var(--v4-bronze-border) !important; object-fit: contain;"
          src="{{ old('image') ?? $payment->image ?? asset('backend/assets/img/functions/no-image.jpg') }}"
          alt="Ảnh biên lai"
          id="uploadedImage"
        />
      </div>

      <form action="{{ route('hotro.payments.transaction', $payment) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="d-grid gap-2">
          <label for="upload" class="btn-v4-bronze w-100 py-2" tabindex="0">
            <i class="fa-solid fa-image"></i>
            <span>Chọn Ảnh Biên Lai</span>
            <input type="file" id="upload" class="account-file-input" hidden accept="image/png, image/jpeg" name="image" required />
          </label>
          <button class="btn-v4-crimson w-100 py-2" type="submit">
            <i class="fa-solid fa-paper-plane"></i>
            <span>Gửi Xác Nhận</span>
          </button>
        </div>
      </form>
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
  });
</script>
@endsection
