@extends('backend.layouts.master')

@section('content')
<!-- Multi Column with Form Separator -->

<div class="new-categories">
  <div class="card mb-4">
    <h5 class="card-header text-uppercase">{{ __('Create post') }}</h5>
  </div>
  <form
    class="row needs-validation {{$errors->any() ? 'was-validated custom-validate' : ''}}" 
    method="post" 
    action="{{route('admin.posts.store')}}"
  >
  @csrf
    <div class="col-12 col-lg-9">
      <div class="card mb-4">
        <div class="card-header">
          <h6 class=" card-tile mb-0">{{ __('Post info') }}</h6>
        </div>
        <div class="card-body">
          <div class="mb-3">
            <label class="form-label" for="multicol-title">{{__('Post title')}} <span class="text-danger">(*)</span></label>
            <input 
              type="text"
              name="title" 
              id="multicol-title" 
              class="form-control {{$errors->get('title') ? 'custom-invalid' : ''}}" 
              placeholder="{{__('Enter post title')}}"
              value="{{ old('title') }}"
              onkeyup="generateSlug();"
            />
            <input type="hidden" id="temp-slug">
            @foreach ($errors->get('title') as $message)
              <div class="invalid-feedback">{{$message}}</div>
            @endforeach
          </div>
          <div class="mb-3">
            <label class="form-label" for="multicol-slug">{{__('Post slug')}} <span class="text-danger">(*)</span></label>
            <input 
              type="text"
              name="slug" 
              id="multicol-slug" 
              class="form-control {{$errors->get('slug') ? 'custom-invalid' : ''}}" 
              placeholder="{{__('Post slug')}}"
              value="{{ old('slug') ?? '' }}"
            />
            @foreach ($errors->get('slug') as $message)
              <div class="invalid-feedback">{{$message}}</div>
            @endforeach
          </div>
          <div class="mb-3">
            <label class="form-label" for="multicol-description">{{__('Post description')}} <span class="text-danger">(*)</span></label>
            <textarea 
              type="text"
              name="description" 
              id="multicol-description" 
              class="form-control {{$errors->get('description') ? 'custom-invalid' : ''}}" 
              placeholder="{{__('Post description')}}"
            >{{ old('description') ?? ''}}</textarea>
            @foreach ($errors->get('description') as $message)
              <div class="invalid-feedback">{{$message}}</div>
            @endforeach
          </div>
          <div class="mb-3">
            <label class="form-label" for="select2-category_id">{{__('Category')}} <span class="text-danger">(*)</label>
            <select id="select2-category_id" 
              class="select2 form-select form-select-lg {{$errors->get('category_id') ? 'custom-invalid' : ''}}" 
              data-allow-clear="true"
              name="category_id"
              data-placeholder="Chọn danh mục cha"
            >
                <option value="">Chọn danh mục cha</option>
              @foreach ($categories as $item)
                <option value="{{$item->id}}"
                  {{old('category_id') == $item->id ? 'selected' : ''}}  
                >
                  {{ str_repeat('--/', $item->level) }}{{$item->name}}
                </option>
              @endforeach
            </select>
            @foreach ($errors->get('category_id') as $message)
              <div class="invalid-feedback">{{$message}}</div>
            @endforeach
          </div>
          <div class="row mb-3">
            <div class="col-md-4">
              <label class="form-label" for="multicol-published_at">{{__('Published Date')}}</label>
              <input
                type="text"
                name="published_at"
                id="multicol-published_at"
                class="form-control dob-picker"
                placeholder="{{ __('YYYY-MM-DD') }}"
                value="{{old('published_at')}}" 
              />
            </div>
            <div class="col-md-4">
              <label class="form-label" for="multicol-banner_date">{{__('Banner Date End')}}</label>
              <input
                type="text"
                name="banner_date"
                id="multicol-banner_date"
                class="form-control dob-picker"
                placeholder="{{ __('YYYY-MM-DD') }}"
                value="{{old('banner_date')}}" 
              />
            </div>
            <div class="col-md-4">
              <label class="form-label" for="multicol-event_date">{{__('Event Date Begin')}}</label>
              <input
                type="text"
                name="event_date"
                id="multicol-event_date"
                class="form-control dob-picker"
                placeholder="{{ __('YYYY-MM-DD') }}"
                value="{{old('event_date')}}" 
              />
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label" for="multicol-content">{{__('Post content')}} <span class="text-danger">(*)</span></label>
            <textarea 
              rows="10"
              type="text"
              name="content" 
              id="multicol-content" 
              class="editor form-control {{$errors->get('content') ? 'custom-invalid' : ''}}" 
              placeholder="{{__('Post content')}}"
            >{{ old('content') ?? ''}}</textarea>
            @foreach ($errors->get('content') as $message)
              <div class="invalid-feedback">{{$message}}</div>
            @endforeach
          </div>

        </div>
      </div>

    </div>

    <div class="col-12 col-lg-3">
      <div class="card mb-4" hidden>
        <div class="card-body">
          
        </div>
      </div>
      {{-- image/thumbnail --}}
      <div class="card mb-4">
        <div class="card-header">
          <h6 class="card-tile mb-3">{{ __('Post image') }} <span class="text-danger">(*)</span></h6>
          <hr class="mx-n4 mb-0" />
        </div>
        <div class="card-body">
          <div class="mb-3">
            <img class="card-img button-click" 
              src="{{old('image') ?? asset('backend/assets/img/functions/no-image.jpg')}}" 
              alt=""
              id="ckfinder-popup-image"
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
          <div class="">
            <label class="form-label" for="multicol-image_caption">{{__('Post image caption')}}</label>
            <input 
              type="text"
              name="image_caption" 
              id="multicol-image_caption" 
              class="form-control {{$errors->get('image_caption') ? 'custom-invalid' : ''}}" 
              placeholder="{{__('Post image caption')}}"
              value="{{ old('image_caption') ?? '' }}"
            />
            @foreach ($errors->get('image_caption') as $message)
              <div class="invalid-feedback">{{$message}}</div>
            @endforeach
          </div>
        </div>
      </div>
      <div class="card mb-4">
        <div class="card-header">
          <h6 class="card-tile mb-3">{{ __('Post thumbnail') }}</h6>
          <hr class="mx-n4 mb-0" />
        </div>
        <div class="card-body">
          <img class="card-img button-click" 
            src="{{old('thumbnail') ?? asset('backend/assets/img/functions/no-image.jpg')}}" 
            alt=""
            id="ckfinder-popup-thumbnail"
          >
          <input 
            type="hidden"
            name="thumbnail"
            class="form-control"
            id="thumbnail-input"
            value="{{old('thumbnail') ?? ''}}"
          >
          @foreach ($errors->get('thumbnail') as $message)
            <div class="invalid-feedback">{{$message}}</div>
          @endforeach
        </div>
      </div>
    </div>

    <div class="col-12 col-lg-8">
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

@endsection

@section('script')
<script src="{{asset('backend/assets/vendor/libs/cleavejs/cleave.js')}}"></script>
<script src="{{asset('backend/assets/vendor/libs/cleavejs/cleave-phone.js')}}"></script>
<script src="{{asset('backend/assets/vendor/libs/moment/moment.js')}}"></script>
<script src="{{asset('backend/assets/vendor/libs/flatpickr/flatpickr.js')}}"></script>
<script src="{{asset('backend/assets/vendor/libs/select2/select2.js')}}"></script>
<script src="{{asset('backend/assets/js/forms-selects.js')}}"></script>
{{-- ckeditor --}}
<script src="{{asset('js/ckeditor5/build/ckeditor.js')}}"></script>

<!-- Page JS -->
<script src="{{asset('backend/assets/js/form-layouts.js')}}"></script>
<script src="{{asset('backend/custom/js/posts-create.js')}}"></script>

{{-- ckeditor intergration --}}
@include('backend.lib.ckeditor')

@endsection