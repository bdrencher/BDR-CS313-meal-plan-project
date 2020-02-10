<?php
require 'connectToDB.php';
$db = returnDB();

function getMeal($mealID)
{
    if($mealID == NULL)
    {
        return $dataArray = array("No meal provided");
    }
    $query = $db->prepare("SELECT name, recipe_url, servings, prep_time FROM meals WHERE id=$mealID");
    $query->execute();

    $mealData = $query->fetchall(PDO::FETCH_ASSOC);

    return $mealData;
}
?>