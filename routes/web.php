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
//home po zalogowaniu
Route::get('/', 'HomeController@index')->name('home')->middleware('auth');

//logowanie
Route::get('signin', 'UserController@getSignIn')->name('signIn');
Route::post('signin', 'UserController@postSignIn')->name('signIn');


//rejestracja
Route::get('signup', 'UserController@getSignUp')->name('signUp')->middleware('auth');
Route::post('signup', 'UserController@postSignUp')->name('signUp')->middleware('auth');

//wyloguj
Route::get('logout', 'UserController@logout')->name('logout');

//konta
Route::get('users', 'UserController@users')->name('users')->middleware('auth');


//usun konto
Route::delete('/user/{id}', 'UserController@getDelete');
        
//edycja
Route::get('edit/{id}', 'UserController@getEdit')->name('edit')->middleware('auth');
Route::post('edit/{id}', 'UserController@postEdit')->name('postEdit')->middleware('auth');