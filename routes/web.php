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

//Start page route
Route::get('/', function () {
    return view('welcome');
});

//Auth route
Auth::routes(['register' => false]);

//Home
Route::get('/home', 'HomeController@index')->name('home');

//Admin dashboard route
Route::get('/dashboard', function () {
    return view('admin/dashboard');
})->middleware('auth');

//Companies routes
Route::group(['prefix' => 'admin'], function () {
    Route::resource('companies', 'CompanyController')->middleware('auth');
});

//Employees routes
Route::group(['prefix' => 'admin'], function () {
    Route::resource('employees', 'EmployeeController')->middleware('auth');
});
