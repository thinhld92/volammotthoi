@extends('backend.layouts.master')

@section('content')

   
  <!-- Multi Column with Form Separator -->
  <div class="card mb-4">
    <h5 class="card-header">{{ __('Edit config') }}</h5>
    <form 
      class="card-body needs-validation {{$errors->any() ? 'was-validated custom-validate' : ''}}" 
      method="post" 
      action="{{route('admin.configs.update', $config)}}"
    >
      @csrf
      @method('put')
      <h6>1. {{ __('Config Details') }}</h6>
      <div class="row g-3">
        {{-- account --}}
        <div class="col-md-6">
          <label class="form-label" for="multicol-config_name">{{__('Config Name')}} <span class="text-danger">(*)</span></label>
          <input 
            type="text"
            readonly
            name="config_name" 
            id="multicol-config_name" 
            class="form-control {{$errors->get('config_name') ? 'custom-invalid' : ''}}" 
            placeholder="john.doe"
            value="{{ old('config_name') ?? $config->config_name }}"
          />
          @foreach ($errors->get('config_name') as $message)
          <div class="invalid-feedback">{{$message}}</div>
          {{-- <div class="text-danger">{{$message}}</div> --}}
          @endforeach
        </div>
        <div class="col-md-6">
          <label class="form-label" for="multicol-config_value">{{__('Config value')}} <span class="text-danger">(*)</span></label>
          <div class="input-group input-group-merge">
            <input
              type="text"
              name="config_value"
              id="multicol-config_value"
              class="form-control {{$errors->get('config_value') ? 'custom-invalid' : ''}}"
              placeholder="john.doe"
              aria-label="john.doe@gmail.com"
              aria-describedby="multicol-config_value2" 
              value="{{ old('config_value') ?? $config->config_value }}"
            />
            @foreach ($errors->get('config_value') as $message)
              <div class="invalid-feedback">{{$message}}</div>
            @endforeach
          </div>
        </div>
        <div class="col-md-6">
          <label class="form-label" for="multicol-config_value">{{__('Config comment')}} </label>
          <div class="input-group input-group-merge">
            <input
              type="text"
              class="form-control"
              name="config_comment"
              id="multicol-config_comment"
              placeholder="use to"
              aria-label="use to"
              aria-describedby="multicol-config_comment2" 
              value="{{ old('config_comment') ?? $config->config_comment }}"
            />
           
          </div>
        </div>
        <div class="col-md-6"></div>

        <div class="col-md-4">
          <img class="card-img button-click" 
              src="{{old('image') ?? asset('backend/assets/img/functions/no-image.jpg')}}" 
              alt=""
              id="ckfinder-popup-image"
            >
        </div>
        <div class="col-md-8 mt-5">
          <label class="form-label" for="multicol-config_value"><span class="text-danger">{{__('Dùng để hiển thị link image nếu cần, tìm hình rồi copy bỏ lên config value')}} </span></label>
          <div class="input-group input-group-merge">
            <input
              type="text"
              id="image-input"
              class="form-control"
            />
            
          </div>
        </div>
        <div id="ckfinder-popup-thumbnail"></div>

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
<script src="{{asset('backend/custom/js/posts-create.js')}}"></script>
@endsection