@extends('layout')

@section('title', 'contact')

{{-- para agregar contenido dinamicamnete al layout --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-10 col-lg-8 mx-auto">
                <form action="{{ route('contact.store') }}" method="POST" class="bg-white rounded mx-0 my-0  py-3 px-4 shadow">
                    @csrf
                    <h1 class="display-4">contacto</h1>
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control bg-light shadow-sm @error('name') is-invalid @else border-0  @enderror"
                        id="name" name="name" placeholder="Nombre..." value="{{ old('name') }}">
                        @error('name')
                            <span role="alert" class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Correo</label>
                        <input type="text" class="form-control bg-light shadow-sm @error('email') is-invalid @else border-0  @enderror"
                        id="email" name="email" placeholder="email..." value="{{ old('email') }}">
                        @error('email')
                            <span role="alert" class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="subject">Asunto</label>
                        <input class="form-control bg-light shadow-sm @error('subject') is-invalid @else border-0 @enderror"
                        type="text" id="subject" name="subject" placeholder="titulo..." value="{{ old('subject') }}">
                        @error('subject')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="content">Mensaje</label>
                        {{-- imprimiendo el metodo old y pasandole como parametro el nombre del atributo se muestra la informacion que estaba antes de enviar el formulario --}}
                        <textarea class="form-control bg-light shadow-sm @error('content') is-invalid @else border-0 @enderror" id="content" name="content" cols="30" rows="10" placeholder="contenido...">{{ old('content') }}</textarea>
                        {{-- podemos acceder al objeto error que tiene el metodo first el cual recibe como parametro el nombre del campo validado y el mensaje custom --}}
                        {{-- se imprime con los brackets y signo de admiracion hacia abajo --}}
                        {{-- {!! $errors->first('content', '<small>:message</small>') !!} --}}
                        @error('record')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <button class="btn btn-primary btn-lg btn-block">send</button>
                </form>
            </div>
        </div>
    </div>
@endsection