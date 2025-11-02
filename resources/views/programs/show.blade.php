@extends('layouts.app')

@section('title', $program->meta_title ?? $program->title)
@section('description', $program->meta_description)

@section('content')
<article class="prose max-w-none">
    <h1>{{ $program->title }}</h1>
    <div class="text-sm text-gray-600 mb-4">{{ $program->faculty }}</div>
    <div>{!! $program->description !!}</div>
    <h2 class="mt-6">Débouchés</h2>
    <div>{!! $program->opportunities !!}</div>
</article>
@endsection






