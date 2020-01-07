<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


//member
Route::post('course', 'Member\CourseController@index');
Route::post('course/category', 'Member\CourseController@category');
Route::post('course/review', 'Member\CourseController@review_course');
Route::get('addesss/getdata', 'Member\ApiController@getdata_address');
Route::post('checkout/transfer', 'Member\CartController@transfer_payment');
Route::post('checkout/credit', 'Member\CartController@credit_card');
Route::post('mycourse/testing/save', 'Member\MyCourseController@save_testing_course');

//admin
Route::get('admin/category/getdata', 'Admin\ApiController@getdata_category');
Route::post('admin/course/{page}/action', 'Admin\CourseController@action');
Route::post('admin/course/lesson/upload', 'Admin\CourseController@upload_file_lesson');
Route::post('admin/course/lesson/upload/delete', 'Admin\CourseController@delete_upload_file_lesson');
Route::post('admin/content/{page}/action', 'Admin\ContentController@action');

//test vue js 
Route::post('/post/create', 'PostController@store');
Route::get('/post/edit/{id}', 'PostController@edit');
Route::post('/post/update/{id}', 'PostController@update');
Route::delete('/post/delete/{id}', 'PostController@delete');
Route::get('/posts', 'PostController@index');
