<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/*
|	Home Page
*/
Route::get('/', [
	'as'   => 'home', 
	'uses' => 'HomeController@getIndex'
]);

/*
|	Authenticated group
*/
Route::group(['before'=>'auth'], function(){

	/*
	|	Logout (GET)
	*/
	Route::get('/account/logout', [
		'as' => 'account-logout',
		'uses' => 'AccountController@getLogout'
	]);
});


/*
|	Unauthenticated group
*/
Route::group(['before'=>'guest'], function(){

	/*
	|	CSRF protection group
	*/
	Route::group(['before'=>'csrf'], function(){

		/*
		|	Create account (POST)
		*/
		Route::post('/account/register', [
			'as'   => 'account-register-post',
			'uses' => 'AccountController@postRegister'
		]);

		/*
		|	Login (POST)
		*/
		Route::post('/account/login', [
			'as' => 'account-login-post',
			'uses' => 'AccountController@postLogin'
		]);
	});

	/*
	|	Login (GET)
	*/
	Route::get('/account/login', [
		'as' => 'account-login',
		'uses' => 'AccountController@getLogin'
	]);

	/*
	|	Create account (GET)
	*/
	Route::get('/account/register', [
		'as'   => 'account-register',
		'uses' => 'AccountController@getRegister'
	]);

	Route::get('/account/verify/{code}', [
		'as'   => 'account-verify',
		'uses' => 'AccountController@getVerify'
	]);
});