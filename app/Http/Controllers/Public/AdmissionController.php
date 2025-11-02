<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAdmissionRequest;
use App\Mail\AdmissionConfirmation;
use App\Mail\NewAdmissionNotification;
use App\Models\AdmissionApplication;
use App\Models\Program;
use App\Settings\SiteSettings;
use Illuminate\Support\Facades\Mail;

class AdmissionController extends Controller
{
    public function create()
    {
        return view('admission.create', [
            'programs' => Program::query()->where('is_active', true)->get(),
        ]);
    }

    public function store(StoreAdmissionRequest $request)
    {
        $application = AdmissionApplication::create($request->validated());

        if ($request->hasFile('bac_diploma')) {
            $application->addMediaFromRequest('bac_diploma')->toMediaCollection('bac_diploma');
        }
        if ($request->hasFile('birth_certificate')) {
            $application->addMediaFromRequest('birth_certificate')->toMediaCollection('birth_certificate');
        }

        Mail::to($application->email)->send(new AdmissionConfirmation($application));
        Mail::to(app(SiteSettings::class)->contact_email)->send(new NewAdmissionNotification($application));

        return redirect()->route('admission.create')->with('success', 'Votre candidature a été envoyée !');
    }
}
