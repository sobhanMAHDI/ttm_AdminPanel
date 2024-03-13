@extends('admin.layouts.home-layout')

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
            <h3 class="fw-bolder text-[25px] m-5">افزودن شرح فعالیت شغل</h3>
        </div>

        <form method="post" action="{{ route('admin.job.description.update', $job_description->id) }}">
            @csrf
            <input type="hidden" name="cid" value="{{ $job_description->id }}">
            <div class="card-body border-top p-9">
                <div class="col-lg-8 fv-row fv-plugins-icon-container my-3" tabindex="-1" style="width: 435px;">
                    <select name="job_id" aria-placeholder="عنوان شغل را مشخص کنید"
                        data-placeholder="عنوان شغل را مشخص کنید"
                        class="form-select form-select-solid form-select-lg fw-bold select2-hidden-accessible"
                        aria-label="Select a Role" data-control="select2">
                        @foreach ($job_description->jobs as $job)
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
                    <select name="priority" aria-placeholder="اولویت را انتخاب کنید"
                        data-placeholder="اولویت را انتخاب کنید"
                        class="form-select form-select-solid form-select-lg fw-bold select2-hidden-accessible"
                        aria-label="Select a Role" data-control="select2">
                        <option value="{{ $job_description->priority }}">{{ $job_description->priority }}</option>
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
                    <select name="periods" aria-placeholder="اولویت را انتخاب کنید"
                        data-placeholder="بازه زمانی شغل را انتخاب کنید"
                        class="form-select form-select-solid form-select-lg fw-bold select2-hidden-accessible"
                        aria-label="Select a Role" data-control="select2">
                        <option value="{{ $job_description->periods }}">{{ $job_description->periods }}</option>
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
                    <select name="ability_level" aria-placeholder="سطح توانمندی را انتخاب کنید"
                        data-placeholder="سطح توانمندی را انتخاب کنید"
                        class="form-select form-select-solid form-select-lg fw-bold select2-hidden-accessible"
                        aria-label="Select a ability_level" data-control="select2">
                        <option value="{{ $job_description->ability_level }}">{{ $job_description->ability_level }}
                        </option>
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
                    <select name="effect_of_hazards" aria-placeholder="اثر مخاطرات شغل را انتخاب کنید"
                        data-placeholder="اثر مخاطرات شغل را انتخاب کنید"
                        class="form-select form-select-solid form-select-lg fw-bold select2-hidden-accessible"
                        aria-label="Select a effect_of_hazards" data-control="select2">
                        <option value="{{ $job_description->effect_of_hazards }}">
                            {{ $job_description->effect_of_hazards }}</option>
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
                    <select name="risks" aria-placeholder="مخاطرات شغل را انتخاب کنید"
                        data-placeholder="مخاطرات شغل را انتخاب کنید"
                        class="form-select form-select-solid form-select-lg fw-bold select2-hidden-accessible"
                        aria-label="Select a risks" data-control="select2">
                        <option value="{{ $job_description->risks }}">{{ $job_description->risks }}</option>
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
                        <option value="{{ $job_description->skill_level }}">{{ $job_description->skill_level }}</option>
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
                    <select data-control="select2" name="skill_level_title"
                        aria-placeholder="نوع مهارت خود را در این شغل انتخاب کنید"
                        class="form-select form-select-solid form-select-lg fw-bold select2-hidden-accessible">
                        <option value="{{ $job_description->skill_level_title }}">
                            {{ $job_description->skill_level_title }}</option>
                        <option value="بررسی اسناد">بررسی اسناد</option>
                        <option value="همکاران سیستم">همکاران سیستم</option>
                        <option value="بایگانی اسناد">بایگانی اسناد</option>
                        <option value="صدور اسناد حسابداری">صدور اسناد حسابداری</option>
                    </select>
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
@endsection
