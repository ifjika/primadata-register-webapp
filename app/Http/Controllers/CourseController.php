<?php

namespace App\Http\Controllers;

use App\Models\Paket;

class CourseController extends Controller
{
    public function index()
    {
        $paket = Paket::all();

        return view('courses', compact('paket'));
    }
}
