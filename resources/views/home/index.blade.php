@extends('layouts.app')

@section('title', $siteSettings->site_name ?? 'IESC - Institut d\'Enseignement Supérieur du Congo')
@section('description', $siteSettings->site_description ?? 'Formation supérieure d\'excellence au Congo.')

@section('content')

<!-- Hero Section - Image de fond configurable -->
<section class="position-relative" style="height: 90vh; min-height: 600px; overflow: hidden;">
    @if(!empty($siteSettings?->home_hero_image))
        <img src="{{ Storage::url($siteSettings->home_hero_image) }}" 
             alt="Campus IESC" 
             class="position-absolute w-100 h-100 object-fit-cover"
             style="z-index: 0;">
        <div class="position-absolute top-0 start-0 w-100 h-100 bg-black" style="opacity: 0.4; z-index: 1;"></div>
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

<!-- Stats Bar -->
<section class="py-5" style="background: #fafafa;">
    <div class="container">
        <div class="row text-center">
            <div class="col-6 col-md-3 py-4">
                <div style="font-size: 4rem; font-weight: 300; color: var(--brand-primary); line-height: 1;">
                    {{ $siteSettings?->stat_1_number ?? '4' }}
                </div>
                <div class="mt-2" style="font-size: 0.8125rem; text-transform: uppercase; letter-spacing: 1.5px; color: #666;">
                    {{ $siteSettings?->stat_1_label ?? 'Filières' }}
                </div>
            </div>
            <div class="col-6 col-md-3 py-4">
                <div style="font-size: 4rem; font-weight: 300; color: var(--brand-primary); line-height: 1;">
                    {{ $siteSettings?->stat_2_number ?? '95%' }}
                </div>
                <div class="mt-2" style="font-size: 0.8125rem; text-transform: uppercase; letter-spacing: 1.5px; color: #666;">
                    {{ $siteSettings?->stat_2_label ?? 'Insertion Pro' }}
                </div>
            </div>
            <div class="col-6 col-md-3 py-4">
                <div style="font-size: 4rem; font-weight: 300; color: var(--brand-primary); line-height: 1;">
                    {{ $siteSettings?->stat_3_number ?? '500+' }}
                </div>
                <div class="mt-2" style="font-size: 0.8125rem; text-transform: uppercase; letter-spacing: 1.5px; color: #666;">
                    {{ $siteSettings?->stat_3_label ?? 'Étudiants' }}
                </div>
            </div>
            <div class="col-6 col-md-3 py-4">
                <div style="font-size: 4rem; font-weight: 300; color: var(--brand-primary); line-height: 1;">
                    {{ $siteSettings?->stat_4_number ?? '100%' }}
                </div>
                <div class="mt-2" style="font-size: 0.8125rem; text-transform: uppercase; letter-spacing: 1.5px; color: #666;">
                    {{ $siteSettings?->stat_4_label ?? 'Stage Garanti' }}
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About Section - Image configurable -->
<section class="section-harvard bg-white">
    <div class="container py-5">
        <div class="row g-5 align-items-start">
            <div class="col-lg-6">
                @if(!empty($siteSettings?->home_about_image))
                    <img src="{{ Storage::url($siteSettings->home_about_image) }}" 
                         alt="À propos IESC"
                         class="w-100 h-auto img-fluid">
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
                    {!! nl2br(e($siteSettings?->home_about_text ?? 'L\'IESC offre une formation supérieure de pointe adaptée aux besoins du marché du travail congolais et africain.')) !!}
                </div>
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

<!-- Avantages Section - 4 colonnes configurables -->
@if(!empty($siteSettings?->advantage_1_title) || !empty($siteSettings?->advantage_2_title) || !empty($siteSettings?->advantage_3_title) || !empty($siteSettings?->advantage_4_title))
<section class="py-5 bg-light">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h2 class="display-5 mb-3" style="font-weight: 300; letter-spacing: -0.5px;">
                Pourquoi choisir l'IESC ?
            </h2>
        </div>
        
        <div class="row g-4">
            @if(!empty($siteSettings?->advantage_1_title))
            <div class="col-md-6 col-lg-3">
                <div class="text-center p-4">
                    <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                        <i class="bi bi-briefcase text-primary" style="font-size: 2rem;"></i>
                    </div>
                    <h5 class="fw-normal mb-3">{{ $siteSettings->advantage_1_title }}</h5>
                    <p class="text-muted small">{{ $siteSettings->advantage_1_text }}</p>
                </div>
            </div>
            @endif
            
            @if(!empty($siteSettings?->advantage_2_title))
            <div class="col-md-6 col-lg-3">
                <div class="text-center p-4">
                    <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                        <i class="bi bi-graph-up text-primary" style="font-size: 2rem;"></i>
                    </div>
                    <h5 class="fw-normal mb-3">{{ $siteSettings->advantage_2_title }}</h5>
                    <p class="text-muted small">{{ $siteSettings->advantage_2_text }}</p>
                </div>
            </div>
            @endif
            
            @if(!empty($siteSettings?->advantage_3_title))
            <div class="col-md-6 col-lg-3">
                <div class="text-center p-4">
                    <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                        <i class="bi bi-building text-primary" style="font-size: 2rem;"></i>
                    </div>
                    <h5 class="fw-normal mb-3">{{ $siteSettings->advantage_3_title }}</h5>
                    <p class="text-muted small">{{ $siteSettings->advantage_3_text }}</p>
                </div>
            </div>
            @endif
            
            @if(!empty($siteSettings?->advantage_4_title))
            <div class="col-md-6 col-lg-3">
                <div class="text-center p-4">
                    <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                        <i class="bi bi-laptop text-primary" style="font-size: 2rem;"></i>
                    </div>
                    <h5 class="fw-normal mb-3">{{ $siteSettings->advantage_4_title }}</h5>
                    <p class="text-muted small">{{ $siteSettings->advantage_4_text }}</p>
                </div>
            </div>
            @endif
        </div>
    </div>
</section>
@endif

<!-- Programs Section - Titre configurable -->
<section class="py-5" style="background: #f8f8f8;">
    <div class="container py-4">
        <div class="row mb-4">
            <div class="col">
                <h2 class="display-5 mb-2" style="font-weight: 300; letter-spacing: -0.5px;">
                    {{ $siteSettings?->home_section_title_programs ?? 'Nos programmes' }}
                </h2>
                @if(!empty($siteSettings?->home_section_subtitle_programs))
                    <p class="text-muted" style="font-size: 1.125rem;">
                        {{ $siteSettings->home_section_subtitle_programs }}
                    </p>
                @endif
            </div>
        </div>
        
        <div class="row g-4">
            @forelse($programs->take(6) as $program)
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
        
        <div class="text-center mt-5">
            <a href="{{ route('programs.index') }}" 
               class="btn btn-lg px-5"
               style="background: var(--brand-primary); color: #fff; border: none; border-radius: 0; font-weight: 500; font-size: 0.9375rem;">
                Voir tous les programmes
            </a>
        </div>
    </div>
</section>

<!-- Parcours d'inscription Section -->
<section class="py-5 bg-white">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h2 class="display-5 mb-3" style="font-weight: 300; letter-spacing: -0.5px;">
                Comment s'inscrire ?
            </h2>
            <p class="text-muted mx-auto" style="font-size: 1.125rem; max-width: 700px;">
                Un processus simple et rapide en 4 étapes
            </p>
        </div>
        
        <div class="row g-4 position-relative">
            <div class="d-none d-lg-block position-absolute top-50 start-0 w-100 translate-middle-y" style="height: 2px; background: #e0e0e0; z-index: 0;"></div>
            
            <div class="col-md-6 col-lg-3">
                <div class="text-center position-relative" style="z-index: 1;">
                    <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-4" 
                         style="width: 100px; height: 100px; font-size: 2.5rem; font-weight: 300; border: 5px solid #fff; box-shadow: 0 4px 12px rgba(0,0,0,0.1);">
                        1
                    </div>
                    <h3 class="h5 mb-3" style="font-weight: 500;">Candidature</h3>
                    <p class="text-muted small">Remplissez le formulaire en ligne</p>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-3">
                <div class="text-center position-relative" style="z-index: 1;">
                    <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-4" 
                         style="width: 100px; height: 100px; font-size: 2.5rem; font-weight: 300; border: 5px solid #fff; box-shadow: 0 4px 12px rgba(0,0,0,0.1);">
                        2
                    </div>
                    <h3 class="h5 mb-3" style="font-weight: 500;">Étude (48h)</h3>
                    <p class="text-muted small">Notre équipe étudie votre dossier</p>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-3">
                <div class="text-center position-relative" style="z-index: 1;">
                    <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-4" 
                         style="width: 100px; height: 100px; font-size: 2.5rem; font-weight: 300; border: 5px solid #fff; box-shadow: 0 4px 12px rgba(0,0,0,0.1);">
                        3
                    </div>
                    <h3 class="h5 mb-3" style="font-weight: 500;">Acceptation</h3>
                    <p class="text-muted small">Lettre d'admission par email</p>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-3">
                <div class="text-center position-relative" style="z-index: 1;">
                    <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-4" 
                         style="width: 100px; height: 100px; font-size: 2.5rem; font-weight: 300; border: 5px solid #fff; box-shadow: 0 4px 12px rgba(0,0,0,0.1);">
                        4
                    </div>
                    <h3 class="h5 mb-3" style="font-weight: 500;">Inscription</h3>
                    <p class="text-muted small">Finalisez et recevez votre carte</p>
                </div>
            </div>
        </div>
        
        <div class="text-center mt-5">
            <a href="{{ route('admission.create') }}" 
               class="btn btn-primary btn-lg px-5"
               style="border-radius: 0;">
                <i class="bi bi-file-earmark-text me-2"></i>
                Déposer ma candidature
            </a>
        </div>
        
        <div class="row mt-5">
            <div class="col-lg-10 mx-auto">
                <div class="card border bg-light">
                    <div class="card-body p-4">
                        <h5 class="text-center mb-4" style="font-weight: 500; font-size: 0.95rem;">
                            <i class="bi bi-folder-check text-primary me-2"></i>
                            Documents à préparer
                        </h5>
                        <div class="row">
                            <div class="col-md-6">
                                <ul class="list-unstyled mb-0 small">
                                    <li class="mb-2"><i class="bi bi-check2 text-success me-2"></i>Diplôme du BAC</li>
                                    <li class="mb-2"><i class="bi bi-check2 text-success me-2"></i>Relevé de notes</li>
                                    <li class="mb-2"><i class="bi bi-check2 text-success me-2"></i>Pièce d'identité</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul class="list-unstyled mb-0 small">
                                    <li class="mb-2"><i class="bi bi-check2 text-success me-2"></i>Photo d'identité</li>
                                    <li class="mb-2"><i class="bi bi-check2 text-success me-2"></i>Certificat de naissance</li>
                                    <li class="mb-2"><i class="bi bi-check2 text-success me-2"></i>Lettre de motivation</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Events & News Section - Titre configurable -->
<section class="py-5" style="background: #ffffff;">
    <div class="container py-5">
        <div class="row mb-5">
            <div class="col">
                <h2 class="display-5 mb-3" style="font-weight: 300; letter-spacing: -0.5px;">
                    {{ $siteSettings?->home_section_title_events ?? 'Actualités & Événements' }}
                </h2>
                @if(!empty($siteSettings?->home_section_subtitle_events))
                    <p class="text-muted" style="font-size: 1.125rem;">
                        {{ $siteSettings->home_section_subtitle_events }}
                    </p>
                @endif
            </div>
        </div>
        
        <div class="row g-4">
            <!-- Events Cards -->
            @foreach($events->take(3) as $event)
                <div class="col-md-6 col-lg-4">
                    <article class="bg-white border h-100" style="border-color: #e0e0e0 !important; transition: all 0.3s;">
                        <div class="p-4">
                            <div class="d-flex align-items-start gap-3 mb-3">
                                <div class="text-center" style="min-width: 60px;">
                                    <div class="fw-bold" style="font-size: 2rem; line-height: 1; color: var(--brand-primary);">
                                        {{ $event->starts_at->format('d') }}
                                    </div>
                                    <div class="text-uppercase small text-muted">
                                        {{ $event->starts_at->format('M') }}
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <div class="badge bg-warning text-dark mb-2" style="border-radius: 0; font-size: 0.7rem; font-weight: 500;">
                                        ÉVÉNEMENT
                                    </div>
                                    <h3 class="h5 mb-2" style="font-weight: 400; line-height: 1.3;">
                                        {{ $event->title }}
                                    </h3>
                                    <p class="text-muted small mb-2">
                                        <i class="bi bi-clock me-1"></i>
                                        {{ $event->starts_at->format('H:i') }}
                                        <span class="mx-2">•</span>
                                        <i class="bi bi-geo-alt me-1"></i>
                                        {{ Str::limit($event->location, 25) }}
                                    </p>
                                    <p class="text-muted mb-3" style="font-size: 0.9rem; line-height: 1.5;">
                                        {{ Str::limit(strip_tags($event->description), 100) }}
                                    </p>
                                    <a href="{{ route('events.index') }}" 
                                       class="text-decoration-none d-inline-flex align-items-center gap-2"
                                       style="color: var(--brand-primary); font-weight: 500; font-size: 0.875rem;">
                                        En savoir plus
                                        <svg width="14" height="14" fill="currentColor" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            @endforeach
        </div>
        
        <div class="text-center mt-5">
            <a href="{{ route('events.index') }}" 
               class="btn btn-lg px-5"
               style="background: #ffc107; color: #000; border: none; border-radius: 0; font-weight: 500; font-size: 0.9375rem;">
                Voir tous les événements
            </a>
        </div>
    </div>
</section>

<!-- News Section - Séparée -->
<section class="py-5" style="background: #f8f8f8;">
    <div class="container py-5">
        <div class="row mb-5">
            <div class="col">
                <h2 class="display-5 mb-3" style="font-weight: 300; letter-spacing: -0.5px;">
                    Dernières actualités
                </h2>
                <p class="text-muted" style="font-size: 1.125rem;">
                    Restez informé de la vie de l'IESC
                </p>
            </div>
        </div>
        
        <div class="row g-4">
            @foreach($news as $article)
                <div class="col-md-6 col-lg-4">
                    <article class="bg-white border h-100" style="border-color: #e0e0e0 !important; transition: all 0.3s;">
                        <!-- Image de mise en avant -->
                        <div style="height: 200px; overflow: hidden; background: #f5f5f5;">
                            @if($article->image)
                                <img src="{{ Storage::url($article->image) }}" 
                                     alt="{{ $article->title }}"
                                     class="w-100 h-100 object-fit-cover">
                            @else
                                <div class="w-100 h-100 d-flex align-items-center justify-content-center bg-primary bg-opacity-10">
                                    <i class="bi bi-newspaper text-primary" style="font-size: 3rem; opacity: 0.5;"></i>
                                </div>
                            @endif
                        </div>
                        
                        <div class="p-4">
                            <div class="d-flex align-items-center gap-2 mb-3">
                                <div class="badge bg-primary text-white" style="border-radius: 0; font-size: 0.7rem; font-weight: 500;">
                                    ACTUALITÉ
                                </div>
                                <div class="text-muted small">
                                    {{ $article->published_at?->format('d M Y') ?? 'Récent' }}
                                </div>
                            </div>
                            <h3 class="h5 mb-3" style="font-weight: 400; line-height: 1.3;">
                                {{ $article->title }}
                            </h3>
                            <p class="text-muted mb-3" style="font-size: 0.9rem; line-height: 1.5;">
                                {{ Str::limit(strip_tags($article->content), 100) }}
                            </p>
                            <a href="{{ route('news.index') }}" 
                               class="text-decoration-none d-inline-flex align-items-center gap-2"
                               style="color: var(--brand-primary); font-weight: 500; font-size: 0.875rem;">
                                Lire la suite
                                <svg width="14" height="14" fill="currentColor" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                </svg>
                            </a>
                        </div>
                    </article>
                </div>
            @endforeach
        </div>
        
        <div class="text-center mt-5">
            <a href="{{ route('news.index') }}" 
               class="btn btn-lg px-5"
               style="background: var(--brand-primary); color: #fff; border: none; border-radius: 0; font-weight: 500; font-size: 0.9375rem;">
                Toutes les actualités
            </a>
        </div>
    </div>
</section>

<!-- CTA Section - Image de fond et textes configurables -->
<section class="position-relative py-5 text-white" style="min-height: 400px;">
    @if(!empty($siteSettings?->home_cta_background_image))
        <img src="{{ Storage::url($siteSettings->home_cta_background_image) }}" 
             alt="CTA Background" 
             class="position-absolute w-100 h-100 object-fit-cover"
             style="z-index: 0; top: 0; left: 0;">
        <div class="position-absolute top-0 start-0 w-100 h-100 bg-black" style="opacity: 0.6; z-index: 1;"></div>
    @else
        <div class="position-absolute top-0 start-0 w-100 h-100 bg-black" style="z-index: 0;"></div>
    @endif
    
    <div class="container position-relative py-5" style="z-index: 2;">
        <div class="row justify-content-center text-center">
            <div class="col-lg-8">
                <h2 class="display-4 mb-4" style="font-weight: 300; line-height: 1.2;">
                    {{ $siteSettings?->home_cta_title ?? 'Prêt à rejoindre l\'IESC ?' }}
                </h2>
                <p class="mb-5" style="font-size: 1.25rem; font-weight: 300; opacity: 0.95;">
                    {{ $siteSettings?->home_cta_subtitle ?? 'Les inscriptions sont ouvertes. Rejoignez une institution d\'excellence.' }}
                </p>
                <div class="d-flex gap-3 justify-content-center flex-wrap">
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
