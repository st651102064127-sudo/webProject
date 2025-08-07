<?php
namespace App\Http\Controllers;

use App\Models\Login_Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use App\Models\Employee_Model;
use App\Models\Account;

class Register_Controller extends Controller
{
    public function showForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {

$request->validate([
    'username' => 'required|string|max:255|unique:users,fullname',
    'email' => 'required|email|unique:users,email',
    'password' => [
        'required',
        'min:8',
        'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/',
        'confirmed' // ต้องมี password_confirmation
    ],
    'password_confirmation' => 'required|same:password',
], [
    'username.required' => 'กรุณากรอกชื่อผู้ใช้',
    'username.unique' => 'ชื่อผู้ใช้นี้มีอยู่ในระบบแล้ว',
    'email.required' => 'กรุณากรอกอีเมล',
    'email.email' => 'รูปแบบอีเมลไม่ถูกต้อง',
    'email.unique' => 'อีเมลนี้มีอยู่ในระบบแล้ว',
    'password.required' => 'กรุณากรอกรหัสผ่าน',
    'password.min' => 'รหัสผ่านต้องมีอย่างน้อย 8 ตัวอักษร',
    'password.regex' => 'รหัสผ่านต้องมีตัวพิมพ์ใหญ่ ตัวพิมพ์เล็ก และตัวเลข',
    'password_confirmation.required' => 'กรุณายืนยันรหัสผ่าน',
    'password_confirmation.same' => 'รหัสผ่านไม่ตรงกัน',
]);

        // สร้าง UUID
        $uuid = Str::uuid()->toString();

        // สร้างใน users table
        Employee_Model::create([
            'uuid' => $uuid,
            'fullname' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'status' => 'active',
        ]);

        // สร้างใน account table
        Login_Model::create([
            'email_account' => $request->email,
            'password_account' => Hash::make($request->password),
            'login_count_account' => 0,
            'lock_account' => false,
        ]);


        return redirect()->route('home')->with('success', 'สมัครสมาชิกสำเร็จ');
    }
}
