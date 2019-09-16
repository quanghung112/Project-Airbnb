<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    public function sendMail(Request $request)
    {
        $data = $request->all();
        $to_name = $data['name'];
        $to_email = $data['email'];
        $mail = array('name' => $data['name'], "body" => $data['body']);
        Mail::send('mail', $mail, function ($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)->subject('Thông báo từ AirBnbCodeGym');
            $message->from('airbnbcodegym@gmail.com', 'AirBnbCodeGym');
        });
        return response()->json('success');
    }
}
