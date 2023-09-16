<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\empController;
use App\Http\Controllers\mngController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\mngEmpController;

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
    Route::get('/dashboard', [RoleController::class, "index"])->name('dashboard');


    Route::get('/emp', [empController::class, "index"])->name('emp');
    Route::get('/mng', [mngController::class, "index"])->name('mng');
    Route::get('/manager/employee', [mngEmpController::class, "index"])->name('mngEmp');
});




