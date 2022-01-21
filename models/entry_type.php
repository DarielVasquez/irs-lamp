<?php

class Entry_type{
	private $id;
	private $name;
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
		$sql = "select et.id as id, et.entryname, et.createdate, u1.user as createid, et.modifydate, u2.user as modifyid ";
		$sql .= "from entrytype as et, users as u1, users as u2 ";
		$sql .= "where et.createid = u1.id and et.modifyid = u2.id ";
		$entry_types = $this->db->query($sql);
		return $entry_types;
	}

	public function getOne(){
		$sql = "select * from entrytype where id = ".$this->getID();
		$entry_type = $this->db->query($sql);
		return $entry_type->fetch_object();
	}

	public function create(){
		$sql = "insert into entrytype(entryname, createdate, createid, modifydate, modifyid)values";
		$sql .= "(";
		$sql .= "'".$this->getName()."', CURDATE(), ".$this->getCreateID().", CURDATE(), ".$this->getModifyID();
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

		$sql = "update entrytype set ";		
		$sql .= "entryname = '".$this->getName()."', modifydate = CURDATE(), modifyid = ".$this->getModifyID()." ";
		$sql .= "where id = ".$this->getID();		
		
		$save = $this->db->query($sql);

		$result = false;
		if($save){
			$result = true;
		}
		return $result;
	}

	public function delete(){
		$sql = "delete from entrytype ";
		$sql .= "where id = ".$this->getID();

		$save = $this->db->query($sql);

		$result = false;
		if($save){
			$result = true;
		}
		return $result;
	}

}    