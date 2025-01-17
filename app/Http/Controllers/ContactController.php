<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\User;

class ContactController extends Controller
{
    /**
     * view contact page
     */
    public function index()
    {
        return view('contact.index');
    }

    /**
     * send email for admins
     */
    public function send(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'subject' => 'required|string|max:255',
        'message' => 'required|string',
    ]);

    
    $admins = User::where('is_admin', true)->get();

    if ($admins->isEmpty()) {
        return redirect()->route('contact.index')->with('error', 'No admins available to receive the message.');
    }

    // send the emai for each admin
    foreach ($admins as $admin) {
        Mail::raw("You have received a new message from your contact form:
        
        Name: {$validated['name']}
        Email: {$validated['email']}
        Subject: {$validated['subject']}
        Message: {$validated['message']}
        
        ", function ($mail) use ($validated, $admin) {
            $mail->to($admin->email)
                ->subject($validated['subject'])
                ->from(config('mail.from.address'), config('mail.from.name')); // الإيميل الثابت من الإعدادات
        });
    }

    return redirect()->route('contact.index')->with('success', 'Your message has been sent successfully to all admins!');
}
}