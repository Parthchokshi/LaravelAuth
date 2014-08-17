<?php 

	class ProfileController extends BaseController{

		public function user($username){
			
			$user = User::where('username','=',$username);

			if($user->count()) 
			{
				$user = $user->first();
				return View::make('Profile.user')
						->with('user',$user);

			}

			return View::make('Profile.404');


		}













	}










 ?>