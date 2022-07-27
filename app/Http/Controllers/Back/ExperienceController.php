<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function create()
    {
        $experiences = Experience::all();
        return view('back.experience.create', compact('experiences'));
    }
}
