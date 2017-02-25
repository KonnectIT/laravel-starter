<?php

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['role:administrator,access_backend']], function () {
    //
});

Route::get('/home', 'HomeController@index');
