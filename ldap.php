<?php
//LDAP ACCESS CREATE BY MARIO HENRIQUEZ
//ALL RIGHT RESERVED BY KNOAH SOLUTIONS

class zldap
{
private $user;			// USERNAME LOGGED IN
private $password;		// PASSWORD LOGGED IN
private $ldap_status;		// FINAL STATUS AFTER LOGIN
private $ldap_server_name;	// AD SERVER REAL NAME
private $ldap_server;		// DOMAIN CONTROLLER NAME
private $ad_stream;		// DOMAIN DC STREAM
private $domain;		// NAME OF DOMAIN TO MAKE LOGIN
private $ldap;			// LDAP CONNECTION
private $ldap_bind_x;		// LDAP BIND CONNECTION VARIABLE

//-------------------------------------------------------------//
//-------------------------------------------------------------//
//			INTERNAL VARIABLES		       //
//-------------------------------------------------------------//
//-------------------------------------------------------------//

private $ldap_username;		// USER GIVEN BY ACTIVE DIRECTRY
private $ldap_name;		// COMPLETE NAME GIVEN BY ACTIVE DIRECTORY
private $ldap_group_access;	// GROUP THAT GIVE ACCESS TO SPECIFIC CONTENT
private $ldap_can_login_status; // INDENTIFY IF THE USER CAN HAVE ACCESS TO THE SYSTEM.
private $level_access_rule;	// SET THE LEVEL ACCESS FOR THE SYSTEM 1 TO 3 THE LEVEL CAN HAVE ACCESS TO ALL SYSTEMS FEATURES  
private $ldap_error_message;	// SET THE FINAL MESSAGE WHEN THE LDAP PROCESS FINISH

//-------------------------------------------------------------//
//			LDAP GROUPS			       //
//-------------------------------------------------------------//

private $agent_group;
private $admin_group;
private $report_group;

//-------------------------------------------------------------//
//-------------------------------------------------------------//
public function __construct($user,$password)
{
	$this->user = $user;
	$this->password = $password;
	$this->ldap_server_name = "HN-ADS-01";
	$this->ad_stream = "dc=knoah,dc=com";
	$this->ldap_server = "ldap://knoah.com";
	$this->domain = "knoah";
	$this->agent_group = "irs_viewer";
	$this->admin_group = "irs_administrator";
	$this->report_group = "irs_reports";
	$this->level_access_rule = 0;
	$this->ldap_can_login_status = false;
}

public function get_level_access_rule()
{
	return $this->level_access_rule;
}

public function get_ldap_can_login_status()
{
	return $this->ldap_can_login_status;
}

public function get_ldap_group_access()
{
	return $this->ldap_group_access;
}

public function get_name()
{
	return $this->ldap_name;
}

public function get_username()
{
	return $this->ldap_username;
}

public function set_user($user)
{
	$this->user = $user;
}

public function set_password($password)
{
	$this->password = $password;	
}

public function  ldap_login()
{
	$this->ldap_verificator();
}

private function ldap_verificator()
{
    $this->ldap = ldap_connect($this->ldap_server);
    $ldaprdn = $this->domain . "\\" . $this->user;
    ldap_set_option($this->ldap, LDAP_OPT_PROTOCOL_VERSION, 3);
    ldap_set_option($this->ldap, LDAP_OPT_REFERRALS, 0);
    $this->ldap_bind_x = @ldap_bind($this->ldap, $ldaprdn, $this->password);

    if ($this->ldap_bind_x) {
        $filter="(sAMAccountName=$this->user)";
        $result = ldap_search($this->ldap,$this->ad_stream,$filter);
        ldap_sort($this->ldap,$result,"sn");
        $info = ldap_get_entries($this->ldap, $result);
        for ($i=0; $i<$info["count"]; $i++)
        {
		$this->ldap_username = $info[$i]["samaccountname"][0];
		$this->ldap_name = $info[$i]["sn"][0].", ".$info[$i]["givenname"][0];
        }
	
	for ($j=0; $j<$info[0]["memberof"]["count"]; $j++)
	{
		$this->find_user_groups($info[0]["memberof"][$j]);
	}

        @ldap_close($this->ldap);
    } else {
	$this->ldap_error_message = "Invalid Username / Password -- Please verify with Knoah IT ";
        echo $msg;
    }
}

private function find_user_groups($cn_stream)
{
	$ta1 = null;
	$tr1 = null;
	$tad1 = null;
	$ta1 = stripos($cn_stream,$this->agent_group);
	$tr1 = stripos($cn_stream,$this->report_group);
	$tad1 = stripos($cn_stream,$this->admin_group);
	if($ta1 != null && $this->level_access_rule < 1)
	{
		//echo $cn_stream."</p\n>";
		$this->level_access_rule = 1;
		$this->ldap_group_access = $this->agent_group;
		$this->ldap_can_login_status = true;
	}

	if($tr1 != null && $this->level_access_rule < 2)
	{
		//echo $cn_stream."</p\n>";
		$this->level_access_rule = 2;
		$this->ldap_group_access = $this->report_group;
		$this->ldap_can_login_status = true;
	}
	

	if($tad1 != null && $this->level_access_rule < 3)
	{
		//echo $cn_stream."</p\n>";
		$this->level_access_rule = 3;
		$this->ldap_group_access = $this->admin_group;
		$this->ldap_can_login_status = true;
	}
}

}