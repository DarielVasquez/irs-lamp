<?php
require_once 'models/dashboard.php';

class dashboardController {

    public function index(){		
		require_once 'config/parameters.php';
		require_once 'views/dashboard/dashboard.php';
	}
}?>