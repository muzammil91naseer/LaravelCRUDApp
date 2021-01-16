<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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

Route::group(['middleware' => ['auth', 'admin']], function() {
    Route::get('/admin', [App\Http\Controllers\adminController::class, 'getData'])->name('admin_panel');
    Route::get('/delete_company/{id}', [App\Http\Controllers\adminController::class, 'deleteCompany'])->name('delete_company_route');
    Route::get('/delete_employee/{id}', [App\Http\Controllers\adminController::class, 'deleteEmployee'])->name('delete_employee_route');

});

