function mealPlanRequest()
{
    const mealPlanID = document.getElementById("mealPlanSelection").value;
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

$(document).ready(
function getAllMealPlans()
{
    let request = new XMLHttpRequest();

    request.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200)
        {
            let data = JSON.parse(request.response);
            
            // modify drop down menu with values
            const dropDown = document.getElementById("mealPlanSelection");

            for (const plan of data) {
                console.log(plan);
                console.log(plan[0]);
                console.log(plan[1]);
                let newOption = document.createElement("option");
                
                // set up new option before appending
                newOption.setAttribute("value", plan[0]);
                newOption.innerHTML = plan[1];
        
                dropDown.appendChild(newOption);
            }
        }
    };

    request.open("GET", "getAllMealPlans.php", true);
    request.send();
});