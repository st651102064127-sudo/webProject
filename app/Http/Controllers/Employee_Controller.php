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



        ], [
            'fullname.required' => 'กรุณากรอกชื่อ',
            'fullname.unique' => 'ชื่อ-นามสกุลนี้ถูกใช้งานแล้ว',
            'email.required' => 'กรุณากรอกอีเมล',
            'email.email' => 'รูปแบบอีเมลไม่ถูกต้อง',
            'password.required' => 'กรุณากรอกรหัสผ่าน',
            'password.min' => 'รหัสผ่านต้องมีอย่างน้อย 6 ตัวอักษร',
            'status.required' => 'กรุณาเลือกสถานะ',

        ]);
        Employee_Model::create([
            'uuid' => (string) Str::uuid(),
            'fullname' => $request->fullname,
            'email' => $request->email,
            'password' => bcrypt(value: $request->password),
            'status' => $request->status,


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
        ], [
            'fullname.required' => 'กรุณากรอกชื่อ',
            'fullname.unique' => 'ชื่อ-นามสกุลนี้ถูกใช้งานแล้ว',
            'email.required' => 'กรุณากรอกอีเมล',
            'email.email' => 'รูปแบบอีเมลไม่ถูกต้อง',
            'status.required' => 'กรุณาเลือกสถานะ',

        ]);

        $user->fullname = $request->fullname;
        $user->email = $request->email;
        $user->status = $request->status;

        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return redirect()->route('Employee.Index')->with('success', 'แก้ไขข้อมูลสำเร็จ');
    }
    public function destroy($uuid)
{
    $user = Employee_Model::where('uuid', $uuid)->firstOrFail();
    $user->delete();
    return redirect()->route('Employee.Index')->with('success', 'ลบข้อมูลสำเร็จ');
}
}
