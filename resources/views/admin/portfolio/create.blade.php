@extends('layouts.admin')

@section('title', 'Nuevo proyecto')

@section('content')
<h1 class="mb-4">Nuevo proyecto</h1>

<form method="POST" action="{{ route('admin.portfolio.store') }}">
    @csrf
    <div class="mb-3">
        <label class="form-label">Título</label>
        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" required>
        @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="mb-3">
        <label class="form-label">Descripción</label>
        <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="4" required>{{ old('description') }}</textarea>
        @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label class="form-label">Categoría</label>
            <select name="category" class="form-select @error('category') is-invalid @enderror" required>
                <option value="residencial" {{ old('category') == 'residencial' ? 'selected' : '' }}>Residencial</option>
                <option value="comercial" {{ old('category') == 'comercial' ? 'selected' : '' }}>Comercial</option>
                <option value="industrial" {{ old('category') == 'industrial' ? 'selected' : '' }}>Industrial</option>
            </select>
            @error('category')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="col-md-6 mb-3">
            <label class="form-label">Año</label>
            <input type="text" name="year" class="form-control @error('year') is-invalid @enderror" value="{{ old('year', date('Y')) }}" maxlength="4">
            @error('year')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label">Icono FontAwesome (ej: fa-home, fa-building)</label>
        <input type="text" name="icon" class="form-control" value="{{ old('icon', 'fa-building') }}">
    </div>
    <div class="d-flex gap-2">
        <button type="submit" class="btn btn-primary">Crear proyecto</button>
        <a href="{{ route('admin.portfolio.index') }}" class="btn btn-secondary">Cancelar</a>
    </div>
</form>
@endsection
