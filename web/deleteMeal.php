<?php
require 'connectToDB.php';
$db = returnDB();

$mealID = $_GET['id'];

$query = "DELETE FROM meals WHERE id = $mealID";

$statement = $db->prepare($query);
$statement->execute();
?>