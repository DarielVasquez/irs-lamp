<?php
require_once("../config/config.php");

$db = new Database();
$conn = $db->connect();

$sql = "select s.name as status, count(e.statusid) as amount ";
$sql .= "from events as e,status as s ";
$sql .= "where e.statusid = s.id group by s.name ";
//echo $sql;

$result =  $conn->query($sql);
$data = array();
foreach ($result as $row) {
    $data[] = $row;
}

echo json_encode($data);
?>