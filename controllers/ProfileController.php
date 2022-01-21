<?php
require_once 'models/profile.php';
require_once 'models/log.php';

class profileController {

    public function user(){
		//Utils::isAdmin();
		require_once 'config/parameters.php';
		//$lob = new LoB();
		//$lobs = $lob->getAll();
		require_once 'views/profile/user.php';
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
				$profile = new Profile();
				$profile->setID($id);
				$profile->setName($name);
				$profile->setUser($username);
				$profile->setPass($pass);
				$profile->setModifyID($modifyid);	
				
				$module = "Profile";
				$change = $current. " | ".$name."-".$username;
				$action = "Modify";
				$log = new Log();				

				$save = $profile->modify();
			
				if($save){
					$_SESSION['profile'] = "modified";
					$log->insert($module, $change, $action);
					$_SESSION['fullname'] = $name;
					$_SESSION['username'] = $username;
					$_SESSION['pass'] = $pass;
				}else{
					$_SESSION['profile'] = "failed";
				}

			}else{
				$_SESSION['profile'] = "failed";
			}
		}else{
			$_SESSION['profile'] = "failed";
		}
		
		echo ("<script>location.href = '".base_url."profile-user';</script>");
	}


}