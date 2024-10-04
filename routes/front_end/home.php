<?php

use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/', function () {
//     return view('front_end.welcome');
// });

Route::get('/', 'FrontEndDashboardController@index')->name('front-end.index');
Route::get('/details-registration', 'FrontEndDashboardController@detailsRegistration')->name('front-end.details-registration');
