<?php

 
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

            <div id="difficulty">
                <h3>Choisissez la difficulté</h3>
                <div>
                    <div>
                        <input id="diff1" type="radio" name="difficulty" value="1">
                        <label for="diff1">1</label>
                    </div>
                    <div>
                        <input id="diff2" type="radio" name="difficulty" value="2">
                        <label for="diff2">2</label>
                    </div>
                    <div>
                        <input id="diff3" type="radio" name="difficulty" value="3">
                        <label for="diff3">3</label>
                    </div>
                    <div>
                        <input id="diff4" type="radio" name="difficulty" value="4">
                        <label for="diff4">4</label>
                    </div>
                    <div>
                        <input id="diff5" type="radio" name="difficulty" value="5">
                        <label for="diff5">5</label>
                    </div>
                </div>
            </div>

            <div id="category">
                <h3>Choisissez la catégorie</h3>
                <select name="category" id="category">
                    <option value="Entrée">Entrée</option>
                    <option value="Plat">Plat</option>
                    <option value="Dessert">Dessert</option>
                </select>
            </div>

            <div id="duration">
                <h3>Combien de temps pour préparer cette recette ?</h3>
                <div>
                    <input name="duration" type="number" id="duration-span">
                    <label for="duration-span">Durée (en minutes)</label>
                </div>
            </div>

            <div id="image">
                <h3>Ajoutez une image de votre plat</h3>
                <div>
                    <input name="imgURL" id="imgURL" type="text">
                    <label for="imgURL">Ajoutez le lien de votre image</label>
                </div>
            </div>

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