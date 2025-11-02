@extends('layouts.app')

@section('title', 'Contact - IESC')
@section('description', 'Contactez l\'IESC. Nous sommes à votre écoute.')

@section('content')

<!-- Page Header -->
<section class="bg-primary text-white py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-4 fw-light mb-3">Contactez-nous</h1>
                <p class="lead mb-0">Notre équipe est à votre disposition pour répondre à toutes vos questions</p>
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section class="py-5">
    <div class="container">
        <div class="row g-5">
            <!-- Contact Form -->
            <div class="col-lg-7">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4 p-md-5">
                        <h3 class="mb-4">Envoyez-nous un message</h3>
                        
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show">
                                <i class="bi bi-check-circle me-2"></i>
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif
                        
                        <form method="POST" action="{{ route('contact.send') }}">
                            @csrf
                            
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="name" class="form-label">Nom complet <span class="text-danger">*</span></label>
                                    <input type="text" 
                                           class="form-control @error('name') is-invalid @enderror" 
                                           id="name" 
                                           name="name" 
                                           value="{{ old('name') }}" 
                                           required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
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
                                
                                <div class="col-md-6">
                                    <label for="phone" class="form-label">Téléphone</label>
                                    <input type="tel" 
                                           class="form-control @error('phone') is-invalid @enderror" 
                                           id="phone" 
                                           name="phone" 
                                           value="{{ old('phone') }}">
                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="col-md-6">
                                    <label for="subject" class="form-label">Sujet <span class="text-danger">*</span></label>
                                    <select class="form-select @error('subject') is-invalid @enderror" 
                                            id="subject" 
                                            name="subject" 
                                            required>
                                        <option value="">Choisir un sujet</option>
                                        <option value="admission">Informations sur l'admission</option>
                                        <option value="programs">Questions sur les programmes</option>
                                        <option value="fees">Frais de scolarité</option>
                                        <option value="visit">Visite du campus</option>
                                        <option value="other">Autre</option>
                                    </select>
                                    @error('subject')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="col-12">
                                    <label for="message" class="form-label">Message <span class="text-danger">*</span></label>
                                    <textarea class="form-control @error('message') is-invalid @enderror" 
                                              id="message" 
                                              name="message" 
                                              rows="6" 
                                              required>{{ old('message') }}</textarea>
                                    @error('message')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary btn-lg w-100">
                                        <i class="bi bi-send me-2"></i>
                                        Envoyer le message
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            <!-- Contact Info -->
            <div class="col-lg-5">
                <!-- Address -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-4">
                        <h5 class="card-title mb-4">
                            <i class="bi bi-geo-alt text-primary me-2"></i>
                            Adresse
                        </h5>
                        <p class="mb-0">
                            {{ $siteSettings->contact_address ?? '112, Avenue de France, Poto-poto' }}<br>
                            Brazzaville, Congo
                        </p>
                    </div>
                </div>
                
                <!-- Phone -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-4">
                        <h5 class="card-title mb-4">
                            <i class="bi bi-telephone text-primary me-2"></i>
                            Téléphone
                        </h5>
                        <p class="mb-0">
                            <a href="tel:{{ $siteSettings->contact_phone ?? '+242 06 541 98 91' }}" 
                               class="text-decoration-none text-dark">
                                {{ $siteSettings->contact_phone ?? '+242 06 541 98 91' }}
                            </a>
                        </p>
                    </div>
                </div>
                
                <!-- Email -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-4">
                        <h5 class="card-title mb-4">
                            <i class="bi bi-envelope text-primary me-2"></i>
                            Email
                        </h5>
                        <p class="mb-0">
                            <a href="mailto:{{ $siteSettings->contact_email ?? 'contact@iesc.cg' }}" 
                               class="text-decoration-none text-dark">
                                {{ $siteSettings->contact_email ?? 'contact@iesc.cg' }}
                            </a>
                        </p>
                    </div>
                </div>
                
                <!-- Horaires -->
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <h5 class="card-title mb-4">
                            <i class="bi bi-clock text-primary me-2"></i>
                            Horaires d'ouverture
                        </h5>
                        <ul class="list-unstyled mb-0 small">
                            <li class="mb-2 d-flex justify-content-between">
                                <span>Lundi - Vendredi</span>
                                <strong>8h00 - 17h00</strong>
                            </li>
                            <li class="mb-2 d-flex justify-content-between">
                                <span>Samedi</span>
                                <strong>9h00 - 13h00</strong>
                            </li>
                            <li class="d-flex justify-content-between">
                                <span>Dimanche</span>
                                <strong>Fermé</strong>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Map Section (Optional) -->
<section class="bg-light py-5">
    <div class="container">
        <div class="card border-0 shadow-sm">
            <div class="card-body p-0">
                <div class="ratio ratio-21x9">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.8354345096!2d15.2663!3d-4.2634!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNMKwMTUnNDguMiJTIDE1wrAxNSc1OC43IkU!5e0!3m2!1sfr!2scg!4v1234567890" 
                            style="border:0;" 
                            allowfullscreen="" 
                            loading="lazy">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
