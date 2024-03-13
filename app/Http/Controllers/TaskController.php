<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::orderByDesc("id")->paginate(5);
        return view("admin.tasks.index", compact('tasks'));
    }

    public function task_description()
    {
        return view("admin.tasks.task_description");
    }

    public function create()
    {
        $jobs = Job::all();
        $latestTasks = Task::orderBy('created_at', 'desc')->get();
        return view('admin.tasks.create', compact('jobs', 'latestTasks'));
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $tasks = Task::where(function($query) use($search){
            $query->where('task_title','like','%'.$search.'%');
        })->paginate(5);

        return view('admin.tasks.index', compact('tasks'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'job_id' => 'required|exists:jobs,id',
            'task_title' => 'required',
            'task_description' => 'nullable|string',
            'parent_id' => 'nullable|exists:tasks,id',
        ]);

        $new_task = new Task();
        $new_task->job_id = $request->job_id;
        $new_task->task_title = $request->task_title;
        $new_task->parent_id = $request->parent_id;
        $new_task->task_description = $request->task_description;
        $new_task->save();

        if($new_task){
            toastr()->success('وظیفه جدید با موفقیت ثبت شد','Success');
        }

        return redirect()->route('admin.task.tasks');
    }

    public function edit($id)
    {
        $task = Task::find($id);
        $jobs = Job::pluck('job_title', 'id');
        $parents = Task::pluck('task_title');
        return view('admin.tasks.edit', compact('task','jobs','parents'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'job_id' => 'required',
            "task_title" => "required",
            'task_description' => 'required',
            'parent_id' => 'nullable|exists:tasks,id',
        ]);

        $taskId = $request->input('cid');

    // بروزرسانی رکورد موجود
    Task::where('id', $taskId)->update([
        'job_id' => $request->job_id,
        'task_title' => $request->task_title,
        'parent_id' => $request->parent_id,
        'task_description' => $request->task_description,
    ]);

        return to_route('admin.task.tasks');
    }

    public function delete($id)
    {
        $delete = DB::table('tasks')->where('id', $id)->delete();
        if ($delete) {
            toastr()->success('Task Deleted', 'success');
        }
        return redirect()->route('admin.task.tasks');
    }
}
