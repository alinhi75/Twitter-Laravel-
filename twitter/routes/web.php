<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;

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




Route::get('/', [DashboardController::class , 'index']);


// Route::get('/profile', [ProfileController::class , 'index']);

Route::get('/terms', function() {
    return view('terms');
});
