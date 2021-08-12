@extends('layout')

@section('title', 'Edit')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-sm-10 col-lg-8 mx-auto">
            @include('projects.partials.errors')
            <form action="{{ route("project.update", $project) }}" method="POST">
                <h1 class="display-4">Edit {{ $project->title }}</h1>
                <hr>
                @method("PATCH")
                @include('projects.partials._form', ['btnAction' => "editar"])
            </form>
        </div>
    </div>
</div>
@endsection