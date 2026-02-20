@extends('layouts.admin')

@section('title', 'Portafolio')

@section('content')
<h1 class="mb-4">Portafolio</h1>

<a href="{{ route('admin.portfolio.create') }}" class="btn btn-primary mb-4">
    <i class="fas fa-plus"></i> Nuevo proyecto
</a>

<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Título</th>
                <th>Categoría</th>
                <th>Año</th>
                <th>Estado</th>
                <th width="150">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($projects as $project)
            <tr>
                <td>{{ $project->title }}</td>
                <td><span class="badge bg-secondary">{{ ucfirst($project->category) }}</span></td>
                <td>{{ $project->year }}</td>
                <td>
                    @if($project->active)
                    <span class="badge bg-success">Activo</span>
                    @else
                    <span class="badge bg-secondary">Inactivo</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin.portfolio.edit', $project) }}" class="btn btn-sm btn-outline-primary">Editar</a>
                    <form action="{{ route('admin.portfolio.destroy', $project) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar este proyecto?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center text-muted">No hay proyectos</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
