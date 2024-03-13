@extends('admin.layouts.auth-layout')

@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Sign In')

@section('content')
    <form class="form w-100" action="{{ route('admin.user.check') }}" method="POST">
        @csrf
        <!--begin::Heading-->
        <div class="text-center mb-10">
            <!--begin::Title-->
            <h1 class="text-dark mb-3">Sign In to Dashboard</h1>
        </div>
        <!--begin::Heading-->
        <!--begin::Input group-->
        <div class="fv-row mb-10">

            <label class="form-label fs-6 fw-bolder text-dark">{{ __('home.form.EMAIL') }}</label>

            <input class="form-control form-control-lg form-control-solid" type="email" name="email" />
            <div class="text-danger">
                @error('email')
                    {{ __('validation.attributes.form.email') }}
                @enderror
            </div>
        </div>
        <div class="fv-row mb-10">
            <div class="d-flex flex-stack mb-2">
                <label class="form-label fw-bolder text-dark fs-6 mb-0">{{ __('home.form.Password') }}</label>
                <a href="{{ route('admin.user.forgot_password') }}"
                    class="link-primary fs-6 fw-bolder">{{ __('home.form.Forgot_Password') }}?</a>

            </div>
            <input class="form-control form-control-lg form-control-solid" type="password" name="password" />
            <div class="text-danger">
                @error('password')
                    {{ __('validation.attributes.form.password') }}
                @enderror
            </div>
        </div>
        <!--end::Input group-->
        <!--begin::Actions-->
        <div class="text-center">
            <!--begin::Submit button-->
            <button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5">
                <span class="indicator-label">{{ __('home.LoginBtn') }}</span>
                <span class="indicator-progress">Please wait...
            </button>
            <!--end::Submit button-->

        </div>
        <!--end::Actions-->
    </form>
@endsection
