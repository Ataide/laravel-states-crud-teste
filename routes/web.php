<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

// Welcome - Inicial;
Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', function () {
  $estados = \App\Estado::paginate(10);
  return view('home', ['estados' => $estados]);
});

// Permissions Routes
Route::get('/users', 'PermissionController@getUsersPermissions');
Route::post('/usersPermissions','PermissionController@setUsersPermissions');
Route::get('/permissions', 'PermissionController@getPermission');
Route::post('/permissions', 'PermissionController@setPermission');

//Ajax Routes
Route::post('/ajaxEstados','AjaxEstadosController@store');
Route::put('/ajaxEstados','AjaxEstadosController@update');



Auth::routes();

// App Routes
Route::resource('estados', 'EstadosController');
