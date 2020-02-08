<?php
require "connectToDB.php";
require "getMeal.php";
session_start();
$db = returnDB();

$planID = $_GET['planID'];

$query = $db->prepare("SELECT name, monday, tuesday, wednesday, thursday, friday, saturday, sunday FROM meal_plans WHERE id=$planID");
$query->execute();

$mealPlanData = $statement->fetch(PDO::FETCH_ASSOC);

$mealPlanName = mealPlanData['name'];
$monday       = json_decode(getMeal(mealPlanData['monday']));
$tuesday      = json_decode(getMeal(mealPlanData['tuesday']));
$wednesday    = json_decode(getMeal(mealPlanData['wednesday']));
$thursday     = json_decode(getMeal(mealPlanData['thursday']));
$friday       = json_decode(getMeal(mealPlanData['friday']));
$saturday     = json_decode(getMeal(mealPlanData['saturday']));
$sunday       = json_decode(getMeal(mealPlanData['sunday']));

// get data for each meal

$mealPlanArray = array($mealPlanName, $monday, $tuesday, $wednesday, $thursday, $friday, $saturday, $sunday);


echo json_encode($mealPlanArray);
?>