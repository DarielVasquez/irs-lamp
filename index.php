<?php
//session_start();
require_once 'autoload.php';
require_once 'config/config.php';
require_once 'config/parameters.php';
require_once 'helpers/utils.php';

function show_error(){
	$error = new errorController();
	$error->index();
}


if(isset($_GET['action']) == null)
	echo ("<script>location.href = '".base_url."passport-login';</script>");

if($_GET['action'] == 'login' || $_GET['action'] == 'signin' || $_GET['action'] == 'register' || $_GET['action'] == 'createAccount' || $_GET['action'] == 'forgot_password') {
	require_once 'views/login_layout/header.php';
} else {
	require_once 'views/layout/header.php';
	require_once 'views/layout/sidebar.php';
	require_once 'views/layout/topbar.php';
}

if(isset($_GET['controller'])){
	$name_controller = $_GET['controller'].'Controller';
}elseif(!isset($_GET['controller']) && !isset($_GET['action'])){
	$name_controller = controller_default;
	
}else{
	show_error();
	exit();
}

if(class_exists($name_controller)){	
	$controller = new $name_controller();
	
	if(isset($_GET['action']) && method_exists($controller, $_GET['action'])){
		$action = $_GET['action'];
		$controller->$action();
	}elseif(!isset($_GET['controller']) && !isset($_GET['action'])){
		$action_default = action_default;
		$controller->$action_default();
	}else{
		show_error();
	}
}else{
	show_error();
}

if($_GET['action'] == 'login' || $_GET['action'] == 'signin' || $_GET['action'] == 'register' || $_GET['action'] == 'createAccount' || $_GET['action'] == 'forgot_password') {
	//require_once 'views/login_layout/footer.php';
} else {
	require_once 'views/layout/footer.php';
}
