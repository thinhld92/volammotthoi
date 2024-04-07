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
        <p class="text-danger">Vui lòng chuyển khoản vào <strong>1 trong 2 tài khoản</strong> dưới đây, sau đó gởi hình ảnh xác nhận.</p>
      </div>
      <div class="card-body">
        <img width="100%" src="{{getWebsiteConfig('bank_transfer_info') ?? 'https://via.placeholder.com/900x600&text=Xin%20l%E1%BB%97i,%20th%C3%B4ng%20tin%20%C4%91ang%20%C4%91%C6%B0%E1%BB%A3c%20c%E1%BA%ADp%20nh%E1%BA%ADt'}}" alt="">
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