<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\SendAdviceMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function submitAdvice(Request $request)
    {
        // dd($request->toArray());
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ];

        // Gửi email qua Queue
        Mail::to($request->email)->queue(new SendAdviceMail($data));

        return response()->json([
            'success' => 'true',
            'message' => 'Đã gửi email tư vấn!'
        ]);
    }
}
