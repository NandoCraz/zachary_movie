<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Genre;
use App\Models\MovieRating;
use App\Models\GenreMovie;
use App\Models\User;

class DashboardDataController extends Controller
{
    public function index()
    {
        $movies = Movie::with(['genre', 'user'])->latest()->filter(request(['cari', 'genre', 'user']))->get();
        $movies = $movies->map(function ($movie) {
            $movieRatings = MovieRating::where('movie_id', '=', $movie->id)->get();
            if ($movieRatings->count() == 0) {
                $movie->rating = 0;
            } else {
                $rating = $movieRatings->sum('rating') / $movieRatings->count();
                $movie->rating = $rating;
            }
            return $movie;
        });

        $bestMovie = $movies->filter(function ($movie) {
            return $movie->rating > 80;
        });

        $genres = Genre::withCount(['movie'])->get();
        $allGenres = Genre::all();
        // $bestMovie = Movie::all()->where('rating', '>', 85);
        $movie = Movie::all();
        $myMovie = Movie::where('user_id', auth()->user()->id)->get();
        // $myBestMovie = Movie::where('user_id', auth()->user()->id)->where('rating', '>', 85)->get();
        $user = User::where('role', 'user')->get();
        return view('userPage.dashboard', [
            'movie' => $movie,
            'myMovie' => $myMovie,
            // 'myBestMovie' => $myBestMovie,
            'genres' => $genres,
            'bestMovie' => $bestMovie,
            'user' => $user,
            'allGenres' => $allGenres,
        ]);
    }
}
