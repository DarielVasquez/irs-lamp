<?php
require_once 'models/entry_type.php';
require_once 'models/log.php';

class entry_typesController {

    public function tables(){
		//Utils::isAdmin();
		require_once 'config/parameters.php';
		$entry_type = new Entry_type();
		$entry_types = $entry_type->getAll();
		require_once 'views/entry_types/tables.php';
	}

	public function create(){
		//Utils::isAdmin();
	    //if(isset($_POST)){
			$name = isset($_POST['entryTypeName']) ? $_POST['entryTypeName'] : false;
			$createid = isset($_SESSION['id']) ? $_SESSION['id'] : false;
			$modifyid = isset($_SESSION['id']) ? $_SESSION['id'] : false;
			
			if($name && $createid && $modifyid){
				$entry_type = new Entry_type();
				$entry_type->setName($name);
				$entry_type->setCreateID($createid);
				$entry_type->setModifyID($modifyid);
				
				$module = "Entry Types";
				$change = $name;
				$action = "Create";
				$log = new Log();
				
				$save = $entry_type->create();
				//echo "Resultado save".$save;
				if($save){
					$_SESSION['entry_type'] = "created";
					$log->insert($module, $change, $action);
				}else{
					$_SESSION['entry_type'] = "failed";
				}
			}else{
				$_SESSION['entry_type'] = "failed";
			}
		//}else{
			//$_SESSION['entry_type'] = "failed";
		//}
		echo ("<script>location.href = '".base_url."entry_types-tables';</script>");
	}

	public function modify(){

		if(isset($_POST)){
			$id = isset($_POST['id']) ? $_POST['id'] : false;
			$name = isset($_POST['entryTypeName']) ? $_POST['entryTypeName'] : false;
			$modifyid = isset($_SESSION['id']) ? $_SESSION['id'] : false;
			$current = isset($_POST['log']) ? $_POST['log'] : false;

			if($id && $name && $modifyid && $current){
				$entry_type = new Entry_type();
				$entry_type->setID($id);
				$entry_type->setName($name);
				$entry_type->setModifyID($modifyid);

				$module = "Entry Types";
				$change = $current. " | ".$name;
				$action = "Modify";
				$log = new Log();	

				$save = $entry_type->modify();
			
				if($save){
					$_SESSION['entry_type'] = "modified";
					$log->insert($module, $change, $action);
				}else{
					$_SESSION['entry_type'] = "failed";
				}
			}else{
				$_SESSION['entry_type'] = "failed";
			}
		}else{
			$_SESSION['entry_type'] = "failed";
		}
		
		echo ("<script>location.href = '".base_url."entry_types-tables';</script>");
	}

	public function delete(){

		if(isset($_POST)){
			$id = isset($_POST['id']) ? $_POST['id'] : false;
			$current = isset($_POST['log']) ? $_POST['log'] : false;

			if($id && $current) {
				$entry_type = new Entry_type();
				$entry_type->setID($id);

				$module = "Entry Types";
				$change = $current;
				$action = "Delete";
				$log = new Log();

				$save = $entry_type->delete();
				
				if($save){
					$_SESSION['entry_type'] = "deleted";
					$log->insert($module, $change, $action);
				}else{
					$_SESSION['entry_type'] = "foreign";
				}
			}else{
				$_SESSION['entry_type'] = "failed";
			}
		}else{
			$_SESSION['entry_type'] = "failed";
		}
		echo ("<script>location.href = '".base_url."entry_types-tables';</script>");
	}

}