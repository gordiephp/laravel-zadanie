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

//konta////////////////////////////////////////////////

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

//Klienci////////////////////////////////////////////

//wyszukiwarka
Route::post('/clients', 'ClientController@index')->name('clientEdit')->middleware('auth');
Route::get('/clients', 'ClientController@index')->name('clientEdit')->middleware('auth');

//pojedynczy klient 
Route::get('/clients/{id}', 'ClientController@clientShow')->name('clientShow')->middleware('auth')->where('id', '[0-9]+');;

//nowy klient
Route::get('clients/new', 'ClientController@getNewClient')->name('newClient')->middleware('auth');
Route::post('clients/new', 'ClientController@postNewClient')->name('newClient')->middleware('auth');

//usuwanie klienta
Route::delete('/clients/{id}', 'ClientController@ClientDelete');

//edycja klienta
Route::get('/clients/edit/{id}', 'ClientController@getEdit')->name('clientEdit')->middleware('auth');
Route::post('clients/edit/{id}', 'ClientController@postEdit')->name('clientEdit')->middleware('auth');

//kontakty////////////////////////////////////////////

//lista kontaktow klienta
Route::get('contact/{id}/client', 'ContactController@ContactsIndex')->name('contactList')->middleware('auth');

//nowy kontakt klienta
Route::get('contact/create/{id}', 'ContactController@create')->name('createContact')->middleware('auth');
Route::post('contact/create/{id}', 'ContactController@storeId')->name('createContact')->middleware('auth');

Route::resource('contact', 'ContactController');

//notatki////////////////////////////////////////////////

//nowa notatka klienta
Route::get('notes/create/{id}', 'NoteController@create')->name('createNote')->middleware('auth');
Route::post('notes/create/{id}', 'noteController@storeId')->name('createNote')->middleware('auth');

//lista notatek klienta
Route::get('notes/{id}/client', 'NoteController@NoteIndex')->name('noteList')->middleware('auth');

Route::resource('notes', 'NoteController');

//pliki klienta//////////////////////////////////////////

//nowy plik klienta
Route::get('files/create/{id}', 'FileController@create')->name('createFile')->middleware('auth');
Route::post('files/create/{id}', 'FileController@storeId')->name('createFile')->middleware('auth');

//lista plikow klienta
Route::get('files/{id}/client', 'FileController@fileIndex')->name('fileList')->middleware('auth');

Route::resource('files', 'FileController');

//otworz plik klienta
Route::get('pdf/{id}', 'FileController@pdf')->name('pdf')->middleware('auth'); 



















