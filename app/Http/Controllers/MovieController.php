<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Genre;
use App\Models\MovieRating;
use App\Models\User;

use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function allMovie()
    {
        $title = '';
        if (request('genre')) {
            $genre = Genre::firstWhere('slug', request('genre'));
            $title = ' Genre ' . $genre->nama;
        } else if (request('user')) {
            $user = User::firstWhere('username', request('user'));
            $title = ' Published by ' . $user->name;
        }
        $movies =  Movie::with(['genre', 'user'])->latest()->filter(request(['cari', 'genre', 'user']));
        return view('landingPage.movies', [
            'active' => 'movies',
            "title" => "All Movies" . $title,
            "movies" => $movies->paginate(10)->withQueryString(),
        ]);
    }

    public function bestMovie()
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
            return $movie->rating >= 4;
        });
        return view('landingPage.bestMovie', [
            'active' => 'best-movie',
            "title" => "Best Movie",
            "movies" => $bestMovie,
        ]);
    }

    public function detailMovie(Movie $movie)
    {
        $ratingUser = MovieRating::where('user_id', auth()->user()->id)->where('movie_id', $movie->id)->first();
        $movieRatings = MovieRating::where('movie_id', '=', $movie->id)->get();
        if ($movieRatings->count() == 0) {
            $movie->rating = 0;
        } else {
            $rating = $movieRatings->sum('rating') / $movieRatings->count();
            $movie->rating = $rating;
        }
        return view('landingPage.detailMovie', [
            'active' => 'movies',
            "title" => "Detail Movie",
            "detail_movie" => $movie,
            'ratingUser' => $ratingUser
        ]);
    }
}
