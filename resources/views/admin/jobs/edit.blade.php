@extends('admin.layouts.home-layout')

@section('pageTitle',isset($pageTitle) ? $pageTitle  : 'Edit Jobs')

@section('content')
    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
        data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details"
        style=" direction: auto;">
        <div class="card-title m-0">
            <h3 class="fw-bolder text-[25px] m-5">ویرایش شغل</h3>
        </div>

        <form method="post" action="{{ route('admin.job.update') }}">
            @csrf

            <input type="hidden" name="cid" value="{{ $job->id }}">
            <div class="card-body border-top p-9" data-select2-id="select2-data-81-kvnf">

                <div class="row mb-6">
                    <label class="col-lg-4 col-form-label required fw-bold fs-6"
                        for="name">عنوان شغل</label>
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                <input type="text" name="job_title" id="name"
                                    class="form-control form-control-lg form-control-solid rounded-md"
                                    placeholder="{{ __('home.admin_home.UsersFormNamePlaceholder') }}"
                                    value="{{ $job->job_title }}">
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                    <span class="text-red-500">
                        @error('name')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

                <div class="row mb-6">
                    <label
                        class="col-lg-4 col-form-label required fw-bold fs-6">واحد سازمانی</label>
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                <input type="text" name="organization_unit"
                                    class="rounded-md form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                    placeholder="{{ __('home.admin_home.UsersFormNamePlaceholderEmail') }}"
                                    value="{{ $job->organization_unit }}">
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                    <span class="text-red-500">
                        @error('organization_unit')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

                <div class="row mb-6">
                    <label
                        class="col-lg-4 col-form-label required fw-bold fs-6">زیر واحد</label>
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                <input type="text" name="sub_organization"
                                    class="rounded-md form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                    placeholder="{{ __('home.admin_home.UsersFormNamePlaceholderEmail') }}"
                                    value="{{ $job->sub_organization }}">
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                    <span class="text-red-500">
                        @error('sub_organization')
                            {{ $message }}
                        @enderror
                    </span>
                </div>


                <div class="row mb-6">
                    <label
                        class="col-lg-4 col-form-label required fw-bold fs-6">تاریخ تنظیم</label>
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                <input type="date" name="date_fixed"
                                    class="rounded-md form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                    placeholder="{{ __('home.admin_home.UsersFormNamePlaceholderEmail') }}"
                                    value="{{ $job->date_fixed }}">
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                    <span class="text-red-500">
                        @error('date_fixed')
                            {{ $message }}
                        @enderror
                    </span>
                </div>





                <div class="row mb-6">
                    <label
                        class="col-lg-4 col-form-label required fw-bold fs-6">مدیر مستقیم</label>
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                <input type="text" name="direct_manager"
                                    class="rounded-md form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                    placeholder="{{ __('home.admin_home.UsersFormNamePlaceholderEmail') }}"
                                    value="{{ $job->direct_manager }}">
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                    <span class="text-red-500">
                        @error('direct_manager')
                            {{ $message }}
                        @enderror
                    </span>
                </div>





                <div class="row mb-6">
                    <label
                        class="col-lg-4 col-form-label required fw-bold fs-6" for="description">توضیحات</label>
                    <div class="col-lg-8">
                        <textarea class="rounded-md w-[350px] form-control form-control-lg form-control-solid mb-3 mb-lg-0" name="description" id="description" cols="10" rows="10" placeholder="توضیحات">{{ $job->description }}</textarea>
                    </div>
                    <span class="text-red-500">
                        @error('description')
                            {{ $message }}
                        @enderror
                    </span>
                </div>





                <div class="card-footer d-flex justify-content-end py-6 px-9">
                    <button type="button" class="btn btn-light btn-light-primary me-2"><a
                            href="{{ route('admin.user.users') }}">{{ __('home.admin_home.BackBtn') }}</a></button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
    </div>


@endsection
