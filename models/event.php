<?php

class Event{
	private $id;
    private $subject;
    private $description;
	private $type_issue_id;
    private $issue_id;
    private $campaign_id;
    private $user_id;
    private $agent_user;
    private $phone;
	private $status_id;
	private $status;
	private $target;
	private $slastatus;
	private $createDate;
	private $createID;
	private $modifyDate;
	private $modifyID;

	private $db;
	
	public function __construct() {
		$this->db = Database::connect();
    }
 
    function getID() {
		return $this->id;
    }

    function getSubject() {
		return $this->subject;
    }
    
    function getDescription() {
		return $this->description;
	}
    
    function getTypeIssue_id() {
		return $this->type_issue_id;
	}

    function getIssue_id() {
		return $this->issue_id;
	}

	function getCampaign_id() {
		return $this->campaign_id;
	}

    function getUser_id() {
		return $this->user_id;
	}

	function getAgentUser() {
		return $this->agent_user;
    }

    function getPhone() {
		return $this->phone;
    }

	function getStatus_id() {
		return $this->status_id;
	}

	function getStatus() {
		return $this->status;
	}

	function getTarget() {
		return $this->target;
    }
    
	function getSLAStatus() {
		return $this->slastatus;
    }

    function getCreateDate() {
		return $this->createDate;
    }
    
    function getCreateID() {
		return $this->createID;
    }
    
    function getModifyDate() {
		return $this->modifyDate;
    }
    
    function getModifyID() {
		return $this->modifyID;
	}

	function setID($id) {
		$this->id = $id;
    }

    function setSubject($subject) {
		$this->subject = $this->db->real_escape_string($subject);
    }

    function setDescription($description) {
		$this->description = $this->db->real_escape_string($description);
    }

    function setTypeIssue_id($type_issue_id) {
		$this->type_issue_id = $type_issue_id;
    }

    function setIssue_id($issue_id) {
		$this->issue_id = $issue_id;
    }
    
    function setCampaign_id($campaign_id) {
		$this->campaign_id = $campaign_id;
    }

    function setUser_id($user_id) {
		$this->user_id = $user_id;
    }

    function setAgentUser($agent_user) {
		$this->agent_user = $agent_user;
	}
    
    function setPhone($phone) {
		$this->phone = $phone;
	}

	function setStatus_id($status_id) {
		$this->status_id = $status_id;
    }

	function setStatus($status) {
		$this->status = $this->db->real_escape_string($status);
    }

	function setTarget($target) {
		$this->target = $target;
    }

	function setSLAStatus($slastatus) {
		$this->slastatus = $this->db->real_escape_string($slastatus);
    }
    
    function setCreateDate($createDate) {
		$this->createDate = $createDate;
	}
    
    function setCreateID($createID) {
		$this->createID = $createID;
    }
    
    function setModifyDate($modifyDate) {
		$this->modifyDate = $modifyDate;
    }
    
    function setModifyID($modifyID) {
		$this->modifyID = $modifyID;
	}

	//Obtiene todos los valores de la bd
	public function getAll(){
        $sql = "select e.id, e.subject, e.description, ti.name as typeissue, i.name as issue, c.campaignname as campaign, u1.user as user, ";
        $sql .= "e.agentuser, e.phone, s.name as status, e.target, e.slastatus, e.modifydate, u2.user as modifyid, e.createdate, u1.user as createid ";
        $sql .= "from events as e, typeissue as ti, issues as i, campaigns as c, users as u1, users as u2, status as s ";
        $sql .= "where e.typeissueid = ti.id and e.issueid = i.id and e.campaignid = c.id and e.userid = u1.id and e.statusid = s.id and e.modifyid = u2.id ";
		$events = $this->db->query($sql);
		return $events;
	}

	public function getOne(){
        $sql = "select e.id as id, e.subject as subject, e.description as description, e.typeissueid as typeissueid, ti.name as typeissue, ";
		$sql .= "e.issueid as issueid, i.name as issue, e.campaignid as campaignid, c.campaignname as campaign, e.userid as userid, u.user as user, ";
		$sql .= "e.statusid as statusid, s.name as status, e.agentuser as agentuser, e.phone as phone, e.target as target, e.slastatus as slastatus ";
		$sql .= "from events as e, typeissue as ti, issues as i, campaigns as c, users as u, status as s ";
		$sql .= "where e.typeissueid = ti.id and e.issueid = i.id and e.campaignid = c.id and e.userid = u.id and e.statusid = s.id ";
		$sql .= "and e.id = ".$this->getID();
		$event = $this->db->query($sql);
		return $event->fetch_object();
	}

    public function create(){
		//$sql = "INSERT INTO campaigns(campaignname,locationid,lobid,comment)VALUES('{$this->getName()}', {$this->getLocation_id()}, {$this->getLob_id()}, '{$this->getComment()}')"; //cambiar curtime a conseguir el user id
		$sql = "insert into events(subject, description, typeissueid, issueid, campaignid, userid, agentuser, phone, statusid, target, slastatus, createdate, createid, modifydate, modifyid)values";
		$sql .= "(";
		$sql .= "'".$this->getSubject()."','".$this->getDescription()."',".$this->getTypeIssue_id().",".$this->getIssue_id().",";
		$sql .= $this->getCampaign_id().",".$this->getUser_id().",'".$this->getAgentUser()."','".$this->getPhone()."',";
		$sql .= $this->getStatus_id().",DATE_ADD(NOW(), INTERVAL ".$this->getTarget()." minute),'Not Completed', NOW(), ";
		$sql .= $this->getCreateID().", NOW(), ".$this->getModifyID();
		$sql .= ")";
		//echo '<script>alert('.$sql.');</script>';
		$save = $this->db->query($sql);
		
		$result = false;
		if($save){
			$result = true;
		}
		//return $result;
		return $result;
	}
	
    public function modify(){
		//$_SESSION['modifyCampaign_path'] = base_url.'campaigns-modify?id=';

		$sql = "update events set ";		
		$sql .= "subject = '".$this->getSubject()."', description = '".$this->getDescription()."', typeissueid = ".$this->getTypeIssue_id();
		$sql .= ", issueid = ".$this->getIssue_id().", campaignid = ".$this->getCampaign_id().", agentuser = '".$this->getAgentUser();
		$sql .= "', phone = '".$this->getPhone()."', statusid = ".$this->getStatus_id().", slastatus = if(statusid!=19,'Not Completed', if(NOW()>=target,'Out of Time','Completed')),"; 
		$sql .=  "modifydate = NOW(), modifyid = ".$this->getModifyID()." ";
		$sql .= "where id = ".$this->getID();
		
		$save = $this->db->query($sql);

		$result = false;
		if($save){
			$result = true;
		}
		return $result;
	}

    public function delete(){
		$sql = "delete from events ";
		$sql .= "where id = ".$this->getID();

		$save = $this->db->query($sql);

		$result = false;
		if($save){
			$result = true;
		}
		return $result;
	}

	public function getSelectIssues(){
		$sql = "select i.id, i.name, i.target ";
		$sql .= "from issues as i ";
		$sql .= "where i.typeissue = ".$this->getIssue_id();
		$issues = $this->db->query($sql);
		return $issues;
	}

	public function getAlerts(){
		$sql = "select e.subject as subject, c.campaignname as campaign, u.user as user, i.name as issue, e.slastatus as slastatus ";
        $sql .= "from events as e, users as u, campaigns as c, issues as i ";
        $sql .= "where e.modifyid = u.id and e.campaignid = c.id and e.issueid = i.id and (e.slastatus = 'Not Completed' or e.slastatus = 'Out of Time') ";
        $sql .= "and e.modifydate between NOW() - INTERVAL 5 MINUTE and NOW() ";
		$alerts = $this->db->query($sql);
		return $alerts;
	}

}    