<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        $query = Event::where('is_published', true);
        
        // Filtrer par type si spécifié
        if (request('type')) {
            $query->where('type', request('type'));
        }
        
        // Filtrer par statut (à venir, passés, tous)
        if (request('status') === 'upcoming') {
            $query->where('starts_at', '>=', now());
        } elseif (request('status') === 'past') {
            $query->where('starts_at', '<', now());
        }
        
        $items = $query->orderBy('starts_at', 'asc')->paginate(12);
        
        return view('events.index', compact('items'));
    }

    public function show(string $slug)
    {
        $item = Event::where('slug', $slug)->where('is_published', true)->firstOrFail();
        return view('events.show', compact('item'));
    }
}
