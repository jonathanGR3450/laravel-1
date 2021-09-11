<?php

namespace App\Http\Repositories\Messages;

interface MessageInterface {

    public function getMessages();
    public function store($request);
    public function getMessageById($id);
    public function getVoidMessage();
    public function update($request, $id);
    public function destroy($id);
}