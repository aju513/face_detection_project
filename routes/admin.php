<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.dashboard');
})->middleware('auth')->name('dashboard');

Route::get('users/changestatus/{id}', 'UserController@changeStatus')->name('users.status');
Route::get('user/profile', 'UserController@profile')->name('user.profile');
Route::get('change-password', 'UserController@changePassword')->name('user.change-password');
// Route::get('settings/{name?}', 'SettingController@show')->name('settings.edit');


Route::post('user/profile/update/{id}', 'UserController@profileUpdate')->name('user-profile.update');
Route::post('change-password/store/{id}', 'UserController@storeChangePassword')->name('change-password.store');
Route::post('user/account/update', 'UserController@updateAccountSetting')->name('user-account.update');
Route::get('settings', 'SettingController@index')->name('settings.index');
// Route::get('settings', 'SettingController@show')->name('settings.show');
Route::put('settings/{name}', 'SettingController@update')->name('settings.update');

Route::resource('users', 'UserController');
Route::resource('roles', 'RoleController');
Route::resource('activities', 'ActivityController')->only(['index', 'show', 'destroy']);
Route::resource('teachers', 'TeacherController');
Route::resource('students', 'StudentController');
