<?php
require_once 'models/issue.php';
require_once 'models/log.php';

class issuesController {

    public function tables(){
		//Utils::isAdmin();
		require_once 'config/parameters.php';
		$issue = new Issue();
		$issues = $issue->getAll();
		require_once 'views/issues/tables.php';
	}
	
	public function create(){
		//Utils::isAdmin();
	    if(isset($_POST)){
			$name = isset($_POST['issueName']) ? $_POST['issueName'] : false;
			$typeissue = isset($_POST['issue_type']) ? $_POST['issue_type'] : false;
			$target = isset($_POST['target']) ? $_POST['target'] : false;
			$createid = isset($_SESSION['id']) ? $_SESSION['id'] : false;
			$modifyid = isset($_SESSION['id']) ? $_SESSION['id'] : false;

			if($name && $typeissue && $target && $createid && $modifyid){
				$issue = new Issue();
				$issue->setName($name);
				$issue->setTypeIssue($typeissue);
				$issue->setTarget($target);
				$issue->setCreateID($createid);
				$issue->setModifyID($modifyid);	
				
				$module = "Issues";
				$change = $name."-".$typeissue."-".$target;
				$action = "Create";
				$log = new Log();				
				
				$save = $issue->create();
				//echo "Resultado save".$save;
				if($save){
					$_SESSION['issue'] = "created";
					$log->insert($module, $change, $action);
				}else{
					$_SESSION['issue'] = "failed";
				}
			}else{
				$_SESSION['issue'] = "failed";
			}
		}else{
			$_SESSION['issue'] = "failed";
		}
		echo ("<script>location.href = '".base_url."issues-tables';</script>");
	}

	public function modify(){

		if(isset($_POST)){
			$id = isset($_POST['id']) ? $_POST['id'] : false;
			$name = isset($_POST['issueName']) ? $_POST['issueName'] : false;
			$typeissue = isset($_POST['issue_type']) ? $_POST['issue_type'] : false;
			$target = isset($_POST['target']) ? $_POST['target'] : false;
			$modifyid = isset($_SESSION['id']) ? $_SESSION['id'] : false;
			$current = isset($_POST['log']) ? $_POST['log'] : false;

			if($id && $name && $target && $typeissue && $modifyid && $current){
				$issue = new Issue();
				$issue->setID($id);
				$issue->setName($name);
				$issue->setTypeIssue($typeissue);
				$issue->setTarget($target);
				$issue->setModifyID($modifyid);	

				$module = "Issues";
				$change = $current. " | ".$name."-".$typeissue."-".$target;
				$action = "Modify";
				$log = new Log();	

				$save = $issue->modify();
			
				if($save){
					$_SESSION['issue'] = "modified";
					$log->insert($module, $change, $action);
				}else{
					$_SESSION['issue'] = "failed";
				}

			}else{
				$_SESSION['issue'] = "failed";
			}
		}else{
			$_SESSION['issue'] = "failed";
		}
		
		echo ("<script>location.href = '".base_url."issues-tables';</script>");
	}

	public function delete(){

		if(isset($_POST)){
			$id = isset($_POST['id']) ? $_POST['id'] : false;
			$current = isset($_POST['log']) ? $_POST['log'] : false;

			if($id) {
				$issue = new Issue();
				$issue->setID($id);

				$module = "Issues";
				$change = $current;
				$action = "Delete";
				$log = new Log();

				$save = $issue->delete();
				
				if($save){
					$_SESSION['issue'] = "deleted";
					$log->insert($module, $change, $action);
				}else{
					$_SESSION['issue'] = "foreign";
				}
			}else{
				$_SESSION['issue'] = "failed";
			}
		}else{
			$_SESSION['issue'] = "failed";
        }
        
		echo ("<script>location.href = '".base_url."issues-tables';</script>");
	}

}