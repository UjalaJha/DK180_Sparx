<?php

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
    return view('landing/index');
});
Route::get('/test','TestControler@index');
Route::get('/test/{id}','TestControler@show');
Route::get('/login', function () {   
	return view('landing/login');
});
Route::get('/dashboard', function () {
    return view('template/dashboard');
});
Route::get('/instructions', function () {
    return view('template/instructions');
});
