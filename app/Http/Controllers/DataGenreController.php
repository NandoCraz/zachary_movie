<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;
use App\Models\Movie;
use App\Models\Genre;

class DataGenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $genres = Genre::all();
        return view('userPage.dataGenre.index', [
            'genres' => $genres
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('userPage.dataGenre.create');
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
            'nama' => 'required|unique:genres|max:255',
            'slug' => 'required|unique:genres|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if (request()->file('image')) {
            $validateData['image'] = request()->file('image')->store('genreImages');
        }

        Genre::create($validateData);

        return redirect('/master/data-genre')->with('berhasil', 'Genre Baru Telah Dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $genre = Genre::find($id);
        return view('userPage.dataGenre.edit', [
            'genre' => $genre
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
        $genre = Genre::findOrFail($id);

        if ($request->nama != Genre::find($id)->nama) {
            $rules['slug'] = 'required|unique:genres|max:255';
        }

        if ($request->slug != Genre::find($id)->slug) {
            $rules['slug'] = 'required|unique:genres';
        }

        if ($request->file('image')) {
            $rules['image'] = 'required|image|mimes:jpeg,png,jpg|file|max:2048';
        }

        $validateData = $request->validate($rules);

        if ($request->file('image')) {
            if ($genre->image) {
                Storage::delete($genre->image);
            }
            $validateData['image'] = $request->file('image')->store('genreImages');
        } else {
            $validateData['image'] = $genre->image;
        }

        Genre::where('id', $id)->update($validateData);

        return redirect('/master/data-genre')->with('berhasil', 'Genre Telah Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $genre = Genre::findOrFail($id);
        if ($genre->image) {
            Storage::delete($genre->image);
        }
        Genre::destroy($id);
        return redirect('/master/data-genre')->with('berhasil', 'Genre Telah Dihapus!');
    }

    public function createSlug(Request $request)
    {
        $slug = SlugService::createSlug(Genre::class, 'slug', $request->nama);
        return response()->json(['slug' => $slug]);
    }
}
