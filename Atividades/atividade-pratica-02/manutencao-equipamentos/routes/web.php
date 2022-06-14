<?php

use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

Route::get('/', function() {
    return redirect()->intended('/records');
})->name('home');

Route::resource('equipment', EquipmentController::class);
Route::resource('users', UserController::class);
Route::resource('records', RecordController::class);

Route::get('login', function() {
    return view('login');
})->name('login');

Route::get('logout', function(Request $request) {
    $request->session()->flush();
    return redirect()->intended('/login');
})->name('logout');

Route::post('auth', [UserController::class, 'auth']);
