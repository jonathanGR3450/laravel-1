<?php

namespace App\Http\Controllers\app;

use App\Events\MessageWasReceibed;
use App\Http\Controllers\Controller;
use App\Http\Requests\messages\MessageRequest;
use App\Mail\MessageReceived;
use App\Models\Message;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;
use App\Http\Repositories\Messages\MessageRepository;

class MessageController extends Controller
{
    private $messageRepository;

    public function __construct(MessageRepository $messageRepository) {
        $this->messageRepository = $messageRepository;
        $this->middleware('auth')->except('store', 'create');
        $this->middleware('roles:admin')->except('store', 'create');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $msgs = $this->messageRepository->getMessages();
        return view('messages.index', compact('msgs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $message = $this->messageRepository->getVoidMessage();
        return view('messages.create')->with(compact('message'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MessageRequest $request)
    {
        $msg = $this->messageRepository->store($request);

        event(new MessageWasReceibed($msg));
        return back()->with("status", "se envio tu mensaje");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $msg = $this->messageRepository->getMessageById($id);
        return view('messages.show', compact('msg'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $message = $this->messageRepository->getMessageById($id);
        return view('messages.edit', compact('message'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MessageRequest $request, $id)
    {
        $message = $this->messageRepository->update($request, $id);
        return redirect()->route('message.index')->with('status','El registro se actualizo correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->messageRepository->destroy($id);
        return redirect()->route('message.index')->with('status', 'Se elimino el registro con exito');
    }
}
