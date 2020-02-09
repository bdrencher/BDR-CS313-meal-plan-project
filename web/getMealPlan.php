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
$monday       = getMeal($mealPlanData['monday'], $db);
$tuesday      = getMeal($mealPlanData['tuesday'], $db);
$wednesday    = getMeal($mealPlanData['wednesday'], $db);
$thursday     = getMeal($mealPlanData['thursday'], $db);
$friday       = getMeal($mealPlanData['friday'], $db);
$saturday     = getMeal($mealPlanData['saturday'], $db);
$sunday       = getMeal($mealPlanData['sunday'], $db);

$mealPlanArray = array($mealPlanName, $monday, $tuesday, $wednesday, $thursday, $friday, $saturday, $sunday);
echo json_encode($mealPlanArray);
?>