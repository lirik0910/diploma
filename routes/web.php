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
    return view('welcome');
});

Route::prefix('projects')->group(function (){
    Route::get('/add', 'PageController@addProject');
    Route::post('/add', 'ProjectsController@create');
    Route::post('/projects/{id}', 'ProjectsController@update');
    Route::get('/delete/{id}', 'ProjectsController@delete');
    Route::get('/projects/{id}', 'ProjectsController@one');
    Route::get('/', 'ProjectsController@all');
    Route::get('/choose/{id}', 'ProjectsController@choose');
});

