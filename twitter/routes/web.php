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
use App\Http\Controllers\FeedController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\IdeaController as AdminIdeaController;
use App\Http\Controllers\Admin\CommentController as AdminCommentController;

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


// homeAdminUserController

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
// Authentication
Route::group(['middleware' => 'guest'], function() {
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'store']);
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticate']);
});




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
Route::post('/users/{user}/follow', [FollowerController::class, 'follow'])
    ->middleware('auth')
    ->name('users.follow');

Route::post('/users/{user}/unfollow', [FollowerController::class, 'unfollow'])
    ->middleware('auth')
    ->name('users.unfollow');

//like and unlike routes
Route::post('ideas/{idea}/like', [IdeaLikeController::class, 'like'])
    ->middleware('auth')
    ->name('ideas.like');
Route::post('ideas/{idea}/unlike', [IdeaLikeController::class, 'unlike'])
    ->middleware('auth')
    ->name('ideas.unlike');

Route::get('/feed', [FeedController::class , '__invoke'])->middleware('auth')-> name('feed');


// logout route
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('lang/{lang}', function ($lang) {
    app()->setLocale($lang);
    session()->put('locale', $lang);
    return redirect()->route('dashboard');
})->name('lang');



Route::middleware(['auth', 'can:admin'],)->prefix('admin')->as('admin.')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::resource('users', AdminUserController::class)->only('index');
    Route::resource('ideas', AdminIdeaController::class)->only('index');
    Route::resource('comments', AdminCommentController::class)->only('index','destroy');
});

Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
