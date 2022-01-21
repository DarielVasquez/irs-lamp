<?php

class Report{
	private $id_event;
    private $id_entry;
    //entry
	private $entry_type_id;
    private $comment;
    //event
    private $subject;
	private $type_issue_id;
    private $issue_id;
    private $issue;
    private $agent_user;
    private $phone;
    //both
    private $description;
    private $campaign_id;
	private $campaign;
    private $user_id;
	private $user;
	private $status_id;
	private $createDate;
	private $createID;
	private $modifyDate;
	private $modifyID;
	private $startDate;
    private $endDate;

	private $db;
	
	public function __construct() {
		$this->db = Database::connect();
    }
 
    function getID_Event() {
		return $this->id_event;
    }

    function getID_Entry() {
		return $this->id_entry;
    }

    function getSubject() {
		return $this->subject;
    }
    
    function getEntryType_id() {
		return $this->entry_type_id;
	}

	function getCampaign_id() {
		return $this->campaign_id;
	}

	function getCampaign() {
		return $this->campaign;
	}

	function getStartDate() {
		return $this->startDate;
    }

    function getEndDate() {
		return $this->endDate;
    }
    
    function getDescription() {
		return $this->description;
	}

    function getComment() {
		return $this->comment;
    }
    
    function getUser_id() {
		return $this->user_id;
	}
	    
    function getUser() {
		return $this->user;
	}

	function getStatus_id() {
		return $this->status_id;
	}

    function getTypeIssue_id() {
		return $this->type_issue_id;
	}

    function getIssue_id() {
		return $this->issue_id;
	}

    function getIssue() {
		return $this->issue;
	}

    function getAgentUser() {
		return $this->agent_user;
    }

    function getPhone() {
		return $this->phone;
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

	function setID_Event($id_event) {
		$this->id_event = $id_event;
    }
    
	function setID_Entry($id_entry) {
		$this->id_entry = $id_entry;
    }

    function setSubject($subject) {
		$this->subject = $this->db->real_escape_string($subject);
    }
    
    function setEntryType_id($entry_type_id) {
		$this->entry_type_id = $entry_type_id;
    }
    
    function setCampaign_id($campaign_id) {
		$this->campaign_id = $campaign_id;
    }

	function setCampaign($campaign) {
		$this->campaign = $this->db->real_escape_string($campaign);
    }

    function setStartDate($startDate) {
		$this->startDate = $startDate;
	}
    
    function setEndDate($endDate) {
		$this->endDate = $endDate;
	}

    function setDescription($description) {
		$this->description = $this->db->real_escape_string($description);
    }

    function setComment($comment) {
		$this->comment = $this->db->real_escape_string($comment);
    }
    
    function setUser_id($user_id) {
		$this->user_id = $user_id;
    }

	function setUser($user) {
		$this->user = $user;
    }
    
    function setStatus_id($status_id) {
		$this->status_id = $status_id;
    }

    function setTypeIssue_id($type_issue_id) {
		$this->type_issue_id = $type_issue_id;
    }

    function setIssue_id($issue_id) {
		$this->issue_id = $issue_id;
    }

    function setIssue($issue) {
		$this->issue = $issue;
    }

    function setAgentUser($agent_user) {
		$this->agent_user = $agent_user;
	}
    
    function setPhone($phone) {
		$this->phone = $phone;
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

	public function getGraphCalls(){
		$sql = "select ti.id, ti.name, count(e.typeissueid) as amount ";
		$sql .= "from events as e,typeissue as ti ";
		$sql .= "where e.typeissueid = ti.id and date(e.createdate) between '".$this->getStartDate()."' and '".$this->getEndDate()."' group by ti.name ";
		$calls = $this->db->query($sql);
		return $calls;		
	}

	public function getGraphCampaigns(){
		$sql = "select c.id, c.campaignname, count(e.entrytypeid) as amount ";
		$sql .= "from entries as e,campaigns as c ";
		$sql .= "where e.campaignid = c.id and e.createdate between '".$this->getStartDate()."' and '".$this->getEndDate()."' group by c.campaignname ";
		$campaigns = $this->db->query($sql);
		return $campaigns;
	}

	public function getGraphUsers(){
		$sql = "select u.id, u.user as user ";
		$sql .= "from events as e, users as u ";
		$sql .= "where e.userid = u.id and date(e.createdate) between '".$this->getStartDate()."' and '".$this->getEndDate()."' group by user ";
		$users = $this->db->query($sql);
		return $users;		
	}

	public function getCalls(){
		//$campaigns = $this->db->query("SELECT * FROM campaigns ORDER BY id DESC;");
		$sql = "select e.id, e.subject, e.description, ti.name as typeissue, i.name as nameissue, c.campaignname as campaign, u1.user as user, ";
		$sql .= "e.agentuser, e.phone, s.name as status, e.modifydate, e.target, e.slastatus, u2.user as modifyid, e.createdate, u1.user as createid ";
		$sql .= "from events as e, typeissue as ti, issues as i, campaigns as c, users as u1, users as u2, status as s ";
		$sql .= "where e.typeissueid = ti.id and e.issueid = i.id and e.campaignid = c.id and e.userid = u1.id and e.statusid = s.id and e.modifyid = u2.id ";
		$sql .= "and ti.name = '".$this->getIssue()."' and date(e.createdate) between '".$this->getStartDate()."' and '".$this->getEndDate()."'";
		$reports = $this->db->query($sql);
		//echo $sql;
		return $reports;
	}

	public function getCampaignEntries(){
		$sql = "select e.description, e.comment, e.entrytypeid as entrytypeid, et.entryname as entrytype, e.campaignid as campaignid, c.campaignname as campaign, "; 
		$sql .= "e.startdate, e.enddate, e.userid as userid, u1.user as user, e.statusid as statusid, s.name as status, e.modifydate, ";
		$sql .= "u2.user as modifyid, e.createdate, u1.user as createid ";
		$sql .= "from entries as e, entrytype as et, campaigns as c, users as u1, users as u2, status as s ";
		$sql .= "where e.entrytypeid = et.id and e.campaignid = c.id and e.userid = u1.id and e.statusid = s.id and e.modifyid = u2.id ";
		$sql .= "and c.campaignname = '".$this->getCampaign()."' and e.createdate between '".$this->getStartDate()."' and '".$this->getEndDate()."'";
		$reports = $this->db->query($sql);
		//echo $sql;
		return $reports;
	}

	public function getUsers(){
		//$campaigns = $this->db->query("SELECT * FROM campaigns ORDER BY id DESC;");
		$sql = "select e.id, e.subject, e.description, ti.name as typeissue, i.name as nameissue, c.campaignname as campaign, u1.user as user, ";
		$sql .= "e.agentuser, e.phone, s.name as status, e.modifydate, e.target, e.slastatus, u2.user as modifyid, e.createdate, u1.user as createid ";
		$sql .= "from events as e, typeissue as ti, issues as i, campaigns as c, users as u1, users as u2, status as s ";
		$sql .= "where e.typeissueid = ti.id and e.issueid = i.id and e.campaignid = c.id and e.userid = u1.id and e.statusid = s.id and e.modifyid = u2.id ";
		$sql .= "and u1.user = '".$this->getUser()."' and date(e.createdate) between '".$this->getStartDate()."' and '".$this->getEndDate()."'";
		$reports = $this->db->query($sql);
		//echo $sql;
		return $reports;
	}

	public function getTotal(){
		//$campaigns = $this->db->query("SELECT * FROM campaigns ORDER BY id DESC;");
		$sql = "select e.id, e.subject, e.description, ti.name as typeissue, i.name as nameissue, c.campaignname as campaign, u1.user as user, ";
		$sql .= "e.agentuser, e.phone, s.name as status, e.modifydate, u2.user as modifyid, e.createdate, u1.user as createid, e.target, e.slastatus ";
		$sql .= "from events as e, typeissue as ti, issues as i, campaigns as c, users as u1, users as u2, status as s ";
		$sql .= "where e.typeissueid = ti.id and e.issueid = i.id and e.campaignid = c.id and e.userid = u1.id and e.statusid = s.id and e.modifyid = u2.id ";
		$sql .= "and date(e.createdate) = '".$this->getCreateDate()."'";
		$reports = $this->db->query($sql);
		//echo $sql;
		return $reports;
	}

	public function getAllCalls(){
		//$campaigns = $this->db->query("SELECT * FROM campaigns ORDER BY id DESC;");
		$sql = "select e.id, e.subject, e.description, ti.name as typeissue, i.name as nameissue, c.campaignname as campaign, u1.user as user, ";
		$sql .= "e.agentuser, e.phone, s.name as status, e.modifydate, e.target, e.slastatus, u2.user as modifyid, e.createdate, u1.user as createid ";
		$sql .= "from events as e, typeissue as ti, issues as i, campaigns as c, users as u1, users as u2, status as s ";
		$sql .= "where e.typeissueid = ti.id and e.issueid = i.id and e.campaignid = c.id and e.userid = u1.id and e.statusid = s.id and e.modifyid = u2.id ";
		$sql .= "and ti.id = ".$this->getIssue()." and date(e.createdate) between '".$this->getStartDate()."' and '".$this->getEndDate()."'";
		$reports = $this->db->query($sql);
		//echo $sql;
		return $reports;
	}

	public function getAllCampaigns(){
		$sql = "select e.description, e.comment, e.entrytypeid as entrytypeid, et.entryname as entrytype, e.campaignid as campaignid, c.campaignname as campaign, "; 
		$sql .= "e.startdate, e.enddate, e.userid as userid, u1.user as user, e.statusid as statusid, s.name as status, e.modifydate, u2.user as modifyid, e.createdate, u1.user as createid ";
		$sql .= "from entries as e, entrytype as et, campaigns as c, users as u1, users as u2, status as s ";
		$sql .= "where e.entrytypeid = et.id and e.campaignid = c.id and e.userid = u1.id and e.statusid = s.id and e.modifyid = u2.id ";
		$sql .= "and c.id = ".$this->getCampaign()." and e.createdate between '".$this->getStartDate()."' and '".$this->getEndDate()."'";
		//echo $sql;
		$reports = $this->db->query($sql);
		return $reports;
	}

	public function getAllUsers(){
		//$campaigns = $this->db->query("SELECT * FROM campaigns ORDER BY id DESC;");
		$sql = "select e.id, e.subject, e.description, ti.name as typeissue, i.name as nameissue, c.campaignname as campaign, u1.user as user, ";
		$sql .= "e.agentuser, e.phone, s.name as status, e.modifydate, e.target, e.slastatus, u2.user as modifyid, e.createdate, u1.user as createid ";
		$sql .= "from events as e, typeissue as ti, issues as i, campaigns as c, users as u1, users as u2, status as s ";
		$sql .= "where e.typeissueid = ti.id and e.issueid = i.id and e.campaignid = c.id and e.userid = u1.id and e.statusid = s.id and e.modifyid = u2.id ";
		$sql .= "and e.userid = ".$this->getUser()." and date(e.createdate) between '".$this->getStartDate()."' and '".$this->getEndDate()."'";
		$reports = $this->db->query($sql);
		//echo $sql;
		return $reports;
	}

}    