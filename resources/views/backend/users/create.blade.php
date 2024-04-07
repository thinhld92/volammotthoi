@extends('backend.layouts.master')

@section('content')

   
  <!-- Multi Column with Form Separator -->
  <div class="card mb-4">
    <h5 class="card-header">{{ __('Create new user account') }}</h5>
    <form 
      class="card-body needs-validation {{$errors->any() ? 'was-validated custom-validate' : ''}}" 
      method="post" 
      action="{{route('admin.users.store')}}"
    >
      @csrf
      <h6>1. {{ __('Account Details') }}</h6>
      <div class="row g-3">
        {{-- account --}}
        <div class="col-md-6">
          <label class="form-label" for="multicol-username">{{__('Username')}} <span class="text-danger">(*)</span></label>
          <input 
            type="text"
            name="cAccName" 
            id="multicol-username" 
            class="form-control {{$errors->get('cAccName') ? 'custom-invalid' : ''}}" 
            placeholder="john.doe"
            value="{{ old('cAccName') ?? '' }}"
          />
          @foreach ($errors->get('cAccName') as $message)
          <div class="invalid-feedback">{{$message}}</div>
          {{-- <div class="text-danger">{{$message}}</div> --}}
          @endforeach
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
              value="{{ old('cEMail') ?? '' }}"
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
              <span class="input-group-text cursor-pointer" id="multicol-cSecPassword"
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
            <label class="form-label" for="multicol-confirm-password">{{__('Confirm Password 2')}} <span class="text-danger">(*)</span></label>
            <div class="input-group input-group-merge">
              <input
                type="password"
                name="cSecPassword_confirmation"
                id="multicol-confirm-cSecPassword"
                class="form-control"
                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                aria-describedby="multicol-confirm-cSecPassword" />
              <span class="input-group-text cursor-pointer" id="multicol-confirm-cSecPassword"
                ><i class="ti ti-eye-off"></i
              ></span>
            </div>
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
            value="{{ old('cRealName') ?? '' }}"
          />
          @foreach ($errors->get('cRealName') as $message)
            <div class="invalid-feedback">{{$message}}</div>
          @endforeach
        </div>
        <div class="col-md-6">
          <label class="form-label" for="multicol-cIDNum">{{ __('ID') }}</label>
          <input 
            type="text" 
            name="cIDNum"
            id="multicol-cIDNum" 
            class="form-control" 
            placeholder="0490978976" 
            value="{{ old('cIDNum') ?? '' }}"
          />
        </div>
        <div class="col-md-6">
          <label class="form-label" for="multicol-birthdate">{{__('Birth Date')}}</label>
          <input
            type="text"
            name="dBirthDay"
            id="multicol-birthdate"
            class="form-control dob-picker"
            placeholder="{{ __('YYYY-MM-DD') }}"
            value="{{ old('dBirthDay') ?? '' }}"
          />
        </div>
        <div class="col-md-6">
          <label class="form-label" for="multicol-phone">{{__('Phone Number')}}</label>
          <input
            type="text"
            name="cPhone"
            id="multicol-phone"
            class="form-control phone-mask"
            placeholder="0369 799 894"
            aria-label="0369 799 894"
            value="{{ old('cPhone') ?? '' }}"
          />
        </div>
      </div>
      <div class="pt-4">
        <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
        <button type="reset" class="btn btn-label-secondary">Reset</button>
      </div>
    </form>
  </div>
@endsection

@section('link_css')
<link rel="stylesheet" href="{{asset('backend/assets/vendor/libs/flatpickr/flatpickr.css')}}" />
<link rel="stylesheet" href="{{asset('backend/assets/vendor/libs/select2/select2.css')}}" />
@endsection

@section('script')
<script src="{{asset('backend/assets/vendor/libs/cleavejs/cleave.js')}}"></script>
<script src="{{asset('backend/assets/vendor/libs/cleavejs/cleave-phone.js')}}"></script>
<script src="{{asset('backend/assets/vendor/libs/moment/moment.js')}}"></script>
<script src="{{asset('backend/assets/vendor/libs/flatpickr/flatpickr.js')}}"></script>
<script src="{{asset('backend/assets/vendor/libs/select2/select2.js')}}"></script>
<!-- Page JS -->
<script src="{{asset('backend/assets/js/form-layouts.js')}}"></script>
@endsection