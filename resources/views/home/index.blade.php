@extends('layouts.app')

@section('title', 'IESC - Institut d\'Enseignement Supérieur du Congo')

@section('content')

<!-- Large Hero Image with Text Overlay -->
<section class="position-relative" style="height: 90vh; min-height: 600px; overflow: hidden;">
    @if(!empty($siteSettings?->home_hero_image))
        <img src="{{ Storage::url($siteSettings->home_hero_image) }}" 
             alt="Campus IESC" 
             class="position-absolute w-100 h-100 object-fit-cover"
             style="z-index: 0;">
        <div class="position-absolute top-0 start-0 w-100 h-100 bg-black" style="opacity: 0.35; z-index: 1;"></div>
    @else
        <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark" style="z-index: 0;"></div>
    @endif
    
    <div class="container position-relative h-100 d-flex align-items-center" style="z-index: 2;">
        <div class="row">
            <div class="col-lg-9 col-xl-8">
                <h1 class="display-2 text-white mb-4" style="font-weight: 300; line-height: 1.1; letter-spacing: -1px;">
                    {{ $siteSettings?->home_hero_title ?? 'Institut d\'Enseignement Supérieur du Congo' }}
                </h1>
                <p class="fs-4 text-white mb-0" style="font-weight: 300; line-height: 1.5; max-width: 700px; opacity: 0.95;">
                    {{ $siteSettings?->home_hero_subtitle ?? 'Excellence académique. Innovation pédagogique. Insertion professionnelle garantie.' }}
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Featured Content Section -->
<section class="py-5" style="background: #f8f8f8;">
    <div class="container py-4">
        <div class="row mb-4">
            <div class="col">
                <h2 class="display-5 mb-0" style="font-weight: 300; letter-spacing: -0.5px;">
                    {{ $siteSettings?->home_section_title_programs ?? 'Nos programmes' }}
                </h2>
            </div>
        </div>
        
        <div class="row g-4">
            @forelse($programs as $index => $program)
                @if($index < 3)
                <div class="col-md-6 col-lg-4">
                    <article class="bg-white border h-100" style="border-color: #e0e0e0 !important; transition: all 0.3s;">
                        <div style="height: 260px; overflow: hidden; background: #f5f5f5;">
                            @if($program->image)
                                <img src="{{ Storage::url($program->image) }}" 
                                     alt="{{ $program->title }}"
                                     class="w-100 h-100 object-fit-cover">
                            @else
                                <div class="w-100 h-100 d-flex align-items-center justify-content-center">
                                    <i class="bi bi-book text-muted" style="font-size: 3.5rem;"></i>
                                </div>
                            @endif
                        </div>
                        <div class="p-4">
                            <h3 class="h5 mb-3" style="font-weight: 400; line-height: 1.3;">
                                {{ $program->title }}
                            </h3>
                            <p class="text-muted mb-3" style="font-size: 0.9375rem; line-height: 1.6;">
                                {{ Str::limit($program->description, 130) }}
                            </p>
                            <a href="{{ route('programs.show', $program) }}" 
                               class="text-decoration-none d-inline-flex align-items-center gap-2"
                               style="color: var(--brand-primary); font-weight: 500; font-size: 0.875rem;">
                                En savoir plus
                                <svg width="14" height="14" fill="currentColor" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                </svg>
                            </a>
                        </div>
                    </article>
                </div>
                @endif
            @empty
                @foreach([
                    'Licence en Sciences et Administration',
                    'Licence en Informatique',
                    'Licence en Droit'
                ] as $title)
                <div class="col-md-6 col-lg-4">
                    <article class="bg-white border h-100" style="border-color: #e0e0e0 !important;">
                        <div style="height: 260px; background: #f5f5f5;" class="d-flex align-items-center justify-content-center">
                            <i class="bi bi-book text-muted" style="font-size: 3.5rem;"></i>
                        </div>
                        <div class="p-4">
                            <h3 class="h5 mb-3" style="font-weight: 400;">{{ $title }}</h3>
                            <p class="text-muted mb-3" style="font-size: 0.9375rem;">
                                Formation d'excellence adaptée aux besoins du marché.
                            </p>
                            <a href="{{ route('programs.index') }}" 
                               class="text-decoration-none d-inline-flex align-items-center gap-2"
                               style="color: var(--brand-primary); font-weight: 500; font-size: 0.875rem;">
                                En savoir plus
                                <svg width="14" height="14" fill="currentColor" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                </svg>
                            </a>
                        </div>
                    </article>
                </div>
                @endforeach
            @endforelse
        </div>
    </div>
</section>

<!-- Two Column Content Section -->
<section class="py-5 bg-white">
    <div class="container py-5">
        <div class="row g-5 align-items-start">
            <div class="col-lg-6">
                @if(!empty($siteSettings?->home_about_image))
                    <img src="{{ Storage::url($siteSettings->home_about_image) }}" 
                         alt="À propos IESC"
                         class="w-100 h-auto">
                @else
                    <div class="bg-light d-flex align-items-center justify-content-center" style="height: 500px;">
                        <i class="bi bi-building text-muted" style="font-size: 5rem;"></i>
                    </div>
                @endif
            </div>
            <div class="col-lg-6">
                <h2 class="display-5 mb-4" style="font-weight: 300; line-height: 1.2; letter-spacing: -0.5px;">
                    {{ $siteSettings?->home_about_title ?? 'L\'excellence au service de votre avenir' }}
                </h2>
                <div class="mb-4" style="font-size: 1.125rem; font-weight: 300; line-height: 1.7; color: #333;">
                    {{ $siteSettings?->home_about_text ?? 'L\'IESC offre une formation supérieure de pointe adaptée aux besoins du marché du travail congolais et africain. Nos programmes en Licence allient excellence académique et insertion professionnelle garantie.' }}
                </div>
                <p class="text-muted" style="font-size: 1rem; line-height: 1.6;">
                    Depuis notre création, nous formons les leaders de demain grâce à un corps professoral qualifié, des infrastructures modernes et un accompagnement personnalisé de chaque étudiant.
                </p>
                <div class="mt-4">
                    <a href="{{ route('contact') }}" 
                       class="text-decoration-none d-inline-flex align-items-center gap-2"
                       style="color: var(--brand-primary); font-weight: 500; font-size: 0.9375rem;">
                        En savoir plus sur l'IESC
                        <svg width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="py-5" style="background: #fafafa;">
    <div class="container">
        <div class="row text-center">
            <div class="col-6 col-md-3 py-4">
                <div style="font-size: 4rem; font-weight: 300; color: var(--brand-primary); line-height: 1;">
                    {{ $siteSettings?->stat_1_number ?? '4' }}
                </div>
                <div class="mt-2" style="font-size: 0.8125rem; text-transform: uppercase; letter-spacing: 1.5px; color: #666;">
                    Filières
                </div>
            </div>
            <div class="col-6 col-md-3 py-4">
                <div style="font-size: 4rem; font-weight: 300; color: var(--brand-primary); line-height: 1;">
                    {{ $siteSettings?->stat_2_number ?? '95%' }}
                </div>
                <div class="mt-2" style="font-size: 0.8125rem; text-transform: uppercase; letter-spacing: 1.5px; color: #666;">
                    Insertion Pro
                </div>
            </div>
            <div class="col-6 col-md-3 py-4">
                <div style="font-size: 4rem; font-weight: 300; color: var(--brand-primary); line-height: 1;">
                    {{ $siteSettings?->stat_3_number ?? '500+' }}
                </div>
                <div class="mt-2" style="font-size: 0.8125rem; text-transform: uppercase; letter-spacing: 1.5px; color: #666;">
                    Étudiants
                </div>
            </div>
            <div class="col-6 col-md-3 py-4">
                <div style="font-size: 4rem; font-weight: 300; color: var(--brand-primary); line-height: 1;">
                    {{ $siteSettings?->stat_4_number ?? '100%' }}
                </div>
                <div class="mt-2" style="font-size: 0.8125rem; text-transform: uppercase; letter-spacing: 1.5px; color: #666;">
                    Stage Garanti
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Full Width CTA -->
<section class="py-5 bg-black text-white">
    <div class="container py-5">
        <div class="row justify-content-center text-center">
            <div class="col-lg-8">
                <h2 class="display-4 mb-4" style="font-weight: 300; line-height: 1.2;">
                    {{ $siteSettings?->home_cta_title ?? 'Prêt à rejoindre l\'IESC ?' }}
                </h2>
                <p class="mb-5" style="font-size: 1.25rem; font-weight: 300; opacity: 0.9;">
                    {{ $siteSettings?->home_cta_subtitle ?? 'Les inscriptions sont ouvertes. Rejoignez une institution d\'excellence.' }}
                </p>
                <div class="d-flex gap-3 justify-content-center">
                    <a href="{{ route('admission.create') }}" 
                       class="btn btn-light btn-lg px-5"
                       style="border-radius: 0; font-weight: 500; font-size: 0.9375rem;">
                        Candidater maintenant
                    </a>
                    <a href="{{ route('programs.index') }}" 
                       class="btn btn-outline-light btn-lg px-5"
                       style="border-radius: 0; font-weight: 500; font-size: 0.9375rem; border-width: 2px;">
                        Explorer les programmes
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
