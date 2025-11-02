@extends('layouts.app')

@section('title', 'Nos Programmes - IESC')
@section('description', 'Découvrez nos programmes de Licence en Droit, Gestion, Informatique et Commerce.')

@section('content')

<!-- Page Header -->
<section class="bg-primary text-white py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-4 fw-light mb-3">Nos Programmes</h1>
                <p class="lead mb-0">Des formations d'excellence adaptées aux besoins du marché africain</p>
            </div>
        </div>
    </div>
</section>

<!-- Filters -->
<section class="py-4 bg-light border-bottom">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-outline-primary active">Tous</button>
                    <button type="button" class="btn btn-outline-primary">Droit</button>
                    <button type="button" class="btn btn-outline-primary">Gestion</button>
                    <button type="button" class="btn btn-outline-primary">Informatique</button>
                    <button type="button" class="btn btn-outline-primary">Commerce</button>
                </div>
            </div>
            <div class="col-md-4 mt-3 mt-md-0">
                <input type="search" class="form-control" placeholder="Rechercher un programme...">
            </div>
        </div>
    </div>
</section>

<!-- Programs Grid -->
<section class="py-5">
    <div class="container">
        <div class="row g-4">
            @forelse($programs as $program)
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="position-relative overflow-hidden" style="height: 250px;">
                            @if($program->image)
                                <img src="{{ Storage::url($program->image) }}" 
                                     alt="{{ $program->title }}" 
                                     class="card-img-top h-100 object-fit-cover">
                            @else
                                <div class="bg-light h-100 d-flex align-items-center justify-content-center">
                                    <i class="bi bi-mortarboard text-muted" style="font-size: 4rem;"></i>
                                </div>
                            @endif
                            @if($program->is_active)
                                <span class="position-absolute top-0 end-0 m-3 badge bg-success">Inscriptions ouvertes</span>
                            @endif
                        </div>
                        <div class="card-body">
                            <h5 class="card-title mb-3">{{ $program->title }}</h5>
                            <p class="card-text text-muted">{{ Str::limit($program->description, 150) }}</p>
                            
                            <div class="d-flex gap-2 mb-3 flex-wrap">
                                <span class="badge bg-light text-dark">
                                    <i class="bi bi-clock me-1"></i>
                                    {{ $program->duration ?? '3 ans' }}
                                </span>
                                <span class="badge bg-light text-dark">
                                    <i class="bi bi-award me-1"></i>
                                    Licence
                                </span>
                            </div>
                            
                            <a href="{{ route('programs.show', $program) }}" class="btn btn-primary w-100">
                                <i class="bi bi-info-circle me-2"></i>
                                Détails du programme
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                @foreach([
                    ['title' => 'Licence en Sciences et Administration', 'desc' => 'Formation complète en gestion d\'entreprise, administration et management des organisations modernes.', 'duration' => '3 ans'],
                    ['title' => 'Licence en Informatique', 'desc' => 'Développement web, mobile et systèmes d\'information. Maîtrise des technologies actuelles.', 'duration' => '3 ans'],
                    ['title' => 'Licence en Droit', 'desc' => 'Formation juridique complète avec pratique professionnelle intensive et stages en cabinet.', 'duration' => '3 ans'],
                    ['title' => 'Licence en Commerce', 'desc' => 'Marketing, vente et gestion commerciale adaptés au marché africain et international.', 'duration' => '3 ans'],
                    ['title' => 'Licence en Comptabilité', 'desc' => 'Comptabilité, audit et gestion financière pour entreprises et organisations.', 'duration' => '3 ans'],
                    ['title' => 'Licence en Ressources Humaines', 'desc' => 'Gestion du personnel, recrutement et développement des compétences en entreprise.', 'duration' => '3 ans']
                ] as $defaultProgram)
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="bg-light d-flex align-items-center justify-content-center" style="height: 250px;">
                                <i class="bi bi-mortarboard text-muted" style="font-size: 4rem;"></i>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title mb-3">{{ $defaultProgram['title'] }}</h5>
                                <p class="card-text text-muted">{{ $defaultProgram['desc'] }}</p>
                                
                                <div class="d-flex gap-2 mb-3 flex-wrap">
                                    <span class="badge bg-light text-dark">
                                        <i class="bi bi-clock me-1"></i>
                                        {{ $defaultProgram['duration'] }}
                                    </span>
                                    <span class="badge bg-light text-dark">
                                        <i class="bi bi-award me-1"></i>
                                        Licence
                                    </span>
                                </div>
                                
                                <a href="#" class="btn btn-primary w-100">
                                    <i class="bi bi-info-circle me-2"></i>
                                    Détails du programme
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endforelse
        </div>
        
        <!-- Pagination -->
        @if(isset($programs) && $programs->hasPages())
            <div class="mt-5">
                {{ $programs->links('pagination::bootstrap-5') }}
            </div>
        @endif
    </div>
</section>

<!-- CTA -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="card border-0 shadow-sm bg-primary text-white">
            <div class="card-body p-5 text-center">
                <h3 class="mb-4">Besoin d'aide pour choisir votre formation ?</h3>
                <p class="mb-4">Nos conseillers sont à votre disposition pour vous orienter vers le programme qui correspond à vos ambitions.</p>
                <a href="{{ route('contact') }}" class="btn btn-light btn-lg px-5">
                    <i class="bi bi-chat-dots me-2"></i>
                    Contactez-nous
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
