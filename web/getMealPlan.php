<?php
require 'connectToDB.php';
$db = returnDB();

/* getMeal will extract meal data once an appropriate id has been provided*/
function getMeal($mealID)
{
    if($mealID == NULL)
    {
        return $dataArray = json_encode("No meal provided");
    }
    $query = $db->prepare('SELECT name, recipe_url, servings, prep_time FROM meals WHERE id=$mealID');
    $query->execute();

    $mealData = $query->fetch(PDO::FETCH_ASSOC);

    $dataArray = array($mealData['name'], $mealData['recipe_url'], $mealData['servings'], $mealData['prep_time']);

    return json_encode("a string");
} // end of getMeal


// Retrieve data from meal plan
$planID = $_GET['planID'];

$query = $db->prepare("SELECT name, monday, tuesday, wednesday, thursday, friday, saturday, sunday FROM meal_plans WHERE id=$planID");
$query->execute();

$mealPlanData = $query->fetch(PDO::FETCH_ASSOC);

// get data for each meal
$mealPlanName = $mealPlanData['name'];
$monday       = json_decode(getMeal($mealPlanData['monday']));
$tuesday      = json_decode(getMeal($mealPlanData['tuesday']));
$wednesday    = json_decode(getMeal($mealPlanData['wednesday']));
$thursday     = json_decode(getMeal($mealPlanData['thursday']));
$friday       = json_decode(getMeal($mealPlanData['friday']));
$saturday     = json_decode(getMeal($mealPlanData['saturday']));
$sunday       = json_decode(getMeal($mealPlanData['sunday']));

// send data to front end
$mealPlanArray = array($mealPlanName, $monday, $tuesday, $wednesday, $thursday, $friday, $saturday, $sunday);

echo json_encode($mealPlanArray);
// echo json_encode($mealPlanName);
?>