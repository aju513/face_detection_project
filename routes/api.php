<?php

use Illuminate\Support\Facades\Route;

//assignments

Route::post('/create/assignments', 'AssignmentController@createAssignment');
Route::post('/login', 'AuthController@login')->name('login');
Route::post('/register', 'AuthController@register')->name('register');

Route::get('/teacher', 'TeacherController@teacher');
Route::get('/teacherStudent', 'TeacherController@teacherStudent');
Route::middleware('auth:api')->group(
    function () {

        Route::get('/profile', 'StudentController@profile')->name('profile');
        Route::get('/logout', 'AuthController@logout')->name('logout');
        Route::post("/attendance", "StudentController@attendance");

        Route::get('/assignments/{id}', 'AssignmentController@getAllAssignments');
        Route::get('/assignments', 'AssignmentController@allAssignmentsOfStudent');

        Route::post('/match-face', 'StudentController@matchFace');
        Route::get('/student', 'StudentController@students');
        Route::get('/classes', 'StudentController@classes');
        Route::get('/classes/{id}', 'StudentController@classDetails');
        Route::post('/attendances', 'AttendanceController@markAttendance');

        Route::get('/notification', 'NotificationController@getAllNotificationOfStudent');
        Route::get('/recent/attendances', 'AttendanceController@getRecentAttendance');
        Route::get('/attendances/{id}', 'AttendanceController@getTotalAttendance');
        
    }
);
