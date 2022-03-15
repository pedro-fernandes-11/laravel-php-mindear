<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\MainController;

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

/*
Route::get('/categoria/{id?}', function ($id=0) {
    return "Categoria {$id}";
});
*/

Route::get('/', function () {
    return redirect()->route('home');
});

Route::get('home', function () {
    return view('home');
})->name('home');

Route::get('music/add', [MainController::class, 'add'])->name('music.add');

Route::get('music', [MainController::class, 'index'])->name('music');

Route::post('music/store', [MainController::class, 'store'])->name('music.store');
Route::post('music/update', [MainController::class, 'update'])->name('music.update');
Route::get('music/delete/{id}', [MainController::class, 'destroy'])->name('music.delete');

Route::get('music/show/{id}', [MainController::class, 'show'])->name('show');



Auth::routes();