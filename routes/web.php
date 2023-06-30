<?php

use App\Http\Controllers\OwlController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HouseController;
use App\Models\Owl;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    // Take the 3 newest posts
    $latestPosts = Post::orderBy('published_at', 'desc')->take(3)->get();
    $upcomingOwls = Owl::where('scheduled_at', '>', now())
        ->orderBy('scheduled_at', 'asc')->take(3)->get();

    return view('welcome', compact('latestPosts', 'upcomingOwls'));
})->name('home');

// Resource routes of the base pages.
Route::resource('/posts', PostController::class);
Route::resource('/users', UserController::class);
Route::resource('/owls', OwlController::class);
Route::resource('/houses', HouseController::class);
