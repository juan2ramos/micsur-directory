<?php


namespace Directory\Http\Controllers;

use Directory\Entities\Message;

use Directory\User;
use Illuminate\Http\Request;

use Directory\Http\Requests;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Jenssegers\Date\Date;

class SendMessageController extends Controller
{
    function messageDirectory(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'message' => 'required',
            'date' => 'required',
            'from' => 'required',
            'to' => 'required'
        ]);
        if ($validator->fails()) {
            return  ['success' => false];
        } else {
            $from = User::findOrFail($request->input('from'));
            $to = User::findOrFail($request->input('to'));

            Mail::send('emails.message', ['from' => $from,'to' => $to, 'data' => $request->all()], function ($m) use ($to) {
                $m->from('mensajes@directorio.micsur.org', 'Directorio Micsur');
                $m->to($to->email, $to->name)->subject('¡Tienes un nuevo mensaje desde el directorio Micsur!');
            });
            Message::create($request->all());
            return ['success' => true];
        }
        return $request->all();
    }
}
