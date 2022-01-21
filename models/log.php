<?php

class Log{

    private $log;

    private $db;

    public function __construct() {
		$this->db = Database::connect();
    }

    function getLog() {
		return $this->log;
	}

    function setLog($log) {
		$this->log = $this->db->real_escape_string($log);
    }

    public function insert($module, $change, $action) {
        date_default_timezone_set("America/Tegucigalpa");
        $username = isset($_SESSION['username']) ? $_SESSION['username'] : false;
        $date = date("Y-m-d h:i:sa");
        $append = FILE_APPEND;
        $log    = "[".$date."] ". $module. " | " . $username . " | " . $change . " | " . $action . PHP_EOL;
        $result = (file_put_contents("./logs/log.log", $log, $append)) ? 1 : 0;
    }

}