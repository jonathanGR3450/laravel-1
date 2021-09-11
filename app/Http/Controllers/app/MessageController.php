<?php

namespace App\Http\Controllers\app;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Messages\MessageInterface;
use App\Http\Requests\messages\MessageRequest;

class MessageController extends Controller
{
    private $message;

    public function __construct(MessageInterface $message)
    {
        $this->message = $message;
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
        $msgs = $this->message->getMessages();
        return view('messages.index', compact('msgs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $message = $this->message->getVoidMessage();
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
        $msg = $this->message->store($request);

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
        $msg = $this->message->getMessageById($id);
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
        $message = $this->message->getMessageById($id);
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
        $message = $this->message->update($request, $id);
        return redirect()->route('message.index')->with('status', 'El registro se actualizo correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->message->destroy($id);
        return redirect()->route('message.index')->with('status', 'Se elimino el registro con exito');
    }
}
