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
                                <td>{{ $user->rol }}</td>
                                <td></td>
                            </tr>
                        @empty
                            No hay informacion
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection