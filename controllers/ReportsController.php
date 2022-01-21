<?php
require_once 'models/report.php';

class reportsController {

	public function loadCalls(){
		require_once 'views/reports/loadCalls.php';
	}

	public function loadCampaigns(){
		require_once 'views/reports/loadCampaigns.php';
	}

	public function loadTotal(){
		require_once 'views/reports/loadTotal.php';
	}

	public function loadUsers(){
		require_once 'views/reports/loadUsers.php';
	}

    public function calls(){		
		require_once 'config/parameters.php';

		if(isset($_POST)){
			$startDate = isset($_POST['startDate']) ? $_POST['startDate'] : '2000-01-01';
			$endDate = isset($_POST['endDate']) ? $_POST['endDate'] : false;
			$issue = isset($_POST['issue']) ? $_POST['issue'] : false;

			if($issue && $startDate && $endDate){
				$report = new Report();
				$report->setIssue($issue);
				$report->setStartDate($startDate);
				$report->setEndDate($endDate);
				$reports = $report->getCalls();
				$issue_types = $report->getGraphCalls();
			}
		}	
		
		//echo ("<script>location.href = '".base_url."reports-tablescalls';</script>");
		require_once 'views/reports/viewerCalls.php';
	}

	public function tablescalls(){
		//require_once 'views/reports/viewerCalls.php';
	}

	public function campaigns(){	
		require_once 'config/parameters.php';

		if(isset($_POST)){
			$startDate = isset($_POST['startDate']) ? $_POST['startDate'] : '2000-01-01';
			$endDate = isset($_POST['endDate']) ? $_POST['endDate'] : false;
			$campaign = isset($_POST['campaign']) ? $_POST['campaign'] : false;

			if($campaign && $startDate && $endDate){
				$report = new Report();
				$report->setCampaign($campaign);
				$report->setStartDate($startDate);
				$report->setEndDate($endDate);
				$reports = $report->getCampaignEntries();
				$campaigns = $report->getGraphCampaigns();
			}
		}

		require_once 'views/reports/viewerCampaigns.php';
	}

	public function total(){	
		require_once 'config/parameters.php';

		if(isset($_POST)){
			$startDate = isset($_POST['startDate']) ? $_POST['startDate'] : false;
			$endDate = isset($_POST['endDate']) ? $_POST['endDate'] : false;
			$createDate = isset($_POST['createDate']) ? $_POST['createDate'] : false;

			if($createDate && $startDate && $endDate){
				$report = new Report();
				$report->setCreateDate($createDate);
				$report->setStartDate($startDate);
				$report->setEndDate($endDate);
				$reports = $report->getTotal();
			}
		}

		require_once 'views/reports/viewerTotal.php';
	}

	public function users(){	
		require_once 'config/parameters.php';

		if(isset($_POST)){
			$startDate = isset($_POST['startDate']) ? $_POST['startDate'] : '2000-01-01';
			$endDate = isset($_POST['endDate']) ? $_POST['endDate'] : false;
			$user = isset($_POST['user']) ? $_POST['user'] : false;

			if($user && $startDate && $endDate){
				$report = new Report();
				$report->setUser($user);
				$report->setStartDate($startDate);
				$report->setEndDate($endDate);
				$reports = $report->getUsers();
				$users = $report->getGraphUsers();
			}
		}

		require_once 'views/reports/viewerUsers.php';
	}

}