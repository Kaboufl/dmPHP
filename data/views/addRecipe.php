<section>
    <div class="form-card">
        <h1>Ajoutez aussi votre recette !</h1>
        <form action="/data" method="POST">
            <input name="titre" type="text" placeholder="Titre">
            <textarea name="description" id="description" placeholder="Description" cols="30" rows="10"></textarea>
            <input type="hidden" id="stepsField" name="steps">
            <div id="steps">
                <textarea id="addingStep"></textarea>
                <button id="saveBtn" type="button">Enregistrer l'étape</button>
            </div>
            <ul id="addedSteps">

            </ul>
        </form>
    </div>
</section>

<script>
    const button = document.querySelector('#saveBtn');

    const steps = document.querySelector('#stepsField');
    const stepsDisplay = document.querySelector('#addedSteps');
    
    button.addEventListener('click', () => {
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
</script>