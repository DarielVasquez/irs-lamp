<?php
require_once 'models/event.php';
require_once 'models/log.php';

class eventsController {

    public function tables(){
		//Utils::isAdmin();
		require_once 'config/parameters.php';
		$event = new Event();
		$events = $event->getAll();
		require_once 'views/events/tables.php';
    }
    
	public function add(){
		require_once 'views/events/add.php';
	}

    public function create(){
		//Utils::isAdmin();
		if(isset($_POST)){
            $subject = isset($_POST['subject']) ? $_POST['subject'] : false;
			$description = isset($_POST['description']) ? $_POST['description'] : false;
			$typeissueid = isset($_POST['issue_types']) ? $_POST['issue_types'] : false;
            $issueid = isset($_POST['issues']) ? $_POST['issues'] : false;
			$campaignid = isset($_POST['campaigns']) ? $_POST['campaigns'] : false;
            $userid = isset($_POST['users']) ? $_POST['users'] : false;
            $agentuser = isset($_POST['agentUser']) ? $_POST['agentUser'] : false;
            $phone = isset($_POST['phone']) ? $_POST['phone'] : false;
            $statusid = isset($_POST['status']) ? $_POST['status'] : false;
			$target = isset($_POST['target']) ? $_POST['target'] : false;
			$createid = isset($_SESSION['id']) ? $_SESSION['id'] : false;
			$modifyid = isset($_SESSION['id']) ? $_SESSION['id'] : false;

			if($subject && $description && $typeissueid && $campaignid && $issueid && $agentuser && $phone && $userid && $statusid && $target && $createid && $modifyid){
				$event = new Event();
                $event->setSubject($subject);	
                $event->setDescription($description);
                $event->setTypeIssue_id($typeissueid);
                $event->setIssue_id($issueid);
				$event->setCampaign_id($campaignid);
                $event->setAgentUser($agentuser);
                $event->setPhone($phone);
                $event->setUser_id($userid);	
				$event->setStatus_id($statusid);
				$event->setTarget($target);
				$event->setCreateID($createid);
				$event->setModifyID($modifyid);
				
				$module = "Events";
				$change = $subject."-".$description."-".$typeissueid."-".$issueid."-".$campaignid."-".$agentuser."-".$userid."-".$phone."-".$statusid."-".$target;
				$action = "Create";
				$log = new Log();			

				$save = $event->create();
				//echo "Resultado save".$save;
				if($save){
					$_SESSION['event'] = "created";
					$log->insert($module, $change, $action);
				}else{
					$_SESSION['event'] = "failed";
				}
			}else{
				$_SESSION['event'] = "failed";
			}
		}else{
			$_SESSION['event'] = "failed";
		}
		echo ("<script>location.href = '".base_url."events-tables';</script>");
	}

    public function modify(){

		if(isset($_POST)){
			$id = isset($_POST['id']) ? $_POST['id'] : false;
            $subject = isset($_POST['subject']) ? $_POST['subject'] : false;
			$description = isset($_POST['description']) ? $_POST['description'] : false;
			$typeissueid = isset($_POST['issue_types']) ? $_POST['issue_types'] : false;
            $issueid = isset($_POST['issues']) ? $_POST['issues'] : false;
			$campaignid = isset($_POST['campaigns']) ? $_POST['campaigns'] : false;
            $agentuser = isset($_POST['agentUser']) ? $_POST['agentUser'] : false;
            $phone = isset($_POST['phone']) ? $_POST['phone'] : false;
			$statusid = isset($_POST['status']) ? $_POST['status'] : false;
			$status = isset($_POST['statusname']) ? $_POST['statusname'] : false;
			$modifyid = isset($_SESSION['id']) ? $_SESSION['id'] : false;
			$current = isset($_POST['log']) ? $_POST['log'] : false;

			if($id && $subject && $description && $typeissueid && $campaignid && $issueid && $agentuser && $phone && $statusid && $status && $modifyid && $current){
				$event = new Event();
				$event->setID($id);
                $event->setSubject($subject);	
                $event->setDescription($description);
                $event->setTypeIssue_id($typeissueid);
                $event->setIssue_id($issueid);
				$event->setCampaign_id($campaignid);
                $event->setAgentUser($agentuser);
                $event->setPhone($phone);
				$event->setStatus_id($statusid);
				$event->setStatus_id($statusid);
				$event->setModifyID($modifyid);

				$save = $event->modify();
				//echo $event->modify();

				$module = "Events";
				$change = $current. " | ".$subject."-".$description."-".$typeissueid."-".$issueid."-".$campaignid."-".$agentuser."-".$phone."-".$statusid;
				$action = "Modify";
				$log = new Log();	
			
				if($save){
					$_SESSION['event'] = "modified";
					$log->insert($module, $change, $action);
				}else{
					$_SESSION['event'] = "failed";
				}

			}else{
				$_SESSION['event'] = "failed";
			}
		}else{
			$_SESSION['event'] = "failed";
		}
		
		echo ("<script>location.href = '".base_url."events-tables';</script>");
	}

    public function delete(){

		if(isset($_POST)){
			$id = isset($_POST['id']) ? $_POST['id'] : false;
			$current = isset($_POST['log']) ? $_POST['log'] : false;

			if($id) {
				$event = new Event();
				$event->setID($id);

				$module = "Events";
				$change = $current;
				$action = "Delete";
				$log = new Log();
				
				$save = $event->delete();
				
				if($save){
					$_SESSION['event'] = "deleted";
					$log->insert($module, $change, $action);
				}else{
					$_SESSION['event'] = "failed";
				}
			}else{
				$_SESSION['event'] = "failed";
			}
		}else{
			$_SESSION['event'] = "failed";
		}
		echo ("<script>location.href = '".base_url."events-tables';</script>");
	}

}