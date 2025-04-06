<?php

namespace App\Http\Controllers\emergency;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmergencyController extends Controller
{
    public function index()
    {
        return view('emergency.app');
    }

    public function send_gps()
    {
        $channelToken = 'L4x3vp1t8f4gDx+op2v5bYQO3lozP3T+2aMMhEjtl9CkmsMiAJ8fNC+BqRReVSTEiZk6gR5oRs73p2QyZzNlyuB2ziCpX/zcNGLK1xGRAmDKMj/NXq3x9IRdLYZjLQZs1z3llUhNnlpNMB8iqvP7NwdB04t89/1O/w1cDnyilFU='; // เปลี่ยนเป็น access token ของคุณ
        $userId = 'U9a60621a69e189197bde0ba92e3c77f6';
        // $userId = 'C574e36d4850cccf9107d9252d30e74d9';

        $messageData = [
            'to' => $userId,
            'messages' => [
                [
                    'type' => 'text',
                    'text' => 'แจ้งเหตุ มีอุบัติเหตุรถชน https://www.google.com/maps?q=13.75599,100.62327'
                ]
            ]
        ];

        $ch = curl_init('https://api.line.me/v2/bot/message/push');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $channelToken
        ]);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($messageData));

        $result = curl_exec($ch);
        $httpStatus = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        // ตรวจสอบผลลัพธ์
        if ($httpStatus == 200) {
            echo "ส่งข้อความเรียบร้อย!";
        } else {
            echo "เกิดข้อผิดพลาด: " . $result;
        }
    }
}
