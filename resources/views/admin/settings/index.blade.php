@extends('layouts.admin')

@section('title', 'Configuración')

@section('content')
<h1 class="mb-4">Configuración del sitio</h1>

<form method="POST" action="{{ route('admin.settings.update') }}">
    @csrf

    <div class="accordion" id="settingsAccordion">
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#general">
                    General
                </button>
            </h2>
            <div id="general" class="accordion-collapse collapse show" data-bs-parent="#settingsAccordion">
                <div class="accordion-body">
                    <div class="mb-3">
                        <label class="form-label">Nombre del sitio</label>
                        <input type="text" name="site_name" class="form-control" value="{{ $settings['site_name']?->value ?? '' }}">
                    </div>
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#hero">
                    Hero / Inicio
                </button>
            </h2>
            <div id="hero" class="accordion-collapse collapse" data-bs-parent="#settingsAccordion">
                <div class="accordion-body">
                    <div class="mb-3">
                        <label class="form-label">Título principal</label>
                        <input type="text" name="hero_title" class="form-control" value="{{ $settings['hero_title']?->value ?? '' }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Subtítulo</label>
                        <textarea name="hero_subtitle" class="form-control" rows="3">{{ $settings['hero_subtitle']?->value ?? '' }}</textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#about">
                    Sobre Nosotros
                </button>
            </h2>
            <div id="about" class="accordion-collapse collapse" data-bs-parent="#settingsAccordion">
                <div class="accordion-body">
                    <div class="mb-3">
                        <label class="form-label">Título</label>
                        <input type="text" name="about_title" class="form-control" value="{{ $settings['about_title']?->value ?? '' }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Subtítulo</label>
                        <input type="text" name="about_subtitle" class="form-control" value="{{ $settings['about_subtitle']?->value ?? '' }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Contenido (HTML)</label>
                        <textarea name="about_content" class="form-control" rows="6">{{ $settings['about_content']?->value ?? '' }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Misión</label>
                        <textarea name="about_mission" class="form-control" rows="4">{{ $settings['about_mission']?->value ?? '' }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Valores (uno por línea)</label>
                        @php
                            $vals = $settings['about_values']?->value ?? null;
                            $valsArr = $vals ? (json_decode($vals, true) ?? []) : [];
                            $valsStr = is_array($valsArr) ? implode("\n", $valsArr) : $vals;
                        @endphp
                        <textarea name="about_values_raw" class="form-control" rows="6">{{ $valsStr }}</textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#stats">
                    Estadísticas
                </button>
            </h2>
            <div id="stats" class="accordion-collapse collapse" data-bs-parent="#settingsAccordion">
                <div class="accordion-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Proyectos (número)</label>
                            <input type="text" name="stat_projects" class="form-control" value="{{ $settings['stat_projects']?->value ?? '' }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Proyectos (etiqueta)</label>
                            <input type="text" name="stat_projects_label" class="form-control" value="{{ $settings['stat_projects_label']?->value ?? '' }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Años</label>
                            <input type="text" name="stat_years" class="form-control" value="{{ $settings['stat_years']?->value ?? '' }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Años (etiqueta)</label>
                            <input type="text" name="stat_years_label" class="form-control" value="{{ $settings['stat_years_label']?->value ?? '' }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Empleados</label>
                            <input type="text" name="stat_employees" class="form-control" value="{{ $settings['stat_employees']?->value ?? '' }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Empleados (etiqueta)</label>
                            <input type="text" name="stat_employees_label" class="form-control" value="{{ $settings['stat_employees_label']?->value ?? '' }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Clientes</label>
                            <input type="text" name="stat_clients" class="form-control" value="{{ $settings['stat_clients']?->value ?? '' }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Clientes (etiqueta)</label>
                            <input type="text" name="stat_clients_label" class="form-control" value="{{ $settings['stat_clients_label']?->value ?? '' }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#contact">
                    Contacto
                </button>
            </h2>
            <div id="contact" class="accordion-collapse collapse" data-bs-parent="#settingsAccordion">
                <div class="accordion-body">
                    <div class="mb-3">
                        <label class="form-label">Dirección</label>
                        <input type="text" name="contact_address" class="form-control" value="{{ $settings['contact_address']?->value ?? '' }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Teléfono (display)</label>
                        <input type="text" name="contact_phone" class="form-control" value="{{ $settings['contact_phone']?->value ?? '' }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Teléfono (para llamar, sin +)</label>
                        <input type="text" name="contact_phone_full" class="form-control" value="{{ $settings['contact_phone_full']?->value ?? '' }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="contact_email" class="form-control" value="{{ $settings['contact_email']?->value ?? '' }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Horarios</label>
                        <textarea name="contact_hours" class="form-control" rows="3">{{ $settings['contact_hours']?->value ?? '' }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">WhatsApp (número con código país, sin +)</label>
                        <input type="text" name="whatsapp_number" class="form-control" value="{{ $settings['whatsapp_number']?->value ?? '' }}">
                    </div>
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#footer">
                    Footer
                </button>
            </h2>
            <div id="footer" class="accordion-collapse collapse" data-bs-parent="#settingsAccordion">
                <div class="accordion-body">
                    <div class="mb-3">
                        <label class="form-label">Texto del footer</label>
                        <textarea name="footer_text" class="form-control" rows="3">{{ $settings['footer_text']?->value ?? '' }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Copyright</label>
                        <input type="text" name="copyright" class="form-control" value="{{ $settings['copyright']?->value ?? '' }}">
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Facebook</label>
                            <input type="url" name="social_facebook" class="form-control" value="{{ $settings['social_facebook']?->value ?? '' }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Twitter</label>
                            <input type="url" name="social_twitter" class="form-control" value="{{ $settings['social_twitter']?->value ?? '' }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Instagram</label>
                            <input type="url" name="social_instagram" class="form-control" value="{{ $settings['social_instagram']?->value ?? '' }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">LinkedIn</label>
                            <input type="url" name="social_linkedin" class="form-control" value="{{ $settings['social_linkedin']?->value ?? '' }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-4">
        <button type="submit" class="btn btn-primary">Guardar configuración</button>
    </div>
</form>
@endsection
