<?php


Route::get('/',array('as'=>'home','uses'=>'HomeController@Home'));

// Showing user profile

Route::get('/user/{username}',array(

	'as'=>'profile-user',
	'uses'=>'ProfileController@user'

	));


// Authorised Users

Route::group(array('before'=>'auth'),function(){


	//Change password post request making actual change in the database and protection against cross site request forgery.


	Route::group(array('before'=>'csrf'),function(){

	Route::post('/account/change-password',array(
		'as'=>'account-change-password-post',
		'uses'=>'AccountController@postChangePassword'

		));

		});
	// Change password get request.

	Route::get('/account/change-password',array(

		'as'=>'account-change-password',
		'uses'=>'AccountController@getChangePassword'

		));


	
	//Sign Out from the account.
	
	Route::get('/account/sign-out',array(
		'as'=>'account-sign-out',
		'uses'=>'AccountController@getSignOut'


		));

	

});





// Unauthorised users group

	Route::group(array('before'=>'guest'),function(){

	//CSRF protection

	Route::group(array('before' => 'csrf'),function(){

		// post request to get the data in the form
		Route::post('/account/create',array(
				'as'=>'account-create-post',
				'uses'=>'AccountController@postCreate'
			));

		Route::post('/account/sign-in',array(
				'as'=>'account-sign-in-post',
				'uses'=>'AccountController@postSignIn'
			));

		Route::post('account/forgot-password',array(

			'as'	=>'account-forgot-password-post',
			'uses' 	=>'AccountController@postForgotPassword' 

			));

		//Recover password post request.

		Route::post('/account/recover-password/{code}',array(

		'as'=>'account-recover-password-post',
		'uses'=>'AccountController@postRecoverPassword'

		));


	});

	//Recover password get request.

	Route::get('/account/recover-password/{code}',array(

		'as'=>'account-recover-password',
		'uses'=>'AccountController@getRecoverPassword'

		));


	//forgot password get request

	Route::get('/account/forgot-password',array(

		'as'=>'account-forgot-password-get',
		'uses'=>'AccountController@getForgotPassword'

		));

	//Sign in get request.

	Route::get('/account/sign-in',array(
				'as'=>'account-sign-in',
				'uses'=>'AccountController@getSignIn'
			));


	// get request to get the data in the form
	Route::get('/account/create',array(
		'as'=>'account-create',
		'uses'=>'AccountController@getCreate'


	));


	Route::get('/account/activate/{code}',array(
		'as'=>'account-activate',
		'uses'=>'AccountController@getActivate'

		));
});