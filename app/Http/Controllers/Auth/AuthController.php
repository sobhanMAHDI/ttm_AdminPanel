<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;

class AuthController extends Controller
{
    public function login()
    {
        return view("admin.auth.login");
    }

    public function check(Request $request)
    {
        $request->validate([
            "email" => "required|email|exists:users,email",
            "password" => 'required'
        ]);

        $creds = $request->only("email", "password");

        if (Auth::guard('web')->attempt($creds)) {
            Toastr::success('خوش آمدید','success');
            return redirect()->route('admin.task.tasks');
        } elseif (Auth::guard('web')->attempt($creds) && auth()->user()->hasAnyRole(['Administrator', 'Manager'])) {
            Toastr::success('خوش آمدید','success');
            return redirect()->route('home');
        } else {
            Toastr::warning('ایمیل و رمز عبور شما نامعتبر است!');
            return redirect()->back();
        }
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect()->route('admin.user.login');
    }
}
