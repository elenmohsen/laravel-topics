<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use App\Models\Contact;

class MailController extends Controller
{
    public function ContactForm() {
        return view('public.contactus');
    }

    public function sendEmail(Request $request) {
        $data = $request->except('_token');
        Mail::to('elen@gmail.com')->send(new ContactMail($data));

        Contact::create($data);

        return "Message Sent successfuly";
    }
}
