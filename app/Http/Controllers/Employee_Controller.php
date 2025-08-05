<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee_Model;
use Illuminate\Support\Str;
class Employee_Controller extends Controller
{
    public function index()
    {
        $users = Employee_Model::all();
        return view('Admin/Employee')->with('users', $users);
    }
    public function store(Request $request)
    {

        $request->validate([
            'fullname' => 'required|unique:users,fullname',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'status' => 'required',
            'username' => 'required|unique:users,username',
            'tel' => 'required|min:10|max:10',

        ], [
            'fullname.required' => 'กรุณากรอกชื่อ',
            'fullname.unique' => 'ชื่อ-นามสกุลนี้ถูกใช้งานแล้ว',
            'email.required' => 'กรุณากรอกอีเมล',
            'email.email' => 'รูปแบบอีเมลไม่ถูกต้อง',
            'password.required' => 'กรุณากรอกรหัสผ่าน',
            'password.min' => 'รหัสผ่านต้องมีอย่างน้อย 6 ตัวอักษร',
            'status.required' => 'กรุณาเลือกสถานะ',
            'username.min' => 'ชื่อผู้ใช้ต้องมีอย่างน้อย 6 ตัวอักษร',
            'username.unique' => 'ชื่อผู้ใช้นี้ถูกใช้งานแล้ว',
        ]);
        Employee_Model::create([
            'uuid' => (string) Str::uuid(),
            'fullname' => $request->fullname,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'status' => $request->status,
            'username' => $request->username,
            'tel' => $request->tel,
        ]);
        return redirect()->route('Employee.Index')->with('success', 'เพิ่มสมาชิกสำเร็จ');
    }
    public function update(Request $request, $id)
    {

        $user = Employee_Model::findOrFail($id);
        $request->validate([
            'fullname' => 'required|unique:users,fullname,' . $id . ',uuid',
            'email' => 'required|email|unique:users,email,' . $id . ',uuid',
            'status' => 'required',
            'username' => 'required|unique:users,username,' . $id . ',uuid',
            'tel' => 'required|min:10|max:10',
        ], [
            'fullname.required' => 'กรุณากรอกชื่อ',
            'fullname.unique' => 'ชื่อ-นามสกุลนี้ถูกใช้งานแล้ว',
            'email.required' => 'กรุณากรอกอีเมล',
            'email.email' => 'รูปแบบอีเมลไม่ถูกต้อง',
            'status.required' => 'กรุณาเลือกสถานะ',
            'username.unique' => 'ชื่อผู้ใช้นี้ถูกใช้งานแล้ว',
            'tel.required' => 'กรุณากรอกเบอร์โทรศัพท์',
            'tel.min' => 'เบอร์โทรศัพท์ต้องมี 10 หลัก',
            'tel.max' => 'เบอร์โทรศัพท์ต้องมี 10 หลัก',
        ]);

        $user->fullname = $request->fullname;
        $user->email = $request->email;
        $user->status = $request->status;
        $user->username = $request->username;
        $user->tel = $request->tel;

        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return redirect()->route('Employee.Index')->with('success', 'แก้ไขข้อมูลสำเร็จ');
    }
}
