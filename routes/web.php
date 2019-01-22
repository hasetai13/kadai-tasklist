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

// トップページ表示
// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/','TasksController@index');
// アプリ自体を制御するコントローラー、一覧表示。

//タスクをcrudするやつ
Route::resource('tasks','TasksController');

//ユーザー登録(ok)
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');


//ログイン認証(ok)
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

// ユーザ機能)(わからない)
Route::group(['middleware' => ['auth']], function () {
    Route::resource('users', 'UsersController', ['only' => ['index', 'show']]);
    Route::resource('tasklists', 'TasklistsController', ['only' => ['store', 'destroy']]);
});