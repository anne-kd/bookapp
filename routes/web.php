<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CommentController;
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
/*
Route::get('/', function () {
    return view('books.layout');
});
*/



Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Route::resource('home', HomeController::class);
Route::resource('books', BookController::class);
Route::resource('comments', CommentController::class);