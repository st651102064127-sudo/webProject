<?php

namespace App\Http\Controllers\Api;
use Illuminate\Support\Facades\Log;
use Zxing\QrReader;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use PromptPayQR\Builder;
use Illuminate\Support\Str;
class verify_slip extends Controller
{
    public function verifySlip(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:jpg,jpeg,png,pdf',
            'course_id' => 'required|integer',
            'amount' => 'required|numeric'
        ]);


        $file = $request->file('file');

        try {
            // สแกน QR
            $qrcode = new QrReader($file);
            $qrText = $qrcode->text();

            $enroll = DB::table('enrollments')
                ->where('user_id', session('user_uuid'))
                ->where('course_id', $request->course_id)
                ->where('status', 'pending')
                ->first();




            if (!$qrText) {
                return response()->json([
                    'message' => 'สลิปไม่ถูกต้อง',
                    'status' => 'error',
                ], 500);
            }

            if (!$enroll) {
                return response()->json([
                    'error' => 'ไม่พบรายการลงทะเบียน หรือรายการนี้จ่ายแล้ว'
                ], 404);
            }
            $promptPay = DB::table('payment')->first();

            // Payload ส่งไป Slip2Go
            $payload = [
                'checkDuplicate' => true,
                'checkReceiver' => [
                    [
                        'accountType' => '01004', // PromptPay
                        'accountNumber' => $promptPay->payment_id,
                        'accountNameTH' => $promptPay->payment_name,
                        'accountNameEN' => $promptPay->payment_name_eng,
                    ],
                ],
                'checkAmount' => [
                    'type' => 'eq',
                    'amount' => (float) $request->input('amount'),
                ],
                'checkDate' => [
                    'type' => 'eq',
                    'date' => now()->format('Y-m-d'),
                ],
            ];


            // ส่ง request ไป Slip2Go
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . env('Secret_Key'),
            ])->attach(
                    'file',
                    fopen($file->getRealPath(), 'r'),
                    $file->getClientOriginalName()
                )->post(env('Api_Url'), [
                        'payload' => json_encode($payload)
                    ]);

            // แปลง response เป็น array
            $responseData = $response->json();

            // เช็ค request สำเร็จ
            if ($response->successful()) {

                // เช็ค slip ซ้ำ
                if (($responseData['code'] ?? '') === '200501') {
                    return response()->json([
                        'status' => 'error',
                        'message' => 'สลิปนี้ถูกใช้งานแล้ว กรุณาตรวจสอบสลิปหรือ ติดต่อ Admin'
                    ], 400);
                }

                $paidAmount = $responseData['data']['amount'] ?? 0;
                $expectedAmount = $enroll->payment_amount;

                if (floatval($paidAmount) !== floatval($expectedAmount)) {
                    return response()->json([
                        'status' => 'error',
                        'message' => 'ยอดเงินไม่ตรง กรุณาตรวจสอบสลิปหรือ ติดต่อ Admin'
                    ], 400);
                }

                // ตรวจสอบชื่อผู้รับเงิน (receiver)
                $receiverName = $responseData['data']['receiver']['account']['name'] ?? '';
                $expectedReceiverName = $promptPay->payment_name; // ชื่อบัญชีระบบ/ร้านของคุณ
                function removeTitle($name)
                {
                    $titles = ['นาย', 'นาง', 'น.ส.', 'น.ส']; // เพิ่มคำนำหน้าที่เจอบ่อย
                    foreach ($titles as $title) {
                        // เช็คว่าชื่อขึ้นต้นด้วยคำนำหน้า
                        if (mb_substr($name, 0, mb_strlen($title)) === $title) {
                            return trim(mb_substr($name, mb_strlen($title)));
                        }
                    }
                    return trim($name);
                }

                $cleanReceiver = removeTitle($receiverName);
                $expected = $expectedReceiverName;
                if (strcasecmp($cleanReceiver, $expected) !== 0) { // ไม่สนใจตัวพิมพ์ใหญ่/เล็ก
                    return response()->json([
                        'status' => 'error',
                        'message' => 'ชื่อบัญชีผู้รับเงินไม่ตรง กรุณาตรวจสอบสลิปหรือ ติดต่อ Admin'
                    ], 400);
                }

                // อัพเดต enrollment
                DB::table('enrollments')
                    ->where('enroll_id', $enroll->enroll_id)
                    ->update([
                        'ref' => $qrText,
                        'status' => 'completed',
                        'payment_id' => Str::uuid(),
                        'updated_at' => now()
                    ]);

                return response()->json([
                    'status' => 'success',
                    'data' => $responseData
                ]);

            } else {
                return response()->json([
                    'status' => 'fail',
                    'message' => $response->body()
                ], $response->status());
            }


        } catch (\Exception $err) {
            Log::error($err);
            return response()->json([
                'message' => 'สลิปไม่ถูกต้อง',
                'status' => 'error',
                'detail' => $err->getMessage()
            ], 500);
        }
    }

    private function getPromptPayReference(string $emvQr)
    {
        // tag 29 = Transaction ID / Reference
        if (preg_match('/29\d{2}(\d+)/', $emvQr, $matches)) {
            return $matches[1];
        }

        return null;
    }

}
