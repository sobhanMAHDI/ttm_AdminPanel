@extends('admin.layouts.home-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Roles Details')
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Toolbar-->
        <div class="toolbar" id="kt_toolbar">
            <!--begin::Container-->
            <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            </div>
            <!--end::Container-->
        </div>
        <!--end::Toolbar-->
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container-xxl">
                <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                    data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                    class="page-title d-flex align-items-center   me-3 mb-5 mb-lg-0">
                    <!--begin::Title-->
                    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">{{ __('home.role.roleDetailTitle') }}</h1>
                    <!--end::Title-->
                    <!--begin::Separator-->
                    <span class="h-20px border-gray-200 border-start mx-4"></span>
                    <!--end::Separator-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="../../demo1/dist/index.html" class="text-muted text-hover-primary">{{ __('home.links.Home') }}</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-200 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ route('admin.user.users') }}" class="text-muted text-hover-primary">{{ __('home.links.UserManagement') }}</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-200 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                           <a href="{{ route('admin.role.roles') }}" class="text-muted text-hover-primary"> {{ __('home.links.Roles') }}</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-200 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-dark">View Role</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--begin::Layout-->
                <div class="d-flex flex-column flex-xl-row">
                    <!--begin::Sidebar-->
                    <div class="flex-column flex-lg-row-auto w-100 w-lg-300px mb-10">
                        <!--begin::Card-->
                        <div class="card card-flush" style="background-color: #eee">
                            <!--begin::Card header-->
                            <div class="card-header" style="background-color: #eee;">
                                <!--begin::Card title-->
                                <div class="card-title">
                                    <h2 class="mb-0">{{ $roleName }}</h2>
                                </div>
                            </div>
                            <hr>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body pt-0">
                                <!--begin::Permissions-->
                                <div class="d-flex flex-column text-gray-600">
                                    <div class="d-flex align-items-center py-2">
                                        <span class="bullet bg-primary me-3"></span>Some {{ $roleName }} Controls
                                    </div>
                                    <div class="d-flex align-items-center py-2">
                                        <span class="bullet bg-primary me-3"></span>View Financial Summaries only
                                    </div>
                                    <div class="d-flex align-items-center py-2">
                                        <span class="bullet bg-primary me-3"></span>View and Edit API Controls
                                    </div>
                                    <div class="d-flex align-items-center py-2">
                                        <span class="bullet bg-primary me-3"></span>View Payouts only
                                    </div>
                                    <div class="d-flex align-items-center py-2">
                                        <span class="bullet bg-primary me-3"></span>View and Edit Disputes
                                    </div>
                                    <div class="d-flex align-items-center py-2 d-none">
                                        <span class="bullet bg-primary me-3"></span>
                                        <em>and 3 more...</em>
                                    </div>
                                </div>
                                <!--end::Permissions-->
                            </div>
                            <!--end::Card body-->

                        </div>
                        <!--end::Card-->

                    </div>
                    <!--end::Sidebar-->
                    <!--begin::Content-->
                    <div class="flex-lg-row-fluid ms-lg-10">
                        <!--begin::Card-->
                        <div class="card card-flush mb-6 mb-xl-9">
                            <!--begin::Card header-->
                            {{--  <div class="card-header pt-5">
                                <!--begin::Card title-->
                                <div class="card-title mb-5">
                                    <h2 class="d-flex align-items-center">{{ __('home.role.UsersAssigned') }}
                                        <span class="text-gray-600 fs-6 ms-1"></span>
                                    </h2>
                                </div>
                                <hr/>
                                <!--end::Card title-->
                                <!--begin::Card toolbar-->
                                <div class="card-toolbar">
                                    <div class="d-flex justify-content-end align-items-center d-none"
                                        data-kt-view-roles-table-toolbar="selected">
                                        <div class="fw-bolder me-5">
                                            <span class="me-2"
                                                data-kt-view-roles-table-select="selected_count"></span>Selected
                                        </div>
                                        <button type="button" class="btn btn-danger"
                                            data-kt-view-roles-table-select="delete_selected">Delete Selected</button>
                                    </div>
                                    <!--end::Group actions-->
                                </div>
                                <!--end::Card toolbar-->
                            </div>  --}}
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body pt-0 shadow-lg">
                                <!--begin::Table-->
                                <div id="kt_roles_view_table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                    <div class="table-responsive">
                                        <table
                                            class="table align-middle table-row-dashed fs-6 gy-5 mb-0 dataTable no-footer"
                                            id="kt_roles_view_table">
                                            <!--begin::Table head-->
                                            <thead>
                                                <!--begin::Table row-->
                                                <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                                    <th class="w-10px pe-2 sorting_disabled" rowspan="1"
                                                        colspan="1"
                                                        aria-label="



                                        "
                                                        style="width: 29.25px;">
                                                        <div
                                                            class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                                            <input class="form-check-input" type="checkbox"
                                                                data-kt-check="true"
                                                                data-kt-check-target="#kt_roles_view_table .form-check-input"
                                                                value="1">
                                                        </div>
                                                    </th>

                                                    <th class="min-w-150px sorting" tabindex="0"
                                                        aria-controls="kt_roles_view_table" rowspan="1" colspan="1"
                                                        aria-label="User: activate to sort column ascending"
                                                        style="width: 288.297px;">نام و نام خانوادگی</th>
                                                    <th class="min-w-125px sorting" tabindex="0"
                                                        aria-controls="kt_roles_view_table" rowspan="1" colspan="1"
                                                        aria-label="Joined Date: activate to sort column ascending"
                                                        style="width: 170.172px;">ایمیل</th>
                                                    @if (auth()->user()->role == 'Administrator')
                                                        <th class="text-end min-w-100px sorting_disabled" rowspan="1"
                                                            colspan="1" aria-label="Actions"
                                                            style="width: 126.312px;">
                                                            Actions
                                                        </th>
                                                    @endif
                                                </tr>
                                                <!--end::Table row-->
                                            </thead>
                                            <!--end::Table head-->
                                            <!--begin::Table body-->
                                            <tbody class="fw-bold text-gray-600">














                                                @foreach ($users as $user)
                                                    <tr class="odd">
                                                        <!--begin::Checkbox-->
                                                        <td>
                                                            <div
                                                                class="form-check form-check-sm form-check-custom form-check-solid">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="1">
                                                            </div>
                                                        </td>
                                                        <!--end::Checkbox-->
                                                        <!--begin::User-->
                                                        <td>


                                                            <div >
                                                                <span href=""
                                                                    class="text-gray-800 mb-1">{{ $user->name }}</span>
                                                            </div>
                                                        </td>
                                                        <td>{{ $user->email }}</td>
                                                        <!--end::Joined date-->
                                                        <!--begin::Action-->
                                                        @if (auth()->user()->role == 'Administrator')
                                                        <td class="text-end">
                                                            <a href="#"
                                                                class="btn btn-sm btn-light btn-light-primary"
                                                                data-kt-menu-trigger="click"
                                                                data-kt-menu-placement="bottom-end">Actions
                                                                <span class="svg-icon svg-icon-5 m-0">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                        height="24" viewBox="0 0 24 24"
                                                                        fill="none">
                                                                        <path
                                                                            d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                                            fill="black"></path>
                                                                    </svg>
                                                                </span>
                                                            </a>
                                                            <!--begin::Menu-->

                                                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4"
                                                                    data-kt-menu="true">
                                                                    <!--begin::Menu item-->
                                                                    <div class="menu-item px-3">
                                                                        <a href="{{ route('admin.user.edit', $user->id) }}"
                                                                            class="menu-link px-3">{{ __('home.form.Edit') }}</a>
                                                                    </div>
                                                                    <!--end::Menu item-->
                                                                    <!--begin::Menu item-->
                                                                    <div class="menu-item px-3">
                                                                        <a href="{{ route('admin.role.delete', $user->id) }}" class="menu-link px-3" onclick="return confirm('آیا مطمئن هستید که می‌خواهید این مورد را حذف کنید؟')">{{ __('home.form.Delete') }}</a>
                                                                    </div>

                                                                    <!--end::Menu item-->
                                                                </div>

                                                            <!--end::Menu-->
                                                        </td>
                                                        @endif
                                                        <!--end::Action-->
                                                    </tr>
                                                @endforeach















                                            </tbody>
                                            <!--end::Table body-->
                                        </table>
                                    </div>

                                </div>
                                <!--end::Table-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Card-->
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Layout-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>
@endsection
