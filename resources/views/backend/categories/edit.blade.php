@extends('backend.layouts.master')

@section('content')
<!-- Multi Column with Form Separator -->

<div class="new-categories">
  <div class="card mb-4">
    <h5 class="card-header text-uppercase">{{ __('Create Category') }}</h5>
  </div>
  <form
    class="row needs-validation {{$errors->any() ? 'was-validated custom-validate' : ''}}" 
    method="post" 
    action="{{route('admin.categories.update', $category)}}"
  >
  @csrf
  @method('put')
    <div class="col-12 col-lg-8">
      <div class="card mb-4">
        <div class="card-header">
          <h6 class=" card-tile mb-0">{{ __('Category info') }}</h6>
        </div>
        <div class="card-body">
          <div class="mb-3">
            <label class="form-label" for="multicol-name">{{__('Category name')}} <span class="text-danger">(*)</span></label>
            <input 
              type="text"
              name="name" 
              id="multicol-name" 
              class="form-control {{$errors->get('name') ? 'custom-invalid' : ''}}" 
              placeholder="category name"
              value="{{ old('name') ?? $category->name }}"
              onkeyup="generateSlug();"
            />
            <input type="hidden" id="temp-slug">
            @foreach ($errors->get('name') as $message)
              <div class="invalid-feedback">{{$message}}</div>
            @endforeach
          </div>
          <div class="mb-3">
            <label class="form-label" for="multicol-slug">{{__('Category slug')}} <span class="text-danger">(*)</span></label>
            <input 
              type="text"
              name="slug" 
              id="multicol-slug" 
              class="form-control {{$errors->get('slug') ? 'custom-invalid' : ''}}" 
              placeholder="category slug"
              value="{{ old('slug') ?? $category->slug }}"
            />
            @foreach ($errors->get('slug') as $message)
              <div class="invalid-feedback">{{$message}}</div>
            @endforeach
          </div>
          <div class="mb-3">
            @php
                // dd(old('description') ?? $category->description);
            @endphp
            <label class="form-label" for="multicol-description">{{__('Category description')}} <span class="text-danger">(*)</span></label>
            <textarea 
              type="text"
              name="description" 
              id="multicol-description" 
              class="form-control {{$errors->get('description') ? 'custom-invalid' : ''}}" 
              placeholder="Category description"
            >{{ old('description') ?? $category->description }}</textarea>
            @foreach ($errors->get('description') as $message)
              <div class="invalid-feedback">{{$message}}</div>
            @endforeach
          </div>
          <div class="mb-3">
            @php
                $curren_parent_id = old('parent_id') ?? $category->parent_id;
            @endphp
            <label class="form-label" for="select2-parent_id">{{__('Category Parent')}}</label>
            <select id="select2-parent_id" 
              class="select2 form-select form-select-lg {{$errors->get('description') ? 'custom-invalid' : ''}}" 
              data-allow-clear="true"
              name="parent_id"
              data-placeholder="Chọn danh mục cha"
            >
                <option value="0">Chọn danh mục cha</option>
              @foreach ($categories as $item)
                <option value="{{$item->id}}"
                  {{$curren_parent_id == $item->id ? 'selected' : ''}}  
                >
                  {{ str_repeat('--/', $item->level) }}{{$item->name}}
                </option>
              @endforeach
            </select>
            @foreach ($errors->get('parent_id') as $message)
              <div class="invalid-feedback">{{$message}}</div>
            @endforeach
          </div>
          <div class="row mb3">
            <div class="col-md-4">
              <label class="form-label" for="show_in_menu">{{__('Show in menu')}}<span class="text-danger"> (*)</span></label>
              <div class="">
              <label class="switch">
                <input type="checkbox" 
                  class="switch-input is-valid" 
                  id="show_in_menu" 
                  name="show_in_menu" 
                  value="1" 
                  {{$category->show_in_menu > 0 ? 'checked' : ''}} 
                />
                <span class="switch-toggle-slider">
                  <span class="switch-on"></span>
                  <span class="switch-off"></span>
                </span>
              </label>
              </div>
            </div>
            <div class="col-md-4">
              <label class="form-label" for="show_in_home">{{__('Show in home')}}<span class="text-danger"> (*)</span></label>
              <div class="">
              <label class="switch">
                <input type="checkbox" 
                  class="switch-input is-valid" 
                  name="show_in_home" id="show_in_home" 
                  value="1" 
                  {{$category->show_in_home > 0 ? 'checked' : ''}} 
                />
                <span class="switch-toggle-slider">
                  <span class="switch-on"></span>
                  <span class="switch-off"></span>
                </span>
              </label>
              </div>
            </div>
            <div class="col-md-4">
              <label class="form-label" for="sort-order">{{__('Sort order')}}<span class="text-danger"> (*)</span></label>
              <input 
                type="number" 
                class="form-control" 
                min="0" 
                name="sort_order"
                value="{{$category->sort_order ?? 0}}"
              >
            </div>
          </div>

        </div>
      </div>

    </div>

    <div class="col-12 col-lg-4">
      <div class="card mb-4" hidden>
        <div class="card-body">
          
        </div>
        @foreach ($errors->get('description') as $message)
          <div class="invalid-feedback">{{$message}}</div>
        @endforeach
      </div>
      {{-- image/thumbnail --}}
      <div class="card mb-4">
        <div class="card-header">
          <h6 class="card-tile mb-3">{{ __('Category image') }}</h6>
          <hr class="mx-n4 mb-0" />
        </div>
        <div class="card-body">
          <img class="card-img button-click" 
            src="{{old('thumbnail') ?? $category->thumbnail ?? asset('backend/assets/img/functions/no-image.jpg')}}" 
            alt=""
            id="ckfinder-popup"
          >
          <input 
            type="hidden"
            name="thumbnail"
            class="form-control"
            id="thumbnail-input"
            value="{{old('thumbnail') ?? $category->thumbnail}}"
          >
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

<script>
  var button = document.getElementById( 'ckfinder-popup' );
  button.onclick = function(e) {
    selectFileWithCKFinder( 'thumbnail-input' );
  };

  function showThumbnail(fileUrl){
    const urlThumbnail = document.getElementById('thumbnail-input').value;
    const categoryThumbnail = document.getElementById('ckfinder-popup');
    categoryThumbnail.src = fileUrl;
    categoryThumbnail.hidden = false;
  }

  function selectFileWithCKFinder( elementId ) {
    CKFinder.popup( {
      chooseFiles: true,
      width: 800,
      height: 600,
      onInit: function( finder ) {
        finder.on( 'files:choose', function( evt ) {
          var file = evt.data.files.first();
          var output = document.getElementById( elementId );
          output.value = file.getUrl();
          showThumbnail(file.getUrl());
          
        } );

        finder.on( 'file:choose:resizedImage', function( evt ) {
          var output = document.getElementById( elementId );
          output.value = evt.data.resizedUrl;
          showThumbnail(evt.data.resizedUrl);
        } );
      }
    });
  }
</script>
@endsection