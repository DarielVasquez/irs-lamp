<?php
require_once 'models/user.php';
require_once 'models/log.php';

class usersController {

    public function tables(){
		//Utils::isAdmin();
		require_once 'config/parameters.php';
		$user = new User();
		$users = $user->getAll();
		require_once 'views/users/tables.php';
	}

	public function create(){
		//Utils::isAdmin();
	    //if(isset($_POST)){
			$name = isset($_POST['fullName']) ? $_POST['fullName'] : false;
			$username = isset($_POST['userName']) ? $_POST['userName'] : false;
			$pass = isset($_POST['userPass']) ? $_POST['userPass'] : false;
			$createid = isset($_SESSION['id']) ? $_SESSION['id'] : false;
			$modifyid = isset($_SESSION['id']) ? $_SESSION['id'] : false;
			
			if($name && $username && $pass && $createid && $modifyid){
				$user = new User();
				$user->setName($name);
				$user->setUser($username);
				$user->setPass($pass);
				$user->setCreateID($createid);
				$user->setModifyID($modifyid);
				
				$module = "Users";
				$change = $name."-".$username;
				$action = "Create";
				$log = new Log();	
				
				$save = $user->create();
				//echo "Resultado save".$save;
				if($save){
					$_SESSION['userError'] = "created";
					$log->insert($module, $change, $action);
				}else{
					$_SESSION['userError'] = "failed";
				}
			}else{
				$_SESSION['userError'] = "failed";
			}
		//}else{
			//$_SESSION['userError'] = "failed";
		//}
		echo ("<script>location.href = '".base_url."users-tables';</script>");
	}

	public function modify(){

		if(isset($_POST)){
			$id = isset($_POST['id']) ? $_POST['id'] : false;
			$name = isset($_POST['fullName']) ? $_POST['fullName'] : false;
			$username = isset($_POST['userName']) ? $_POST['userName'] : false;
			$pass = isset($_POST['userPass']) ? $_POST['userPass'] : false;
			$modifyid = isset($_SESSION['id']) ? $_SESSION['id'] : false;
			$current = isset($_POST['log']) ? $_POST['log'] : false;

			if($id && $name && $username && $pass && $modifyid && $current){
				$user = new User();
				$user->setID($id);
				$user->setName($name);
				$user->setUser($username);
				$user->setPass($pass);
				$user->setModifyID($modifyid);	
				
				$module = "Users";
				$change = $current. " | ".$name."-".$username;
				$action = "Modify";
				$log = new Log();				

				$save = $user->modify();
			
				if($save){
					$_SESSION['userError'] = "modified";
					$log->insert($module, $change, $action);
				}else{
					$_SESSION['userError'] = "failed";
				}

			}else{
				$_SESSION['userError'] = "failed";
			}
		}else{
			$_SESSION['userError'] = "failed";
		}
		
		echo ("<script>location.href = '".base_url."users-tables';</script>");
	}

	public function delete(){

		if(isset($_POST)){
			$id = isset($_POST['id']) ? $_POST['id'] : false;
			$current = isset($_POST['log']) ? $_POST['log'] : false;

			if($id && $current) {
				$user = new User();
				$user->setID($id);
				
				$module = "Users";
				$change = $current;
				$action = "Delete";
				$log = new Log();

				$save = $user->delete();
				
				if($save){
					$_SESSION['userError'] = "deleted";
					$log->insert($module, $change, $action);
				}else{
					$_SESSION['userError'] = "foreign";
				}
			}else{
				$_SESSION['userError'] = "failed";
			}
		}else{
			$_SESSION['userError'] = "failed";
		}
		echo ("<script>location.href = '".base_url."users-tables';</script>");
	}


}