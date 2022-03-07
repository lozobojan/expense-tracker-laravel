<?php

use App\Http\Controllers\AttachmentController;
use App\Http\Controllers\ChangeLanguageController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReportController;
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

Route::get('/change-language', ChangeLanguageController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/reports', [App\Http\Controllers\HomeController::class, 'report'])->name('reports');

Route::resource("/expense", ExpenseController::class);
Route::post('/add-remove-type', [App\Http\Controllers\ExpenseTypeController::class, 'addRemoveType'])->name('add-remove-type');
Route::get('/get-types-for-user', [App\Http\Controllers\ExpenseTypeController::class, 'getTypesForUser'])->name('get-types-for-user');
Route::get('/get-subtypes/{expense_type}', [App\Http\Controllers\ExpenseTypeController::class, 'getSubtypes'])->name('get-subtypes');
Route::get('/home/get-chart-data', [HomeController::class, 'getChartData'])->name('get-chart-data');
Route::get('/reports', [ReportController::class, "index"])->name("reports");
Route::post('/reports', [ReportController::class, "generateReport"])->name("generate-report");
Route::post('/reports/email', [ReportController::class, "sendEmailReport"])->name("send-email-report");

Route::resource("/attachment", AttachmentController::class);
Route::get("expense/{expense}/attachments", [ExpenseController::class, "getAttachments"]);

