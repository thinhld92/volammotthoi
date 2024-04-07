@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="cRealName" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="cRealName" type="text" class="form-control @error('cRealName') is-invalid @enderror" name="cRealName" value="{{ old('cRealName') }}" required autocomplete="name" autofocus>

                                @error('cRealName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="cAccName" class="col-md-4 col-form-label text-md-end">{{ __('Tên tài khoản') }}</label>

                            <div class="col-md-6">
                                <input id="cAccName" type="text" class="form-control @error('cAccName') is-invalid @enderror" name="cAccName" value="{{ old('cAccName') }}" required autocomplete="name" autofocus>

                                @error('cAccName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="cEMail" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="cEMail" type="email" class="form-control @error('cEMail') is-invalid @enderror" name="cEMail" value="{{ old('cEMail') }}" required autocomplete="email">

                                @error('cEMail')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="cPassWord" class="col-md-4 col-form-label text-md-end">{{ __('Mật khẩu') }}</label>

                            <div class="col-md-6">
                                <input id="cPassWord" type="password" class="form-control @error('cPassWord') is-invalid @enderror" name="cPassWord" required autocomplete="new-password">

                                @error('cPassWord')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="cPassWord-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Nhập lại mật khẩu') }}</label>

                            <div class="col-md-6">
                                <input id="cPassWord-confirm" type="password" class="form-control" name="cPassWord_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
{{-- pass cấp 2 --}}
                        <div class="row mb-3">
                            <label for="cSecPassword" class="col-md-4 col-form-label text-md-end">{{ __('Mật khẩu cấp 2') }}</label>

                            <div class="col-md-6">
                                <input id="cSecPassword" type="password" class="form-control @error('cSecPassword') is-invalid @enderror" name="cSecPassword" required autocomplete="new-password">

                                @error('cSecPassword')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="cSecPassword-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Nhập lại mật khẩu cấp 2') }}</label>

                            <div class="col-md-6">
                                <input id="cSecPassword-confirm" type="password" class="form-control" name="cSecPassword_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
