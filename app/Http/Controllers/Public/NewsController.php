<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        $items = News::where('is_published', true)->orderByDesc('published_at')->paginate(9);
        return view('news.index', compact('items'));
    }

    public function show(string $slug)
    {
        $item = News::where('slug', $slug)->where('is_published', true)->firstOrFail();
        return view('news.show', compact('item'));
    }
}
