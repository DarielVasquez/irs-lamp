<?php

class Issue{
	private $id;
	private $name;
    private $typeissue;
	private $target;
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
    
    function getTypeIssue() {
		return $this->typeissue;
    }

	function getTarget() {
		return $this->target;
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

    function setTypeIssue($typeissue) {
		$this->typeissue = $this->db->real_escape_string($typeissue);
    }
	
	function setTarget($target) {
		$this->target = $target;
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
		$sql = "select i.id as id, i.name, i.typeissue as typeissue, t.name as type, i.target as target, i.createdate, u1.user as createid, i.modifydate, u2.user as modifyid ";
		$sql .= "from issues as i, typeissue as t, users as u1, users as u2 ";
		$sql .= "where i.typeissue = t.id and i.createid = u1.id and i.modifyid = u2.id ";
		$issues = $this->db->query($sql);
		return $issues;
    }
    
    public function getOne(){
        $sql = "select i.id as id, i.name as name, i.typeissue as typeissue, t.name as type, i.target as target ";
		$sql .= "from issues as i, typeissue as t ";
        $sql .= "where i.typeissue = t.id ";
        $sql .= "and i.id = ".$this->getID();
		$issue = $this->db->query($sql);
		return $issue->fetch_object();
    }

	public function create(){
		//$sql = "INSERT INTO campaigns(campaignname,locationid,lobid,comment)VALUES('{$this->getName()}', {$this->getLocation_id()}, {$this->getLob_id()}, '{$this->getComment()}')"; //cambiar curtime a conseguir el user id
		$sql = "insert into issues(name,typeissue,target, createdate, createid, modifydate, modifyid)values";
		$sql .= "(";
		$sql .= "'".$this->getName()."',".$this->getTypeIssue().", ".$this->getTarget().", CURDATE(), ".$this->getCreateID().", CURDATE(), ".$this->getModifyID();
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

		$sql = "update issues set ";		
		$sql .= "name = '".$this->getName()."', typeissue = ".$this->getTypeIssue().", target = ".$this->getTarget().", modifydate = CURDATE(), modifyid = ".$this->getModifyID()." ";
		$sql .= "where id = ".$this->getID();		
		
		$save = $this->db->query($sql);

		$result = false;
		if($save){
			$result = true;
		}
		return $result;
	}

	public function delete(){
		$sql = "delete from issues ";
		$sql .= "where id = ".$this->getID();

		$save = $this->db->query($sql);

		$result = false;
		if($save){
			$result = true;
		}
		return $result;
	}

}