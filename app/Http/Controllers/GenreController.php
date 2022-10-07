<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;
use App\Models\Movie;

class GenreController extends Controller
{
    public function allGenres()
    {
        $genre = Genre::with(['movie'])->get();
        return view('landingPage.genres ', [
            'active' => 'Genre',
            'title' => 'All Genres',
            'genres' => $genre,
        ]);
    }

    public function getGenreMovie(Genre $genre)
    {
        return view('movies', [
            'active' => 'Genre',
            'title' => 'Genre : ' . $genre->nama,
            'movies' => $genre->movie->load(['user']),
        ]);
    }
}
