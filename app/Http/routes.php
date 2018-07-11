<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('psh_login', ['as' => 'getLogin', 'uses' => 'LoginController@getLogin']);
Route::post('psh_login', ['as' => 'postLogin', 'uses' => 'LoginController@postLogin']);

Route::get('logout', ['as' => 'getLogout', 'uses' => 'LoginController@getLogout']);

Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => 'psh_admin','namespace' => 'Admin'], function() {
        Route::get('/', function () {
           return view('admin.dashboard.main');
        });
        Route::group(['prefix' => 'catelogy'], function() {
            Route::get('add', ['as' => 'getCateAdd', 'uses' => 'CateController@getCateAdd']);
            Route::post('add', ['as' => 'postCateAdd', 'uses' => 'CateController@postCateAdd']);

            Route::get('list', ['as' => 'getCateList', 'uses' => 'CateController@getCateList']);

            Route::get('delete/{id}', ['as' => 'getCateDel', 'uses' => 'CateController@getCateDel'])->where('id', '[0-9]+');

            Route::get('edit/{id}', ['as' => 'getCateEdit', 'uses' => 'CateController@getCateEdit'])->where('id', '[0-9]+');
            Route::post('edit/{id}', ['as' => 'postCateEdit', 'uses' => 'CateController@postCateEdit'])->where('id', '[0-9]+');
        });
        Route::group(['prefix' => 'user'], function() {
            Route::get('add', ['as' => 'getUserAdd', 'uses' => 'UserController@getUserAdd']);
            Route::post('add', ['as' => 'postUserAdd', 'uses' => 'UserController@postUserAdd']);

            Route::get('list', ['as' => 'getUserList', 'uses' => 'UserController@getUserList']);

            Route::get('delete/{id}', ['as' => 'getUserDel', 'uses' => 'UserController@getUserDel'])->where('id', '[0-9]+');

            Route::get('edit/{id}', ['as' => 'getUserEdit', 'uses' => 'UserController@getUserEdit'])->where('id', '[0-9]+');
            Route::post('edit/{id}', ['as' => 'postUserEdit', 'uses' => 'UserController@postUserEdit'])->where('id', '[0-9]+');
        });
        Route::group(['prefix' => 'psh_news'], function() {

        });
    });
});