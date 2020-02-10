<?php
require 'connectToDB.php';
$db = returnDB();

$meals = array();

$query = $db->prepare("SELECT id, name FROM meals");
$query->execute();

while ($row = $query->fetch(PDO::FETCH_ASSOC))
{
    $newMeal = array($row['id'], $row['name']);
    array_push($meals, $newMeal);
}

echo json_encode($meals);
?>