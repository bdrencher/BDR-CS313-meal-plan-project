<?php
require 'connectToDB.php';
$db = returnDB();

$query = "SELECT id FROM meals";
$statement = $db->prepare($query);
$statement->execute();

$mealIDs = $statement->fetch(PDO::FETCH_ASSOC);

echo json_encode($mealIDs);
?>