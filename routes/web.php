<?php

use App\Livewire\AddCar;
use App\Livewire\CarsList;
use App\Livewire\EditCar;
use App\Livewire\Login;
use App\Livewire\Profile;
use App\Livewire\Register;
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

Route::group(['middleware' => 'guest'], function () {
  Route::get('/login', Login::class)->name('login');
  Route::get('/register', Register::class);
});

Route::group(['middleware' => 'auth'], function () {
  Route::view('/', 'home')->name('home');
  Route::get('/profile', Profile::class);
  Route::get('/cars', CarsList::class);
  Route::get('/addcar', AddCar::class);
  Route::get('/editcar/{number_plate}', EditCar::class);
});
