@extends('backend.layouts.master')

@section('content')

   
  <!-- Multi Column with Form Separator -->
  <div class="card mb-4">
    <h5 class="card-header">{{ __('Edit admin account') }}</h5>
    <form 
      class="card-body needs-validation {{$errors->any() ? 'was-validated custom-validate' : ''}}" 
      method="post" 
      action="{{route('admin.admins.update', $admin)}}"
    >
      @csrf
      @method('put')
      <h6>1. {{ __('Admin Details') }}</h6>
      <div class="row g-3">
        {{-- account --}}
        <div class="col-md-6">
          <label class="form-label" for="multicol-username">{{__('Username')}} <span class="text-danger">(*)</span></label>
          <input 
            type="text"
            name="username" 
            id="multicol-username" 
            class="form-control {{$errors->get('username') ? 'custom-invalid' : ''}}" 
            placeholder="john.doe"
            value="{{ old('username') ?? $admin->username }}"
          />
          @foreach ($errors->get('username') as $message)
          <div class="invalid-feedback">{{$message}}</div>
          {{-- <div class="text-danger">{{$message}}</div> --}}
          @endforeach
        </div>
        <div class="col-md-6">
          <label class="form-label" for="multicol-email">{{__('Email')}} <span class="text-danger">(*)</span></label>
          <div class="input-group input-group-merge">
            <input
              type="text"
              name="email"
              id="multicol-email"
              class="form-control {{$errors->get('email') ? 'custom-invalid' : ''}}"
              placeholder="john.doe"
              aria-label="john.doe@gmail.com"
              aria-describedby="multicol-email2" 
              value="{{ old('email') ?? $admin->email }}"
            />
            @foreach ($errors->get('email') as $message)
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
                name="password"
                id="multicol-password"
                class="form-control {{$errors->get('password') ? 'custom-invalid' : ''}}"
                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                aria-describedby="multicol-password2" />
              <span class="input-group-text cursor-pointer" id="multicol-password2"
                ><i class="ti ti-eye-off"></i
              ></span>
            </div>
            @foreach ($errors->get('password') as $message)
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
                name="password_confirmation"
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
      </div>
      
      <hr class="my-4 mx-n4" />

      <h6>2. {{ __('Admin Info') }}</h6>
      <div class="row g-3">
        <div class="col-md-6">
          <label class="form-label" for="multicol-first-name">{{ __('Full Name') }} <span class="text-danger">(*)</span></label>
          <input 
            type="text" 
            name="name"
            id="multicol-first-name" 
            class="form-control {{$errors->get('name') ? 'custom-invalid' : ''}}" 
            placeholder="John" 
            value="{{ old('name') ?? $admin->name }}"
          />
          @foreach ($errors->get('name') as $message)
            <div class="invalid-feedback">{{$message}}</div>
          @endforeach
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