@extends('layouts.app')

@section('title', 'IESC - Institut d\'Enseignement Supérieur du Congo')
@section('description', 'Formation supérieure d\'excellence au Congo. Programmes en Droit, Gestion et Informatique.')

@push('styles')
<style>
/* Style Harvard - Élégant et Académique */
.harvard-hero {
    position: relative;
    height: 85vh;
    min-height: 600px;
    background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.6)), 
                url('{{ !empty($siteSettings?->home_hero_image) ? Storage::url($siteSettings->home_hero_image) : "" }}') center/cover;
    background-color: #1a1a1a;
    display: flex;
    align-items: center;
    justify-content: center;
}

.hero-content {
    text-align: center;
    color: white;
    max-width: 900px;
    padding: 0 2rem;
}

.hero-title {
    font-size: clamp(2.5rem, 5vw, 4rem);
    font-weight: 300;
    letter-spacing: -0.02em;
    margin-bottom: 1.5rem;
    line-height: 1.2;
}

.hero-subtitle {
    font-size: clamp(1.1rem, 2vw, 1.3rem);
    font-weight: 300;
    opacity: 0.95;
    margin-bottom: 2.5rem;
    line-height: 1.6;
}

.hero-cta {
    display: inline-flex;
    gap: 1rem;
    flex-wrap: wrap;
    justify-content: center;
}

.btn-harvard {
    padding: 0.875rem 2rem;
    font-size: 0.95rem;
    font-weight: 500;
    text-decoration: none;
    border-radius: 2px;
    transition: all 0.3s ease;
    letter-spacing: 0.5px;
}

.btn-primary-harvard {
    background: var(--brand-primary);
    color: white;
    border: 2px solid var(--brand-primary);
}

.btn-primary-harvard:hover {
    background: transparent;
    color: white;
}

.btn-outline-harvard {
    background: transparent;
    color: white;
    border: 2px solid white;
}

.btn-outline-harvard:hover {
    background: white;
    color: #1a1a1a;
}

/* Sections */
.section-harvard {
    padding: 5rem 0;
}

.section-title {
    font-size: clamp(2rem, 4vw, 2.75rem);
    font-weight: 300;
    margin-bottom: 1rem;
    color: #1a1a1a;
    letter-spacing: -0.01em;
}

.section-subtitle {
    font-size: 1.125rem;
    color: #666;
    font-weight: 300;
    line-height: 1.7;
}

/* Stats Section - Harvard Style */
.stats-harvard {
    background: #f7f7f7;
    padding: 4rem 0;
}

.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 3rem;
    text-align: center;
}

.stat-item {
    padding: 1.5rem;
}

.stat-number {
    font-size: 3rem;
    font-weight: 300;
    color: var(--brand-primary);
    margin-bottom: 0.5rem;
}

.stat-label {
    font-size: 0.95rem;
    color: #666;
    font-weight: 400;
    text-transform: uppercase;
    letter-spacing: 1px;
}

/* Featured Programs - Harvard Grid */
.programs-harvard {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 2rem;
}

.program-card-harvard {
    background: white;
    border: 1px solid #e5e5e5;
    transition: all 0.3s ease;
    overflow: hidden;
}

.program-card-harvard:hover {
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
    transform: translateY(-4px);
}

.program-image-harvard {
    height: 200px;
    background: #f0f0f0;
    overflow: hidden;
    position: relative;
}

.program-image-harvard img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.program-card-harvard:hover .program-image-harvard img {
    transform: scale(1.05);
}

.program-content-harvard {
    padding: 1.75rem;
}

.program-title {
    font-size: 1.25rem;
    font-weight: 400;
    margin-bottom: 0.75rem;
    color: #1a1a1a;
}

.program-description {
    font-size: 0.95rem;
    color: #666;
    line-height: 1.6;
    margin-bottom: 1.25rem;
}

.program-link {
    color: var(--brand-primary);
    text-decoration: none;
    font-weight: 500;
    font-size: 0.9rem;
    letter-spacing: 0.5px;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
}

.program-link:hover {
    text-decoration: underline;
}

/* About Section - Two Column */
.about-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 4rem;
    align-items: center;
}

.about-image {
    width: 100%;
    height: auto;
}

.about-image img {
    width: 100%;
    height: auto;
    object-fit: cover;
}

/* News/Events Section */
.news-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
}

.news-card {
    background: white;
    border-bottom: 3px solid var(--brand-primary);
    padding: 1.5rem 0;
    transition: all 0.3s ease;
}

.news-card:hover {
    transform: translateY(-2px);
}

.news-date {
    font-size: 0.85rem;
    color: #999;
    margin-bottom: 0.5rem;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.news-title {
    font-size: 1.1rem;
    font-weight: 500;
    color: #1a1a1a;
    margin-bottom: 0.75rem;
    line-height: 1.4;
}

.news-excerpt {
    font-size: 0.95rem;
    color: #666;
    line-height: 1.6;
}

/* CTA Section - Harvard Style */
.cta-harvard {
    background: #1a1a1a;
    color: white;
    padding: 5rem 0;
    text-align: center;
}

.cta-title {
    font-size: clamp(2rem, 4vw, 2.5rem);
    font-weight: 300;
    margin-bottom: 1.5rem;
}

.cta-text {
    font-size: 1.125rem;
    font-weight: 300;
    margin-bottom: 2.5rem;
    opacity: 0.9;
}

/* Responsive */
@media (max-width: 768px) {
    .about-grid {
        grid-template-columns: 1fr;
        gap: 2rem;
    }
    
    .stats-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 2rem;
    }
    
    .hero-cta {
        flex-direction: column;
        align-items: stretch;
    }
}
</style>
@endpush

@section('content')

<!-- Hero Section - Harvard Style -->
<section class="harvard-hero">
    <div class="hero-content">
        <h1 class="hero-title">
            {{ $siteSettings?->home_hero_title ?? 'Institut d\'Enseignement Supérieur du Congo' }}
        </h1>
        <p class="hero-subtitle">
            {{ $siteSettings?->home_hero_subtitle ?? 'Excellence académique. Innovation pédagogique. Insertion professionnelle garantie.' }}
        </p>
        <div class="hero-cta">
            <a href="{{ route('admission.create') }}" class="btn-harvard btn-primary-harvard">
                Candidater maintenant
            </a>
            <a href="{{ route('programs.index') }}" class="btn-harvard btn-outline-harvard">
                Découvrir nos programmes
            </a>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="stats-harvard">
    <div class="container mx-auto px-4">
        <div class="stats-grid">
            <div class="stat-item">
                <div class="stat-number">{{ $siteSettings?->stat_1_number ?? '4' }}</div>
                <div class="stat-label">{{ $siteSettings?->stat_1_label ?? 'Filières d\'excellence' }}</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">{{ $siteSettings?->stat_2_number ?? '95%' }}</div>
                <div class="stat-label">Taux d'insertion</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">{{ $siteSettings?->stat_3_number ?? '500+' }}</div>
                <div class="stat-label">Étudiants formés</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">{{ $siteSettings?->stat_4_number ?? '100%' }}</div>
                <div class="stat-label">Stage garanti</div>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section class="section-harvard bg-white">
    <div class="container mx-auto px-4">
        <div class="about-grid">
            <div class="about-image">
                @if(!empty($siteSettings?->home_about_image))
                    <img src="{{ Storage::url($siteSettings->home_about_image) }}" alt="À propos IESC">
                @else
                    <div style="background: #f0f0f0; height: 400px; display: flex; align-items: center; justify-content: center;">
                        <svg class="w-24 h-24 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                @endif
            </div>
            <div>
                <h2 class="section-title">{{ $siteSettings?->home_about_title ?? 'L\'excellence au service de votre avenir' }}</h2>
                <p class="section-subtitle mb-6">
                    {{ $siteSettings?->home_about_text ?? 'L\'IESC offre une formation supérieure de pointe adaptée aux besoins du marché du travail congolais et africain. Nos programmes en Licence allient excellence académique et insertion professionnelle garantie.' }}
                </p>
                <p class="section-subtitle">
                    Depuis notre création, nous formons les leaders de demain grâce à un corps professoral qualifié, des infrastructures modernes et un accompagnement personnalisé de chaque étudiant.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Programs Section -->
<section class="section-harvard" style="background: #fafafa;">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="section-title">{{ $siteSettings?->home_section_title_programs ?? 'Nos programmes d\'excellence' }}</h2>
            <p class="section-subtitle max-w-3xl mx-auto">
                {{ $siteSettings?->home_section_subtitle_programs ?? 'Des formations complètes et professionnalisantes' }}
            </p>
        </div>
        
        <div class="programs-harvard">
            @forelse($programs as $program)
                <div class="program-card-harvard">
                    <div class="program-image-harvard">
                        @if($program->image)
                            <img src="{{ Storage::url($program->image) }}" alt="{{ $program->title }}">
                        @else
                            <div style="background: #e5e5e5; width: 100%; height: 100%; display: flex; align-items: center; justify-content: center;">
                                <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25"></path>
                                </svg>
                            </div>
                        @endif
                    </div>
                    <div class="program-content-harvard">
                        <h3 class="program-title">{{ $program->title }}</h3>
                        <p class="program-description">{{ Str::limit($program->description, 120) }}</p>
                        <a href="{{ route('programs.show', $program) }}" class="program-link">
                            En savoir plus
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            @empty
                @foreach([
                    ['title' => 'Licence en Sciences et Administration', 'desc' => 'Formation complète en gestion d\'entreprise, administration et management.'],
                    ['title' => 'Licence en Informatique', 'desc' => 'Développement web, mobile et systèmes d\'information modernes.'],
                    ['title' => 'Licence en Droit', 'desc' => 'Formation juridique complète avec pratique professionnelle intensive.'],
                    ['title' => 'Licence en Commerce', 'desc' => 'Marketing, vente et gestion commerciale adaptés au marché africain.']
                ] as $defaultProgram)
                    <div class="program-card-harvard">
                        <div class="program-image-harvard">
                            <div style="background: #e5e5e5; width: 100%; height: 100%; display: flex; align-items: center; justify-content: center;">
                                <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="program-content-harvard">
                            <h3 class="program-title">{{ $defaultProgram['title'] }}</h3>
                            <p class="program-description">{{ $defaultProgram['desc'] }}</p>
                            <a href="{{ route('programs.index') }}" class="program-link">
                                En savoir plus
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                @endforeach
            @endforelse
        </div>
        
        <div class="text-center mt-12">
            <a href="{{ route('programs.index') }}" class="btn-harvard btn-primary-harvard">
                Voir tous les programmes
            </a>
        </div>
    </div>
</section>

<!-- News/Events Preview -->
<section class="section-harvard bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="section-title">Actualités et événements</h2>
            <p class="section-subtitle max-w-3xl mx-auto">Restez informé de la vie de l'IESC</p>
        </div>
        
        <div class="news-grid">
            <div class="news-card">
                <div class="news-date">16 Septembre 2025</div>
                <h3 class="news-title">Ouverture des inscriptions 2025-2026</h3>
                <p class="news-excerpt">Les candidatures pour l'année académique 2025-2026 sont officiellement ouvertes. Places limitées.</p>
            </div>
            
            <div class="news-card">
                <div class="news-date">Mars 2025</div>
                <h3 class="news-title">Journée Portes Ouvertes</h3>
                <p class="news-excerpt">Venez découvrir nos campus, rencontrer nos enseignants et échanger avec nos étudiants.</p>
            </div>
            
            <div class="news-card">
                <div class="news-date">Février 2025</div>
                <h3 class="news-title">Partenariats entreprises</h3>
                <p class="news-excerpt">L'IESC renforce ses partenariats avec les grandes entreprises pour garantir l'emploi de nos diplômés.</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-harvard">
    <div class="container mx-auto px-4">
        <h2 class="cta-title">{{ $siteSettings?->home_cta_title ?? 'Prêt à rejoindre l\'IESC ?' }}</h2>
        <p class="cta-text max-w-2xl mx-auto">
            {{ $siteSettings?->home_cta_subtitle ?? 'Les inscriptions sont ouvertes. Rejoignez une institution d\'excellence et donnez un nouvel élan à votre carrière.' }}
        </p>
        <div class="flex gap-4 justify-center flex-wrap">
            <a href="{{ route('admission.create') }}" class="btn-harvard btn-primary-harvard">
                Déposer ma candidature
            </a>
            <a href="{{ route('contact') }}" class="btn-harvard btn-outline-harvard">
                Nous contacter
            </a>
        </div>
    </div>
</section>

@endsection
