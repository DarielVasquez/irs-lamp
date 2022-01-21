<?php
require_once 'models/entry.php';
require_once 'models/log.php';

class entriesController {

    public function tables(){
		//Utils::isAdmin();
		require_once 'config/parameters.php';
		$entry = new Entry();
		$entries = $entry->getAll();
		require_once 'views/entries/tables.php';
    }
    
    public function create(){
		//Utils::isAdmin();
	    if(isset($_POST)){
			$description = isset($_POST['description']) ? $_POST['description'] : false;
			$entrytypeid = isset($_POST['entry_types']) ? $_POST['entry_types'] : false;
			$campaignid = isset($_POST['campaigns']) ? $_POST['campaigns'] : false;
            $startdate = isset($_POST['startDate']) ? $_POST['startDate'] : false;
            $enddate = isset($_POST['endDate']) ? $_POST['endDate'] : false;
            $userid = isset($_POST['users']) ? $_POST['users'] : false;
            $statusid = isset($_POST['status']) ? $_POST['status'] : false;
            $comment = isset($_POST['comment']) ? $_POST['comment'] : false;
			$createid = isset($_SESSION['id']) ? $_SESSION['id'] : false;
			$modifyid = isset($_SESSION['id']) ? $_SESSION['id'] : false;

			if($description && $entrytypeid && $campaignid && $startdate && $enddate && $userid && $statusid && $comment && $createid && $modifyid){
				$entry = new Entry();
                $entry->setDescription($description);
                $entry->setEntryType_id($entrytypeid);
				$entry->setCampaign_id($campaignid);
                $entry->setStartDate($startdate);
                $entry->setEndDate($enddate);
                $entry->setUser_id($userid);
                $entry->setStatus_id($statusid);
				$entry->setComment($comment);
				$entry->setCreateID($createid);
				$entry->setModifyID($modifyid);

				$module = "Entries";
				$change = $description."-".$comment."-".$entrytypeid."-".$campaignid."-".$startdate."-".$enddate."-".$userid."-".$statusid;
				$action = "Create";
				$log = new Log();
				
				$save = $entry->create();
				//echo "Resultado save".$save;
				if($save){
					$_SESSION['entry'] = "created";
					$log->insert($module, $change, $action);
				}else{
					$_SESSION['entry'] = "failed";
				}
			}else{
				$_SESSION['entry'] = "failed";
			}
		}else{
			$_SESSION['entry'] = "failed";
		}
		echo ("<script>location.href = '".base_url."entries-tables';</script>");
	}
    
    public function modify(){

		if(isset($_POST)){
			$id = isset($_POST['id']) ? $_POST['id'] : false;
			$description = isset($_POST['description']) ? $_POST['description'] : false;
			$entrytypeid = isset($_POST['entry_types']) ? $_POST['entry_types'] : false;
			$campaignid = isset($_POST['campaigns']) ? $_POST['campaigns'] : false;
            $startdate = isset($_POST['startDate']) ? $_POST['startDate'] : false;
            $enddate = isset($_POST['endDate']) ? $_POST['endDate'] : false;
            $statusid = isset($_POST['status']) ? $_POST['status'] : false;
            $comment = isset($_POST['comment']) ? $_POST['comment'] : false;
			$modifyid = isset($_SESSION['id']) ? $_SESSION['id'] : false;
			$current = isset($_POST['log']) ? $_POST['log'] : false;

			if($id && $description && $entrytypeid && $campaignid && $startdate && $enddate && $statusid && $comment && $modifyid && $current){
				$entry = new Entry();
				$entry->setID($id);
                $entry->setDescription($description);
                $entry->setEntryType_id($entrytypeid);
				$entry->setCampaign_id($campaignid);
                $entry->setStartDate($startdate);
                $entry->setEndDate($enddate);
                $entry->setStatus_id($statusid);
				$entry->setComment($comment);
				$entry->setModifyID($modifyid);
				
				$module = "Entries";
				$change = $current. " | ".$description."-".$comment."-".$entrytypeid."-".$campaignid."-".$startdate."-".$enddate."-".$statusid;
				$action = "Modify";
				$log = new Log();	

				$save = $entry->modify();
			
				if($save){
					$_SESSION['entry'] = "modified";
					$log->insert($module, $change, $action);
				}else{
					$_SESSION['entry'] = "failed";
				}

			}else{
				$_SESSION['entry'] = "failed";
			}
		}else{
			$_SESSION['entry'] = "failed";
		}
		
		echo ("<script>location.href = '".base_url."entries-tables';</script>");
	}

	public function delete(){

		if(isset($_POST)){
			$id = isset($_POST['id']) ? $_POST['id'] : false;
			$current = isset($_POST['log']) ? $_POST['log'] : false;

			if($id && $current) {
				$entry = new Entry();
				$entry->setID($id);

				$module = "Entries";
				$change = $current;
				$action = "Delete";
				$log = new Log();

				$save = $entry->delete();
				
				if($save){
					$_SESSION['entry'] = "deleted";
					$log->insert($module, $change, $action);
				}else{
					$_SESSION['entry'] = "failed";
				}
			}else{
				$_SESSION['entry'] = "failed";
			}
		}else{
			$_SESSION['entry'] = "failed";
		}
		echo ("<script>location.href = '".base_url."entries-tables';</script>");
	}
    
}