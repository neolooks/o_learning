

<?php
use app\User;
use Illuminate\Support\Facades\Auth;
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



Route::get('/', 'courseController@index');



Route::get('/create_course', 'courseController@create');

Route::post('/store_course', 'courseController@store');

Route::get('/course_image/{filename}', [
   'uses' => 'courseController@getUserImage',
   'as' => 'course.get_image'
   ]);


   Auth::routes();
Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
    Route::get('/', 'Auth\LoginController@showLoginForm');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout');
}); 

Route::post('/store_announcement', 'anouncmentController@store');
Route::get('/following_course/{course_id}', 'courseController@follwing_course');

Route::get('/home', 'courseController@view');
Route::get('/create_announcment', 'anouncmentController@create');

