<?php

namespace App\Http\Repositories\Messages;

use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class MessageRepository {

    public function getMessages()
    {
        return Message::with(['user', 'tags', 'note'])
        ->orderBy('created_at', request('sorted', 'ASC'))
        ->paginate(10);
    }

    public function store($request)
    {
        $msg = Message::create($request->validated());
        //dd($msg);
        if (Auth::check()) {
            $msg->update([
                'user_id' => Auth::user()->id,
            ]);
        }
        return $msg;
    }

    public function getMessageById($id)
    {
        return Message::findOrFail($id);
    }

    public function getVoidMessage()
    {
        return new Message();
    }

    public function update($request, $id)
    {
        return Message::findOrFail($id)->update($request->validated());
    }

    public function destroy($id)
    {
        Cache::tags('message')->flush();
        return Message::findOrFail($id)->delete();
    }
}