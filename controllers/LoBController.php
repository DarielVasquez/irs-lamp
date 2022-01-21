<?php
require_once 'models/lob.php';
require_once 'models/log.php';

class lobController {

    public function tables(){
		//Utils::isAdmin();
		require_once 'config/parameters.php';
		$lob = new LoB();
		$lobs = $lob->getAll();
		require_once 'views/lob/tables.php';
	}
	
	public function create(){
		//Utils::isAdmin();
	    if(isset($_POST)){
			$type = isset($_POST['lobType']) ? $_POST['lobType'] : false;
			$description = isset($_POST['description']) ? $_POST['description'] : false;
			$createid = isset($_SESSION['id']) ? $_SESSION['id'] : false;
			$modifyid = isset($_SESSION['id']) ? $_SESSION['id'] : false;
			
			if($type && $description && $createid && $modifyid){
				$lob = new LoB();
				$lob->setType($type);
				$lob->setDescription($description);
				$lob->setCreateID($createid);
				$lob->setModifyID($modifyid);	
				
				$module = "LoB";
				$change = $type."-".$description;
				$action = "Create";
				$log = new Log();			
				
				$save = $lob->create();
				//echo "Resultado save".$save;
				if($save){
					$_SESSION['lob'] = "created";
					$log->insert($module, $change, $action);
				}else{
					$_SESSION['lob'] = "failed";
				}
			}else{
				$_SESSION['lob'] = "failed";
			}
		}else{
			//$_SESSION['lob'] = "failed";
		}
		echo ("<script>location.href = '".base_url."lob-tables';</script>");
	}

	public function modify(){

		if(isset($_POST)){
			$id = isset($_POST['id']) ? $_POST['id'] : false;
			$type = isset($_POST['lobType']) ? $_POST['lobType'] : false;
			$description = isset($_POST['description']) ? $_POST['description'] : false;
			$modifyid = isset($_SESSION['id']) ? $_SESSION['id'] : false;
			$current = isset($_POST['log']) ? $_POST['log'] : false;

			if($id && $type && $description && $modifyid && $current){
				$lob = new LoB();
				$lob->setID($id);
				$lob->setType($type);
				$lob->setDescription($description);
				$lob->setModifyID($modifyid);

				$module = "LoB";
				$change = $current. " | ".$type."-".$description;
				$action = "Modify";
				$log = new Log();	

				$save = $lob->modify();
			
				if($save){
					$_SESSION['lob'] = "modified";
					$log->insert($module, $change, $action);
				}else{
					$_SESSION['lob'] = "failed";
				}

			}else{
				$_SESSION['lob'] = "failed";
			}
		}else{
			$_SESSION['lob'] = "failed";
		}
		
		echo ("<script>location.href = '".base_url."lob-tables';</script>");
	}

	public function delete(){

		if(isset($_POST)){
			$id = isset($_POST['id']) ? $_POST['id'] : false;
			$current = isset($_POST['log']) ? $_POST['log'] : false;

			if($id && $current) {
				$lob = new LoB();
				$lob->setID($id);

				$module = "LoB";
				$change = $current;
				$action = "Delete";
				$log = new Log();

				$save = $lob->delete();
				
				if($save){
					$_SESSION['lob'] = "deleted";
					$log->insert($module, $change, $action);
				}else{
					$_SESSION['lob'] = "foreign";
				}
			}else{
				$_SESSION['lob'] = "failed";
			}
		}else{
			$_SESSION['lob'] = "failed";
		}

		echo ("<script>location.href = '".base_url."lob-tables';</script>");
	}


}