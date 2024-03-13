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
            "description" => "required|max:555",
        ]);

        $job = new Job();
        $job->job_title = $request->job_title;
        $job->organization_unit = $request->organization_unit;
        $job->sub_organization = $request->sub_organization;
        $job->date_fixed = $request->date_fixed;
        $job->direct_manager = $request->direct_manager;
        $job->description = $request->description;

        $timeData = Job_Description::first();

        if ($timeData) {
            $timeValue = $timeData->time_in_minutes;
            if ($request->periods == '1') { // day
                $timeValue *= 22;
            } elseif ($request->periods == '3') { // Yearly
                $timeValue /= 12;
            } elseif ($request->periods == '2') { // week
                $timeValue *= 4;
            }

            // Convert minutes to hours and round to 2 decimal places
            $timeInHours = round($timeValue / 60, 2);

            // Set time in job model
            $job->time_in_minutes = $timeValue;
            $job->time_in_hours = $timeInHours;
        } else {
            // Set default value or null if no data found
            $job->time_in_minutes = 0; // or any other default value
            $job->time_in_hours = 0; // or any other default value
        }

        $job->save();

        // Calculate total time for all jobs in hours
        $totalTimeInHours = Job::sum('time_in_hours');

        // Update 'time' column in 'jobs' table
        $jobsTime = Job::first(); // Choose any job row to update its 'time' column
        if ($jobsTime) {
            $jobsTime->time = $totalTimeInHours;
            $jobsTime->save(); // Save the changes to the database
        }

        // Now, iterate over all jobs and update the average time per task
        $jobs = Job::all();
        foreach ($jobs as $job) {
            $totalTasksForJob = Task::where('job_id', $job->id)->count();
            if ($totalTasksForJob > 0) {
                $averageTimePerTask = $totalTimeInHours / $totalTasksForJob;
                // Update 'time' column in 'tasks' table
                Task::where('job_id', $job->id)->update(['time' => $averageTimePerTask]);
            }
        }

        if ($job) {
            toastr()->success('Job added successfully');
        }

        return redirect()->route('admin.job.jobs');
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
            "description" => "max:555"
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
