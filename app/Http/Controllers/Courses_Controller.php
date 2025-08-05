<?php

namespace App\Http\Controllers;
use App\Models\Courses_Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class Courses_Controller extends Controller
{
    public function index()
    {
        $data = Courses_Model::all();

        return view('Admin/Coures')->with('data', $data);
    }


    public function Store(Request $req)
    {

        $validator = Validator::make($req->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'file' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'title.required' => 'กรุณากรอกชื่อคอร์ส',
            'title.max' => 'ชื่อคอร์สต้องไม่เกิน 255 ตัวอักษร',
            'description.required' => 'กรุณากรอกรายละเอียดคอร์ส',
            'price.required' => 'กรุณากรอกราคา',
            'price.numeric' => 'ราคาต้องเป็นตัวเลข',
            'price.min' => 'ราคาต้องไม่น้อยกว่า 0',
            'file.image' => 'ไฟล์ต้องเป็นรูปภาพ',
            'file.mimes' => 'อนุญาตเฉพาะไฟล์: jpeg, png, jpg, gif',
            'file.max' => 'ไฟล์ภาพต้องมีขนาดไม่เกิน 2MB',
        ]);

        $path = null;
        $validator->validate();
        if ($req->hasFile('file')) {
            $file = $req->file('file');
            $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/Coures/'), $filename);
            $path = 'uploads/Coures/' . $filename;
        }

        Courses_Model::create([
            'uuid' => (string) Str::uuid(),
            'title' => $req->title,
            'description' => $req->description,
            'price' => $req->price,
            'image' => $path,

        ]);

        return redirect()->route('Courses.Index')->with('success', 'เพิ่มข้อมูลสำเร็จ');



    }
    public function update(Request $req, $id)
    {
        $validator = Validator::make($req->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'file' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $validator->validate();

        $course = Courses_Model::findOrFail($id);

        $course->title = $req->title;
        $course->description = $req->description;
        $course->price = $req->price;

        if ($req->hasFile('file')) {
            if ($course->image && file_exists(public_path($course->image))) {
                unlink(public_path($course->image));
            }
            $file = $req->file('file');
            $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/Courses/'), $filename);
            $course->image = 'uploads/Courses/' . $filename;
        }

        $course->save();

        return redirect()->route('Courses.Index')->with('success', 'แก้ไขข้อมูลสำเร็จ');
    }

    public function destroy($id)
    {
        $course = Courses_Model::findOrFail($id);
        if ($course->image && file_exists(public_path($course->image))) {
            unlink(public_path($course->image));
        }
        $course->delete();
        return response()->json(['success' => true]);
    }
}
