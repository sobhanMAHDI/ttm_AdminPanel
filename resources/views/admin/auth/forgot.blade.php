@extends('admin.layouts.auth-layout')

@section('pageTitle',isset($pageTitle) ? $pageTitle  : 'Forgot Password')

@section('content')
@if (Session::get('success'))
<div class="alert alert-success">
    {{ $message }}
</div>
@endif
<form class="form w-100 fv-plugins-bootstrap5 fv-plugins-framework" method="POST" action="{{ route('admin.user.send_password') }}">
    @csrf
    <div class="text-center mb-10">
        <!--begin::Title-->
        <h1 class="text-dark mb-3">Forgot Password ?</h1>
        <!--end::Title-->
        <!--begin::Link-->
        <div class="text-gray-400 fw-bold fs-4">Enter your email to reset your password.</div>
        <!--end::Link-->
    </div>
    <!--begin::Input group-->
    <div class="fv-row mb-10 fv-plugins-icon-container">
        <label class="form-label fw-bolder text-gray-900 fs-6">{{ __('home.form.EMAIL') }}</label>
        <input class="form-control form-control-solid" type="email" placeholder="" name="email">
        <div class="text-danger">
            @error('email')
                {{ $message }}
            @enderror
        </div>
    <div class="fv-plugins-message-container invalid-feedback"></div></div>
    <!--end::Input group-->
    <!--begin::Actions-->
    <div class="d-flex flex-wrap justify-content-center pb-lg-0">
        <button type="submit" id="kt_password_reset_submit" class="btn btn-lg btn-primary fw-bolder me-4">
            <span class="indicator-label">Submit</span>
            <span class="indicator-progress">Please wait...
            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
        </button>
        <a href="{{ route('admin.user.login') }}" class="btn btn-lg btn-light-primary fw-bolder">Cancel</a>
    </div>
    <!--end::Actions-->
<div></div></form>
@endsection
