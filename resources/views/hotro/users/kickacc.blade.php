
@extends('hotro.layouts.master')
@section('content')
<!-- Change Password -->
<div class="card mb-4">
  <h5 class="card-header">{{ __('Kick Account') }}</h5>
  <div class="card-body">
    <form id="formAccountSettings" 
      method="POST" 
      action="{{route('hotro.users.kick-acc')}}"
      class="card-body needs-validation {{$errors->any() ? 'was-validated custom-validate' : ''}}" 
    >
      @csrf
      <div class="row">
        <div class="col-12 mb-4">
          <span class="text-danger">{{ __('Please confirm your password before continuing') }}</span>
        </div>
        <div class="mb-3 col-md-6 form-password-toggle">
          <label class="form-label" for="currentPassword">{{ __('Confirm Password') }}</label>
          <div class="input-group input-group-merge">
            <input
              class="form-control"
              type="password"
              name="currentPassword"
              id="currentPassword"
              placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
            <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
          </div>
          @foreach ($errors->get('currentPassword') as $message)
            <div class="invalid-feedback">{{$message}}</div>
          @endforeach
        </div>
      </div>
      <div class="row">
        <div>
          <button type="submit" class="btn btn-primary me-2">Kick</button>
          {{-- <button type="reset" class="btn btn-label-secondary">Cancel</button> --}}
        </div>
      </div>
    </form>
  </div>
</div>
<!--/ Change Password -->
@endsection