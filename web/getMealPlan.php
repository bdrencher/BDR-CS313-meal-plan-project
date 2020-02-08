<?php
require 'connectToDB.php';
require 'getMeal.php';
$db = returnDB();

$planID = $_GET['planID'];

$query = $db->prepare("SELECT name, monday, tuesday, wednesday, thursday, friday, saturday, sunday FROM meal_plans WHERE id=$planID");
$query->execute();

$mealPlanData = $statement->fetch(PDO::FETCH_ASSOC);

// $mealPlanName = mealPlanData['name'];
// $monday       = json_decode(getMeal(mealPlanData['monday'], $db));
// $tuesday      = json_decode(getMeal(mealPlanData['tuesday'], $db));
// $wednesday    = json_decode(getMeal(mealPlanData['wednesday'], $db));
// $thursday     = json_decode(getMeal(mealPlanData['thursday'], $db));
// $friday       = json_decode(getMeal(mealPlanData['friday'], $db));
// $saturday     = json_decode(getMeal(mealPlanData['saturday'], $db));
// $sunday       = json_decode(getMeal(mealPlanData['sunday'], $db));

// // get data for each meal

// $mealPlanArray = array($mealPlanName, $monday, $tuesday, $wednesday, $thursday, $friday, $saturday, $sunday);


// echo json_encode($mealPlanArray);
echo json_encode($planID);
?>