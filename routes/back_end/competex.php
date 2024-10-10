<?php

use Illuminate\Support\Facades\Route;


Route::middleware('auth')->group(function () {

    //test demo
    Route::controller('CourseController')->prefix('/competex/course')->name('courses.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::patch('/update/{id}', 'update')->name('update');
        Route::get('/get', 'coursesGet')->name('get');
        Route::get('/show/{id}', 'show')->name('show');
        Route::delete('/destroys/{id}', 'destroy')->name('destroy');
        Route::delete('/force-destroy/{id}', 'forceDestroy')->name('force.destroy');
        Route::get('/restore/{id}', 'restore')->name('restore');
        Route::get('/pdf/{id}', 'coursesPDF')->name('pdf');
        Route::get('/import', 'coursesImport')->name('import');
        Route::post('/upload', 'coursesUpload')->name('upload');
        Route::get('/download', 'coursesDownload')->name('download');

        Route::get('/demo1', 'demo1')->name('demo1');
        Route::get('/check', 'check')->name('check');
    });
    //test demo
    Route::controller('CourseRegistrationController')->prefix('/competex/course-registration')->name('course-registrations.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::patch('/update/{id}', 'update')->name('update');
        Route::get('/get', action: 'courseRegistrationsGet')->name('get');
        Route::get('/show/{id}', 'show')->name('show');
        Route::delete('/destroys/{id}', 'destroy')->name('destroy');
        Route::delete('/force-destroy/{id}', 'forceDestroy')->name('force.destroy');
        Route::get('/restore/{id}', 'restore')->name('restore');
        Route::get('/pdf/{id}', 'courseRegistrationsPDF')->name('pdf');
        Route::get('/import', 'courseRegistrationsImport')->name('import');
        Route::post('/upload', 'courseRegistrationsUpload')->name('upload');
        Route::get('/download', 'courseRegistrationsDownload')->name('download');

        Route::get('/demo1', 'demo1')->name('demo1');
        Route::get('/check', 'check')->name('check');
    });
});