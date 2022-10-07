<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Movie;
use App\Models\MovieRating;
use Illuminate\Support\Facades\Auth;

class MovieRatingController extends Controller
{
    public function index(Request $request)
    {
        // return $request;
        // $movie = Movie::where('id', $request->movie_id)->get();
        $rating = MovieRating::where('user_id', auth()->user()->id)->where('movie_id', $request->movie_id)->first();

        if ($rating !== null) {
            $rating->update(['rating' => $request->rating]);
            return back()->with('berhasil', 'Rating Berhasil Disimpan!');
        } else {
            $rating = MovieRating::create([
                'user_id' => auth()->user()->id,
                'movie_id' => $request->movie_id,
                'rating' => $request->rating
            ]);
            return back()->with('berhasil', 'Rating Berhasil Disimpan!');
        }
    }
}
