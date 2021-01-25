<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Process_registrationController;
use App\Http\Controllers\Progress_confirmationController;
use App\Http\Controllers\Daily_reportController;
use App\Http\Controllers\SearchController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('home');
});

Route::get('/process/new', [Process_registrationController::class, 'new']);

Route::post('/process/create', [Process_registrationController::class, 'create']);

Route::get('/progress/index', [Progress_confirmationController::class, 'index']);

Route::get('/report/new', [Daily_reportController::class, 'new']);

Route::post('/report/create', [Daily_reportController::class, 'create']);

Route::get('/search/index', [SearchController::class, 'index']);