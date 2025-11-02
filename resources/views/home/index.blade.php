@extends('layouts.app')

@section('title', 'IESC - Institut d\'Enseignement Supérieur du Congo')
@section('description', 'Formation supérieure d\'excellence au Congo.')

@section('content')

<!-- Hero Section - Harvard Style -->
<section class="harvard-hero">
    @if(!empty($siteSettings?->home_hero_image))
        <img src="{{ Storage::url($siteSettings->home_hero_image) }}" alt="IESC" class="harvard-hero-image">
    @endif
    <div class="position-absolute top-0 start-0 w-100 h-100 bg-black" style="opacity: 0.3; z-index: 1;"></div>
    
    <div class="harvard-hero-content">
        <div class="container-harvard">
            <div class="row">
                <div class="col-lg-10 col-xl-8">
                    <h1 class="text-white">
                        {{ $siteSettings?->home_hero_title ?? 'Institut d\'Enseignement Supérieur du Congo' }}
                    </h1>
                    <p class="text-white">
                        {{ $siteSettings?->home_hero_subtitle ?? 'Excellence académique. Innovation pédagogique. Insertion professionnelle garantie.' }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats Bar - Harvard Style -->
<section class="stats-harvard">
    <div class="container-harvard">
        <div class="row text-center g-0">
            <div class="col-6 col-md-3">
                <div class="stat-harvard">
                    <div class="stat-harvard-number">{{ $siteSettings?->stat_1_number ?? '4' }}</div>
                    <div class="stat-harvard-label">{{ Str::limit($siteSettings?->stat_1_label ?? 'Filières', 30) }}</div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="stat-harvard">
                    <div class="stat-harvard-number">{{ $siteSettings?->stat_2_number ?? '95%' }}</div>
                    <div class="stat-harvard-label">Insertion Pro</div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="stat-harvard">
                    <div class="stat-harvard-number">{{ $siteSettings?->stat_3_number ?? '500+' }}</div>
                    <div class="stat-harvard-label">Étudiants</div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="stat-harvard">
                    <div class="stat-harvard-number">{{ $siteSettings?->stat_4_number ?? '100%' }}</div>
                    <div class="stat-harvard-label">Stage Garanti</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About Section - Harvard Two Column -->
<section class="section-harvard bg-white">
    <div class="container-harvard">
        <div class="two-col-harvard">
            <div>
                @if(!empty($siteSettings?->home_about_image))
                    <img src="{{ Storage::url($siteSettings->home_about_image) }}" alt="À propos" class="img-harvard">
                @else
                    <div class="bg-light d-flex align-items-center justify-content-center" style="height: 500px;">
                        <i class="bi bi-building text-muted" style="font-size: 5rem;"></i>
                    </div>
                @endif
            </div>
            <div>
                <h2>{{ $siteSettings?->home_about_title ?? 'L\'excellence au service de votre avenir' }}</h2>
                <p class="text-harvard-medium">
                    {{ $siteSettings?->home_about_text ?? 'L\'IESC offre une formation supérieure de pointe adaptée aux besoins du marché du travail congolais et africain. Nos programmes en Licence allient excellence académique et insertion professionnelle garantie.' }}
                </p>
                <p class="text-harvard-small">
                    Depuis notre création, nous formons les leaders de demain grâce à un corps professoral qualifié, des infrastructures modernes et un accompagnement personnalisé de chaque étudiant.
                </p>
                <div class="mt-4">
                    <a href="{{ route('contact') }}" class="link-harvard">
                        En savoir plus →
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Programs Section - Harvard Grid -->
<section class="section-harvard" style="background: #fafafa;">
    <div class="container-harvard">
        <div class="text-center mb-harvard">
            <h2>{{ $siteSettings?->home_section_title_programs ?? 'Nos programmes' }}</h2>
            <p class="lead text-harvard-medium mt-3">
                {{ $siteSettings?->home_section_subtitle_programs ?? 'Des formations complètes et professionnalisantes' }}
            </p>
        </div>
        
        <div class="grid-harvard-3">
            @forelse($programs as $program)
                <div class="card-harvard">
                    <div class="card-harvard-image">
                        @if($program->image)
                            <img src="{{ Storage::url($program->image) }}" alt="{{ $program->title }}">
                        @else
                            <div class="w-100 h-100 bg-light d-flex align-items-center justify-content-center">
                                <i class="bi bi-book text-muted" style="font-size: 3rem;"></i>
                            </div>
                        @endif
                    </div>
                    <div class="card-harvard-body">
                        <h3 class="card-harvard-title">{{ $program->title }}</h3>
                        <p class="card-harvard-text mb-4">{{ Str::limit($program->description, 140) }}</p>
                        <a href="{{ route('programs.show', $program) }}" class="card-harvard-link">
                            En savoir plus
                            <svg width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            @empty
                @foreach([
                    ['title' => 'Licence en Sciences et Administration', 'desc' => 'Formation complète en gestion d\'entreprise, administration et management des organisations modernes.'],
                    ['title' => 'Licence en Informatique', 'desc' => 'Développement web, mobile et systèmes d\'information. Maîtrise des technologies actuelles.'],
                    ['title' => 'Licence en Droit', 'desc' => 'Formation juridique complète avec pratique professionnelle intensive et stages en cabinet.']
                ] as $defaultProgram)
                    <div class="card-harvard">
                        <div class="card-harvard-image">
                            <div class="w-100 h-100 bg-light d-flex align-items-center justify-content-center">
                                <i class="bi bi-book text-muted" style="font-size: 3rem;"></i>
                            </div>
                        </div>
                        <div class="card-harvard-body">
                            <h3 class="card-harvard-title">{{ $defaultProgram['title'] }}</h3>
                            <p class="card-harvard-text mb-4">{{ $defaultProgram['desc'] }}</p>
                            <a href="{{ route('programs.index') }}" class="card-harvard-link">
                                En savoir plus
                                <svg width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                @endforeach
            @endforelse
        </div>
        
        <div class="text-center mt-5">
            <a href="{{ route('programs.index') }}" class="btn-harvard btn-harvard-primary">
                Voir tous les programmes
            </a>
        </div>
    </div>
</section>

<!-- CTA Section - Harvard Dark -->
<section class="py-harvard bg-black text-white">
    <div class="container-harvard">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h2 class="text-white mb-4">
                    {{ $siteSettings?->home_cta_title ?? 'Prêt à rejoindre l\'IESC ?' }}
                </h2>
                <p class="text-harvard-large text-white mb-5" style="opacity: 0.9;">
                    {{ $siteSettings?->home_cta_subtitle ?? 'Les inscriptions sont ouvertes. Rejoignez une institution d\'excellence.' }}
                </p>
                <div class="d-flex gap-3 justify-content-center flex-wrap">
                    <a href="{{ route('admission.create') }}" class="btn-harvard btn-harvard-primary">
                        Déposer ma candidature
                    </a>
                    <a href="{{ route('contact') }}" class="btn-harvard btn-harvard-light">
                        Nous contacter
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
