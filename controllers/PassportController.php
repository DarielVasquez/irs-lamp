<?php
require_once 'models/passport.php';

class passportController {

    public function login(){
      require_once 'views/passport/login.php';
    }

    public function signin(){
      //if(isset($_POST)){
        $user = isset($_POST['user']) ? $_POST['user'] : false;
        $pass = isset($_POST['pass']) ? $_POST['pass'] : false;

        /*if($user && $pass){*/
          $passport = new Passport();
          $passport->setUser($user);
          $passport->setPass($pass);
        
          $result = $passport->login($user, $pass);

          if($result == 1){
            echo ("<script>location.href = '".base_url."dashboard-index';</script>");
            //require_once 'views/dashboard/dashboard.php';
          }else{
            //$_SESSION['login'] = 'error';
            echo ("<script>location.href = '".base_url."passport-login';</script>");
            //require_once 'views/passport/login.php';
          }
        /*}  
          if ($result && is_object($result)) {
            echo ("<script>location.href = '".base_url."dashboard-index';</script>");
          } else {
            $_SESSION['login'] = 'error';
          }
        } else {
          $_SESSION['login'] = 'empty';
        }
      } else {
        $_SESSION['login'] = 'empty';
      } 
      echo ("<script>location.href = '".base_url."passport-login';</script>");*/
    }

    /*public function signin(){
      require_once 'Models/passport.php';
      $passport = new Passport();
      $result = $passport->login($_POST['user'],$_POST['pass']);
      if($result == 1){
        require_once 'Views/Login/accessgranted.php';
      }elseif($result == 0){
        require_once 'Views/Login/loginform.php';
      }
    }*/


    public function register(){
		  require_once 'views/passport/register.php';
    }

    public function createAccount(){
      if(isset($_POST)){
        $name = isset($_POST['fullName']) ? $_POST['fullName'] : false;
			  $user = isset($_POST['user']) ? $_POST['user'] : false;
			  $pass = isset($_POST['pass']) ? $_POST['pass'] : false;

        if($name && $user && $pass){
          $passport = new Passport();
          $passport->setName($name);
          $passport->setUser($user);
          $passport->setPass($pass);
        
          $save = $passport->register();
        
          if($save){
            $_SESSION['register'] = "created";
            echo ("<script>location.href = '".base_url."passport-login';</script>");
          }else{
            $_SESSION['register'] = "failed";
            echo ("<script>location.href = '".base_url."passport-register';</script>");
          }
        }else{
          $_SESSION['register'] = "failed";
          echo ("<script>location.href = '".base_url."passport-register';</script>");
        }
      }
    }

    public function forgot_password(){
		  require_once 'views/passport/forgot_password.php';
    }

    public function clogout()
    {
      $passport = new Passport();
      $passport->logout();
      echo ("<script>location.href = '".base_url."passport-login';</script>");
    }
    




}