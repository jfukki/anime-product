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
use App\Http\Controllers\UserFavouriteListController;
use App\Http\Controllers\MyListController;
use App\Http\Controllers\UserDetailController;
use App\Http\Controllers\UserAnimeStatusListController;
use App\Http\Controllers\Admin\AdminController;









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

Route::get('/add-to-list/{anime_id}/{user_id}/{status}', [UserAnimeStatusListController::class, 'addToList'])->name('addToList');



Route::get('/addtofavlist/{anime_id}/{user_id}', [UserFavouriteListController::class, 'store'])->name('addtofavlist');
Route::get('/removefromfavlist/{anime_id}/{user_id}', [UserFavouriteListController::class, 'removefromfavlist'])->name('removefromfavlist');

Route::get('/addtofavlistsearchitem/{anime_id}/{user_id}', [UserFavouriteListController::class, 'searchItemFav'])->name('addtofavlistsearchitem');


Route::get('/my-list', [MyListController::class, 'index'])->name('my-list');
Route::get('/my-profile', [UserDetailController::class, 'index'])->name('my-profile');

Route::get('/my-review-list', [UserDetailController::class, 'userReviewList'])->name('userReviewList');
Route::get('/delete-my-review/{id}', [UserDetailController::class, 'deleteUserReview'])->name('deleteUserReview');



Route::get('/user-edit/{user_id}', [UserDetailController::class, 'userEdit'])->name('user-edit');
Route::post('/user-update/{user_id}', [UserDetailController::class, 'userUpdate'])->name('userUpdate');
Route::get('/banner-edit/{user_id}', [UserDetailController::class, 'editBannerAavatar'])->name('editBannerAavatar');
Route::post('/banner-update/{user_id}', [UserDetailController::class, 'updateBannerAvatar'])->name('bannerUpdate');





// ==========================================


Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/detail/{id}', [HomeController::class, 'animeDetailV2'])->name('animeDetail');

Route::get('/search', [HomeController::class, 'animeSearch'])->name('search');
Route::post('/search', [HomeController::class, 'searchAnime'])->name('search');

Route::get('/browse', [BrowseController::class, 'index'])->name('browse');
Route::get('/images', [BrowseController::class, 'randomImages'])->name('randomImages');

Route::get('/reviews', [ReviewsController::class, 'index'])->name('reviews');
Route::get('/review-detail/{id}', [ReviewsController::class, 'reviewDetail'])->name('reviewDeail');
Route::get('/review-add/{anime_id}', [ReviewsController::class, 'reviewAdd'])->name('reviewAdd');
Route::post('/review-store/{anime_id}/{user_id}/{user_name}', [ReviewsController::class, 'reviewStore'])->name('reviewStore');

Route::get('/anime-reviews/{anime_id}', [ReviewsController::class, 'animeReviewListing'])->name('animeReviewsListing');



Route::get('/site-stats', [SiteStatsController::class, 'index'])->name('site-stats');


// ==========================================


Route::get('/insertPopularAnime/{id}', [AnimeController::class, 'popularAnimeInsert'])->name('insertPopularAnime');
Route::get('/insertHorrorAnime/{id}', [AnimeController::class, 'horrorAnimeInsert'])->name('insertHorrorAnime');
Route::get('/insertRankedAnime/{id}', [AnimeController::class, 'rankedAnimeInsert'])->name('insertRankedAnime');

// ==========================================


// admin dashboard

Route::get('/admin/login', [AdminController::class, 'loginIndex']); 

Route::post('/admin/login', [AdminController::class, 'login'])->name('login');





