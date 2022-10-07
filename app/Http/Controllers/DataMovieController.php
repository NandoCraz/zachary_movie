<?php

namespace App\Http\Controllers;

use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Genre;
use App\Models\GenreMovie;
use App\Models\MovieRating;
use App\Models\User;
use Illuminate\Support\Str;

class DataMovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movie::where('user_id', '=', auth()->user()->id)->get();
        return view('userPage.dataMovie.index', [
            'movies' => $movies
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genres = Genre::all();
        return view('userPage.dataMovie.create', [
            'genres' => $genres
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'judul' => 'required|max:255',
            'slug' => 'required|unique:movies',
            'sutradara' => 'required|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg|file|max:2048',
            'body' => 'required'
        ]);

        if ($request->file('image')) {
            $validateData['image'] = $request->file('image')->store('movieImages');
        }

        $validateData['user_id'] = auth()->user()->id;
        $validateData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        $createMovie = Movie::create($validateData);

        foreach ($request->genre as $genre) {
            GenreMovie::create([
                'movie_id' => $createMovie->id,
                'genre_id' => $genre
            ]);
        }

        return redirect('/data-movie')->with('berhasil', 'Tulisan Movie Baru Telah Dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movie = Movie::findOrFail($id);
        $movieRatings = MovieRating::where('movie_id', '=', $movie->id)->get();
        if ($movieRatings->count() == 0) {
            $movie->rating = 0;
        } else {
            $rating = $movieRatings->sum('rating') / $movieRatings->count();
            $movie->rating = $rating;
        }
        return view('userPage.dataMovie.detail', [
            'movie' => $movie
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $genres = Genre::all();
        $movie = Movie::with(['genre'])->findOrFail($id);
        // $genre = $movie->genre->pluck('id')->toArray();
        return view('userPage.dataMovie.edit', [
            'movie' => $movie,
            'genres' => $genres,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $movie = Movie::findOrFail($id);
        $rules = [
            'judul' => 'required|max:255',
            'sutradara' => 'required|max:255',
            'body' => 'required'
        ];

        if ($request->slug != Movie::find($id)->slug) {
            $rules['slug'] = 'required|unique:movies';
        }

        if ($request->file('image')) {
            $rules['image'] = 'required|image|mimes:jpeg,png,jpg|file|max:2048';
        }

        $validateData = $request->validate($rules);

        if ($request->file('image')) {
            if ($movie->image) {
                Storage::delete($movie->image);
            }
            $validateData['image'] = $request->file('image')->store('movieImages');
        } else {
            $validateData['image'] = $movie->image;
        }
        $validateData['excerpt'] = Str::limit(strip_tags($request->body), 200);
        $validateData['user_id'] = auth()->user()->id;

        // return $validateData;

        Movie::where('id', $id)->update($validateData);

        GenreMovie::where('movie_id', $id)->delete();
        foreach ($request->genre as $genre) {
            GenreMovie::create([
                'movie_id' => $id,
                'genre_id' => $genre
            ]);
        }

        return redirect('/data-movie')->with('berhasil', 'Tulisan Movie Telah Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movie = Movie::find($id);
        if ($movie->image) {
            Storage::delete($movie->image);
        }
        Movie::destroy($id);
        return redirect('/data-movie')->with('berhasil', 'Movie Telah Dihapus!');
    }

    public function createSlug(Request $request)
    {
        $slug = SlugService::createSlug(Movie::class, 'slug', $request->judul);
        return response()->json(['slug' => $slug]);
    }


    // public function createPivot(Request $request) {
    //     $validasi = $request->validate([
    //         ...
    //     ])

    //     $buat = Movie::create($validasi);

    //     foreach($request->genre as $genre_id) {
    //         genre_movie::create(
    //             'user_id' => $buat->id,
    //             'genre_id' => $genre_id
    //         )
    //     }
    // }
}
