<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index(Role $role)
    {
        $roles = Role::paginate(5);
        $permissions = Permission::with('permissions');
        return view("admin.roles.index", compact("roles", "permissions"));
    }


    public function search(Request $request)
    {
        $search = $request->search;
        if (empty($search)) {
            Toastr::error('لطفاً فیلد جستجو را پر کنید');
            return redirect()->back();
        } else {
            $roles = Role::where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            })->paginate(5);
        }
        return view('admin.roles.index', compact('roles'));
    }


    public function show($id)
    {
        // بارگیری نقش با توجه به شناسه
        $role = Role::find($id);

        // اگر نقش پیدا شود، نام آن را به view ارسال می‌کنیم
        if ($role) {
            $roleName = $role->name;
        } else {
            $roleName = 'نقش مورد نظر یافت نشد';
        }

        // بارگیری کاربران با نقش‌های مختلف
        $users = User::where('role', '=', $roleName)->get();

        return view('admin.roles.show', compact('roleName', 'users'));
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $permissions = Permission::all();
        return view('admin.roles.edit', compact('permissions', 'role'));
    }


    public function update(Request $request)
    {
        $request->validate([
            "name" => "required|max:255",
        ]);

        $updateRole = Role::where('id', $request->input('cid'))->update([
            "name" => $request->input("name"),
        ]);

        if ($updateRole) {
            // بروزرسانی permissions
            $role = Role::find($request->input('cid'));
            $role->permissions()->sync($request->input('permission')); // فرضا permissions() یک رابطه از نوع many-to-many است
            toastr()->success("بروزرسانی نقش با موفقیت انجام شد", "Success");
        } else {
            toastr()->error("بروزرسانی انجام نشد", "Error");
        }

        return redirect()->route('admin.role.roles');
    }



    public function create()
    {
        $permissions = Permission::all();
        return view('admin.roles.create', compact('permissions'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255|unique:roles,name',
            'permission' => 'required|array', // اطمینان حاصل کنید که permission یک آرایه است
            'permission.*' => 'exists:permissions,id', // اطمینان حاصل کنید که هر مقدار permission وجود دارد
        ]);

        $role = new Role();
        $role->name = $request->name;
        $role->save();

        if ($role) {
            $role->permissions()->sync($request->permission); // ذخیره دسترسی‌های نقش

            toastr()->success('Role Created Successfully');
        } else {
            toastr()->error('Role Creation Failed', 'Error');
        }

        return redirect()->route('admin.role.roles');
    }




    public function delete($id)
    {
        $delete = DB::table('roles')->where('id', $id)->delete();
        if ($delete) {
            toastr()->success('Role Deleted', 'success');
        }
        return redirect()->route('admin.role.roles');
    }
}
