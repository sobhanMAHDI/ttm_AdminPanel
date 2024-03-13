@extends('admin.layouts.home-layout')

@section('pageTitle',isset($pageTitle) ? $pageTitle  : 'Edit User')

@section('content')
    <div class="card mb-5 mb-xl-10">
        <!--begin::Card header-->
        <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
            data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
            <!--begin::Card title-->
            <div class="card-title m-0">
                <h3 class="fw-bolder m-0">ویرایش کاربر </h3>
            </div>
            <!--end::Card title-->
        </div>
        <!--begin::Card header-->
        <!--begin::Content-->
        <div id="kt_account_profile_details" class="collapse show">







            <form id="kt_account_profile_details_form" class="form fv-plugins-bootstrap5 fv-plugins-framework"
                action="{{ route('admin.user.update') }}" method="POST">
                @csrf
                <input type="hidden" name="cid" value="{{ $info->id }}">
                <!--begin::Card body-->
                <div class="card-body border-top p-9">

                    <div class="row mb-6">


                        <div class="col-lg-8">

                        </div>

                    </div>


                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label required fw-bold fs-6">نام و نام خانوادگی</label>
                        <!--end::Label-->

                        <div class="col-lg-8">
                            <!--begin::Row-->
                            <div class="row">

                                <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                    <input type="text" name="name" value="{{ $info->name }}"
                                        class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                        placeholder="Full Name">
                                    @error('name')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    {{--  <div class="fv-plugins-message-container invalid-feedback"></div>  --}}
                                </div>

                            </div>
                            <!--end::Row-->
                        </div>

                    </div>


                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label required fw-bold fs-6">ایمیل</label>
                        <!--end::Label-->

                        <div class="col-lg-8 fv-row fv-plugins-icon-container">
                            <input type="email" name="email" class="form-control form-control-lg form-control-solid"
                                value="{{ $info->email }}" placeholder="Email Address">
                            @error('email')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                            {{--  <div class="fv-plugins-message-container invalid-feedback"></div>  --}}
                        </div>

                    </div>




                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label fw-bold fs-6">
                            <span class="required">انتخاب نقش</span>
                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title=""
                                data-bs-original-title="Country of origination" aria-label="Country of origination"></i>
                        </label>
                        <!--end::Label-->

                        <div class="col-lg-8 fv-row fv-plugins-icon-container">
                            <select name="role" aria-label="Select a Role" data-control="select2"
                                data-placeholder="Select a role..."
                                class="form-select form-select-solid form-select-lg fw-bold select2-hidden-accessible"
                                data-select2-id="select2-data-10-8wof" tabindex="-1" aria-hidden="true">

                                @foreach ($roles as $role)
                                    <option value="{{ $role->name }}" data-select2-id="select2-data-12-pw2u">
                                        {{ $role->name }}</option>
                                    <option data-kt-flag="flags/afghanistan.svg" value="{{ $role->id }}">
                                        {{ $role->name }}</option>
                                @endforeach
                                @error('role')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </select>
                            {{--  <div class="fv-plugins-message-container invalid-feedback"></div>  --}}
                        </div>


                    </div>





                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label required fw-bold fs-6">رمز کاربری</label>
                        <!--end::Label-->

                        <div class="col-lg-8 fv-row fv-plugins-icon-container">
                            <input type="password" name="password" class="form-control form-control-lg form-control-solid"
                                placeholder="Enter User Password">
                            @error('password')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                            {{--  <div class="fv-plugins-message-container invalid-feedback"></div>  --}}
                        </div>

                    </div>





                </div>
                <!--end::Card body-->
                <!--begin::Actions-->
                <div class="card-footer d-flex justify-content-end py-6 px-9">
                    <a href="{{ route('home') }}" class="btn btn-light btn-light-primary me-2">بازگشت</a>
                    <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">بروزرسانی</button>
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
