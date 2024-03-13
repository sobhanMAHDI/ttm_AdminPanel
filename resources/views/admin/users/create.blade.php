@extends('admin.layouts.home-layout')

@section('pageTitle',isset($pageTitle) ? $pageTitle  : 'Register User')

@section('content')
    <div class="card mb-5 mb-xl-10 mx-5 shadow-lg" style="background-color: #fdfdfd;">
        <!--begin::Card header-->
        <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
            data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
            <!--begin::Card title-->
            <div class="card-title m-0">
                <h3 class="fw-bolder m-0">{{ __('home.user.Add_User_Btn') }}</h3>
            </div>
            <!--end::Card title-->
        </div>
        <!--begin::Card header-->
        <!--begin::Content-->
        <div id="kt_account_profile_details" class="collapse show">







            <!--begin::Form-->
            <form id="kt_account_profile_details_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" action="{{ route('admin.user.store') }}"
                method="POST">
                @csrf
                <!--begin::Card body-->
                <div class="card-body border-top p-9">
                    <!--begin::Input group-->
                    <div class="row mb-6">

                        <!--begin::Col-->
                        <div class="col-lg-8">

                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label required fw-bold fs-6">{{ __('home.form.FullName') }}</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8">
                            <!--begin::Row-->
                            <div class="row">
                                <!--begin::Col-->
                                <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                    <input type="text" name="name"
                                        class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                        placeholder="{{ __('home.placeHolder.FullName') }}">
                                    @error('name')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    {{--  <div class="fv-plugins-message-container invalid-feedback"></div>  --}}
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Row-->
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label required fw-bold fs-6">{{ __('home.form.EMAIL') }}</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row fv-plugins-icon-container">
                            <input type="email" name="email" class="form-control form-control-lg form-control-solid"
                                placeholder="{{ __('home.placeHolder.Email') }}" style="width: 405px;">
                            @error('email')
                                <div class="text-danger">
                                    {{ __('validation.attributes.form.email') }}
                                </div>
                            @enderror
                            {{--  <div class="fv-plugins-message-container invalid-feedback"></div>  --}}
                        </div>
                        <!--end::Col-->
                    </div>

                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label fw-bold fs-6">
                            <span class="required">{{ __('home.form.ROLE') }}</span>
                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title=""
                                data-bs-original-title="Country of origination" aria-label="Country of origination"></i>
                        </label>
                        <div class="col-lg-8 fv-row fv-plugins-icon-container" tabindex="-1" style="width: 435px;">
                            <select name="role" aria-label="Select a Role" data-control="select2"
                                data-placeholder="{{ __('home.placeHolder.Role') }}"
                                class="form-select form-select-solid form-select-lg fw-bold select2-hidden-accessible"
                                data-select2-id="select2-data-10-8wof" aria-hidden="true">
                                <option value="" data-select2-id="select2-data-12-pw2u">Select a Role...</option>
                                @foreach ($roles as $role)
                                    <option data-kt-flag="flags/afghanistan.svg" value="{{ $role->id }}">
                                        {{ $role->name }}</option>
                                @endforeach
                                @error('role')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </select>
                        </div>

                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->



                    <!--begin::Input group-->
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label required fw-bold fs-6">{{ __('home.form.Password') }}</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row fv-plugins-icon-container">
                            <input type="password" name="password" class="form-control form-control-lg form-control-solid"
                                placeholder="{{ __('home.placeHolder.Password') }}" style="width: 410px;">
                            @error('password')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                            {{--  <div class="fv-plugins-message-container invalid-feedback"></div>  --}}
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->




                </div>
                <!--end::Card body-->
                <!--begin::Actions-->
                <div class="card-footer d-flex justify-content-end py-6 px-9">
                    <a href="{{ route('admin.user.users') }}" class="btn btn-light btn-light-primary me-2">{{ __('home.BackBtn') }}</a>
                    <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">{{ __('home.SaveBtn') }}</button>
                </div>
                <!--end::Actions-->
                <input type="hidden">
                <div></div>
            </form>
            <!--end::Form-->
        </div>
        <!--end::Content-->
    </div>
@endsection
