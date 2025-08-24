<?php

namespace App\Http\Controllers;

use App\Models\Courses_Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use App\Models\Syllabus;
use App\Models\CourseFeature;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
class Courses_Controller extends Controller
{
    private $uploadPath = 'uploads/Courses/';

    public function index()
    {
        // ดึงข้อมูลคอร์สทั้งหมดจากฐานข้อมูล
        $courses = Courses_Model::all();

        // ส่งข้อมูลไปยัง View
        return view('Admin.Coures', compact('courses'));
    }
    public function store(Request $req)
    {
        // Validation
        $validator = Validator::make($req->all(), [
            'title' => 'required|string|max:255',
            'category' => 'nullable|string|max:255',
            'instructor' => 'required|string|max:255',
            'level' => 'nullable|string|max:255',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
            'syllabuses.*.title' => 'required|string',
            'syllabuses.*.duration' => 'nullable|string',
            'features.*.feature_name' => 'required|string',
            'features.*.feature_value' => 'required|string',
        ], [
            'title.required' => 'กรุณากรอกชื่อคอร์ส',
            'instructor.required' => 'กรุณากรอกชื่อผู้สอน',
            'price.required' => 'กรุณากรอกราคา',
            'syllabuses.*.title.required' => 'กรุณากรอกชื่อบทเรียน',
            'features.*.feature_name.required' => 'กรุณากรอกชื่อคุณสมบัติ',
            'features.*.feature_value.required' => 'กรุณากรอกรายละเอียดคุณสมบัติ',
        ]);

        $validator->validate();

        DB::transaction(function () use ($req) {

            // อัปโหลดรูป
            $image_url = null;
            if ($req->hasFile('image')) {
                $file = $req->file('image');
                $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
                $path = 'uploads/courses/' . $filename;
                $file->move(public_path('uploads/courses'), $filename);
                $image_url = $path;
            }

            // รวมระยะเวลาทั้งหมดของ Syllabuses
            $totalHours = 0;
            if ($req->has('syllabuses')) {
                foreach ($req->syllabuses as $syll) {
                    if (!empty($syll['duration'])) {
                        // สมมติว่าระยะเวลาเป็น "HH:MM" หรือ "MM"
                        if (str_contains($syll['duration'], ':')) {
                            [$h, $m] = explode(':', $syll['duration']);
                            $totalHours += intval($h) * 60 + intval($m);
                        } else {
                            $totalHours += intval($syll['duration']);
                        }
                    }
                }
            }


            // สร้าง Course
            $course = Courses_Model::create([
                'title' => $req->title,
                'category' => $req->category,
                'instructor' => $req->instructor,
                'duration' => $totalHours, // ใส่รวมระยะเวลา
                'level' => $req->level,
                'price' => $req->price,
                'image_url' => $image_url,
                'description' => $req->description,
            ]);

            // สร้าง Syllabuses
            if ($req->has('syllabuses')) {
                $course->syllabuses()->createMany($req->syllabuses);
            }

            // สร้าง Features
            if ($req->has('features')) {
                $course->features()->createMany($req->features);
            }
        });

        return redirect()->route('Courses.Index')->with('success', 'เพิ่มคอร์สเรียบร้อยแล้ว');
    }







    public function update(Request $req, $uuid)
    {
        try {
            $course = Courses_Model::where('course_id', $uuid)->firstOrFail(); // ลบ space ออกจาก course_id

            DB::transaction(function () use ($req, $course) {
                // ลบรูปเก่าถ้ามี
                if ($req->hasFile('image')) {
                    if ($course->image_url && file_exists(public_path($course->image_url))) {
                        unlink(public_path($course->image_url)); // ลบไฟล์เก่า
                    }

                    // อัปโหลดรูปใหม่
                    $file = $req->file('image');
                    $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
                    $path = 'uploads/courses/' . $filename;
                    $file->move(public_path('uploads/courses'), $filename);
                    $course->image_url = $path;
                }

                $totalHours = 0;
                if ($req->has('syllabuses')) {
                    foreach ($req->syllabuses as $syll) {
                        if (!empty($syll['duration'])) {
                            // สมมติว่าระยะเวลาเป็น "HH:MM" หรือ "MM"
                            if (str_contains($syll['duration'], ':')) {
                                [$h, $m] = explode(':', $syll['duration']);
                                $totalHours += intval($h) * 60 + intval($m);
                            } else {
                                $totalHours += intval($syll['duration']);
                            }
                        }
                    }
                }


                // อัปเดตข้อมูลหลัก
                $course->title = $req->title;
                $course->category = $req->category;
                $course->instructor = $req->instructor;
                $course->level = $req->level;
                $course->price = $req->price;
                $course->description = $req->description;
                $course->duration = $totalHours;
                $course->save();

                // อัปเดต Syllabuses
                if ($req->has('syllabuses')) {
                    $course->syllabuses()->delete(); // ลบของเก่า
                    $course->syllabuses()->createMany($req->syllabuses);
                }

                // อัปเดต Features
                if ($req->has('features')) {
                    $course->features()->delete(); // ลบของเก่า
                    $course->features()->createMany($req->features);
                }
            });

            return redirect()->route('Courses.Index')->with('success', 'แก้ไขข้อมูลสำเร็จ');

        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            dd($e->getMessage());
            return redirect()->back()->with('error', 'เกิดข้อผิดพลาด: ' . $e->getMessage());
        }
    }

    public function destroy($uuid)
    {
        try {
            $course = Courses_Model::where('course_id', $uuid)->firstOrFail();

            DB::transaction(function () use ($course) {
                // ลบรูปเก่าถ้ามี
                if ($course->image_url && file_exists(public_path($course->image_url))) {
                    unlink(public_path($course->image_url));
                }

                // ลบ Syllabuses และ Features
                $course->syllabuses()->delete();
                $course->features()->delete();

                // ลบ Course หลัก
                $course->delete();
            });

            return redirect()->route('Courses.Index')->with('success', 'ลบคอร์สเรียบร้อยแล้ว');
        } catch (\Exception $e) {
            return redirect()->route('Courses.Index')->with('error', 'เกิดข้อผิดพลาด: ' . $e->getMessage());
        }

    }
}
