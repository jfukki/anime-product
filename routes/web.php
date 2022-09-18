<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BrowseController;
use App\Http\Controllers\ReviewsController;
use App\Http\Controllers\SiteStatsController
;




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


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/detail/{id}', [HomeController::class, 'animeDetailV2'])->name('animeDetail');

Route::get('/search', [HomeController::class, 'animeSearch'])->name('search');
Route::post('/search', [HomeController::class, 'searchAnime'])->name('search');

Route::get('/browse', [BrowseController::class, 'index'])->name('browse');
Route::get('/images', [BrowseController::class, 'randomImages'])->name('randomImages');

Route::get('/reviews', [ReviewsController::class, 'index'])->name('reviews');
Route::get('/review-detail', [ReviewsController::class, 'reviewDetail'])->name('reviewDeail');

Route::get('/site-stats', [SiteStatsController::class, 'index'])->name('site-stats');







