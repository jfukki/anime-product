<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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
Route::get('/detail/{id}', [HomeController::class, 'animeDetail'])->name('animeDetail');

Route::get('/search', [HomeController::class, 'searchAnime'])->name('search');
Route::get('/browse', [HomeController::class, 'browse'])->name('browse');



