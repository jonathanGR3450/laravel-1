@extends('layout')

{{-- @section('title', 'about') --}}

{{-- para agregar contenido dinamicamnete al layout --}}
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-md-6">
            <img class="img-fluid mb-4" src="/img/design.svg" alt="design of software">
        </div>
        <div class="col-12 col-md-6">
            <h1 class="display-4 text-primary">Quien soy</h1>
            <p class="lead text-secondary">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis, laboriosam sint. Architecto consectetur minus reiciendis dolor earum fugiat soluta consequuntur molestiae quae dolorem a, quibusdam sint eaque commodi inventore harum.
            </p>
            <a class="btn btn-lg btn-block btn-primary" href="{{ route('contact') }}">Contactame</a>
            <a class="btn btn-lg btn-block btn-outline-primary" href="{{ route('project.index') }}">Portafolio</a>
        </div>
    </div>
</div>
    
@endsection