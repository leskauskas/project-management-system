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

Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');

Route::resource('projects', 'ProjectsController');
Route::resource('tasks', 'TasksController');
Route::resource('checklists', 'ChecklistsController');
Auth::routes();

Route::get('/dashboard', 'DashboardController@index');
Route::post('','TasksController@store');
Route::post('/dashboard','ChecklistsController@store');