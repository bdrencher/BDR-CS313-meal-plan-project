<?php
require 'connectToDB.php';
require 'getMeal.php';

$db = returnDB();

$mealID = $_GET['mealID'];

echo json_encode(getMeal($mealID, $db));
?>