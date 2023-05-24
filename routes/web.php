<?php

use App\Http\Controllers\Auth\PostController;
use App\Http\Controllers\Auth\RegistrarController;
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

Route::get('/', function () {
    return view('principal');
});

Route::get('/crear-cuenta', [RegistrarController::class, 'index']);
Route::post('/crear-cuenta', [RegistrarController::class, 'store']);

Route::get('/muro', [PostController::class, 'index'])->name('post.index');
