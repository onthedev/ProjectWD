<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\empController;
use App\Http\Controllers\mngController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\mngEmpController;
use App\Http\Controllers\IngredientController;
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

    //ingredient
    Route::get('/manager/ingredient', [IngredientController::class, "toIngredient"])->name('toIngredient');
    Route::get('/manager/addingredient',[IngredientController::class,'toAddList'])->name('toAddList');
    Route::post('/add',[IngredientController::class,'addOrder'])->name('addOrder');
    Route::post('/create',[IngredientController::class,'create'])->name('create');
    Route::get('/orderhistory',[IngredientController::class,'history'])->name('history');


    //manager
    // Route::get('/manager/employee', [mngController::class, "mng_employee"])->name('mng_employee');
    Route::get('/mng', [mngController::class, "index"])->name('mng');
    Route::get('/manager/employee/check', [mngController::class, "manager_emp_check"])->name('manager_emp_check');
    Route::get('/manager/employee/employee', [mngController::class, "manager_emp_emp"])->name('manager_emp_emp');
    Route::get('/manager/employee/manage', [mngController::class, "manage_emp"])->name('manage_emp');
    Route::post('/manager/employee/manageemp', [mngController::class, "addTeam"])->name('addTeam');
    Route::get('/manager/addempbyfile', [mngController::class, "addByFile"])->name('addByFile');
    Route::get('/manager/employeedetail/{emp_id}', [mngController::class, "toDetail"])->name('toDetail');
    Route::get('/manager/edit/{emp_id}', [mngController::class, "toEdit"])->name('toEdit');
    Route::post('/manager/edit/{emp_id}', [mngController::class, "edit"])->name('edit');


    //employee
    Route::get('/emp', [empController::class, "index"])->name('emp');
    Route::get('/employee/checkattendance', [empController::class, "tocheckattendance"])->name('tocheckattendance');
    Route::get('/employee/check_emp_id', [empController::class, "checkEmployeeID"])->name('checkEmployeeID');
    Route::get('/check-employee', [empController::class, "checkEmployee"])->name('checkEmployee');
    Route::post('/checkattendance', [empController::class, "checkattendance"])->name('checkattendance');
});

