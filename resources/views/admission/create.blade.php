@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-semibold mb-4">Inscription</h1>
<form method="post" action="{{ route('admission.store') }}" enctype="multipart/form-data" class="space-y-4">
    @csrf
    <div>
        <label class="block mb-1">Filière</label>
        <select name="program_id" class="border rounded w-full p-2">
            @foreach ($programs as $p)
                <option value="{{ $p->id }}">{{ $p->title }}</option>
            @endforeach
        </select>
        @error('program_id')<p class="text-red-600 text-sm">{{ $message }}</p>@enderror
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label class="block mb-1">Prénom</label>
            <input name="first_name" class="border rounded w-full p-2" />
            @error('first_name')<p class="text-red-600 text-sm">{{ $message }}</p>@enderror
        </div>
        <div>
            <label class="block mb-1">Nom</label>
            <input name="last_name" class="border rounded w-full p-2" />
            @error('last_name')<p class="text-red-600 text-sm">{{ $message }}</p>@enderror
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label class="block mb-1">Email</label>
            <input name="email" type="email" class="border rounded w-full p-2" />
            @error('email')<p class="text-red-600 text-sm">{{ $message }}</p>@enderror
        </div>
        <div>
            <label class="block mb-1">Téléphone</label>
            <input name="phone" class="border rounded w-full p-2" />
            @error('phone')<p class="text-red-600 text-sm">{{ $message }}</p>@enderror
        </div>
    </div>
    <div>
        <label class="block mb-1">Date de naissance</label>
        <input name="birth_date" type="date" class="border rounded w-full p-2" />
        @error('birth_date')<p class="text-red-600 text-sm">{{ $message }}</p>@enderror
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label class="block mb-1">Diplôme du Bac (PDF/JPG/PNG)</label>
            <input type="file" name="bac_diploma" class="border rounded w-full p-2" />
            @error('bac_diploma')<p class="text-red-600 text-sm">{{ $message }}</p>@enderror
        </div>
        <div>
            <label class="block mb-1">Acte de naissance (PDF/JPG/PNG)</label>
            <input type="file" name="birth_certificate" class="border rounded w-full p-2" />
            @error('birth_certificate')<p class="text-red-600 text-sm">{{ $message }}</p>@enderror
        </div>
    </div>
    <button class="bg-blue-600 text-white px-4 py-2 rounded">Envoyer</button>
</form>
@endsection






