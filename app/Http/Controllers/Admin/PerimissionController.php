<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PerimissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::paginate(5);
        $roles = Role::with('roles');
        return view("admin.permissions.index", compact("permissions", "roles"));
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $permissions = Permission::where(function ($query) use ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        })->paginate(5);

        return view('admin.permissions.index', compact('permissions'));
    }
    public function create()
    {
        $roles = Role::all();
        return view("admin.permissions.create", compact("roles"));
    }

    public function edit($id)
    {
        $permissions = Permission::findOrFail($id);
        $roles = Role::all();
        return view('admin.permissions.edit', compact('permissions', 'roles'));
    }













    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        $permission = Permission::findOrFail($request->input('cid'));

        $updatePermission = $permission->update([
            "name" => $request->input("name"),
        ]);

        if ($updatePermission) {
            $permission->roles()->sync($request->input('user_role'));
            toastr()->success("بروزرسانی دسترسی با موفقیت انجام شد", "Success");
        } else {
            toastr()->error("بروزرسانی انجام نشد", "Error");
        }

        return redirect()->route('admin.permission.permissions');
    }







    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|max:255",
            "user_role" => 'required'
        ]);

        $new_permission = new Permission;
        $new_permission->name = $request->name;
        $new_permission->save();

        if ($new_permission) {
            if ($request->has('user_role')) {
                foreach ($request->user_role as $role_id) {
                    $role = Role::find($role_id);
                    if ($role) {
                        $new_permission->assignRole($role);
                    }
                }
            }
            toastr()->success("Permission Created Successfully");
        } else {
            toastr()->error("Permission Creation Failed", "Error");
        }
        return redirect()->route("admin.permission.permissions");
    }

    public function delete($id)
    {
        $delete = DB::table('permissions')->where('id', $id)->delete();
        if ($delete) {
            toastr()->success('Permission Deleted', 'success');
        }
        return redirect()->route('admin.permission.permissions');
    }
}
