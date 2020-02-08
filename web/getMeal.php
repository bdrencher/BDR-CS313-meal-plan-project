<?php
require "connectToDB.php";
session_start();
$db = returnDB();

function getMeal($mealID)
{
    $query = $db->prepare('SELECT name, recipe_url, servings, prep_time FROM $mealID');
    $query->execute();

    $mealData = $query->fetch(PDO::FETCH_ASSOC);

    $dataArray = array($mealData['name'], $mealData['recipe_url'], $mealData['servings'], $mealData['prep_time']);

    echo json_encode($dataArray);
}
?>