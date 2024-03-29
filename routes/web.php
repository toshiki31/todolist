<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\AccomplishController;
use App\Http\Controllers\LineLoginController;

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

// resourceでルーティングを一括定義
Route::group(['middleware' => 'auth'], function () {
    Route::get('/task/mypage',[TaskController::class, 'mypage'])->name('task.mypage');
    Route::resource('task', TaskController::class);
});

Route::resource('accomplish', AccomplishController::class);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/linelogin', 'App\Http\Controllers\LineLoginController@lineLogin')->name('linelogin');
Route::get('/callback', 'App\Http\Controllers\LineLoginController@callback')->name('callback');