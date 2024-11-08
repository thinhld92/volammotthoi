@extends('hotro.layouts.master')

@section('link_css')
<link rel="stylesheet" href="{{asset('backend/assets/vendor/css/pages/page-profile.css')}}" />
@endsection
@section('content')

<!-- User Profile Content -->
<div class="row">
  <div class="col-xl-8 col-lg-7 col-md-7">
    <div class="card">
      <div class="card-header">
        <h5 class="">{{ __('Payment receive info') }}</h5>
        <p class="text-danger">Vui lòng chuyển khoản vào <strong>1 trong các tài khoản</strong> dưới đây, sau đó gởi hình ảnh xác nhận.</p>
        <p class="text-danger">Sau khi được xác nhận bạn sẽ phải <strong>thoát ra và đăng nhập lại</strong>, đến tiền trang để rút xu. Xin cảm ơn rất nhiều!</p>
        <div class="row">
          <div class="col-lg-6 col-sm-6 mb-4">
            <div class="card card-border-shadow-success h-100">
              <div class="card-body">
                <div class="d-flex align-items-center mb-2 pb-1">
                  <div class="avatar me-2">
                    <img src="{{getWebsiteConfig('bank_logo')}}" alt="">
                  </div>
                  <h4 class="ms-1 mb-0">{{getWebsiteConfig('bank_name')}}</h4>
                </div>
                <p class="mb-1">STK: {{getWebsiteConfig('bank_address')}}</p>
                <p class="mb-1">Tên TK: {{getWebsiteConfig('bank_account')}}</p>
                <img class="card-img-top mt-2" src="{{getWebsiteConfig('bank_qrcode')}}" alt="">
              </div>
            </div>
          </div>
  
          <div class="col-lg-6 col-sm-6 mb-4">
            <div class="card card-border-shadow-danger h-100">
              <div class="card-body">
                <div class="d-flex align-items-center mb-2 pb-1">
                  <div class="avatar me-2">
                    <img src="{{asset('clients/asset/images/momo_logo.png')}}" alt="">
                  </div>
                  <h4 class="ms-1 mb-0">Momo</h4>
                </div>
                <p class="mb-1">STK: {{getWebsiteConfig('momo_address')}}</p>
                <p class="mb-1">Tên TK: {{getWebsiteConfig('momo_name')}}</p>
                <img class="card-img-top mt-2" src="{{getWebsiteConfig('momo_image')}}" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
  </div>
  <div class="col-xl-4 col-lg-5 col-md-5">
    <!-- About User -->
    <div class="card mb-4">
      <div class="card-body">
        <small class="card-text text-uppercase">{{ __('Payment info') }}</small>
        <ul class="list-unstyled mb-4 mt-3">
          <li class="d-flex align-items-center mb-3">
            <i class="fa fa-user"></i>
            <span class="fw-medium mx-2 text-heading">{{ __('Username') }}:</span> <span>{{ auth()->user()->cAccName }}</span>
          </li>
          <li class="d-flex align-items-center mb-3">
            <i class="fa-solid fa-lightbulb-dollar"></i>
            <span class="fw-medium mx-2 text-heading">{{ __('Amount') }} (VND) :</span><strong>{{number_format($payment->amount)}}</strong><span></span>
          </li>
          <li class="d-flex align-items-center mb-3">
            <i class="fa-solid fa-coin"></i>
            <span class="fw-medium mx-2 text-heading">{{ __('Coin receive') }}:</span><strong>{{number_format($payment->coin)}}</strong><span></span>
          </li>
        </ul>
      </div>
    </div>
    <!--/ About User -->
    <div class="card">
      <h5 class="card-header">{{ __('Confirm payment info') }}</h5>
      <div class="card-body">
        <div class="mb-3">
          <img class="card-img" 
            src="{{old('image') ?? $payment->image ?? asset('backend/assets/img/functions/no-image.jpg')}}" 
            alt=""
            id="uploadedImage"
          >
        </div>
        <div>
          <form action="{{route('hotro.payments.transaction', $payment)}}" method="post" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="button-wrapper">
              <label for="upload" class="btn btn-primary me-2 mb-3" tabindex="0">
                <span class="d-none d-sm-block">Chọn ảnh xác nhận</span>
                <i class="ti ti-upload d-block d-sm-none"></i>
                <input
                  type="file"
                  id="upload"
                  class="account-file-input"
                  hidden
                  accept="image/png, image/jpeg"
                  name="image"
                />
              </label>
              {{-- <div class="text-muted">Allowed JPG, GIF or PNG. Max size of 800K</div> --}}
            </div>
            <button class="btn btn-success" type="submit">Gởi thông tin</button>
        </form>
        </div>
      </div>
    </div>

  </div>
  
</div>
<!--/ User Profile Content -->
    
@endsection

@section('script')
<script src="{{asset('backend/assets/js/pages-profile.js')}}"></script>

<script>
  document.addEventListener('DOMContentLoaded', function (e) {
  (function () {
    // Update/reset user image of account page
    let transferImage = document.getElementById('uploadedImage');
    const fileInput = document.querySelector('.account-file-input');

    if (transferImage) {
      fileInput.onchange = () => {
        if (fileInput.files[0]) {
          transferImage.src = window.URL.createObjectURL(fileInput.files[0]);

        }

      };
    }
  })();
  });
</script>
    
@endsection