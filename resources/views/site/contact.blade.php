@extends('layouts.app')
@section('title', 'Nous contacter')
@section('content')
<section class="section"><div class="container"><h1 class="heading-1">Nous contacter</h1><p>Email: {{ $siteSettings->contact_email ?? 'contact@iesc.cg' }}<br>Téléphone: {{ $siteSettings->contact_phone ?? '+242 06 541 98 61' }}</p></div></section>
@endsection





