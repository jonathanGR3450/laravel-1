@csrf
<h1 class="display-4">contacto</h1>
{{-- {{ dd($message->subject) }} --}}
@guest
    <div class="form-group">
        <label for="name">Nombres</label>
        <input type="text" class="form-control bg-light shadow-sm @error('name') is-invalid @else border-0  @enderror"
        id="name" name="name" placeholder="Nombre..." value="{{ old('name', $msg->name) }}">
        @error('name')
            <span role="alert" class="invalid-feedback">
                {!! $errors->first('name', '<strong>:message</strong>') !!}
            </span>
        @enderror
    </div>
    <div class="form-group">
            <label for="last_name">Apellidos</label>
            <input type="text" name="last_name" id="last_name" class="form-control bg-light shadow-sm @error('last_name') is-invalid @else border-0 @enderror"
            placeholder="Apellidos..." value="{{ old('last_name', $msg->last_name) }}">
            @error('last_name')
                <span role="alert" class="invalid-feedback">
                    {!! $errors->first('last_name', '<strong>:message</strong>') !!}
                </span>
            @enderror
    </div>
    <div class="form-group">
        <label for="email">Correo</label>
        <input type="text" class="form-control bg-light shadow-sm @error('email') is-invalid @else border-0  @enderror"
        id="email" name="email" placeholder="email..." value="{{ old('email', $msg->email) }}">
        @error('email')
            <span role="alert" class="invalid-feedback">
                {{ $errors->first('email', "<strong>:message</strong>") }}
                {{-- {{ $message }} --}}
            </span>
        @enderror
    </div>
@endguest
<div class="form-group">
    <label for="subject">Asunto</label>
    <input class="form-control bg-light shadow-sm @error('subject') is-invalid @else border-0 @enderror"
    type="text" id="subject" name="subject" placeholder="titulo..." value="{{ old('subject', $msg->subject) }}">
    @error('subject')
        <span class="invalid-feedback" role="alert">
            {!! $errors->first('subject', '<strong>:message</strong>') !!}
        </span>
    @enderror
</div>
<div class="form-group">
    <label for="content">Mensaje</label>
    {{-- imprimiendo el metodo old y pasandole como parametro el nombre del atributo se muestra la informacion que estaba antes de enviar el formulario --}}
    <textarea class="form-control bg-light shadow-sm @error('content') is-invalid @else border-0 @enderror" id="content" name="content" cols="30" rows="10" placeholder="contenido...">{{ old('content', $msg->content) }}</textarea>
    {{-- podemos acceder al objeto error que tiene el metodo first el cual recibe como parametro el nombre del campo validado y el mensaje custom --}}
    {{-- se imprime con los brackets y signo de admiracion hacia abajo --}}
    {{-- {!! $errors->first('content', '<strong>:message</strong>') !!} --}}
    @error('content')
        <span class="invalid-feedback" role="alert">
            {!! $errors->first('content', '<strong>:message</strong>') !!}
        </span>
    @enderror
</div>
<button class="btn btn-primary btn-lg btn-block">{{ $btnText }}</button>