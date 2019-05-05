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
    return redirect()->route('home');
});

Auth::routes();

Route::get('/user', function () {

    return Auth::getUser();

})->middleware('auth');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/post', 'HomeController@post')->name('post');

Route::resource('/articles', 'ArticleController');

Route::resource('/pictures', 'PictureController');

Route::resource('/comments', 'CommentController');

Route::middleware(['auth'])->prefix('admin')->group(function () {

    Route::prefix('articles')->group(function(){

        Route::get('/switch-hidden/{id}', 'ArticleController@switchHidden');

        Route::get('/switch-top/{id}', 'ArticleController@switchTop');
    });

    Route::get('/', 'AdminController@index')->name('admin');


});