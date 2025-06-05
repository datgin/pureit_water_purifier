<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\SendAdviceMail;
use App\Models\Contact;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function submitAdvice(Request $request)
    {
        // dd($request->toArray());
        $credentials =  $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'product_id' => 'nullable|exists:products,id'
        ]);
        Contact::create($credentials);
        $emailAdmin = config('mail.to');
        if($request->product_id){
            $productName = Product::find($request->product_id)->name;
            $credentials['product_name'] = $productName;
        }

        Mail::to($emailAdmin)->queue(new SendAdviceMail($credentials,));



        return response()->json([
            'success' => 'true',
            'message' => 'Đã gửi email tư vấn!'
        ]);
    }
}
