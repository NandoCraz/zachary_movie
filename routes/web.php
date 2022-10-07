<?php

use App\Models\User;
use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\DashboardDataController;
use App\Http\Controllers\DataMovieController;
use App\Http\Controllers\DataGenreController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MovieRatingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('home', [
//         "active" => "Home"
//     ]);
// });

Route::get('/', [HomeController::class, 'index']);
Route::get('/movies', [MovieController::class, 'allMovie']);
Route::get('/best-movie', [MovieController::class, 'bestMovie']);
Route::get('/movie/{movie:slug}', [MovieController::class, 'detailMovie']);
Route::get('/genres', [GenreController::class, 'allGenres']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout']);


Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/dashboard', [DashboardDataController::class, 'index'])->middleware('auth');
Route::get('/data-movie/addSlug', [DataMovieController::class, 'createSlug'])->middleware('auth');
Route::resource('/data-movie', DataMovieController::class)->middleware('auth');
Route::get('/master/data-genre/addSlug', [DataGenreController::class, 'createSlug'])->middleware('admin');
Route::resource('/master/data-genre', DataGenreController::class)->except('show')->middleware('admin');

Route::get('/users', [UserController::class, 'index'])->middleware('admin');
Route::post('/users/{user:id}', [UserController::class, 'delete'])->middleware('admin');
Route::post('/users/image/{user:id}', [UserController::class, 'change'])->middleware('auth');
Route::post('/users/password/{user:id}', [UserController::class, 'reset'])->middleware('auth');
Route::post('/users/{user:id}', [UserController::class, 'edit'])->middleware('auth');

Route::post('/rating', [MovieRatingController::class, 'index'])->middleware('auth');
