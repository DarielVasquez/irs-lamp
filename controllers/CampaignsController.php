<?php
require_once 'models/campaign.php';
require_once 'models/log.php';

class campaignsController {

    public function tables(){
		//Utils::isAdmin();
		require_once 'config/parameters.php';
		$campaign = new Campaign();
		$campaigns = $campaign->getAll();
		require_once 'views/campaigns/tables.php';
	}
	
	public function create(){
		//Utils::isAdmin();
	    if(isset($_POST)){
			$name = isset($_POST['campaignName']) ? $_POST['campaignName'] : false;
			$locationid = isset($_POST['location']) ? $_POST['location'] : false;
			$lobid = isset($_POST['lob']) ? $_POST['lob'] : false;
			$comment = isset($_POST['comment']) ? $_POST['comment'] : false;
			$createid = isset($_SESSION['id']) ? $_SESSION['id'] : false;
			$modifyid = isset($_SESSION['id']) ? $_SESSION['id'] : false;

			if($name && $locationid && $lobid && $comment && $createid && $modifyid){
				$campaign = new Campaign();
				$campaign->setName($name);
				$campaign->setLocation_id($locationid);
				$campaign->setLob_id($lobid);
				$campaign->setComment($comment);
				$campaign->setCreateID($createid);
				$campaign->setModifyID($modifyid);		

				$module = "Campaigns";
				$change = $name."-".$locationid."-".$lobid."-".$comment;
				$action = "Create";
				$log = new Log();			

				$save = $campaign->create();
				//echo "Resultado save".$save;
				if($save){
					$_SESSION['campaign'] = "created";
					$log->insert($module, $change, $action);
				}else{
					$_SESSION['campaign'] = "failed";
				}
			}else{
				$_SESSION['campaign'] = "failed";
			}
		}else{
			$_SESSION['campaign'] = "failed";
		}
		echo ("<script>location.href = '".base_url."campaigns-tables';</script>");
	}

	public function modify(){

		if(isset($_POST)){
			$id = isset($_POST['id']) ? $_POST['id'] : false;
			$name = isset($_POST['campaignName']) ? $_POST['campaignName'] : false;
			$locationid = isset($_POST['location']) ? $_POST['location'] : false;
			$lobid = isset($_POST['lob']) ? $_POST['lob'] : false;
			$comment = isset($_POST['comment']) ? $_POST['comment'] : false;
			$modifyid = isset($_SESSION['id']) ? $_SESSION['id'] : false;
			$current = isset($_POST['log']) ? $_POST['log'] : false;

			if($id && $name && $locationid && $lobid && $comment && $modifyid && $current){
				$campaign = new Campaign();
				$campaign->setID($id);
				$campaign->setName($name);
				$campaign->setLocation_id($locationid);
				$campaign->setLob_id($lobid);
				$campaign->setComment($comment);
				$campaign->setModifyID($modifyid);

				$module = "Campaigns";
				$change = $current. " | ".$name."-".$locationid."-".$lobid."-".$comment;
				$action = "Modify";
				$log = new Log();				

				$save = $campaign->modify();
			
				if($save){
					$_SESSION['campaign'] = "modified";
					$log->insert($module, $change, $action);
				}else{
					$_SESSION['campaign'] = "failed";
				}

			}else{
				$_SESSION['campaign'] = "failed";
			}
		}else{
			$_SESSION['campaign'] = "failed";
		}
		
		echo ("<script>location.href = '".base_url."campaigns-tables';</script>");
	}

	public function delete(){

		if(isset($_POST)){
			$id = isset($_POST['id']) ? $_POST['id'] : false;
			$current = isset($_POST['log']) ? $_POST['log'] : false;

			if($id && $current) {
				$campaign = new Campaign();
				$campaign->setID($id);

				$module = "Campaigns";
				$change = $current;
				$action = "Delete";
				$log = new Log();
				
				$save = $campaign->delete();
				
				if($save){
					$_SESSION['campaign'] = "deleted";
					$log->insert($module, $change, $action);
				}else{
					$_SESSION['campaign'] = "foreign";
				}
			}else{
				$_SESSION['campaign'] = "failed";
			}
		}else{
			$_SESSION['campaign'] = "failed";
		}
		echo ("<script>location.href = '".base_url."campaigns-tables';</script>");
	}

}