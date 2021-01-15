<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CompanytController;
use App\Http\Controllers\EmployeetController;

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
Route::resource('company', CompanytController::class);
Route::resource('employee', EmployeetController::class);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


