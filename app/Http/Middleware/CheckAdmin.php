<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (session()->get('user_status') !== 'admin') {
            //dd('คุณไม่มีสิทธิ์เข้าใช้งานส่วนนี้');
            return redirect()->route('User.Login')->with('error', 'คุณไม่มีสิทธิ์เข้าใช้งานส่วนนี้');
        }
        return $next($request);
    }
}
