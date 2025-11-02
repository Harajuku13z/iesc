@extends('layouts.app')

@section('title', 'Actualités & Événements - IESC')
@section('description', 'Restez informé de l\'actualité de l\'IESC et de nos événements.')

@section('content')

<!-- Page Header -->
<section class="bg-primary text-white py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-4 fw-light mb-3">Actualités & Événements</h1>
                <p class="lead mb-0">Restez connecté à la vie de l'IESC</p>
            </div>
        </div>
    </div>
</section>

<!-- Tabs Navigation -->
<section class="py-4 bg-light border-bottom">
    <div class="container">
        <ul class="nav nav-pills nav-fill" id="newsEventsTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="all-tab" data-bs-toggle="pill" data-bs-target="#all" type="button">
                    <i class="bi bi-grid me-2"></i>
                    Tout
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="news-tab" data-bs-toggle="pill" data-bs-target="#news" type="button">
                    <i class="bi bi-newspaper me-2"></i>
                    Actualités
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="events-tab" data-bs-toggle="pill" data-bs-target="#events" type="button">
                    <i class="bi bi-calendar-event me-2"></i>
                    Événements
                </button>
            </li>
        </ul>
    </div>
</section>

<!-- Content -->
<section class="py-5">
    <div class="container">
        <div class="tab-content" id="newsEventsTabsContent">
            <!-- All Tab -->
            <div class="tab-pane fade show active" id="all">
                <div class="row g-4">
                    <!-- Featured News -->
                    <div class="col-12">
                        <div class="card border-0 shadow-sm overflow-hidden">
                            <div class="row g-0">
                                <div class="col-md-5">
                                    <div class="bg-primary h-100 d-flex align-items-center justify-content-center" style="min-height: 300px;">
                                        <i class="bi bi-newspaper text-white" style="font-size: 5rem; opacity: 0.3;"></i>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="card-body p-4 p-md-5">
                                        <div class="d-flex align-items-center gap-2 mb-3">
                                            <span class="badge bg-primary">À la une</span>
                                            <span class="text-muted small">{{ now()->format('d M Y') }}</span>
                                        </div>
                                        <h3 class="card-title mb-3">Ouverture des inscriptions 2025-2026</h3>
                                        <p class="card-text text-muted mb-4">
                                            Les candidatures pour l'année académique 2025-2026 sont officiellement ouvertes. 
                                            Ne manquez pas cette opportunité de rejoindre l'une des meilleures institutions d'enseignement supérieur du Congo.
                                        </p>
                                        <a href="#" class="btn btn-primary">
                                            Lire la suite
                                            <i class="bi bi-arrow-right ms-2"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- News Grid -->
                    @foreach([
                        ['title' => 'Journée Portes Ouvertes - Mars 2025', 'date' => '15 Mars 2025', 'type' => 'event', 'desc' => 'Venez découvrir nos campus, rencontrer nos enseignants et échanger avec nos étudiants.'],
                        ['title' => 'Nouveaux partenariats avec les entreprises', 'date' => '10 Fév 2025', 'type' => 'news', 'desc' => 'L\'IESC renforce ses partenariats pour garantir l\'emploi de nos diplômés.'],
                        ['title' => 'Conférence sur l\'Intelligence Artificielle', 'date' => '5 Fév 2025', 'type' => 'event', 'desc' => 'Conférence animée par des experts du domaine pour nos étudiants en Informatique.'],
                        ['title' => 'Remise des diplômes 2024', 'date' => '20 Jan 2025', 'type' => 'event', 'desc' => 'Cérémonie de remise des diplômes pour la promotion 2024. Félicitations à nos diplômés !'],
                        ['title' => 'Nouveau laboratoire informatique', 'date' => '15 Jan 2025', 'type' => 'news', 'desc' => 'Inauguration d\'un laboratoire équipé des dernières technologies pour nos étudiants.'],
                        ['title' => 'Stage d\'excellence chez Total Energies', 'date' => '10 Jan 2025', 'type' => 'news', 'desc' => '5 de nos étudiants ont décroché un stage dans cette grande entreprise.']
                    ] as $item)
                        <div class="col-md-6 col-lg-4">
                            <div class="card border-0 shadow-sm h-100">
                                <div class="bg-{{ $item['type'] == 'event' ? 'warning' : 'primary' }} bg-opacity-10 p-5 text-center">
                                    <i class="bi bi-{{ $item['type'] == 'event' ? 'calendar-event' : 'newspaper' }} text-{{ $item['type'] == 'event' ? 'warning' : 'primary' }}" style="font-size: 3rem;"></i>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex align-items-center gap-2 mb-2">
                                        <span class="badge bg-{{ $item['type'] == 'event' ? 'warning' : 'primary' }}">
                                            {{ $item['type'] == 'event' ? 'Événement' : 'Actualité' }}
                                        </span>
                                        <span class="text-muted small">{{ $item['date'] }}</span>
                                    </div>
                                    <h5 class="card-title mb-3">{{ $item['title'] }}</h5>
                                    <p class="card-text text-muted small">{{ $item['desc'] }}</p>
                                    <a href="#" class="btn btn-sm btn-outline-primary">
                                        En savoir plus
                                        <i class="bi bi-arrow-right ms-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            
            <!-- News Tab -->
            <div class="tab-pane fade" id="news">
                <div class="row g-4">
                    <div class="col-12">
                        <p class="text-muted">Filtré par actualités uniquement...</p>
                    </div>
                </div>
            </div>
            
            <!-- Events Tab -->
            <div class="tab-pane fade" id="events">
                <div class="row g-4">
                    <div class="col-12">
                        <p class="text-muted">Filtré par événements uniquement...</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Newsletter -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="card border-0 shadow-sm">
            <div class="card-body p-5">
                <div class="row align-items-center">
                    <div class="col-lg-7">
                        <h3 class="mb-2">Restez informé</h3>
                        <p class="text-muted mb-lg-0">Inscrivez-vous à notre newsletter pour recevoir nos actualités</p>
                    </div>
                    <div class="col-lg-5">
                        <form class="d-flex gap-2">
                            <input type="email" class="form-control" placeholder="Votre email">
                            <button type="submit" class="btn btn-primary text-nowrap">
                                S'abonner
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
