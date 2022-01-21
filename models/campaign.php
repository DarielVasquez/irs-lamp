<?php

class Campaign{
	private $id;
	private $name;
    private $location_id;
    private $lob_id;
	private $comment;
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
    
    function getName() {
		return $this->name;
	}

	function getLocation_id() {
		return $this->location_id;
	}

	function getLob_id() {
		return $this->lob_id;
    }
    
    function getComment() {
		return $this->comment;
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
    
    function setName($name) {
		$this->name = $this->db->real_escape_string($name);
    }
    
    function setLocation_id($location_id) {
		$this->location_id = $location_id;
    }
    
    function setLob_id($lob_id) {
		$this->lob_id = $lob_id;
    }

    function setComment($comment) {
		$this->comment = $this->db->real_escape_string($comment);
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
		$sql = "select c.id, c.campaignname as campaignname,lo.name as locationid,l.type as lobid,c.comment,c.createdate,u1.user as createid,c.modifydate,u2.user as modifyid ";
		$sql .= "from campaigns as c,lob as l,location as lo, users as u1, users as u2 ";
		$sql .= "where c.locationid = lo.id and c.lobid = l.id and c.createid = u1.id and c.modifyid = u2.id ";
		//echo $sql;
		$campaigns = $this->db->query($sql);
		return $campaigns;
	}

	public function getOne(){
		$sql = "select c. id as id, c.campaignname as campaignname,c.locationid as locationid, lo.name as location, c.lobid as lobid, l.type as lob,c.comment,c.createdate,c.createid,c.modifydate,c.modifyid ";
		$sql .= "from campaigns as c,lob as l,location as lo ";
		$sql .= "where c.locationid = lo.id and c.lobid = l.id ";
		$sql .= "and c.id = ".$this->getID();
		$campaign = $this->db->query($sql);
		return $campaign->fetch_object();
	}

	public function create(){
		//$sql = "INSERT INTO campaigns(campaignname,locationid,lobid,comment)VALUES('{$this->getName()}', {$this->getLocation_id()}, {$this->getLob_id()}, '{$this->getComment()}')"; //cambiar curtime a conseguir el user id
		$sql = "insert into campaigns(campaignname,locationid,lobid,comment, createdate, createid, modifydate, modifyid)values";
		$sql .= "(";
		$sql .= "'".$this->getName()."',".$this->getLocation_id().",".$this->getLob_id().",'".$this->getComment()."', CURDATE(), ".$this->getCreateID().", CURDATE(), ".$this->getModifyID();
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

		$sql = "update campaigns set ";		
		$sql .= "campaignname = '".$this->getName()."', locationid= ".$this->getLocation_id().", lobid = ".$this->getLob_id().", comment = '".$this->getComment()."', modifydate = CURDATE(), modifyid = ".$this->getModifyID()." ";
		$sql .= "where id = ".$this->getID();		
		
		$save = $this->db->query($sql);

		$result = false;
		if($save){
			$result = true;
		}
		return $result;
	}

	public function delete(){
		$sql = "delete from campaigns ";
		$sql .= "where id = ".$this->getID();

		$save = $this->db->query($sql);

		$result = false;
		if($save){
			$result = true;
		}
		return $result;
	}

}    