@extends('layouts.app')

@section('title', $item->meta_title ?? $item->title)
@section('description', $item->meta_description ?? Str::limit(strip_tags($item->excerpt ?: $item->content), 150))

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="text-sm text-gray-500 mb-2">{{ optional($item->published_at)->format('d/m/Y') }}</div>
    <h1 class="text-3xl font-bold mb-4">{{ $item->title }}</h1>
    <div class="prose max-w-none bg-white shadow rounded-lg p-6">
        {!! $item->content !!}
    </div>
    <div class="mt-6">
        <a href="{{ route('news.index') }}" class="text-blue-600 hover:underline">Retour aux actualités</a>
    </div>
    </div>
@endsection






