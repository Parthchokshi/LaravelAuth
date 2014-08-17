<?php

class HomeController extends BaseController {

	public function Home(){

		// Mail::send('emails.auth.test',array('name'=>'Parth Chokshi'),function($message){

		// 	$message->to('Parthchokshi1@gmail.com','Parth Chokshi')->subject('Test Email');


		// });


		return View::make('home');
	}

	

}
