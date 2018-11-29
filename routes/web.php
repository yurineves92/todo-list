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

Route::get('/','HomeController@index');
//Rotas simples
Route::resource('/categories', 'CategoriesController');
Route::resource('/users', 'UsersController');
Route::resource('/tasks', 'TasksController');
Route::get('/tasks/{id?}','TasksController@index');
Route::get('/tasks/view/{id}','TasksController@view');
Route::get('/tasks/list/{status}','TasksController@list');
Route::post('/tasks/finished/{id}','TasksController@finished');
//Reseta a senha
Route::get('/user/login','UsersController@login');
Route::get('/user/logout','UsersController@logout');
Route::post('/authenticate','UsersController@authenticate');
Route::post('/users/reset/{id}', ['uses' => 'UsersController@reset']);

