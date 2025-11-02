@extends('layouts.app')

@section('title', 'IESC : Votre tremplin vers l\'emploi.')
@section('description', 'Formez-vous aux métiers d\'avenir en Droit, Gestion et Informatique. Inscriptions en cours.')

@push('styles')
<style>
    /* Hero Section - Modern Gradient with Animation */
    .hero-section {
        position: relative;
        min-height: 100vh;
        display: flex;
        align-items: center;
        overflow: hidden;
    }
    
    .hero-background {
        position: absolute;
        inset: 0;
        z-index: 0;
    }
    
    .hero-bg-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    
    .hero-overlay {
        position: absolute;
        inset: 0;
        background-color: rgba(0, 0, 0, 0.5);
    }
    
    .hero-content {
        position: relative;
        z-index: 10;
        width: 100%;
        padding: 2rem 0;
    }
    
    .hero-title {
        font-size: clamp(2.5rem, 5vw, 4.5rem);
        font-weight: 800;
        line-height: 1.1;
        margin-bottom: 1.5rem;
        color: white;
        text-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
        animation: fadeInUp 0.8s ease-out;
    }
    
    .hero-subtitle {
        font-size: clamp(1.1rem, 2.5vw, 1.4rem);
        color: rgba(255, 255, 255, 0.9);
        margin-bottom: 2.5rem;
        max-width: 600px;
        margin-left: auto;
        margin-right: auto;
        line-height: 1.6;
        animation: fadeInUp 0.8s ease-out 0.2s both;
    }
    
    .hero-actions {
        display: flex;
        gap: 1rem;
        justify-content: center;
        flex-wrap: wrap;
        animation: fadeInUp 0.8s ease-out 0.4s both;
    }
    
    .hero-btn {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 1rem 2rem;
        border-radius: 12px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
        font-size: 1.1rem;
    }
    
    .hero-btn-primary {
        background: white;
        color: var(--brand-primary);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    }
    
    .hero-btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 35px rgba(0, 0, 0, 0.2);
        color: var(--brand-primary);
    }
    
    .hero-btn-secondary {
        background: rgba(255, 255, 255, 0.1);
        color: white;
        border: 2px solid rgba(255, 255, 255, 0.3);
        backdrop-filter: blur(10px);
    }
    
    .hero-btn-secondary:hover {
        background: rgba(255, 255, 255, 0.2);
        border-color: rgba(255, 255, 255, 0.5);
        color: white;
    }
    
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    /* Features Section */
    .features-section {
        padding: 6rem 0;
        background: #f8fafc;
    }
    
    .features-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
        margin-top: 3rem;
    }
    
    .feature-card {
        background: white;
        padding: 2rem;
        border-radius: 20px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
        transition: all 0.3s ease;
        text-align: center;
    }
    
    .feature-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.12);
    }
    
    .feature-icon {
        width: 80px;
        height: 80px;
        margin: 0 auto 1.5rem;
        display: flex;
        align-items: center;
        justify-content: center;
        background: var(--brand-primary);
        border-radius: 12px;
    }
    
    .feature-icon svg {
        color: white !important;
    }
    
    .feature-content h3 {
        font-size: 1.1rem;
        font-weight: 600;
        color: #1e293b;
        margin-bottom: 0.5rem;
    }
    
    .feature-content p {
        color: #64748b;
        font-size: 0.95rem;
    }
    
    .about-image {
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.12);
        height: auto; /* use global aspect-ratio from site.css */
    }
    
    .about-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    
    .image-placeholder {
        width: 100%;
        height: 100%;
        background: var(--brand-primary);
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    /* Programs Section - Card Grid */
    .programs-section {
        padding: 6rem 0;
        background: #f8fafc;
    }
    
    .section-header {
        text-align: center;
        margin-bottom: 4rem;
    }
    
    .section-header h2 {
        font-size: 2.5rem;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 1rem;
    }
    
    .section-header p {
        font-size: 1.1rem;
        color: #64748b;
    }
    
    .programs-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
        gap: 2rem;
        margin-bottom: 3rem;
    }
    
    .program-card {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
        transition: all 0.3s ease;
        opacity: 0;
    }
    
    .program-card.animate-in {
        animation: fadeInUp 0.6s ease-out forwards;
    }
    
    .program-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.12);
    }
    
    .program-image {
        height: 200px;
        background: var(--brand-primary);
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        overflow: hidden;
    }
    
    .program-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    
    .program-content {
        padding: 2rem;
    }
    
    .program-content h3 {
        font-size: 1.3rem;
        font-weight: 600;
        color: #1e293b;
        margin-bottom: 1rem;
    }
    
    .program-content p {
        color: #64748b;
        line-height: 1.6;
        margin-bottom: 1.5rem;
    }
    
    .program-btn {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.75rem 1.5rem;
        background: var(--brand-primary);
        color: white;
        text-decoration: none;
        border-radius: 8px;
        font-weight: 600;
        transition: all 0.3s ease;
    }
    
    .program-btn:hover {
        background: #8a4f4e;
        transform: translateY(-2px);
        color: white;
    }
    
    /* Stats Section */
    .stats-section {
        background: var(--brand-primary);
        color: white;
        padding: 6rem 0;
    }
    
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 3rem;
        text-align: center;
    }
    
    .stat-item h3 {
        font-size: 3.5rem;
        font-weight: 800;
        margin-bottom: 0.5rem;
        color: white;
    }
    
    .stat-item p {
        font-size: 1.1rem;
        opacity: 0.9;
    }
    
    /* CTA Section */
    .cta-section {
        background: linear-gradient(135deg, var(--brand-primary) 0%, #8a4f4e 100%);
        color: white;
        padding: 6rem 0;
        text-align: center;
    }
    
    .cta-content h2 {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 1.5rem;
    }
    
    .cta-content p {
        font-size: 1.2rem;
        margin-bottom: 2.5rem;
        opacity: 0.9;
        max-width: 600px;
        margin-left: auto;
        margin-right: auto;
    }
    
    .cta-actions {
        display: flex;
        gap: 1rem;
        justify-content: center;
        flex-wrap: wrap;
    }
    
    .cta-btn {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 1rem 2rem;
        border-radius: 12px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
        font-size: 1.1rem;
    }
    
    .cta-btn-primary {
        background: white;
        color: var(--brand-primary);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    }
    
    .cta-btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 35px rgba(0, 0, 0, 0.2);
        color: var(--brand-primary);
    }
    
    .cta-btn-secondary {
        background: rgba(255, 255, 255, 0.1);
        color: white;
        border: 2px solid rgba(255, 255, 255, 0.3);
        backdrop-filter: blur(10px);
    }
    
    .cta-btn-secondary:hover {
        background: rgba(255, 255, 255, 0.2);
        border-color: rgba(255, 255, 255, 0.5);
        color: white;
    }
    
    /* Responsive Design */
    @media (max-width: 768px) {
        .hero-title {
            font-size: 2.5rem;
        }
        
        .hero-subtitle {
            font-size: 1.1rem;
        }
        
        .hero-actions {
            flex-direction: column;
            align-items: center;
        }
        
        .hero-btn {
            width: 100%;
            max-width: 300px;
            justify-content: center;
        }
        
        .features-grid {
            grid-template-columns: 1fr;
        }
        
        .programs-grid {
            grid-template-columns: 1fr;
        }
        
        .stats-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 2rem;
        }
        
        .cta-actions {
            flex-direction: column;
            align-items: center;
        }
        
        .cta-btn {
            width: 100%;
            max-width: 300px;
            justify-content: center;
        }
    }
</style>
@endpush

@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="hero-background">
        @if(!empty($siteSettings?->home_hero_image))
            <img src="{{ Storage::url($siteSettings->home_hero_image) }}" alt="Hero Background" class="hero-bg-image">
        @else
            <div class="hero-bg-image" style="background: linear-gradient(135deg, var(--brand-primary) 0%, #8a4f4e 100%);"></div>
        @endif
        <div class="hero-overlay"></div>
    </div>

    <div class="hero-content">
        <div class="container mx-auto px-4">
            <div class="text-center">
                <h1 class="hero-title">
                    {{ $siteSettings?->home_hero_title ?? 'IESC : Votre Tremplin vers l\'Excellence et l\'Emploi' }}
                </h1>
                <p class="hero-subtitle">
                    {{ $siteSettings?->home_hero_subtitle ?? 'Formez-vous aux métiers d\'avenir au Congo. Inscriptions 2025-2026 en cours !' }}
                </p>
                
                <div class="hero-actions">
                    <a href="{{ route('admissions.info') }}" class="hero-btn hero-btn-primary">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        S'inscrire maintenant
                    </a>
                    <a href="{{ route('programs.index') }}" class="hero-btn hero-btn-secondary">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25"></path>
                        </svg>
                        Découvrir nos formations
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="features-section">
    <div class="container mx-auto px-4">
        <div class="section-header">
            <h2>{{ $siteSettings?->home_features_title ?? 'Pourquoi choisir l\'IESC ?' }}</h2>
            <p>{{ $siteSettings?->home_features_subtitle ?? 'Découvrez les avantages qui font de l\'IESC votre meilleur choix' }}</p>
        </div>
        
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">
                    <x-heroicon-o-academic-cap class="w-8 h-8" />
                </div>
                <div class="feature-content">
                    <h3>Formation de qualité</h3>
                    <p>Programmes adaptés aux besoins du marché du travail</p>
                </div>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">
                    <x-heroicon-o-briefcase class="w-8 h-8" />
                </div>
                <div class="feature-content">
                    <h3>Insertion professionnelle</h3>
                    <p>95% de nos diplômés trouvent un emploi dans les 6 mois</p>
                </div>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">
                    <x-heroicon-o-user-group class="w-8 h-8" />
                </div>
                <div class="feature-content">
                    <h3>Encadrement personnalisé</h3>
                    <p>Classes à effectifs réduits pour un suivi optimal</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="text-3xl font-bold text-gray-900 mb-6">
                    {{ $siteSettings?->home_about_title ?? 'À propos de l\'IESC' }}
                </h2>
                <div class="space-y-4 text-gray-600">
                    <p>{{ $siteSettings?->home_about_text ?? 'L\'Institut d\'Enseignement Supérieur du Congo (IESC) est votre partenaire de confiance pour une formation de qualité et une insertion professionnelle réussie.' }}</p>
                    <p>{{ $siteSettings?->home_about_text_2 ?? 'Avec nos programmes adaptés aux besoins du marché, nos étudiants développent les compétences nécessaires pour exceller dans leur domaine.' }}</p>
                </div>
            </div>
            <div class="about-image">
                @if(!empty($siteSettings?->home_about_image))
                    <img src="{{ Storage::url($siteSettings->home_about_image) }}" 
                         alt="À propos de l'IESC" 
                         class="w-full h-auto object-contain rounded-lg shadow-lg">
                @else
                    <div class="image-placeholder flex items-center justify-center bg-gray-100 rounded-lg shadow-lg">
                        <x-heroicon-o-building-library class="w-16 h-16 text-primary" />
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- Programs Section -->
<section class="programs-section">
    <div class="container mx-auto px-4">
        <div class="section-header">
            <h2>{{ $siteSettings?->home_programs_title ?? 'Nos Formations' }}</h2>
            <p>{{ $siteSettings?->home_programs_subtitle ?? 'Découvrez nos programmes d\'excellence' }}</p>
        </div>
        
        <div class="programs-grid">
            @forelse($programs as $program)
                <div class="program-card">
                    <div class="program-image">
                        @if($program->image)
                            <img src="{{ Storage::url($program->image) }}" alt="{{ $program->title }}">
                        @else
                            <div class="w-full h-full flex items-center justify-center">
                                <x-heroicon-o-academic-cap class="w-16 h-16 text-white" />
                            </div>
                        @endif
                    </div>
                    <div class="program-content">
                        <h3>{{ $program->title }}</h3>
                        <p>{{ Str::limit($program->description, 150) }}</p>
                        <a href="{{ route('programs.show', $program) }}" class="program-btn">
                            En savoir plus
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            @empty
                <div class="program-card">
                    <div class="program-image">
                        <div class="w-full h-full flex items-center justify-center">
                            <x-heroicon-o-academic-cap class="w-16 h-16 text-white" />
                        </div>
                    </div>
                    <div class="program-content">
                        <h3>Licence en Sciences & Administration</h3>
                        <p>Formation complète en gestion et administration d'entreprise.</p>
                        <a href="#" class="program-btn">
                            En savoir plus
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>
                
                <div class="program-card">
                    <div class="program-image">
                        <div class="w-full h-full flex items-center justify-center">
                            <x-heroicon-o-computer-desktop class="w-16 h-16 text-white" />
                        </div>
                    </div>
                    <div class="program-content">
                        <h3>Licence en Informatique</h3>
                        <p>Développement web, mobile et systèmes d'information.</p>
                        <a href="#" class="program-btn">
                            En savoir plus
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>
                
                <div class="program-card">
                    <div class="program-image">
                        <div class="w-full h-full flex items-center justify-center">
                            <x-heroicon-o-scale class="w-16 h-16 text-white" />
                        </div>
                    </div>
                    <div class="program-content">
                        <h3>Licence en Droit</h3>
                        <p>Formation juridique complète et pratique professionnelle.</p>
                        <a href="#" class="program-btn">
                            En savoir plus
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>
                
                <div class="program-card">
                    <div class="program-image">
                        <div class="w-full h-full flex items-center justify-center">
                            <x-heroicon-o-chart-bar class="w-16 h-16 text-white" />
                        </div>
                    </div>
                    <div class="program-content">
                        <h3>Licence en Commerce</h3>
                        <p>Marketing, vente et gestion commerciale.</p>
                        <a href="#" class="program-btn">
                            En savoir plus
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="stats-section">
    <div class="container mx-auto px-4">
        <div class="stats-grid">
            <div class="stat-item">
                <h3>{{ $siteSettings?->home_stat_1_number ?? '95%' }}</h3>
                <p>{{ $siteSettings?->home_stat_1_text ?? 'Taux d\'insertion professionnelle' }}</p>
            </div>
            <div class="stat-item">
                <h3>{{ $siteSettings?->home_stat_2_number ?? '500+' }}</h3>
                <p>{{ $siteSettings?->home_stat_2_text ?? 'Étudiants formés' }}</p>
            </div>
            <div class="stat-item">
                <h3>{{ $siteSettings?->home_stat_3_number ?? '15+' }}</h3>
                <p>{{ $siteSettings?->home_stat_3_text ?? 'Années d\'expérience' }}</p>
            </div>
            <div class="stat-item">
                <h3>{{ $siteSettings?->home_stat_4_number ?? '100%' }}</h3>
                <p>{{ $siteSettings?->home_stat_4_text ?? 'Stage garanti' }}</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section">
    <div class="container mx-auto px-4">
        <div class="cta-content">
            <h2>{{ $siteSettings?->home_cta_title ?? 'Prêt à commencer votre aventure ?' }}</h2>
            <p>{{ $siteSettings?->home_cta_text ?? 'Rejoignez l\'IESC et donnez un nouvel élan à votre carrière professionnelle' }}</p>
            <div class="cta-actions">
                <a href="{{ route('admissions.info') }}" class="cta-btn cta-btn-primary">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    S'inscrire maintenant
                </a>
                <a href="{{ route('contact') }}" class="cta-btn cta-btn-secondary">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    En savoir plus
                </a>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    // Animation des cartes de programmes
    document.addEventListener('DOMContentLoaded', function() {
        const cards = document.querySelectorAll('.program-card');
        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry, index) => {
                if (entry.isIntersecting) {
                    setTimeout(() => {
                        entry.target.classList.add('animate-in');
                    }, index * 100);
                }
            });
        }, { threshold: 0.1 });
        
        cards.forEach(card => observer.observe(card));
    });
</script>
@endpush