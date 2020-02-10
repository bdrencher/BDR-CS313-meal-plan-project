<?php
require 'connectToDB.php';
require 'getMeal.php';

$db = returnDB();

$mealID = $_GET['mealID'];

if(!$mealID)
{
    return json_encode("");
}

echo json_encode(getMeal($mealID, $db));
?>