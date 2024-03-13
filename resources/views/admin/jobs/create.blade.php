@extends('admin.layouts.home-layout')

@section('pageTitle',isset($pageTitle) ? $pageTitle  : 'Create Jobs')

@section('content')

    <div class="card-header border-0 cursor-pointer mx-5 rounded-top shadow-lg" style="background-color: #fdfdfd;" role="button" data-bs-toggle="collapse"
        data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details"
        style=" direction: auto;">
        <!--begin::Card title-->
        <div class="card-title m-0">
            <h3 class="fw-bolder my-5 pl-5 text-[25px]">{{ __('home.Job.Job_Add_Btn') }}</h3>
        </div>
        <!--end::Card title-->

        <form method="POST" action="{{ route('admin.job.store') }}">
            @csrf
            <div class="card-body border-top p-9" data-select2-id="select2-data-81-kvnf">

                <div class="row mb-6">
                    <label class="col-lg-4 col-form-label required fw-bold fs-6"
                        for="name">{{ __('home.Job.Job_title') }}</label>
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                <input type="text" name="job_title" id="job_title"
                                    class="form-control form-control-lg form-control-solid rounded-md"
                                    placeholder="{{ __('home.placeHolder.Job_title') }}">
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                    <span class="text-danger">
                        @error('job_title')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

                <div class="row mb-6">
                    <label
                        class="col-lg-4 col-form-label required fw-bold fs-6">{{ __('home.Job.Organization_unit') }}</label>
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                <input type="text" name="organization_unit"
                                    class="rounded-md form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                    placeholder="{{ __('home.placeHolder.Organization_unit') }} ">
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                    <span class="text-danger">
                        @error('organization_unit')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

                <div class="row mb-6">
                    <label
                        class="col-lg-4 col-form-label required fw-bold fs-6">{{ __('home.Job.Sub_organization') }}</label>
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                <input type="text" name="sub_organization"
                                    class="rounded-md form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                    placeholder=" {{ __('home.placeHolder.Sub_organization') }} ">
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                    <span class="text-danger">
                        @error('sub_organization')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
















                <div class="row mb-6">
                    <label
                        class="col-lg-4 col-form-label required fw-bold fs-6">{{ __('home.Job.Date_fixed') }} </label>
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                <input type="date" name="date_fixed"
                                    class="rounded-md form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                    >
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                    <span class="text-danger">
                        @error('date_fixed')
                            {{ $message }}
                        @enderror
                    </span>
                </div>














                <div class="row mb-6">
                    <label
                        class="col-lg-4 col-form-label required fw-bold fs-6">{{ __('home.Job.Direct_manager') }}</label>
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                <input type="text" name="direct_manager"
                                    class="rounded-md form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                    placeholder="{{ __('home.placeHolder.Direct_manager') }}">
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                    <span class="text-danger">
                        @error('direct_manager')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

                <div class="row mb-6">
                    <label
                        class="col-lg-4 col-form-label required fw-bold fs-6" for="description">{{ __('home.Job.Description') }}</label>
                    <div class="col-lg-8">
                        <textarea class="rounded-md w-[350px] form-control form-control-lg form-control-solid mb-3 mb-lg-0" name="description" id="description" cols="10" rows="10" placeholder="{{ __('home.placeHolder.Description') }}..."></textarea>
                    </div>
                    <span class="text-danger">
                        @error('description')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

                <div class="card-footer d-flex justify-content-end py-6 px-9">
                   <a class="btn btn-light btn-light-primary me-2"
                            href="{{ route('admin.job.jobs') }}">{{ __('home.BackBtn') }}</a>
                    <button type="submit" class="btn btn-primary">{{ __('home.SaveBtn') }}</button>
                </div>
            </div>
        </form>
    </div>
@endsection

