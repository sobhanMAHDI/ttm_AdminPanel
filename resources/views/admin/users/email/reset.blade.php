@extends('admin.layouts.auth-layout')

@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Sign In')

@section('content')
    <form class="form w-100" action="{{ route('admin.user.reset_new_password') }}" method="POST">
        @csrf
        <!--begin::Heading-->
        <div class="text-center mb-10">
            <!--begin::Title-->
            <h1 class="text-dark mb-3">Reset Your Password</h1>
        </div>
        <!--begin::Heading-->
        <!--begin::Input group-->
        <div class="fv-row mb-10">


            <label class="form-label fs-6 fw-bolder text-dark">{{ __('home.form.EMAIL') }}</label>

            <input class="form-control form-control-lg form-control-solid" type="email" name="email" value="" />
            <div class="text-danger">
                @error('email')
                    {{ __('validation.attributes.form.email') }}
                @enderror
            </div>

        </div>


        <div class="fv-row mb-10">

            <label class="form-label fs-6 fw-bolder text-dark">رمز عبور جدید</label>

            <input class="form-control form-control-lg form-control-solid" type="password" name="new_password" />
            <div class="text-danger">
                @error('new_password')
                    {{ $message }}
                @enderror
            </div>
        </div>


        <div class="fv-row mb-10">

            <label class="form-label fs-6 fw-bolder text-dark">تکرار رمز عبور</label>

            <input class="form-control form-control-lg form-control-solid" type="password" name="confirm_password" />
            <div class="text-danger">
                @error('confirm_password')
                    {{ $message }}
                @enderror
            </div>
        </div>

        <div class="text-center">
            <button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5">
                <span class="indicator-label">ادامه</span>
                <span class="indicator-progress">Please wait...
            </button>

        </div>
    </form>
@endsection
