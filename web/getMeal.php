<?php
function getMeal($mealID, $db)
{
    if($mealID == NULL)
    {
        return $dataArray = array("No meal provided");
    }
    $query = $db->prepare("SELECT name, recipe_url, servings, prep_time, id FROM meals WHERE id=$mealID");
    $query->execute();

    $mealData = $query->fetchall(PDO::FETCH_ASSOC);

    return $mealData;
}
?>