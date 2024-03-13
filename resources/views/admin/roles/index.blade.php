@extends('admin.layouts.home-layout')

@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Roles List')

@section('content')
    <div class="card card-flush mx-5 shadow-lg" style="background-color: #ffffff;">
        <!--begin::Card header-->
        <div class="card-header mt-6">
            <!--begin::Card title-->
            <div class="card-title">
                <!--begin::Search-->
                <div class="d-flex align-items-center position-relative my-1 me-5">
                    <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                    <span class="svg-icon svg-icon-1 position-absolute ms-6">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1"
                                transform="rotate(45 17.0365 15.1223)" fill="black"></rect>
                            <path
                                d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                fill="black"></path>
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                    {{--  <form action="{{ route('admin.permission.search') }}" method="get"
                class="d-flex align-items-center">
                <input type="search" class="form-control form-control-solid w-250px ps-14"
                    name="search" placeholder="نام دسترسی را جستجو کنید" style="padding: 20px 0;">
                <button type="submit" class="btn btn-primary rounded-none">{{ __('home.search_btn') }}</button>
            </form>  --}}




                    <div class="d-flex align-items-center">
                        <form action="{{ route('admin.role.search') }}" method="get" class="d-flex align-items-center"
                            style="width: 400px;">
                            <input type="search" class="form-control form-control-solid ps-14"
                                style="padding: 20px 0; width: 355px;" name="search"
                                placeholder="بر اساس عنوان نقش جستجو کنید...">
                            <button type="submit" class="btn btn-primary rounded-none">{{ __('home.search_btn') }}</button>
                        </form>
                    </div>



                </div>
            </div>




            <!--begin::Add user-->
            <div class="card-toolbar">
                <a href="{{ route('admin.role.create') }}" class="btn btn-primary">

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
                                    {{ __('home.role.Add_New_Role') }}
                                </a>
            </div>

                                <!--end::Add user-->









        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body pt-0">
            <!--begin::Table-->
            <div id="kt_permissions_table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                <div class="table-responsive">
                    <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0 dataTable no-footer"
                        id="kt_permissions_table">
                        <!--begin::Table head-->
                        <thead>
                            <!--begin::Table row-->
                            <tr class="text-start text-gray-400 fw-bolder fs-7 gs-0">
                                <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_permissions_table"
                                    rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending"
                                    style="width: 155.344px;">Name</th>
                                <th class="min-w-250px sorting_disabled" rowspan="1" colspan="1"
                                    aria-label="Assigned to" style="width: 432.484px;">Has permissions</th>
                                <th class="text-end min-w-100px sorting_disabled" rowspan="1" colspan="1"
                                    aria-label="Actions" style="width: 100.953px;">Actions</th>
                            </tr>
                            <!--end::Table row-->
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody class="fw-bold text-gray-600">








                            @foreach ($roles as $role)
                                <tr class="odd">

                                    <td>{{ $role->name }}</td>

                                    <td>
                                        @foreach ($role->permissions as $permission)
                                            <a class="badge badge-light-danger fs-7 m-1"
                                                href="{{ route('admin.permission.edit', $permission->id) }}"
                                                class="badge badge-primary fs-7 m-1">{{ $permission->name }}</a>
                                        @endforeach

                                    </td>

                                    <!--end::Created Date-->
                                    <!--begin::Action=-->
                                    <td class="text-end">
                                        <a href="#" class="btn btn-light btn-light-primary btn-sm"
                                            data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                            <span class="svg-icon svg-icon-5 m-0">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <path
                                                        d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                        fill="black"></path>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon--></a>
                                        <!--begin::Menu-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4"
                                            data-kt-menu="true">
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="{{ route('admin.role.edit', $role->id) }}"
                                                    class="menu-link px-3">{{ __('home.form.Edit') }}</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a onclick="return confirm('آیا این نقش حذف شود ؟')"
                                                    href="{{ route('admin.role.delete', $role->id) }}"
                                                    class="menu-link px-3"
                                                    data-kt-users-table-filter="delete_row">{{ __('home.form.Delete') }}</a>
                                            </div>
                                            <!--end::Menu item-->
                                        </div>

                                    </td>

                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
                <div class="row">
                <div class="d-flex justify-content-center gap-3">
                    {{ $roles->links('pagination::bootstrap-4') }}
                </div>
            </div>
            </div>

        </div>

    </div>








@endsection
