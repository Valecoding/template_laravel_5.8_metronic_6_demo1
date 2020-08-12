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
Artisan::call('view:clear');

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/', function () {
    return redirect()->route('dashboard');
})->middleware('auth');

Route::get('login', "AuthController@getLogin")->name("login");
Route::post('login', "AuthController@postLogin");
Route::get('logout', "AuthController@getLogout");

Route::group(['middleware' => 'auth'], function(){
    Route::get('dashboard', function () {
        return view('index');
    })->name("dashboard");

    Route::group(['prefix' => 'users'], function(){
        Route::get('/', "UserController@index")->name("users");
        Route::get('add', "UserController@add");
        Route::post('store', "UserController@store");
        Route::get('edit/{id}', "UserController@edit");
        Route::post('delete/{id}', "UserController@delete");
    });
});
