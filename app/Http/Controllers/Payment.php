<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PromptPayQR\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Payment extends Controller
{
    public function showQr($price)
    {

        $promptPayId = DB::table('payment')->first()->payment_id;


        // สร้าง QR Code Payload
        $payload = Builder::staticMerchantPresentedQR($promptPayId)
            ->setAmount($price)
            ->build();

        return $payload;
    }

    public function Enrollment($data)
    {
        $userId = session('user_uuid');
        $courseId = $data['course_id'] ?? null;
        $price = $data['price'] ?? 0;

        if (!$courseId) {
            return redirect()->back()->with('error', 'ข้อมูลคอร์สไม่ถูกต้อง');
        }

        // ดึงข้อมูลการลงทะเบียนของ user กับคอร์สนี้
        $result = DB::table('enrollments')
            ->where('user_id', $userId)
            ->where('course_id', $courseId)
            ->first(); // ใช้ first() แทน get() เพื่อให้ได้ object เดียว
        if ($result) {
            if ($result->status === 'completed') {
                return '0';
            } elseif ($result->status === 'pending') {
                return '1';
            }

        } else {
            $enrollId = DB::table('enrollments')->insertGetId([
                'course_id' => $data['course_id'],
                'user_id' => $userId,
                'payment_id' => Str::uuid(),
                'payment_amount' => $data['price'],
                'status' => 'pending',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return '2';
        }
    }

}
