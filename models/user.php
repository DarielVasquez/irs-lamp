<?php

class User{
	private $id;
    private $name;
    private $user;
	private $pass;
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

	function getUser() {
		return $this->user;
	}
    
    function getPass() {
		return $this->pass;
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

    function setUser($user) {
		$this->user = $this->db->real_escape_string($user);
    }

    function setPass($pass) {
		$this->pass = $this->db->real_escape_string($pass);
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
		$sql = "select u.id as id, u.fullname, u.user, u.pass, u.createdate, u1.user as createid, u.modifydate, u2.user as modifyid ";
		$sql .= "from users as u, users as u1, users as u2 ";
		$sql .= "where u.createid = u1.id and u.modifyid = u2.id ";
		$users = $this->db->query($sql);
		return $users;
	}

	public function getOne(){
		$sql = "select * from users where id = ".$this->getID();
		$user = $this->db->query($sql);
		return $user->fetch_object();
	}

	public function create(){
		$sql = "insert into users(fullname,user,pass,createdate,createid, modifydate, modifyid)values";
		$sql .= "(";
		$sql .= "'".$this->getName()."','".$this->getUser()."','".$this->getPass()."', CURDATE(), ".$this->getCreateID().", CURDATE(), ".$this->getModifyID();
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

		$sql = "update users set ";		
		$sql .= "fullname = '".$this->getName()."', user = '".$this->getUser()."', pass = '".$this->getPass()."', modifydate = CURDATE(), modifyid = ".$this->getModifyID()." ";
		$sql .= "where id = ".$this->getID();		
		
		$save = $this->db->query($sql);

		$result = false;
		if($save){
			$result = true;
		}
		return $result;
	}

	public function delete(){
		$sql = "delete from users ";
		$sql .= "where id = ".$this->getID();

		$save = $this->db->query($sql);

		$result = false;
		if($save){
			$result = true;
		}
		return $result;
	}

}    