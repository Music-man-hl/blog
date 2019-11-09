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
    return redirect('home');
});

Auth::routes();
Route::middleware('auth')->get('/user', function () {
    return Auth::getUser();
});

Route::get('home', 'HomeController@index')->name('home');
Route::resource('articles', 'ArticleController');
Route::resource('comments', 'CommentController');

Route::middleware(['auth'])->prefix('admin')->namespace('Admin')->name('admin.')->group(function () {

    Route::resource('articles', 'ArticleController');
    Route::prefix('articles')->group(function () {

        Route::get('/switch-hidden/{id}', 'ArticleController@switchHidden');

        Route::get('/switch-top/{id}', 'ArticleController@switchTop');
    });

    Route::get('/', 'AdminController@index')->name('admin');
});
