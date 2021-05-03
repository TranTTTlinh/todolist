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

Route::get('/', 'WelcomeController@home_free');
Route::get('/home-task', 'WelcomeController@home_task');

// xử lý phần đăng nhập
Route::get('/login', 'Auth\LoginController@login');
Route::post('/signin', 'Auth\LoginController@signin');

// xử lý phần đăng ký
Route::get('/register', 'Auth\RegisterController@register');
Route::post('/signup', 'Auth\RegisterController@signup');

// đăng xuất
Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/add-todo', 'Todo\TodoController@add_todo');
Route::post('/insert-todo', 'Todo\TodoController@insert_todo');

Route::get('/edit-todo/{id}', 'Todo\TodoController@edit_todo');
Route::post('/update-todo/{id}', 'Todo\TodoController@update_todo');

Route::get("/delete-todo/{id}", "Todo\TodoController@delete_todo");
