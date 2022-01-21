<?php
require_once 'models/issue_type.php';
require_once 'models/log.php';

class issue_typesController {

    public function tables(){
		//Utils::isAdmin();
		require_once 'config/parameters.php';
		$issue_type = new Issue_type();
		$issue_types = $issue_type->getAll();
		require_once 'views/issue_types/tables.php';
	}

	public function create(){
		//Utils::isAdmin();
	    //if(isset($_POST)){
			$name = isset($_POST['issueTypeName']) ? $_POST['issueTypeName'] : false;
			$createid = isset($_SESSION['id']) ? $_SESSION['id'] : false;
			$modifyid = isset($_SESSION['id']) ? $_SESSION['id'] : false;
			
			if($name && $createid && $modifyid){
				$issue_type = new Issue_type();
				$issue_type->setName($name);
				$issue_type->setCreateID($createid);
				$issue_type->setModifyID($modifyid);	
				
				$module = "Issue Types";
				$change = $name;
				$action = "Create";
				$log = new Log();	

				$save = $issue_type->create();
				//echo "Resultado save".$save;
				if($save){
					$_SESSION['issue_type'] = "created";
					$log->insert($module, $change, $action);
				}else{
					$_SESSION['issue_type'] = "failed";
				}
			}else{
				$_SESSION['issue_type'] = "failed";
			}
		//}else{
			//$_SESSION['issue_type'] = "failed";
		//}
		echo ("<script>location.href = '".base_url."issue_types-tables';</script>");
	}

	public function modify(){

		if(isset($_POST)){
			$id = isset($_POST['id']) ? $_POST['id'] : false;
			$name = isset($_POST['issueTypeName']) ? $_POST['issueTypeName'] : false;
			$modifyid = isset($_SESSION['id']) ? $_SESSION['id'] : false;
			$current = isset($_POST['log']) ? $_POST['log'] : false;

			if($id && $name && $modifyid && $current){
				$issue_type = new Issue_type();
				$issue_type->setID($id);
				$issue_type->setName($name);
				$issue_type->setModifyID($modifyid);

				$module = "Issue Types";
				$change = $current. " | ".$name;
				$action = "Modify";
				$log = new Log();

				$save = $issue_type->modify();
			
				if($save){
					$_SESSION['issue_type'] = "modified";
					$log->insert($module, $change, $action);
				}else{
					$_SESSION['issue_type'] = "failed";
				}
			}else{
				$_SESSION['issue_type'] = "failed";
			}
		}else{
			$_SESSION['issue_type'] = "failed";
		}
		
		echo ("<script>location.href = '".base_url."issue_types-tables';</script>");
	}

	public function delete(){

		if(isset($_POST)){
			$id = isset($_POST['id']) ? $_POST['id'] : false;
			$current = isset($_POST['log']) ? $_POST['log'] : false;

			if($id) {
				$issue_type = new Issue_type();
				$issue_type->setID($id);

				$module = "Issue Types";
				$change = $current;
				$action = "Delete";
				$log = new Log();

				$save = $issue_type->delete();
				
				if($save){
					$_SESSION['issue_type'] = "deleted";
					$log->insert($module, $change, $action);
				}else{
					$_SESSION['issue_type'] = "foreign";
				}
			}else{
				$_SESSION['issue_type'] = "failed";
			}
		}else{
			$_SESSION['issue_type'] = "failed";
		}
		echo ("<script>location.href = '".base_url."issue_types-tables';</script>");
	}

}