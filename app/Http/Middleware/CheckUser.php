<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckUser
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        // المستخدمين الثابتين
        $allowedUsers = [
            'admin1@example.com',
            'admin2@example.com',
        ];

        // تحقق من الجلسة
        $user = Session::get('user_email');

        if (!$user || !in_array($user, $allowedUsers)) {
            return redirect('/login'); // إذا مش موجود أو غير مصرح
        }

        return $next($request);
    }
}
