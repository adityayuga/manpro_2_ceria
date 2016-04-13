<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/





/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/
Route::group(['middleware' => 'web'], function () {
	Route::get('/', 'ArtikelController@get_artikel_umum');

	Route::get('/about', function () {
	    return view('page.about');
	});

	Route::get('/services', function () {
	    return view('page.services');
	});

	Route::get('/activities','ArtikelController@get_artikel_activities');

	Route::get('/selfhelp','ArtikelController@get_artikel_selfhelp');
	Route::get('/post', function() {
		return view('page.post');
	});
	Route::get('/create', function() {
		return view('page.create');
	});
	Route::get('/kelola', function() {
		return view('page.kelola');
	});
	Route::get('editArtikel-{id}', function() {
		return view('page.edit');
	});
    //Route::auth();
	//-------------------------------------AUTH------------------------------------//
	Route::get('login', ['as' => 'auth.login', 'uses' => 'Auth\AuthController@showLoginForm']);
	Route::post('login', ['as' => 'auth.login', 'uses' => 'Auth\AuthController@login']);
	Route::get('logout', ['as' => 'auth.logout', 'uses' => 'Auth\AuthController@logout']);

	// Registration Routes...
	//Route::get('register', ['as' => 'auth.register', 'uses' => 'Auth\AuthController@showRegistrationForm']);
	//Route::post('register', ['as' => 'auth.register', 'uses' => 'Auth\AuthController@register']);

	// Password Reset Routes...
	Route::get('password/reset/{token?}', ['as' => 'auth.password.reset', 'uses' => 'Auth\PasswordController@showResetForm']);
	Route::post('password/email', ['as' => 'auth.password.email', 'uses' => 'Auth\PasswordController@sendResetLinkEmail']);
	Route::post('password/reset', ['as' => 'auth.password.reset', 'uses' => 'Auth\PasswordController@reset']);

    Route::get('/home', 'HomeController@index');

	//-------Artikel-------//
	Route::post('/post_artikel', 'ArtikelController@create_post');
	Route::post('/update_artikel', 'ArtikelController@update_post');
	Route::post('/kelola_artikel', 'ArtikelController@kelola_post');
	Route::post('/delete_artikel', 'ArtikelController@delete_post');
	Route::get('/edit_artikel', 'ArtikelController@edit_post');

});
