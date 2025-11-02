<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class SiteController extends Controller
{
    public function admissionsInfo(): View
    {
        return view('site.admissions');
    }

    public function studentPortal(): View
    {
        return view('site.student.index');
    }

    public function studentTimetable(): View
    {
        return view('site.student.timetable');
    }

    public function studentGrades(): View
    {
        return view('site.student.grades');
    }

    public function studentResources(): View
    {
        return view('site.student.resources');
    }

    public function careers(): View
    {
        return view('site.careers');
    }

    public function about(): View
    {
        return view('site.about');
    }

    public function contact(): View
    {
        return view('site.contact');
    }

    public function campus(): View
    {
        return view('site.campus');
    }
}





