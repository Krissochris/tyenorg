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

Route::get('/', function () {
    return view('frontend.pages.index');
});
Route::get('/administrator', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
    Route::get('table-list', function () {
        return view('pages.table_list');
    })->name('table');

    Route::get('blog-table', 'BlogsController@index')->name('blog-table');
    Route::resource('course', 'CoursesController');

    Route::get('comment-table', function () {
        return view('pages.table_list');
    })->name('comment-table');

	Route::get('typography', function () {
		return view('pages.typography');
	})->name('typography');

	Route::get('icons', function () {
		return view('pages.icons');
	})->name('icons');

	Route::get('map', function () {
		return view('pages.map');
	})->name('map');

	Route::get('notifications', function () {
		return view('pages.notifications');
	})->name('notifications');

	Route::get('rtl-support', function () {
		return view('pages.language');
	})->name('language');

	Route::get('upgrade', function () {
		return view('pages.upgrade');
	})->name('upgrade');
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::resource('tutor', 'UserController', ['except' => ['show']]);
	Route::resource('admin', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

Route::get('/index', 'PagesController@index')->name('index');
Route::get('/about-us', 'PagesController@about');
Route::get('/contact-us', 'PagesController@contact');
Route::get('/blog', 'PagesController@blog');
Route::get('/portfolio', 'PagesController@portfolio');
Route::get('/faq', 'PagesController@faq');
Route::get('/courses', 'PagesController@courses');
Route::get('/teach-on-tyen', 'PagesController@teach')->name('teach');
Route::get('/admin', 'PagesController@dashboard');
Route::get('/course-preview', 'PagesController@course_preview')->name('course-preview');

//For Logged in Users

Route::get('/my-courses', 'UsersController@mycourses')->name('my-courses');
Route::get('/purchase-history', 'UsersController@mypurchases')->name('purchase-history');
Route::get('/data-tables', 'UsersController@tutortable')->name('tutor-table');
Route::get('/user-profile', 'UsersController@profile')->name('profile');


//For Looged in Tutors
Route::get('/tutor-profile', 'UsersController@tutor_profile')->name('tutor-profile');
Route::get('/tutor-courses', 'UsersController@tutor_courses')->name('tutor-courses');
Route::get('/create-course', 'UsersController@create_course')->name('create-course');
Route::get('/messages', 'UsersController@messages')->name('messages');
Route::get('/tutor-review', 'UsersController@tutor_review')->name('tutor-review');
Route::get('/tutor-dashboard', 'UsersController@tutor_dashboard')->name('tutor-dashboard');
