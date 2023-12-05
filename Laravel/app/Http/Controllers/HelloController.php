<?php

namespace App\Http\Controllers;

use App\Models\Message;

class HelloController extends Controller {
    
    public function index($name = 'Unknown') {

        $messages = Message::all();
        //dd($messages);
        
        //$message = Message::getMessageByUser($name);

        return view('hello', [
            'name' => $name,
            'messages' => $messages
        ]);
    }

    public function detail($id) {

        $message = Message::find($id);

        if (!$message) {
            return redirect('/error-404');
        }

        return view('messages.detail', [
            'message' => $message
        ]);
    }
    
}