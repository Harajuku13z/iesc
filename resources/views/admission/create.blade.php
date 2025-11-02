@extends('layouts.app')

@section('title', 'Candidature - IESC')
@section('description', 'Déposez votre candidature à l\'IESC. Processus simple et rapide.')

@section('content')

<!-- Page Header -->
<section class="bg-primary text-white py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-4 fw-light mb-3">Déposer une candidature</h1>
                <p class="lead mb-0">Rejoignez l'IESC et donnez un nouvel élan à votre carrière</p>
            </div>
        </div>
    </div>
</section>

<!-- Process Steps -->
<section class="py-4 bg-light">
    <div class="container">
        <div class="row text-center">
            <div class="col">
                <div class="d-flex justify-content-center align-items-center gap-3 flex-wrap">
                    <div class="d-flex align-items-center gap-2">
                        <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                            <strong>1</strong>
                        </div>
                        <span class="fw-semibold">Remplir le formulaire</span>
                    </div>
                    <i class="bi bi-arrow-right text-muted d-none d-md-block"></i>
                    <div class="d-flex align-items-center gap-2">
                        <div class="bg-secondary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                            <strong>2</strong>
                        </div>
                        <span class="text-muted">Étude du dossier</span>
                    </div>
                    <i class="bi bi-arrow-right text-muted d-none d-md-block"></i>
                    <div class="d-flex align-items-center gap-2">
                        <div class="bg-secondary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                            <strong>3</strong>
                        </div>
                        <span class="text-muted">Confirmation</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Form Section -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <!-- Form -->
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4 p-md-5">
                        <h3 class="mb-4">Informations personnelles</h3>
                        
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="bi bi-check-circle me-2"></i>
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif
                        
                        <form method="POST" action="{{ route('admission.store') }}" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="row g-3">
                                <!-- Programme -->
                                <div class="col-12">
                                    <label for="program_id" class="form-label">Programme souhaité <span class="text-danger">*</span></label>
                                    <select class="form-select @error('program_id') is-invalid @enderror" 
                                            id="program_id" 
                                            name="program_id" 
                                            required>
                                        <option value="">Sélectionnez un programme</option>
                                        @foreach($programs as $program)
                                            <option value="{{ $program->id }}" {{ old('program_id') == $program->id ? 'selected' : '' }}>
                                                {{ $program->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('program_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <!-- Nom -->
                                <div class="col-md-6">
                                    <label for="last_name" class="form-label">Nom <span class="text-danger">*</span></label>
                                    <input type="text" 
                                           class="form-control @error('last_name') is-invalid @enderror" 
                                           id="last_name" 
                                           name="last_name" 
                                           value="{{ old('last_name') }}" 
                                           required>
                                    @error('last_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <!-- Prénom -->
                                <div class="col-md-6">
                                    <label for="first_name" class="form-label">Prénom <span class="text-danger">*</span></label>
                                    <input type="text" 
                                           class="form-control @error('first_name') is-invalid @enderror" 
                                           id="first_name" 
                                           name="first_name" 
                                           value="{{ old('first_name') }}" 
                                           required>
                                    @error('first_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <!-- Date de naissance -->
                                <div class="col-md-6">
                                    <label for="birth_date" class="form-label">Date de naissance <span class="text-danger">*</span></label>
                                    <input type="date" 
                                           class="form-control @error('birth_date') is-invalid @enderror" 
                                           id="birth_date" 
                                           name="birth_date" 
                                           value="{{ old('birth_date') }}" 
                                           required>
                                    @error('birth_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <!-- Email -->
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                    <input type="email" 
                                           class="form-control @error('email') is-invalid @enderror" 
                                           id="email" 
                                           name="email" 
                                           value="{{ old('email') }}" 
                                           required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <!-- Téléphone -->
                                <div class="col-md-6">
                                    <label for="phone" class="form-label">Téléphone <span class="text-danger">*</span></label>
                                    <input type="tel" 
                                           class="form-control @error('phone') is-invalid @enderror" 
                                           id="phone" 
                                           name="phone" 
                                           value="{{ old('phone') }}" 
                                           placeholder="+242 XX XXX XX XX"
                                           required>
                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <!-- Adresse -->
                                <div class="col-md-6">
                                    <label for="address" class="form-label">Adresse</label>
                                    <input type="text" 
                                           class="form-control @error('address') is-invalid @enderror" 
                                           id="address" 
                                           name="address" 
                                           value="{{ old('address') }}">
                                    @error('address')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <!-- Documents -->
                                <div class="col-12">
                                    <h5 class="mt-4 mb-3">Documents à joindre</h5>
                                </div>
                                
                                <div class="col-md-6">
                                    <label for="diploma" class="form-label">Diplôme (BAC ou équivalent)</label>
                                    <input type="file" 
                                           class="form-control @error('diploma') is-invalid @enderror" 
                                           id="diploma" 
                                           name="diploma"
                                           accept=".pdf,.jpg,.jpeg,.png">
                                    <div class="form-text">PDF, JPG ou PNG - Max 5 MB</div>
                                    @error('diploma')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="col-md-6">
                                    <label for="id_card" class="form-label">Pièce d'identité</label>
                                    <input type="file" 
                                           class="form-control @error('id_card') is-invalid @enderror" 
                                           id="id_card" 
                                           name="id_card"
                                           accept=".pdf,.jpg,.jpeg,.png">
                                    <div class="form-text">PDF, JPG ou PNG - Max 5 MB</div>
                                    @error('id_card')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <!-- Message -->
                                <div class="col-12">
                                    <label for="message" class="form-label">Message (optionnel)</label>
                                    <textarea class="form-control @error('message') is-invalid @enderror" 
                                              id="message" 
                                              name="message" 
                                              rows="4"
                                              placeholder="Parlez-nous de vos motivations...">{{ old('message') }}</textarea>
                                    @error('message')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <!-- Conditions -->
                                <div class="col-12">
                                    <div class="form-check">
                                        <input class="form-check-input @error('terms') is-invalid @enderror" 
                                               type="checkbox" 
                                               id="terms" 
                                               name="terms" 
                                               required>
                                        <label class="form-check-label" for="terms">
                                            J'accepte les conditions d'admission et autorise l'IESC à traiter mes données personnelles
                                        </label>
                                        @error('terms')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <!-- Submit -->
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary btn-lg w-100">
                                        <i class="bi bi-send me-2"></i>
                                        Soumettre ma candidature
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            <!-- Sidebar -->
            <div class="col-lg-4">
                <!-- Informations -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <h5 class="card-title mb-3">
                            <i class="bi bi-info-circle text-primary me-2"></i>
                            Informations
                        </h5>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-3">
                                <i class="bi bi-check-circle text-success me-2"></i>
                                <strong>Réponse sous 48h</strong>
                            </li>
                            <li class="mb-3">
                                <i class="bi bi-check-circle text-success me-2"></i>
                                <strong>Processus 100% gratuit</strong>
                            </li>
                            <li class="mb-3">
                                <i class="bi bi-check-circle text-success me-2"></i>
                                <strong>Suivi en ligne</strong>
                            </li>
                            <li class="mb-0">
                                <i class="bi bi-check-circle text-success me-2"></i>
                                <strong>Accompagnement personnalisé</strong>
                            </li>
                        </ul>
                    </div>
                </div>
                
                <!-- Documents requis -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <h5 class="card-title mb-3">
                            <i class="bi bi-file-earmark-text text-primary me-2"></i>
                            Documents requis
                        </h5>
                        <ul class="small text-muted mb-0">
                            <li class="mb-2">Copie du diplôme du BAC</li>
                            <li class="mb-2">Copie de la pièce d'identité</li>
                            <li class="mb-2">Photo d'identité récente</li>
                            <li class="mb-2">Certificat de naissance</li>
                            <li class="mb-0">Relevé de notes du BAC</li>
                        </ul>
                    </div>
                </div>
                
                <!-- Contact -->
                <div class="card border-0 bg-primary text-white">
                    <div class="card-body">
                        <h5 class="card-title mb-3">
                            <i class="bi bi-question-circle me-2"></i>
                            Besoin d'aide ?
                        </h5>
                        <p class="small mb-3">Notre équipe est à votre disposition pour répondre à vos questions.</p>
                        <a href="{{ route('contact') }}" class="btn btn-light w-100">
                            <i class="bi bi-chat-dots me-2"></i>
                            Contactez-nous
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
