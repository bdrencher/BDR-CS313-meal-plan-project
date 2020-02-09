<?php
require 'connectToDB.php';
$db = returnDB();

$dataArray = array();

$query = $db->prepare("SELECT id, name FROM meal_plans");
$query->execute();

while ($row = $query->fetch(PDO::FETCH_ASSOC))
{
    $rowData = array($row['id'], $row['name']);
    array_push($dataArray, $rowData);
}

echo json_encode($dataArray);
?>