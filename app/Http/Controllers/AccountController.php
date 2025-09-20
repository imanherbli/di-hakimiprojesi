<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    private $users = [
        'iman.herbli@gmail.com' => '123456',
        'firstadmin@gmail.com' => 'abcdef',
    ];

    // عرض صفحة تسجيل الدخول
    public function login()
    {
        return view('account.login');
    }

    // معالجة تسجيل الدخول
    public function doLogin(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        // تحقق من وجود المستخدم وكلمة المرور
        if (isset($this->users[$email]) && $this->users[$email] === $password) {
            // نجعل المستخدم "مسجل دخول" عبر الجلسة
            session(['logged_in_user' => $email]);
            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'email' => 'البريد أو كلمة المرور غير صحيحة',
        ])->withInput();
    }

    // لوحة التحكم
    public function dashboard(Request $request)
    {
        if (!$request->session()->has('logged_in_user')) {
            return redirect()->route('login');
        }

        $user = $request->session()->get('logged_in_user');
        return view('dashboard', compact('user'));
    }

    // تسجيل الخروج
    public function logout(Request $request)
    {
        $request->session()->forget('logged_in_user');
        return redirect()->route('login');
    }
}
