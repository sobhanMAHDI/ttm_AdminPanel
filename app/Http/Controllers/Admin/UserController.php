<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderByDesc('id')->paginate(5);
        $roles = Role::all();
        return view("admin.users.index", compact("users", "roles"));
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


    public function create()
    {
        $roles = Role::all();
        return view("admin.users.create", compact("roles"));
    }

    public function store(Request $request)
    {
        $request->validate([
            "name" => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:5|max:20',
            'role' => 'required'
        ], [
            'email.required' => "ایمیل الزامیست"
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $user->save();


        if ($user) {
            $user->assignRole(Role::findById($request->role));
            toastr()->success('کاربر جدید با موفقیت ثبت شد', 'Success');
            return to_route('admin.user.users');

        } else {
            return to_route("admin.user.create");
        }
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

    public function send_password(Request $request)
    {
        $request->validate([
            'email' => 'required|exists:users,email'
        ], [
            'email.exists' => 'ایمیل وارد شده نامعتبر است'
        ]);


        $token = Str::random(64);

        DB::table('password_reset_tokens')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now(),
        ]);

        $user = User::where('email', $request->email)->first();

        $data = array(
            'email' => $user->email,
            'name' => $user->name,
            'token' => $token,
            'created_at' => Carbon::now(),
        );

        $send_email = Mail::send('admin.users.email.forgot-pass',  $data, function ($message) use ($request, $data) {
            $message->to($request->email, $data['name'])
                ->subject('Reset Password');
        });

        if ($send_email) {
            toastr()->success('We sent an email for your password reset.', 'Success');
            return redirect()->route('admin.user.forgot_password');
        }
    }

    public function reset_password($id)
    {
        $users = User::find($id);
        return view('admin.users.email.reset', compact('users'));
    }

    public function reset_new_password(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'new_password' => 'required|min:5|max:20',
            'confirm_password' => 'required|same:new_password',
        ], [
            'email.exists' => 'ایمیل وارد شده نامعتبر است',
        ]);

        $check_token = DB::table('password_reset_tokens')->where('email', $request->email, 'token', $request->token)->first();

        if (!$check_token) {
            toastr()->error('Invalid token', 'Error');
        } else {
            User::where('email', $request->email)->update([
                'password' => Hash::make($request->new_password),
            ]);
            DB::table('password_reset_tokens')->where('email', $request->email)->delete();
            $new_token = Str::random(64);
            if ($new_token) {
                toastr()->success('رمز عبور شما با موفقیت تغییر کرد', 'success');
                return redirect()->route('admin.user.login');
            }
        }
    }
}
