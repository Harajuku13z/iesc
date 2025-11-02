<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\StaticPage;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function show(Request $request)
    {
        $routeName = $request->route()->getName();
        $slugMap = [
            'page.about' => 'a-propos',
            'page.research' => 'recherche',
            'page.international' => 'international',
            'page.student-life' => 'vie-etudiante',
        ];
        $slug = $slugMap[$routeName] ?? $request->route('slug');
        $page = StaticPage::query()->where('slug', $slug)->firstOrFail();
        return view('page.show', compact('page'));
    }
}
