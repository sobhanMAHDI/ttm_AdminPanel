@extends('admin.layouts.home-layout')

@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Create Permission')

@section('content')

    <div class="card-header border-0 cursor-pointer shadow-lg mx-5 mb-5 rounded-top"
        style="direction: auto; background-color: #fff">
        <!--begin::Card title-->
        <div class="card-title m-0">
            <h3 class="fw-bolder my-5 pl-5 text-[25px]">ثبت دسترسی</h3>
        </div>
        <!--end::Card title-->

        <form method="POST" action="{{ route('admin.permission.store') }}">
            @csrf
            <div class="card-body border-top p-9" data-select2-id="select2-data-81-kvnf">

                <div class="row mb-6">
                    <label class="col-lg-4 col-form-label required fw-bold fs-6" for="name">نام دسترسی</label>
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                <input type="text" name="name" id="job_title"
                                    class="form-control form-control-lg form-control-solid rounded-md"
                                    placeholder="عنوان دسترسی را وارد کنید">
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                    <span class="text-danger">
                        @error('name')
                            {{ $message }}
                        @enderror
                    </span>
                </div>









                <div class="row mb-6">
                    <label class="col-lg-4 col-form-label fw-bold fs-6">
                        <span class="required">عنوان نقش برای این دسترسی را مشخص کنید </span>
                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title=""
                            data-bs-original-title="select the permission for this role"
                            aria-label="Country of origination"></i>
                    </label>
                    <div class="col-lg-8 fv-row fv-plugins-icon-container" tabindex="-1" style="width: 435px;">

                    @foreach ($roles as $role)
                        <div class="d-flex fv-row gap-5">
                            <div class="form-check form-check-custom form-check-solid">
                                <input class="form-check-input me-3" name="user_role[]" type="checkbox"
                                    value="{{ $role->id }}">
                                <label class="form-check-label mt-3" for="kt_modal_update_role_option_0">
                                    <div class="fw-bolder text-gray-800">{{ $role->name }}</div>
                                </label>
                            </div>
                        </div>
                    @endforeach

                    <span class="text-danger">
                        @error('user_role')
                            {{ $message }}
                        @enderror
                    </span>

                </div>




                <div class="card-footer d-flex justify-content-end py-6 px-9">
                    <a class="btn btn-light btn-light-primary me-2" href="{{ route('admin.permission.permissions') }}">{{ __('home.BackBtn') }}</a>
                    <button type="submit" class="btn btn-primary position-relative" id="submitButton">
                        <span class="spinner-border spinner-border-sm position-absolute top-50 start-50 translate-middle" role="status" aria-hidden="true" style="display: none;"></span>
                        {{ __('home.SaveBtn') }}
                    </button>
                </div>

            </div>
        </form>
    </div>
@endsection
