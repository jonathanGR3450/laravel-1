@extends('layout')

@section('title', 'show message')

@section('content')
    <div class="container">
        <div class="bg-white p-5 shadow rounded">
            <div class="row">
                <div class="col-12">
                    <h1>
                        {{ $msg->name }} {{ $msg->last_name }}
                    </h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="d-flex justify-content-between align-items-center">
                        <table class="table">
                            <tr>
                                <th>Nombre</th>
                                <td>{{ $msg->name }}</td>
                            </tr>
                            <tr>
                                <th>Apellido</th>
                                <td>{{ $msg->last_name }}</td>
                            </tr>
                            <tr>
                                <th>Etiquetas</th>
                                <td>{{ $msg->tags->pluck('name')->implode(', ') }}</td>
                            </tr>
                            <tr>
                                <th>Notas</th>
                                <td>{{ $msg->note->body ?? '' }}</td>
                            </tr>
                            <tr>
                                <th>Asunto</th>
                                <td>{{ $msg->subject }}</td>
                            </tr>
                            <tr>
                                <th>Contenido</th>
                                <td>{{ $msg->content }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="col-12">
                    <a href="{{ route('message.index') }}" class="btn btn-info btn-lg btn-block">Regresar</a>
                    <a href="{{ route('message.edit', $msg) }}" class="btn btn-primary btn-lg btn-block">Editar</a>
                    <a href="#" class="btn btn-danger btn-lg btn-block" onclick="document.getElementById('message-delete').submit()">Eliminar</a>

                    <form method="POST" action="{{ route('message.destroy', $msg) }}" class="d-none" id="message-delete">
                        @csrf @method('DELETE')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection