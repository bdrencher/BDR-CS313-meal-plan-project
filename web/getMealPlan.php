<?php
require 'connectToDB.php';
require 'getMeal.php';
$db = returnDB();

$planID = $_GET['planID'];

$query = $db->prepare("SELECT name, monday, tuesday, wednesday, thursday, friday, saturday, sunday FROM meal_plans WHERE id=$planID");
$query->execute();

$mealPlanData = $query->fetch(PDO::FETCH_ASSOC);

$mealPlanName = $mealPlanData['name'];
// $monday       = json_decode(getMeal($mealPlanData['monday']));
// $tuesday      = json_decode(getMeal($mealPlanData['tuesday'], $db));
// $wednesday    = json_decode(getMeal($mealPlanData['wednesday'], $db));
// $thursday     = json_decode(getMeal($mealPlanData['thursday'], $db));
// $friday       = json_decode(getMeal($mealPlanData['friday'], $db));
// $saturday     = json_decode(getMeal($mealPlanData['saturday'], $db));
// $sunday       = json_decode(getMeal($mealPlanData['sunday'], $db));

// // get data for each meal

$mealPlanArray = array($mealPlanName, $monday, $tuesday, $wednesday, $thursday, $friday, $saturday, $sunday);

$queryTwo = $db->prepare("SELECT name, recipe_url, servings, prep_time FROM meals WHERE id=1");
$queryTwo->execute();
echo json_encode($queryTwo->fetch(PDO::FETCH_ASSOC));
// echo json_encode($mealPlanName);
?>