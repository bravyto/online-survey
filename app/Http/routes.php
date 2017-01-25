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
    return view('auth/login');
});

//Login-Logout
Route::get('auth/login', 'LoginController@login');
Route::post('auth/login', 'LoginController@loginProcess');
Route::get('auth/logout', 'LoginController@logout');

//WebApps
Route::get('apps/webapps', 'AppsController@webapps');
Route::post('apps/webapps', 'AppsController@submitSurvey');
Route::post('apps/goodbye', 'AppsController@goodbye');

//Admin
Route::get('admin/pages/dashboard', 'AdminController@dashboard');
Route::get('admin/pages/surveydetail', 'AdminController@surveydetail');
Route::get('admin/pages/surveystop', 'AdminController@surveystop');
Route::get('admin/pages/surveydelete', 'AdminController@surveydelete');
Route::post('admin/pages/dashboard', 'AdminController@edit_respondent');
Route::post('admin/pages/edit-respondent', 'AdminController@edit_respondent_p');
//Admin-Pengguna
Route::post('admin/pages/pengguna', 'AdminController@pengguna');
//Admin-Survey
Route::get('admin/pages/layanan', 'AdminController@layanan');
Route::post('admin/pages/layanan', 'AdminController@layanan_post');
Route::get('admin/pages/layanan-detail', 'AdminController@layanan_detail_r');
Route::post('admin/pages/layanan-detail', 'AdminController@layanan_detail_p');
Route::get('admin/pages/layanan-create', 'AdminController@layanan_create');
Route::post('admin/pages/layanan-create', 'AdminController@layanan_create_p');
Route::post('admin/pages/layanan-delete', 'AdminController@layanan_delete');
Route::get('admin/pages/start-survey', 'AdminController@start_survey');
Route::post('admin/pages/start-survey', 'AdminController@start_survey_p');
//Admin-Edit Password
Route::get('admin/pages/edit-password', 'AdminController@edit_password');
Route::post('admin/pages/edit-password', 'AdminController@edit_password_p');
