<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InterventionController;
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


Route::get('/intervention', [InterventionController::class, 'index'])->name('index');
Route::post('/intervention', [InterventionController::class, 'store'])->name('store');