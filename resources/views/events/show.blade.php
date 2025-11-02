@extends('layouts.app')

@section('title', $item->title . ' - ' . ($siteSettings->site_name ?? 'IESC Université'))
@section('description', Str::limit(strip_tags($item->description), 160))

@push('styles')
<style>
/* Event Detail Styles */
.event-detail-hero {
    background: linear-gradient(135deg, var(--primary-color), var(--primary-light));
    color: white;
    padding: 6rem 0 4rem;
    position: relative;
    overflow: hidden;
}

.event-detail-hero::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="50" cy="50" r="1" fill="rgba(255,255,255,0.1)"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
    opacity: 0.3;
}

.event-detail-content {
    position: relative;
    z-index: 2;
}

.event-type-badge {
    display: inline-block;
    background: rgba(255, 255, 255, 0.2);
    color: white;
    padding: 0.75rem 1.5rem;
    border-radius: 25px;
    font-size: 0.875rem;
    font-weight: 600;
    margin-bottom: 1.5rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    backdrop-filter: blur(10px);
}

.event-title {
    font-size: clamp(2.5rem, 5vw, 4rem);
    font-weight: 800;
    margin-bottom: 1.5rem;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
    line-height: 1.2;
}

.event-meta {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 2rem;
    margin-top: 3rem;
}

.meta-card {
    background: rgba(255, 255, 255, 0.1);
    padding: 2rem;
    border-radius: var(--border-radius);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.meta-icon {
    font-size: 2rem;
    color: white;
    margin-bottom: 1rem;
    display: block;
}

.meta-label {
    font-size: 0.875rem;
    opacity: 0.8;
    margin-bottom: 0.5rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.meta-value {
    font-size: 1.25rem;
    font-weight: 600;
    color: white;
}

.event-detail-section {
    padding: 6rem 0;
    background: var(--bg-white);
}

.event-description {
    font-size: 1.125rem;
    line-height: 1.8;
    color: var(--text-dark);
    margin-bottom: 3rem;
}

.event-description h2,
.event-description h3,
.event-description h4 {
    color: var(--primary-color);
    margin-top: 2rem;
    margin-bottom: 1rem;
}

.event-description ul,
.event-description ol {
    margin: 1rem 0;
    padding-left: 2rem;
}

.event-description li {
    margin-bottom: 0.5rem;
}

.event-actions {
    display: flex;
    gap: 1rem;
    flex-wrap: wrap;
    margin-top: 3rem;
    padding: 2rem;
    background: var(--bg-light);
    border-radius: var(--border-radius);
}

.btn-event-primary {
    background: var(--primary-color);
    color: white;
    padding: 1rem 2rem;
    border-radius: 25px;
    text-decoration: none;
    font-weight: 600;
    font-size: 1.125rem;
    transition: var(--transition);
    border: 2px solid var(--primary-color);
    display: inline-flex;
    align-items: center;
    gap: 0.75rem;
}

.btn-event-primary:hover {
    background: var(--primary-light);
    color: white;
    transform: translateY(-2px);
    box-shadow: var(--shadow-medium);
}

.btn-event-secondary {
    background: transparent;
    color: var(--primary-color);
    padding: 1rem 2rem;
    border-radius: 25px;
    text-decoration: none;
    font-weight: 600;
    font-size: 1.125rem;
    transition: var(--transition);
    border: 2px solid var(--primary-color);
    display: inline-flex;
    align-items: center;
    gap: 0.75rem;
}

.btn-event-secondary:hover {
    background: var(--primary-color);
    color: white;
    transform: translateY(-2px);
    box-shadow: var(--shadow-medium);
}

.back-to-events {
    margin-bottom: 2rem;
}

.back-link {
    color: var(--primary-color);
    text-decoration: none;
    font-weight: 600;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    transition: var(--transition);
}

.back-link:hover {
    color: var(--primary-light);
    transform: translateX(-5px);
}

/* Responsive */
@media (max-width: 768px) {
    .event-meta {
        grid-template-columns: 1fr;
        gap: 1rem;
    }
    
    .meta-card {
        padding: 1.5rem;
    }
    
    .event-actions {
        flex-direction: column;
        align-items: stretch;
    }
    
    .btn-event-primary,
    .btn-event-secondary {
        justify-content: center;
    }
}
</style>
@endpush

@section('content')
<!-- Event Detail Hero -->
<section class="event-detail-hero">
    <div class="container">
        <div class="event-detail-content">
            <div class="back-to-events">
                <a href="{{ route('events.index') }}" class="back-link">
                    <i class="fas fa-arrow-left"></i>
                    Retour aux événements
                </a>
            </div>
            
            <span class="event-type-badge">{{ ucfirst($item->type) }}</span>
            <h1 class="event-title">{{ $item->title }}</h1>
            
            <div class="event-meta">
                <div class="meta-card">
                    <i class="fas fa-calendar meta-icon"></i>
                    <div class="meta-label">Date</div>
                    <div class="meta-value">{{ $item->starts_at->format('d F Y') }}</div>
                </div>
                
                <div class="meta-card">
                    <i class="fas fa-clock meta-icon"></i>
                    <div class="meta-label">Heure</div>
                    <div class="meta-value">
                        {{ $item->starts_at->format('H:i') }}
            @if($item->ends_at)
                            - {{ $item->ends_at->format('H:i') }}
                        @endif
                    </div>
                </div>
                
                @if($item->location)
                    <div class="meta-card">
                        <i class="fas fa-map-marker-alt meta-icon"></i>
                        <div class="meta-label">Lieu</div>
                        <div class="meta-value">{{ $item->location }}</div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- Event Description -->
<section class="event-detail-section">
    <div class="container">
        <div class="event-description">
            {!! $item->description !!}
        </div>
        
        <div class="event-actions">
            @if($item->starts_at >= now())
                <a href="#" class="btn-event-primary">
                    <i class="fas fa-calendar-plus"></i>
                    S'inscrire à cet événement
                </a>
                <a href="#" class="btn-event-secondary">
                    <i class="fas fa-share"></i>
                    Partager
                </a>
            @else
                <a href="#" class="btn-event-secondary">
                    <i class="fas fa-share"></i>
                    Partager
                </a>
            @endif
        </div>
    </div>
</section>
@endsection
@section('title', $item->title . ' - ' . ($siteSettings->site_name ?? 'IESC Université'))
@section('description', Str::limit(strip_tags($item->description), 160))

@push('styles')
<style>
/* Event Detail Styles */
.event-detail-hero {
    background: linear-gradient(135deg, var(--primary-color), var(--primary-light));
    color: white;
    padding: 6rem 0 4rem;
    position: relative;
    overflow: hidden;
}

.event-detail-hero::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="50" cy="50" r="1" fill="rgba(255,255,255,0.1)"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
    opacity: 0.3;
}

.event-detail-content {
    position: relative;
    z-index: 2;
}

.event-type-badge {
    display: inline-block;
    background: rgba(255, 255, 255, 0.2);
    color: white;
    padding: 0.75rem 1.5rem;
    border-radius: 25px;
    font-size: 0.875rem;
    font-weight: 600;
    margin-bottom: 1.5rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    backdrop-filter: blur(10px);
}

.event-title {
    font-size: clamp(2.5rem, 5vw, 4rem);
    font-weight: 800;
    margin-bottom: 1.5rem;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
    line-height: 1.2;
}

.event-meta {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 2rem;
    margin-top: 3rem;
}

.meta-card {
    background: rgba(255, 255, 255, 0.1);
    padding: 2rem;
    border-radius: var(--border-radius);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.meta-icon {
    font-size: 2rem;
    color: white;
    margin-bottom: 1rem;
    display: block;
}

.meta-label {
    font-size: 0.875rem;
    opacity: 0.8;
    margin-bottom: 0.5rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.meta-value {
    font-size: 1.25rem;
    font-weight: 600;
    color: white;
}

.event-detail-section {
    padding: 6rem 0;
    background: var(--bg-white);
}

.event-description {
    font-size: 1.125rem;
    line-height: 1.8;
    color: var(--text-dark);
    margin-bottom: 3rem;
}

.event-description h2,
.event-description h3,
.event-description h4 {
    color: var(--primary-color);
    margin-top: 2rem;
    margin-bottom: 1rem;
}

.event-description ul,
.event-description ol {
    margin: 1rem 0;
    padding-left: 2rem;
}

.event-description li {
    margin-bottom: 0.5rem;
}

.event-actions {
    display: flex;
    gap: 1rem;
    flex-wrap: wrap;
    margin-top: 3rem;
    padding: 2rem;
    background: var(--bg-light);
    border-radius: var(--border-radius);
}

.btn-event-primary {
    background: var(--primary-color);
    color: white;
    padding: 1rem 2rem;
    border-radius: 25px;
    text-decoration: none;
    font-weight: 600;
    font-size: 1.125rem;
    transition: var(--transition);
    border: 2px solid var(--primary-color);
    display: inline-flex;
    align-items: center;
    gap: 0.75rem;
}

.btn-event-primary:hover {
    background: var(--primary-light);
    color: white;
    transform: translateY(-2px);
    box-shadow: var(--shadow-medium);
}

.btn-event-secondary {
    background: transparent;
    color: var(--primary-color);
    padding: 1rem 2rem;
    border-radius: 25px;
    text-decoration: none;
    font-weight: 600;
    font-size: 1.125rem;
    transition: var(--transition);
    border: 2px solid var(--primary-color);
    display: inline-flex;
    align-items: center;
    gap: 0.75rem;
}

.btn-event-secondary:hover {
    background: var(--primary-color);
    color: white;
    transform: translateY(-2px);
    box-shadow: var(--shadow-medium);
}

.back-to-events {
    margin-bottom: 2rem;
}

.back-link {
    color: var(--primary-color);
    text-decoration: none;
    font-weight: 600;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    transition: var(--transition);
}

.back-link:hover {
    color: var(--primary-light);
    transform: translateX(-5px);
}

/* Responsive */
@media (max-width: 768px) {
    .event-meta {
        grid-template-columns: 1fr;
        gap: 1rem;
    }
    
    .meta-card {
        padding: 1.5rem;
    }
    
    .event-actions {
        flex-direction: column;
        align-items: stretch;
    }
    
    .btn-event-primary,
    .btn-event-secondary {
        justify-content: center;
    }
}
</style>
@endpush

@section('content')
<!-- Event Detail Hero -->
<section class="event-detail-hero">
    <div class="container">
        <div class="event-detail-content">
            <div class="back-to-events">
                <a href="{{ route('events.index') }}" class="back-link">
                    <i class="fas fa-arrow-left"></i>
                    Retour aux événements
                </a>
            </div>
            
            <span class="event-type-badge">{{ ucfirst($item->type) }}</span>
            <h1 class="event-title">{{ $item->title }}</h1>
            
            <div class="event-meta">
                <div class="meta-card">
                    <i class="fas fa-calendar meta-icon"></i>
                    <div class="meta-label">Date</div>
                    <div class="meta-value">{{ $item->starts_at->format('d F Y') }}</div>
                </div>
                
                <div class="meta-card">
                    <i class="fas fa-clock meta-icon"></i>
                    <div class="meta-label">Heure</div>
                    <div class="meta-value">
                        {{ $item->starts_at->format('H:i') }}
                        @if($item->ends_at)
                            - {{ $item->ends_at->format('H:i') }}
        @endif
                    </div>
                </div>
                
        @if($item->location)
                    <div class="meta-card">
                        <i class="fas fa-map-marker-alt meta-icon"></i>
                        <div class="meta-label">Lieu</div>
                        <div class="meta-value">{{ $item->location }}</div>
                    </div>
        @endif
            </div>
        </div>
    </div>
</section>

<!-- Event Description -->
<section class="event-detail-section">
    <div class="container">
        <div class="event-description">
        {!! $item->description !!}
    </div>
        
        <div class="event-actions">
            @if($item->starts_at >= now())
                <a href="#" class="btn-event-primary">
                    <i class="fas fa-calendar-plus"></i>
                    S'inscrire à cet événement
                </a>
                <a href="#" class="btn-event-secondary">
                    <i class="fas fa-share"></i>
                    Partager
                </a>
            @else
                <a href="#" class="btn-event-secondary">
                    <i class="fas fa-share"></i>
                    Partager
                </a>
            @endif
    </div>
    </div>
</section>
@endsection

