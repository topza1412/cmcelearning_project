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

// Route::get('/', function () {
//     return view('welcome');
// });



Route::get('page-offline', function () {
    return view('page_offline');
});

Route::group( [ 'middleware' => 'status_web'], function()
{

//language
Route::get('locale/{locale}', function ($locale){
    Session::put('locale', $locale);
    return redirect()->back();
});

Route::get('/', 'Member\HomeController@index');


//login
Route::get('login', 'Member\LoginController@index');
Route::get('social/login/{type}', 'Member\LoginController@social_login');
Route::get('social/login/callback/{provider}', 'Member\LoginController@social_callback');
Route::post('login/auth', 'Member\LoginController@auth');
Route::get('logout', 'Member\LoginController@logout');

//forgotpassword
Route::get('forgotpassword', 'Member\ForgotPasswordController@index');
Route::post('forgotpassword/sendmail', 'Member\ForgotPasswordController@sendmail');
Route::get('forgotpassword/changepassword/{token_email}',
'Member\ForgotPasswordController@changepassword');
Route::post('forgotpassword/verify', 'Member\ForgotPasswordController@verify');

//register
Route::get('register', 'Member\RegisterController@index');
Route::post('register/create', 'Member\RegisterController@create');


//about
Route::get('about', 'Member\AboutController@index');

//terms & condition
Route::get('terms', 'Member\TermsController@index');

//product
Route::get('product', 'Member\ProductController@index');
Route::get('product/detail/{id}/{title}', 'Member\ProductController@view_product');


//category
Route::get('category/{id}/{title}', 'Member\CategoryController@category');
Route::get('category/subcategory/{level}/{id}/{title}', 'Member\CategoryController@subcategory');


//course
Route::get('course', 'Member\CourseController@index');
Route::get('course/category/{id}/{title}', 'Member\CourseController@category');
Route::get('course/detail/{id}/{title}', 'Member\CourseController@view_course');
Route::get('course/lesson/detail/{course_id}/{lesson_id}/{title}', 'Member\CourseController@course_lesson_detail');
Route::get('course/favorite', 'Member\CourseController@course_favorite');
Route::get('course/favorite/save/{id}', 'Member\CourseController@course_favorite_save');
Route::get('course/favorite/delete/{id}', 'Member\CourseController@course_favorite_delete');
Route::get('course/review/{id}', 'Member\CourseController@review_course');
Route::get('course/success', 'Member\CourseController@course_success');
Route::get('course/success/delete/{id}', 'Member\CourseController@course_success_delete');

//news
Route::get('news', 'Member\NewsController@index');
Route::get('news/detail/{id}/{title}', 'Member\NewsController@view_news');

//contact
Route::get('contact', 'Member\ContactController@index');
Route::post('contact/sendmail', 'Member\ContactController@send_mail');

//subscribe
Route::post('subscribe', 'Member\ContactController@subscribe');


//all search
Route::post('search', 'Member\CourseController@search_course');


//cart & checkout
Route::get('addtocart/{id}', 'Member\CartController@addtocart');
Route::get('cart', 'Member\CartController@index');
Route::post('cart/update', 'Member\CartController@updatecart');
Route::get('cart/delete/{id}', 'Member\CartController@removecart');
Route::get('cart/clear', 'Member\CartController@clearcart');
Route::get('checkout', 'Member\CartController@checkout');
Route::post('confirm', 'Member\CartController@confirm');
Route::get('confirm/success', function () {
    return view('page.member.confirm_success');
});


//dashboard
Route::get('dashboard', 'Member\DashboardController@index');
Route::get('profile/changepassword', 'Member\ProfileController@changepassword');
Route::post('profile/changepassword/update', 'Member\ProfileController@password_update');
Route::post('profile/update/{type}', 'Member\ProfileController@profile_update');

//my order
Route::get('myorder', 'Member\OrdersController@index');
Route::get('myorder/detail/{id}', 'Member\OrdersController@detail');
Route::post('myorder/search', 'Member\OrdersController@search');
Route::get('myorder/delete', 'Member\OrdersController@delete');

//wishlist
Route::get('mywishlist', 'Member\WishlistController@index');
Route::post('mywishlist/search', 'Member\WishlistController@search');
Route::get('mywishlist/delete', 'Member\WishlistController@delete');

//my course
Route::get('mycourse', 'Member\MyCourseController@index');
Route::post('mycourse/search', 'Member\MyCourseController@search');
Route::get('mycourse/delete', 'Member\MyCourseController@delete');
Route::get('mycourse/testing/{id}/{title}/{step}', 'Member\MyCourseController@testing_course');
Route::post('mycourse/testing/save', 'Member\MyCourseController@save_testing_course');
Route::get('mycourse/testing/score/{pretest}/{posttest}/{title}/{question_amount}/{status}', 'Member\MyCourseController@testing_course_score');



//end route member
});





//route admin
Route::get('admin/login', 'Admin\LoginController@index');
Route::post('admin/login/auth', 'Admin\LoginController@auth');
Route::get('admin/logout', 'Admin\LoginController@logout');

//forgotpassword
Route::get('admin/forgotpassword', 'Admin\ForgotPasswordController@index');
Route::post('admin/forgotpassword/sendmail', 'Admin\ForgotPasswordController@sendmail');
Route::get('admin/forgotpassword/changepassword/{token_email}',
'Admin\ForgotPasswordController@changepassword');
Route::post('admin/forgotpassword/verify', 'Admin\ForgotPasswordController@verify');

//home
Route::get('admin/home', 'Admin\HomeController@index');

//admin profile
Route::get('admin/profile/{page}', 'Admin\ProfileController@form');
Route::post('admin/profile/{page}/action', 'Admin\ProfileController@action');


//admin setting
Route::get('admin/setting/{page}', 'Admin\SettingController@page');
Route::get('admin/setting/{page}/add', 'Admin\SettingController@form_add');
Route::get('admin/setting/{page}/edit/{id}', 'Admin\SettingController@form_edit');
Route::post('admin/setting/{page}/action', 'Admin\SettingController@action');
Route::get('admin/setting/delete/{page}/{id}', 'Admin\SettingController@delete');


//admin users
Route::get('admin/users/{page}', 'Admin\UsersController@page');
Route::post('admin/users/{page}/search', 'Admin\UsersController@search');
Route::get('admin/users/{page}/add', 'Admin\UsersController@form_add');
Route::get('admin/users/{page}/edit/{id}', 'Admin\UsersController@form_edit');
Route::post('admin/users/{page}/action', 'Admin\UsersController@action');
Route::get('admin/users/memberperiod/{id}/{date_today}/{date_auto}', 'Admin\UsersController@memberperiod');
Route::get('admin/users/delete/{page}/{id}', 'Admin\UsersController@delete');

//admin course
Route::get('admin/course/{page}', 'Admin\CourseController@page');
Route::post('admin/course/{page}/search', 'Admin\CourseController@search');
Route::get('admin/course/{page}/add', 'Admin\CourseController@form_add');
Route::get('admin/course/{page}/edit/{id}', 'Admin\CourseController@form_edit');
Route::post('admin/course/{page}/edit/{id}', 'Admin\CourseController@form_edit');
Route::post('admin/course/{page}/action', 'Admin\CourseController@action');
Route::get('admin/course/delete/{page}/{id}', 'Admin\CourseController@delete');


//admin product
Route::get('admin/products/{page}', 'Admin\ProductsController@page');
Route::post('admin/products/{page}/search', 'Admin\ProductsController@search');
Route::get('admin/products/{page}/add', 'Admin\ProductsController@form_add');
Route::get('admin/products/{page}/edit/{id}', 'Admin\ProductsController@form_edit');
Route::post('admin/products/{page}/action', 'Admin\ProductsController@action');
Route::get('admin/products/delete/{page}/{id}', 'Admin\ProductsController@delete');

//admin content
Route::get('admin/content/{page}', 'Admin\ContentController@page');
Route::post('admin/content/{page}/action', 'Admin\ContentController@action');
Route::get('admin/content/delete/{page}/{id}', 'Admin\ContentController@delete');

//admin news
Route::get('admin/news/{page}', 'Admin\NewsController@page');
Route::post('admin/news/{page}/search', 'Admin\NewsController@search');
Route::get('admin/news/{page}/add', 'Admin\NewsController@form_add');
Route::get('admin/news/{page}/edit/{id}', 'Admin\NewsController@form_edit');
Route::post('admin/news/{page}/action', 'Admin\NewsController@action');
Route::get('admin/news/delete/{page}/{id}', 'Admin\NewsController@delete');

//admin orders
Route::get('admin/orders/{page}', 'Admin\OrdersController@page');
Route::post('admin/orders/{page}/search', 'Admin\OrdersController@search');
Route::get('admin/orders/view/{id}', 'Admin\OrdersController@view_data');
Route::post('admin/orders/{page}/action', 'Admin\OrdersController@action');
Route::get('admin/orders/delete/{id}', 'Admin\OrdersController@delete');


//admin report
Route::get('admin/report/{page}', 'Admin\ReportController@page');
Route::post('admin/report/{page}/search', 'Admin\ReportController@search');
Route::post('admin/report/{page}/export', 'Admin\ReportController@export');


