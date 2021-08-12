@extends('layout')

@section('title', 'portfolio')

{{-- para agregar contenido dinamicamnete al layout --}}
@section('content')
<div class="container" style="height: 80vh">
    <div class="row">
        <div class="col-12 col-sm-10 col-lg-8 mx-auto">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="display-4 my-0">portfolio</h1>
                @auth
                    <a class="btn btn-primary" href="{{ route('project.create') }}">Nuevo</a>
                @endauth
            </div>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Soluta voluptatem sunt beatae in, rerum libero sit illum optio quasi repudiandae quisquam doloremque ratione pariatur dolores. Facilis modi nam tempora sit.</p>
            <ul class="list-goup px-0 text-secondary">
                @forelse ($projects as $project)
                    <li class="list-group-item border-0 mt-3 shadow-sm">
                        <a class="d-flex justify-content-between align-items-center" href="{{ route('project.show', $project) }}">
                            <span class="font-weight-bold">
                                {{ $project->title }}
                            </span>
                            <span class="text-black-50">
                                {{ $project->created_at->format('d/m/y') }}
                            </span>
                        </a>
                    </li>
                    <br>
                @empty
                    <li class="list-group-item border-0 mt-3 shadow-sm">
                        No hay informacion para mostrar
                    </li>
                @endforelse
            </ul>
        </div>
    </div>
</div>
@endsection