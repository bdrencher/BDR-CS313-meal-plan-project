$("loadMealPlanButton").click(function() {
    $.get("getMealPlan.php", 1), function (response){
        let data = JSON.parse(response);
        console.log(data);
    }
});