@extends('admin.layouts.home-layout')

@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Job Descriptions')

@section('content')
    @push('stylesheets')
        select{
        style="cursor: pointer;"
        }
    @endpush
    <div class="card-header shadow-lg mx-5 mb-5 border-0 cursor-pointer" style="padding-bottom: 50px;" role="button"
        data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true"
        aria-controls="kt_account_profile_details" style=" direction: auto; background-color: #ffff">
        <div class="card-title m-0">
            <h3 class="fw-bolder text-[25px] m-5">{{ __('home.Job.Add_New_JobDescription') }}</h3>
        </div>

        <form method="post" action="{{ route('admin.job.description.store') }}">
            @csrf

            <div class="card-body border-top p-9">
                <div class="col-lg-8 fv-row fv-plugins-icon-container my-3" tabindex="-1" style="width: 435px;">
                    <select name="job_id" aria-placeholder="عنوان شغل را مشخص کنید"
                        data-placeholder="عنوان شغل را مشخص کنید"
                        class="form-select form-select-solid form-select-lg fw-bold select2-hidden-accessible"
                        aria-label="Select a Role" data-control="select2">

                        @if (isset($selectedJobTitle))
                            <option value="{{ $selectedJobTitle->id }}">{{ $selectedJobTitle->job_title }}</option>
                        @endif

                        @foreach ($jobs as $job)
                            @if (isset($selectedJobTitle) && $selectedJobTitle->id == $job->id)
                                @continue
                            @endif
                            <option value="{{ $job->id }}">{{ $job->job_title }}</option>
                        @endforeach
                    </select>


                    @error('job_id')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>



                <div class="col-lg-8 fv-row fv-plugins-icon-container my-3" tabindex="-1" style="width: 435px;">
                    <select name="priority"
                        class="form-select form-select-solid form-select-lg fw-bold select2-hidden-accessible"
                        aria-label="Select a Role" data-control="select2">
                        <option value="">اولیت را انتخاب کنید </option>
                        <option value="1">اول</option>
                        <option value="2">دوم</option>
                        <option value="3">سوم</option>
                        <option value="4">چهارم</option>
                        <option value="5">پنجم</option>
                    </select>
                    @error('priority')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>


                <div class="col-lg-8 fv-row fv-plugins-icon-container my-3" tabindex="-1" style="width: 435px;">
                    <select name="periods"
                        class="form-select form-select-solid form-select-lg fw-bold select2-hidden-accessible"
                        aria-label="Select a Role" data-control="select2">
                        <option value="">بازه زمانی را در این شغل انتخاب کنید </option>
                        <option value="1">روزانه </option>
                        <option value="2">هفتگی </option>
                        <option value="3">سالانه </option>
                        <option value="4">موردی </option>
                        <option value="5">ماهانه </option>
                    </select>
                    @error('periods')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>




                <div class="col-lg-8 fv-row fv-plugins-icon-container my-3" tabindex="-1" style="width: 435px;">
                    <select name="ability_level"
                        class="form-select form-select-solid form-select-lg fw-bold select2-hidden-accessible"
                        aria-label="Select a ability_level" data-control="select2">
                        <option value="">سطخ توانمندی خود را در این شغل انتخاب کنید </option>
                        <option value="1">کم</option>
                        <option value="2">متوسط</option>
                        <option value="3">زیاد</option>
                    </select>
                    @error('ability_level')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>




                <div class="col-lg-8 fv-row fv-plugins-icon-container my-3" tabindex="-1" style="width: 435px;">
                    <select name="effect_of_hazards"
                        class="form-select form-select-solid form-select-lg fw-bold select2-hidden-accessible"
                        aria-label="Select a effect_of_hazards" data-control="select2">
                        <option value="">اثر مخاطرات را در این شغل انتخاب کنید </option>
                        <option value="1">فردی</option>
                        <option value="2">گروه کاری</option>
                        <option value="3">سازمان</option>
                        <option value="4">مشتری</option>
                    </select>
                    @error('effect_of_hazards')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>



                <div class="col-lg-8 fv-row fv-plugins-icon-container my-3" tabindex="-1" style="width: 435px;">
                    <select name="risks"
                        class="form-select form-select-solid form-select-lg fw-bold select2-hidden-accessible"
                        aria-label="Select a risks" data-control="select2">
                        <option value="">مخاطرات را در این شغل انتخاب کنید </option>
                        <option value="1">کم</option>
                        <option value="2">متوسط</option>
                        <option value="3">زیاد</option>
                    </select>
                    @error('risks')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>





                <div class="col-lg-8 fv-row fv-plugins-icon-container my-3" tabindex="-1" style="width: 435px;">
                    <select name="skill_level" data-control="select2"
                        class="form-select form-select-solid form-select-lg fw-bold select2-hidden-accessible">
                        <option value="">میزان مهارت خود را در این شغل انتخاب کنید </option>
                        <option value="1">آشنایی</option>
                        <option value="2">تسلط نسبی</option>
                        <option value="3">تسلط کامل</option>
                    </select>
                    @error('skill_level')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>





                <div class="col-lg-8 fv-row fv-plugins-icon-container my-3" tabindex="-1" style="width: 435px;">
                    <select data-control="select2" name="level_type"
                        aria-placeholder="نوع مهارت خود را در این شغل انتخاب کنید"
                        class="form-select form-select-solid form-select-lg fw-bold select2-hidden-accessible">
                        <option value="">نوع مهارت خود را در این شغل انتخاب کنید </option>
                        <option value="بررسی اسناد">بررسی اسناد</option>
                        <option value="همکاران سیستم">همکاران سیستم</option>
                        <option value="بایگانی اسناد">بایگانی اسناد</option>
                        <option value="صدور اسناد حسابداری">صدور اسناد حسابداری</option>
                    </select>
                    @error('level_type')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>





                <div class="col-lg-8 fv-row fv-plugins-icon-container my-3" tabindex="-1" style="width: 435px;">
                    <div class="row mb-6">
                        <div class="col-lg-8 fv-row fv-plugins-icon-container">
                            <input type="text" name="time" class="form-control form-control-lg form-control-solid"
                                placeholder="زمان را به دقیقه وارد کنید" style="width: 405px;">
                            @error('time')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                            {{--  <div class="fv-plugins-message-container invalid-feedback"></div>  --}}
                        </div>
                        <!--end::Col-->
                    </div>
                </div>









            </div>
            <div class="mt-5">
                <div class="d-flex align-items-center justify-content-center py-6 px-9"
                    style="margin-top: 290px; margin-right: 150px;">
                    <a href="{{ route('admin.job.jobs') }}"
                        class="btn btn-light btn-light-primary me-2">{{ __('home.BackBtn') }}</a>
                    <button type="submit" class="btn btn-primary">{{ __('home.SaveBtn') }}</button>
                </div>
            </div>
        </form>
    </div>



























    {{--  JOB DESCRIPTION  ----------------------------------------------------------------------------- --}}

    <div class="content d-flex flex-column flex-column-fluid shadow-lg mx-5 mb-5" id="kt_content">
        <div class="toolbar" id="kt_toolbar">
            <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                <div class="d-flex align-items-center py-1">
                    <div class="me-4">
                        <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true"
                            id="kt_menu_61484c5528c3d">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <div id="kt_content_container" class="container-xxl">
                <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                    data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                    class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                    <!--begin::Title-->
                    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">{{ __('home.Job.JobTitle') }}</h1>
                    <!--end::Title-->
                    <!--begin::Separator-->
                    <span class="h-20px border-gray-200 border-start mx-4"></span>
                    <!--end::Separator-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ route('home') }}"
                                class="text-muted text-hover-primary">{{ __('home.links.Home') }}</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-200 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ route('admin.user.users') }}"
                                class="text-muted text-hover-primary">{{ __('home.links.UserManagement') }}</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-200 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-dark">{{ __('home.Job.JobTitle') }}</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--begin::Card-->
                <div class="card">




                    <div class="card-title m-0">
                        <h3 class="fw-bolder text-[25px] m-5">{{ __('home.Job.JobDescription_list') }}</h3>
                    </div>
                    <hr>


                    <!--begin::Card header-->
                    <div class="card-header border-0 pt-6">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <!--begin::Search-->
                            <div class="d-flex align-items-center position-relative my-1" style="width: 950px;">



                                {{--  <form action="{{ route('admin.job.search') }}" method="get"
                                    class="d-flex align-items-center" style="width: 5550px; font-size: 10px;">
                                    <input type="search" class="form-control form-control-solid w-250px ps-14" style="font-size: 12px; padding : 20px 0;"
                                        name="search" required placeholder="{{ __('home.Job.Job_placeHolder') }}..."
                                        style="width: 250px;padding: 20px;">
                                    <button type="submit"
                                        class="btn btn-primary rounded-none">{{ __('home.search_btn') }}</button>
                                </form>  --}}





                            </div>
                            <!--end::Search-->
                        </div>
                        <!--begin::Card title-->
                        <!--begin::Card toolbar-->
                        <div class="card-toolbar">
                            <!--begin::Toolbar-->
                            <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">


                                <!--begin::Add user-->
                                {{--  <a href="{{ route('admin.job.create') }}" class="btn btn-primary">

                                    <span class="svg-icon svg-icon-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2"
                                                rx="1" transform="rotate(-90 11.364 20.364)" fill="black">
                                            </rect>
                                            <rect x="4.36396" y="11.364" width="16" height="2" rx="1"
                                                fill="black"></rect>
                                        </svg>
                                    </span>
                                    {{ __('home.Job.Job_Add_Btn') }}
                                </a>  --}}
                                <!--end::Add user-->
                            </div>
                            <!--end::Toolbar-->
                            <!--begin::Group actions-->
                            <div class="d-flex justify-content-end align-items-center d-none"
                                data-kt-user-table-toolbar="selected">
                                <div class="fw-bolder me-5">
                                    <span class="me-2" data-kt-user-table-select="selected_count"></span>Selected
                                </div>
                                <button type="button" class="btn btn-danger"
                                    data-kt-user-table-select="delete_selected">Delete Selected</button>
                            </div>


                            <!--end::Modal - Add task-->
                        </div>
                        <!--end::Card toolbar-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0">

                        <!--begin::Table-->
                        <div id="kt_table_users_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">

                            <div class="table-responsive">
                                <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer"
                                    id="kt_table_users">
                                    <!--begin::Table head-->
                                    <thead>
                                        <!--begin::Table row-->
                                        <tr class="text-start text-muted fw-bolder fs-7 gs-0">






                                            <th class="text-center">
                                                {{ __('home.Job.Job_title') }}
                                            </th>

                                            <th>
                                                {{ __('home.Job_description_form.prority') }}
                                            </th>
                                            <th>
                                                {{ __('home.Job_description_form.periods') }}
                                            </th>
                                            <th>
                                                {{ __('home.Job_description_form.ability_level') }}
                                            </th>
                                            <th>
                                                {{ __('home.Job_description_form.risks') }}
                                            </th>
                                            <th>
                                                {{ __('home.Job_description_form.effect_of_hazards') }}
                                            </th>

                                            <th>
                                                {{ __('home.Job_description_form.skill_level') }}
                                            </th>
                                            <th>
                                                {{ __('home.Job_description_form.skill_level_title') }}
                                            </th>
                                            <th>
                                                {{ __('home.Job_description_form.time') }}
                                            </th>

                                            <th class="text-start min-w-100px sorting_disabled" rowspan="1"
                                                colspan="1" aria-label="Actions" style="width: 112.156px;">Actions
                                            </th>

                                        </tr>
                                        <!--end::Table row-->
                                    </thead>
                                    <!--end::Table head-->
                                    <!--begin::Table body-->
                                    <tbody class="text-gray-600 fw-bold">


                                        @foreach ($datas as $data)
                                            @foreach ($data->jobs as $job)
                                                @if (isset($selectedJobTitle) && $selectedJobTitle->id == $job->id)
                                                    <tr class="odd">

                                                        <td class="text-center">
                                                            @foreach ($data->jobs as $job)
                                                                {{ $job->job_title }}
                                                            @endforeach
                                                        </td>
                                                        <td>{{ $data->priority }}</td>
                                                        <td>
                                                            <div>{{ $data->periods }}</div>
                                                        </td>
                                                        <td>{{ $data->ability_level }}</td>
                                                        <td>{{ $data->risks }}</td>
                                                        <td>{{ $data->effect_of_hazards }}</td>
                                                        <td>{{ $data->skill_level }}</td>

                                                        <td>
                                                            @if ($data->skill_level_title)
                                                                {{ $data->level_type }}
                                                            @else
                                                                <p class="text-muted fs-6">.......</p>
                                                            @endif
                                                        </td>
                                                        <td>{{ $data->time }} دقیقه</td>
                                                        <td class="text-center">
                                                            <a href="#"
                                                                class="btn btn-light btn-light-primary btn-sm"
                                                                data-kt-menu-trigger="click"
                                                                data-kt-menu-placement="bottom-end">
                                                                Actions
                                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                                                <span class="svg-icon svg-icon-5 m-0">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                        height="24" viewBox="0 0 24 24"
                                                                        fill="none">
                                                                        <path
                                                                            d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                                            fill="black"></path>
                                                                    </svg>
                                                                </span>
                                                                <!--end::Svg Icon-->
                                                            </a>
                                                            <!--begin::Menu-->
                                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4"
                                                                data-kt-menu="true">
                                                                <div class="menu-item px-3" id="edit">
                                                                    <a href="{{ route('admin.job.description.edit', $data->id) }}"
                                                                        class="menu-link px-3">{{ __('home.form.Edit') }}</a>
                                                                </div>
                                                                <div class="menu-item px-3">
                                                                    <a href="{{ route('admin.job.description.delete', $data->id) }}"
                                                                        class="menu-link px-3"
                                                                        onclick="return confirm('حذف شود؟')"
                                                                        data-kt-users-table-filter="delete_row">{{ __('home.form.Delete') }}</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        @endforeach



                                    </tbody>


                                </table>
                            </div>
                        </div>
                        <!--end::Table-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>














    <div class="content d-flex flex-column flex-column-fluid shadow-lg mx-5 mb-5" id="kt_content">
        <div class="toolbar" id="kt_toolbar">
            <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                <div class="d-flex align-items-center py-1">
                    <div class="me-4">
                        <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true"
                            id="kt_menu_61484c5528c3d">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <div id="kt_content_container" class="container-xxl">
                <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                    data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                    class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                    <!--begin::Title-->
                    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">شرح فعالیت شغل</h1>
                    <!--end::Title-->
                    <!--begin::Separator-->
                    <span class="h-20px border-gray-200 border-start mx-4"></span>
                    <!--end::Separator-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ route('home') }}"
                                class="text-muted text-hover-primary">{{ __('home.links.Home') }}</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-200 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ route('admin.user.users') }}"
                                class="text-muted text-hover-primary">{{ __('home.links.UserManagement') }}</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-200 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-dark">{{ __('home.Job.JobTitle') }}</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--begin::Card-->
                <div class="card">




                    <div class="card-title m-0">
                        <h3 class="fw-bolder text-[25px] m-5">شرح فعالیت</h3>
                    </div>
                    <hr>


                    <!--begin::Card header-->
                    <div class="card-header border-0 pt-6">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <!--begin::Search-->
                            <div class="d-flex align-items-center position-relative my-1" style="width: 950px;">



                                {{--  <form action="{{ route('admin.job.search') }}" method="get"
                                    class="d-flex align-items-center" style="width: 5550px; font-size: 10px;">
                                    <input type="search" class="form-control form-control-solid w-250px ps-14" style="font-size: 12px; padding : 20px 0;"
                                        name="search" required placeholder="{{ __('home.Job.Job_placeHolder') }}..."
                                        style="width: 250px;padding: 20px;">
                                    <button type="submit"
                                        class="btn btn-primary rounded-none">{{ __('home.search_btn') }}</button>
                                </form>  --}}





                            </div>
                            <!--end::Search-->
                        </div>
                        <!--begin::Card title-->
                        <!--begin::Card toolbar-->
                        <div class="card-toolbar">
                            <!--begin::Toolbar-->
                            <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">


                                <!--begin::Add user-->
                                {{--  <a href="{{ route('admin.job.create') }}" class="btn btn-primary">

                                    <span class="svg-icon svg-icon-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2"
                                                rx="1" transform="rotate(-90 11.364 20.364)" fill="black">
                                            </rect>
                                            <rect x="4.36396" y="11.364" width="16" height="2" rx="1"
                                                fill="black"></rect>
                                        </svg>
                                    </span>
                                    {{ __('home.Job.Job_Add_Btn') }}
                                </a>  --}}
                                <!--end::Add user-->
                            </div>
                            <!--end::Toolbar-->
                            <!--begin::Group actions-->
                            <div class="d-flex justify-content-end align-items-center d-none"
                                data-kt-user-table-toolbar="selected">
                                <div class="fw-bolder me-5">
                                    <span class="me-2" data-kt-user-table-select="selected_count"></span>Selected
                                </div>
                                <button type="button" class="btn btn-danger"
                                    data-kt-user-table-select="delete_selected">Delete Selected</button>
                            </div>


                            <!--end::Modal - Add task-->
                        </div>
                        <!--end::Card toolbar-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0">

                        <!--begin::Table-->
                        <div id="kt_table_users_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">

                            <div class="table-responsive">
                                <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer"
                                    id="kt_table_users">
                                    <!--begin::Table head-->
                                    <thead>
                                        <!--begin::Table row-->
                                        <tr class="text-start text-muted fw-bolder fs-7 gs-0">






                                            <th class="text-start">
                                                مدرک تحصیلی
                                            </th>

                                            <th class="text-start">
                                                سابقه کار
                                            </th>






                                        </tr>
                                        <!--end::Table row-->
                                    </thead>

                                    <tbody class="text-gray-600 fw-bold">



                                        <tr class="odd">




                                            <td class="mb-3">{!! $education_level !!}</td>
                                            <td>{!! $years_of_experience !!}</td>


                                        </tr>




                                    </tbody>


                                </table>
                            </div>
                        </div>
                        <!--end::Table-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>

@endsection
