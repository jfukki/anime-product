<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BrowseController;
use App\Http\Controllers\ReviewsController;
use App\Http\Controllers\SiteStatsController;
use App\Http\Controllers\AnimeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\LoginController;






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
//     return view('welcome');
// });


// ==========================================

Route::get('/singup', [AuthController::class, 'signup'])->name('signup');
Route::post('/register', [AuthController::class, 'userRegister'])->name('userregister');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');


Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');


// ==========================================


Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/detail/{id}', [HomeController::class, 'animeDetailV2'])->name('animeDetail');

Route::get('/search', [HomeController::class, 'animeSearch'])->name('search');
Route::post('/search', [HomeController::class, 'searchAnime'])->name('search');

Route::get('/browse', [BrowseController::class, 'index'])->name('browse');
Route::get('/images', [BrowseController::class, 'randomImages'])->name('randomImages');

Route::get('/reviews', [ReviewsController::class, 'index'])->name('reviews');
Route::get('/review-detail', [ReviewsController::class, 'reviewDetail'])->name('reviewDeail');

Route::get('/site-stats', [SiteStatsController::class, 'index'])->name('site-stats');


// ==========================================


Route::get('/insertPopularAnime/{id}', [AnimeController::class, 'popularAnimeInsert'])->name('insertPopularAnime');
Route::get('/insertHorrorAnime/{id}', [AnimeController::class, 'horrorAnimeInsert'])->name('insertHorrorAnime');
Route::get('/insertRankedAnime/{id}', [AnimeController::class, 'rankedAnimeInsert'])->name('insertRankedAnime');

// ==========================================








