@extends('admin.layouts.home-layout')

@section('pageTitle', 'Edit Role')

@section('content')
    <div class="card mb-5 mb-xl-10 mx-5 shadow-lg">
        <!--begin::Card header-->
        <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
            data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
            <!--begin::Card title-->
            <div class="card-title m-0">
                <h3 class="fw-bolder m-0">ویرایش نقش </h3>
            </div>
            <!--end::Card title-->
        </div>
        <!--begin::Card header-->
        <!--begin::Content-->
        <div id="kt_account_profile_details" class="collapse show">
            <form class="form fv-plugins-bootstrap5 fv-plugins-framework"
                action="{{ route('admin.role.update')}}" method="POST">
                @csrf
                <input type="hidden" name="cid" value="{{ $role->id }}">
                <div class="card-body border-top p-9">
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label required fw-bold fs-6">عنوان نقش</label>
                        <!--end::Label-->

                        <div class="col-lg-8">
                            <!--begin::Row-->
                            <div class="row">

                                <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                    <input type="text" name="name" value="{{ $role->name }}"
                                        class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                        placeholder="Full Name">
                                    @error('name')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                            </div>
                            <!--end::Row-->
                        </div>


                        <div class="row mb-6">
                            <label class="col-lg-4 col-form-label fw-bold fs-6">
                                <span class="required">عنوان نقش به کاربر را مشخص کنید </span>
                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title=""
                                    data-bs-original-title="select the permission for this role"
                                    aria-label="Country of origination"></i>
                            </label>
                            <div class="col-lg-8 fv-row fv-plugins-icon-container" tabindex="-1" style="width: 435px;">


                                @foreach ($permissions as $permission)
                                    <div class="d-flex fv-row gap-5">
                                        <div class="form-check form-check-custom form-check-solid">
                                            <input class="form-check-input me-3" name="permission[]" type="checkbox"
                                            value="{{ $permission->id }}" {{ $role->permissions->contains($permission->id) ? 'checked' : '' }} />
                                            <label class="form-check-label mt-3">
                                                <div class="fw-bolder text-gray-800">{{ $permission->name }}</div>
                                            </label>
                                        </div>
                                    </div>
                                @endforeach





                                @error('permission')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!--end::Col-->
                        </div>


                    </div>
                </div>
                <!--end::Card body-->
                <!--begin::Actions-->
                <div class="card-footer d-flex justify-content-end py-6 px-9">
                    <a href="{{ route('admin.role.roles') }}"
                        class="btn btn-light btn-light-primary me-2">{{ __('home.BackBtn') }}</a>
                    <button type="submit" class="btn btn-primary"
                        id="kt_account_profile_details_submit">{{ __('home.SaveBtn') }}</button>
                </div>
                <!--end::Actions-->
                <input type="hidden">
                <div></div>
            </form>
        </div>
    </div>
@endsection
