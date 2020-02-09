<?php
require 'connectToDB.php';
$db = returnDB();

    /* getMeal will extract meal data once an appropriate id has been provided*/
    // This is not working right now, I'm not sure why
    function getMeal($mealID)
    {
        $mealDB = returnDB();

        if($mealID == NULL)
        {
            return array("no meal selected");
        }
        $mealQuery = $mealDB->prepare("SELECT name, recipe_url, servings, prep_time FROM meals WHERE id=$mealID");
        $mealQuery->execute();

        $mealData = $mealQuery->fetchall(PDO::FETCH_ASSOC);

        return $mealData;
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

// I want to come back and write a more oop solution for this
// $mondayQuery    = $db->prepare("SELECT name, recipe_url, servings, prep_time FROM meals WHERE id=$monday");
// $tuesdayQuery   = $db->prepare("SELECT name, recipe_url, servings, prep_time FROM meals WHERE id=$tuesday");
// $wednesdayQuery = $db->prepare("SELECT name, recipe_url, servings, prep_time FROM meals WHERE id=$wednesday");
// $thursdayQuery  = $db->prepare("SELECT name, recipe_url, servings, prep_time FROM meals WHERE id=$thursday");
// $fridayQuery    = $db->prepare("SELECT name, recipe_url, servings, prep_time FROM meals WHERE id=$friday");
// $saturdayQuery  = $db->prepare("SELECT name, recipe_url, servings, prep_time FROM meals WHERE id=$saturday");
// $sundayQuery    = $db->prepare("SELECT name, recipe_url, servings, prep_time FROM meals WHERE id=$sunday");

// $mondayQuery->execute();
// $tuesdayQuery->execute();
// $wednesdayQuery->execute();
// $thursdayQuery->execute();
// $fridayQuery->execute();
// $saturdayQuery->execute();
// $sundayQuery->execute();

// $mondayData    = $mondayQuery->fetchall(PDO::FETCH_ASSOC);
// $tuesdayData   = $tuesdayQuery->fetchall(PDO::FETCH_ASSOC);
// $wednesdayData = $wednesdayQuery->fetchall(PDO::FETCH_ASSOC);
// $thursdayData  = $thursdayQuery->fetchall(PDO::FETCH_ASSOC);
// $fridayData    = $fridayQuery->fetchall(PDO::FETCH_ASSOC);
// $saturdayData  = $saturdayQuery->fetchall(PDO::FETCH_ASSOC);
// $sundayData    = $sundayQuery->fetchall(PDO::FETCH_ASSOC);

// send data to front end
// $mealPlanArray = array($mealPlanName, $mondayData, $tuesdayData, $wednesdayData, $thursdayData, $fridayData, $saturdayData, $sundayData);
$mealPlanArray = array($mealPlanName, $monday, $tuesday, $wednesday, $thursday, $friday, $saturday, $sunday);
echo json_encode($mealPlanArray);
?>