<?php

use App\Http\Controllers\OfficeController;
use App\Http\Controllers\VisaApplicationController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('edit-application', [VisaApplicationController::class, 'editApplication'])->name('editApplication');


Route::get('edit-information', [VisaApplicationController::class, 'editUserInfo'])->name('editUserInfo');
Route::put('upsert', [VisaApplicationController::class, 'upsert'])->name('upsert');

Route::resource('offices', OfficeController::class);
Route::resource('visa-applications', VisaApplicationController::class);

require __DIR__.'/auth.php';
