<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Program;
use App\Models\News;

class HomeController extends Controller
{
    public function index()
    {
        // Récupérer les événements publiés, triés par date de début
        $events = Event::where('is_published', true)
            ->where('starts_at', '>=', now()->startOfDay())
            ->orderBy('starts_at', 'asc')
            ->get();
        
        // Récupérer les programmes actifs
        $programs = Program::where('is_active', true)->take(6)->get();
        
        // Récupérer les actualités
        $news = News::where('is_published', true)->take(3)->get();
        
        return view('home.index', compact('events', 'programs', 'news'));
    }
    //
}
