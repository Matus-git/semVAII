<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HoodieController;
use App\Http\Controllers\ProductController;

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



//Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
//Route::post('login', 'Auth\LoginController@login');
//Route::post('logout', 'Auth\LoginController@logout')->name('logout');
//
//// Registration Routes...
//Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
//Route::post('register', 'Auth\RegisterController@register');
//
//// Password Reset Routes...
//Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
//Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
//Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
//Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Auth::routes();

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




Route::get('/login', function () {
    return view('login');
})->name('login');


Route::get('/registration', function () {
    return view('registration');
})->name('registration');


Route::resource('hoodies',HoodieController::class);





Route::group(['middleware' => 'is_admin'], function () {
    Route::post('/store',[HoodieController::class,'store'])->name('store');

    Route::get('/hoodie/{id_hoodie}',[HoodieController::class,'delete'])->name('delete');

    Route::get('/edit-hoodie/{id_hoodie}',[HoodieController::class,'edit'])->name('edit-hoodie');

    Route::post('/update/{id_hoodie}',[HoodieController::class,'update'])->name('update');

    Route::post('/create-hoodie/fetch',[ProductController::class,'fetch'])->name('create-hoodie.fetch');

    Route::get('/create-hoodie/getProducts',[ProductController::class,'getProducts'])->name('create-hoodie.getProducts');

    Route::post('/store/price',[ProductController::class,'store'])->name('store.price');

    Route::get('/create-price', function () {
        return view('create-price');
    })->name('create-price');

    Route::get('/create-hoodie', function () {
        return view('create-hoodie');
    })->name('create-hoodie');

});




