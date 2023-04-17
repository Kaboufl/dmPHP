<?php

if (!(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true))
{
    header('Location: /');
}   
?>
<section>
    <div class="form-card">
        <h1>Ajoutez aussi votre recette !</h1>
        <form action="/post-recipe" method="POST">
            <input name="titre" type="text" placeholder="Titre">
            <textarea name="description" id="description" placeholder="Description" cols="30" rows="10"></textarea>
            <input type="hidden" id="stepsField" name="steps">
            <input type="hidden" id="ingredientsField" name="ingredients">
            <div id="ingredients">
                <textarea id="addingIngredient"></textarea>
                <button id="saveIngredient" type="button">Enregistrer l'ingrédient</button>
                <button id="resetIngredients" type="button">Recommencer</button>

            </div>
            <ul id="addedIngredients">

            </ul>
            <div id="steps">
                <textarea id="addingStep"></textarea>
                <button id="saveBtn" type="button">Enregistrer l'étape</button>
                <button id="resetBtn" type="button">Recommencer</button>
            </div>
            <ul id="addedSteps">

            </ul>

            <div class="flex-row-center">
                <button type="submit">Enregistrer la recette</button>
            </div>
        </form>
    </div>
</section>

<script>
    const saveButton = document.querySelector('#saveBtn');
    const resetButton = document.querySelector('#resetBtn');
    const saveIngredient = document.querySelector('#saveIngredient');
    const resetIngredients = document.querySelector('#resetIngredients');

    const steps = document.querySelector('#stepsField');
    const stepsDisplay = document.querySelector('#addedSteps');
    const ingredients = document.querySelector('#ingredientsField');
    const ingredientsDisplay = document.querySelector('#addedIngredients');
    
    saveButton.addEventListener('click', () => {
        let step = document.getElementById('addingStep').value;
        console.log(step);

        if (steps.value == '')
        {
            steps.value = step;
        } else {
            steps.value = steps.value + '|' + step;
        }
        console.log(steps.value);

        let newstep = '<li>' + step + '</li>';
        stepsDisplay.innerHTML += newstep;


    });

    resetButton.addEventListener('click', () => {
        steps.value = '';

        stepsDisplay.innerHTML = '';
    });
    
    saveIngredient.addEventListener('click', () => {
        let ingredient = document.getElementById('addingIngredient').value;
        console.log(ingredient);

        if (ingredients.value == '')
        {
            ingredients.value = ingredient;
        } else {
            ingredients.value = ingredients.value + '|' + ingredient;
        }
        console.log(ingredients.value);

        let newIngredient = '<li>' + ingredient + '</li>';
        ingredientsDisplay.innerHTML += newIngredient;


    });

    resetIngredients.addEventListener('click', () => {
        ingredients.value = '';

        ingredientsDisplay.innerHTML = '';
    });



</script>