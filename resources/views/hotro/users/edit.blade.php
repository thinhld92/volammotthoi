@extends('hotro.layouts.master')

@section('link_css')
<link rel="stylesheet" href="{{asset('backend/assets/vendor/libs/flatpickr/flatpickr.css')}}" />
<link rel="stylesheet" href="{{asset('backend/assets/vendor/libs/select2/select2.css')}}" />
@endsection

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card mb-4">
      <h5 class="card-header">Profile Details</h5>
      <!-- Account -->
      <div class="card-body">
        @csrf
        <div class="d-flex align-items-start align-items-sm-center gap-4">
          <img
            src="{{ $user->photo }}"
            alt="user-avatar"
            class="d-block w-px-100 h-px-100 rounded"
            id="uploadedAvatar" />
          <div class="button-wrapper">
            <label for="upload" class="btn btn-primary me-2 mb-3" tabindex="0">
              <span class="d-none d-sm-block">Upload new photo</span>
              <i class="ti ti-upload d-block d-sm-none"></i>
              <input
                type="file"
                id="upload"
                class="account-file-input"
                hidden
                accept="image/png, image/jpeg" />
            </label>
            <button type="button" class="btn btn-label-secondary account-image-reset mb-3">
              <i class="ti ti-refresh-dot d-block d-sm-none"></i>
              <span class="d-none d-sm-block">Reset</span>
            </button>

            <div class="text-muted">Allowed JPG, GIF or PNG. Max size of 800K</div>
          </div>
        </div>
      </div>
      <hr class="my-0" />
      <div class="card-body">
        @if ($errors->any())
          <div class="alert alert-danger">
            {{ "Đã có lỗi xảy ra, vui lòng kiểm tra lại" }}
          </div>
        @endif
        <form 
        class="card-body needs-validation {{$errors->any() ? 'was-validated custom-validate' : ''}}" 
        method="post" 
        action="{{route('hotro.users.update')}}"
      >
        @csrf
        @method('PUT')
        <h6>1. {{ __('Account Details') }}</h6>
        <div class="row g-3">
          {{-- account --}}
          <div class="col-md-6">
            <label class="form-label" for="multicol-username">{{__('Username')}} <span class="text-danger">(*)</span></label>
            <input 
              type="text"
              id="multicol-username" 
              class="form-control {{$errors->get('cAccName') ? 'custom-invalid' : ''}}" 
              placeholder="john.doe"
              value="{{ $user->cAccName }}"
              readonly
              disabled
            />
          </div>
          <div class="col-md-6">
            <label class="form-label" for="multicol-email">{{__('Email')}} <span class="text-danger">(*)</span></label>
            <div class="input-group input-group-merge">
              <input
                type="text"
                name="cEMail"
                id="multicol-email"
                class="form-control {{$errors->get('cEMail') ? 'custom-invalid' : ''}}"
                placeholder="john.doe"
                aria-label="john.doe"
                aria-describedby="multicol-email2" 
                value="{{ old('cEMail') ?? $user->cEMail ?? '' }}"
              />
              @foreach ($errors->get('cEMail') as $message)
                <div class="invalid-feedback">{{$message}}</div>
              @endforeach
            </div>
          </div>
          {{-- password --}}
          <div class="col-md-6">
            <div class="form-password-toggle">
              <label class="form-label" for="multicol-password">{{__('Password')}} <span class="text-danger">(*)</span></label>
              <div class="input-group input-group-merge">
                <input
                  type="password"
                  name="cPassWord"
                  id="multicol-password"
                  class="form-control {{$errors->get('cPassWord') ? 'custom-invalid' : ''}}"
                  placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                  aria-describedby="multicol-password2" />
                <span class="input-group-text cursor-pointer" id="multicol-password2"
                  ><i class="ti ti-eye-off"></i
                ></span>
              </div>
              @foreach ($errors->get('cPassWord') as $message)
                <div class="invalid-feedback">{{$message}}</div>
              @endforeach
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-password-toggle">
              <label class="form-label" for="multicol-confirm-password">{{__('Confirm Password')}} <span class="text-danger">(*)</span></label>
              <div class="input-group input-group-merge">
                <input
                  type="password"
                  name="cPassWord_confirmation"
                  id="multicol-confirm-password"
                  class="form-control"
                  placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                  aria-describedby="multicol-confirm-password2" />
                <span class="input-group-text cursor-pointer" id="multicol-confirm-password2"
                  ><i class="ti ti-eye-off"></i
                ></span>
              </div>
            </div>
          </div>
          {{-- password 2 --}}
          <div class="col-md-6">
            <div class="form-password-toggle">
              <label class="form-label" for="multicol-cSecPassword">{{__('Password 2')}} <span class="text-danger">(*)</span></label>
              <div class="input-group input-group-merge">
                <input
                  type="password"
                  name="cSecPassword"
                  id="multicol-cSecPassword"
                  class="form-control {{$errors->get('cSecPassword') ? 'custom-invalid' : ''}}"
                  placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                  aria-describedby="multicol-cSecPassword" />
                <span class="input-group-text cursor-pointer" id="multicol-cSecPassword2"
                  ><i class="ti ti-eye-off"></i
                ></span>
              </div>
              @foreach ($errors->get('cSecPassword') as $message)
                <div class="invalid-feedback">{{$message}}</div>
              @endforeach
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-password-toggle">
              <label class="form-label" for="multicol-old-password">{{__('Current Password 2')}} <span class="text-danger">(*)</span></label>
              <div class="input-group input-group-merge">
                <input
                  type="password"
                  name="old_cSecPassword"
                  id="multicol-old-cSecPassword"
                  class="form-control"
                  placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                  aria-describedby="multicol-old-cSecPassword" />
                <span class="input-group-text cursor-pointer" id="multicol-old-cSecPassword2"
                  ><i class="ti ti-eye-off"></i
                ></span>
              </div>
              @foreach ($errors->get('old_cSecPassword') as $message)
                <div class="invalid-feedback">{{$message}}</div>
              @endforeach
            </div>
          </div>
        </div>
        
        <hr class="my-4 mx-n4" />

        <h6>2. {{ __('Personal Info') }}</h6>
        <div class="row g-3">
          <div class="col-md-6">
            <label class="form-label" for="multicol-first-name">{{ __('Full Name') }} <span class="text-danger">(*)</span></label>
            <input 
              type="text" 
              name="cRealName"
              id="multicol-first-name" 
              class="form-control {{$errors->get('cRealName') ? 'custom-invalid' : ''}}" 
              placeholder="John" 
              value="{{ old('cRealName') ?? $user->cRealName ?? '' }}"
            />
            @foreach ($errors->get('cRealName') as $message)
              <div class="invalid-feedback">{{$message}}</div>
            @endforeach
          </div>
          <div class="col-md-6">
            <label class="form-label" for="multicol-last-name">{{ __('ID') }}</label>
            <input 
              type="text" 
              name="cIDNum"
              id="multicol-last-name" 
              class="form-control" 
              placeholder="Ex: 0xxx xxx xxx"
              value="{{ old('cIDNum') ?? $user->cIDNum ?? '' }}" 
            />
            @foreach ($errors->get('cIDNum') as $message)
              <div class="invalid-feedback">{{$message}}</div>
            @endforeach
          </div>
          <div class="col-md-6">
            <label class="form-label" for="multicol-birthdate">{{__('Birth Date')}}</label>
            <input
              type="text"
              name="dBirthDay"
              id="multicol-birthdate"
              class="form-control dob-picker"
              placeholder="{{ __('YYYY-MM-DD') }}" 
              value="{{$user->dBirthDay}}"
            />
          </div>
          <div class="col-md-6">
            <label class="form-label" for="multicol-phone">{{__('Phone Number')}}</label>
            <input
              type="text"
              name="cPhone"
              id="multicol-phone"
              class="form-control phone-mask"
              placeholder="Ex: 0xxx xxx xxx"
              aria-label="0369 799 894" 
              value="{{ old('cPhone') ?? $user->cPhone ?? '' }}"
            />
            @foreach ($errors->get('cPhone') as $message)
              <div class="invalid-feedback">{{$message}}</div>
            @endforeach
          </div>
        </div>

        <hr class="my-4 mx-n4" />

    

        <div class="pt-4">
          <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
          {{-- <button type="reset" class="btn btn-label-secondary">Reset</button> --}}
        </div>
      </form>
      </div>
      <!-- /Account -->
    </div>
  </div>
</div>
    
@endsection

@section('script')

<script src="{{asset('backend/assets/vendor/libs/cleavejs/cleave.js')}}"></script>
<script src="{{asset('backend/assets/vendor/libs/cleavejs/cleave-phone.js')}}"></script>
<script src="{{asset('backend/assets/vendor/libs/moment/moment.js')}}"></script>
<script src="{{asset('backend/assets/vendor/libs/flatpickr/flatpickr.js')}}"></script>
<script src="{{asset('backend/assets/vendor/libs/select2/select2.js')}}"></script>
<!-- Page JS -->
<script src="{{asset('backend/assets/js/form-layouts.js')}}"></script>

<script>
  document.addEventListener('DOMContentLoaded', function (e) {
  (function () {
    // Update/reset user image of account page
    let accountUserImage = document.getElementById('uploadedAvatar');
    const fileInput = document.querySelector('.account-file-input'),
      resetFileInput = document.querySelector('.account-image-reset');

    const token = $("input[name='_token']").val();

    if (accountUserImage) {
      const resetImage = accountUserImage.src;
      fileInput.onchange = () => {
        if (fileInput.files[0]) {
          accountUserImage.src = window.URL.createObjectURL(fileInput.files[0]);

          const data = new FormData();
          data.append('avatar', fileInput.files[0]);
          data.append('_token', token);
          fetch("{{route('hotro.upload-avatar')}}", {
            method: 'POST',
            body: data
          }).then(
            response => response.json() // if the response is a JSON object
          ).then(
            // success
            (data) => {accountUserImage.src = data.urlFile;} // Handle the success response object
          ).catch(
            error => console.log(error) // Handle the error response object
          );
        }

      };
      resetFileInput.onclick = () => {
        fileInput.value = '';
        const data = new FormData();
          data.append('avatar_url', resetImage);
          data.append('_token', token);
          fetch("{{route('hotro.reset-avatar')}}", {
            method: 'POST',
            body: data
          }).then(
            response => response.json() // if the response is a JSON object
          ).then(
            // success
            (data) => {accountUserImage.src = data.urlFile;} // Handle the success response object
          ).catch(
            error => console.log(error) // Handle the error response object
          );
        // accountUserImage.src = resetImage;
      };
    }
  })();
  });
</script>
    
@endsection