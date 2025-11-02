@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-semibold mb-4">Formations</h1>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach ($programs as $program)
        <a href="{{ route('programs.show', $program->slug) }}" class="border rounded p-4 block hover:shadow">
            <h2 class="font-semibold">{{ $program->title }}</h2>
            <div class="text-sm text-gray-600">{{ $program->faculty }}</div>
        </a>
    @endforeach
    </div>
    <div class="mt-6">{{ $programs->links() }}</div>
@endsection






