<?php
require 'connectToDB.php';
$db = returnDB();

/* getMeal will extract meal data once an appropriate id has been provided*/
function getMeal($mealID)
{
    $mealDB = returnDB();

    if($mealID == NULL)
    {
        return array("no meal selected");
    }
    $mealQuery = $mealDB->prepare('SELECT name, recipe_url, servings, prep_time FROM meals WHERE id=$mealID');
    $mealQuery->execute();

    $mealData = $mealQuery->fetch(PDO::FETCH_ASSOC);

    $dataArray = array($mealData['name'], $mealData['recipe_url'], $mealData['servings'], $mealData['prep_time']);

    return $dataArray;
} // end of getMeal


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

// send data to front end
$mealPlanArray = array($mealPlanName, $monday, $tuesday, $wednesday, $thursday, $friday, $saturday, $sunday);

echo json_encode($mealPlanArray);
// echo json_encode($mealPlanName);
?>