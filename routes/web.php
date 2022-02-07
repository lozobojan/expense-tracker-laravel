<?php

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/reports', [App\Http\Controllers\HomeController::class, 'report'])->name('reports');

Route::resource("/expense", \App\Http\Controllers\ExpenseController::class);
Route::post('/add-remove-type', [App\Http\Controllers\ExpenseTypeController::class, 'addRemoveType'])->name('add-remove-type');
Route::get('/get-types-for-user', [App\Http\Controllers\ExpenseTypeController::class, 'getTypesForUser'])->name('get-types-for-user');
Route::get('/get-subtypes/{expense_type}', [App\Http\Controllers\ExpenseTypeController::class, 'getSubtypes'])->name('get-subtypes');
Route::resource('/expense-type', App\Http\Controllers\ExpenseTypeController::class);
Route::resource('/expense-subtype', App\Http\Controllers\ExpenseSubtypeController::class);