<?php

class Utils{
	
	public static function deleteSession($name){
		if(isset($_SESSION[$name])){
			$_SESSION[$name] = null;
			unset($_SESSION[$name]);
		}
		
		return $name;
	}
	
	/*public static function isAdmin(){
		if(!isset($_SESSION['admin'])){
			header("Location:".base_url);
		}else{
			return true;
		}
	}*/
	
	public static function isIdentity(){
		if(!isset($_SESSION['identity'])){
			header("Location:".base_url);
		}else{
			return true;
		}
	}
	
	public static function showLocations(){
		require_once 'models/location.php';
		$location = new Location();
		$locations = $location->getAll();
		return $locations;
	}

	public static function showLoBs(){
		require_once 'models/lob.php';
		$lob = new LoB();
		$lobs = $lob->getAll();
		return $lobs;
	}

	public static function showIssues(){
		require_once 'models/issue.php';
		$issue = new Issue();
		$issues = $issue->getAll();
		return $issues;
	}
	
	public static function showIssueTypes(){
		require_once 'models/issue_type.php';
		$issue_type = new Issue_type();
		$issue_types = $issue_type->getAll();
		return $issue_types;
	}

	public static function showEntryTypes(){
		require_once 'models/entry_type.php';
		$entry_type = new Entry_type();
		$entry_types = $entry_type->getAll();
		return $entry_types;
	}

	public static function showCampaigns(){
		require_once 'models/campaign.php';
		$campaign = new Campaign();
		$campaigns = $campaign->getAll();
		return $campaigns;
	}

	public static function showUsers(){
		require_once 'models/user.php';
		$user = new User();
		$users = $user->getAll();
		return $users;
	}
	
	public static function showStatus(){
		require_once 'models/status.php';
		$stat = new Status();
		$status = $stat->getAll();
		return $status;
	}

	public static function showAlerts(){
		require_once 'models/event.php';
		$event = new Event();
		$alerts = $event->getAlerts();
		return $alerts;
	}

	public static function showExample($status){
		$value = 'Pendiente';
		
		if($status == 'confirm'){
			$value = 'Pendiente';
		}elseif($status == 'preparation'){
			$value = 'En preparación';
		}elseif($status == 'ready'){
			$value = 'Preparado para enviar';
		}elseif($status = 'sended'){
			$value = 'Enviado';
		}
		
		return $value;
	}
	
}
