<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\IdeasController;

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




Route::get('/', [DashboardController::class , 'index']) -> name('dashboard');
Route::post('/idea',[IdeasController::class , 'store']) -> name('idea.create');
Route::get('/ideas/{idea}',[IdeasController::class , 'show']) -> name('idea.show');
Route::get('/ideas/{idea}/edit',[IdeasController::class , 'edit']) -> name('idea.edit');
Route::put('/ideas/{idea}',[IdeasController::class , 'update']) -> name('idea.update');
Route::delete('/idea/{idea}',[IdeasController::class , 'destroy']) -> name('idea.destroy');





// Route::get('/profile', [ProfileController::class , 'index']);

Route::get('/terms', function() {
    return view('terms');
});
