<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index() {
        $title = "Liên hệ";
        return view('User.Contact.Contact', compact('title'));
    }

    public function sendContact(Request $request) {
        $name = $request->input('name');
        $subject = $request->input('subject');
        $email = $request->input('email');
        $msg = $request->input('message');

        try {
            Mail::send('User.Contact.ContactMail', compact('email', 'name', 'msg'), function ($message) use ($name, $subject, $email) {
                $message->to('gumball678912345@gmail.com');
                $message->replyTo($email, $name);
                $message->subject($subject);
            });
            $request->session()->flash('susscess', "Gửi phản hồi thành công");
            return redirect()->back();
        } catch (\Exception $err) {
            $request->session()->flash('error', $err->getMessage());
            return false;
        }
        
    }
}
