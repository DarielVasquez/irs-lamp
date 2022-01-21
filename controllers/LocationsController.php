<?php
require_once 'models/location.php';
require_once 'models/log.php';

class locationsController {

    public function tables(){
		//Utils::isAdmin();
		require_once 'config/parameters.php';
		$location = new Location();
		$locations = $location->getAll();
		require_once 'views/locations/tables.php';
	}

	public function create(){
		//Utils::isAdmin();
	    //if(isset($_POST)){
			$name = isset($_POST['locationName']) ? $_POST['locationName'] : false;
			$createid = isset($_SESSION['id']) ? $_SESSION['id'] : false;
			$modifyid = isset($_SESSION['id']) ? $_SESSION['id'] : false;
			
			if($name && $createid && $modifyid){
				$location = new Location();
				$location->setName($name);
				$location->setCreateID($createid);
				$location->setModifyID($modifyid);	

				$module = "Locations";
				$change = $name;
				$action = "Create";
				$log = new Log();	
				
				$save = $location->create();
				//echo "Resultado save".$save;
				if($save){
					$_SESSION['location'] = "created";
					$log->insert($module, $change, $action);
				}else{
					$_SESSION['location'] = "failed";
				}
			}else{
				$_SESSION['location'] = "failed";
			}
		//}else{
			//$_SESSION['location'] = "failed";
		//}
		echo ("<script>location.href = '".base_url."locations-tables';</script>");
	}

	public function modify(){

		if(isset($_POST)){
			$id = isset($_POST['id']) ? $_POST['id'] : false;
			$name = isset($_POST['locationName']) ? $_POST['locationName'] : false;
			$modifyid = isset($_SESSION['id']) ? $_SESSION['id'] : false;
			$current = isset($_POST['log']) ? $_POST['log'] : false;

			if($id && $name  && $modifyid && $current){
				$location = new Location();
				$location->setID($id);
				$location->setName($name);
				$location->setModifyID($modifyid);

				$module = "Locations";
				$change = $current. " | ".$name;
				$action = "Modify";
				$log = new Log();

				$save = $location->modify();
			
				if($save){
					$_SESSION['location'] = "modified";
					$log->insert($module, $change, $action);
				}else{
					$_SESSION['location'] = "failed";
				}
			}else{
				$_SESSION['location'] = "failed";
			}
		}else{
			$_SESSION['location'] = "failed";
		}
		
		echo ("<script>location.href = '".base_url."locations-tables';</script>");
	}

	public function delete(){

		if(isset($_POST)){
			$id = isset($_POST['id']) ? $_POST['id'] : false;
			$current = isset($_POST['log']) ? $_POST['log'] : false;

			if($id) {
				$location = new Location();
				$location->setID($id);

				$module = "Locations";
				$change = $current;
				$action = "Delete";
				$log = new Log();

				$save = $location->delete();
				
				if($save){
					$_SESSION['location'] = "deleted";
					$log->insert($module, $change, $action);
				}else{
					$_SESSION['location'] = "foreign";
				}
			}else{
				$_SESSION['location'] = "failed";
			}
		}else{
			$_SESSION['location'] = "failed";
		}
		echo ("<script>location.href = '".base_url."locations-tables';</script>");
	}

}