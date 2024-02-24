<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('guest')->group(function(){
    Route::view('/signin', 'auth.signin')->name('login');
    Route::post('/signup',[AuthController::class, 'signup']);
    Route::view('/signup', 'auth.signup');
    Route::post('/signin',[AuthController::class, 'signin']);
});

Route::middleware('auth')->group(function(){

    Route::controller(GaleriController::class)->group(function(){
        Route::get('/profile', 'index');
        Route::get('/newImage', 'create');
        Route::post('/newImage', 'store');
        Route::get('/edit/{id_foto}/{username}', 'edit');
        Route::get('/detailFoto/{id_foto}', 'show');
        Route::put('/edit/{id_foto}', 'update');
        Route::delete('/delete/{id_foto}', 'destroy');

    });
    Route::get('/', [UserController::class, 'index']);
    // Route::get('/signout', [AuthController::class, 'signout']);
    Route::post('/signout', [AuthController::class, 'signout']);
    Route::get('/editProfil/{id_user}/{username}',[UserController::class, 'edit']);
    Route::put('/editProfil/{id_user}',[UserController::class, 'update']);

    Route::controller(AlbumController::class)->group(function(){
        Route::get('/albums','index');
        Route::get('/addAlbum','create');
        Route::post('/addAlbum','store');
        Route::get('/detailAlbum/{id_album}', 'show');
        
    });


});



