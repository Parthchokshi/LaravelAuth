<?php 

class AccountController extends BaseController{

	public function getSignIn(){

		return View::make('account.signin');
	}




	public function postSignin(){

		$validator = Validator::make(Input::all(),
						array(
						'email'=>'required|email',
						'password' => 'required'
						)

						);

		if($validator->fails())
		{

			return Redirect::route('account-sign-in')
					->withErrors($validator)
					->withInput();

		}
		else
		{

			$remember = (Input::has('remember')) ? true : false;

			$auth = Auth::attempt(array(

				'email' => Input::get('email'),
				'password'=> Input::get('password'),
				'active' => 1

				),$remember);

			if($auth)
			{
				//return to the intended page
				return Redirect::intended('/');
			}
			else
			{
				return Redirect::route('account-sign-in')
						->with('notify','Email/password wrong or account is not activated.')
						->withInput();
			}

		}

		return Redirect::route('account-sign-in')
				->with('notify','There was a problem signing you in.');
	}

	public function getSignOut(){

				Auth::logout();
				return Redirect::route('home');
			
			}


	public function getCreate(){

		return View::make('account.create');

	}

	public function postCreate(){

		$validator = Validator::make(input::all(),
			array(

				'email'				=>'required|max:50|email|unique:users',
				'username'			=>'required|max:20|min :3|unique:users',
				'password'			=>'required|between:6,12',
				'confirmpassword'	=>'required|between:6,12|same:password'

				)

			);

		if($validator->fails())
		{
			return Redirect::route('account-create')
					->withErrors($validator)
					->withInput();	
		}
		else{

			$email		 = Input::get('email');
			$username	 = Input::get('username');
			$password	 = Input::get('password');
			//Generate random code for activation by email.

			$code	= str_random(60);

			$token 		 = Input::get('_token');
			
			$user = User::create(array(

				'email'		=> $email,
				'username'	=>$username,
				'password'	=>Hash::make($password),
				'code'=> $code,
				'active' 	=>0,
				'remember_token'		=> $token

				));	

			if($user){

				//Sending email
				Mail::send('emails.auth.activate',array('link' => URL::route('account-activate', $code) , 'username' => $username ),function($message) use ($user) {

					$message->to($user->email, $user->username)->subject('Activate your account.');

				});


				return Redirect::route('home')
						->with('notify','Your account has been created, we have sent you an email, please activate your account.');
			}
		
		}
	}

			public function getActivate($code){

				 $user = User::where('code','=',$code)->where('active','=',0);

				 if($user->count())
				 {

				 	$user = $user->first();

				 	//update the active flag to 1 and code to empty string.
				 	
				 	$user->active = 1;
				 	$user->code = '';

				 	if($user->save())
				 	{
				 		return Redirect::route('home')
				 				->with('notify','Congrats. Your account has been activated. SignIn to continue.');
				 	}

				 }

				 return Redirect::route('home')
				 		->with('notify','Sorry, your account could not be activated, please try again later.');

			}


			public function getChangePassword(){

				return View::make('account.changepassword');


			}

			public function postChangePassword(){

				$validator = Validator::make(Input::all(),array(

					'oldpassword' 		 => 'required',
					'password'			 =>	'required|min:6',
					'passwordconfirm'    => 'required|same:password'

					));

				if($validator->fails())
				{
					return Redirect::route('account-change-password')
							->withErrors($validator);
				}
				else
				{
					$user = User::find(Auth::user()->id);

					$oldpassword = Input::get('oldpassword');
					$password = Input::get('password');

					if(Hash::check($oldpassword,$user->getAuthPassword()))
					{
						$user->password = Hash::make($password);
						
						if($user->save())
						{
							return Redirect::route('home')
									->with('notify','Your password has been changed successfully.');
						}
						else
						{
							return Redirect::route('home')
									->with('notify','Password could not be changed.');
						}
					}
					else
					{

						return Redirect::route('account-change-password')
								->with('notify','Your old password you entered is incorrect.');

					}
				}

				return Redirect::route('account-change-password')
						->with('notify','Password could not be changed. Please try again later');
			}


			public function getForgotPassword()
			{
				return View::make('account.forgotpassword');
			}

			public function postForgotpassword(){

				$validator = Validator::make(Input::all(),array(

					'email' => 'required|email'
					));

				if($validator->fails())
				{

					return Redirect::route('account-forgot-password-get')
							->withErrors($validator)
							->withInput();

				}
				else
				{

					$email = Input::get('email');

					$user = User::where('email','=',$email);

					if($user->count())
					{

					$user = $user->first();

					$code = str_random(60);

					$user->code = $code;

					if($user->save())
					{
					Mail::send('emails.auth.forgotemail',array('link'=>URL::route('account-recover-password',$code),'username' => $user->username),function($message) use ($user)
					{

						$message->to($user->email,$user->username)->subject('Recover Password email');

					});

					return Redirect::route('home')
							->with('notify','We have sent you an email for recovering your password. Kindly check it.');

					}
					}
					else
					{
						return Redirect::route('account-forgot-password-get')
								->with('notify','Such an email doesnt exist in our database!');
					}

				}
				
				return Redirect::route('account-forgot-password-get')
						->with('notify','Sorry there is some problem.');	
			}

			public function getRecoverPassword($code){

				return View::make('account.recover')->with('code',$code);
			}

			public function postRecoverPassword($code)
			{	

				$validator = Validator::make(Input::all(),array(

					'password'=>'required',
					'password_confirm'=>'required|same:password'

					));

				if($validator->fails())
				{
					return Redirect::route('account-recover-password-post',$code)
							->withErrors($validator);
				}
				else
				{
					$user = User::where('code','=',$code);
					
					if($user->count())
					{
					$user = $user->first();

					$password = Input::get('password');
					$user->password = Hash::make($password);
					$user->code = '';
					if($user->save())
					{
						return Redirect::route('home')
								->with('notify','Your password has been changed. Now you can login with your new password.');
					}
					else
					{
						return Redirect::route('home')
								->with('notify','Your password could not be changed. Please request a new password again.');
					}

					}
					return Redirect::route('home')
							->with('notify','The link is dead.');

				}
			}


}
 ?>
