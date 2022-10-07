<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $movies =  Movie::latest()->get();
        return view('landingPage.home', [
            'active' => 'dashboard',
            'movies' => $movies
        ]);
    }
}
