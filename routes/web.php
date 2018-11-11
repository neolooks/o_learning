<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

//Route::get('/home', 'HomeController@index');

Route::get('/', 'courseController@index');

Route::get('/edit_profile/{user_id}', 'employeeController@view_employee');
Route::post('store_employee', 'employeeController@store');

Route::get('view_course', 'courseController@view_course');
Route::get('edit_course', 'courseController@edit_course');


Route::get('/following_courses', 'employeeController@following_course');



Route::get('/create_course', 'courseController@create');

Route::post('/store_course', 'courseController@store');

Route::get('/course_image/{filename}', [
   'uses' => 'courseController@getUserImage',
   'as' => 'course.get_image'
   ]);




Route::post('/store_announcement', 'anouncmentController@store');
Route::get('/edit_announcement/{announcment_id}', 'anouncmentController@edit_announcment');
Route::get('/following_course', 'courseController@follwing_course');

Route::get('/home', 'courseController@view');
Route::get('/create_announcment', 'anouncmentController@create');

Route::post('/create_comment', 'courseController@create_comment');

Route::post('/create_review', 'courseController@create_review');

Route::get('/get_average_rating', 'courseController@get_rate_average');

Route::get('/get_course_count', 'ReportController@get_course_number');
Route::get('/get_student_count', 'ReportController@get_student_number');
Route::get('/get_lecture_count', 'ReportController@get_lecture_number');



Route::get('/sort', 'courseController@sort');

Route::get('/search', 'courseController@search');


