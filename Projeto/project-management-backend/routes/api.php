<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', function (Request $request) {
    if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
        $user = Auth::user();
        $token=$user->createToken('JWT');
        return response()->json($token->plainTextToken,200);
    }

    return response()->json('Usuário invalido',401);
})->name('login');

Route::post('/register', [UserController::class, 'store']);

Route::middleware('auth:sanctum')
    ->prefix('projects')
    ->controller(ProjectController::class)
    ->group(function() {
        Route::get('/', 'index');
        Route::post('/', 'store');
        Route::put('/{id}', 'update');
        Route::delete('/{id}', 'destroy');
    }
);

Route::middleware('auth:sanctum')
    ->prefix('activities')
    ->controller(ActivityController::class)
    ->group(function() {
        Route::get('/', 'index');
        Route::post('/', 'store');
        Route::put('/{id}', 'update');
        Route::delete('/{id}', 'destroy');
    }
);
