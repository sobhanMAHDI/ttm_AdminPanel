<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Job_Description;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::orderByDesc('id')->paginate(5);
        return view("admin.jobs.index", compact("jobs"));
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $jobs = Job::where(function ($query) use ($search) {
            $query->where('job_title', 'like', '%' . $search . '%')
                ->orWhere('organization_unit', 'like', '%' . $search . '%')
                ->orWhere('sub_organization', 'like', '%' . $search . '%');
        })->paginate(5);

        return view('admin.jobs.index', compact('jobs'));
    }

    public function create()
    {
        return view("admin.jobs.create");
    }

    public function store(Request $request)
{
    $request->validate([
        "job_title" => "required|max:255",
        "organization_unit" => "required|max:255",
        "sub_organization" => "required|max:255",
        "date_fixed" => "required",
        "direct_manager" => "required|max:255",
        "description" => "nullable",
    ]);

    // ایجاد شیء جدید از مدل Job
    $job = new Job();
    $job->job_title = $request->job_title;
    $job->organization_unit = $request->organization_unit;
    $job->sub_organization = $request->sub_organization;
    $job->date_fixed = $request->date_fixed;
    $job->direct_manager = $request->direct_manager;
    $job->description = $request->description;

    // محاسبه time_in_minutes
    $time_in_minutes = 0;

    switch ($request->periods) {
        case 1: // روزانه
            $time_in_minutes = round($request->time * 22, 2); // 22 روز کاری در ماه
            break;
        case 2: // هفتگی
            $time_in_minutes = round($request->time * 4, 2); // 4 هفته در ماه
            break;
        case 3: // سالیانه
            $time_in_minutes = round($request->time / 12, 2); // تبدیل به ماهیانه
            break;
        case 4: // خاص
            $time_in_minutes = round($request->time, 2);
            break;
        case 5: // ماهیانه
            $time_in_minutes = round($request->time, 2); // تبدیل ساعت به دقیقه
            break;
    }

    // محاسبه time_in_hours
    $time_in_hours = $time_in_minutes / 60;

    // ذخیره مقادیر time_in_minutes و time_in_hours در شغل
    $job->time_in_minutes = $time_in_minutes;
    $job->time_in_hours = $time_in_hours;

    // محاسبه و ذخیره مقدار time در شغل
    $jobDescriptionsCount = Job_Description::where('job_id', $job->id)->count();

    if ($jobDescriptionsCount > 0) {
        // محاسبه مجموع مقادیر ability_level
        $total_ability_level = Job_Description::where('job_id', $job->id)->sum('ability_level');

        // محاسبه میانگین
        $average_rate_value = round($total_ability_level / $jobDescriptionsCount, 2);
    } else {
        // اگر هیچ رکوردی برای شغل وجود ندارد، مقدار rate را صفر قرار دهید
        $average_rate_value = 0;
        $job->time = 0;
    }

    // تنظیم مقدار محاسبه شده در ستون rate
    $job->rate = $average_rate_value;

    // ذخیره تغییرات در دیتابیس
    if ($job->save()) {
        toastr()->success('شغل با موفقیت ثبت شد', 'success');
        return redirect()->route('admin.job.jobs', ['id' => $job->id]);
    } else {
        toastr()->error('مشکلی در ثبت شغل پیش آمده است', 'error');
        return redirect()->back()->withInput();
    }
}






    public function edit($id)
    {
        $job = Job::find($id);
        return view("admin.jobs.edit", compact("job"));
    }

    public function update(Request $request)
    {
        $request->validate([
            "job_title" => "required|max:255",
            "organization_unit" => "required|max:255",
            "sub_organization" => "required|max:255",
            "date_fixed" => "required",
            "direct_manager" => "required|max:255",
            "description" => "required|max:555",
        ]);

        $update = DB::table('jobs')->where('id', $request->input('cid'))
            ->update([
                "job_title" => $request->input("job_title"),
                "organization_unit" => $request->input("organization_unit"),
                "sub_organization" => $request->input("sub_organization"),
                "date_fixed" => $request->input("date_fixed"),
                "direct_manager" => $request->input("direct_manager"),
                "description" => $request->input("description"),
            ]);

        if ($update) {
            toastr()->success("Job Updated Successfully", "Success");
        }

        return to_route('admin.job.jobs');
    }

    public function delete($id)
    {
        $delete = DB::table('jobs')->where('id', $id)->delete();
        if ($delete) {
            toastr()->success('Job Deleted', 'success');
        }
        return redirect()->route('admin.job.jobs');
    }
}
