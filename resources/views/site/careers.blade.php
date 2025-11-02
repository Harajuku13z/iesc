@extends('layouts.app')

@section('title', 'Carrières - IESC')
@section('description', 'Opportunités de carrière à l\'IESC. Rejoignez notre équipe.')

@section('content')

<!-- Page Header -->
<section class="bg-primary text-white py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-4 fw-light mb-3">Carrières à l'IESC</h1>
                <p class="lead mb-0">Rejoignez une équipe passionnée et contribuez à former les leaders de demain</p>
            </div>
        </div>
    </div>
</section>

<!-- Pourquoi rejoindre l'IESC -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-light mb-3">Pourquoi rejoindre l'IESC ?</h2>
            <p class="lead text-muted">Un environnement stimulant et des opportunités de croissance</p>
        </div>
        
        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="card border-0 h-100 text-center p-4">
                    <div class="card-body">
                        <i class="bi bi-people text-primary mb-3" style="font-size: 3rem;"></i>
                        <h5 class="card-title">Équipe dynamique</h5>
                        <p class="card-text text-muted small">Collaborez avec des professionnels passionnés</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-3">
                <div class="card border-0 h-100 text-center p-4">
                    <div class="card-body">
                        <i class="bi bi-graph-up-arrow text-primary mb-3" style="font-size: 3rem;"></i>
                        <h5 class="card-title">Évolution de carrière</h5>
                        <p class="card-text text-muted small">Développez vos compétences et progressez</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-3">
                <div class="card border-0 h-100 text-center p-4">
                    <div class="card-body">
                        <i class="bi bi-award text-primary mb-3" style="font-size: 3rem;"></i>
                        <h5 class="card-title">Formation continue</h5>
                        <p class="card-text text-muted small">Accès à des formations régulières</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-3">
                <div class="card border-0 h-100 text-center p-4">
                    <div class="card-body">
                        <i class="bi bi-heart text-primary mb-3" style="font-size: 3rem;"></i>
                        <h5 class="card-title">Avantages sociaux</h5>
                        <p class="card-text text-muted small">Packages compétitifs et avantageux</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Postes disponibles -->
<section class="py-5">
    <div class="container">
        <div class="mb-5">
            <h2 class="display-5 fw-light mb-3">Postes disponibles</h2>
            <p class="lead text-muted">Découvrez nos opportunités actuelles</p>
        </div>
        
        <div class="row g-4">
            @forelse($careers ?? [] as $career)
                <div class="col-12">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-4">
                            <div class="row align-items-center">
                                <div class="col-lg-8">
                                    <h4 class="mb-2">{{ $career->title }}</h4>
                                    <p class="text-muted mb-3">{{ Str::limit($career->description, 200) }}</p>
                                    <div class="d-flex gap-2 flex-wrap">
                                        <span class="badge bg-light text-dark">
                                            <i class="bi bi-briefcase me-1"></i>
                                            {{ $career->type ?? 'CDI' }}
                                        </span>
                                        <span class="badge bg-light text-dark">
                                            <i class="bi bi-geo-alt me-1"></i>
                                            Brazzaville
                                        </span>
                                        <span class="badge bg-light text-dark">
                                            <i class="bi bi-clock me-1"></i>
                                            Temps plein
                                        </span>
                                    </div>
                                </div>
                                <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
                                    <a href="#" class="btn btn-primary">
                                        Postuler
                                        <i class="bi bi-arrow-right ms-2"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <!-- Exemples de postes -->
                @foreach([
                    ['title' => 'Enseignant en Informatique', 'desc' => 'Nous recherchons un enseignant passionné pour nos cours de développement web et programmation. Expérience en entreprise souhaitée.', 'type' => 'CDI'],
                    ['title' => 'Enseignant en Droit', 'desc' => 'Poste d\'enseignant en droit des affaires et droit civil. Diplôme de Master requis et expérience en cabinet d\'avocats.', 'type' => 'CDI'],
                    ['title' => 'Conseiller en orientation', 'desc' => 'Accompagnement des étudiants dans leur parcours académique et professionnel. Excellentes compétences relationnelles requises.', 'type' => 'CDD'],
                    ['title' => 'Responsable administratif', 'desc' => 'Gestion administrative de l\'établissement. Maîtrise des outils bureautiques et expérience en gestion requise.', 'type' => 'CDI']
                ] as $job)
                    <div class="col-12">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body p-4">
                                <div class="row align-items-center">
                                    <div class="col-lg-8">
                                        <h4 class="mb-2">{{ $job['title'] }}</h4>
                                        <p class="text-muted mb-3">{{ $job['desc'] }}</p>
                                        <div class="d-flex gap-2 flex-wrap">
                                            <span class="badge bg-light text-dark">
                                                <i class="bi bi-briefcase me-1"></i>
                                                {{ $job['type'] }}
                                            </span>
                                            <span class="badge bg-light text-dark">
                                                <i class="bi bi-geo-alt me-1"></i>
                                                Brazzaville
                                            </span>
                                            <span class="badge bg-light text-dark">
                                                <i class="bi bi-clock me-1"></i>
                                                Temps plein
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
                                        <a href="{{ route('contact') }}" class="btn btn-primary">
                                            Postuler
                                            <i class="bi bi-arrow-right ms-2"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endforelse
        </div>
        
        <!-- Candidature spontanée -->
        <div class="mt-5">
            <div class="card border-0 bg-dark text-white">
                <div class="card-body p-5 text-center">
                    <h3 class="mb-3">Vous ne trouvez pas le poste qui vous convient ?</h3>
                    <p class="mb-4">Envoyez-nous une candidature spontanée. Nous sommes toujours à la recherche de talents.</p>
                    <a href="{{ route('contact') }}" class="btn btn-light btn-lg px-5">
                        <i class="bi bi-file-person me-2"></i>
                        Candidature spontanée
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
