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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', 'PageController@projects');

Route::prefix('projects')->group(function (){
    Route::get('/add', 'PageController@addProject');
    Route::get('/{id}', 'PageController@updateProject');
    Route::post('/add', 'ProjectsController@create');
    //Route::get('/', 'ProjectsController@all');




    Route::get('/choose/{id}', 'ProjectsController@choose');
});

Route::post('/projects/{id}', 'ProjectsController@update');
Route::get('/projects/delete/{id}', 'ProjectsController@delete');

Route::post('/vacancies/add', 'VacancyController@create');
Route::get('/vacancies/delete/{id}', 'VacancyController@delete');

Route::get('/vacancies/{id}', 'PageController@updateVacancy');

Route::post('/workers/choose', 'VacancyController@choose');

