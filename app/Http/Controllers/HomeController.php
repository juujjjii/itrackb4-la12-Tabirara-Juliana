<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Prerequisite;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', [
            'subjectCount' => Subject::count(),
            'prerequisiteCount' => Prerequisite::count(),
        ]);
    }
}
