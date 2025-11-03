<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'IESC')</title>
    <meta name="description" content="@yield('description', 'Institut d\'Enseignement Supérieur du Congo')">
    
    @if(!empty($siteSettings?->site_favicon_path))
        <link rel="icon" href="{{ Storage::url($siteSettings->site_favicon_path) }}">
    @endif
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    @stack('styles')
</head>
<body style="background: #fff;">
    <!-- NAVBAR COMPLÈTEMENT REFAITE -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
            <div class="container">
                <!-- Logo -->
                <a class="navbar-brand d-flex align-items-center" href="/">
                    @if(!empty($siteSettings?->site_logo_path))
                        <img src="{{ Storage::url($siteSettings->site_logo_path) }}" alt="IESC" style="height: 50px; width: auto;">
                    @else
                        <span style="font-size: 1.75rem; font-weight: 700; color: #000;">IESC</span>
                    @endif
                </a>
                
                <!-- Burger Menu -->
                <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <!-- Menu Items -->
                <div class="collapse navbar-collapse" id="navbarContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-lg-center">
                        <li class="nav-item">
                            <a class="nav-link px-3 {{ request()->routeIs('home') ? 'active' : '' }}" 
                               style="color: #000; font-weight: {{ request()->routeIs('home') ? '600' : '400' }};"
                               href="/">
                                Accueil
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-3 {{ request()->routeIs('programs.*') ? 'active' : '' }}" 
                               style="color: #000; font-weight: {{ request()->routeIs('programs.*') ? '600' : '400' }};"
                               href="{{ route('programs.index') }}">
                                Formations
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-3 {{ request()->routeIs('admissions.*') ? 'active' : '' }}" 
                               style="color: #000; font-weight: {{ request()->routeIs('admissions.*') ? '600' : '400' }};"
                               href="{{ route('admissions.info') }}">
                                Admission
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-3 {{ request()->routeIs('careers') ? 'active' : '' }}" 
                               style="color: #000; font-weight: {{ request()->routeIs('careers') ? '600' : '400' }};"
                               href="{{ route('careers') }}">
                                Carrières
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-3 {{ request()->routeIs('news.*') ? 'active' : '' }}" 
                               style="color: #000; font-weight: {{ request()->routeIs('news.*') ? '600' : '400' }};"
                               href="{{ route('news.index') }}">
                                Actualités
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-3 {{ request()->routeIs('contact') ? 'active' : '' }}" 
                               style="color: #000; font-weight: {{ request()->routeIs('contact') ? '600' : '400' }};"
                               href="{{ route('contact') }}">
                                Contact
                            </a>
                        </li>
                        <li class="nav-item ms-lg-3">
                            <a href="{{ route('student.portal') }}" 
                               class="btn btn-outline-dark btn-sm"
                               style="border-width: 2px; font-weight: 500;">
                                Espace Étudiant
                            </a>
                        </li>
                        <li class="nav-item ms-lg-2">
                            <a href="{{ route('admission.create') }}" 
                               class="btn btn-sm text-white"
                               style="background: #9e5a59; border: none; font-weight: 500;">
                                S'inscrire
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main style="min-height: calc(100vh - 400px);">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-white pt-5 pb-4 mt-5">
        <div class="container">
            <div class="row g-4 mb-4">
                <div class="col-lg-4">
                    <h5 class="mb-3" style="font-size: 1.125rem; font-weight: 600;">IESC</h5>
                    <p style="color: rgba(255,255,255,0.7); line-height: 1.7; font-size: 0.95rem;">
                        {{ $siteSettings->footer_description ?? 'Institut d\'Enseignement Supérieur du Congo - Excellence académique.' }}
                    </p>
                </div>
                
                <div class="col-lg-2 col-md-4">
                    <h6 class="mb-3" style="font-size: 0.875rem; font-weight: 600; text-transform: uppercase; letter-spacing: 1px;">Liens</h6>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="/" class="text-decoration-none" style="color: rgba(255,255,255,0.7); font-size: 0.9375rem;">Accueil</a></li>
                        <li class="mb-2"><a href="{{ route('programs.index') }}" class="text-decoration-none" style="color: rgba(255,255,255,0.7); font-size: 0.9375rem;">Formations</a></li>
                        <li class="mb-2"><a href="{{ route('admissions.info') }}" class="text-decoration-none" style="color: rgba(255,255,255,0.7); font-size: 0.9375rem;">Admission</a></li>
                        <li class="mb-2"><a href="{{ route('contact') }}" class="text-decoration-none" style="color: rgba(255,255,255,0.7); font-size: 0.9375rem;">Contact</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-2 col-md-4">
                    <h6 class="mb-3" style="font-size: 0.875rem; font-weight: 600; text-transform: uppercase; letter-spacing: 1px;">Ressources</h6>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="{{ route('news.index') }}" class="text-decoration-none" style="color: rgba(255,255,255,0.7); font-size: 0.9375rem;">Actualités</a></li>
                        <li class="mb-2"><a href="{{ route('student.portal') }}" class="text-decoration-none" style="color: rgba(255,255,255,0.7); font-size: 0.9375rem;">Portail Étudiant</a></li>
                        <li class="mb-2"><a href="/admin" class="text-decoration-none" style="color: rgba(255,255,255,0.7); font-size: 0.9375rem;">Administration</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-4 col-md-4">
                    <h6 class="mb-3" style="font-size: 0.875rem; font-weight: 600; text-transform: uppercase; letter-spacing: 1px;">Contact</h6>
                    <ul class="list-unstyled" style="color: rgba(255,255,255,0.7); font-size: 0.9375rem;">
                        <li class="mb-2">
                            <i class="bi bi-geo-alt me-2"></i>
                            {{ $siteSettings->contact_address ?? '112, Avenue de France, Poto-poto' }}
                        </li>
                        <li class="mb-2">
                            <i class="bi bi-telephone me-2"></i>
                            <a href="tel:{{ str_replace(' ', '', $siteSettings->contact_phone ?? '+242065419891') }}" class="text-decoration-none" style="color: rgba(255,255,255,0.7);">
                                {{ $siteSettings->contact_phone ?? '+242 06 541 98 91' }}
                            </a>
                        </li>
                        <li class="mb-2">
                            <i class="bi bi-envelope me-2"></i>
                            <a href="mailto:{{ $siteSettings->contact_email ?? 'contact@iesc.cg' }}" class="text-decoration-none" style="color: rgba(255,255,255,0.7);">
                                {{ $siteSettings->contact_email ?? 'contact@iesc.cg' }}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            
            <hr style="border-color: #333; margin: 2rem 0;">
            
            <div class="row">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-0 small" style="color: rgba(255,255,255,0.5);">
                        © {{ date('Y') }} IESC. Tous droits réservés.
                    </p>
                </div>
                <div class="col-md-6 text-center text-md-end mt-2 mt-md-0">
                    <p class="mb-0 small" style="color: rgba(255,255,255,0.5);">
                        Brazzaville, République du Congo
                    </p>
                </div>
            </div>
        </div>
    </footer>

    @stack('scripts')
    
    <!-- Bootstrap JS forcé -->
    <script>
        // S'assurer que Bootstrap est chargé
        document.addEventListener('DOMContentLoaded', function() {
            console.log('Page chargée - Menu devrait être visible');
        });
    </script>
</body>
</html>
