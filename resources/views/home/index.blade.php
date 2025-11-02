@extends('layouts.app')

@section('title', 'IESC - Institut d\'Enseignement Supérieur du Congo')
@section('description', 'Formation supérieure d\'excellence au Congo. Programmes en Droit, Gestion et Informatique.')

@section('content')

<!-- Hero Section -->
<section class="position-relative bg-dark text-white" style="min-height: 85vh; display: flex; align-items: center;">
    @if(!empty($siteSettings?->home_hero_image))
        <div class="position-absolute top-0 start-0 w-100 h-100" style="z-index: 0;">
            <img src="{{ Storage::url($siteSettings->home_hero_image) }}" alt="IESC Campus" class="w-100 h-100 object-fit-cover">
            <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark" style="opacity: 0.6;"></div>
        </div>
    @endif
    
    <div class="container position-relative" style="z-index: 1;">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center">
                <h1 class="display-3 fw-light mb-4">
                    {{ $siteSettings?->home_hero_title ?? 'Institut d\'Enseignement Supérieur du Congo' }}
                </h1>
                <p class="lead mb-5 fs-4 fw-light">
                    {{ $siteSettings?->home_hero_subtitle ?? 'Excellence académique. Innovation pédagogique. Insertion professionnelle garantie.' }}
                </p>
                <div class="d-flex gap-3 justify-content-center flex-wrap">
                    <a href="{{ route('admission.create') }}" class="btn btn-primary btn-lg px-4">
                        <i class="bi bi-file-earmark-text me-2"></i>
                        Candidater maintenant
                    </a>
                    <a href="{{ route('programs.index') }}" class="btn btn-outline-light btn-lg px-4">
                        <i class="bi bi-book me-2"></i>
                        Nos programmes
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row text-center g-4">
            <div class="col-6 col-md-3">
                <div class="p-3">
                    <h2 class="display-4 fw-light text-primary mb-2">{{ $siteSettings?->stat_1_number ?? '4' }}</h2>
                    <p class="text-muted mb-0 small text-uppercase" style="letter-spacing: 1px;">
                        {{ $siteSettings?->stat_1_label ?? 'Filières d\'excellence' }}
                    </p>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="p-3">
                    <h2 class="display-4 fw-light text-primary mb-2">{{ $siteSettings?->stat_2_number ?? '95%' }}</h2>
                    <p class="text-muted mb-0 small text-uppercase" style="letter-spacing: 1px;">
                        Taux d'insertion
                    </p>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="p-3">
                    <h2 class="display-4 fw-light text-primary mb-2">{{ $siteSettings?->stat_3_number ?? '500+' }}</h2>
                    <p class="text-muted mb-0 small text-uppercase" style="letter-spacing: 1px;">
                        Étudiants formés
                    </p>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="p-3">
                    <h2 class="display-4 fw-light text-primary mb-2">{{ $siteSettings?->stat_4_number ?? '100%' }}</h2>
                    <p class="text-muted mb-0 small text-uppercase" style="letter-spacing: 1px;">
                        Stage garanti
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section class="py-5 bg-white">
    <div class="container py-md-5">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6">
                @if(!empty($siteSettings?->home_about_image))
                    <img src="{{ Storage::url($siteSettings->home_about_image) }}" 
                         alt="À propos IESC" 
                         class="img-fluid rounded shadow-lg">
                @else
                    <div class="bg-light rounded d-flex align-items-center justify-content-center" style="height: 400px;">
                        <i class="bi bi-building text-muted" style="font-size: 5rem;"></i>
                    </div>
                @endif
            </div>
            <div class="col-lg-6">
                <h2 class="display-5 fw-light mb-4">
                    {{ $siteSettings?->home_about_title ?? 'L\'excellence au service de votre avenir' }}
                </h2>
                <p class="lead text-muted mb-4">
                    {{ $siteSettings?->home_about_text ?? 'L\'IESC offre une formation supérieure de pointe adaptée aux besoins du marché du travail congolais et africain.' }}
                </p>
                <p class="text-muted mb-4">
                    Depuis notre création, nous formons les leaders de demain grâce à un corps professoral qualifié, des infrastructures modernes et un accompagnement personnalisé de chaque étudiant.
                </p>
                <a href="{{ route('contact') }}" class="btn btn-outline-primary">
                    En savoir plus
                    <i class="bi bi-arrow-right ms-2"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Programs Section -->
<section class="py-5 bg-light">
    <div class="container py-md-5">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-light mb-3">
                {{ $siteSettings?->home_section_title_programs ?? 'Nos programmes d\'excellence' }}
            </h2>
            <p class="lead text-muted mx-auto" style="max-width: 700px;">
                {{ $siteSettings?->home_section_subtitle_programs ?? 'Des formations complètes et professionnalisantes' }}
            </p>
        </div>
        
        <div class="row g-4">
            @forelse($programs as $program)
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="position-relative overflow-hidden" style="height: 200px;">
                            @if($program->image)
                                <img src="{{ Storage::url($program->image) }}" 
                                     alt="{{ $program->title }}" 
                                     class="card-img-top h-100 object-fit-cover">
                            @else
                                <div class="bg-light h-100 d-flex align-items-center justify-content-center">
                                    <i class="bi bi-book text-muted" style="font-size: 3rem;"></i>
                                </div>
                            @endif
                        </div>
                        <div class="card-body">
                            <h5 class="card-title fw-normal">{{ $program->title }}</h5>
                            <p class="card-text text-muted small">{{ Str::limit($program->description, 100) }}</p>
                            <a href="{{ route('programs.show', $program) }}" class="btn btn-sm btn-outline-primary">
                                En savoir plus
                                <i class="bi bi-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                @foreach([
                    ['title' => 'Licence en Sciences et Administration', 'desc' => 'Gestion, administration et management des organisations.'],
                    ['title' => 'Licence en Informatique', 'desc' => 'Développement web, mobile et systèmes d\'information.'],
                    ['title' => 'Licence en Droit', 'desc' => 'Formation juridique complète et pratique professionnelle.'],
                    ['title' => 'Licence en Commerce', 'desc' => 'Marketing, vente et gestion commerciale.']
                ] as $index => $defaultProgram)
                    <div class="col-md-6 col-lg-3">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="bg-light d-flex align-items-center justify-content-center" style="height: 200px;">
                                <i class="bi bi-book text-muted" style="font-size: 3rem;"></i>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title fw-normal">{{ $defaultProgram['title'] }}</h5>
                                <p class="card-text text-muted small">{{ $defaultProgram['desc'] }}</p>
                                <a href="{{ route('programs.index') }}" class="btn btn-sm btn-outline-primary">
                                    En savoir plus
                                    <i class="bi bi-arrow-right ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endforelse
        </div>
        
        <div class="text-center mt-5">
            <a href="{{ route('programs.index') }}" class="btn btn-primary btn-lg px-5">
                Voir tous les programmes
            </a>
        </div>
    </div>
</section>

<!-- Avantages Section -->
<section class="py-5 bg-white">
    <div class="container py-md-5">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-light mb-3">Pourquoi choisir l'IESC ?</h2>
        </div>
        
        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="text-center p-4">
                    <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                        <i class="bi bi-briefcase text-primary" style="font-size: 2rem;"></i>
                    </div>
                    <h5 class="fw-normal mb-3">{{ $siteSettings?->advantage_1_title ?? 'Stage garanti' }}</h5>
                    <p class="text-muted small">{{ $siteSettings?->advantage_1_text ?? 'Un stage professionnel assuré pour chaque diplômé' }}</p>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-3">
                <div class="text-center p-4">
                    <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                        <i class="bi bi-graph-up text-primary" style="font-size: 2rem;"></i>
                    </div>
                    <h5 class="fw-normal mb-3">{{ $siteSettings?->advantage_2_title ?? 'Filières à fort emploi' }}</h5>
                    <p class="text-muted small">{{ $siteSettings?->advantage_2_text ?? 'Formations adaptées aux besoins du marché' }}</p>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-3">
                <div class="text-center p-4">
                    <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                        <i class="bi bi-building text-primary" style="font-size: 2rem;"></i>
                    </div>
                    <h5 class="fw-normal mb-3">{{ $siteSettings?->advantage_3_title ?? 'Campus moderne' }}</h5>
                    <p class="text-muted small">{{ $siteSettings?->advantage_3_text ?? 'Infrastructures et équipements de pointe' }}</p>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-3">
                <div class="text-center p-4">
                    <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                        <i class="bi bi-laptop text-primary" style="font-size: 2rem;"></i>
                    </div>
                    <h5 class="fw-normal mb-3">{{ $siteSettings?->advantage_4_title ?? 'Facilité d\'achat PC' }}</h5>
                    <p class="text-muted small">{{ $siteSettings?->advantage_4_text ?? 'Ordinateurs portables à crédit' }}</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-5 bg-dark text-white">
    <div class="container py-md-5">
        <div class="row justify-content-center text-center">
            <div class="col-lg-8">
                <h2 class="display-5 fw-light mb-4">
                    {{ $siteSettings?->home_cta_title ?? 'Prêt à rejoindre l\'IESC ?' }}
                </h2>
                <p class="lead mb-5">
                    {{ $siteSettings?->home_cta_subtitle ?? 'Les inscriptions sont ouvertes. Rejoignez une institution d\'excellence.' }}
                </p>
                <div class="d-flex gap-3 justify-content-center flex-wrap">
                    <a href="{{ route('admission.create') }}" class="btn btn-primary btn-lg px-5">
                        <i class="bi bi-file-earmark-text me-2"></i>
                        Déposer ma candidature
                    </a>
                    <a href="{{ route('contact') }}" class="btn btn-outline-light btn-lg px-5">
                        <i class="bi bi-envelope me-2"></i>
                        Nous contacter
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Info Band -->
<section class="py-4 bg-primary text-white">
    <div class="container">
        <div class="row text-center g-4">
            <div class="col-md-4">
                <i class="bi bi-telephone-fill fs-4 mb-2 d-block"></i>
                <a href="tel:{{ $siteSettings->contact_phone ?? '+242 06 541 98 91' }}" class="text-white text-decoration-none">
                    {{ $siteSettings->contact_phone ?? '+242 06 541 98 91' }}
                </a>
            </div>
            <div class="col-md-4">
                <i class="bi bi-envelope-fill fs-4 mb-2 d-block"></i>
                <a href="mailto:{{ $siteSettings->contact_email ?? 'contact@iesc.cg' }}" class="text-white text-decoration-none">
                    {{ $siteSettings->contact_email ?? 'contact@iesc.cg' }}
                </a>
            </div>
            <div class="col-md-4">
                <i class="bi bi-geo-alt-fill fs-4 mb-2 d-block"></i>
                <span>{{ $siteSettings->contact_address ?? '112, Av. de France, Poto-poto' }}</span>
            </div>
        </div>
    </div>
</section>

@endsection
