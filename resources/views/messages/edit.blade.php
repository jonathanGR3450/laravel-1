@extends('layout')

@section('title', 'contact')

{{-- para agregar contenido dinamicamnete al layout --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-10 col-lg-8 mx-auto">
                {{-- {{ dd($message) }} --}}
                <form action="{{ route('message.update', $message) }}" method="POST" class="bg-white rounded mx-0 my-0  py-3 px-4 shadow">
                    @method('PATCH')
                    @include('messages.partials._form', ['btnText' => 'Editar', 'msg' => $message])
                </form>
            </div>
        </div>
    </div>
@endsection