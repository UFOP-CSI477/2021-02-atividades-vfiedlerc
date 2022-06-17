<?php

use App\Http\Controllers\ColetaController;
use App\Http\Controllers\EntidadeController;
use App\Http\Controllers\GeralController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::post('/logout', function() {
    session()->flush();
    return redirect('/');
})->name('logout');

Route::get('/login', function() {
    return view('login');
})->name('login');

Route::get('/cadastro', function() {
    return view('cadastro');
});

Route::post('/auth', [UserController::class, 'auth']);
Route::post('/cadastro', [UserController::class, 'store']);

Route::get('/geral', [GeralController::class, 'index']);
Route::get('/admin', function () {
    return view('admin');
})->name('admin')->middleware('auth');

Route::prefix('itens')
    ->group(function() {
        Route::get('/', [ItemController::class, 'index']);
        Route::get('/create', [ItemController::class, 'create']);
        Route::post('/', [ItemController::class, 'store']);
    });

Route::prefix('entidades')
    ->group(function() {
        Route::get('/', [EntidadeController::class, 'index']);
        Route::delete('/delete/{id}', [EntidadeController::class, 'destroy']);
    });

Route::prefix('coletas')
    ->group(function() {
        Route::get('/', [ColetaController::class, 'index']);
        Route::get('/create', [ColetaController::class, 'create']);
        Route::post('/', [ColetaController::class, 'store']);
        Route::get('/edit/{id}', [ColetaController::class, 'edit']);
        Route::put('/{id}', [ColetaController::class, 'update']);
        Route::delete('/delete/{id}', [ColetaController::class, 'destroy']);
    });
