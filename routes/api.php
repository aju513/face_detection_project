<?php

use Illuminate\Support\Facades\Route;


Route::get('/notifications/list', 'NotificationController@index')->name('notifications.list.index');
Route::get('/notifications/read', 'NotificationController@read')->name('notifications.list.read');

Route::post('/test', 'StudentController@matchFace');
Route::get('/student', 'StudentController@students');
Route::post('/login', 'AuthController@login')->name('login');
Route::post('/register', 'AuthController@register')->name('register');
Route::middleware('auth:api')->group(
    function () {
        Route::post("/attendance", "StudentController@attendance");
    }
);
