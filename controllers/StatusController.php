<?php
require_once 'models/status.php';
require_once 'models/log.php';

class statusController {

    public function tables(){
		//Utils::isAdmin();
		require_once 'config/parameters.php';
		$stat = new Status();
		$status = $stat->getAll();
		require_once 'views/status/tables.php';
	}

	public function create(){
		//Utils::isAdmin();
	    if(isset($_POST)){
			$name = isset($_POST['statusName']) ? $_POST['statusName'] : false;
			$description = isset($_POST['description']) ? $_POST['description'] : false;
			$createid = isset($_SESSION['id']) ? $_SESSION['id'] : false;
			$modifyid = isset($_SESSION['id']) ? $_SESSION['id'] : false;
			
			if($name && $description && $createid && $modifyid){
				$status = new Status();
				$status->setName($name);
				$status->setDescription($description);
				$status->setCreateID($createid);
				$status->setModifyID($modifyid);
				
				$module = "Status";
				$change = $name."-".$description;
				$action = "Create";
				$log = new Log();
				
				$save = $status->create();
				//echo "Resultado save".$save;
				if($save){
					$_SESSION['status'] = "created";
					$log->insert($module, $change, $action);
				}else{
					$_SESSION['status'] = "failed";
				}
			}else{
				$_SESSION['status'] = "failed";
			}
		}else{
			$_SESSION['status'] = "failed";
		}
		echo ("<script>location.href = '".base_url."status-tables';</script>");
	}

	public function modify(){

		//if(isset($_POST)){
			$id = isset($_POST['id']) ? $_POST['id'] : false;
			$name = isset($_POST['statusName']) ? $_POST['statusName'] : false;
			$description = isset($_POST['description']) ? $_POST['description'] : false;
			$modifyid = isset($_SESSION['id']) ? $_SESSION['id'] : false;
			$current = isset($_POST['log']) ? $_POST['log'] : false;

			if($id && $name && $description && $modifyid && $current){
				$status = new Status();
				$status->setID($id);
				$status->setName($name);
				$status->setDescription($description);
				$status->setModifyID($modifyid);

				$module = "Status";
				$change = $current. " | ".$name."-".$description;
				$action = "Modify";
				$log = new Log();	

				$save = $status->modify();
			
				if($save){
					$_SESSION['status'] = "modified";
					$log->insert($module, $change, $action);
				}else{
					$_SESSION['status'] = "failed";
				}

			}else{
				$_SESSION['status'] = "failed";
			}
		//}else{
			//$_SESSION['status'] = "failed";
		//}
		
		echo ("<script>location.href = '".base_url."status-tables';</script>");
	}

	public function delete(){

		if(isset($_POST)){
			$id = isset($_POST['id']) ? $_POST['id'] : false;
			$current = isset($_POST['log']) ? $_POST['log'] : false;

			if($id) {
				$status = new Status();
				$status->setID($id);

				$module = "Status";
				$change = $current;
				$action = "Delete";
				$log = new Log();

				$save = $status->delete();
				
				if($save){
					$_SESSION['status'] = "deleted";
					$log->insert($module, $change, $action);
				}else{
					$_SESSION['status'] = "foreign";
				}
			}else{
				$_SESSION['status'] = "failed";
			}
		}else{
			$_SESSION['status'] = "failed";
		}
		echo ("<script>location.href = '".base_url."status-tables';</script>");
	}

}