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
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    public function __construct() {
        $this->middleware('auth')->except('store', 'create');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $msgs = Message::latest('created_at')->get();
        $msgs = Message::with(['user', 'tags', 'note'])
        ->orderBy('created_at', request('sorted', 'ASC'))
        ->paginate(10);
        return view('messages.index', compact('msgs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('messages.create')->with(['message' => new Message]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MessageRequest $request)
    {
        $msg = Message::create($request->validated());
        //dd($msg);
        if (Auth::check()) {
            $msg->user_id = Auth::user()->id;
            $msg->save();
        }

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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        return view('messages.edit', compact('message'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MessageRequest $request, Message $message)
    {
        $message->subject = $request->subject;
        $message->content = $request->content;
        $message->save();
        Mail::to('jonatangarzon95@gmail.com')->queue(new MessageReceived($message));
        return redirect()->route('message.index')->with('status','El registro se actualizo correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        $message->delete();
        return back()->with('status', 'Se elimino el registro con exito');
    }
}
