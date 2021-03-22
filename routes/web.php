<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace'=>'frontend'], function ()
{
Route::any('/','ApplicationController@index')->name('index');
    Route::any('/contact','ApplicationController@contact')->name('contact');
    Route::any('/about','ApplicationController@about')->name('about');
    Route::any('/login','ApplicationController@login')->name('login');
    Route::group(['prefix'=>'users' ,'middleware'=>'auth:web' ], function () {
        Route::any('/', 'ApplicationController@user')->name('users');

    Route::any('logout', 'ApplicationController@logout')->name('logout');

    });
});








Route::group(['namespace'=>'backend'], function ()
{
    Route::any('admin-login','AdminUserController@login')->name('admin-login');
});

Route::group(['namespace'=>'backend','prefix'=>'admin' ,'middleware'=>'auth:admin'], function ()
{
    Route::any('/','DashboardController@index')->name('admin');
    Route::group(['prefix'=>'admin-users'], function () {
         Route::any('/', 'AdminUserController@index')->name('show-admin-users');
         Route::any('/add-admin-user', 'AdminUserController@add')->name('add-admin-user');
        Route::any('update-user-status', 'AdminUserController@updateStatus')->name('update-user-status');
        Route::any('update-user-type', 'AdminUserController@updateType')->name('update-user-type');
        Route::any('delete-admin-user/{criteria?}', 'AdminUserController@delete')->name('delete-admin-user');
        Route::any('edit-admin-user/{id?}', 'AdminUserController@edit')->name('edit-admin-user');
        Route::any('edit-admin-user-action', 'AdminUserController@editAction')->name('edit-admin-user-action');
    });

    Route::any('admin-logout', 'AdminUserController@logout')->name('admin-logout');

});
