<?php

class Status{
	private $id;
	private $name;
	private $description;
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

    function getDescription() {
		return $this->description;
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

    function setDescription($description) {
		$this->description = $this->db->real_escape_string($description);
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

	public function getAll(){
		$sql = "select s.id as id, s.name, s.description, s.createdate, u1.user as createid, s.modifydate, u2.user as modifyid ";
		$sql .= "from status as s, users as u1, users as u2 ";
		$sql .= "where s.createid = u1.id and s.modifyid = u2.id ";
		$status = $this->db->query($sql);
		return $status;
	}

	public function getOne(){
		$sql = "select * from status where id = ".$this->getID();
		$status = $this->db->query($sql);
		return $status->fetch_object();
	}

	public function create(){
		$sql = "insert into status(name,description,createdate, createid, modifydate, modifyid)values";
		$sql .= "(";
		$sql .= "'".$this->getName()."','".$this->getDescription()."', CURDATE(), ".$this->getCreateID().", CURDATE(), ".$this->getModifyID();
		$sql .= ")";
		$save = $this->db->query($sql);
		
		$result = false;
		if($save){
			$result = true;
		}
		return $result;
	}

	public function modify(){
		//$_SESSION['modifyCampaign_path'] = base_url.'campaigns-modify?id=';

		$sql = "update status set ";		
		$sql .= "name = '".$this->getName()."', description = '".$this->getDescription()."', modifydate = CURDATE(), modifyid = ".$this->getModifyID()." ";
		$sql .= "where id = ".$this->getID();		
		
		$save = $this->db->query($sql);

		$result = false;
		if($save){
			$result = true;
		}
		return $result;
	}

	public function delete(){
		$sql = "delete from status ";
		$sql .= "where id = ".$this->getID();

		$save = $this->db->query($sql);

		$result = false;
		if($save){
			$result = true;
		}
		return $result;
	}

}    