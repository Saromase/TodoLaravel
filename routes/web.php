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

Route::get('/hello', function () {
    return view('welcome');
});

Route::prefix('postit')->group(function () {
    Route::get('/', 'PostIt\PostItController@index')->name('postitIndex');
    Route::get('/add', 'PostIt\PostItController@add')->name('postitAdd');
    Route::post('/create', 'PostIt\PostItController@create')->name('postitCreate');
    Route::get('/edit/{id}', 'PostIt\PostItController@edit')->name('postitEdit');
    Route::post('/update', 'PostIt\PostItController@updateOne')->name('postitUpdate');
    Route::get('/delete/{id}', 'PostIt\PostItController@deleteOne')->name('postitDeleteOne');
    Route::get('/duplicate/{id}', 'PostIt\PostItController@duplicateOne')->name('postitDuplicateOne');
    
    Route::prefix('status')->group(function () {
        Route::get('/', 'PostIt\PostItStatusController@index')->name('postitStatusIndex');
        Route::get('/add', 'PostIt\PostItStatusController@add')->name('postitStatusAdd');
        Route::post('/create', 'PostIt\PostItStatusController@create')->name('postitStatusCreate');
        Route::get('/edit/{id}', 'PostIt\PostItStatusController@edit')->name('postitStatusEdit');
        Route::post('/update', 'PostIt\PostItStatusController@updateOne')->name('postitStatusUpdate');
        Route::get('/delete/{id}', 'PostIt\PostItStatusController@deleteOne')->name('postitStatusDeleteOne');
    });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
