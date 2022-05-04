<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;


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
    return redirect('/users');
});

Route::get('/users', [AdminController::class, 'index'])->name('users.index');
Route::get('/users/create', [AdminController::class, 'create'])->name('users.create');
Route::get('/users/{id}/edit', [AdminController::class, 'edit'])->name('users.edit');

