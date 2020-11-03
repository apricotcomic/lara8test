<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Menu\MenuController;
use App\Http\Controllers\TestinputController;


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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('menu/menu', [MenuController::class, 'menu'])->name('menu');

Route::resource('testinput', TestinputController::class);

Route::get('secret', [MenuController::class, 'secret'])->name('secret');
