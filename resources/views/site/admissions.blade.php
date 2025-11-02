@extends('layouts.app')

@section('title', 'Admission & Inscriptions')

@section('content')
<section class="section">
    <div class="container">
        <h1 class="heading-1">Admission & Inscriptions</h1>
        <p class="lead">Modalités, frais et conditions d'inscription. Dates clés 2025-2026.</p>

        <div class="grid-2 gap-8 mt-8">
            <div>
                <h2 class="heading-3">Modalités</h2>
                <ul class="list">
                    <li>Dossier de candidature</li>
                    <li>Entretien de motivation</li>
                </ul>
            </div>
            <div>
                <h2 class="heading-3">Frais & Conditions</h2>
                <ul class="list">
                    <li>Frais d'inscription</li>
                    <li>Frais de scolarité</li>
                </ul>
            </div>
        </div>

        <div class="mt-10">
            <h2 class="heading-3">Dates clés 2025-2026</h2>
            <ul class="list">
                <li>Ouverture des inscriptions: 01/06/2025</li>
                <li>Rentrée: 15/10/2025</li>
            </ul>
        </div>

        <div class="mt-10">
            <a href="{{ route('admission.create') }}" class="btn btn-primary">Postuler en ligne</a>
        </div>
    </div>
    </section>
@endsection





