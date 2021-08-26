@extends('layout')

@section('title', "Crear Usuario")

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-10 col-lg-8 mx-auto">
                @include('users.partials._show_errors')
                <form action="{{ route('user.store') }}" method="post">
                    <h1 class="display-4">Crear Usuario</h1>
                    <hr>
                    <br>
                    @include('users.partials._form', ["btnAction" => "Guardar"])
                </form>
            </div>
        </div>
    </div>
@endsection