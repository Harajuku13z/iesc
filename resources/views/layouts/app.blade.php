<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', $siteSettings->site_name ?? 'IESC')</title>
    <meta name="description" content="@yield('description', 'Institut d\'Enseignement Supérieur du Congo')">
    
    @if(!empty($siteSettings?->site_favicon_path))
        <link rel="icon" href="{{ Storage::url($siteSettings->site_favicon_path) }}">
    @endif
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    @stack('styles')
</head>
<body>
    <!-- Navbar Harvard Style -->
    <nav class="navbar navbar-expand-lg navbar-harvard sticky-top">
        <div class="container-harvard">
            <a class="navbar-brand" href="/">
                @if(!empty($siteSettings?->site_logo_path))
                    <img src="{{ Storage::url($siteSettings->site_logo_path) }}" alt="IESC" style="height: 45px;">
                @else
                    {{ $siteSettings->site_name ?? 'IESC' }}
                @endif
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-lg-center">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="/">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('programs.*') ? 'active' : '' }}" href="{{ route('programs.index') }}">Formations</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('admissions.*') ? 'active' : '' }}" href="{{ route('admissions.info') }}">Admission</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('careers') ? 'active' : '' }}" href="{{ route('careers') }}">Carrières</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('news.*') ? 'active' : '' }}" href="{{ route('news.index') }}">Actualités</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Contact</a>
                    </li>
                    <li class="nav-item ms-lg-2">
                        <a href="{{ route('student.portal') }}" class="btn btn-sm btn-outline-dark rounded-0">
                            Espace Étudiant
                        </a>
                    </li>
                    <li class="nav-item ms-lg-2">
                        <a href="{{ route('admission.create') }}" class="btn btn-sm btn-primary rounded-0 text-white">
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

    <!-- Footer Harvard Style -->
    <footer class="footer-harvard">
        <div class="container-harvard">
            <div class="row g-5">
                <div class="col-lg-4">
                    <h6>{{ $siteSettings->site_name ?? 'IESC' }}</h6>
                    <p style="color: rgba(255,255,255,0.7); font-size: 0.9375rem; line-height: 1.6;">
                        {{ $siteSettings->footer_description ?? 'Institut d\'Enseignement Supérieur du Congo - Excellence académique et insertion professionnelle.' }}
                    </p>
                </div>
                
                <div class="col-lg-2 col-md-4">
                    <h6>Liens</h6>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="/">Accueil</a></li>
                        <li class="mb-2"><a href="{{ route('programs.index') }}">Formations</a></li>
                        <li class="mb-2"><a href="{{ route('admissions.info') }}">Admission</a></li>
                        <li class="mb-2"><a href="{{ route('careers') }}">Carrières</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-2 col-md-4">
                    <h6>Ressources</h6>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="{{ route('news.index') }}">Actualités</a></li>
                        <li class="mb-2"><a href="{{ route('student.portal') }}">Espace Étudiant</a></li>
                        <li class="mb-2"><a href="{{ route('contact') }}">Contact</a></li>
                        <li class="mb-2"><a href="/admin">Administration</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-4 col-md-4">
                    <h6>Contact</h6>
                    <ul class="list-unstyled">
                        <li class="mb-2" style="color: rgba(255,255,255,0.7);">
                            {{ $siteSettings->contact_address ?? '112, Avenue de France, Poto-poto' }}
                        </li>
                        <li class="mb-2">
                            <a href="tel:{{ $siteSettings->contact_phone ?? '+242065419891' }}">
                                {{ $siteSettings->contact_phone ?? '+242 06 541 98 91' }}
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="mailto:{{ $siteSettings->contact_email ?? 'contact@iesc.cg' }}">
                                {{ $siteSettings->contact_email ?? 'contact@iesc.cg' }}
                            </a>
                        </li>
                    </ul>
                    
                    @if(!empty($siteSettings?->social_facebook_url) || !empty($siteSettings?->social_linkedin_url))
                        <div class="mt-3">
                            @if(!empty($siteSettings?->social_facebook_url))
                                <a href="{{ $siteSettings->social_facebook_url }}" target="_blank" class="text-white me-3">
                                    <i class="bi bi-facebook" style="font-size: 1.25rem;"></i>
                                </a>
                            @endif
                            @if(!empty($siteSettings?->social_linkedin_url))
                                <a href="{{ $siteSettings->social_linkedin_url }}" target="_blank" class="text-white me-3">
                                    <i class="bi bi-linkedin" style="font-size: 1.25rem;"></i>
                                </a>
                            @endif
                            @if(!empty($siteSettings?->social_instagram_url))
                                <a href="{{ $siteSettings->social_instagram_url }}" target="_blank" class="text-white me-3">
                                    <i class="bi bi-instagram" style="font-size: 1.25rem;"></i>
                                </a>
                            @endif
                        </div>
                    @endif
                </div>
            </div>
            
            <div class="footer-harvard-bottom">
                <div class="row">
                    <div class="col-md-6">
                        <p class="mb-0" style="font-size: 0.875rem; color: rgba(255,255,255,0.6);">
                            © {{ date('Y') }} {{ $siteSettings->site_name ?? 'IESC' }}. Tous droits réservés.
                        </p>
                    </div>
                    <div class="col-md-6 text-md-end mt-2 mt-md-0">
                        <p class="mb-0" style="font-size: 0.875rem; color: rgba(255,255,255,0.6);">
                            Brazzaville, Congo
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>
