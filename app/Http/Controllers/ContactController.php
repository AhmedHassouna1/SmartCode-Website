<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactMessage;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:2000',
        ]);

        $user = Auth::user();
        $nameParts = explode(' ', $user->name);
        $first_name = $nameParts[0] ?? '';
        $middle_name = $nameParts[1] ?? '';
        $last_name = $nameParts[2] ?? '';

        // حفظ الرسالة في قاعدة البيانات
        $message = ContactMessage::create([
            'user_id' => $user->id,
            'first_name' => $first_name,
            'middle_name' => $middle_name,
            'last_name' => $last_name,
            'email' => $user->email,
            'message' => $request->message,
        ]);

        // إرسال الرسالة على بريدك الشخصي
        Mail::html(
            "الاسم: {$message->first_name} {$message->middle_name} {$message->last_name}<br>
             البريد الإلكتروني: {$message->email}<br>
             الرسالة: {$message->message}",
            function ($mail) {
                $mail->to('alahmedamer345@gmail.com')
                     ->subject('رسالة من نموذج تواصل الموقع');
            }
        );

        return back()->with('success', 'تم إرسال الرسالة بنجاح!');
    }
}
