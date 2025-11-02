<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Program;

class ProgramController extends Controller
{
    public function index()
    {
        $programs = Program::query()->where('is_active', true)->paginate(12);
        return view('programs.index', compact('programs'));
    }

    public function search()
    {
        $query = Program::query()->where('is_active', true);
        
        // Filtrer par niveau d'études
        if (request('niveau')) {
            $query->where('level', 'like', '%' . request('niveau') . '%');
        }
        
        // Filtrer par domaine
        if (request('domaine')) {
            $query->where('category', 'like', '%' . request('domaine') . '%');
        }
        
        // Filtrer par objectif (dans la description ou les mots-clés)
        if (request('objectif')) {
            $objectif = request('objectif');
            $query->where(function($q) use ($objectif) {
                $q->where('description', 'like', '%' . $objectif . '%')
                  ->orWhere('keywords', 'like', '%' . $objectif . '%');
            });
        }
        
        $programs = $query->get();
        
        return view('programs.search', compact('programs'));
    }

    public function show(string $slug)
    {
        $program = Program::query()->where('slug', $slug)->where('is_active', true)->firstOrFail();
        return view('programs.show', compact('program'));
    }
}
