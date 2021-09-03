@extends('layout')

@section('title', 'Mensajes')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="display-4">Mensajes</h1>
            </div>
            <div class="col-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Email</th>
                            <th>Etiquetas</th>
                            <th>Nota</th>
                            <th>Asunto</th>
                            <th>Mensaje</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($msgs as $message)
                            <tr>
                                @if ($message->user_id)
                                    <td>{{ $message->user->name }}</td>
                                    <td>{{ $message->user->last_name }}</td>
                                    <td>{{ $message->user->email }}</td>
                                @else
                                    <td>{{ $message->name }}</td>
                                    <td>{{ $message->last_name }}</td>
                                    <td>{{ $message->email }}</td>
                                @endif
                                <td>{{ $message->tags->pluck('name')->implode(', ') }}</td>
                                <td>{{ $message->note->body ?? '' }}</td>
                                <td>{{ $message->subject }}</td>
                                <td><a href="{{ route('message.show', $message) }}">{{ $message->content }}</a></td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a class="btn btn-primary" href="{{ route('message.edit', $message) }}">Editar</a>
                                        <a class="btn btn-danger" href="#" onclick="document.getElementById('{{ 'delete-message-' . $message->id }}').submit()">Eliminar</a>
                                    </div>
                                    <form class="d-none" id="{{ "delete-message-$message->id" }}" action="{{ route("message.destroy", $message) }}" method="post">
                                        @csrf @method("DELETE")
                                    </form>
                                </td>
                            </tr>
                        @empty
                            No hay informacion para mostrar
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="col-12">
                <a href="{{ route('message.create') }}" class="btn btn-primary btn-lg btn-block">Nuevo Mensaje</a>
            </div>
        </div>
    </div>
@endsection