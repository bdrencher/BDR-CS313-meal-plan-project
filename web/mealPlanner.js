function mealPlanRequest(mealPlanID)
{
    let request = new XMLHttpRequest();

    request.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200)
        {
            let data = JSON.parse(request.response);
            console.log(data);
        }
    };

    request.open("GET", "getMealPlan.php?planID=" + mealPlanID, true);
    request.send();
}

function getAllMealPlans()
{
    let request = new XMLHttpRequest();

    request.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200)
        {
            let data = JSON.parse(request.response);
            console.log(data);
        }
    };

    request.open("GET", "getAllMealPlans.php", true);
    request.send();
}