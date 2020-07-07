<?php

namespace App\Http\Controllers\Chat;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Chat\Message;
use App\Events\Chat\MessageCreated;

class ChatController extends Controller
{
    public function index(){
        return view('chat.index');
    }

    public function messages(Message $messagem){
        $dados = $messagem->with('user')
                        ->orderby('id','desc')
                        ->limit(50)
                        ->latest()
                        ->get();


        return \response()->json($dados);
    }

    public function store(Request $request){
        $message = auth()->user()->messages()->create([
            'body' => $request->body
        ]);

        $user = auth()->user();
        $message['user'] = $user;

        broadcast(new MessageCreated($message))->toOthers();

        return response()->json($message,201);
    }
}
