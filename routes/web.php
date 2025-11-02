<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Public\HomeController;
use App\Http\Controllers\Public\ProgramController;
use App\Http\Controllers\Public\AdmissionController;
use App\Http\Controllers\Public\PageController;
use App\Http\Controllers\Public\SitemapController;
use App\Http\Controllers\Public\NewsController;
use App\Http\Controllers\Public\EventController;
use App\Http\Controllers\Public\SiteController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/universite', [PageController::class, 'show'])->name('page.about');
Route::get('/formations', [ProgramController::class, 'index'])->name('programs.index');
Route::get('/formations/recherche', [ProgramController::class, 'search'])->name('programs.search');
Route::get('/formations/{slug}', [ProgramController::class, 'show'])->name('programs.show');
Route::get('/recherche', [PageController::class, 'show'])->name('page.research');
Route::get('/international', [PageController::class, 'show'])->name('page.international');
Route::get('/vie-etudiante', [PageController::class, 'show'])->name('page.student-life');

Route::get('/inscription', [AdmissionController::class, 'create'])->name('admission.create');
Route::post('/inscription', [AdmissionController::class, 'store'])->name('admission.store');

Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');
Route::get('/actualites', [NewsController::class, 'index'])->name('news.index');
Route::get('/actualites/{slug}', [NewsController::class, 'show'])->name('news.show');
Route::get('/evenements', [EventController::class, 'index'])->name('events.index');
Route::get('/evenements/{slug}', [EventController::class, 'show'])->name('events.show');

// Pages publiques supplémentaires
Route::get('/admissions', [SiteController::class, 'admissionsInfo'])->name('admissions.info');
Route::get('/carrieres', [SiteController::class, 'careers'])->name('careers');
Route::get('/contact', [SiteController::class, 'contact'])->name('contact');

// Espace Étudiant
Route::prefix('espace-etudiant')->name('student.')->group(function () {
    Route::get('/', [SiteController::class, 'studentPortal'])->name('portal');
    Route::get('/emploi-du-temps', [SiteController::class, 'studentTimetable'])->name('timetable');
    Route::get('/notes-resultats', [SiteController::class, 'studentGrades'])->name('grades');
    Route::get('/ressources-pedagogiques', [SiteController::class, 'studentResources'])->name('resources');
});
