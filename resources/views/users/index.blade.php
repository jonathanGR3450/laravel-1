@extends('layout')

@section('title', "usuarios")

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="display-4">Usuarios</h1>
            </div>
            <div class="col-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Rol</th>
                            <th>Accion</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    {!! $user->roles->pluck('display_name')->implode(' - ') !!}
                                </td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a class="btn btn-primary" href="{{ route('user.edit', $user) }}">Edit</a>
                                        <a class="btn btn-danger" href="#" onclick="document.getElementById('delete-user').submit()">Delete</a>
                                    </div>
                                    <form class="d-none" id="delete-user" action="{{ route("user.destroy", $user) }}" method="post">
                                        @csrf @method("DELETE")
                                    </form>
                                </td>
                            </tr>
                        @empty
                            No hay informacion
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="col-12">
                <a href="{{ route('user.create') }}" class="btn btn-secondary btn-lg btn-block">Nuevo Usuario</a>
            </div>
        </div>
    </div>
@endsection