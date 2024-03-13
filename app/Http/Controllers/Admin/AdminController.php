<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::orderByDesc('id')->paginate(5);
        return view("admin.home", compact('users'));
    }

    public function search(Request $request)
    {
        $search = $request->search;
        if (empty($search)) {
            Toastr::error('لطفاً فیلد جستجو را پر کنید');
            return redirect()->back();
        } else {
            $users = User::where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%')
                    ->orWhere('role', 'like', '%' . $search . '%');
            })->paginate(5);
        }
        return view('admin.users.index', compact('users'));
    }

    public function edit($id)
    {
        $roles = Role::all();
        $rows = DB::table('users')->where('id', $id)->first();
        $users = User::all();
        $data = [
            'info' => $rows
        ];
        // dd($rows->name);
        return view('admin.users.edit', $data, compact('users', 'roles'));
    }

    public function update(Request $request)
    {
        $request->validate([
            "name" => "required|max:255",
            "email" => "required|email",
            "password" => "required|min:5|max:20",
            "role" => "required",
        ]);

        $update = DB::table('users')->where('id', $request->input('cid'))
            ->update([
                "name" => $request->input("name"),
                "email" => $request->input("email"),
                "password" => $request->input("password"),
                "role" => $request->input("role"),
            ]);

        if ($update) {
            toastr()->success("User Updated Successfully", "Success");
        }
        return to_route('admin.user.users');
    }

    public function delete($id)
    {
        $delete = DB::table('users')->where('id', $id)->delete();
        if ($delete) {
            toastr()->success('User Deleted', 'success');
        }
        return redirect()->route('admin.user.users');
    }
}
