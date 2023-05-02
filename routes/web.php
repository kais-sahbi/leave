<?php

use App\Http\Controllers\DepartementController;
use App\Http\Controllers\EmpController;
use App\Http\Controllers\RoleController;
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


//Route::view('employer','admin.create');

/*Route::get('/employer', function () {
    return view('admin.create');
});*/
Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//l'enregistrement de middleware('admin') est dans kernel.php dans $routeMiddleware
Route::prefix('admin')->middleware(['admin','linkPermission'])->group(function (){


    ////////////////////////////departements
    Route::get('/departements/create',[DepartementController::class,'create'])->name('departement.create');
    Route::post('/departements/store',[DepartementController::class,'store'])->name('departement.store');
    Route::get('/departements/list',[DepartementController::class,'index'])->name('departement.list');
    Route::get('/departements/{departement}/edit',[DepartementController::class,'edit'])->name('departement.edit');
    Route::put('/departements/{departement:id}/update',[DepartementController::class,'update'])->name('departement.update');
    Route::delete('/departements/{deletdep}/delete',[DepartementController::class,'destroy'])->name('departement.destroy');
//Role
    Route::get('/role/create',[RoleController::class,'create'])->name('role.create');
    Route::post('/role/store',[RoleController::class,'store'])->name('role.store');
    Route::get('/role/list',[RoleController::class,'index'])->name('role.list');
    Route::get('/role/{rrr}/edit',[RoleController::class,'edit'])->name('role.edit');
    Route::put('/role/{rrr}/update',[RoleController::class,'update'])->name('role.update');
    Route::delete('/role/{deletrol}/delete',[RoleController::class,'destroy'])->name('role.destroy');
//User
    Route::get('/user/create',[EmpController::class,'create'])->name('user.create');
    Route::post('/user/store',[EmpController::class,'store'])->name('user.store');
    Route::get('/user/list',[EmpController::class,'index'])->name('user.list');
    Route::get('/user/{id_edit}/edit',[EmpController::class,'edit'])->name('user.edit');
    Route::put('/user/{id_edit}/update',[EmpController::class,'update'])->name('user.update');
    Route::delete('user/{id_user}/delete',[EmpController::class,'destroy'])->name('user.destroy');
//Permission
    Route::get('/permission/create',[\App\Http\Controllers\PermissionController::class,'create'])->name('permisssion.create');
    Route::post('/permission/store',[\App\Http\Controllers\PermissionController::class,'store'])->name('permisssion.store');
    Route::get('/permission/list',[\App\Http\Controllers\PermissionController::class,'index'])->name('permisssion.list');
    Route::get('/permission/{rrr}/edit',[\App\Http\Controllers\PermissionController::class,'edit'])->name('permission.edit');
    Route::put('/permission/{rrr:id}/update',[\App\Http\Controllers\PermissionController::class,'update'])->name('permission.update');
    Route::delete('/permission/{id_permission}/delete',[\App\Http\Controllers\PermissionController::class,'destroy'])->name('permission.destroy');
//Leave
    Route::get('/leave/create',[\App\Http\Controllers\LeaveController::class,'create'])->name('leave.create');
    Route::post('/leave/store',[\App\Http\Controllers\LeaveController::class,'store'])->name('leave.store');
    Route::get('/leave/list',[\App\Http\Controllers\LeaveController::class,'index'])->name('leave.list');
    Route::get('/leave/{leave}/edit',[\App\Http\Controllers\LeaveController::class,'edit'])->name('leave.edit');
    Route::put('/leave/{leave}/update',[\App\Http\Controllers\LeaveController::class,'update'])->name('leave.update');
    Route::delete('/leave/{delleave}/delete',[\App\Http\Controllers\LeaveController::class,'destroy'])->name('leave.destroy');

    Route::post('/leave/{leave}/acceptreject',[\App\Http\Controllers\LeaveController::class,'acceptReject'])->name('leave.acceptreject');

});

