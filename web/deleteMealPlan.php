<?php
require 'connectToDB.php';
$db = returnDB();

$planID = $_GET['id'];

$query = "DELETE FROM meal_plans WHERE id = $planID";

$statement = $db->prepare($query);
$statement->execute();
?>