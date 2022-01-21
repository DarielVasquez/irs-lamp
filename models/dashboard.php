<?php

class Dashboard{
	private $id_event;
    private $id_entry;
	private $type_issue_id;
    private $entry_type_id;

	private $db;
	
	public function __construct() {
		$this->db = Database::connect();
    }
 
    function getID_Event() {
		return $this->id_event;
    }
    
    function getID_Entry() {
		return $this->id_entry;
    }
    
    function getType_issue_id() {
		return $this->type_issue_id;
	}

	function getEntry_type_id() {
		return $this->entry_type_id;
	}

	function setID_Event($id_event) {
		$this->id_event = $id_event;
    }

    function setID_Entry($id_entry) {
		$this->id_entry = $id_entry;
    }
    
    function setType_issue_id($type_issue_id) {
		$this->type_issue_id = $type_issue_id;
    }
    
    function setEntry_type_id($entry_type_id) {
		$this->entry_type_id = $entry_type_id;
    }

	//Obtiene todos los valores de la bd
	public function callEvents(){
		//$campaigns = $this->db->query("SELECT * FROM campaigns ORDER BY id DESC;");
		$sql = "select e.subject as subject, s.name as status, count(e.typeissueid) as amount ";
		$sql .= "from events as e,typeissue as ti,status as s ";
		$sql .= "where e.typeissueid = ti.id and e.statusid = s.id group by e.subject ";
		/*$sql = "select ti.name as issue, count(e.typeissueid) as amount ";
		$sql .= "from events as e,typeissue as ti ";
		$sql .= "where e.typeissueid = ti.id group by ti.name ";*/
		//echo $sql;
		$result = $this->db->query($sql);
        $data = array();
        foreach ($result as $row) {
            $data[] = $row;
        }

		return json_encode($data);
	}

}    