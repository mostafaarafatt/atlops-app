<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Http\Requests\ChatRequest;
use App\Http\Requests\SendMessageRequest;
use App\Models\Conversation;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ChatController extends Controller
{
    public function index()
    {
        $allChats = Conversation::where('sender_id', auth()->user()->id)->orWhere('receiver_id', auth()->user()->id)->get();
        return view('chats.index', compact('allChats'));
    }
    public function getChat(ChatRequest $request)
    {
        $validated = $request->validated();
        $servieType = data_get($validated, 'servieType');
        $receiverId = data_get($validated, 'receiver_id');
        if ($servieType == 'chat') {
            Conversation::firstOrcreate(
                [
                    'sender_id' => auth()->user()->id,
                    'receiver_id' => $receiverId
                ],
                [
                    'sender_id' => auth()->user()->id,
                    'receiver_id' => $receiverId, 'last_time_message' => Carbon::now()

                ]
            );
            return redirect()->to(route('getAllChats'));
        }
    }
    public function show($id)
    {
        $conversation = Conversation::with(['messages', 'receiver'])->findOrFail($id);
        $chatHtml = view('chats._chat_body', compact('conversation'))->render();
        return response()->json([
            'chatHtml' => $chatHtml,
        ], 200);
    }
    public function sendMessage($id, SendMessageRequest $request)
    {
        $conversation = Conversation::findOrFail($id);
        $content = $request->content;
        $image = $request->file('image');
        $message =   $conversation->messages()->create([
            'body' => $content,
            'sender_id' => auth()->user()->id,
            'receiver_id' => $conversation->receiver_id,
        ]);
        if ($image) {
            $message
                ->addMedia($image)
                ->toMediaCollection('image');
        }
        $conversation->update([
            'last_time_message' => Carbon::now()
        ]);
        event(new MessageSent(auth()->user(), $message, $conversation, $conversation->receiver));
        $image = $message->image;
        $messageHtml = view('chats.message', compact('content', 'image'))->render();
        return response()->json([
            'messageHtml' => $messageHtml,
        ], 200);
    }
}
