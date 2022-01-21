<?php

class LoB{
	private $id;
	private $type;
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
    
    function getType() {
		return $this->type;
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
    
    function setType($type) {
		$this->type = $this->db->real_escape_string($type);
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

	//Obtiene todos los valores de la bd
	public function getAll(){
		$sql = "select l.id as id, l.type as type, l.description as description, l.createdate, u1.user as createid, l.modifydate, u2.user as modifyid ";
		$sql .= "from lob as l, users as u1, users as u2 ";
		$sql .= "where l.createid = u1.id and l.modifyid = u2.id ";
		$lobs = $this->db->query($sql);
		return $lobs;
	}

	public function getOne(){
		$sql = "select * from lob where id =".$this->getID();
		$lob = $this->db->query($sql);
		return $lob->fetch_object();
	}

	public function create(){
		$sql = "insert into lob(type,description, createdate, createid, modifydate, modifyid)values";
		$sql .= "(";
		$sql .= "'".$this->getType()."','".$this->getDescription()."', CURDATE(), ".$this->getCreateID().", CURDATE(), ".$this->getModifyID();
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

		$sql = "update lob set ";		
		$sql .= "type = '".$this->getType()."', description = '".$this->getDescription()."', modifydate = CURDATE(), modifyid = ".$this->getModifyID()." ";
		$sql .= "where id = ".$this->getID();		
		
		$save = $this->db->query($sql);

		$result = false;
		if($save){
			$result = true;
		}
		return $result;
	}

	public function delete(){
		$sql = "delete from lob ";
		$sql .= "where id = ".$this->getID();

		$save = $this->db->query($sql);

		$result = false;
		if($save){
			$result = true;
		}
		return $result;
	}


}    