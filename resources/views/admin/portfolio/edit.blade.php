@extends('layouts.admin')

@section('title', 'Editar proyecto')

@section('content')
<h1 class="mb-4">Editar proyecto</h1>

<form method="POST" action="{{ route('admin.portfolio.update', $portfolio) }}">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label class="form-label">Título</label>
        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $portfolio->title) }}" required>
        @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="mb-3">
        <label class="form-label">Descripción</label>
        <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="4" required>{{ old('description', $portfolio->description) }}</textarea>
        @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label class="form-label">Categoría</label>
            <select name="category" class="form-select @error('category') is-invalid @enderror" required>
                <option value="residencial" {{ old('category', $portfolio->category) == 'residencial' ? 'selected' : '' }}>Residencial</option>
                <option value="comercial" {{ old('category', $portfolio->category) == 'comercial' ? 'selected' : '' }}>Comercial</option>
                <option value="industrial" {{ old('category', $portfolio->category) == 'industrial' ? 'selected' : '' }}>Industrial</option>
            </select>
            @error('category')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="col-md-6 mb-3">
            <label class="form-label">Año</label>
            <input type="text" name="year" class="form-control @error('year') is-invalid @enderror" value="{{ old('year', $portfolio->year) }}" maxlength="4">
            @error('year')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label">Icono FontAwesome</label>
        <input type="text" name="icon" class="form-control" value="{{ old('icon', $portfolio->icon) }}">
    </div>
    <div class="mb-3 form-check">
        <input type="hidden" name="active" value="0">
        <input type="checkbox" name="active" id="active" class="form-check-input" value="1" {{ old('active', $portfolio->active) ? 'checked' : '' }}>
        <label for="active" class="form-check-label">Proyecto activo (visible en el sitio)</label>
    </div>
    <div class="d-flex gap-2">
        <button type="submit" class="btn btn-primary">Guardar cambios</button>
        <a href="{{ route('admin.portfolio.index') }}" class="btn btn-secondary">Cancelar</a>
    </div>
</form>
@endsection
