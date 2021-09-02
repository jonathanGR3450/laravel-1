@csrf
<div class="form-group">
    <label for="name">Nombre</label>
    <input class="form-control bg-light shadow-sm border-0" type="text" name="name" id="name" value="{{ old('name', $user->name) }}">
</div>
<div class="form-group">
    <label for="last_name">Apellido</label>
    <input type="text" name="last_name" id="last_name" class="form-control bg-light shadow-sm border-0" value="{{ old('last_name', $user->last_name) }}">
</div>
<div class="form-group">
    <label for="email">Correo Electronico</label>
    <input type="email" name="email" id="email" class="form-control bg-light shadow-sm border-0" value="{{ old('email', $user->email) }}">
</div>
@if (!$user->id)
    <div class="form-group">
        <label for="password">Contraseña</label>
        <input type="password" name="password" id="password" class="form-control bg-light shadow-sm border-0">
    </div>
    <div class="form-group">
        <label for="password_confirmation">Confirmar Contraseña</label>
        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control bg-light shadow-sm border-0">
    </div>
@endif
<div class="checkbox pt-3">
    <p><strong>Roles</strong></p>
    @foreach ($roles as $id => $role)
        <label>
            <input type="checkbox" name="roles[]" value="{{ $id }}"
                {{ $user->roles->pluck('id')->contains($id) ? 'checked' : '' }}
            >
            {{ $role }}
        </label>
    @endforeach
</div>
<button class="btn btn-primary btn-lg btn-block" type="submit">{{ $btnAction }}</button>
<input type="hidden" name="id" value="{{ $user->id ?? '0' }}">
<a class="btn btn-block btn-warning" href="{{ route('user.index') }}">Cancelar</a>