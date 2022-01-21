<?php

class Entry{
	private $id;
	private $entry_type_id;
    private $campaign_id;
    private $startDate;
    private $endDate;
    private $description;
    private $comment;
    private $user_id;
    private $status_id;
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
    
    function getEntryType_id() {
		return $this->entry_type_id;
	}

	function getCampaign_id() {
		return $this->campaign_id;
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

	function getStatus_id() {
		return $this->status_id;
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
    
    function setEntryType_id($entry_type_id) {
		$this->entry_type_id = $entry_type_id;
    }
    
    function setCampaign_id($campaign_id) {
		$this->campaign_id = $campaign_id;
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
    
    function setStatus_id($status_id) {
		$this->status_id = $status_id;
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
        //$campaigns = $this->db->query("SELECT * FROM campaigns ORDER BY id DESC;");
        $sql = "select e.id as id, e.entrytypeid as entrytypeid, et.entryname as entrytype, e.campaignid as campaignid, c.campaignname as campaign, ";
		$sql .= "e.startdate as startdate, e.enddate as enddate, e.description as description, e.comment as comment, ";
		$sql .= "e.userid as userid, u1.user as user, e.statusid as statusid, s.name as status, e.modifydate, u2.user as modifyid, e.createdate, u1.user as createid ";
		$sql .= "from entries as e, entrytype as et, campaigns as c, users as u1, users as u2, status as s ";
		$sql .= "where e.entrytypeid = et.id and e.campaignid = c.id and e.userid = u1.id and e.statusid = s.id and e.modifyid = u2.id ";
		//echo $sql;
		$entries = $this->db->query($sql);
		return $entries;
	}

	public function getOne(){
        $sql = "select e.id as id, e.entrytypeid as entrytypeid, et.entryname as entrytype, e.campaignid as campaignid, c.campaignname as campaign, ";
		$sql .= "e.startdate as startdate, e.enddate as enddate, e.description as description, e.comment as comment, ";
		$sql .= "e.userid as userid, u.user as user, e.statusid as statusid, s.name as status, e.modifydate, e.modifyid, e.createdate, e.createid ";
		$sql .= "from entries as e, entrytype as et, campaigns as c, users as u, status as s ";
		$sql .= "where e.entrytypeid = et.id and e.campaignid = c.id and e.userid = u.id and e.statusid = s.id ";
		$sql .= "and e.id = ".$this->getID();
		$entry = $this->db->query($sql);
		return $entry->fetch_object();
	}

	public function create(){
		//$sql = "INSERT INTO campaigns(campaignname,locationid,lobid,comment)VALUES('{$this->getName()}', {$this->getLocation_id()}, {$this->getLob_id()}, '{$this->getComment()}')"; //cambiar curtime a conseguir el user id
		$sql = "insert into entries(entrytypeid, campaignid, startdate, enddate, description, comment, userid, statusid, createdate, createid, modifydate, modifyid)values";
		$sql .= "(";
		$sql .= $this->getEntryType_id().",".$this->getCampaign_id().",'".$this->getStartDate()."','".$this->getEndDate()."','".$this->getDescription()."','".$this->getComment()."',".$this->getUser_id().",".$this->getStatus_id().", CURDATE(), ".$this->getCreateID().", CURDATE(), ".$this->getModifyID();
		$sql .= ")";
		//echo '<script>alert('.$sql.');</script>';
		$save = $this->db->query($sql);
		
		$result = false;
		if($save){
			$result = true;
		}
		return $result;
	//	return $sql;
	}
	
	public function modify(){
		//$_SESSION['modifyCampaign_path'] = base_url.'campaigns-modify?id=';

		$sql = "update entries set ";		
		$sql .= "entrytypeid = ".$this->getEntryType_id().", campaignid = ".$this->getCampaign_id().", startdate = '".$this->getStartDate()."', enddate = '".$this->getEndDate()."', description = '".$this->getDescription()."', comment = '".$this->getComment()."', statusid = ".$this->getStatus_id().", modifydate = CURDATE(), modifyid = ".$this->getModifyID()." ";
		$sql .= "where id = ".$this->getID();
		
		$save = $this->db->query($sql);

		$result = false;
		if($save){
			$result = true;
		}
		return $result;
	}

	public function delete(){
		$sql = "delete from entries ";
		$sql .= "where id = ".$this->getID();

		$save = $this->db->query($sql);

		$result = false;
		if($save){
			$result = true;
		}
		return $result;
	}

}    