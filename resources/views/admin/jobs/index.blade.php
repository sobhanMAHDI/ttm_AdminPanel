@extends('admin.layouts.home-layout')

@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Jobs')

@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
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
        <div class="post d-flex flex-column-fluid " id="kt_post">
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
                <div class="card shadow-lg mx-5">
                    <!--begin::Card header-->
                    <div class="card-header border-0 pt-6">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <!--begin::Search-->
                            <div class="d-flex align-items-center position-relative my-1" style="width: 950px;">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2"
                                            rx="1" transform="rotate(45 17.0365 15.1223)" fill="black"></rect>
                                        <path
                                            d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                            fill="black"></path>
                                    </svg>
                                </span>



                                <form action="{{ route('admin.job.search') }}" method="get"
                                    class="d-flex align-items-center" style="width: 5550px; font-size: 10px;">
                                    <input type="search" class="form-control form-control-solid w-250px ps-14" style="font-size: 12px; padding : 20px 0;"
                                        name="search" required placeholder="{{ __('home.Job.Job_placeHolder') }}..."
                                        style="width: 250px;padding: 20px;">
                                    <button type="submit"
                                        class="btn btn-primary rounded-none">{{ __('home.search_btn') }}</button>
                                </form>





                            </div>
                            <!--end::Search-->
                        </div>
                        <!--begin::Card title-->
                        <!--begin::Card toolbar-->
                        <div class="card-toolbar">
                            <!--begin::Toolbar-->
                            <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">


                                <!--begin::Add user-->
                                <a href="{{ route('admin.job.create') }}" class="btn btn-primary">

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
                                </a>
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

                                            <th>
                                                {{ __('home.Job.Job_title') }}
                                            </th>

                                            <th>
                                                {{ __('home.Job.Organization_unit') }}
                                            </th>
                                            <th>
                                                {{ __('home.Job.Sub_organization') }}
                                            </th>
                                            <th>
                                                {{ __('home.Job.Date_fixed') }}
                                            </th>
                                            <th>
                                                {{ __('home.Job.Direct_manager') }}
                                            </th>
                                            <th>
                                                {{ __('home.Job.Description') }}
                                            </th>

                                            <th class="text-center min-w-100px sorting_disabled" rowspan="1"
                                                colspan="1" aria-label="Actions" style="width: 112.156px;">Actions
                                            </th>

                                        </tr>
                                        <!--end::Table row-->
                                    </thead>
                                    <!--end::Table head-->
                                    <!--begin::Table body-->
                                    <tbody class="text-gray-600 fw-bold">


                                        @forelse ($jobs as $job)
                                            <tr class="odd">



                                                <td>

                                                    {{ $job->job_title }}


                                                </td>

                                                <td>{{ $job->organization_unit }}</td>

                                                <td>
                                                    <div class="badge badge-light fw-bolder">{{ $job->sub_organization }}
                                                    </div>
                                                </td>

                                                <td>{{ \Morilog\Jalali\Jalalian::fromDateTime($job->date_fixed)->format('d/m/Y') }}
                                                </td>


                                                <td>{{ $job->direct_manager }}</td>
                                                <td>{{ substr($job->description, 0, 50) }}..</td>



                                                <td class="text-center">
                                                    <a href="#"
                                                        class="btn btn-light btn-light-primary btn-sm"
                                                        data-kt-menu-trigger="click"
                                                        data-kt-menu-placement="bottom-end">Actions
                                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                                        <span class="svg-icon svg-icon-5 m-0">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none">
                                                                <path
                                                                    d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                                    fill="black"></path>
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon--></a>
                                                    <!--begin::Menu-->
                                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4"
                                                        data-kt-menu="true">
                                                        <div class="menu-item px-3">
                                                            <a href="{{ route('admin.job.edit', $job->id) }}"
                                                                class="menu-link px-3">{{ __('home.form.Edit') }}</a>
                                                        </div>
                                                        <div class="menu-item px-3">
                                                            <a href="{{ route('admin.job.delete', $job->id) }}"
                                                                class="menu-link px-3"
                                                                onclick="return confirm('آیا این شغل حذف شود؟')"
                                                                data-kt-users-table-filter="delete_row">{{ __('home.form.Delete') }}</a>
                                                        </div>
                                                        <div class="menu-item px-3">
                                                            <a href="{{ route('admin.job.description.index',$job->id) }}"
                                                                class="menu-link px-3" style="font-size: 11px;"
                                                                data-kt-users-table-filter="delete_row">{{ __('home.form.Job_Description') }}</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <h3 class="text-danger text-center">هنوز شغلی وارد نشده</h3>
                                        @endforelse





                                    </tbody>
                                    <div class="d-flex justify-content-center gap-3">
                                        {{ $jobs->links('pagination::bootstrap-4') }}
                                    </div>


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
