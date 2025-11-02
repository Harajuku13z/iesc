@extends('layouts.app')

@section('title', 'IESC - Institut d\'Enseignement Supérieur du Congo')
@section('description', 'Formez-vous aux métiers d\'avenir en Droit, Gestion et Informatique. Inscriptions en cours.')

@section('content')

<!-- Hero Section avec Video Background -->
<section class="relative min-h-[90vh] flex items-center overflow-hidden bg-gradient-to-br from-primary-900 via-primary-800 to-primary-700">
    <div class="absolute inset-0 bg-black opacity-40 z-0"></div>
    
    @if(!empty($siteSettings?->home_hero_image))
        <div class="absolute inset-0 z-0">
            <img src="{{ Storage::url($siteSettings->home_hero_image) }}" 
                 alt="Campus IESC" 
                 class="w-full h-full object-cover">
        </div>
        <div class="absolute inset-0 bg-gradient-to-r from-black/70 to-black/40 z-0"></div>
    @endif
    
    <div class="container mx-auto px-4 relative z-10 py-20">
        <div class="max-w-4xl">
            <!-- Badge -->
            <div class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-md text-white px-6 py-3 rounded-full mb-6 border border-white/20">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                </svg>
                <span class="font-semibold">Excellence Académique depuis 2009</span>
            </div>
            
            <h1 class="text-5xl md:text-7xl font-extrabold text-white mb-6 leading-tight">
                {{ $siteSettings?->home_hero_title ?? 'IESC : Votre Tremplin vers l\'Excellence' }}
            </h1>
            
            <p class="text-xl md:text-2xl text-white/90 mb-8 leading-relaxed max-w-2xl">
                {{ $siteSettings?->home_hero_subtitle ?? 'Formez-vous aux métiers d\'avenir au Congo. Inscriptions 2025-2026 en cours !' }}
            </p>
            
            <div class="flex flex-wrap gap-4 mb-12">
                <a href="{{ route('admission.create') }}" 
                   class="inline-flex items-center gap-2 bg-white text-primary-700 px-8 py-4 rounded-xl font-bold text-lg shadow-2xl hover:shadow-white/20 hover:scale-105 transition-all duration-300">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    Postuler maintenant
                </a>
                
                <a href="{{ route('programs.index') }}" 
                   class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-md text-white border-2 border-white/30 px-8 py-4 rounded-xl font-bold text-lg hover:bg-white/20 transition-all duration-300">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25"></path>
                    </svg>
                    Découvrir nos formations
                </a>
            </div>
            
            <!-- Stats rapides -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <div class="bg-white/10 backdrop-blur-md rounded-xl p-4 border border-white/20">
                    <div class="text-3xl font-bold text-white mb-1">{{ $siteSettings?->stat_1_number ?? '4' }}</div>
                    <div class="text-sm text-white/80">{{ $siteSettings?->stat_1_label ?? 'Filières' }}</div>
                </div>
                <div class="bg-white/10 backdrop-blur-md rounded-xl p-4 border border-white/20">
                    <div class="text-3xl font-bold text-white mb-1">{{ $siteSettings?->stat_2_number ?? '95%' }}</div>
                    <div class="text-sm text-white/80">Insertion pro.</div>
                </div>
                <div class="bg-white/10 backdrop-blur-md rounded-xl p-4 border border-white/20">
                    <div class="text-3xl font-bold text-white mb-1">{{ $siteSettings?->stat_3_number ?? '500+' }}</div>
                    <div class="text-sm text-white/80">Étudiants</div>
                </div>
                <div class="bg-white/10 backdrop-blur-md rounded-xl p-4 border border-white/20">
                    <div class="text-3xl font-bold text-white mb-1">{{ $siteSettings?->stat_4_number ?? '100%' }}</div>
                    <div class="text-sm text-white/80">Stage garanti</div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Scroll indicator -->
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 z-10 animate-bounce">
        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
        </svg>
    </div>
</section>

<!-- Bande d'actualités défilante -->
<div class="bg-primary-600 text-white py-3 overflow-hidden">
    <div class="flex items-center gap-8 animate-scroll">
        <div class="flex items-center gap-2 whitespace-nowrap">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
            </svg>
            <span class="font-semibold">NOUVEAU:</span>
            <span>{{ $siteSettings?->home_cta_title ?? 'Inscriptions ouvertes pour l\'année 2025-2026' }}</span>
        </div>
        <span class="text-white/50">•</span>
        <div class="whitespace-nowrap">
            <span class="font-semibold">Journée Portes Ouvertes</span> - Samedi 15 Mars 2025
        </div>
        <span class="text-white/50">•</span>
        <div class="whitespace-nowrap">
            Stage garanti pour tous nos diplômés
        </div>
    </div>
</div>

<!-- Section À Propos avec Image -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div class="order-2 lg:order-1">
                @if(!empty($siteSettings?->home_about_image))
                    <div class="relative">
                        <div class="absolute -inset-4 bg-gradient-to-r from-primary-600 to-primary-400 rounded-3xl opacity-20 blur-2xl"></div>
                        <img src="{{ Storage::url($siteSettings->home_about_image) }}" 
                             alt="À propos IESC" 
                             class="relative rounded-2xl shadow-2xl w-full h-auto object-contain">
                        
                        <!-- Badge flottant -->
                        <div class="absolute -bottom-6 -right-6 bg-white rounded-2xl shadow-xl p-6 max-w-xs">
                            <div class="flex items-center gap-4">
                                <div class="bg-primary-100 p-3 rounded-xl">
                                    <svg class="w-8 h-8 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <div class="font-bold text-2xl text-gray-900">15+</div>
                                    <div class="text-sm text-gray-600">Années d'excellence</div>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="bg-gradient-to-br from-primary-100 to-primary-50 rounded-2xl p-12 flex items-center justify-center min-h-[400px]">
                        <x-heroicon-o-building-library class="w-32 h-32 text-primary-600" />
                    </div>
                @endif
            </div>
            
            <div class="order-1 lg:order-2">
                <div class="inline-block bg-primary-100 text-primary-700 px-4 py-2 rounded-full font-semibold text-sm mb-4">
                    À PROPOS DE L'IESC
                </div>
                
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6 leading-tight">
                    {{ $siteSettings?->home_about_title ?? 'L\'Excellence au service de votre avenir' }}
                </h2>
                
                <p class="text-lg text-gray-700 mb-6 leading-relaxed">
                    {{ $siteSettings?->home_about_text ?? 'L\'IESC offre une formation supérieure de pointe. Nous préparons les futurs professionnels grâce à des Licences adaptées au marché.' }}
                </p>
                
                <div class="grid grid-cols-2 gap-4 mb-8">
                    <div class="flex items-start gap-3">
                        <div class="bg-primary-600 p-2 rounded-lg flex-shrink-0">
                            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 mb-1">Formation de qualité</h4>
                            <p class="text-sm text-gray-600">Programmes reconnus</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start gap-3">
                        <div class="bg-primary-600 p-2 rounded-lg flex-shrink-0">
                            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 mb-1">Campus moderne</h4>
                            <p class="text-sm text-gray-600">Équipements high-tech</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start gap-3">
                        <div class="bg-primary-600 p-2 rounded-lg flex-shrink-0">
                            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 mb-1">Stage garanti</h4>
                            <p class="text-sm text-gray-600">100% des étudiants</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start gap-3">
                        <div class="bg-primary-600 p-2 rounded-lg flex-shrink-0">
                            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 mb-1">Insertion pro</h4>
                            <p class="text-sm text-gray-600">95% de réussite</p>
                        </div>
                    </div>
                </div>
                
                <a href="{{ route('contact') }}" 
                   class="inline-flex items-center gap-2 bg-primary-600 text-white px-6 py-3 rounded-xl font-semibold hover:bg-primary-700 transition-colors">
                    En savoir plus
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Section Avantages / Pourquoi l'IESC -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <div class="inline-block bg-primary-100 text-primary-700 px-4 py-2 rounded-full font-semibold text-sm mb-4">
                NOS AVANTAGES
            </div>
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                Pourquoi choisir l'IESC ?
            </h2>
            <p class="text-xl text-gray-600">
                Découvrez les avantages qui font de l'IESC votre meilleur choix pour vos études supérieures
            </p>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="group bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl p-8 hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                <div class="bg-blue-600 w-16 h-16 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">
                    {{ $siteSettings?->advantage_1_title ?? 'STAGE PROFESSIONNEL GARANTI' }}
                </h3>
                <p class="text-gray-700">
                    {{ $siteSettings?->advantage_1_text ?? 'Un stage assuré pour chaque diplômé' }}
                </p>
            </div>
            
            <div class="group bg-gradient-to-br from-purple-50 to-purple-100 rounded-2xl p-8 hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                <div class="bg-purple-600 w-16 h-16 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">
                    {{ $siteSettings?->advantage_2_title ?? 'FILIÈRES À FORT EMPLOI' }}
                </h3>
                <p class="text-gray-700">
                    {{ $siteSettings?->advantage_2_text ?? 'Formez-vous aux métiers les plus demandés' }}
                </p>
            </div>
            
            <div class="group bg-gradient-to-br from-green-50 to-green-100 rounded-2xl p-8 hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                <div class="bg-green-600 w-16 h-16 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">
                    {{ $siteSettings?->advantage_3_title ?? 'CADRE D\'ÉTUDE MODERNE' }}
                </h3>
                <p class="text-gray-700">
                    {{ $siteSettings?->advantage_3_text ?? 'Salles climatisées et équipements modernes' }}
                </p>
            </div>
            
            <div class="group bg-gradient-to-br from-orange-50 to-orange-100 rounded-2xl p-8 hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                <div class="bg-orange-600 w-16 h-16 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">
                    {{ $siteSettings?->advantage_4_title ?? 'FACILITÉ D\'ACHAT DE PC' }}
                </h3>
                <p class="text-gray-700">
                    {{ $siteSettings?->advantage_4_text ?? 'Ordinateurs à crédit pour tous les étudiants' }}
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Section Programmes/Formations -->
<section class="py-20 bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 text-white relative overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'0.4\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
    </div>
    
    <div class="container mx-auto px-4 relative z-10">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <div class="inline-block bg-primary-600 text-white px-4 py-2 rounded-full font-semibold text-sm mb-4">
                NOS FORMATIONS
            </div>
            <h2 class="text-4xl md:text-5xl font-bold mb-6">
                {{ $siteSettings?->home_section_title_programs ?? 'Nos 4 Pôles d\'Excellence en Licence' }}
            </h2>
            <p class="text-xl text-gray-300">
                {{ $siteSettings?->home_section_subtitle_programs ?? 'Sciences, Droit, Informatique : La voie qui vous mènera au succès professionnel' }}
            </p>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
            @forelse($programs as $program)
                <div class="group bg-white text-gray-900 rounded-2xl overflow-hidden hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                    <div class="h-48 bg-gradient-to-br from-primary-600 to-primary-400 relative overflow-hidden">
                        @if($program->image)
                            <img src="{{ Storage::url($program->image) }}" 
                                 alt="{{ $program->title }}" 
                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        @else
                            <div class="w-full h-full flex items-center justify-center">
                                <x-heroicon-o-academic-cap class="w-20 h-20 text-white opacity-50" />
                            </div>
                        @endif
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                    </div>
                    
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-3 line-clamp-2">{{ $program->title }}</h3>
                        <p class="text-gray-600 mb-4 line-clamp-3">{{ Str::limit($program->description, 120) }}</p>
                        
                        <a href="{{ route('programs.show', $program) }}" 
                           class="inline-flex items-center gap-2 text-primary-600 font-semibold hover:gap-3 transition-all">
                            En savoir plus
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            @empty
                <!-- Programmes par défaut si aucun n'existe -->
                @foreach([
                    ['title' => 'Licence en Sciences & Administration', 'icon' => 'M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z', 'desc' => 'Formation complète en gestion et administration d\'entreprise'],
                    ['title' => 'Licence en Informatique', 'icon' => 'M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z', 'desc' => 'Développement web, mobile et systèmes d\'information'],
                    ['title' => 'Licence en Droit', 'icon' => 'M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3', 'desc' => 'Formation juridique complète et pratique professionnelle'],
                    ['title' => 'Licence en Commerce', 'icon' => 'M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z', 'desc' => 'Marketing, vente et gestion commerciale']
                ] as $defaultProgram)
                    <div class="group bg-white text-gray-900 rounded-2xl overflow-hidden hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                        <div class="h-48 bg-gradient-to-br from-primary-600 to-primary-400 flex items-center justify-center">
                            <svg class="w-20 h-20 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $defaultProgram['icon'] }}"></path>
                            </svg>
                        </div>
                        
                        <div class="p-6">
                            <h3 class="text-xl font-bold mb-3">{{ $defaultProgram['title'] }}</h3>
                            <p class="text-gray-600 mb-4">{{ $defaultProgram['desc'] }}</p>
                            
                            <a href="{{ route('programs.index') }}" 
                               class="inline-flex items-center gap-2 text-primary-600 font-semibold hover:gap-3 transition-all">
                                En savoir plus
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                @endforeach
            @endforelse
        </div>
        
        <div class="text-center">
            <a href="{{ route('programs.index') }}" 
               class="inline-flex items-center gap-2 bg-white text-gray-900 px-8 py-4 rounded-xl font-bold text-lg hover:shadow-2xl hover:scale-105 transition-all duration-300">
                Voir toutes les formations
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                </svg>
            </a>
        </div>
    </div>
</section>

<!-- Section Témoignages -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <div class="inline-block bg-primary-100 text-primary-700 px-4 py-2 rounded-full font-semibold text-sm mb-4">
                TÉMOIGNAGES
            </div>
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                Ce que disent nos étudiants
            </h2>
        </div>
        
        <div class="grid md:grid-cols-3 gap-8">
            @foreach([
                ['name' => 'Marie K.', 'program' => 'Licence en Informatique', 'text' => 'L\'IESC m\'a permis d\'acquérir des compétences solides et de décrocher un stage dans une grande entreprise. Les professeurs sont excellents !'],
                ['name' => 'Jean-Paul M.', 'program' => 'Licence en Droit', 'text' => 'Grâce à la formation de qualité et au suivi personnalisé, j\'ai pu intégrer un cabinet d\'avocats dès l\'obtention de mon diplôme.'],
                ['name' => 'Sarah N.', 'program' => 'Licence en Commerce', 'text' => 'Les infrastructures modernes et l\'accompagnement vers l\'emploi font vraiment la différence. Je recommande vivement l\'IESC !']
            ] as $testimonial)
                <div class="bg-gray-50 rounded-2xl p-8 relative">
                    <div class="absolute top-6 left-6 text-primary-600 opacity-20">
                        <svg class="w-12 h-12" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
                        </svg>
                    </div>
                    
                    <p class="text-gray-700 mb-6 relative z-10 italic">
                        "{{ $testimonial['text'] }}"
                    </p>
                    
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-primary-600 rounded-full flex items-center justify-center text-white font-bold text-lg">
                            {{ substr($testimonial['name'], 0, 1) }}
                        </div>
                        <div>
                            <div class="font-bold text-gray-900">{{ $testimonial['name'] }}</div>
                            <div class="text-sm text-gray-600">{{ $testimonial['program'] }}</div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Section CTA Final -->
<section class="py-20 bg-gradient-to-r from-primary-600 to-primary-700 text-white relative overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width=\'100\' height=\'100\' viewBox=\'0 0 100 100\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cpath d=\'M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z\' fill=\'%23ffffff\' fill-opacity=\'0.4\' fill-rule=\'evenodd\'/%3E%3C/svg%3E');"></div>
    </div>
    
    <div class="container mx-auto px-4 relative z-10">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-4xl md:text-5xl font-bold mb-6">
                {{ $siteSettings?->home_cta_title ?? 'Prêt à commencer votre aventure ?' }}
            </h2>
            
            <p class="text-xl mb-8 text-white/90">
                {{ $siteSettings?->home_cta_subtitle ?? 'Les places sont limitées. Réservez votre avenir professionnel dès aujourd\'hui !' }}
            </p>
            
            <div class="flex flex-wrap gap-4 justify-center">
                <a href="{{ route('admission.create') }}" 
                   class="inline-flex items-center gap-2 bg-white text-primary-700 px-8 py-4 rounded-xl font-bold text-lg shadow-2xl hover:shadow-white/20 hover:scale-105 transition-all duration-300">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    Déposer ma candidature
                </a>
                
                <a href="{{ route('contact') }}" 
                   class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-md text-white border-2 border-white/30 px-8 py-4 rounded-xl font-bold text-lg hover:bg-white/20 transition-all duration-300">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                    Nous contacter
                </a>
            </div>
            
            <!-- Contact rapide -->
            <div class="mt-12 pt-8 border-t border-white/20">
                <div class="grid md:grid-cols-3 gap-6 text-center">
                    <div>
                        <div class="flex items-center justify-center gap-2 mb-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                            <span class="font-semibold">Téléphone</span>
                        </div>
                        <a href="tel:+24206541989" class="text-white/80 hover:text-white">+242 06 541 98 91</a>
                    </div>
                    
                    <div>
                        <div class="flex items-center justify-center gap-2 mb-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            <span class="font-semibold">Email</span>
                        </div>
                        <a href="mailto:contact@iesc.cg" class="text-white/80 hover:text-white">contact@iesc.cg</a>
                    </div>
                    
                    <div>
                        <div class="flex items-center justify-center gap-2 mb-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <span class="font-semibold">Adresse</span>
                        </div>
                        <span class="text-white/80">112, Avenue de France, Poto-poto</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('styles')
<style>
    @keyframes scroll {
        0% {
            transform: translateX(0);
        }
        100% {
            transform: translateX(-50%);
        }
    }
    
    .animate-scroll {
        animation: scroll 20s linear infinite;
        display: flex;
        width: max-content;
    }
    
    .animate-scroll > * {
        flex-shrink: 0;
    }
    
    /* Duplicate content for seamless loop */
    .animate-scroll::after {
        content: attr(data-content);
        display: flex;
        gap: 2rem;
        padding-left: 2rem;
    }
</style>
@endpush
