<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Job_Description;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JobDescriptionController extends Controller
{
    public function index(Request $request, $id)
    {
        $jobs = Job::all();
        $datas = Job_Description::orderBy("id", "desc")->get();
        $selectedJobId = $request->input('job_id');

        // اگر $selectedJobId تنظیم شده است، ما عنوان شغل مرتبط با آن را دریافت می‌کنیم
        $selectedJobTitle = Job::find($id);
        // / مقدار rate مربوط به شغل مورد نظر را بیابید


        $selectedJob = Job::find($id);
        $rate = $selectedJob->rate;
        $years_of_experience = '';
        $education_level = '';

        switch ($rate) {
            case 1:
                $years_of_experience = 'بدون تجربه';
                $education_level = 'کاردانی';
                break;
            case 1.1:
                $years_of_experience = '1 سال';
                $education_level = 'دیپلم';
                break;
            case 1.2:
                $years_of_experience = '2 سال';
                $education_level = 'دیپلم';
                break;
            case 1.3:
                $years_of_experience = '3 سال';
                $education_level = 'دیپلم';
                break;
            case 1.4:
                $years_of_experience = '4 سال<br>';
                $education_level = ' دیپلم<br>';

                $years_of_experience .= 'بدون تجربه <br>';
                $education_level .= 'کاردانی<br>';
                break;








            case 1.5:
                $years_of_experience = '5 سال<br>';
                $education_level = ' دیپلم<br>';

                $years_of_experience .= '1 سال <br>';
                $education_level .= 'کاردانی<br>';
                break;



            case 1.6:
                $years_of_experience = '6 سال<br>';
                $education_level = ' دیپلم<br>';

                $years_of_experience .= '2 سال <br>';
                $education_level .= 'کاردانی<br>';
                break;



            case 1.7:
                $years_of_experience = '7 سال<br>';
                $education_level = ' دیپلم<br>';

                $years_of_experience .= '2 سال <br>';
                $education_level .= 'کاردانی<br>';
                break;


            case 1.8:
                $years_of_experience = '8 سال<br>';
                $education_level = ' دیپلم<br>';

                $years_of_experience .= '4 سال <br>';
                $education_level .= 'کاردانی<br>';


                $years_of_experience .= 'بدون تجربه <br>';
                $education_level .= 'کارشناسی<br>';
                break;


            case 1.9:
                $years_of_experience = '9 سال<br>';
                $education_level = ' دیپلم<br>';

                $years_of_experience .= '5 سال <br>';
                $education_level .= 'کاردانی<br>';

                $years_of_experience .= '1 سال <br>';
                $education_level .= 'کارشناسی<br>';
                break;


            case 2:
                $years_of_experience = '10  سال<br>';
                $education_level = 'دیپلم<br>';

                $years_of_experience .= '6 سال<br>';
                $education_level .= 'کاردانی<br>';

                $years_of_experience .= '2 سال';
                $education_level .= 'کارشناسی';
                break;




            case 2.1:
                $years_of_experience = '11  سال<br>';
                $education_level = 'دیپلم<br>';

                $years_of_experience .= '7 سال<br>';
                $education_level .= 'کاردانی<br>';

                $years_of_experience .= '3 سال';
                $education_level .= 'کارشناسی';
                break;



            case 2.2:
                $years_of_experience = '12  سال<br>';
                $education_level = 'دیپلم<br>';

                $years_of_experience .= '8 سال<br>';
                $education_level .= 'کاردانی<br>';

                $years_of_experience .= '4 سال<br>';
                $education_level .= 'کارشناسی<br>';

                $years_of_experience .= 'بدون تجربه <br>';
                $education_level .= ' کارشناسی ارشد';
                break;



            case 2.3:
                $years_of_experience = '13  سال<br>';
                $education_level = 'دیپلم<br>';

                $years_of_experience .= '9 سال<br>';
                $education_level .= 'کاردانی<br>';

                $years_of_experience .= '5 سال<br>';
                $education_level .= 'کارشناسی<br>';

                $years_of_experience .= '1 سال<br>';
                $education_level .= ' کارشناسی ارشد';
                break;




            case 2.4:
                $years_of_experience = '14  سال<br>';
                $education_level = 'دیپلم<br>';

                $years_of_experience .= '10 سال<br>';
                $education_level .= 'کاردانی<br>';

                $years_of_experience .= '6 سال<br>';
                $education_level .= 'کارشناسی<br>';

                $years_of_experience .= '2 سال<br>';
                $education_level .= ' کارشناسی ارشد';
                break;



            case 2.5:
                $years_of_experience = '15  سال<br>';
                $education_level = 'دیپلم<br>';

                $years_of_experience .= '11 سال<br>';
                $education_level .= 'کاردانی<br>';

                $years_of_experience .= '7 سال<br>';
                $education_level .= 'کارشناسی<br>';

                $years_of_experience .= '3 سال<br>';
                $education_level .= ' کارشناسی ارشد';
                break;



            case 2.6:
                $years_of_experience = '16  سال<br>';
                $education_level = 'دیپلم<br>';

                $years_of_experience .= '12 سال<br>';
                $education_level .= 'کاردانی<br>';

                $years_of_experience .= '8 سال<br>';
                $education_level .= 'کارشناسی<br>';

                $years_of_experience .= '4 سال<br>';
                $education_level .= ' کارشناسی ارشد  <br>';

                $years_of_experience .= 'بدون تجربه <br>';
                $education_level .= 'دکترا';
                break;



            case 2.7:
                $years_of_experience = '17  سال<br>';
                $education_level = 'دیپلم<br>';

                $years_of_experience .= '13 سال<br>';
                $education_level .= 'کاردانی<br>';

                $years_of_experience .= '9 سال<br>';
                $education_level .= 'کارشناسی<br>';

                $years_of_experience .= '5 سال<br>';
                $education_level .= ' کارشناسی ارشد  <br>';

                $years_of_experience .= '1 سال <br>';
                $education_level .= 'دکترا';
                break;



            case 2.8:
                $years_of_experience = '18  سال<br>';
                $education_level = 'دیپلم<br>';

                $years_of_experience .= '14 سال<br>';
                $education_level .= 'کاردانی<br>';

                $years_of_experience .= '10 سال<br>';
                $education_level .= 'کارشناسی<br>';

                $years_of_experience .= '6 سال<br>';
                $education_level .= ' کارشناسی ارشد  <br>';

                $years_of_experience .= '2 سال <br>';
                $education_level .= 'دکترا';
                break;



            case 2.9:
                $years_of_experience = '19  سال<br>';
                $education_level = 'دیپلم<br>';

                $years_of_experience .= '15 سال<br>';
                $education_level .= 'کاردانی<br>';

                $years_of_experience .= '11 سال<br>';
                $education_level .= 'کارشناسی<br>';

                $years_of_experience .= '7 سال<br>';
                $education_level .= ' کارشناسی ارشد  <br>';

                $years_of_experience .= '3 سال <br>';
                $education_level .= 'دکترا';
                break;



            case 3:
                $years_of_experience = '20  سال<br>';
                $education_level = 'دیپلم<br>';

                $years_of_experience .= '16 سال<br>';
                $education_level .= 'کاردانی<br>';

                $years_of_experience .= '12 سال<br>';
                $education_level .= 'کارشناسی<br>';

                $years_of_experience .= '8 سال<br>';
                $education_level .= ' کارشناسی ارشد  <br>';

                $years_of_experience .= '4 سال <br>';
                $education_level .= 'دکترا';
                break;

            default:

                break;
        }
        return view("admin.jobs.job_description", compact("jobs", 'datas', 'selectedJobTitle', 'years_of_experience', 'education_level'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'job_id' => 'required',
            'priority' => 'required',
            'periods' => 'required',
            'ability_level' => 'required',
            'risks' => 'required',
            'effect_of_hazards' => 'required',
            'skill_level' => 'required',
            'level_type' => 'nullable',
            'time' => 'required',
        ]);

        // Create a new job description
        $new_JobDescription = new Job_Description();
        $new_JobDescription->job_id = $request->job_id;
        $new_JobDescription->priority = $request->priority;
        $new_JobDescription->periods = $request->periods;
        $new_JobDescription->ability_level = $request->ability_level;
        $new_JobDescription->risks = $request->risks;
        $new_JobDescription->effect_of_hazards = $request->effect_of_hazards;
        $new_JobDescription->skill_level = $request->skill_level;
        $new_JobDescription->level_type = $request->level_type;
        $new_JobDescription->time = $request->time;

        // Calculate the time based on the selected period
        $time = $request->time;
        switch ($request->periods) {
            case 1: // Daily
                $time = round($request->time * 22, 2); // 22 working days in a month
                break;
            case 2: // Weekly
                $time = round($request->time * 4, 2); // 4 weeks in a month
                break;
            case 3: // Yearly
                $time = round($request->time / 12, 2); // convert yearly to monthly
                break;
            case 4: // Specific
                $time = round($request->time, 2);
                break;
            case 5: // Monthly
                $time = round($request->time, 2); // Convert hours to minutes
                break;
        }

        // Find the existing job
        $job = Job::find($request->job_id);
        if ($job) {
            // Add the new time to the existing time
            $job->time_in_minutes += $time;

            // Calculate hours from minutes
            $time_in_hours = round($job->time_in_minutes / 60, 2);

            // Update the time_in_hours column in the Job model
            $job->time_in_hours = $time_in_hours;

            // Save the updated job
            $job->save();
        }

        // Save the new job description
        if ($new_JobDescription->save()) {
            // Calculate the product of ability_level for all job descriptions for this job
            $total_ability_level_product = Job_Description::where('job_id', $request->job_id)->sum('ability_level');

            // Count the number of existing job descriptions for this job
            $job_descriptions_count = Job_Description::where('job_id', $request->job_id)->count();

            // Calculate the average values
            if ($job_descriptions_count > 0) {
                $rate = round($total_ability_level_product / $job_descriptions_count, 2);
            } else {
                $rate = 0;
            }

            // Find the job corresponding to the given job_id
            $job = Job::find($request->job_id);

            // Update the group values in the corresponding Job
            if ($job) {
                // Set the calculated values as the group values for the job
                $job->rate = $rate;

                // Save the updated job
                $job->save();
            }

            // Notify the user about the successful job description creation
            toastr()->success('شرحیات شغل با موفقیت ثبت شد', 'success');
            return redirect()->route('admin.job.description.index', ['id' => $request->job_id]);
        } else {
            // Notify the user about the error in saving the job description
            toastr()->error('مشکلی در ثبت شرحیات شغل پیش آمده است', 'error');
            return redirect()->back();
        }
    }



    public function edit($id)
    {
        $job_description = Job_Description::find($id);
        return view('admin.jobs.edit-jobDescripton', compact('job_description'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'job_id' => 'required',
            'priority' => 'required',
            'periods' => 'required',
            'ability_level' => 'required',
            'risks' => 'required',
            'effect_of_hazards' => 'required',
            'skill_level' => 'required',
            'level_type' => 'nullable',
        ]);


        $update = DB::table('job__descriptions')->where('id', $request->input('cid'))
            ->update([
                "job_id" => $request->input("job_id"),
                "priority" => $request->input("priority"),
                "periods" => $request->input("periods"),
                "ability_level" => $request->input("ability_level"),
                "risks" => $request->input("risks"),
                "effect_of_hazards" => $request->input("effect_of_hazards"),
                "skill_level" => $request->input("skill_level"),
                "level_type" => $request->input("level_type"),
            ]);

        if ($update) {
            toastr()->success("Job Description Updated Successfully", "Success");
        }

        return redirect()->route('admin.job.jobs');
    }

    public function delete($id)
    {
        $deletedJobDescription = Job_Description::find($id);

        if ($deletedJobDescription) {
            $delete = $deletedJobDescription->delete();
            if ($delete) {
                toastr()->success('Deleted', 'success');
                $job_id = $deletedJobDescription->job_id;
                return redirect()->route('admin.job.description.index', ['id' => $job_id]);
            }
        }
    }
}
