<?php

class Issue_type{
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
		$sql = "select ti.id as id, ti.name, ti.createdate, u1.user as createid, ti.modifydate, u2.user as modifyid ";
		$sql .= "from typeissue as ti, users as u1, users as u2 ";
		$sql .= "where ti.createid = u1.id and ti.modifyid = u2.id ";
		$issue_types = $this->db->query($sql);
		return $issue_types;
    }
    
    public function getOne(){
		$sql = "select * from typeissue where id = ".$this->getID();
		$issue_type = $this->db->query($sql);
		return $issue_type->fetch_object();
    }
    
    public function create(){
		$sql = "insert into typeissue(name, createdate, createid, modifydate, modifyid)values";
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

		$sql = "update typeissue set ";		
		$sql .= "name = '".$this->getName()."', modifydate = CURDATE(), modifyid = ".$this->getModifyID()." ";
		$sql .= "where id = ".$this->getID();		
		
		$save = $this->db->query($sql);

		$result = false;
		if($save){
			$result = true;
		}
		return $result;
	}

	public function delete(){
		$sql = "delete from typeissue ";
		$sql .= "where id = ".$this->getID();

		$save = $this->db->query($sql);

		$result = false;
		if($save){
			$result = true;
		}
		return $result;
	}

}