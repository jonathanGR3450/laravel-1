<?php

namespace App\Http\Repositories\Messages;

use App\Events\MessageWasReceibed;
use Illuminate\Support\Facades\Cache;

class MessageDecorator implements MessageInterface {

    private $messageRepository;

    public function __construct(MessageRepository $messageRepository) {
        $this->messageRepository = $messageRepository;
    }

    public function getMessages()
    {
        $key = 'message.page.' . request('page', 1);
        return Cache::tags('message')->rememberForever($key, function ()
        {
            return $this->messageRepository->getMessages();
        });
    }

    public function store($request)
    {
        $msg = $this->messageRepository->store($request);
        event(new MessageWasReceibed($msg));
        Cache::tags('message')->flush();
        return $msg;
    }

    public function getMessageById($id)
    {
        return Cache::tags('message')->rememberForever("message.$id", function () use($id)
        {
            return $this->messageRepository->getMessageById($id);
        });
    }

    public function getVoidMessage()
    {
        return $this->messageRepository->getVoidMessage();
    }

    public function update($request, $id)
    {
        Cache::tags('message')->flush();
        return $this->messageRepository->update($request, $id);
    }

    public function destroy($id)
    {
        Cache::tags('message')->flush();
        return $this->messageRepository->destroy($id);
    }
}