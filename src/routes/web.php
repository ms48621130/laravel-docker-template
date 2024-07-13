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
//Laravelでは、URI(URL)とHTTPメソッドの組み合わせで実行する処理を定義する。URLとHTTPメソッドの組み合わせで実行する処理を指定することをルート定義と呼ぶ。
Route::get('/todo', 'TodoController@index')->name('todo.index');
// 一覧画面の表示のため、HTTPメソッドはget。getメソッドの第一引数がURI(URL)、第二引数が処理の実行先(今回はTodoController@index)を表す
Route::get('/todo/create', 'TodoController@create')->name('todo.create');
// 新規画面の表示のため、HTTPメソッドはget。getメソッドの第一引数がURI(URL)、第二引数が処理の実行先(今回はTodoController@create)を表す
Route::post('/todo', 'TodoController@store')->name('todo.store');
// 新規データの登録のため、HTTPメソッドはpost。getメソッドの第一引数がURI(URL)、第二引数が処理の実行先(今回はTodoController@store)を表す
Route::get('/todo/{id}', 'TodoController@show')->name('todo.show');
// 詳細画面の表示のため、HTTPメソッドはget。getメソッドの第一引数がURI(URL)、第二引数が処理の実行先(今回はTodoController@show)を表す
// /{id}の部分をルートパラメータという。{}は変数を表す。
Route::get('/todo/{id}/edit', 'TodoController@edit')->name('todo.edit');
// 編集画面の表示のため、HTTPメソッドはget。getメソッドの第一引数がURI(URL)、第二引数が処理の実行先(今回はTodoController@edit)を表す
