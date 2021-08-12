@extends('layout')

@section('title', "edit")

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-sm-10 col-lg-8 mx-auto">
            @include('projects.partials.errors')
            <form action="{{ route('project.store') }}" method="POST" class="bg-white rounded mx-0 my-0  py-3 px-4 shadow">
                <h1 class="display-4">create project</h1>
                <hr>
                @include('projects.partials._form', ["btnAction" => "Guardar"])
                {{-- <input type="submit" value="Guardar"> --}}
            </form>
        </div>
    </div>
</div>
@endsection