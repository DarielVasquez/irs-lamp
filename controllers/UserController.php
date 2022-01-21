<?php
require_once 'models/user.php';

class userController {

    public function login(){
		require_once 'views/user/login.php';
    }

    public function register(){
		require_once 'views/user/register.php';
    }

    public function forgot_password(){
		require_once 'views/user/forgot_password.php';
    }
    

}