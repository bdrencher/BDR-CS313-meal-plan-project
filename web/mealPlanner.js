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

$(document).ready(
function populateMealPlans()
{
    const dropDown = document.getElementById("mealPlanSelection");
    const mealPlans = getAllMealPlans();

    // plan[0] should be meal plan id, plan[1] should be meal plan name
    for (const plan of mealPlans) {
        let newOption = document.createElement("option");
        
        // set up new option before appending
        newOption.setAttribute("value", plan[0]);
        newOption.innerHTML = plan[1];

        dropDown.appendChild(newOption);
    }
});