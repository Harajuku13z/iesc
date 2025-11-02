<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', $siteSettings->site_name ?? 'IESC Université')</title>
    <meta name="description" content="@yield('description', 'Institut d\'Enseignement Supérieur du Congo')">
    
    @if(!empty($siteSettings?->site_favicon_path))
        <link rel="icon" href="{{ Storage::url($siteSettings->site_favicon_path) }}">
    @endif
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        :root {
            --bs-primary: {{ $siteSettings->primary_color ?? '#9e5a59' }};
            --bs-primary-rgb: 158, 90, 89;
            --brand-primary: {{ $siteSettings->primary_color ?? '#9e5a59' }};
            --brand-secondary: {{ $siteSettings->secondary_color ?? '#000000' }};
        }
        
        .btn-primary {
            background-color: var(--brand-primary) !important;
            border-color: var(--brand-primary) !important;
        }
        
        .btn-primary:hover {
            background-color: #8a4f4e !important;
            border-color: #8a4f4e !important;
        }
        
        .btn-outline-primary {
            color: var(--brand-primary) !important;
            border-color: var(--brand-primary) !important;
        }
        
        .btn-outline-primary:hover {
            background-color: var(--brand-primary) !important;
            border-color: var(--brand-primary) !important;
            color: white !important;
        }
        
        .text-primary {
            color: var(--brand-primary) !important;
        }
        
        .bg-primary {
            background-color: var(--brand-primary) !important;
        }
        
        .navbar-brand img {
            max-height: 50px;
        }
        
        .navbar {
            box-shadow: 0 2px 4px rgba(0,0,0,0.08);
        }
    </style>
    
    @stack('styles')
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="/">
                @if(!empty($siteSettings?->site_logo_path))
                    <img src="{{ Storage::url($siteSettings->site_logo_path) }}" alt="{{ $siteSettings->site_name ?? 'IESC' }}" class="me-2">
                @else
                    <span class="fw-bold fs-4">{{ $siteSettings->site_name ?? 'IESC' }}</span>
                @endif
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-lg-center">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active fw-semibold' : '' }}" href="/">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('programs.*') ? 'active fw-semibold' : '' }}" href="{{ route('programs.index') }}">Formations</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('admissions.*') ? 'active fw-semibold' : '' }}" href="{{ route('admissions.info') }}">Admission</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('careers') ? 'active fw-semibold' : '' }}" href="{{ route('careers') }}">Carrières</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('news.*') ? 'active fw-semibold' : '' }}" href="{{ route('news.index') }}">Actualités</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('contact') ? 'active fw-semibold' : '' }}" href="{{ route('contact') }}">Contact</a>
                    </li>
                    <li class="nav-item ms-lg-3">
                        <a href="{{ route('student.portal') }}" class="btn btn-sm btn-outline-dark">
                            <i class="bi bi-person-circle me-1"></i>
                            Espace Étudiant
                        </a>
                    </li>
                    <li class="nav-item ms-lg-2">
                        <a href="{{ route('admission.create') }}" class="btn btn-sm btn-primary text-white">
                            <i class="bi bi-file-earmark-text me-1"></i>
                            S'inscrire
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-white pt-5 pb-4">
        <div class="container">
            <div class="row g-4">
                <!-- À propos -->
                <div class="col-lg-4">
                    <h5 class="mb-3">{{ $siteSettings->site_name ?? 'IESC Université' }}</h5>
                    <p class="text-white-50">
                        {{ $siteSettings->footer_description ?? 'Institut d\'Enseignement Supérieur du Congo - Excellence académique et insertion professionnelle.' }}
                    </p>
                    <div class="d-flex gap-2 mt-3">
                        @if(!empty($siteSettings?->social_facebook_url))
                            <a href="{{ $siteSettings->social_facebook_url }}" target="_blank" class="btn btn-outline-light btn-sm rounded-circle" style="width: 40px; height: 40px; padding: 0; display: flex; align-items: center; justify-content: center;">
                                <i class="bi bi-facebook"></i>
                            </a>
                        @endif
                        @if(!empty($siteSettings?->social_linkedin_url))
                            <a href="{{ $siteSettings->social_linkedin_url }}" target="_blank" class="btn btn-outline-light btn-sm rounded-circle" style="width: 40px; height: 40px; padding: 0; display: flex; align-items: center; justify-content: center;">
                                <i class="bi bi-linkedin"></i>
                            </a>
                        @endif
                        @if(!empty($siteSettings?->social_instagram_url))
                            <a href="{{ $siteSettings->social_instagram_url }}" target="_blank" class="btn btn-outline-light btn-sm rounded-circle" style="width: 40px; height: 40px; padding: 0; display: flex; align-items: center; justify-content: center;">
                                <i class="bi bi-instagram"></i>
                            </a>
                        @endif
                        @if(!empty($siteSettings?->social_twitter_url))
                            <a href="{{ $siteSettings->social_twitter_url }}" target="_blank" class="btn btn-outline-light btn-sm rounded-circle" style="width: 40px; height: 40px; padding: 0; display: flex; align-items: center; justify-content: center;">
                                <i class="bi bi-twitter-x"></i>
                            </a>
                        @endif
                    </div>
                </div>
                
                <!-- Liens rapides -->
                <div class="col-lg-2 col-md-4">
                    <h6 class="mb-3">Liens rapides</h6>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="/" class="text-white-50 text-decoration-none">Accueil</a></li>
                        <li class="mb-2"><a href="{{ route('programs.index') }}" class="text-white-50 text-decoration-none">Formations</a></li>
                        <li class="mb-2"><a href="{{ route('admissions.info') }}" class="text-white-50 text-decoration-none">Admission</a></li>
                        <li class="mb-2"><a href="{{ route('careers') }}" class="text-white-50 text-decoration-none">Carrières</a></li>
                    </ul>
                </div>
                
                <!-- Ressources -->
                <div class="col-lg-2 col-md-4">
                    <h6 class="mb-3">Ressources</h6>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="{{ route('news.index') }}" class="text-white-50 text-decoration-none">Actualités</a></li>
                        <li class="mb-2"><a href="{{ route('student.portal') }}" class="text-white-50 text-decoration-none">Espace Étudiant</a></li>
                        <li class="mb-2"><a href="{{ route('contact') }}" class="text-white-50 text-decoration-none">Contact</a></li>
                    </ul>
                </div>
                
                <!-- Contact -->
                <div class="col-lg-4 col-md-4">
                    <h6 class="mb-3">Contact</h6>
                    <ul class="list-unstyled text-white-50">
                        <li class="mb-2">
                            <i class="bi bi-geo-alt me-2"></i>
                            {{ $siteSettings->contact_address ?? '112, Avenue de France, Poto-poto' }}
                        </li>
                        <li class="mb-2">
                            <i class="bi bi-telephone me-2"></i>
                            <a href="tel:{{ $siteSettings->contact_phone ?? '+242 06 541 98 91' }}" class="text-white-50 text-decoration-none">
                                {{ $siteSettings->contact_phone ?? '+242 06 541 98 91' }}
                            </a>
                        </li>
                        <li class="mb-2">
                            <i class="bi bi-envelope me-2"></i>
                            <a href="mailto:{{ $siteSettings->contact_email ?? 'contact@iesc.cg' }}" class="text-white-50 text-decoration-none">
                                {{ $siteSettings->contact_email ?? 'contact@iesc.cg' }}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            
            <hr class="my-4 border-secondary">
            
            <div class="row">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-0 text-white-50 small">
                        &copy; {{ date('Y') }} {{ $siteSettings->site_name ?? 'IESC' }}. Tous droits réservés.
                    </p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <p class="mb-0 text-white-50 small">
                        Développé avec <i class="bi bi-heart-fill text-danger"></i> au Congo
                    </p>
                </div>
            </div>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>
