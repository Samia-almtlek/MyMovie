<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\User;

class ContactController extends Controller
{
    /**
     * عرض صفحة الاتصال.
     */
    public function index()
    {
        return view('contact.index');
    }

    /**
     * إرسال البريد الإلكتروني للإدمنز.
     */
    public function send(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'subject' => 'required|string|max:255',
        'message' => 'required|string',
    ]);

    // تعيين الإيميل المحدد لاستقبال الرسائل
    $adminEmail = 'samia.almoutlak@gmail.com';

    // إرسال البريد الإلكتروني للإيميل المحدد
    Mail::raw(" You have received a new message from your contact form:

    Name: {$validated['name']}
    Email: {$validated['email']}
    Subject: {$validated['subject']}
    Message: {$validated['message']}
    
", function ($mail) use ($validated, $adminEmail) {
    $mail->to($adminEmail)
        ->subject($validated['subject'])
        ->from(config('mail.from.address'), config('mail.from.name')); // الإيميل الثابت من الإعدادات
});

    

    return redirect()->route('contact.index')->with('success', 'Your message has been sent successfully to the admin!');
}


}