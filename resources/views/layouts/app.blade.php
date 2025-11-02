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
    
    <style>
        /* Override Bootstrap with Harvard exact styling */
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            font-size: 16px;
            line-height: 1.6;
            color: #000;
        }
        
        .navbar {
            border-bottom: 1px solid #e5e5e5;
            background: #fff !important;
            padding: 1rem 0;
        }
        
        .navbar-brand {
            font-weight: 600;
            color: #000 !important;
            font-size: 1.5rem;
        }
        
        .navbar-brand img {
            height: 45px;
        }
        
        .nav-link {
            color: #000 !important;
            font-weight: 400;
            font-size: 0.9375rem;
            padding: 0.5rem 1rem !important;
        }
        
        .nav-link:hover,
        .nav-link.active {
            color: var(--brand-primary, #9e5a59) !important;
        }
        
        .btn-primary {
            background: var(--brand-primary, #9e5a59) !important;
            border: none !important;
            border-radius: 0 !important;
            font-weight: 500;
            font-size: 0.875rem;
            padding: 0.5rem 1.25rem !important;
        }
        
        .btn-primary:hover {
            opacity: 0.9;
        }
        
        .btn-outline-dark {
            border-radius: 0 !important;
            font-weight: 500;
            font-size: 0.875rem;
        }
        
        footer {
            background: #000;
            color: #fff;
            font-size: 0.9375rem;
        }
        
        footer h6 {
            font-size: 0.875rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 1.25rem;
        }
        
        footer a {
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            transition: color 0.2s;
        }
        
        footer a:hover {
            color: #fff;
        }
        
        .container {
            max-width: 1200px;
        }
    </style>
    
    @stack('styles')
</head>
<body>
    <!-- Top Navbar - Harvard Style VISIBLE -->
    <nav class="navbar navbar-expand-lg bg-white border-bottom sticky-top" style="border-color: #e5e5e5 !important;">
        <div class="container">
            <a class="navbar-brand fw-semibold" href="/" style="color: #000 !important; font-size: 1.5rem;">
                @if(!empty($siteSettings?->site_logo_path))
                    <img src="{{ Storage::url($siteSettings->site_logo_path) }}" alt="IESC" style="height: 45px;">
                @else
                    IESC
                @endif
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav" style="border: 1px solid #000 !important;">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="mainNav">
                <ul class="navbar-nav ms-auto align-items-lg-center">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'fw-semibold' : '' }}" 
                           href="/" 
                           style="color: #000 !important; font-size: 0.9375rem;">
                            Accueil
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('programs.*') ? 'fw-semibold' : '' }}" 
                           href="{{ route('programs.index') }}"
                           style="color: #000 !important; font-size: 0.9375rem;">
                            Formations
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('admissions.*') ? 'fw-semibold' : '' }}" 
                           href="{{ route('admissions.info') }}"
                           style="color: #000 !important; font-size: 0.9375rem;">
                            Admission
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('careers') ? 'fw-semibold' : '' }}" 
                           href="{{ route('careers') }}"
                           style="color: #000 !important; font-size: 0.9375rem;">
                            Carrières
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('news.*') ? 'fw-semibold' : '' }}" 
                           href="{{ route('news.index') }}"
                           style="color: #000 !important; font-size: 0.9375rem;">
                            Actualités
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('contact') ? 'fw-semibold' : '' }}" 
                           href="{{ route('contact') }}"
                           style="color: #000 !important; font-size: 0.9375rem;">
                            Contact
                        </a>
                    </li>
                    <li class="nav-item ms-lg-3">
                        <a href="{{ route('student.portal') }}" 
                           class="btn btn-sm btn-outline-dark"
                           style="border-radius: 0; font-size: 0.875rem; border-width: 2px; color: #000 !important;">
                            Espace Étudiant
                        </a>
                    </li>
                    <li class="nav-item ms-lg-2">
                        <a href="{{ route('admission.create') }}" 
                           class="btn btn-sm text-white"
                           style="background: var(--brand-primary, #9e5a59) !important; border: none; border-radius: 0; font-size: 0.875rem;">
                            S'inscrire
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <!-- Footer - Harvard Black Style -->
    <footer class="pt-5 pb-4">
        <div class="container">
            <div class="row g-4 mb-4">
                <div class="col-lg-4">
                    <h6>IESC</h6>
                    <p style="color: rgba(255,255,255,0.7); line-height: 1.6;">
                        {{ $siteSettings->footer_description ?? 'Institut d\'Enseignement Supérieur du Congo' }}
                    </p>
                </div>
                
                <div class="col-lg-2 col-md-4">
                    <h6>Liens</h6>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="/">Accueil</a></li>
                        <li class="mb-2"><a href="{{ route('programs.index') }}">Formations</a></li>
                        <li class="mb-2"><a href="{{ route('admissions.info') }}">Admission</a></li>
                        <li class="mb-2"><a href="{{ route('contact') }}">Contact</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-2 col-md-4">
                    <h6>Ressources</h6>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="{{ route('news.index') }}">Actualités</a></li>
                        <li class="mb-2"><a href="{{ route('student.portal') }}">Portail Étudiant</a></li>
                        <li class="mb-2"><a href="/admin">Administration</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-4 col-md-4">
                    <h6>Contact</h6>
                    <ul class="list-unstyled" style="color: rgba(255,255,255,0.7);">
                        <li class="mb-2">{{ $siteSettings->contact_address ?? '112, Avenue de France, Poto-poto' }}</li>
                        <li class="mb-2"><a href="tel:{{ str_replace(' ', '', $siteSettings->contact_phone ?? '+242065419891') }}">{{ $siteSettings->contact_phone ?? '+242 06 541 98 91' }}</a></li>
                        <li class="mb-2"><a href="mailto:{{ $siteSettings->contact_email ?? 'contact@iesc.cg' }}">{{ $siteSettings->contact_email ?? 'contact@iesc.cg' }}</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="pt-4 mt-4" style="border-top: 1px solid #333;">
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
        </div>
    </footer>

    @stack('scripts')
</body>
</html>
