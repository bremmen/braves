<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $settings['site_name'] ?? 'Braves' }}</title>
    <link rel="icon" type="image/png" href="{{ asset('res/isologo.png') }}">
    <link rel="stylesheet" href="{{ asset('styles.css') }}?v={{ time() }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;700&display=swap" rel="stylesheet">
</head>
<body>
    <nav class="navbar">
        <div class="nav-container">
            <div class="nav-logo">
                <img src="{{ asset('res/logo.png') }}" alt="Braves" style="width: 100%; height: auto; display: block;">
            </div>
            <ul class="nav-menu">
                <li class="nav-item"><a href="#inicio" class="nav-link">Inicio</a></li>
                <li class="nav-item"><a href="#sobre-nosotros" class="nav-link">Sobre Nosotros</a></li>
                <li class="nav-item"><a href="#nuestros-trabajos" class="nav-link">Nuestros Trabajos</a></li>
                <li class="nav-item"><a href="#contactenos" class="nav-link">Contáctenos</a></li>
            </ul>
            <div class="hamburger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </div>
    </nav>

    @yield('content')

    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <div class="footer-logo" style="max-width: 150px;">
                        <img src="{{ asset('res/logo.png') }}" alt="Braves" style="width: 100%; height: auto; display: block;">
                    </div>
                    <p>{{ $settings['footer_text'] ?? '' }}</p>
                    <div class="social-links">
                        <a href="{{ $settings['social_facebook'] ?? '#' }}"><i class="fab fa-facebook"></i></a>
                        <a href="{{ $settings['social_twitter'] ?? '#' }}"><i class="fab fa-twitter"></i></a>
                        <a href="{{ $settings['social_instagram'] ?? '#' }}"><i class="fab fa-instagram"></i></a>
                        <a href="{{ $settings['social_linkedin'] ?? '#' }}"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="footer-section">
                    <h3>Servicios</h3>
                    <ul>
                        @foreach($services ?? [] as $service)
                        <li><a href="{{ $service->url ?? '#' }}">{{ $service->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="footer-section">
                    <h3>Enlaces Rápidos</h3>
                    <ul>
                        <li><a href="#inicio">Inicio</a></li>
                        <li><a href="#sobre-nosotros">Sobre Nosotros</a></li>
                        <li><a href="#nuestros-trabajos">Nuestros Trabajos</a></li>
                        <li><a href="#contactenos">Contáctenos</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h3>Contacto</h3>
                    <p><i class="fas fa-map-marker-alt"></i> {{ $settings['contact_address'] ?? '' }}</p>
                    <p><i class="fas fa-phone"></i> {{ $settings['contact_phone'] ?? '' }}</p>
                    <p><i class="fas fa-envelope"></i> {{ $settings['contact_email'] ?? '' }}</p>
                </div>
            </div>
            <div class="footer-bottom">
                <p>{{ $settings['copyright'] ?? '' }}</p>
            </div>
        </div>
    </footer>

    <script src="{{ asset('script.js') }}?v={{ time() }}"></script>
</body>
</html>
