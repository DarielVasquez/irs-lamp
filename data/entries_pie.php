<?php
require_once("../config/config.php");

$db = new Database();
$conn = $db->connect();

$sql = "select et.entryname as entry, count(e.entrytypeid) as amount ";
$sql .= "from entries as e,entrytype as et ";
$sql .= "where e.entrytypeid = et.id group by et.entryname ";
//echo $sql;

$result =  $conn->query($sql);
$data = array();
foreach ($result as $row) {
    $data[] = $row;
}

echo json_encode($data);
?>