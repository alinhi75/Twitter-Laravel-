<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\IdeasController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\IdeaLikeController;

/*

|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!

*/


// feed


// profile


// auth


// home

/*

MVC

Model: Database

View: User Interface

Controller: Logic


*/

Route::group(['prefix'=> 'ideas'],function(){

    Route::middleware('auth') -> group(function(){

        Route::get(' /{idea}',[IdeasController::class , 'show']) -> name('idea.show')->withoutMiddleware('auth');
        Route::get(' /{idea}/edit',[IdeasController::class , 'edit']) -> name('idea.edit');
        Route::put(' /{idea}',[IdeasController::class , 'update']) -> name('idea.update');
        Route::post(' /{idea}/comments',[CommentController::class , 'store']) -> name('ideas.comments.store');

    });
});
//Authentification
Route::get('/register', [AuthController::class , 'register']) -> name('register');
Route::post('/register', [AuthController::class , 'store']);
Route::get('/login', [AuthController::class , 'login']) -> name('login');
Route::post('/login', [AuthController::class , 'authenticate']);
Route::post('/logout', [AuthController::class , 'logout']) -> name('logout');



Route::post('/idea',[IdeasController::class , 'store']) -> name('idea.create');
Route::delete('/idea/{idea}',[IdeasController::class , 'destroy']) -> name('idea.destroy')->middleware('auth');


Route::get('/terms', function() {
    return view('terms');
})->name('terms');

Route::get('/', [DashboardController::class , 'index']) -> name('dashboard');
Route::resource('users', UserController::class)->only(['edit','update'])->middleware('auth');
Route::resource('users', UserController::class)->only(['show']);

// Route::get('/profile', [ProfileController::class , 'show']) -> name('profile');

Route::get('/profile', [UserController::class , 'profile']) -> middleware('auth')->name('profile');

// Follower routes
Route::post('users/{user}/follow', [FollowerController::class, 'follow'])
    ->middleware('auth')
    ->name('users.follow');

Route::post('users/{user}/unfollow', [FollowerController::class, 'unfollow'])
    ->middleware('auth')
    ->name('users.unfollow');

//like and unlike routes
Route::post('ideas/{idea}/like', [IdeaLikeController::class, 'like'])
    ->middleware('auth')
    ->name('ideas.like');
Route::post('ideas/{idea}/unlike', [IdeaLikeController::class, 'unlike'])
    ->middleware('auth')
    ->name('ideas.unlike');

