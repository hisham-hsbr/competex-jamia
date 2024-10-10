<?php

use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/', function () {
//     return view('front_end.welcome');
// });

Route::get('/', 'FrontendDashboardController@index')->name('front-end.index');
Route::get('/course-registration{id}', 'FrontendDashboardController@courseRegistration')->name('front-end.course-registration');
Route::post('/course-registration/store', 'FrontendDashboardController@courseRegistrationStore')->name('front-end.course-registration-store');

Route::get('/get-countries', 'AddressController@getCountries');
Route::get('/get-states/{country}', 'AddressController@getStates');
Route::get('/get-districts/{state}', 'AddressController@getDistricts');
Route::get('/get-cities/{district}', 'AddressController@getCities');
Route::get('/get-zipCodes/{city}', 'AddressController@getZipCodes');
