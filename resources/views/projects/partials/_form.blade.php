@csrf
<div class="from-group">
    <label for="title">Titulo</label>
    <input type="text" class="form-control bg-light shadow-sm border-0" name="title" id="title" value="{{ old("title", $project->title) }}">
</div>
<div class="from-group">
    <label for="slug">url</label>
    <input type="text" class="form-control bg-light shadow-sm border-0" name="slug" id="slug" value="{{ old('slug', $project->slug) }}">
</div>
<div class="form-group">
    <label for="description">Descripcion</label>
    <textarea name="description" class="form-control bg-light shadow-sm border-0" id="description" cols="30" rows="10">{{ old('description', $project->description) }}</textarea>
</div>

<button class="btn btn-primary btn-lg btn-block" type="submit">{{ $btnAction }}</button>
<a href="{{ route('project.index') }}" class="btn btn-link btn-block">Cancelar</a>