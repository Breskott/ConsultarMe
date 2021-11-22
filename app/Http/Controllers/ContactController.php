<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Send Contact Email.
     */
    public function mailSend(Request $request)
    {
        $this->validate($request, [ 'name' => 'required', 'email' => 'required|email', 'message' => 'required', 'subject' => 'required' ]);

        $nameSend = $request->get('name');
        $emailSend = $request->get('email');
        $emailReceive = env('MAIL_USERNAME');

        Mail::send('emails.email',
            array(
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'subject' => $request->get('subject'),
                'mensagem' => $request->get('message')
            ), function($message) use ($emailSend, $emailReceive, $nameSend)
            {
                $message->from($emailSend, $nameSend);
                $message->to($emailReceive, $emailSend)->subject('Contato');
            });
        return back()->with('success', 'Obrigado pelo seu contato, em breve te responderemos!');
    }
}
