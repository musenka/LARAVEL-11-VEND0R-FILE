<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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
Route::redirect('/', '/home');
Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::post('/home', [HomeController::class, 'store'])->name('store');
Route::get('/delete/{media}', [HomeController::class, 'delete'])->name('delete');
Route::post('/home/{media}', [HomeController::class, 'incrementViews'])->name('increment-views');