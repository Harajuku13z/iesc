@extends('layouts.app')
@section('title', "Espace Étudiant")
@section('content')
<section class="section">
    <div class="container">
        <h1 class="heading-1">Espace Étudiant</h1>
        <p class="lead">Accédez à vos services: emploi du temps, notes, ressources.</p>

        <ul class="links mt-8">
            <li><a class="link" href="{{ route('student.timetable') }}">Emploi du temps</a></li>
            <li><a class="link" href="{{ route('student.grades') }}">Notes & Résultats</a></li>
            <li><a class="link" href="{{ route('student.resources') }}">Ressources pédagogiques</a></li>
        </ul>
    </div>
</section>
@endsection





