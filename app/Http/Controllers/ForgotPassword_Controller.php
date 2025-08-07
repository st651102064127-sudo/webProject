<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class ForgotPassword_Controller extends Controller
{
    public function showForm()
    {
        return view('User.Forgot_password');
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'email_account' => 'required|email',
            'new_password' => 'required|min:8',
            'confirm_password' => 'required|same:new_password',
        ], [
            'email_account.required' => 'กรุณากรอกอีเมล',
            'email_account.email' => 'รูปแบบอีเมลไม่ถูกต้อง',
            'new_password.required' => 'กรุณากรอกรหัสผ่านใหม่',
            'new_password.min' => 'รหัสผ่านต้องมีอย่างน้อย 8 ตัวอักษร',
            'confirm_password.required' => 'กรุณายืนยันรหัสผ่าน',
            'confirm_password.same' => 'รหัสผ่านกับยืนยันรหัสผ่านไม่ตรงกัน',
        ]);

        $user = DB::table('users')->where('email', $request->email_account)->first();

        if (!$user) {
            return back()->with('error', 'ไม่พบอีเมลในระบบ');
        }

        DB::table('users')->where('email', $request->email_account)->update([
            'password' => Hash::make($request->new_password),
            'updated_at' => now()
        ]);

        return back()->with('success', 'เปลี่ยนรหัสผ่านเรียบร้อยแล้ว');
    }
}
