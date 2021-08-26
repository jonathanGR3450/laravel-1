@extends('layout')

@section('title', 'Editar Usuario')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-10 col-lg-8 mx-auto">
                @include('users.partials._show_errors')
                <form action="{{ route('user.update', $user) }}" method="post">
                    <h1 class="display-4">Editar Usuario {{ str_to_upper($user->name) }} {{ str_to_upper($user->last_name) }}</h1>
                    @method('PATCH')
                    <hr>
                    <br>
                    @include('users.partials._form', ['btnAction' => "editar"])
                </form>
            </div>
        </div>
    </div>
@endsection