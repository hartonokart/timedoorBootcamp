<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\FamousController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\SubmitRatingController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[BookController::class,'index']);
Route::get('/top-authors', [FamousController::class, 'topAuthors']);
Route::get('/rating-form', [SubmitRatingController::class, 'submitRatingForm'])->name('ratingForm');
Route::post('/submit-rating', [SubmitRatingController::class, 'submitRating'])->name('submitRating');
