<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Mail\Contact;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Meta;

class ContactController extends Controller
{
    public function index()
    {
        Meta::title('Fonte do Mel - Contato');
        Meta::set('robots', 'index,follow');
        Meta::set('description', 'Fale Conosco!');
        Meta::set('image', asset('site/img/share.png'));
        return view('site.contact.index');
    }

    public function sendEmail(Request $request)
    {
        $data = [
            "name" => $request->name,
            "email" => $request->email,
            "msg_subject" => $request->msg_subject,
            "phone_number" =>  $request->phone_number,
            "message" => $request->message
        ];

        $contact = new Contact($data);

        Mail::send($contact);

        return response()->json('success');
    }
}
