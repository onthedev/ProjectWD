<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IngredientController;
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
    return view('welcome');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/add',[IngredientController::class,'index']);

    Route::post('/add',[IngredientController::class,'addOrder'])->name('addOrder');

    Route::post('/create',[IngredientController::class,'create'])->name('create');

    Route::get('/orderhistory',[IngredientController::class,'history'])->name('history');
});
