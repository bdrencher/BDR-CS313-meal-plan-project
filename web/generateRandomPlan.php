<?php
require 'connectToDB.php';
$db = returnDB();

$mealIDs = array();

$query = "SELECT id FROM meals";
$statement = $db->prepare($query);
$statement->execute();

while ($row = $statement->fetch(PDO::FETCH_ASSOC))
{
    array_push($mealIDs, $row);
}

echo json_encode($mealIDs);
?>