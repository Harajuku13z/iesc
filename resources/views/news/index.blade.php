@extends('layouts.app')

@section('title', 'Actualités')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">Actualités</h1>
    @if($items->isEmpty())
        <p>Aucune actualité pour le moment.</p>
    @else
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($items as $news)
                <a href="{{ route('news.show', $news->slug) }}" class="block bg-white rounded-lg shadow p-4 hover:shadow-md">
                    <div class="text-sm text-gray-500">{{ optional($news->published_at)->format('d/m/Y') }}</div>
                    <div class="font-semibold">{{ $news->title }}</div>
                    <div class="text-gray-600 text-sm">{{ $news->excerpt }}</div>
                </a>
            @endforeach
        </div>
        <div class="mt-6">
            {{ $items->links() }}
        </div>
    @endif
    </div>
@endsection






