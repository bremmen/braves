@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<h1 class="mb-4">Dashboard</h1>

<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><i class="fas fa-images text-primary"></i> Proyectos</h5>
                <p class="display-5">{{ $projectsCount }}</p>
                <a href="{{ route('admin.portfolio.index') }}" class="btn btn-primary btn-sm">Ver portafolio</a>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><i class="fas fa-cog text-success"></i> Servicios</h5>
                <p class="display-5">{{ $servicesCount }}</p>
                <a href="{{ route('admin.settings.index') }}" class="btn btn-success btn-sm">Configuración</a>
            </div>
        </div>
    </div>
</div>

<div class="mt-4">
    <p class="text-muted">Bienvenido al panel de administración de Braves. Desde aquí puedes gestionar el contenido del sitio web.</p>
</div>
@endsection
