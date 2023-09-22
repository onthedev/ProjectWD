<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\empController;
use App\Http\Controllers\mngController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\mngEmpController;
use App\Models\Tambon;

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
    Route::get('/manager/employee', [mngController::class, "mng_employee"])->name('mng_employee');
    Route::get('/manager/employee/check', [mngController::class, "manager_emp_check"])->name('manager_emp_check');
    Route::get('/manager/employee/employee', [mngController::class, "manager_emp_emp"])->name('manager_emp_emp');
    Route::get('/manager/employee/manage', [mngController::class, "manage_emp"])->name('manage_emp');
    Route::post('/manager/employee/manageemp', [mngController::class, "addTeam"])->name('addTeam');
});




