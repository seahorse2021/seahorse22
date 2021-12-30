<?php

use Illuminate\Support\Facades\Route;

//Logコントローラーの読み込み
use App\Http\Controllers\LogController;
//Loginコントローラーの読み込み
use App\Http\Controllers\Auth\LoginController;
//
use App\Http\Controllers\FavoriteController;

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
Route::group(['middleware' => 'auth'], function () {
    //my log へのルート
    Route::get('/log/mypage', [LogController::class, 'mydata'])->name('log.mypage');
    //Logコントローラーのルート
    Route::resource('log', LogController::class);
});


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::get('login/{provider}', [LoginController::class, 'redirectToProvider']);

Route::get('login/{provider}/callback', [LoginController::class, 'handleProviderCallback']);


require __DIR__.'/auth.php';
