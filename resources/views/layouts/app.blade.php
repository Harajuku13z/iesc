<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', $siteSettings->site_name ?? 'IESC Université')</title>
    <meta name="description" content="@yield('description', 'Bienvenue...')" />
    @if (!empty($siteSettings?->site_favicon_path))
        <link rel="icon" href="{{ Storage::url($siteSettings->site_favicon_path) }}" />
    @endif
    @vite(['resources/css/app.css','resources/js/app.js'])
    <style>
        :root {
            --brand-primary: {{ $siteSettings->primary_color ?? '#9e5a59' }};
            --brand-secondary: {{ $siteSettings->secondary_color ?? '#000000' }};
            /* Map brand to legacy variables used in CSS */
            --primary-color: var(--brand-primary);
            --primary-light: var(--brand-secondary);
            --primary-dark: var(--brand-primary);
            --secondary-color: var(--brand-secondary);
        }
        /* Utilitaires simples */
        .bg-brand { background-color: var(--brand-primary); }
        .text-brand { color: var(--brand-primary); }
        .border-brand { border-color: var(--brand-primary); }
        /* Hero collé au header */
        main > .hero-section { margin-top: 0; }
        /* Footer CSS propre (sans Tailwind) */
        .site-footer { background:#ffffff; color:#334155; }
        .site-footer .container { max-width:1200px; margin:0 auto; padding:80px 16px; }
        .site-footer .grid { display:grid; grid-template-columns: 1fr; gap:40px; }
        @media (min-width: 768px) { .site-footer .grid { grid-template-columns: 1fr 1fr 1fr 1.5fr; } }
        .site-footer .brand { display:flex; align-items:center; gap:12px; margin-bottom:16px; }
        .site-footer .brand img { height:48px; width:auto; }
        .site-footer .text-muted { font-size:14px; line-height:1.65; color:#64748b; margin:0; }
        .site-footer .links { list-style:none; padding:0; margin:0; }
        .site-footer .links li { margin:8px 0; }
        .site-footer .title { font-size:12px; letter-spacing:.08em; text-transform:uppercase; font-weight:700; color:#0f172a; margin:0 0 12px; }
        .site-footer a.link { color:#475569; text-decoration:none; transition:color .2s ease; }
        .site-footer a.link:hover { color: var(--brand-primary); }
        .site-footer .contact { list-style:none; padding:0; margin:0; }
        .site-footer .contact li { display:flex; align-items:flex-start; gap:8px; margin:10px 0; color:#475569; }
        .site-footer .icon { width:20px; height:20px; }
        .site-footer .bottom { border-top:1px solid #e5e7eb; background:#fff; }
        .site-footer .bottom-inner { max-width:1200px; margin:0 auto; padding:20px 16px; display:flex; align-items:center; justify-content:space-between; gap:16px; font-size:14px; color:#64748b; }
        .site-footer .socials { display:flex; gap:12px; margin-top:12px; }
        .site-footer .social-btn { width:40px; height:40px; display:inline-flex; align-items:center; justify-content:center; border-radius:9999px; background:#f1f5f9; color: var(--brand-primary); text-decoration:none; transition:background .2s ease; }
        .site-footer .social-btn:hover { background:#e2e8f0; }
    </style>
</head>
<body class="min-h-screen flex flex-col bg-white text-gray-900">

<header class="sticky top-0 z-50 bg-white border-b border-gray-100">
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between py-4">
            <a href="/" class="flex items-center gap-3">
                @if (!empty($siteSettings?->site_logo_path))
                    <img src="{{ Storage::url($siteSettings->site_logo_path) }}" alt="{{ $siteSettings->site_name }}" class="h-10 md:h-12 w-auto" />
                @else
                    <span class="text-lg font-semibold">{{ $siteSettings->site_name ?? 'IESC' }}</span>
                @endif
            </a>
            <nav class="hidden md:block" aria-label="Navigation principale">
                <ul class="flex items-center gap-6">
                    <li><a href="/" class="hover:text-brand transition">Accueil</a></li>
                    <li><a href="{{ route('programs.index') }}" class="hover:text-brand transition">Formations</a></li>
                    <li><a href="{{ route('admissions.info') }}" class="hover:text-brand transition">Admission</a></li>
                    <li><a href="{{ route('careers') }}" class="hover:text-brand transition">Carrières</a></li>
                    <li><a href="{{ route('news.index') }}" class="hover:text-brand transition">Actualités & Événements</a></li>
                    <li><a href="{{ route('contact') }}" class="hover:text-brand transition">Contact</a></li>
                    <li>
                        <a href="{{ route('student.portal') }}" class="inline-flex items-center rounded-full border-2 border-brand text-brand px-5 py-2.5 font-semibold shadow hover:opacity-90 transition">
                            Espace Étudiant
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admission.create') }}" class="inline-flex items-center rounded-full bg-brand text-white px-5 py-2.5 font-semibold shadow hover:opacity-90 transition">
                            Inscription
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>

<main class="flex-1 pt-0 pb-0">
    @if (session('success'))
        <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4">{{ session('success') }}</div>
    @endif
    @yield('content')
</main>
<footer class="site-footer">
    <div class="container">
        <div class="grid">
            <div>
                <div class="brand">
                    @if (!empty($siteSettings?->site_logo_path))
                        <img src="{{ Storage::url($siteSettings->site_logo_path) }}" alt="{{ $siteSettings->site_name }}" />
                    @endif
                </div>
                <p class="text-muted">{{ $siteSettings->footer_text ?? "Institut d'Enseignement Supérieur du Commerce" }}</p>
                <div class="socials">
                    @if (!empty($siteSettings?->social_facebook_url))
                        <a href="{{ $siteSettings->social_facebook_url }}" target="_blank" class="social-btn" aria-label="Facebook">
                            <svg class="icon" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M22 12.06C22 6.48 17.52 2 11.94 2S2 6.48 2 12.06c0 5.02 3.66 9.19 8.44 9.94v-7.03H7.9v-2.91h2.54V9.41c0-2.5 1.49-3.88 3.77-3.88 1.09 0 2.23.2 2.23.2v2.45h-1.26c-1.24 0-1.63.77-1.63 1.56v1.87h2.78l-.44 2.91h-2.34V22c4.78-.75 8.44-4.92 8.44-9.94Z"/></svg>
                        </a>
                    @endif
                    @if (!empty($siteSettings?->social_linkedin_url))
                        <a href="{{ $siteSettings->social_linkedin_url }}" target="_blank" class="social-btn" aria-label="LinkedIn">
                            <svg class="icon" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M4.98 3.5C4.98 4.88 3.85 6 2.5 6S0 4.88 0 3.5 1.12 1 2.5 1s2.48 1.12 2.48 2.5zM.5 8h4V23h-4V8zm7.5 0h3.8v2.05h.05c.53-1 1.83-2.05 3.77-2.05 4.03 0 4.78 2.65 4.78 6.1V23h-4v-7.12c0-1.7-.03-3.88-2.37-3.88-2.37 0-2.73 1.85-2.73 3.76V23h-4V8z"/></svg>
                        </a>
                    @endif
                    @if (!empty($siteSettings?->social_instagram_url))
                        <a href="{{ $siteSettings->social_instagram_url }}" target="_blank" class="social-btn" aria-label="Instagram">
                            <svg class="icon" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M7 2h10a5 5 0 0 1 5 5v10a5 5 0 0 1-5 5H7a5 5 0 0 1-5-5V7a5 5 0 0 1 5-5zm0 2a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3V7a3 3 0 0 0-3-3H7zm5 3.5a6.5 6.5 0 1 1 0 13 6.5 6.5 0 0 1 0-13zm0 2a4.5 4.5 0 1 0 0 9 4.5 4.5 0 0 0 0-9zM18 6.5a1.25 1.25 0 1 1 0 2.5 1.25 1.25 0 0 1 0-2.5z"/></svg>
                        </a>
                    @endif
                    @if (!empty($siteSettings?->social_twitter_url))
                        <a href="{{ $siteSettings->social_twitter_url }}" target="_blank" class="social-btn" aria-label="Twitter">
                            <svg class="icon" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M19.633 7.997c.013.177.013.355.013.532 0 5.41-4.118 11.644-11.644 11.644-2.315 0-4.465-.677-6.273-1.843.322.039.63.052.965.052a8.24 8.24 0 0 0 5.11-1.76 4.12 4.12 0 0 1-3.847-2.856c.25.039.5.065.764.065.368 0 .736-.052 1.079-.14A4.114 4.114 0 0 1 2.8 9.5v-.052c.552.303 1.191.49 1.87.516a4.107 4.107 0 0 1-1.833-3.42c0-.764.203-1.47.558-2.084a11.69 11.69 0 0 0 8.482 4.3 4.633 4.633 0 0 1-.103-.944 4.11 4.11 0 0 1 7.11-2.807 8.09 8.09 0 0 0 2.607-.993 4.13 4.13 0 0 1-1.806 2.266 8.23 8.23 0 0 0 2.366-.645 8.84 8.84 0 0 1-2.028 2.1z"/></svg>
                        </a>
                    @endif
                </div>
            </div>
            <div>
                <h3 class="title">Menu</h3>
                <ul class="links">
                    <li><a class="link" href="/">Accueil</a></li>
                    <li><a class="link" href="{{ route('programs.index') }}">Formations</a></li>
                    <li><a class="link" href="{{ route('admissions.info') }}">Admission</a></li>
                    <li><a class="link" href="{{ route('careers') }}">Carrières</a></li>
                    <li><a class="link" href="{{ route('news.index') }}">Actualités & Événements</a></li>
                    <li><a class="link" href="{{ route('contact') }}">Contact</a></li>
                </ul>
            </div>
            <div>
                <h3 class="title">Étudiants</h3>
                <ul class="links">
                    <li><a class="link" href="{{ route('student.portal') }}">Espace Étudiant</a></li>
                    <li><a class="link" href="{{ route('admission.create') }}">Inscription</a></li>
                    <li><a class="link" href="{{ route('programs.index') }}#licence">Licences</a></li>
                    <li><a class="link" href="{{ route('programs.index') }}#master">Masters</a></li>
                </ul>
            </div>
            <div>
                <h3 class="title">Contact</h3>
                <ul class="contact">
                    <li><x-heroicon-o-envelope class="icon" /><a class="link" href="mailto:{{ $siteSettings->contact_email ?? 'contact@iesc.cg' }}">{{ $siteSettings->contact_email ?? 'contact@iesc.cg' }}</a></li>
                    <li><x-heroicon-o-phone class="icon" /><a class="link" href="tel:{{ preg_replace('/\s+/', '', $siteSettings->contact_phone ?? '+242065419861') }}">{{ $siteSettings->contact_phone ?? '+242 06 541 98 61' }}</a></li>
                    <li><x-heroicon-o-map-pin class="icon" /><span>{{ $siteSettings->contact_address ?? '112, Avenue de France Plateau' }}</span></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="bottom">
        <div class="bottom-inner">
            <div>&copy; {{ date('Y') }} {{ $siteSettings->site_name ?? 'IESC' }}. Tous droits réservés.</div>
            <div style="display:flex;gap:24px;">
                <a class="link" href="/mentions-legales">Mentions légales</a>
                <a class="link" href="/politique-de-confidentialite">Politique de confidentialité</a>
                <a class="link" href="/conditions-dutilisation">Conditions d'utilisation</a>
            </div>
        </div>
    </div>
</footer>
</body>
</html>
