<?php
use Illuminate\Support\Facades\DB;

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

Route::get('/', 'pagescontroller@welcome');
Route::get('/todos', 'todosController@index')->name('todos');
Route::get('/todos/delete/{id}', 'todosController@delete')->name('todos.delete');
Route::get('/todos/save/{id}', 'todosController@save')->name('todos.save');
Route::get('/todos/update/{id}', 'todosController@update')->name('todos.update');
Route::get('/todos/complete/{id}', 'todosController@complete')->name('todos.complete');
Route::get('/todos/uncomplete/{id}', 'todosController@uncomplete')->name('todos.uncomplete');
Route::post('/create/todo','todosController@store');