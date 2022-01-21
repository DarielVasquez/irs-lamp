<?php
require_once "ldap.php";

class Passport{
	private $id;
    private $name;
    private $user;
	private $pass;
	private $levels;

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

	function getLevels() {
		return $this->levels;
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

	function setLevels($levels) {
		$this->levels = $this->db->real_escape_string($levels);
	}
    
    public function login($user,$pass){

		if(!$user)
			return 0;

		if(!$pass)
			return 0;

		$session_users="irs";
		session_name($session_users);
		session_start();
        $sql = "select count(*) as total from users where user = '".$user."' and pass = '".$pass."'";
        $login = $this->db->query($sql);
		$signin = $login->fetch_object();
        /////
		if($signin->total == 1)
		{
			$sqlinfo = "select id,fullname,user,pass from users where user = '".$user."' and pass = '".$pass."'";
			$userdata = $this->db->query($sqlinfo);
			$data = $userdata->fetch_object();
			$_SESSION['id'] = $data->id;
			$_SESSION['fullname'] = $data->fullname;
			$_SESSION['username'] = $data->user;
			$_SESSION['pass'] = $data->pass;
			$_SESSION['canlogin'] = 1;
			return 1;
		}else {
			return 0;
		}
		/////
		//return $result; 0/1
        //return  $login->fetch_object();
	}

	/*public function login($user,$password)
	{

		$session_users="irs";
		session_name($session_users);
		session_start();
		
		$ldap_session = new zldap($user,$password);
		$ldap_session->ldap_login();

		echo "//-------------------------------------------------------//</p\n>";
		echo "//                LDAP LOGIN FINAL STATUS                //</p\n>";
		echo "//-------------------------------------------------------//</p\n>";
		echo "Username: <b>".$ldap_session->get_username()."</b></p\n>";
		echo "Name: <b>".$ldap_session->get_name()."</b></p\n>";
		echo "Group Access: <b>".$ldap_session->get_ldap_group_access()."</b></p\n>";
		echo "Can Login: <b>".$ldap_session->get_ldap_can_login_status()."</b></p\n>";
		echo "Level Access: <b>".$ldap_session->get_level_access_rule()."</b></p\n>";

		
		$ldapFlag = false;
		$localFlag = false;

		if($ldap_session->get_ldap_can_login_status()== 0)
		{
			$ldapFlag = false;
		}



			if($ldap_session->get_ldap_can_login_status() == 1)
			{
				$sqluser = "select count(*) from users where user = '".$user."'";
				$queryuser = $this->db->query($sqluser);
				$ifuser = $queryuser->fetch_object();

				if($ifuser->id == 0)
				{

					$HR_Access = 0;
					if($ldap_session->get_level_access_rule() > 1)
						$HR_Access = 1;
					
					
					$sqlinsert = "insert into users(fullname,user,pass,levels)values(";
					$sqlinsert .= "'".$ldap_session->get_name()."','".$user."','".$password."',".$ldap_session->get_level_access_rule().",1";
					$sqlinsert .= ")";
					//echo $sqlinsert;
					$insert = $this->db->query($sqlinsert);
					//echo "Usuario Ingresado al Sistema <br>";
				}elseif($ifuser->id == 1){
					$sqluser = "select id,pass from users where user = '".$user."'";
					//echo $sqluser;
					$passquery = $this->db->query($sqluser);
					$passdb = $passquery->fetch_object();
					if($passdb->pass != $password){
						$updatesql = "update users set pass = '".$password."' where id = ".$passdb->id;
						$update = $this->db->query($updatesql);
						//echo "Contrasena fue Modificada con exito <br>";
					}
				}
				$sql = "select id,user,pass,fullname,levels from users where pass = '".$password."' and user = '".$user."'";
				//echo $sql;
				$queryselect = $this->db->query($sql);
				$response = $queryselect->fetch_object();

				$status = true;
				$_SESSION['id'] = $response->id;
				$_SESSION['fullname'] = $response->fullname;
				$_SESSION['user'] = $response->user;
				$_SESSION['pass'] = $response->pass;
				$_SESSION['levels'] = $response->levels;
				$_SESSION['canlogin'] = 1;
				$_SESSION['action'] = false;
				$_SESSION['header'] = "";
				$_SESSION['comments'] = "";
				$_SESSION['process'] = "";
				$_SESSION['smartview_path'] = "";
				//header("Location: blank.php");
				//header("Location: blank.php");
				return 1;
				}else{
					//header("Location: index.php?err=LoginFail");
					return 0;
				}
	}*/
	
	public function logout(){
		$session_users = "irs";
		session_unset();
		//session_name($session_users);
		//session_start();	
		return 1;
	}

    public function register(){
        $sql = "insert into users(fullname,user,pass,createdate)values";
		$sql .= "(";
		$sql .= "'".$this->getName()."','".$this->getUser()."','".$this->getPass()."', CURDATE() ";
		$sql .= ")";
        $save = $this->db->query($sql);
        
		$result = false;
		if($save){
			$result = true;
		}
		return $result;
    }
	

}    