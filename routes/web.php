<?php

use App\Http\Controllers\HomeController;
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

Route::get('/dadata/', [HomeController::class, 'form'])->name('form');
Route::post('/dadata/suggest', [HomeController::class, 'suggest'])->name('suggest');
Route::post('/dadata/select', [HomeController::class, 'select'])->name('select');
