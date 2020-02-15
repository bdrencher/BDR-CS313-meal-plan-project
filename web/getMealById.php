<?php
require 'connectToDB.php';
require 'getMeal.php';
$db = returnDB();

$mealData = getMeal($_GET['mealID'], $db);

echo json_encode($mealData);
?>