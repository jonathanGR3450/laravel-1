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
                                <td>{{ $message->present()->getName() }}</td>
                                <td>{{ $message->present()->getLastName() }}</td>
                                <td>{{ $message->present()->getEmail() }}</td>
                                <td>{{ $message->present()->getTags() }}</td>
                                <td>{{ $message->present()->getNote() }}</td>
                                <td>{{ $message->present()->Getsubject() }}</td>
                                <td>{{ $message->present()->link() }}</td>
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
                {{ $msgs->appends(request()->query())->links('pagination::default') }}
            </div>
            <div class="col-12">
                <a href="{{ route('message.create') }}" class="btn btn-primary btn-lg btn-block">Nuevo Mensaje</a>
            </div>
        </div>
    </div>
@endsection