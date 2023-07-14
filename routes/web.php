<?php

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
//Route::middleware(['auth'])->group(function () {

    //Route::view('users','livewire.home');

//});


Route::domain('user.livewirecrud.test')->group(function () {
    Route::get('/', function () { return view('welcome'); });
    Route::get('/users', [App\Http\Controllers\HomeController::class, 'indexUsers'])->name('users.home');
});
Route::domain('admin.livewirecrud.test')->group(function () {
    Route::get('/', function () { return view('welcome'); });
    Route::get('/users', [App\Http\Controllers\HomeController::class, 'indexAdmins'])->name('admins.home');
});

Route::domain('livewirecrud.vercel.app')->group(function () {
    Route::get('/', function () { return view('welcome'); });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
