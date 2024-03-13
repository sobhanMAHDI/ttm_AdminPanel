@extends('admin.layouts.home-layout')

@section('pageTitle',isset($pageTitle) ? $pageTitle  : 'Edit Task')

@section('content')
    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
    data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details"
    style=" direction: auto;">
    <!--begin::Card title-->
    <div class="card-title m-0">
        <h3 class="fw-bolder m-0">ویرایش وظایف</h3>
    </div>
    <!--end::Card title-->

    <form method="post" action="{{ route('admin.task.update') }}">
        @csrf

        <input type="hidden" name="cid" value="{{ $task->id }}">
        <div class="card-body border-top p-9" data-select2-id="select2-data-81-kvnf">



            <div class="row mb-6">
                <label class="col-lg-4 col-form-label required fw-bold fs-6">عنوان وظایف شغل</label>
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-6 fv-row fv-plugins-icon-container">
                            <input type="text" name="task_title" class="rounded-md form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                placeholder="عنوان وظیفه را وارد کنید" value="{{ $task->task_title }}" />
                        </div>
                    </div>
                </div>
                <span class="text-red-500">
                    @error('task_title')
                        {{ $message }}
                    @enderror
                </span>
            </div>


            <div class="row mb-6">
                <label class="col-lg-4 col-form-label required fw-bold fs-6"
                    for="name">عنوان شغل</label>
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-6 fv-row fv-plugins-icon-container">
                            <select name="job_id" class="rounded-md form-control form-control-lg form-control-solid mb-3 mb-lg-0">
                                @foreach ($jobs as $id => $job_title)
                                    <option value="{{ $id }}">{{ $job_title }}</option>
                                @endforeach
                            </select>

                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>

                    </div>
                    <span class="text-red-500">
                        @error('job_id')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

            </div>


            <div class="row mb-6">
                <label class="col-lg-4 col-form-label required fw-bold fs-6"
                    for="name"> شغل</label>
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-6 fv-row fv-plugins-icon-container">
                            <select name="job_id" class="rounded-md form-control form-control-lg form-control-solid mb-3 mb-lg-0">
                                @foreach ($parents as $parent => $task_title)
                                    <option value="{{ $id }}">{{ $task_title }}</option>
                                @endforeach
                            </select>

                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>

                    </div>
                    <span class="text-red-500">
                        @error('job_id')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

            </div>


            <div class="row mb-6">
                <label
                    class="col-lg-4 col-form-label required fw-bold fs-6">شرح وظایف شغل</label>
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-6 fv-row fv-plugins-icon-container">
                            <textarea name="task_description" class="rounded-md form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="شرح وظایف شغل را وارد کنید" id="" cols="30" rows="10">{{ $task->task_description }}</textarea>

                        </div>
                    </div>
                </div>
                <span class="text-red-500">
                    @error('task_description')
                        {{ $message }}
                    @enderror
                </span>
            </div>






            <div class="card-footer d-flex justify-content-end py-6 px-9">
               <a class="btn btn-light btn-light-primary me-2"
                        href="{{ route('admin.user.users') }}">بازگشت</a>
                <button type="submit" class="btn btn-primary">ذخیره</button>
            </div>
        </div>
    </form>
</div>

@endsection
