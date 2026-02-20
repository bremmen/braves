@extends('layouts.app', ['settings' => $settings, 'services' => $services])

@section('content')
<section id="inicio" class="hero">
    <div class="hero-content">
        <h1>{{ $settings['hero_title'] ?? 'Construyendo Sueños, Creando Futuros' }}</h1>
        <p>{{ $settings['hero_subtitle'] ?? '' }}</p>
        <div class="hero-buttons">
            <a href="#nuestros-trabajos" class="btn btn-primary">Ver Nuestros Trabajos</a>
            <a href="#contactenos" class="btn btn-secondary">Solicitar Cotización</a>
        </div>
    </div>
</section>

<section id="sobre-nosotros" class="about">
    <div class="container">
        <div class="section-header">
            <h2>{{ $settings['about_title'] ?? 'Sobre Nosotros' }}</h2>
            <p>{{ $settings['about_subtitle'] ?? '' }}</p>
        </div>
        <div class="about-content">
            <div class="about-text">
                {!! $settings['about_content'] ?? '' !!}
                <h3>Nuestra Misión</h3>
                <p>{{ $settings['about_mission'] ?? '' }}</p>
                <h3>Nuestros Valores</h3>
                <ul>
                    @foreach($settings['about_values'] ?? [] as $value)
                    <li><i class="fas fa-check"></i> {{ $value }}</li>
                    @endforeach
                </ul>
            </div>
            <div class="about-stats">
                <div class="stat-item">
                    <div class="stat-number">{{ $settings['stat_projects'] ?? '45+' }}</div>
                    <div class="stat-label">{{ $settings['stat_projects_label'] ?? 'Proyectos Completados' }}</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">{{ $settings['stat_years'] ?? '3' }}</div>
                    <div class="stat-label">{{ $settings['stat_years_label'] ?? 'Años de Experiencia' }}</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">{{ $settings['stat_employees'] ?? '11+' }}</div>
                    <div class="stat-label">{{ $settings['stat_employees_label'] ?? 'Empleados Especializados' }}</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">{{ $settings['stat_clients'] ?? '100%' }}</div>
                    <div class="stat-label">{{ $settings['stat_clients_label'] ?? 'Clientes Satisfechos' }}</div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="nuestros-trabajos" class="portfolio">
    <div class="container">
        <div class="section-header">
            <h2>Nuestros Trabajos</h2>
            <p>Algunos de nuestros proyectos más destacados</p>
        </div>
        <div class="portfolio-filters">
            <button class="filter-btn active" data-filter="all">Todos</button>
            <button class="filter-btn" data-filter="residencial">Residencial</button>
            <button class="filter-btn" data-filter="comercial">Comercial</button>
            <button class="filter-btn" data-filter="industrial">Industrial</button>
        </div>
        <div class="portfolio-grid">
            @foreach($projects as $project)
            <div class="portfolio-item" data-category="{{ $project->category }}">
                <div class="portfolio-image">
                    <i class="fas {{ $project->icon }}"></i>
                </div>
                <div class="portfolio-content">
                    <h3>{{ $project->title }}</h3>
                    <p>{{ $project->description }}</p>
                    <span class="portfolio-year">{{ $project->year }}</span>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section id="contactenos" class="contact">
    <div class="container">
        <div class="section-header">
            <h2>Contáctenos</h2>
            <p>Estamos listos para hacer realidad tu proyecto</p>
        </div>
        <div class="contact-content">
            <div class="contact-info">
                <div class="contact-item">
                    <div class="contact-icon"><i class="fas fa-map-marker-alt"></i></div>
                    <div class="contact-details">
                        <h3>Dirección</h3>
                        <p>{{ $settings['contact_address'] ?? '' }}</p>
                    </div>
                </div>
                <div class="contact-item">
                    <div class="contact-icon"><i class="fas fa-phone"></i></div>
                    <div class="contact-details">
                        <h3>Teléfono</h3>
                        <p>{{ $settings['contact_phone'] ?? '' }}</p>
                    </div>
                </div>
                <div class="contact-item">
                    <div class="contact-icon"><i class="fas fa-envelope"></i></div>
                    <div class="contact-details">
                        <h3>Email</h3>
                        <p>{{ $settings['contact_email'] ?? '' }}</p>
                    </div>
                </div>
                <div class="contact-item">
                    <div class="contact-icon"><i class="fas fa-clock"></i></div>
                    <div class="contact-details">
                        <h3>Horarios</h3>
                        <p>{!! nl2br(e($settings['contact_hours'] ?? '')) !!}</p>
                    </div>
                </div>
            </div>
            <div class="whatsapp-contact">
                <div class="whatsapp-card">
                    <div class="whatsapp-icon"><i class="fab fa-whatsapp"></i></div>
                    <h3>¡Contáctanos por WhatsApp!</h3>
                    <p>¿Tienes un proyecto en mente? Escríbenos directamente por WhatsApp y te responderemos al instante.</p>
                    <div class="whatsapp-buttons">
                        <a href="https://wa.me/{{ $settings['whatsapp_number'] ?? '59899708601' }}?text=Hola%20Braves,%20me%20interesa%20solicitar%20una%20cotización%20para%20mi%20proyecto%20de%20construcción" class="btn btn-whatsapp" target="_blank">
                            <i class="fab fa-whatsapp"></i> Chatear por WhatsApp
                        </a>
                        <a href="tel:+{{ $settings['contact_phone_full'] ?? '59899708601' }}" class="btn btn-call">
                            <i class="fas fa-phone"></i> Llamar Ahora
                        </a>
                    </div>
                    <div class="whatsapp-info">
                        <p><strong>Horario de atención:</strong></p>
                        <p>{!! nl2br(e($settings['contact_hours'] ?? '')) !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
