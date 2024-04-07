@extends('backend.layouts.master')

@section('content')
<!-- Multi Column with Form Separator -->

<div class="new-banners">
  <div class="card mb-4">
    <h5 class="card-header text-uppercase">{{ __('Create Banner') }}</h5>
  </div>
  <form
    class="row needs-validation {{$errors->any() ? 'was-validated custom-validate' : ''}}" 
    method="post" 
    action="{{route('admin.banners.store')}}"
  >
  @csrf
    <div class="col-12 col-lg-7">
      <div class="card mb-4">
        <div class="card-header">
          <h6 class=" card-tile mb-0">{{ __('Banner info') }}</h6>
        </div>
        <div class="card-body">
          <div class="mb-3">
            <label class="form-label" for="multicol-title">{{__('Banner title')}} <span class="text-danger">(*)</span></label>
            <input 
              type="text"
              name="title" 
              id="multicol-title" 
              class="form-control {{$errors->get('title') ? 'custom-invalid' : ''}}" 
              placeholder="Banner title"
              value="{{ old('title') ?? '' }}"
            />
            @foreach ($errors->get('title') as $message)
              <div class="invalid-feedback">{{$message}}</div>
            @endforeach
          </div>

          <div class="mb-3">
            <label class="form-label" for="select2-type">{{__('Banner type')}}<span class="text-danger">(*)</span>  <em>(chọn nơi hiển thị)</em></label>
            <select id="select2-type" 
              class="select2 form-select form-select-lg {{$errors->get('description') ? 'custom-invalid' : ''}}" 
              data-allow-clear="true"
              name="type"
              data-placeholder="Chọn nơi hiển thị"
            >
                {{-- <option value="0">Chọn nơi hiển thị</option> --}}
              @foreach ($bannerTypes as $key => $value)
                <option value="{{$key}}"
                  {{old('type') == $key ? 'selected' : ''}}  
                >
                  {{__(mb_strtoupper($value))}}
                </option>
              @endforeach
            </select>
            @foreach ($errors->get('type') as $message)
              <div class="invalid-feedback">{{$message}}</div>
            @endforeach
          </div>

          <div class="mb-3">
            <label class="form-label" for="multicol-link">{{__('Banner link')}} <em>(link muốn dẫn đến khi click vào ảnh)</em></label>
            <input 
              type="text"
              name="link" 
              id="multicol-link" 
              class="form-control {{$errors->get('link') ? 'custom-invalid' : ''}}" 
              placeholder="Banner link"
              value="{{ old('link') ?? '' }}"
            />
            @foreach ($errors->get('link') as $message)
              <div class="invalid-feedback">{{$message}}</div>
            @endforeach
          </div>

        </div>
      </div>

    </div>

    <div class="col-12 col-lg-5">
      {{-- image/thumbnail --}}
      <div class="card mb-4">
        <div class="card-header">
          <h6 class="card-tile mb-3">{{ __('Banner Image') }}</h6>
          <hr class="mx-n4 mb-0" />
        </div>
        <div class="card-body">
          <img class="card-img button-click" 
            src="{{old('image') ?? asset('backend/assets/img/functions/no-image.jpg')}}" 
            alt=""
            id="ckfinder-popup"
          >
          <input 
            type="hidden"
            name="image"
            class="form-control"
            id="image-input"
            value="{{old('image') ?? ''}}"
          >
            @foreach ($errors->get('image') as $message)
              <div class="invalid-feedback">{{$message}}</div>
            @endforeach
        </div>
      </div>
    </div>

    <div class="col-12 col-lg-7">
      <div class="text-end">
        <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
        <button type="reset" class="btn btn-label-secondary">Reset</button>
      </div>
    </div>

  </form>

</div>

@endsection

@section('link_css')
<link rel="stylesheet" href="{{asset('backend/assets/vendor/libs/flatpickr/flatpickr.css')}}" />
<link rel="stylesheet" href="{{asset('backend/assets/vendor/libs/select2/select2.css')}}" />
{{-- <link rel="stylesheet" href="{{asset('backend/assets/vendor/libs/quill/typography.css')}}" />
<link rel="stylesheet" href="{{asset('backend/assets/vendor/libs/quill/katex.css')}}" />
<link rel="stylesheet" href="{{asset('backend/assets/vendor/libs/quill/editor.css')}}" /> --}}
@endsection

@section('script')
<script src="{{asset('backend/assets/vendor/libs/cleavejs/cleave.js')}}"></script>
<script src="{{asset('backend/assets/vendor/libs/cleavejs/cleave-phone.js')}}"></script>
<script src="{{asset('backend/assets/vendor/libs/moment/moment.js')}}"></script>
<script src="{{asset('backend/assets/vendor/libs/flatpickr/flatpickr.js')}}"></script>
<script src="{{asset('backend/assets/vendor/libs/select2/select2.js')}}"></script>
<script src="{{asset('backend/assets/js/forms-selects.js')}}"></script>
{{-- <script src="{{asset('backend/assets/vendor/libs/quill/katex.js')}}"></script>
<script src="{{asset('backend/assets/vendor/libs/quill/quill.js')}}"></script> --}}
<!-- Page JS -->
<script src="{{asset('backend/assets/js/form-layouts.js')}}"></script>
<script src="{{asset('backend/custom/js/banner.js')}}"></script>

@endsection
