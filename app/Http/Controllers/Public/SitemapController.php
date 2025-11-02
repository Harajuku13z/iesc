<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class SitemapController extends Controller
{
    public function index()
    {
        $sitemap = Sitemap::create()
            ->add(Url::create('/'))
            ->add(Url::create('/universite'))
            ->add(Url::create('/formations'))
            ->add(Url::create('/recherche'))
            ->add(Url::create('/international'))
            ->add(Url::create('/vie-etudiante'));

        return response($sitemap->render(), 200)->header('Content-Type', 'application/xml');
    }
}
