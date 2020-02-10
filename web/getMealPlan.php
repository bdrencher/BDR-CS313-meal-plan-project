<?php
require 'connectToDB.php';
require 'getMeal.php';
$db = returnDB();

// Retrieve data from meal plan
$planID = $_GET['planID'];

$query = $db->prepare("SELECT name, monday, tuesday, wednesday, thursday, friday, saturday, sunday FROM meal_plans WHERE id=$planID");
$query->execute();

$mealPlanData = $query->fetch(PDO::FETCH_ASSOC);

// get data for each meal
$mealPlanName = $mealPlanData['name'];
$monday       = getMeal($mealPlanData['monday']);
$tuesday      = getMeal($mealPlanData['tuesday']);
$wednesday    = getMeal($mealPlanData['wednesday']);
$thursday     = getMeal($mealPlanData['thursday']);
$friday       = getMeal($mealPlanData['friday']);
$saturday     = getMeal($mealPlanData['saturday']);
$sunday       = getMeal($mealPlanData['sunday']);

$mealPlanArray = array($mealPlanName, $monday, $tuesday, $wednesday, $thursday, $friday, $saturday, $sunday);
echo json_encode($mealPlanArray);
?>