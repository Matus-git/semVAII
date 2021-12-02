<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HoodieController;
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
    return view('home');
})->name('home');

Route::get('/test', function () {
    return view('navtest');
})->name('test');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/hoodie',[HoodieController::class,'show'])->name('hoodie');

Route::get('/shirt', function () {
    return view('shirt');
})->name('shirt');

Route::get('/cap', function () {
    return view('cap');
})->name('cap');

Route::get('/accessories', function () {
    return view('accessories');
})->name('accessories');

Route::get('/create-hoodie', function () {
    return view('create-hoodie');
})->name('create-hoodie');

Route::resource('hoodies',HoodieController::class);

Route::post('/store',[HoodieController::class,'store'])->name('store');
Route::get('/hoodie/{id_hoodie}',[HoodieController::class,'delete'])->name('delete');


Route::get('/edit-hoodie/{id_hoodie}',[HoodieController::class,'edit'])->name('edit-hoodie');
Route::post('/update/{id_hoodie}',[HoodieController::class,'update'])->name('update');

